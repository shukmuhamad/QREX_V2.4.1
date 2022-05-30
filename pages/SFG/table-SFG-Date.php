<?php
include('../includes/database_connection.php');
include('../includes/session.php');
include('../includes/header.php');

if (isset($_POST['search'])) {

  $_SESSION['Ofactory'] = $_POST['factory'];
  $_SESSION['OstartDate'] = $_POST['startDate'];
  $_SESSION['OendDate'] = $_POST['endDate'];
}
if (!isset($_POST['search'])) {
  $_SESSION['Ofactory'] = NULL;
  $_SESSION['OstartDate'] = NULL;
  $_SESSION['OendDate'] = NULL;
}
?>

<body>
  <div id="wrapper">
    <?php include('../navbar/navbar.php'); ?>

    <div id="page-wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header">SFG Summary By Date</h1>
        </div>
        <!-- /.col-lg-12 -->
      </div>
      <!-- /.row -->

      <div class="panel panel-primary">
        <div class="panel-heading">
          SFG Summary By Date
        </div>
        <!-- /.panel-heading -->

        <div class="panel-body">

          <form method="POST">

            <div class="col-md-2">
              <div class="form-group">
                <?php
                $smt = $connect->prepare('SELECT PlantName From DimPlant');
                $smt->execute();
                $data = $smt->fetchAll();
                ?>

                <label>Factory</label>
                <select class="form-control" name="factory" required>
                  <?php if ($_SESSION['Ofactory'] != '') {
                  ?>
                    <option value="<?php echo $_SESSION['Ofactory']; ?>"><?php echo $_SESSION['Ofactory']; ?></option>
                  <?php
                  } else {
                  ?>
                    <option value="">Select Factory</option>
                  <?php
                  } ?>
                  <?php
                  foreach ($data as $row) {
                  ?>
                    <option value="<?php echo $row['PlantName']; ?>"><?php echo $row['PlantName'];
                                                                    } ?></option>
                </select>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col-md-2 -->

            <div class="col-md-2">
              <div class="form-group">
                <label>Start Date</label>
                <input class="form-control" type="date" name="startDate" onkeydown="return false" value="<?php
                                                                                                          if ($_SESSION['OstartDate'] != '') {
                                                                                                            echo date('Y-m-d', strtotime($_SESSION['OstartDate']));
                                                                                                          } else {
                                                                                                          }
                                                                                                          ?>" required>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col-md-2 -->

            <div class="col-md-2">
              <div class="form-group">
                <label>End Date</label>
                <input class="form-control" type="date" name="endDate" onkeydown="return false" value="<?php
                                                                                                        if ($_SESSION['OendDate'] != '') {
                                                                                                          echo date('Y-m-d', strtotime($_SESSION['OendDate']));
                                                                                                        } else {
                                                                                                        }
                                                                                                        ?>" required>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col-md-2 -->

            <button class="btn btn-success" name="search" style="margin-top:25px;">
              <i class="fa fa-search"></i>
              Search
            </button>

          </form>
          <br>

          <div class="col-md-12">

            <div class="table-responsive">

              <table class="table table-bordered" id="tableID" width="30%" cellspacing="0">
                <thead>


                  <tr class="info">
                    <th rowspan="2">Action</th>
                    <th rowspan="2">Lot Count</th>
                    <th rowspan="2">Factory</th>
                    <th rowspan="2">Customer</th>
                    <th rowspan="2">Brand</th>
                    <th rowspan="2">Product</th>
                    <th rowspan="2">Product Code</th>
                    <th rowspan="2">Colour</th>
                    <th rowspan="2">Inspection Date</th>
                    <th rowspan="2">Production Date</th>
                    <th rowspan="2">Production Line</th>
                    <th rowspan="2">Shift</th>
                    <th rowspan="2">Packing Date</th>
                    <th rowspan="2">Category</th>
                    <th rowspan="2">Glove Size</th>
                    <th rowspan="2">Sample Size VT (Visual Test)</th>
                    <th rowspan="2">Sample Size APT/WTT level 1</th>
                    <th rowspan="2">Sample Size APT/WTT level 2</th>
                    <th rowspan="2">Batch Number</th>
                    <th rowspan="2">Carton Quantity</th>
                    <th rowspan="2">Carton Number</th>
                    <th rowspan="2">Inspection Count</th>
                    <th colspan="7">Defects</th>
                    <th colspan="6">Acceptance</th>
                    <th rowspan="2">Glove weight</th>
                    <th rowspan="2">Overall AQL</th>
                    <th rowspan="2">Disposition</th>
                    <th rowspan="2">Glove Status</th>
                    <th rowspan="2">UD Result Code</th>
                    <th rowspan="2">Counting</th>
                    <th rowspan="2">Donning and Tearing</th>
                    <th rowspan="2">Lot ID</th>
                    <th rowspan="2">Check By(Badge ID)</th>
                    <th rowspan="2">Check By(Name)</th>
                    <th rowspan="2">Verify By(Badge ID)</th>
                    <th rowspan="2">Verify By(Name)</th>
                  </tr>

                  <tr class="info">
                    <th>Total Barrier</th>
                    <th>Total Holes 1</th>
                    <th>Total Holes 2</th>
                    <th>Total Defects Critical NFG</th>
                    <th>Total Defects Critical NAG</th>
                    <th>Total Defects Major</th>
                    <th>Total Defects Minor</th>
                    <th>Acc Holes 1</th>
                    <th>Acc Holes 2</th>
                    <th>Acc Critical NFG</th>
                    <th>Acc Critical NAG</th>
                    <th>Acc Major</th>
                    <th>Acc Minor</th>
                  </tr>
                </thead>
                <tbody>

                  <?php
                  if (isset($_POST['search'])) {

                    $factory = $_POST['factory'];
                    $_SESSION['Ofactory'] = $_POST['factory'];

                    $startDate = date('Y-m-d', strtotime($_POST['startDate']));
                    $_SESSION['OstartDate'] = $_POST['startDate'];

                    $endDate = date('Y-m-d', strtotime($_POST['endDate'] . '+ 1day'));
                    $_SESSION['OendDate'] = $_POST['endDate'];

                    $null = NULL;

                    $query = "{CALL SP_View_All_SFG(?, ?, ?)}";

                    $stmt = $connect->prepare($query);
                    $stmt->bindParam(1, $factory);
                    $stmt->bindParam(2, $startDate);
                    $stmt->bindParam(3, $endDate);
                    $stmt->execute();

                    while ($row = $stmt->fetch()) {
                  ?>

                      <tr class="text-center">
                        <td>
                          <a class="btn btn-success" href="viewPage-SFG.php?LotIDKey=<?php echo $row['LotIDKey']; ?>&RecordID=<?php echo $row['RecordID']; ?>" target="_blank">
                            VIEW
                          </a>
                        </td>
                        <td><?php echo $row['LotCount']; ?></td>
                        <td><?php echo $row['Factory']; ?></td>
                        <td><?php echo $row['CustomerName']; ?></td>
                        <td><?php echo $row['BrandName']; ?></td>
                        <td><?php echo $row['GloveProductTypeName']; ?></td>
                        <td><?php echo $row['GloveCodeLong']; ?></td>
                        <td><?php echo $row['GloveColourName']; ?></td>
                        <td><?php echo date('d/m/Y', strtotime($row['RecordCreatedDateTime'])); ?></td>
                        <td><?php echo $row['ProductionDate']; ?></td>
                        <td><?php echo $row['ProductionLine']; ?></td>
                        <td><?php echo $row['Shift']; ?></td>
                        <td><?php echo date('d/m/Y', strtotime($row['PackingDate'])); ?></td>
                        <td><?php echo $row['InspectionPlanName']; ?></td>
                        <td><?php echo $row['GloveSizeCodeLong']; ?></td>
                        <td><?php echo $row['SampleSizeVisual']; ?></td>
                        <td><?php echo $row['SampleSizeAPT/WTTLevel1']; ?></td>
                        <td><?php echo $row['SampleSizeAPT/WTTLevel2']; ?></td>
                        <td><?php echo $row['BatchNumber']; ?></td>
                        <td><?php echo $row['CartonQuantity']; ?></td>
                        <td><?php echo $row['CartonNumber']; ?></td>
                        <td><?php echo $row['InspectionCount']; ?></td>
                        <!-- total holes is total barrier = total holes 1 + total holes 2 + total NFG-->
                        <td><?php echo $row['TotalHoles']; ?></td>
                        <?php if ($row['TotalHoles1'] <= $row['AcceptanceHoles1']) { ?>
                          <td bgcolor="#7cff76">
                          <?php } else { ?>
                          <td bgcolor="#ff6767"> <?php } ?>
                          <?php echo $row['TotalHoles1']; ?></td>

                          <?php if ($row['TotalHoles2'] <= $row['AcceptanceHoles2']) { ?>
                            <td bgcolor="#7cff76">
                            <?php } else { ?>
                            <td bgcolor="#ff6767"> <?php } ?>
                            <?php echo $row['TotalHoles2']; ?></td>


                            <?php if ($row['TotalNonFunctionalCritical'] <= $row['AcceptanceNonFunctionalCritical']) { ?>
                              <td bgcolor="#7cff76">
                              <?php } else { ?>
                              <td bgcolor="#ff6767"> <?php } ?>
                              <?php echo $row['TotalNonFunctionalCritical']; ?></td>


                              <?php if ($row['TotalNAG_CP'] <= $row['AcceptanceNonAcceptableCritical']) { ?>
                                <td bgcolor="#7cff76">
                                <?php } else { ?>
                                <td bgcolor="#ff6767"> <?php } ?>
                                <?php echo $row['TotalNAG_CP']; ?></td>


                                <?php if ($row['TotalDefectMajorVisual'] <= $row['AcceptableMajorVisual']) { ?>
                                  <td bgcolor="#7cff76">
                                  <?php } else { ?>
                                  <td bgcolor="#ff6767"> <?php } ?>
                                  <?php echo $row['TotalDefectMajorVisual']; ?></td>


                                  <?php if ($row['TotalDefectMinorVisual'] <= $row['AcceptableMinorVisual']) { ?>
                                    <td bgcolor="#7cff76">
                                    <?php } else { ?>
                                    <td bgcolor="#ff6767"> <?php } ?>
                                    <?php echo $row['TotalDefectMinorVisual']; ?></td>

                                    <td><?php echo $row['AcceptanceHoles1']; ?></td>
                                    <td><?php echo $row['AcceptanceHoles2']; ?></td>
                                    <td><?php echo $row['AcceptanceNonFunctionalCritical']; ?></td>
                                    <td><?php echo $row['AcceptanceNonAcceptableCritical']; ?></td>
                                    <td><?php echo $row['AcceptableMajorVisual']; ?></td>
                                    <td><?php echo $row['AcceptableMinorVisual']; ?></td>
                                    <td><?php echo $row['GloveWeightAverage']; ?></td>
                                    <td><?php echo $row['OverallAQL']; ?></td>
                                    <td><?php echo $row['FinalDisposition']; ?></td>
                                    <td><?php if ($row['RecordStatusFlag'] == 1) {
                                          echo 'N/A';
                                        } else if ($row['RecordStatusFlag'] == 2) {
                                          echo 'Reinspect';
                                        } else if ($row['RecordStatusFlag'] == 3) {
                                          echo 'Convert Inspection';
                                        } else if ($row['RecordStatusFlag'] == 4) {
                                          echo 'Repack Inspection';
                                        } else if ($row['RecordStatusFlag'] == 5) {
                                          echo 'Convert To';
                                        } else if ($row['RecordStatusFlag'] == 6) {
                                          echo 'Convert From';
                                        } else if ($row['RecordStatusFlag'] == 7) {
                                          echo 'Fresh Glove';
                                        } else if ($row['RecordStatusFlag'] == 8) {
                                          echo 'Reworked Glove';
                                        } ?></td>
                                    <td><?php echo $row['UDResultCode']; ?></td>
                                    <td><?php echo $row['CountingTest']; ?></td>
                                    <td><?php echo $row['DonningTearingTest']; ?></td>
                                    <td><?php echo $row['LotIDKey']; ?></td>
                                    <td><?php echo $row['InspectionUserID']; ?></td>
                                    <td><?php echo $row['InspectorName']; ?></td>
                                    <td><?php echo $row['VerifierID']; ?></td>
                                    <td><?php echo $row['VerifierName']; ?></td>
                      </tr>

                  <?php }
                  } ?>
                </tbody>
              </table>

            </div>
            <!-- /.table-responsive -->

          </div>
          <!-- /.col-md-12 -->

        </div>
        <!-- /.panel-body -->
      </div>
      <!-- /.panel -->

    </div>
    <!-- /#page-wrapper -->
  </div>
  <!-- /#wrapper -->

  <script src="../../vendor/jquery/jquery.min.js"></script>
  <script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="../../vendor/metisMenu/metisMenu.min.js"></script>
  <script src="../../vendor/datatables/js/jquery.dataTables.min.js"></script>
  <script src="../../vendor/datatables-plugins/dataTables.bootstrap.js"></script>
  <script src="../../dist/js/sb-admin-2.js"></script>
  <script src="../../vendor/datatables/datatables-demo.js"></script>
  <script type="text/javascript" language="javascript" src="../datatables/js/jquery-3.3.1.js"></script>
  <script type="text/javascript" language="javascript" src="../datatables/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" language="javascript" src="../datatables/js/dataTables.bootstrap.min.js"></script>
  <script type="text/javascript" language="javascript" src="../datatables/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" language="javascript" src="../datatables/js/buttons.bootstrap.min.js"></script>
  <script type="text/javascript" language="javascript" src="../datatables/js/jszip.min.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script type="text/javascript" language="javascript" src="../datatables/js/vfs_fonts.js"></script>
  <script type="text/javascript" language="javascript" src="../datatables/js/buttons.html5.min.js"></script>
  <script type="text/javascript" language="javascript" src="../datatables/js/buttons.print.min.js"></script>
  <script type="text/javascript" language="javascript" src="../datatables/js/buttons.colVis.min.js"></script>
  <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
  <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
  <link href="../jquery.datatables.yadcf.css" rel="stylesheet" type="text/css" />
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
  <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
  <script src="../jquery.dataTables.yadcf.js"></script>

  <script>
    $(document).ready(function() {

      $('#tableID').dataTable({
        "autoWidth": false,
        columnDefs: [{
          width: 2000,
          targets: 6
        }],
        pageLength: 10,
        "dom": 'Bfrtip',
        buttons: [{
          extend: 'excel',
          text: 'Export to Excel',
          footer: true,
          exportOptions: {
            columns: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46],
            format: {
              header: function(mDataProp, columnIdx) {
                var htmlText = '<span>' + mDataProp + '</span>';
                var jHtmlObject = jQuery(htmlText);
                jHtmlObject.find('div').remove();
                var newHtml = jHtmlObject.text();
                console.log('My header > ' + newHtml);
                return newHtml;
              }
            }
          }
        }]
      }).yadcf([{
          column_number: 1,
          filter_default_label: "Select"
        },
        {
          column_number: 2,
          filter_default_label: "Select"
        },
        {
          column_number: 3,
          filter_default_label: "Select"
        },
        {
          column_number: 4,
          filter_default_label: "Select"
        },
        {
          column_number: 5,
          filter_default_label: "Select"
        },
        {
          column_number: 6,
          filter_default_label: "Select"
        },
        {
          column_number: 7,
          filter_default_label: "Select"
        },
        {
          column_number: 8,
          filter_type: "range_date",
          date_format: "dd/mm/yyyy"
        },
        {
          column_number: 10,
          filter_default_label: "Select"
        },
        {
          column_number: 11,
          filter_default_label: "Select"
        },
        {
          column_number: 12,
          filter_type: "range_date",
          date_format: "dd/mm/yyyy"
        },
        {
          column_number: 13,
          filter_default_label: "Select"
        },
        {
          column_number: 14,
          filter_default_label: "Select"
        },
        {
          column_number: 15,
          filter_default_label: "Select"
        },
        {
          column_number: 16,
          filter_default_label: "Select"
        },
        {
          column_number: 17,
          filter_default_label: "Select"
        },
        {
          column_number: 18,
          filter_default_label: "Select"
        },
        {
          column_number: 18,
          filter_default_label: "Select"
        },
        {
          column_number: 19,
          filter_default_label: "Select"
        },
        {
          column_number: 20,
          filter_default_label: "Select"
        },
        {
          column_number: 21,
          filter_default_label: "Select"
        },
        {
          column_number: 22,
          filter_default_label: "Select"
        },
        {
          column_number: 23,
          filter_default_label: "Select"
        },
        {
          column_number: 24,
          filter_default_label: "Select"
        },
        {
          column_number: 25,
          filter_default_label: "Select"
        },
        {
          column_number: 26,
          filter_default_label: "Select"
        },
        {
          column_number: 27,
          filter_default_label: "Select"
        },
        {
          column_number: 28,
          filter_default_label: "Select"
        },
        {
          column_number: 29,
          filter_default_label: "Select"
        },
        {
          column_number: 30,
          filter_default_label: "Select"
        },
        {
          column_number: 31,
          filter_default_label: "Select"
        },
        {
          column_number: 32,
          filter_default_label: "Select"
        },
        {
          column_number: 33,
          filter_default_label: "Select"
        },
        {
          column_number: 34,
          filter_default_label: "Select"
        },
        {
          column_number: 35,
          filter_default_label: "Select"
        },
        {
          column_number: 36,
          filter_default_label: "Select"
        },
        {
          column_number: 37,
          filter_default_label: "Select"
        },
        {
          column_number: 38,
          filter_default_label: "Select"
        },
        {
          column_number: 39,
          filter_default_label: "Select"
        },
        {
          column_number: 40,
          filter_default_label: "Select"
        },
        {
          column_number: 41,
          filter_default_label: "Select"
        },
        {
          column_number: 42,
          filter_default_label: "Select"
        },
        {
          column_number: 43,
          filter_default_label: "Select"
        },
        {
          column_number: 44,
          filter_default_label: "Select"
        },
        {
          column_number: 45,
          filter_default_label: "Select"
        },
        {
          column_number: 46,
          filter_default_label: "Select"
        },
      ]);

    });
  </script>
  <!-- Page-Level Demo Scripts - Tables - Use for reference -->
</body>

</html>