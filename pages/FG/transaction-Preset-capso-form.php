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



 // print_r($data);
foreach ($data as $row) {
  // code...
  $query = "
        SELECT [id]
          ,[so_num]
          ,[so_item]
          ,[plant]
          ,DimPlant.PlantName as Plant
          ,[sales_org]
          ,[route]
          ,[route_country]
          ,[brand]
          ,[cust_code]
          ,[name1_cust]
          ,[so_qty]
          ,[uom]
          ,[total_qty]
          ,[wcode]
          ,[wcode_desc]
          ,[weight]
          ,[weight_desc]
          ,[gtype]
          ,[gtype_desc]
          ,[surface]
          ,[surface_desc]
          ,[size]
          ,[size_desc]
          ,[colour]
          ,[colour_desc]
          ,[batch]
          ,[material]
          ,[material_desc]
      FROM [QAPQC02].[dbo].[QREX_MMSO] INNER JOIN
      DimPlant ON QREX_MMSO.plant = DimPlant.SAPKey
      WHERE QREX_MMSO.so_item = ? and QREX_MMSO.so_num = ? and DimPlant.PlantName = ?
  ";

  $stmt=$connect->prepare($query);
  $stmt->bindParam(1, $row['SOLineItemNumber']);
  $stmt->bindParam(2, $row['SoNumber']);
  $stmt->bindParam(3, $row['Factory']);
  $stmt->execute();
  $tableCAPSO = $stmt->fetchAll();
  $stmt-> closeCursor();

  array_push($sizeArray, $tableCAPSO[0]['size_desc']);
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
