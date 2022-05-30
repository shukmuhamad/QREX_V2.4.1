<?php

 include('../includes/database_connection.php');
 include('../includes/session.php');

 date_default_timezone_set('Asia/Kuala_Lumpur');
 $datecreated = date('Y-m-d h:i:s ', time());
 $UserID = $_SESSION['BadgeID'];

  $sql = "SELECT * FROM M_GloveSize WITH (NOLOCK);";
  $stmt = $connect->prepare($sql);
  $stmt->execute();
  $M_GloveSize = $stmt->fetchAll();
  $stmt -> closeCursor();

 $dataA = array();
 $dataB = array();
 $dataC = array();


 $dataA = $_POST["form_dataA"];
 $dataB = $_POST["form_dataB"];
 $dataC = $_POST["form_dataC"];

 // print_r($dataA);
 // print_r($dataB);

 $size = array();
 $itemNumber = array();
 $lotCount = array();
 $palletnumber = array();
 $ctnpallet = array();
 $ctnpallet2 = array();
 $innerctn = array();
 $pcsinner = array();
 $innerctn2 = array();
 $pcsinner2 = array();
 $ssVisual = array();
 $ssAPT = array();
 $accFFH = array();
 $accNFG = array();
 $accNAG = array();
 $accMajor = array();
 $accMinor = array();
 $accGG = array();
 $materialcodes = array();
 $lineitemnumbers = array();
 $palletID = array();

// echo $dataB[8]["value"];
// -------------dataA into array -------------------------


    $factoryName = $dataA[0]["value"];
    $SoNumber = $dataA[1]["value"];
    $SoLineItemNumber = explode(',',$dataA[2]["value"]);
    $Brand = $dataA[3]["value"];
    $Customer = $dataA[4]["value"];
    $InspectionPlan = $dataA[5]["value"];
    $materialcode = explode(',',$dataA[6]["value"]);
    $country = $dataA[7]["value"];
    $colourName = $dataA[8]["value"];
    $colourCode = $dataA[9]["value"];
    $lotNumber = $dataA[10]["value"];
    $GloveProductType = $dataA[11]["value"];
    $GloveCode = $dataA[12]["value"];
    $fgcondition = $dataA[13]["value"];
    $combinedSize = explode(',',$dataA[14]["value"]);
    $SurfaceCode = $dataA[16]["value"];

    $countSize = count($combinedSize);
    $refArray = array();
    $id = 0;
    while ($id < $countSize) {
        $refArray[$id] = array(
            'size'  => $combinedSize[$id],
            'solineitemnumber' => $SoLineItemNumber[$id],
            'materialcode'    => $materialcode[$id],
        );
        $id ++;
    }

    $_SESSION['prev_fac'] = $factoryName;
    $_SESSION['prev_sonum'] = $SoNumber;
    $_SESSION['prev_brand'] = $Brand;
    $_SESSION['prev_customer'] = $Customer;
    $_SESSION['prev_category'] = $InspectionPlan;
    $_SESSION['prev_colour'] = $colourCode;
    $_SESSION['prev_lotnum'] = $lotNumber;
    $_SESSION['prev_product'] = $GloveProductType;
    $_SESSION['prev_code'] = $GloveCode;



    echo "<br/> Factory:".$factoryName."<br/>";
    echo "<br/> SO Number:".$SoNumber."<br/>";
    echo "<br/> Brand:".$Brand."<br/>";
    echo "<br/> Customer:".$Customer."<br/>";
    echo "<br/> Inspection Plan:".$InspectionPlan."<br/>";
    echo "<br/> Colour:".$colourName."<br/>";
    echo "<br/> Lot Number:".$lotNumber."<br/>";
    echo "<br/> Glove Code:".$GloveCode."<br/>";
    echo "<br/> Product type:".$GloveProductType."<br/>";

    $sql = "SELECT * FROM M_Brand WITH (NOLOCK) WHERE BrandName = ?;";
    $stmt = $connect->prepare($sql);
    $stmt->bindParam(1, $Brand);
    $stmt->execute();
    $BrandCount = $stmt->rowCount();
    $stmt -> closeCursor();

    if($BrandCount == 0){
      $sql = "INSERT INTO M_Brand (BrandName) VALUES (?);";
      $stmt = $connect->prepare($sql);
      $stmt->bindParam(1, $Brand);
      $stmt->execute();
      $stmt -> closeCursor();
      // echo "<br/> BrandName Inserted <br/>";
    }

    $sql = "SELECT * FROM M_Customer WITH (NOLOCK) WHERE CustomerName = ?;";
    $stmt = $connect->prepare($sql);
    $stmt->bindParam(1, $Customer);
    $stmt->execute();
    $CustomerCount = $stmt->rowCount();
    $stmt -> closeCursor();

    if($CustomerCount == 0){
      $sql = "INSERT INTO M_Customer (CustomerName) VALUES (?);";
      $stmt = $connect->prepare($sql);
      $stmt->bindParam(1, $Customer);
      $stmt->execute();
      $stmt -> closeCursor();
      // echo "<br/> CustomerName Inserted <br/>";
    }


    // echo "<br/> BrandCount:".$BrandCount."<br/>";
    // echo "<br/> CustomerCount:".$CustomerCount."<br/>";

// -------------dataB into array -------------------------
     $totalpallet = 0;
     $limit = 18;
     $n = 0;
     $i = 0;
     $j =0;
     foreach ( $dataB as $result){

       if($i == $limit){
                 $i = 0;
                 $n++;
            }else{  }
            if($i == 0){
              $size[$n] = $dataB[$j]["value"];

              foreach ($refArray as $referrence) {
                // code...
                if($referrence['size'] == $size[$n]){
                  $materialcodes[$n] = $referrence['materialcode'];
                  $lineitemnumbers[$n] = $referrence['solineitemnumber'];
                }
              }
              // echo "dataB[".$j."]: ".$dataB[$j]["value"]."   ";
              // foreach ($M_GloveSize as $M_sizeRow) {
              //   // code...
              //   if($size[$n] == $M_sizeRow['GloveSizeCodeLong']){
              //     foreach ($materialcode as $materialcodeRow) {
              //       // code...
              //
              //       if(substr($materialcodeRow,-4,1) == $M_sizeRow['GloveSizeCodeShort']){
              //         echo "mcode: ".substr($materialcodeRow,-4).", sizecode: ".$M_sizeRow['GloveSizeCodeShort'].'<br />';
              //         $materialcodes[$n] = $materialcodeRow;
              //       }
              //     }
              //
              //   }
              // }
            }elseif ($i == 1) {
              $itemNumber[$n] = $dataB[$j]["value"];
              // echo "dataB[".$j."]: ".$dataB[$j]["value"]."   ";
            }elseif ($i == 2) {
              $lotCount[$n] = $dataB[$j]["value"];
              // echo "dataB[".$j."]: ".$dataB[$j]["value"]."   ";
            }elseif ($i == 3) {
              $palletnumber[$n] = $dataB[$j]["value"];
              // echo "dataB[".$j."]: ".$dataB[$j]["value"]."   ";
            }elseif ($i == 4) {
              $ctnpallet[$n] = $dataB[$j]["value"];
              // echo "dataB[".$j."]: ".$dataB[$j]["value"]."   ";
            }elseif ($i == 5) {
              $innerctn[$n] = $dataB[$j]["value"];
              // echo "dataB[".$j."]: ".$dataB[$j]["value"]."   ";
            }elseif ($i == 6) {
              $pcsinner[$n] = $dataB[$j]["value"];
              // echo "dataB[".$j."]: ".$dataB[$j]["value"]."   ";
            }elseif ($i == 7) {
              $ctnpallet2[$n] = $dataB[$j]["value"];
              // echo "dataB[".$j."]: ".$dataB[$j]["value"]."   ";
            } elseif ($i == 8) {
              $innerctn2[$n] = $dataB[$j]["value"];
              // echo "dataB[".$j."]: ".$dataB[$j]["value"]."   ";
            }elseif ($i == 9) {
              $pcsinner2[$n] = $dataB[$j]["value"];
              // echo "dataB[".$j."]: ".$dataB[$j]["value"]."   ";
            }elseif ($i == 10) {
              $ssVisual[$n] = $dataB[$j]["value"];
              // echo "dataB[".$j."]: ".$dataB[$j]["value"]."   ";
            }elseif ($i == 11) {
              $ssAPT[$n] = $dataB[$j]["value"];
              // echo "dataB[".$j."]: ".$dataB[$j]["value"]."   ";
            }elseif ($i == 12) {
              $accFFH[$n] = $dataB[$j]["value"];
              // echo "dataB[".$j."]: ".$dataB[$j]["value"]."   ";
            }elseif ($i == 13) {
              $accNFG[$n] = $dataB[$j]["value"];
              // echo "dataB[".$j."]: ".$dataB[$j]["value"]."   ";
            }elseif ($i == 14) {
              $accNAG[$n] = $dataB[$j]["value"];
              // echo "dataB[".$j."]: ".$dataB[$j]["value"]."   ";
            }elseif ($i == 15) {
              $accMajor[$n] = $dataB[$j]["value"];
              // echo "dataB[".$j."]: ".$dataB[$j]["value"]."   ";
            }elseif ($i == 16) {
              $accMinor[$n] = $dataB[$j]["value"];
              // echo "dataB[".$j."]: ".$dataB[$j]["value"]."   ";
            }elseif ($i == 17) {
              $accGG[$n] = $dataB[$j]["value"];
              // echo "dataB[".$j."]: ".$dataB[$j]["value"]."   ";
            }else{  }



       $i++;
       $j++;

     }
     $totalpallet = $n+1;


     // -------------dataC into array -------------------------

     $aqlholes = $dataC[0]["value"];
     $aqlnfg = $dataC[1]["value"];
     $aqlnag = $dataC[2]["value"];
     $aqlmajor = $dataC[3]["value"];
     $aqlminor = $dataC[4]["value"];
     $aqlgg = $dataC[5]["value"];


     // echo "<br/>";
     // echo "<br/>";
     // echo "size: ";
     // print_r($size);
     // echo "<br/>";
     // echo "item number: ";
     // print_r($itemNumber);
     // echo "<br/>";
     // echo "lot count: ";
     // print_r($lotCount);
     // echo "<br/>";
     // echo "samplesize: ";
     // print_r($ssAPT);
     // echo "<br/>";
     // echo "accffh: ";
     // print_r($accFFH);
     // echo "<br/>";
     // echo "accNAG: ";
     // print_r($accNAG);
     // echo "<br/>";
     // echo "accNFG: ";
     // print_r($accNFG);
     // echo "<br/>";
     // echo "accMajor: ";
     // print_r($accMajor);
     // echo "<br/>";
     // echo "accMinor: ";
     // print_r($accMinor);
     // echo "<br/>";
     // echo "palletnumber: ";
     // print_r($palletnumber);
     // echo "<br/>";
     // echo "<br/>";
     // echo "materialcodes: ";
     // print_r($materialcodes);
     // echo "<br/>";
     // echo "<br/>";
     // echo "Total Pallet:".$totalpallet;
     //
     // echo "<br />";

//----------------------- create record in database -------------------------



//
//
//                 $query = "{CALL insert_val(?,?,?)}";
//           $stmt = $connect->prepare($query);
//
//           $stmt->bindParam(1, $size);
//           $stmt->bindParam(2, $target);
//           $stmt->bindParam(3, $unit);
//           $stmt->execute();
//
//                 echo "Data Inserted";


for ($x = 0; $x < $totalpallet; $x++) {




  $Plant = $factoryName;
  // echo $Plant;
  // echo "<br>";

  $SONumber = $SoNumber;
  // echo $SONumber;
  // echo "<br>";

  $SOItemNumber = $itemNumber[$x];
  // echo $SOItemNumber."<br>";

  $Customer = $Customer;
  // echo $Customer."<br>";

  $Brand = $Brand;
  // echo $Brand."<br>";

  $LotNumber = $lotNumber;
  // echo $LotNumber."<br>";

  $LotCount = $lotCount[$x];
  // echo $LotCount."<br>";

  $PalletNumber = $palletnumber[$x];//----------------------
  // echo $PalletNumber."<br>";

  $GloveCode = $GloveCode;
  // echo $GloveCode."<br>";

  $GloveColour = $colourCode;
  // echo $GloveColour."<br>";

  $GloveProductType = $GloveProductType;
  // echo $GloveProductType."<br>";

  $GloveSize = $size[$x];
  // echo $GloveSize."<br>";

  $InspectionUserID = $UserID;
  // echo $InspectionUserID."<br>";

  $InspectionPlan = $InspectionPlan;
  // echo $InspectionPlan."<br>";

  // echo $country."<br>";

  $MaterialCode_ = $materialcodes[$x];
  // echo $MaterialCode_."<br>";

  $SoLineItemNumber_ = $lineitemnumbers[$x];
  // echo $SoLineItemNumber_."<br>";

  $ctnpallet_ = $ctnpallet[$x];
  // echo $ctnpallet_."<br>";

  $innerctn_ = $innerctn[$x];
  // echo $innerctn_."<br>";

  $pcsinner_ = $pcsinner[$x];
  // echo $pcsinner_."<br>";

  $ctnpallet2_ = $ctnpallet2[$x];
  // echo $ctnpallet2_."<br>";

  $innerctn2_ = $innerctn2[$x];
  // echo $innerctn2_."<br>";

  $pcsinner2_ = $pcsinner2[$x];
  // echo $pcsinner2_."<br>";

  $InspectionCount = '1';
  // echo $InspectionCount."<br>";

  $RecordCreatedDateTime =  $datecreated;
  // echo $RecordCreatedDateTime."<br>";

  if($_POST['glove_status'] == 7){
    $RecordStatusFlag = '7';
  }elseif ($_POST['glove_status'] == 9) {
    $RecordStatusFlag = '9';
  }else{
    $RecordStatusFlag = '0';
  }
  echo $RecordStatusFlag."<br>";


  $AQL = array(
    //--------------------acceptance------------
    array(
      "AQLDescription"=>"AcceptanceMinor",
      "AQLValue"=>$accMinor[$x]//--------
    )
    ,array(
      "AQLDescription"=>"AcceptanceMajor",
      "AQLValue"=>$accMajor[$x]
    )
    ,array(
      "AQLDescription"=>"AcceptanceHoles1",
      "AQLValue"=>$accFFH[$x]
    )
    ,array(
      "AQLDescription"=>"AcceptanceNFG",
      "AQLValue"=>$accNFG[$x]
    )
    ,array(
      "AQLDescription"=>"AcceptanceNAG_CP",
      "AQLValue"=>$accNAG[$x]
    )
    ,array(
      "AQLDescription"=>"AcceptanceGG",
      "AQLValue"=>$accGG[$x]
    )
    //----------------------AQL---------------------
    ,array(
      "AQLDescription"=>"AQLMinor",
      "AQLValue"=>$aqlminor
    )
    ,array(
      "AQLDescription"=>"AQLMajor",
      "AQLValue"=>$aqlmajor
    )
    ,array(
      "AQLDescription"=>"AQLHoles1",
      "AQLValue"=>$aqlholes
    )
    ,array(
      "AQLDescription"=>"AQLNFG",
      "AQLValue"=>$aqlnfg
    )
    ,array(
      "AQLDescription"=>"AQLNAG_CP",
      "AQLValue"=>$aqlnag
    )
    ,array(
      "AQLDescription"=>"AQLGG",
      "AQLValue"=>$aqlgg
    )

  );


  $AQLResult_JSON = json_encode($AQL);
  // echo "AQL";
  // echo "<br>";
  // echo $AQLResult_JSON;
  //
  // echo "<br>";
  // echo "<br>";
  // echo "<br>";

  $SampleSizeResult=array(
    array(
      "SampleSize"=>'SampleSizeVisual',
      "SampleSizeValue"=>$ssVisual[$x]
    ),
    array(
      "SampleSize"=>'SampleSizeAPT/WTTLevel1',
      "SampleSizeValue"=>$ssAPT[$x]
    ),
  );


  $SampleSizeResult_JSON = json_encode($SampleSizeResult);

  // echo "SampleSizeResult";
  // echo "<br>";
  // echo $SampleSizeResult_JSON;
  // echo "<br>";
  // echo "<br>";
  // echo "<br>";

  $q = "{CALL SP_CheckPresetRecord(?,?,?,?,?,?)}";

  $s = $connect->prepare($q);
  $s->bindParam(1, $Plant);
  $s->bindParam(2, $SONumber);
  $s->bindParam(3, $SOItemNumber, PDO::PARAM_INT);
  $s->bindParam(4, $GloveSize);
  $s->bindParam(5, $LotCount, PDO::PARAM_INT);
  $s->bindParam(6, $PalletNumber);
  $s->execute();
  $r = $s->fetch();
  $resultExist = $r['EXISTS'];
  $s->closeCursor();

  $q = "IF EXISTS(SELECT 1  FROM T_Lot_FG
        WHERE PlantKey = (
        SELECT PlantKey FROM [DimPlant] WHERE PlantName = ?
        )AND SONumber = ? AND SOItemNumber = ?
        AND GloveSizeKey = (
        SELECT [GloveSizeKey] FROM [M_GloveSize] WHERE [GloveSizeCodeLong]=?
        )AND LotCount = ? AND PalletNumber = ?)
        BEGIN
          SELECT 1 AS 'EXISTS'
        END
        ELSE
        BEGIN
          SELECT 0 AS 'EXISTS'
        END";
  $s = $connect->prepare($q);
  $s->bindParam(1, $Plant);
  $s->bindParam(2, $SONumber);
  $s->bindParam(3, $SOItemNumber, PDO::PARAM_INT);
  $s->bindParam(4, $GloveSize);
  $s->bindParam(5, $LotCount, PDO::PARAM_INT);
  $s->bindParam(6, $PalletNumber);
  $s->execute();
  $r = $s->fetch();
  // print_r($r);
  $resultExist2 = $r['EXISTS'];
  $s->closeCursor();



  echo '$Plant: ' . $Plant . '| $SoLineItemNumber_: ' . $SOItemNumber . '| $SONumber: ' . $SONumber . '| $GloveSize: ' . $GloveSize . '| $LotCount: ' . $LotCount . '| $PalletNumber: ' . $PalletNumber;

  if ($resultExist == 0 and $resultExist2 == 0) {

  $query = "{CALL SP_AddPreset(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)}";
  $stmt = $connect->prepare($query);
  $stmt->bindParam(1, $Plant);
  $stmt->bindParam(2, $SONumber, PDO::PARAM_INT);
  $stmt->bindParam(3, $SOItemNumber, PDO::PARAM_INT);
  $stmt->bindParam(4, $Customer);
  $stmt->bindParam(5, $Brand);
  $stmt->bindParam(6, $LotNumber, PDO::PARAM_INT);
  $stmt->bindParam(7, $LotCount, PDO::PARAM_INT);
  $stmt->bindParam(8, $PalletNumber, PDO::PARAM_INT);
  $stmt->bindParam(9, $GloveCode);
  $stmt->bindParam(10, $colourCode);
  $stmt->bindParam(11, $GloveProductType);
  $stmt->bindParam(12, $GloveSize);
  $stmt->bindParam(13, $SurfaceCode);
  $stmt->bindParam(14, $InspectionUserID);
  $stmt->bindParam(15, $InspectionPlan);
  $stmt->bindParam(16, $SampleSizeResult_JSON);
  $stmt->bindParam(17, $AQLResult_JSON);
  $stmt->bindParam(18, $InspectionCount);
  $stmt->bindParam(19, $RecordCreatedDateTime);
  $stmt->bindParam(20, $RecordStatusFlag);
  $stmt->bindParam(21, $nullVal);
  $stmt->bindParam(22, $fgcondition);
  $stmt->bindParam(23, $country);
  $stmt->bindParam(24, $MaterialCode_);
  $stmt->bindParam(25, $SoLineItemNumber_);
  $stmt->bindParam(26, $ctnpallet_);
  $stmt->bindParam(27, $ctnpallet2_);
  $stmt->bindParam(28, $innerctn_);
  $stmt->bindParam(29, $innerctn2_);
  $stmt->bindParam(30, $pcsinner_);
  $stmt->bindParam(31, $pcsinner2_);


  if($stmt->execute()){
      // echo '<script> alert("resultExist1: '.$resultExist.' and resultExist2: '.$resultExist2.'. For pallet number: '.$PalletNumber.'"); </script>';

  }
}else{

    // if ($resultExist == 1) {
    //   echo '<script> alert("Pallet Details already exists in preset!! resultExist1: '.$resultExist.' and resultExist2: '.$resultExist2.'. For pallet number: '.$PalletNumber.'"); </script>';
    // } elseif ($resultExist2 == 1) {
    //   echo '<script> alert("Pallet Details already exists in FG!! resultExist1: '.$resultExist.' and resultExist2: '.$resultExist2.'. For pallet number: '.$PalletNumber.'"); </script>';

    // }
}

}
