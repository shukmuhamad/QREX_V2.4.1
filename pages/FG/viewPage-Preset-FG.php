  <!-- Print Result  -->
  <?php
  include('../includes/database_connection.php');
  include('../includes/session.php');
  include('../includes/header.php');

  $lotID = $_GET['LotIDKey'];
  $RecordID = $_GET['RecordID'];

  // echo $lotID;
  // echo "<br />".$RecordID;
  ?>

  <body>

    <nav style="background-color:rgba(0, 0, 0, 0.1);" class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand"><b>QUALITY RECORD E SYSTEM (QREX) - FG</b></a>
        </div>
      </div>
    </nav>

    <?php
    $sql = "SELECT T_Lot_FG_Preset.LotIDKey,DimPlant.PlantName,T_Lot_FG_Preset.SONumber,
      T_Lot_FG_Preset.SOItemNumber,M_Brand.BrandName,M_CUSTOMER.CustomerName,M_GloveSize.GloveSizeCodeLong,
      M_GloveColour.GloveColourName,T_Lot_FG_Preset.LotCount,T_Lot_FG_Preset.LotNumber,
      M_GloveProductType.GloveProductTypeName,M_GloveCode.GloveCodeLong,M_InspectionPlan.InspectionPlanName,
      T_Lot_FG_Preset.PalletNumber,T_Lot_FG_Preset.FGCondition, T_Lot_FG_Preset.CartonPerPallet, T_Lot_FG_Preset.CartonPerPallet_2
      ,T_Lot_FG_Preset.Country, T_Lot_FG_Preset.so_line_item, T_Lot_FG_Preset.InnerPerCarton_1, T_Lot_FG_Preset.InnerPerCarton_2
	    , T_Lot_FG_Preset.PcsPerInner_1, T_Lot_FG_Preset.PcsPerInner_2, T_Lot_FG_Preset.material_code, M_GloveSurface.GloveSurfaceName
      FROM T_Lot_FG_Preset WITH (NOLOCK)
      LEFT JOIN DimPlant ON DimPlant.PlantKey = T_Lot_FG_Preset.PlantKey
      LEFT JOIN M_CUSTOMER ON M_Customer.CustomerKey = T_Lot_FG_Preset.CustomerKey
      LEFT JOIN M_Brand ON M_Brand.BrandKey = T_Lot_FG_Preset.BrandKey
      LEFT JOIN M_InspectionPlan ON M_InspectionPlan.InspectionPlanKey = T_Lot_FG_Preset.InspectionPlanKey
      LEFT JOIN M_GloveCode ON M_GloveCode.GloveCodeKey = T_Lot_FG_Preset.GloveCodeKey
      LEFT JOIN M_GloveColour ON M_GloveColour.GloveColourKey = T_Lot_FG_Preset.GloveColourKey
      LEFT JOIN M_GloveProductType ON M_GloveProductType.GloveProductTypeKey = T_Lot_FG_Preset.GloveProductTypeKey
      LEFT JOIN M_GloveSize ON M_GloveSize.GloveSizeKey = T_Lot_FG_Preset.GloveSizeKey
      LEFT JOIN M_GloveSurface ON M_GloveSurface.GloveSurfaceKey = T_Lot_FG_Preset.GloveSurfaceKey
      WHERE T_Lot_FG_Preset.LotIDKey = ?;";

    $sql .= "SELECT T_Record_SampleSize_Preset.RecordID,M_Test.TestName,T_Record_SampleSize_Preset.SampleSizeValue
      FROM T_Record_SampleSize_Preset WITH (NOLOCK)
      INNER JOIN M_Test ON M_TEST.TestKey = T_Record_SampleSize_Preset.SampleSizeCategoryKey
      WHERE RECORDID IN
      (
      	SELECT RECORDID FROM T_Record_Master WHERE LotIDKey = ?
      );";

    $sql .= "SELECT T_Record_AQL_Preset.RecordID,M_Test.TestName,T_Record_AQL_Preset.AQLValue
      FROM T_Record_AQL_Preset WITH (NOLOCK)
      INNER JOIN M_Test ON M_Test.TestKey = T_Record_AQL_Preset.AQLDescriptionKey
      WHERE RECORDID IN
      (
      	SELECT RECORDID FROM T_Record_Master WHERE LotIDKey = ?
      );";

    $sql .= "SELECT * FROM T_Record_Master WITH (NOLOCK) WHERE LotIDKey = ?;";

    $query = $connect->prepare($sql);
    $query->bindParam(1, $lotID);
    $query->bindParam(2, $lotID);
    $query->bindParam(3, $lotID);
    $query->bindParam(4, $lotID);
    $query->execute();
    $T_Lot_FG_Preset = $query->fetch();
    $_SESSION['T_Lot_FG_Preset'] = $T_Lot_FG_Preset;
    $query->nextRowset();
    $T_Record_SampleSize_Preset = $query->fetchAll();
    $_SESSION['T_Record_SampleSize_Preset'] = $T_Record_SampleSize_Preset;
    //echo $T_Lot_PackingDate['PackingDate'];
    $query->nextRowset();
    $T_Record_AQL_Preset = $query->fetchAll();
    $_SESSION['T_Record_AQL_Preset'] = $T_Record_AQL_Preset;
    $query->nextRowset();
    $T_Record_Master = $query->fetch();
    $_SESSION['T_Record_Master'] = $T_Record_Master;

    $AQLResult_pivot = array();
    for ($i = 0; $i < count($T_Record_AQL_Preset); $i++) {
      $AQLResult_pivot_temp = array(
        $T_Record_AQL_Preset[$i]['TestName'] => $T_Record_AQL_Preset[$i]['AQLValue']
      );
      $AQLResult_pivot = array_merge($AQLResult_pivot, $AQLResult_pivot_temp);
    }

    ?>

    <div class="container-fluid">

      <div class="panel panel-primary">
        <div class="panel-heading">
          Customer Information
        </div>

        <div class="panel-body">
          <div class="row">

            <div class="col-lg-6">

              <div class="form-group">

                Factory:
                <label> <?php echo $T_Lot_FG_Preset['PlantName']; ?> </label>
              </div>

              <div class="form-group">
                SO Number:
                <label><?php echo $T_Lot_FG_Preset['SONumber']; ?></label>
              </div>

              <div class="form-group">
                Item Number:
                <label><?php echo $T_Lot_FG_Preset['SOItemNumber']; ?></label>
              </div>

              <div class="form-group">
                SO Line Number:
                <label><?php echo $T_Lot_FG_Preset['so_line_item']; ?></label>
              </div>

              <div class="form-group">
                Brand:
                <label><?php echo $T_Lot_FG_Preset['BrandName']; ?></label>
              </div>

              <div class="form-group">
                Customer:
                <label><?php echo $T_Lot_FG_Preset['CustomerName']; ?></label><br>
              </div>

              <div class="form-group">
                Category:
                <label><?php echo $T_Lot_FG_Preset['InspectionPlanName']; ?></label></br>
              </div>

              <div class="form-group">
                Material Code:
                <label><?php echo $T_Lot_FG_Preset['material_code']; ?></label></br>
              </div>








              <div class="form-group">
                Status:
                <label>
                  <?php if ($T_Record_Master['RecordStatusFlag'] == 1) {
                    echo 'N/A';
                  } else if ($T_Record_Master['RecordStatusFlag'] == 2) {
                    echo 'Reinspect';
                  } else if ($T_Record_Master['RecordStatusFlag'] == 3) {
                    echo 'Convert Inspection';
                  } else if ($T_Record_Master['RecordStatusFlag'] == 4) {
                    echo 'Repack Inspection';
                  } else if ($T_Record_Master['RecordStatusFlag'] == 5) {
                    echo 'Convert To';
                  } else if ($T_Record_Master['RecordStatusFlag'] == 6) {
                    echo 'Convert From';
                  } else if ($T_Record_Master['RecordStatusFlag'] == 7) {
                    echo 'Fresh Glove';
                  } else if ($T_Record_Master['RecordStatusFlag'] == 8) {
                    echo 'Reworked Glove';
                  } else if ($T_Record_Master['RecordStatusFlag'] == 9) {
                    echo 'Free Stock';
                  } ?>
                </label></br>
              </div>
            </div>

            <div class="col-lg-6">

              <div class="form-group">
                <?php $date = date("d/m/Y h:i:s A", strtotime($T_Record_Master['RecordCreatedDateTime'])); ?>
                Date:
                <label><?php echo $date; ?></label>
              </div>


              <div class="form-group">
                Size:<label> <?php echo $T_Lot_FG_Preset['GloveSizeCodeLong']; ?> </label></br>
              </div>

              <div class="form-group">
                Pallet NO: <label> <?php echo $T_Lot_FG_Preset['PalletNumber']; ?></label></br>
              </div>

              <div class="form-group">
                Colour: <label><?php echo $T_Lot_FG_Preset['GloveColourName']; ?></label>
              </div>

              <div class="form-group">

                Lot Count:
                <label> <?php echo $T_Lot_FG_Preset['LotCount']; ?> </label>
              </div>

              <div class="form-group">
                LOT NO:
                <label><?php echo $T_Lot_FG_Preset['LotNumber']; ?></label>
              </div>

              <div class="form-group">
                Product :<label><?php echo $T_Lot_FG_Preset['GloveProductTypeName']; ?></label>
              </div>

              <div class="form-group">
                Product Code: <label><?php echo $T_Lot_FG_Preset['GloveCodeLong']; ?></label>
              </div>

              <div class="form-group">
                Inspection Stage: <label><?php
                                          if ($T_Lot_FG_Preset['FGCondition'] == 1) {
                                            echo 'Finished Good';
                                          } else {
                                            echo 'Finished Good Overall (Combined Size)';
                                          }
                                          ?></label>
              </div>

              <div class="form-group">
                Surface: <label><?php echo $T_Lot_FG_Preset['GloveSurfaceName']; ?></label>
              </div>

            </div>

            <div class="col-lg-12">

              <div class="form-group col-lg-2">
                1. Sampling Ctn /Pallet: <label><?php echo $T_Lot_FG_Preset['CartonPerPallet']; ?></label>
              </div>
              <!-- /.form-group -->

              <div class="form-group col-lg-2">
                1. Sampling Inner /Ctn: <label><?php echo $T_Lot_FG_Preset['InnerPerCarton_1']; ?></label>
              </div>
              <!-- /.form-group -->

              <div class="form-group col-lg-2">
                1. Sampling Pcs /Inner: <label><?php echo $T_Lot_FG_Preset['PcsPerInner_1']; ?></label>
              </div>
              <!-- /.form-group -->

              <div class="form-group col-lg-2">
                2. Sampling Ctn /Pallet: <label><?php echo $T_Lot_FG_Preset['CartonPerPallet_2']; ?></label>
              </div>
              <!-- /.form-group -->

              <div class="form-group col-lg-2">
                2. Sampling Inner /Ctn: <label><?php echo $T_Lot_FG_Preset['InnerPerCarton_2']; ?></label>
              </div>
              <!-- /.form-group -->

              <div class="form-group col-lg-2">
                2. Sampling Pcs /Inner: <label><?php echo $T_Lot_FG_Preset['PcsPerInner_2']; ?></label>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col-lg-12 -->
          </div>
        </div>

      </div><br>

      <!----------------------------------------------------------- INSPECTION RECORD --------------------------------------------------------------------->
      <div class="panel panel-primary">
        <div class="panel-heading">
          Inspection Record
        </div>
      </div>
      <div class="col-lg-12">
        <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">

          <tr>
            <th scope="col" class="info">SAMPLE SIZE APT/WTT (LEVEL 1):</th>
            <td><?php echo $T_Record_SampleSize_Preset[1]['SampleSizeValue']; ?></td>

            <th scope="col" class="info">SAMPLE SIZE VT:</th>
            <td><?php echo $T_Record_SampleSize_Preset[0]['SampleSizeValue']; ?></td>
          </tr>

          <tr>
            <th scope="col" class="info">SAMPLE SIZE APT/WTT (LEVEL 2):</th>
            <td></td>

            <th scope="col" class="info">MACHINE ID:</th>
            <td></td>

          </tr>
        </table>

        <td><b>**Inspection Plan & Level </b><a class="btn btn-default" data-toggle="modal" data-target="#remark" href="pdf/GL PQC S07 Inspection Plan 1.1 Published.pdf" target="iframe_i">?</a><br></td>
        <td><b>*Glove Inspection</b></td>

        <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">
          <tr class="info">
            <th></th>
            <th colspan="2" width="13%">MINOR VISUAL</th>
            <th colspan="4" width="30%">MAJOR VISUAL</th>
            <th colspan="3" width="18%">CRITICAL NAG</th>
            <th colspan="3" width="13%">CRITICAL NFG</th>
            <th colspan="2" width="13%">FREEDOM FROM HOLES LEVEL 1</th>
            <th colspan="2" width="13%">GOOD GLOVES</th>
          </tr>
          <tr>
            <th scope="col" class="info">AQL:</th>
            <td colspan="2"></td>
            <td colspan="4"></td>
            <td colspan="3"></td>
            <td colspan="3"></td>
            <td colspan="2"></td>
            <td colspan="2"></td>
          </tr>

          <tr>
            <th scope="col" class="info">Acceptance:</th>
            <td colspan="2"><?php echo $AQLResult_pivot['AcceptanceMinor']; ?></td>
            <td colspan="4"><?php echo $AQLResult_pivot['AcceptanceMajor']; ?></td>
            <td colspan="3"><?php echo $AQLResult_pivot['AcceptanceNAG_CP']; ?></td>
            <td colspan="3"><?php echo $AQLResult_pivot['AcceptanceNFG']; ?></td>
            <td colspan="2"><?php echo $AQLResult_pivot['AcceptanceHoles1']; ?></td>
            <td colspan="2"><?php echo $AQLResult_pivot['AcceptanceGG']; ?></td>
          </tr>

        </table>


        <div class="form-group">
          Verified By:<label></label>
        </div>

        <div class="form-group">

          Date:<label></label>
        </div>

        <form method="post" id="presetviewForm">
          <center>
            <?php
            if ($_SESSION['PositionKey'] == 1) {
            ?>
              <a class="btn btn-success" target="_blank" href="form-Preset-FGEdit.php?LotIDKey=<?php echo $lotID; ?>&RecordID=<?php echo $RecordID; ?>"> Update/Verify</a>&nbsp;&nbsp;&nbsp;&nbsp;
              <input type="submit" name="delete" class="btn btn-danger" value="Delete" />&nbsp;&nbsp;
            <?php
            }

            if (isset($_POST['delete'])) {
              $sql = "DELETE FROM T_Lot_FG_Preset WHERE LotIDKey = ?;";
              $sql .= "DELETE FROM T_Record_AQL_Preset WHERE RecordID in (SELECT RecordID from T_Record_Master WHERE LotIDKey = ?);";
              $sql .= "DELETE FROM T_Record_SampleSize_Preset WHERE RecordID in (SELECT RecordID from T_Record_Master WHERE LotIDKey = ?);";
              $sql .= "DELETE FROM T_Record_Master WHERE RecordID in (SELECT RecordID from T_Record_Master WHERE LotIDKey = ?);";
              $sql .= "DELETE FROM T_Lot_Master WHERE LotIDKey = ?;";

              $query = $connect->prepare($sql);
              $query->bindParam(1, $lotID);
              $query->bindParam(2, $lotID);
              $query->bindParam(3, $lotID);
              $query->bindParam(4, $lotID);
              $query->bindParam(5, $lotID);
              $query->execute();

              echo '<script>
                              alert("Pallet Preset Deleted!");
                              location.replace("table-FG-OverallUpdate.php");
                              </script>';
            }
            ?>

            <a target="" href="#" role="button" class="btn btn-primary" title="Print" onClick="window.print()"><i class="glyphicon glyphicon-print"></i>&nbsp;Print</a>
          </center><br><br>
        </form>
      </div>
    </div>
    <!-- /.col-lg-6 (nested) -->
    <div class="col-lg-6">




    </div>
    <br><br><br>
    <!-- /.col-lg-6 (nested) -->
    </div>
    <!-- /.row (nested) -->
    </div>
    <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->


    </div>
    <!-- /#page-wrapper -->
    </div>
    </div>

    <?php
    //If user role is general, hide Update/Verify & Reinspect button
    if ($_SESSION['PositionKey'] == 2) {
      echo '<script>$(".btn-success").hide();$(".btn-warning").hide();</script>';
    } //If user role is worker, hide Update/Verify button
    elseif ($_SESSION['PositionKey'] == 0) {
      echo '<script>$(".btn-success").hide();</script>';
    }
    ?>
    <div style="text-align:center; margin-right:10px;" class="navbar navbar-default navbar-fixed-bottom">
      <label>Copyright © 2021 by QA PQC SQUAD</label>
    </div>
  </body>

  </html>