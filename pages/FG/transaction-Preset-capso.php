<?php

 include('../includes/database_connection.php');

 date_default_timezone_set('Asia/Kuala_Lumpur');
 $datecreated = date('Y-m-d h:i:s ', time());

 $sizeArray = array();
 $materialcodeArray = array();
 $materialdescArray = array();
 $lineitemNumberArray = array();
 $totalqty = 0;


 $data = $_POST["data"];
 $data_size = $_POST["size"];

 $factory = $data[0];
 $soNumber = $data[1];
 $lotNumber = $data[2];

 foreach ($data_size as $sizeList) {
   array_push($sizeArray, $sizeList);
   // code...
 }

 // print_r($data);
foreach ($sizeArray as $row) {
  // code...
  $query = "{CALL SP_GetDataQrexMMSO(?,?,?,?)}";

  $stmt=$connect->prepare($query);
  $stmt->bindParam(1, $factory);
  $stmt->bindParam(2, $soNumber);
  $stmt->bindParam(3, $lotNumber);
  $stmt->bindParam(4, $row);
  $stmt->execute();
  $tableCAPSO = $stmt->fetchAll();
  $stmt-> closeCursor();

  array_push($materialcodeArray, $tableCAPSO[0]['material']);
  array_push($materialdescArray, $tableCAPSO[0]['material_desc']);
  array_push($lineitemNumberArray, ltrim($tableCAPSO[0]['so_item'],'0'));
  $totalqty += $tableCAPSO[0]['total_qty'];
}


 // print_r($tableCAPSO);

 $output = array();

 $sizeStr = implode( ',', $sizeArray );
 $materialcodeStr = implode( ',', $materialcodeArray );
 $materialdescStr = implode( ',', $materialdescArray );
 $lineitemNumberStr = implode( ',', $lineitemNumberArray );

 $output['so_num'] = $tableCAPSO[0]['so_num'];
 $output['so_item'] = $lineitemNumberStr;
 $output['Plant'] = $tableCAPSO[0]['Plant'];
 $output['route_country'] = $tableCAPSO[0]['route_country'];
 $output['brand'] = $tableCAPSO[0]['brand'];
 $output['customer'] = $tableCAPSO[0]['name1_cust'];
 $output['so_qty'] = $tableCAPSO[0]['so_qty'];
 $output['total_qty'] = $totalqty;
 $output['wcode_desc'] = $tableCAPSO[0]['wcode_desc'];
 $output['weight'] = $tableCAPSO[0]['weight'];
 $output['gtype'] = $tableCAPSO[0]['gtype'];
 $output['surface'] = $tableCAPSO[0]['surface'];
 $output['surface_desc'] = $tableCAPSO[0]['surface_desc'];
 $output['size_desc'] = $sizeStr;
 $output['colour'] = $tableCAPSO[0]['colour'];
 $output['colour_desc'] = $tableCAPSO[0]['colour_desc'];
 $output['lot_number'] = $tableCAPSO[0]['batch'];
 $output['material_code'] = $materialcodeStr;
 $output['material_desc'] = $materialdescStr;

 echo json_encode($output);

 ?>
