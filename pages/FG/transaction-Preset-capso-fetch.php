<?php

 include('../includes/database_connection.php');

 date_default_timezone_set('Asia/Kuala_Lumpur');
 $datecreated = date('Y-m-d h:i:s ', time());

 $data = $_POST['data'];
 $factory = $data[0]['value'];
 $soNumber = $data[1]['value'];

 // echo $factory;

  // code...
  $query = "
      SELECT TOP (1000)
      [so_num] as SoNumber
        ,[so_item] as SOLineItemNumber
        ,DimPlant.PlantName as FactoryName
        ,[brand] as BrandName
        ,[name1_cust] as CustomerName
        ,[size_desc] as SizeCodeLong
      FROM [QAPQC02].[dbo].[QREX_MMSO] INNER JOIN
      DimPlant ON QREX_MMSO.plant = DimPlant.SAPKey
      WHERE QREX_MMSO.so_num = ? and DimPlant.PlantName = ?
  ";

  $stmt=$connect->prepare($query);
  $stmt->bindParam(1, $soNumber);
  $stmt->bindParam(2, $factory);
  $stmt->execute();
  $tableCAPSO = $stmt->fetchAll();
  $stmt-> closeCursor();

  // print_r($tableCAPSO);

  $output = array();
  foreach ($tableCAPSO as $lotInfo) {
    // code...
    $temp_output = array(
      array(
        'SoNumber' => $lotInfo['SoNumber'],
        'SOLineItemNumber' => $lotInfo['SOLineItemNumber'],
        'FactoryName' => $lotInfo['FactoryName'],
        'BrandName' => $lotInfo['BrandName'],
        'CustomerName' => $lotInfo['CustomerName'],
        'SizeCodeLong' => $lotInfo['SizeCodeLong']
      )
    );

    $output = array_merge($output,$temp_output);
  }

  // print_r($output );


 echo json_encode($output);

 ?>
