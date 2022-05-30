<!DOCTYPE html>
<?php
include('../includes/database_connection.php');
// include('../includes/database_connection_acc.php');
include('../includes/header.php');
include('../includes/session.php');
//initialize so no.
//$_SESSION['SO_num']="";

$sql = "SELECT * FROM DimPlant WITH (NOLOCK);";
$sql .= "SELECT * FROM M_Brand  WITH (NOLOCK) ORDER BY BrandName ASC;";
$sql .= "SELECT * FROM M_Customer WITH (NOLOCK) ORDER BY CustomerName ASC;";
$sql .= "SELECT * FROM M_InspectionPlan WITH (NOLOCK);";
$sql .= "SELECT * FROM M_GloveColour WITH (NOLOCK) ORDER BY GloveColourName ASC;";
$sql .= "SELECT * FROM M_GloveProductType WITH (NOLOCK) ORDER BY GloveProductTypeName ASC;";
$sql .= "SELECT * FROM M_GloveCode WITH (NOLOCK) ORDER BY GloveCodeLong ASC;";
$sql .= "SELECT * FROM M_GloveSize WITH (NOLOCK);";
$sql .= "SELECT * FROM M_GloveSurface WITH (NOLOCK);";

$stmt = $connect->prepare($sql);
$stmt->execute();

$Dimplant = $stmt->fetchAll();
$stmt->nextRowset();
$M_Brand = $stmt->fetchAll();
$stmt->nextRowset();
$M_Customer = $stmt->fetchAll();
$stmt->nextRowset();
$M_InspectionPlan = $stmt->fetchAll();
$stmt->nextRowset();
$M_GloveColour = $stmt->fetchAll();
$stmt->nextRowset();
$M_GloveProductType = $stmt->fetchAll();
$stmt->nextRowset();
$M_GloveCode = $stmt->fetchAll();
$stmt->nextRowset();
$M_GloveSize = $stmt->fetchAll();
$stmt->nextRowset();
$M_GloveSurface = $stmt->fetchAll();
?>

<html lang="en">

<body>
  <div id="wrapper">
    <!-- Navigation -->
    <?php include('../navbar/navbar.php'); ?>

    <div id="page-wrapper" class="preset-form-wrapper">
      <div class="row">
        <div class="col-lg-13">
          <h4 class="page-header">QUALITY RECORD E SYSTEM (QREX)</h4>
        </div>
        <!-- /.col-lg-13 -->
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-lg-13">
          <div class="panel panel-primary">
            <div class="panel-heading">Preset Lot Details</div>
            <!-- /.panel-heading -->
            <div class="panel-body">
              <!-- --------------------------------------------------------------------------------- -->
              <form method="post" id="insert_formA">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <!-- SELECT FACTORY /.form-group -->
                      <div class="form-group">
                        <?php
                        // $query = $connect->prepare("SELECT * FROM DimPlant");
                        // $query->execute();
                        // $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                        <label>Factory</label>
                        <select class="form-control" id="PlantKey" name="PlantKey" required></td>
                          <option class="form-control" name="PlantKey" value=""> Factory</option>
                          <?php foreach ($Dimplant as $row) { ?>
                            <option name="PlantKey" value="<?php echo $row['PlantName']; ?>"><?php echo $row['PlantName'];
                                                                                            } ?></option>
                        </select>
                      </div>
                      <!-- SO NUMBER /.form-group -->
                      <div class="form-group">
                        <label>SO Number</label>
                        <input type="number" class="form-control" name="SONumber" oninput="this.value=this.value.slice(0,this.maxLength); this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" maxlength="10" id="SONumber" placeholder="Enter SO Number" required>
                        <div id="checkk"></div>
                      </div>
                      <!-- ITEM NUMBER /.form-group -->
                      <div class="form-group">
                        <label>SO Line Item Number</label>
                        <input type="number" class="form-control" placeholder="Enter Item Number" name="itemnumber" id="ItemNumber" min="1" oninput="this.value = !!this.value && Math.abs(this.value) >= 1 ? Math.abs(this.value) : null" required>
                      </div>
                      <!-- SELECT BRAND /.form-group -->
                      <div class="form-group">
                       
                        <label>Brand</label>
                        <select class="form-control" id="Brand" name="Brand" required>
                          <option class="form-control" name="" value="">Brand </option>
                          <?php foreach ($M_Brand as $row) { ?>
                            <option name="Brand" value="<?php echo $row['BrandName']; ?>"><?php echo $row['BrandName'];
                              } ?></option>
                        </select>
                      </div>
                      <!-- CUSTOMER /.form-group -->
                      <div class="form-group">
                       
                        <label>Customer</label>
                        <select class="form-control" id="Customer" name="Customer" required>
                          <option class="form-control" name="" value=""> Customer</option>
                          <?php foreach ($M_Customer as $row) { ?>
                            <option name="Customer" value="<?php echo $row['CustomerName']; ?>"><?php echo $row['CustomerName'];
                               } ?></option>
                        </select>
                      </div>
                      <!-- CATEGORY /.form-group -->
                      <div class="form-group">
                      
                        <label>Category</label>
                        <select class="form-control" id="InspectionPlanKey" name="InspectionPlanKey" required></td>
                          <option class="form-control" name="InspectionPlanKey" value=""> Category</option>
                          <?php foreach ($M_InspectionPlan as $row) {
                            if ($row['ActiveStatus'] == 0) {
                            } else { ?>
                              <option name="InspectionPlanKey" value="<?php echo $row['InspectionPlanName']; ?>"><?php echo $row['InspectionPlanName']; ?></option>
                          <?php }
                          } ?>
                        </select>
                      </div>
                      <!-- /.form-group -->
                      <!-- material_code /.form-group -->
                      <div class="form-group">

                        <label>Material code</label>
                        <input type="text" class="form-control" name="materialCode" id="materialCode" readonly>
                      </div>
                      <!-- country /.form-group -->
                      <div class="form-group">

                        <label>Country</label>
                        <input type="text" class="form-control" name="Country" id="Country" readonly>
                      </div>
                    </div>
                    <!-- /.col -->
                    <!-- SIZE /.form-group -->
                    <div class="col-md-6">

                      <!-- COLOUR /.form-group -->

                      <div class="form-group">

                        <input type="hidden" class="form-control" name="color-hidden" id="color-hidden" readonly>


                        <label>Colour</label>
                        <select class="form-control" id="GloveColourKey" name="GloveColourKey" required>
                          <option class="form-control" name="GloveColourKey" value=""> Colour</option>
                          <?php foreach ($M_GloveColour as $row) { ?>
                            <option name="GloveColourKey" value="<?php echo $row['GloveColourCode']; ?>"><?php echo $row['GloveColourName'];
                                                                                                        } ?></option>
                        </select>
                      </div>

                      <!-- LOT NUMBER /.form-group -->

                      <div class="form-group">
                        <label>Lot Number</label>
                        <input type="input" class="form-control" placeholder="Lot Number" id="lotnumber" name="lotnumber" required>
                      </div>
                      <!-- PRODUCT /.form-group -->

                      <div class="form-group">
                    
                        <label>Product</label>
                        <select class="form-control" id="GloveProductTypeKey" name="GloveProductTypeKey" required>
                          <option class="form-control" name="GloveProductTypeKey" value="">Product</option>
                          <?php foreach ($M_GloveProductType as $row) { ?>
                            <option name="GloveProductTypeKey" value="<?php echo $row['GloveProductTypeName']; ?>"><?php echo $row['GloveProductTypeName'];
                                                                                                                  } ?></option>
                        </select>
                      </div>
                      <!-- PRODUCT CODE /.form-group -->

                      <div class="form-group">
                  
                        <label>Product Code</label>
                        <select class="form-control" id="GloveCodeKey" name="GloveCodeKey" required>
                          <option class="form-control" name="GloveCodeKey" value="">Product Code</option>
                          <?php foreach ($M_GloveCode as $row) { ?>
                            <option name="GloveCodeKey" value="<?php echo $row['GloveCodeLong']; ?>"><?php echo $row['GloveCodeLong'];
                                                                                                    } ?></option>
                        </select>
                      </div>

                      <!-- fg condition /.form-group -->

                      <div class="form-group">

                        <label>Inspection Stage</label>
                        <select class="form-control" id="fgcondition" name="fgcondition" required>
                          <option class="form-control" name="fgcondition" value="1">Finished Good</option>
                          <option class="form-control" name="fgcondition" value="0">Finished Good Overall (Combined Size)</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label>Size</label>

                        <div class="toolt"><sup><i class="fa fa-info-circle" aria-hidden="true"></i></sup>
                          <span class="toolttext">Only select if all pallets have same size*</span>
                        </div>


                        <select name="GloveSizeKey" id="GloveSizeKey" class=" form-control gloveSizePrimary">
                          <option value="">Size</option><?php echo size_selection($connect, $M_GloveSize); ?>
                        </select>
                      </div>
                      <!-- /.form-group -->
                      <!-- surface /.form-group -->
                      <div class="form-group">

                        <label>Surface</label>
                        <input type="hidden" class="form-control" name="SurfaceName" id="SurfaceName" readonly>

                        <select name="Surface" id="Surface" class=" form-control gloveSurface">
                          <option value="">Surface Type</option><?php echo surface_selection($connect, $M_GloveSurface); ?>
                        </select>
                      </div>


                    </div>
                    <!-- /.col -->


                  </div>
                  <!-- /.row -->
                </div>
              </form>
              <!-- FORM A END -->
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-13">
          <div class="panel panel-primary">
            <div class="panel-heading">Preset Pallet Input</div>
            <!-- /.panel-heading -->
            <div class="panel-body">
              <div class="table-responsive">

                <!-- <div class="form-inline"> -->
                <div class="table-repsonsive">
                  <form method="post" id="insert_form_calculate">
                    <span id="error"></span>
                    <table class="table" id="input_table" style="border: none;">
                      <tr>
                        <th>Total Pieces/Size <input type="number" class="form-control" name="totalPcsSize" id="totalPcsSize" /></th>
                        <th>Total Pieces/Carton <input type="number" class="form-control" name="totalPcsCtn" id="totalPcsCtn" /></th>
                        <th>Total Carton/Pallet <input type="number" class="form-control" name="totalCTN" id="totalCTN" /></th>
                        <th>QA Max Pieces/Lot <input type="number" class="form-control" name="maxPCS" id="maxPCS" />
                        <th>QA Sample Inner/Carton <input type="number" class="form-control" name="sampleinner" id="sampleinner" />
                          <input type="hidden" class="form-control" name="limitCTN" id="limitCTN" />
                        </th>
                      </tr>
                    </table>
                    <button type="button" id="button_control_show" name="control" class="btn btn-warning control">Show</button>
                    <button type="button" id="button_control_hide" name="control" class="btn btn-danger control">Hide</button>
                    <div id="calculation_table">
                      <table class="table" id="carton_table" style="border: none;">
                        <tr>
                          <th>lot </th>
                          <th>Total Pallet/lot</th>
                          <th>Total Pcs/lot</th>
                          <!-- <th>Total Ctn/lot</th> -->
                          <th>Actual Total Ctn/lot</th>
                          <!-- <th>Balance Pcs </th> -->
                          <th style="display: none;">Formula </th>
                          <th>Total Sample Size </th>
                        </tr>

                        <tr>
                          <td>1 </td>
                          <td><input type="number" class="form-control" name="TPallet1" id="TPallet1" readonly /> </td>
                          <td><input type="number" class="form-control" name="TPcs1" id="TPcs1" readonly /> </td>
                          <!-- <td><input type="number" class="form-control" name="TCTN1" id="TCTN1" readonly /> </td> -->
                          <td><input type="number" class="form-control" name="ATCTN1" id="ATCTN1" readonly /> </td>
                          <!-- <td><input type="number" class="form-control" name="Balance1" id="Balance1" readonly /> </td> -->
                          <td style="display: none;"><input type="number" class="form-control" name="Formula1" id="Formula1" readonly /> </td>
                          <th><input type="number" class="form-control" name="TSS1" id="TSS1" readonly /> </td>
                        </tr>

                        <tr>
                          <td>2 </td>
                          <td><input type="number" class="form-control" name="TPallet2" id="TPallet2" readonly /> </td>
                          <td><input type="number" class="form-control" name="TPcs2" id="TPcs2" readonly /> </td>
                          <!-- <td><input type="number" class="form-control" name="TCTN2" id="TCTN2" readonly /> </td> -->
                          <td><input type="number" class="form-control" name="ATCTN2" id="ATCTN2" readonly /> </td>
                          <!-- <td><input type="number" class="form-control" name="Balance2" id="Balance2" readonly /> </td> -->
                          <td style="display: none;"><input type="number" class="form-control" name="Formula2" id="Formula2" readonly /> </td>
                          <th><input type="number" class="form-control" name="TSS2" id="TSS2" readonly /> </td>
                        </tr>

                        <tr>
                          <td>3 </td>
                          <td><input type="number" class="form-control" name="TPallet3" id="TPallet3" readonly /> </td>
                          <td><input type="number" class="form-control" name="TPcs3" id="TPcs3" readonly /> </td>
                          <!-- <td><input type="number" class="form-control" name="TCTN3" id="TCTN3" readonly /> </td> -->
                          <td><input type="number" class="form-control" name="ATCTN3" id="ATCTN3" readonly /> </td>
                          <!-- <td><input type="number" class="form-control" name="Balance3" id="Balance3" readonly /> </td> -->
                          <td style="display: none;"><input type="number" class="form-control" name="Formula3" id="Formula3" readonly /> </td>
                          <th><input type="number" class="form-control" name="TSS3" id="TSS3" readonly /> </td>
                        </tr>

                        <tr>
                          <td>4 </td>
                          <td><input type="number" class="form-control" name="TPallet4" id="TPallet4" readonly /> </td>
                          <td><input type="number" class="form-control" name="TPcs4" id="TPcs4" readonly /> </td>
                          <!-- <td><input type="number" class="form-control" name="TCTN4" id="TCTN4" readonly /> </td> -->
                          <td><input type="number" class="form-control" name="ATCTN4" id="ATCTN4" readonly /> </td>
                          <!-- <td><input type="number" class="form-control" name="Balance4" id="Balance4" readonly /> </td> -->
                          <td style="display: none;"><input type="number" class="form-control" name="Formula4" id="Formula4" readonly /> </td>
                          <th><input type="number" class="form-control" name="TSS4" id="TSS4" readonly /> </td>
                        </tr>

                        <tr>
                          <td>5 </td>
                          <td><input type="number" class="form-control" name="TPallet5" id="TPallet5" readonly /> </td>
                          <td><input type="number" class="form-control" name="TPcs5" id="TPcs5" readonly /> </td>
                          <!-- <td><input type="number" class="form-control" name="TCTN5" id="TCTN5" readonly /> </td> -->
                          <td><input type="number" class="form-control" name="ATCTN5" id="ATCTN5" readonly /> </td>
                          <!-- <td><input type="number" class="form-control" name="Balance5" id="Balance5" readonly /> </td> -->
                          <td style="display: none;"><input type="number" class="form-control" name="Formula5" id="Formula5" readonly /> </td>
                          <th><input type="number" class="form-control" name="TSS5" id="TSS5" readonly /> </td>
                        </tr>

                        <tr>
                          <td>6 </td>
                          <td><input type="number" class="form-control" name="TPallet6" id="TPallet6" readonly /> </td>
                          <td><input type="number" class="form-control" name="TPcs6" id="TPcs6" readonly /> </td>
                          <!-- <td><input type="number" class="form-control" name="TCTN6" id="TCTN6" readonly /> </td> -->
                          <td><input type="number" class="form-control" name="ATCTN6" id="ATCTN6" readonly /> </td>
                          <!-- <td><input type="number" class="form-control" name="Balance6" id="Balance6" readonly /> </td> -->
                          <td style="display: none;"><input type="number" class="form-control" name="Formula6" id="Formula6" readonly /> </td>
                          <th><input type="number" class="form-control" name="TSS6" id="TSS6" readonly /> </td>
                        </tr>

                        <tr>
                          <td>7 </td>
                          <td><input type="number" class="form-control" name="TPallet7" id="TPallet7" readonly /> </td>
                          <td><input type="number" class="form-control" name="TPcs7" id="TPcs7" readonly /> </td>
                          <!-- <td><input type="number" class="form-control" name="TCTN7" id="TCTN7" readonly /> </td> -->
                          <td><input type="number" class="form-control" name="ATCTN7" id="ATCTN7" readonly /> </td>
                          <!-- <td><input type="number" class="form-control" name="Balance7" id="Balance7" readonly /> </td> -->
                          <td style="display: none;"><input type="number" class="form-control" name="Formula7" id="Formula7" readonly /> </td>
                          <th><input type="number" class="form-control" name="TSS7" id="TSS7" readonly /> </td>
                        </tr>

                        <tr>
                          <td>8 </td>
                          <td><input type="number" class="form-control" name="TPallet8" id="TPallet8" readonly /> </td>
                          <td><input type="number" class="form-control" name="TPcs8" id="TPcs8" readonly /> </td>
                          <!-- <td><input type="number" class="form-control" name="TCTN8" id="TCTN8" readonly /> </td> -->
                          <td><input type="number" class="form-control" name="ATCTN8" id="ATCTN8" readonly /> </td>
                          <!-- <td><input type="number" class="form-control" name="Balance8" id="Balance8" readonly /> </td> -->
                          <td style="display: none;"><input type="number" class="form-control" name="Formula8" id="Formula8" readonly /> </td>
                          <th><input type="number" class="form-control" name="TSS8" id="TSS8" readonly /> </td>
                        </tr>

                        <tr>
                          <td>9 </td>
                          <td><input type="number" class="form-control" name="TPallet9" id="TPallet9" readonly /> </td>
                          <td><input type="number" class="form-control" name="TPcs9" id="TPcs9" readonly /> </td>
                          <!-- <td><input type="number" class="form-control" name="TCTN9" id="TCTN9" readonly /> </td> -->
                          <td><input type="number" class="form-control" name="ATCTN9" id="ATCTN9" readonly /> </td>
                          <!-- <td><input type="number" class="form-control" name="Balance9" id="Balance9" readonly /> </td> -->
                          <td style="display: none;"><input type="number" class="form-control" name="Formula9" id="Formula9" readonly /> </td>
                          <th><input type="number" class="form-control" name="TSS9" id="TSS9" readonly /> </td>
                        </tr>

                        <tr>
                          <td>10 </td>
                          <td><input type="number" class="form-control" name="TPallet10" id="TPallet10" readonly /> </td>
                          <td><input type="number" class="form-control" name="TPcs10" id="TPcs10" readonly /> </td>
                          <!-- <td><input type="number" class="form-control" name="TCTN10" id="TCTN10" readonly /> </td> -->
                          <td><input type="number" class="form-control" name="ATCTN10" id="ATCTN10" readonly /> </td>
                          <!-- <td><input type="number" class="form-control" name="Balance10" id="Balance10" readonly /> </td> -->
                          <td style="display: none;"><input type="number" class="form-control" name="Formula10" id="Formula10" /> </td>
                          <th><input type="number" class="form-control" name="TSS10" id="TSS10" readonly /> </td>
                        </tr>
                      </table>
                    </div>


                    <table class="table" id="AQL_table" style="border: none;">
                      <tr>
                        <th>AQL Holes
                          <select class="form-control" id="AQL_holes" name="AQL_holes">
                            <option class="form-control" value="N/A"> N/A</option>
                            <option class="form-control" value="0.065"> 0.065</option>
                            <option class="form-control" value="0.10"> 0.10</option>
                            <option class="form-control" value="0.15"> 0.15</option>
                            <option class="form-control" value="0.25"> 0.25</option>
                            <option class="form-control" value="0.40"> 0.40</option>
                            <option class="form-control" value="0.65"> 0.65</option>
                            <option class="form-control" value="1.00"> 1.0</option>
                            <option class="form-control" value="1.50"> 1.5</option>
                            <option class="form-control" value="2.50"> 2.5</option>
                            <option class="form-control" value="4.00"> 4.0</option>
                            <option class="form-control" value="6.50"> 6.5</option>
                          </select>
                        </th>
                        <th>AQL NFG
                          <select class="form-control" id="AQL_NFG" name="AQL_NFG">
                            <option class="form-control" value="N/A"> N/A</option>
                            <option class="form-control" value="0.065"> 0.065</option>
                            <option class="form-control" value="0.10"> 0.10</option>
                            <option class="form-control" value="0.15"> 0.15</option>
                            <option class="form-control" value="0.25"> 0.25</option>
                            <option class="form-control" value="0.40"> 0.40</option>
                            <option class="form-control" value="0.65"> 0.65</option>
                            <option class="form-control" value="1.00"> 1.0</option>
                            <option class="form-control" value="1.50"> 1.5</option>
                            <option class="form-control" value="2.50"> 2.5</option>
                            <option class="form-control" value="4.00"> 4.0</option>
                            <option class="form-control" value="6.50"> 6.5</option>
                          </select>
                        </th>
                        <th>AQL NAG
                          <select class="form-control" id="AQL_NAG" name="AQL_NAG">
                            <option class="form-control" value="N/A"> N/A</option>
                            <option class="form-control" value="0.065"> 0.065</option>
                            <option class="form-control" value="0.10"> 0.10</option>
                            <option class="form-control" value="0.15"> 0.15</option>
                            <option class="form-control" value="0.25"> 0.25</option>
                            <option class="form-control" value="0.40"> 0.40</option>
                            <option class="form-control" value="0.65"> 0.65</option>
                            <option class="form-control" value="1.00"> 1.0</option>
                            <option class="form-control" value="1.50"> 1.5</option>
                            <option class="form-control" value="2.50"> 2.5</option>
                            <option class="form-control" value="4.00"> 4.0</option>
                            <option class="form-control" value="6.50"> 6.5</option>
                          </select>
                        </th>
                        <th>AQL Major
                          <select class="form-control" id="AQL_Major" name="AQL_Major">
                            <option class="form-control" value="N/A"> N/A</option>
                            <option class="form-control" value="0.065"> 0.065</option>
                            <option class="form-control" value="0.10"> 0.10</option>
                            <option class="form-control" value="0.15"> 0.15</option>
                            <option class="form-control" value="0.25"> 0.25</option>
                            <option class="form-control" value="0.40"> 0.40</option>
                            <option class="form-control" value="0.65"> 0.65</option>
                            <option class="form-control" value="1.00"> 1.0</option>
                            <option class="form-control" value="1.50"> 1.5</option>
                            <option class="form-control" value="2.50"> 2.5</option>
                            <option class="form-control" value="4.00"> 4.0</option>
                            <option class="form-control" value="6.50"> 6.5</option>
                          </select>
                        </th>
                        <th>AQL Minor
                          <select class="form-control" id="AQL_Minor" name="AQL_Minor">
                            <option class="form-control" value="N/A"> N/A</option>
                            <option class="form-control" value="0.065"> 0.065</option>
                            <option class="form-control" value="0.10"> 0.10</option>
                            <option class="form-control" value="0.15"> 0.15</option>
                            <option class="form-control" value="0.25"> 0.25</option>
                            <option class="form-control" value="0.40"> 0.40</option>
                            <option class="form-control" value="0.65"> 0.65</option>
                            <option class="form-control" value="1.00"> 1.0</option>
                            <option class="form-control" value="1.50"> 1.5</option>
                            <option class="form-control" value="2.50"> 2.5</option>
                            <option class="form-control" value="4.00"> 4.0</option>
                            <option class="form-control" value="6.50"> 6.5</option>
                          </select>
                        </th>
                        <th>AQL Good Glove
                          <select class="form-control" id="AQL_GG" name="AQL_GG">
                            <option class="form-control" value="N/A"> N/A</option>
                            <option class="form-control" value="0.065"> 0.065</option>
                            <option class="form-control" value="0.10"> 0.10</option>
                            <option class="form-control" value="0.15"> 0.15</option>
                            <option class="form-control" value="0.25"> 0.25</option>
                            <option class="form-control" value="0.40"> 0.40</option>
                            <option class="form-control" value="0.65"> 0.65</option>
                            <option class="form-control" value="1.00"> 1.0</option>
                            <option class="form-control" value="1.50"> 1.5</option>
                            <option class="form-control" value="2.50"> 2.5</option>
                            <option class="form-control" value="4.00"> 4.0</option>
                            <option class="form-control" value="6.50"> 6.5</option>
                          </select>
                        </th>
                      </tr>
                    </table>
                    <button type="button" name="generate" class="btn btn-success generate">Generate details</button>

                  </form>
                  <!-- insert_form_calculate ENND -->

                </div>
                <!-- </div> -->

              </div>
            </div>
          </div>
        </div>



        <br>




        <!-- /.table-responsive -->
      </div>

      <div class="row">
        <div class="col-lg-13">
          <div class="panel panel-primary">
            <div class="panel-heading">Preset Pallet Details</div>
            <!-- /.panel-heading -->
            <div class="panel-body">
              <div class="table-responsive">

                <!-- <div class="form-inline"> -->

                <form method="post" id="insert_formB">
                  <span id="error"></span>
                  <table id="item_table" style="border: none;">
                    <tr>
                      <th>Size</th>
                      <th>SO Item Number</th>
                      <th>Lot Count</th>
                      <th>Pallet Number</th>
                      <th>1. Sampling Ctn /Pallet</th>
                      <th>1. Sample Inner /Ctn</th>
                      <th>1. Sampling Pcs /Inner</th>
                      <th>2. Sampling Ctn /Pallet</th>
                      <th>2. Sample Inner /Ctn </th>
                      <th>2. Sampling Pcs /Inner </th>
                      <th>Sample Size Visual</th>
                      <th>Sample Size APT/WTT</th>
                      <th>Acc Hole</th>
                      <th>Acc Critical NFG</th>
                      <th>Acc Critical NAG</th>
                      <th>Acc Major</th>
                      <th>Acc Minor</th>
                      <th>Acc Good Glove</th>
                      <th><button type="button" name="add" class="btn btn-success btn-sm add"><span class="glyphicon glyphicon-plus"></span></button></th>
                    </tr>

                    <?php
                    function size_selection($connect, $M_GloveSize)
                    {
                      $outputSize_ = '';
                      foreach ($M_GloveSize as $row) {
                        $outputSize_ .= '<option value="' . $row["GloveSizeCodeLong"] . '">' . $row["GloveSizeCodeLong"] . '</option>';
                      }
                      return $outputSize_;
                    }

                    function surface_selection($connect, $M_GloveSurface)
                    {
                      $outputSurface_ = '';
                      foreach ($M_GloveSurface as $row) {
                        $outputSurface_ .= '<option value="' . $row["GloveSurfaceCode"] . '">' . $row["GloveSurfaceName"] . '</option>';
                      }
                      return $outputSurface_;
                    }

                    ?>
                  </table>

                  <div align="center">
                    <input type="submit" name="submit" class="btn btn-info" value="Insert" />
                  </div>
                </form>
                <!-- FORM B END -->
                <div id="test">

                </div>

                <!-- </div> -->

              </div>
              <!-- table-responsive -->
            </div>
            <!-- panel-body-->
          </div>
          <!-- panel-primary -->
        </div>
        <!-- col-lg-13 -->


        <br>

      </div>
      <!-- /.row -->
    </div>
    <!-- /page-wrapper -->
  </div>
  <!-- /#wrapper -->



  <?php include('script.php'); ?>
  <?php include('script-Preset-FG.php'); ?>

  <!-- Page-Level Demo Scripts - Tables - Use for reference -->
  <style>
    .selected {
      background-color: #a2ff9e;
      color: #000000;
    }

    td {
      cursor: pointer;
    }

    .btn-info {
      color: #000000;
    }
  </style>

  <script>
    $(document).ready(function() {


      $('#button_control_show').click(function() {
        $('#calculation_table').show();
      });
      $('#button_control_hide').click(function() {
        $('#calculation_table').hide();
      });


      $('#insert_formB').on('submit', function(event) {
        event.preventDefault();
        //event.preventDefault();
        var error = '';

        if ($('#PlantKey').val() === '') {
          $('#PlantKey').focus();
          error = 'Factory not selected';
        } else if ($('#SONumber').val() === '') {
          error = 'SO number not inserted.';
        } else if ($('#ItemNumber').val() === '') {
          error = 'Item number not inserted.';
        } else if ($('#InspectionPlanKey').val() === '') {
          $('#InspectionPlanKey').focus();
          error = 'Category not inserted.';
        } else if ($('#GloveColourKey').val() === '') {
          $('#GloveColourKey').focus();
          error = 'Colour not inserted.';
        } else if ($('#lotcount').val() === '') {
          error = 'Lot Count not inserted.';
        } else if ($('#lotnumber').val() === '') {
          error = 'Lot number not inserted.';
        } else if ($('#GloveProductTypeKey').val() === '') {
          $('#GloveProductTypeKey').focus();
          error = 'Product type not inserted.';
        } else if ($('#GloveCodeKey').val() === '') {
          $('#GloveCodeKey').focus();
          error = 'Product code not inserted.';
        }

        var tableCount = $('#item_table tr').length;
        // alert(tableCount);
        var _i_ = 1;
        while (_i_ < (tableCount)) {
          if ($('.itemnumber' + _i_).val() === '0') {
            error = 'item number cannot be 0';
          }
          _i_ += 1;
        }



        var form_dataA = $('#insert_formA').serializeArray();
        var form_dataB = $(this).serializeArray();
        var form_dataC = {
          0: {
            name: 'AQLHoles',
            value: $('#AQL_holes').val()
          },
          1: {
            name: 'AQL_NFG',
            value: $('#AQL_NFG').val()
          },
          2: {
            name: 'AQL_NAG',
            value: $('#AQL_NAG').val()
          },
          3: {
            name: 'AQL_Major',
            value: $('#AQL_Major').val()
          },
          4: {
            name: 'AQL_Minor',
            value: $('#AQL_Minor').val()
          },
          5: {
            name: 'AQL_GG',
            value: $('#AQL_GG').val()
          }
        };

        console.log(form_dataA);
        console.log(form_dataB);
        console.log(form_dataC);

        if (error == '') {

          let _GloveStatus = 9;

          $("#test").load("transaction-Preset.php", {
            form_dataA: form_dataA,
            form_dataB: form_dataB,
            form_dataC: form_dataC,
            glove_status: _GloveStatus

          });

          // event.preventDefault();

          alert("Data saved!");
          window.location.href = "form-Preset-FGExist.php";
        } else {
          // $('#error').html('<div class="alert alert-danger">'+error+'</div>');
          alert("Form not complete. " + error);
          event.preventDefault();
        }
      });
    });
  </script>
  <style>
    .toolt {
      cursor: pointer;
      position: relative;
      display: inline-block;
    }

    .toolttext {
      opacity: 0;
      z-index: 99;
      color: #bbb;
      width: 190px;
      display: block;
      font-size: 11px;
      padding: 5px 10px;
      border-radius: 3px;
      text-align: center;
      text-shadow: 1px 1px 2px #111;
      background: rgba(51, 51, 51, 0.9);
      border: 1px solid rgba(34, 34, 34, 0.9);
      box-shadow: 0 0 3px rgba(0, 0, 0, 0.5);
      -webkit-transition: all .2s ease-in-out;
      -moz-transition: all .2s ease-in-out;
      -o-transition: all .2s ease-in-out;
      -ms-transition: all .2s ease-in-out;
      transition: all .2s ease-in-out;
      -webkit-transform: scale(0);
      -moz-transform: scale(0);
      -o-transform: scale(0);
      -ms-transform: scale(0);
      transform: scale(0);
      position: absolute;
      right: -165px;
      bottom: 30px;
    }

    /* triangle punya css */
    .toolttext:before,
    .toolttext:after {
      content: '';
      border-left: 0px solid transparent;
      border-right: 10px solid transparent;
      border-top: 10px solid rgba(51, 51, 51, 0.9);
      position: absolute;
      bottom: -10px;
      left: 10%;
    }

    .toolt:hover .toolttext,
    a:hover .toolttext {
      opacity: 1;
      -webkit-transform: scale(1);
      -moz-transform: scale(1);
      -o-transform: scale(1);
      -ms-transform: scale(1);
      transform: scale(1);
    }
  </style>
</body>

</html>