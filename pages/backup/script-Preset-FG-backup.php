<?php $size_ = size_selection($connect, $M_GloveSize); ?>


<script>
  var list = 0;
  var _selectedSize = '';
  var sizeRow = '';
  var sizeNew = '';

  var formulaTrigger = 0;
  var totalPieces = 0;
  var totalPcsSize = 0;
  var totalOrder = 0;
  var totalCTN = 0;
  var totalPcsCtn = 0;
  var totalPallet = 0;
  var maxPCS = 0;
  var Alltotalpallet = 0;
  var palletdetails = [];
  var _aqlHole = 0;
  var _aqlNFG = 0;
  var _aqlNAG = 0;
  var _aqlMajor = 0;
  var _aqlMinor = 0;
  var _aqlGG = 0;
  var tempAcc = 0;

  var _totalpallet1 = 0;
  var _totalCTN1 = 0;
  var _totalPCS1 = 0;
  var _balancePCS1 = 0;
  var _actualctn1 = 0;
  var _formula1 = 0;
  var _sampleSize1 = 0;
  var _ctnTake1 = 0;
  var _pallet1_1 = 0;
  var _ctn1_1 = 0;
  var _pallet1_2 = 0;
  var _ctn1_2 = 0;
  var _pcsctn1_1 = 0;
  var _pcsctn1_2 = 0;
  var _ctnout1_1 = 0;
  var _ctnout1_2 = 0;

  var _lot2Details = [];
  var _lot3Details = [];
  var _lot4Details = [];
  var _lot5Details = [];

  var palletdetails = [];
  var temppalletdetails = [];

  const samplingplanArr = [

    {
      ss: '32',
      aql: 'N/A',
      acc: '0',
      rej: '0'
    },
    {
      ss: '32',
      aql: '0.065',
      acc: '0',
      rej: '1'
    },
    {
      ss: '32',
      aql: '0.10',
      acc: '0',
      rej: '1'
    },
    {
      ss: '32',
      aql: '0.15',
      acc: '0',
      rej: '1'
    },
    {
      ss: '32',
      aql: '0.25',
      acc: '0',
      rej: '1'
    },
    {
      ss: '32',
      aql: '0.40',
      acc: '0',
      rej: '1'
    },
    {
      ss: '32',
      aql: '0.65',
      acc: '0',
      rej: '1'
    },
    {
      ss: '32',
      aql: '1.00',
      acc: '1',
      rej: '2'
    },
    {
      ss: '32',
      aql: '1.50',
      acc: '1',
      rej: '2'
    },
    {
      ss: '32',
      aql: '2.50',
      acc: '2',
      rej: '3'
    },
    {
      ss: '32',
      aql: '4.00',
      acc: '3',
      rej: '4'
    },
    {
      ss: '32',
      aql: '6.50',
      acc: '5',
      rej: '6'
    },

    {
      ss: '50',
      aql: 'N/A',
      acc: '0',
      rej: '0'
    },
    {
      ss: '50',
      aql: '0.065',
      acc: '0',
      rej: '1'
    },
    {
      ss: '50',
      aql: '0.10',
      acc: '0',
      rej: '1'
    },
    {
      ss: '50',
      aql: '0.15',
      acc: '0',
      rej: '1'
    },
    {
      ss: '50',
      aql: '0.25',
      acc: '0',
      rej: '1'
    },
    {
      ss: '50',
      aql: '0.40',
      acc: '0',
      rej: '1'
    },
    {
      ss: '50',
      aql: '0.65',
      acc: '1',
      rej: '2'
    },
    {
      ss: '50',
      aql: '1.00',
      acc: '2',
      rej: '3'
    },
    {
      ss: '50',
      aql: '1.50',
      acc: '3',
      rej: '4'
    },
    {
      ss: '50',
      aql: '2.50',
      acc: '5',
      rej: '6'
    },
    {
      ss: '50',
      aql: '4.00',
      acc: '7',
      rej: '8'
    },
    {
      ss: '50',
      aql: '6.50',
      acc: '1',
      rej: '2'
    },

    {
      ss: '80',
      aql: 'N/A',
      acc: '0',
      rej: '0'
    },
    {
      ss: '80',
      aql: '0.065',
      acc: '0',
      rej: '1'
    },
    {
      ss: '80',
      aql: '0.10',
      acc: '0',
      rej: '1'
    },
    {
      ss: '80',
      aql: '0.15',
      acc: '0',
      rej: '1'
    },
    {
      ss: '80',
      aql: '0.25',
      acc: '0',
      rej: '1'
    },
    {
      ss: '80',
      aql: '0.40',
      acc: '1',
      rej: '2'
    },
    {
      ss: '80',
      aql: '0.65',
      acc: '1',
      rej: '2'
    },
    {
      ss: '80',
      aql: '1.00',
      acc: '2',
      rej: '3'
    },
    {
      ss: '80',
      aql: '1.50',
      acc: '3',
      rej: '4'
    },
    {
      ss: '80',
      aql: '2.50',
      acc: '5',
      rej: '6'
    },
    {
      ss: '80',
      aql: '4.00',
      acc: '7',
      rej: '8'
    },
    {
      ss: '80',
      aql: '6.50',
      acc: '10',
      rej: '11'
    },

    {
      ss: '125',
      aql: 'N/A',
      acc: '0',
      rej: '0'
    },
    {
      ss: '125',
      aql: '0.065',
      acc: '0',
      rej: '1'
    },
    {
      ss: '125',
      aql: '0.10',
      acc: '0',
      rej: '1'
    },
    {
      ss: '125',
      aql: '0.15',
      acc: '0',
      rej: '1'
    },
    {
      ss: '125',
      aql: '0.25',
      acc: '1',
      rej: '2'
    },
    {
      ss: '125',
      aql: '0.40',
      acc: '1',
      rej: '2'
    },
    {
      ss: '125',
      aql: '0.65',
      acc: '2',
      rej: '3'
    },
    {
      ss: '125',
      aql: '1.00',
      acc: '3',
      rej: '4'
    },
    {
      ss: '125',
      aql: '1.50',
      acc: '5',
      rej: '6'
    },
    {
      ss: '125',
      aql: '2.50',
      acc: '7',
      rej: '8'
    },
    {
      ss: '125',
      aql: '4.00',
      acc: '10',
      rej: '11'
    },
    {
      ss: '125',
      aql: '6.50',
      acc: '14',
      rej: '15'
    },

    {
      ss: '200',
      aql: 'N/A',
      acc: '0',
      rej: '0'
    },
    {
      ss: '200',
      aql: '0.065',
      acc: '0',
      rej: '1'
    },
    {
      ss: '200',
      aql: '0.10',
      acc: '0',
      rej: '1'
    },
    {
      ss: '200',
      aql: '0.15',
      acc: '0',
      rej: '1'
    },
    {
      ss: '200',
      aql: '0.25',
      acc: '1',
      rej: '2'
    },
    {
      ss: '200',
      aql: '0.40',
      acc: '2',
      rej: '3'
    },
    {
      ss: '200',
      aql: '0.65',
      acc: '3',
      rej: '4'
    },
    {
      ss: '200',
      aql: '1.00',
      acc: '5',
      rej: '6'
    },
    {
      ss: '200',
      aql: '1.50',
      acc: '7',
      rej: '8'
    },
    {
      ss: '200',
      aql: '2.50',
      acc: '10',
      rej: '11'
    },
    {
      ss: '200',
      aql: '4.00',
      acc: '14',
      rej: '15'
    },
    {
      ss: '200',
      aql: '6.50',
      acc: '21',
      rej: '22'
    },

    {
      ss: '315',
      aql: 'N/A',
      acc: '0',
      rej: '0'
    },
    {
      ss: '315',
      aql: '0.065',
      acc: '0',
      rej: '1'
    },
    {
      ss: '315',
      aql: '0.10',
      acc: '1',
      rej: '2'
    },
    {
      ss: '315',
      aql: '0.15',
      acc: '1',
      rej: '2'
    },
    {
      ss: '315',
      aql: '0.25',
      acc: '2',
      rej: '3'
    },
    {
      ss: '315',
      aql: '0.40',
      acc: '3',
      rej: '4'
    },
    {
      ss: '315',
      aql: '0.65',
      acc: '5',
      rej: '6'
    },
    {
      ss: '315',
      aql: '1.00',
      acc: '7',
      rej: '8'
    },
    {
      ss: '315',
      aql: '1.50',
      acc: '10',
      rej: '11'
    },
    {
      ss: '315',
      aql: '2.50',
      acc: '14',
      rej: '15'
    },
    {
      ss: '315',
      aql: '4.00',
      acc: '21',
      rej: '22'
    },
    {
      ss: '315',
      aql: '6.50',
      acc: '33',
      rej: '34'
    },

    {
      ss: '500',
      aql: 'N/A',
      acc: '0',
      rej: '0'
    },
    {
      ss: '500',
      aql: '0.065',
      acc: '1',
      rej: '2'
    },
    {
      ss: '500',
      aql: '0.10',
      acc: '1',
      rej: '2'
    },
    {
      ss: '500',
      aql: '0.15',
      acc: '2',
      rej: '3'
    },
    {
      ss: '500',
      aql: '0.25',
      acc: '3',
      rej: '4'
    },
    {
      ss: '500',
      aql: '0.40',
      acc: '5',
      rej: '6'
    },
    {
      ss: '500',
      aql: '0.65',
      acc: '7',
      rej: '8'
    },
    {
      ss: '500',
      aql: '1.00',
      acc: '10',
      rej: '11'
    },
    {
      ss: '500',
      aql: '1.50',
      acc: '14',
      rej: '15'
    },
    {
      ss: '500',
      aql: '2.50',
      acc: '21',
      rej: '22'
    },
    {
      ss: '500',
      aql: '4.00',
      acc: '33',
      rej: '34'
    },
    {
      ss: '500',
      aql: '6.50',
      acc: '52',
      rej: '53'
    }
  ];

  // console.table(samplingplanArr);

  maxPCS = $("#maxPCS").val("1000000");


  $("#totalPcsSize").keyup(function() {
    totalPcsSize = $(this).val();
    totalCTN = $("#totalCTN").val();
    totalPcsCtn = $("#totalPcsCtn").val();
    maxPCS = $("#maxPCS").val();

    if (totalPcsSize == '') {
      totalPcsSize = 0;
    }
    // console.log("totalPcsSize: "+totalPcsSize);

    if (totalPcsSize > 0 && totalCTN > 0 && totalPcsCtn > 0 && maxPCS > 0) {
      calculateProcess();
    }
  });

  $("#totalCTN").keyup(function() {
    totalCTN = $(this).val();
    totalPcsSize = $("#totalPcsSize").val();
    totalPcsCtn = $("#totalPcsCtn").val();
    maxPCS = $("#maxPCS").val();
    if (totalCTN == '') {
      totalCTN = 0;
    }
    // console.log("totalCTN: "+totalCTN);

    if (totalPcsSize > 0 && totalCTN > 0 && totalPcsCtn > 0 && maxPCS > 0) {
      calculateProcess();
    }
  });

  $("#totalPcsCtn").keyup(function() {
    totalPcsCtn = $(this).val();
    totalPcsSize = $("#totalPcsSize").val();
    totalCTN = $("#totalCTN").val();
    maxPCS = $("#maxPCS").val();
    if (totalPcsCtn == '') {
      totalPcsCtn = 0;
    }
    // console.log("totalPcsCtn: "+totalPcsCtn);

    if (totalPcsSize > 0 && totalCTN > 0 && totalPcsCtn > 0 && maxPCS > 0) {
      calculateProcess();
    }
  });

  $("#maxPCS").keyup(function() {
    maxPCS = $(this).val();
    totalPcsSize = $("#totalPcsSize").val();
    totalCTN = $("#totalCTN").val();
    totalPcsCtn = $("#totalPcsCtn").val();

    if (maxPCS == '') {
      maxPCS = 0;
    }
    // console.log("maxPCS: "+maxPCS);

    if (totalPcsSize > 0 && totalCTN > 0 && totalPcsCtn > 0 && maxPCS > 0) {
      calculateProcess();
    }
  });


  // --------------------function calculate process----------------------
  function calculateProcess() {
    var limitPCS = 0;
    totalOrder = totalPcsSize / totalPcsCtn;
    totalPallet = Math.ceil((totalPcsSize / totalPcsCtn) / totalCTN);
    // console.log("!!! totalPallet: "+totalPallet);
    // console.log("!!! totalOrder: "+totalOrder);
    // console.log("!!! totalPcsSize: "+totalPcsSize);
    // console.log("!!! totalPcsCtn: "+totalPcsCtn);
    // console.log("!!! totalCTN: "+totalCTN);
    // console.log("!!! maxPCS: "+maxPCS);
    if (parseInt(totalPcsSize) >= parseInt(maxPCS)) {
      limitPCS = maxPCS;
      console.log("totalPcsSize lagi besar ");

    } else {
      limitPCS = totalPcsSize;
      console.log("totalPcsSize lagi kecil ");

    }
    formulaTrigger = limitPCS;

    console.log("totalPallet: " + totalPallet);
    console.log("formulaTrigger: " + formulaTrigger);
    console.log("totalCTN: " + totalCTN);
    console.log("totalPcsCtn: " + totalPcsCtn);
    console.log("limitPCS: " + limitPCS);
    console.log("totalOrder: " + totalOrder);

    // ---------- lot number 1 --------------
    if (parseInt(totalOrder) - 1 >= (parseInt(limitPCS) / parseInt(totalPcsCtn))) {
      // if(totalPcsCtn > (maxPCS/totalPcsCtn)){
      _totalpallet1 = Math.floor(parseInt(limitPCS) / (parseInt(totalPcsCtn) * parseInt(totalCTN)));
      console.log("IF " + limitPCS + "/(" + totalPcsCtn + "*" + totalCTN + ") = " + _totalpallet1);
      // }else{
      //   _totalpallet1 = Math.floor(limitPCS/totalCTN);
      // }
      _totalCTN1 = _totalpallet1 * totalCTN;
    } else {
      _totalpallet1 = Math.ceil(parseInt(limitPCS) / (parseInt(totalPcsCtn) * parseInt(totalCTN)));
      console.log("Else " + limitPCS + "/(" + totalPcsCtn + "*" + totalCTN + ") = " + _totalpallet1);
      _totalCTN1 = totalOrder;
    }

    if (parseInt(totalPcsSize) >= parseInt(limitPCS)) {
      _totalPCS1 = _totalCTN1 * totalPcsCtn;
    } else {
      _totalPCS1 = totalPcsSize;
    }

    _balancePCS1 = totalPcsSize - _totalPCS1;

    if (parseInt(_balancePCS1) <= 0 || parseInt(_balancePCS1) == 0) {
      _balancePCS1 = 0;
      _totalpallet1 = totalPallet;
    }

    _actualctn1 = _totalPCS1 / totalPcsCtn;
    if (parseInt(_balancePCS1) >= parseInt(formulaTrigger)) {
      _formula1 = formulaTrigger;
    } else {
      _formula1 = _balancePCS1;
    }

    _sampleSize1 = samplesize_Check(_totalPCS1);

    if (Math.sqrt(_actualctn1) >= 13) {
      _ctnTake1 = 13;
    } else {
      _ctnTake1 = Math.ceil(Math.sqrt(_actualctn1));
    }
    _ctn1_1 = Math.floor(_ctnTake1 / _totalpallet1);
    _ctn1_2 = Math.ceil(_ctnTake1 / _totalpallet1);
    _pallet1_1 = (_ctn1_2 * _totalpallet1) - _ctnTake1;
    _pallet1_2 = _ctnTake1 - (_ctn1_1 * _totalpallet1);
    console.log("_ctn1_1: " + _ctn1_1);
    console.log("_ctn1_2: " + _ctn1_2);
    console.log("_ctnTake1: " + _ctnTake1);
    console.log("_totalpallet1: " + _totalpallet1);

    if (_ctnTake1 > 0 && _pallet1_1 == 0 && _pallet1_2 == 0) {
      _pallet1_1 = _totalpallet1;
    }

    console.log("pallet1: " + _pallet1_1);
    console.log("pallet2: " + _pallet1_2);
    _pcsctn1_1 = Math.floor(_sampleSize1 / _ctnTake1);
    _pcsctn1_2 = Math.ceil(_sampleSize1 / _ctnTake1);
    _ctnout1_1 = (_pcsctn1_2 * _ctnTake1) - _sampleSize1;
    _ctnout1_2 = _sampleSize1 - (_pcsctn1_1 * _ctnTake1);

    if (_pcsctn1_1 == _pcsctn1_2 && _totalpallet1 == 1) {
      _ctnout1_1 = ((_sampleSize1 / 2) / _pcsctn1_1);
      _ctnout1_2 = ((_sampleSize1 / 2) / _pcsctn1_2);
    }

    console.log(_ctnTake1);
    console.log(_pcsctn1_1);
    console.log(_pcsctn1_2);
    console.log(_ctnout1_1);
    console.log(_ctnout1_2);


    $('#TPallet1').val(_totalpallet1);
    $('#TCTN1').val(_totalCTN1);
    $('#TPcs1').val(_totalPCS1);
    $('#Balance1').val(_balancePCS1);
    $('#ATCTN1').val(_actualctn1);
    $('#Formula1').val(_formula1);
    $('#TSS1').val(_sampleSize1);

    var exceed_output = {
      0: {
        _totalpallet_new: 0,
        _sampleSize_new: 0,
        _totalPCS_new: 0,
        _totalCTN_new: 0,
        _balancePCS_new: 0,
        _actualctn_new: 0,
        _formula_new: 0,
        _ctnTake_new: 0,
        _ctn1: 0,
        _ctn2: 0,
        _pallet1: 0,
        _pallet2: 0,
        _pcsctn1: 0,
        _pcsctn2: 0,
        _ctnout1: 0,
        _ctnout2: 0
      }
    };
    // console.table(exceed_output);
    // ---------- lot number 2 --------------

    if (_balancePCS1 == 0) {
      _lot2Details = exceed_output;
      // console.table(_lot2Details);
    } else {
      _lot2JSON = calculateLotDetails(_formula1, limitPCS, totalCTN, totalPcsCtn, _balancePCS1, formulaTrigger);
      _lot2Details = JSON.parse(_lot2JSON);
      // console.table(_lot2Details);
    }

    $('#TPallet2').val(_lot2Details[0]._totalpallet_new);
    $('#TCTN2').val(_lot2Details[0]._totalCTN_new);
    $('#TPcs2').val(_lot2Details[0]._totalPCS_new);
    $('#Balance2').val(_lot2Details[0]._balancePCS_new);
    $('#ATCTN2').val(_lot2Details[0]._actualctn_new);
    $('#Formula2').val(_lot2Details[0]._formula_new);
    $('#TSS2').val(_lot2Details[0]._sampleSize_new);

    // ---------- lot number 3 --------------

    if (_lot2Details[0]._balancePCS_new == 0) {
      _lot3Details = exceed_output;
      // console.table(_lot3Details);
    } else {
      _lot3JSON = calculateLotDetails(_lot2Details[0]._formula_new, limitPCS, totalCTN, totalPcsCtn, _lot2Details[0]._balancePCS_new, formulaTrigger);
      _lot3Details = JSON.parse(_lot3JSON);
      // console.table(_lot3Details);
    }

    $('#TPallet3').val(_lot3Details[0]._totalpallet_new);
    $('#TCTN3').val(_lot3Details[0]._totalCTN_new);
    $('#TPcs3').val(_lot3Details[0]._totalPCS_new);
    $('#Balance3').val(_lot3Details[0]._balancePCS_new);
    $('#ATCTN3').val(_lot3Details[0]._actualctn_new);
    $('#Formula3').val(_lot3Details[0]._formula_new);
    $('#TSS3').val(_lot3Details[0]._sampleSize_new);

    // ---------- lot number 4 --------------

    if (_lot3Details[0]._balancePCS_new == 0) {
      _lot4Details = exceed_output;
      // console.table(_lot4Details);
    } else {
      _lot4JSON = calculateLotDetails(_lot3Details[0]._formula_new, limitPCS, totalCTN, totalPcsCtn, _lot3Details[0]._balancePCS_new, formulaTrigger);
      _lot4Details = JSON.parse(_lot4JSON);
      // console.table(_lot4Details);
    }

    $('#TPallet4').val(_lot4Details[0]._totalpallet_new);
    $('#TCTN4').val(_lot4Details[0]._totalCTN_new);
    $('#TPcs4').val(_lot4Details[0]._totalPCS_new);
    $('#Balance4').val(_lot4Details[0]._balancePCS_new);
    $('#ATCTN4').val(_lot4Details[0]._actualctn_new);
    $('#Formula4').val(_lot4Details[0]._formula_new);
    $('#TSS4').val(_lot4Details[0]._sampleSize_new);

    // ---------- lot number 5 --------------

    if (_lot4Details[0]._balancePCS_new == 0) {
      _lot5Details = exceed_output;
      // console.table(_lot5Details);
    } else {
      _lot5JSON = calculateLotDetails(_lot4Details[0]._formula_new, limitPCS, totalCTN, totalPcsCtn, _lot4Details[0]._balancePCS_new, formulaTrigger);
      _lot5Details = JSON.parse(_lot5JSON);
      // console.table(_lot5Details);
    }

    $('#TPallet5').val(_lot5Details[0]._totalpallet_new);
    $('#TCTN5').val(_lot5Details[0]._totalCTN_new);
    $('#TPcs5').val(_lot5Details[0]._totalPCS_new);
    $('#Balance5').val(_lot5Details[0]._balancePCS_new);
    $('#ATCTN5').val(_lot5Details[0]._actualctn_new);
    $('#Formula5').val(_lot5Details[0]._formula_new);
    $('#TSS5').val(_lot5Details[0]._sampleSize_new);

    // ---------- lot number 6 --------------

    if (_lot5Details[0]._balancePCS_new == 0) {
      _lot6Details = exceed_output;
      // console.table(_lot6Details);
    } else {
      _lot6JSON = calculateLotDetails(_lot5Details[0]._formula_new, limitPCS, totalCTN, totalPcsCtn, _lot5Details[0]._balancePCS_new, formulaTrigger);
      _lot6Details = JSON.parse(_lot6JSON);
      // console.table(_lot6Details);
    }

    $('#TPallet6').val(_lot6Details[0]._totalpallet_new);
    $('#TCTN6').val(_lot6Details[0]._totalCTN_new);
    $('#TPcs6').val(_lot6Details[0]._totalPCS_new);
    $('#Balance6').val(_lot6Details[0]._balancePCS_new);
    $('#ATCTN6').val(_lot6Details[0]._actualctn_new);
    $('#Formula6').val(_lot6Details[0]._formula_new);
    $('#TSS6').val(_lot6Details[0]._sampleSize_new);

    // ---------- lot number 7 --------------

    if (_lot6Details[0]._balancePCS_new == 0) {
      _lot7Details = exceed_output;
      // console.table(_lot7Details);
    } else {
      _lot7JSON = calculateLotDetails(_lot6Details[0]._formula_new, limitPCS, totalCTN, totalPcsCtn, _lot6Details[0]._balancePCS_new, formulaTrigger);
      _lot7Details = JSON.parse(_lot7JSON);
      // console.table(_lot7Details);
    }

    $('#TPallet7').val(_lot7Details[0]._totalpallet_new);
    $('#TCTN7').val(_lot7Details[0]._totalCTN_new);
    $('#TPcs7').val(_lot7Details[0]._totalPCS_new);
    $('#Balance7').val(_lot7Details[0]._balancePCS_new);
    $('#ATCTN7').val(_lot7Details[0]._actualctn_new);
    $('#Formula7').val(_lot7Details[0]._formula_new);
    $('#TSS7').val(_lot7Details[0]._sampleSize_new);


    // ---------- lot number 8 --------------

    if (_lot7Details[0]._balancePCS_new == 0) {
      _lot8Details = exceed_output;
      // console.table(_lot8Details);
    } else {
      _lot8JSON = calculateLotDetails(_lot7Details[0]._formula_new, limitPCS, totalCTN, totalPcsCtn, _lot7Details[0]._balancePCS_new, formulaTrigger);
      _lot8Details = JSON.parse(_lot8JSON);
      // console.table(_lot8Details);
    }

    $('#TPallet8').val(_lot8Details[0]._totalpallet_new);
    $('#TCTN8').val(_lot8Details[0]._totalCTN_new);
    $('#TPcs8').val(_lot8Details[0]._totalPCS_new);
    $('#Balance8').val(_lot8Details[0]._balancePCS_new);
    $('#ATCTN8').val(_lot8Details[0]._actualctn_new);
    $('#Formula8').val(_lot8Details[0]._formula_new);
    $('#TSS8').val(_lot8Details[0]._sampleSize_new);


    // ---------- lot number 9 --------------

    if (_lot8Details[0]._balancePCS_new == 0) {
      _lot9Details = exceed_output;
      // console.table(_lot9Details);
    } else {
      _lot9JSON = calculateLotDetails(_lot8Details[0]._formula_new, limitPCS, totalCTN, totalPcsCtn, _lot8Details[0]._balancePCS_new, formulaTrigger);
      _lot9Details = JSON.parse(_lot9JSON);
      // console.table(_lot9Details);
    }

    $('#TPallet9').val(_lot9Details[0]._totalpallet_new);
    $('#TCTN9').val(_lot9Details[0]._totalCTN_new);
    $('#TPcs9').val(_lot9Details[0]._totalPCS_new);
    $('#Balance9').val(_lot9Details[0]._balancePCS_new);
    $('#ATCTN9').val(_lot9Details[0]._actualctn_new);
    $('#Formula9').val(_lot9Details[0]._formula_new);
    $('#TSS9').val(_lot9Details[0]._sampleSize_new);

    // ---------- lot number 10 --------------

    if (_lot9Details[0]._balancePCS_new == 0) {
      _lot10Details = exceed_output;
      // console.table(_lot10Details);
    } else {
      _lot10JSON = calculateLotDetails(_lot9Details[0]._formula_new, limitPCS, totalCTN, totalPcsCtn, _lot9Details[0]._balancePCS_new, formulaTrigger);
      _lot10Details = JSON.parse(_lot10JSON);
      // console.table(_lot10Details);
    }

    $('#TPallet10').val(_lot10Details[0]._totalpallet_new);
    $('#TCTN10').val(_lot10Details[0]._totalCTN_new);
    $('#TPcs10').val(_lot10Details[0]._totalPCS_new);
    $('#Balance10').val(_lot10Details[0]._balancePCS_new);
    $('#ATCTN10').val(_lot10Details[0]._actualctn_new);
    $('#Formula10').val(_lot10Details[0]._formula_new);
    $('#TSS10').val(_lot10Details[0]._sampleSize_new);


  }

  //------------function calculate for 2nd lot and after------------

  function calculateLotDetails(_formula_old, limitPCS, totalCTN_old, totalPcsCtn, _balancePCS_old, formulaTrigger) {
    if (_formula_old == limitPCS) {
      _totalpallet_new = Math.floor(_formula_old / totalCTN_old / totalPcsCtn);
    } else {
      _totalpallet_new = Math.ceil(_formula_old / totalCTN_old / totalPcsCtn);
    }
    _totalCTN_new = _totalpallet_new * totalCTN_old;
    if ((_balancePCS_old / totalPcsCtn) >= _totalCTN_new) {
      _totalPCS_new = _totalCTN_new * totalPcsCtn;
    } else {
      _totalPCS_new = _balancePCS_old;
    }

    _balancePCS_new = _balancePCS_old - _totalPCS_new;
    if (_balancePCS_new <= 0) {
      _balancePCS_new = 0;
    }
    _actualctn_new = _totalPCS_new / totalPcsCtn;
    if (_balancePCS_new >= formulaTrigger) {
      _formula_new = formulaTrigger;
    } else {
      _formula_new = _balancePCS_new;
    }

    _sampleSize_new = samplesize_Check(_totalPCS_new);

    if (Math.sqrt(_actualctn_new) >= 13) {
      _ctnTake_new = 13;
    } else {
      _ctnTake_new = Math.ceil(Math.sqrt(_actualctn_new));
    }
    _ctn1 = Math.floor(_ctnTake_new / _totalpallet_new);
    _ctn2 = Math.ceil(_ctnTake_new / _totalpallet_new);
    _pallet1 = (_ctn2 * _totalpallet_new) - _ctnTake_new;
    _pallet2 = _ctnTake_new - (_ctn1 * _totalpallet_new);



    if (_ctnTake_new > 0 && _pallet1 == 0 && _pallet2 == 0) {
      _pallet1 = _totalpallet_new;
    }
    _pcsctn1 = Math.floor(_sampleSize_new / _ctnTake_new);
    _pcsctn2 = Math.ceil(_sampleSize_new / _ctnTake_new);
    _ctnout1 = (_pcsctn2 * _ctnTake_new) - _sampleSize_new;
    _ctnout2 = _sampleSize_new - (_pcsctn1 * _ctnTake_new);

    if (_pcsctn1 == _pcsctn2 && _totalpallet_new == 1) {
      _ctnout1 = ((_sampleSize_new / 2) / _pcsctn1);
      _ctnout2 = ((_sampleSize_new / 2) / _pcsctn2);
    }

    // console.log("_ctn2_1: "+_ctn1);
    // console.log("_ctn2_2: "+_ctn2);
    // console.log("_ctnTake2: "+_ctnTake_new);
    // console.log("_totalpallet2: "+_totalpallet_new);
    // console.log("pallet1: "+_pallet1);
    // console.log("pallet2: "+_pallet2);
    //
    // console.log("_sampleSize2: "+_sampleSize_new);
    // console.log("_pcsctn2_1: "+_pcsctn1);
    // console.log("_pcsctn2_2: "+_pcsctn2);
    // console.log("_ctnout2_1: "+_ctnout1);
    // console.log("_ctnout2_2: "+_ctnout2);

    var output = [];

    output.push({
      _totalpallet_new: _totalpallet_new,
      _sampleSize_new: _sampleSize_new,
      _totalPCS_new: _totalPCS_new,
      _totalCTN_new: _totalCTN_new,
      _balancePCS_new: _balancePCS_new,
      _actualctn_new: _actualctn_new,
      _formula_new: _formula_new,
      _ctnTake_new: _ctnTake_new,
      _ctn1: _ctn1,
      _ctn2: _ctn2,
      _pallet1: _pallet1,
      _pallet2: _pallet2,
      _pcsctn1: _pcsctn1,
      _pcsctn2: _pcsctn2,
      _ctnout1: _ctnout1,
      _ctnout2: _ctnout2
    });

    output_JSON = JSON.stringify(output);
    // console.log(output_JSON);
    return output_JSON;
  }

  // --------------------function check sample size----------------------
  function samplesize_Check(ssVal) {

    var result;

    if (ssVal > 500000) {
      result = 500;
    } else if (ssVal > 150000) {
      result = 315;
    } else if (ssVal > 35000) {
      result = 200;
    } else if (ssVal > 10000) {
      result = 125;
    } else if (ssVal > 3200) {
      result = 80;
    } else if (ssVal > 1200) {
      result = 50;
    } else if (ssVal > 500) {
      result = 32;
    } else {
      result = 0;
    }

    return result;
  }

  // --------------------function calculate acceptance ----------------------
  function acceptanceVal(ssVal, aqlVal) {
    var query = {
      ss: ssVal,
      aql: aqlVal
    };
    var accresult = samplingplanArr.filter(item => {
      for (let key in query) {
        if (item[key] === undefined || item[key] != query[key])
          return false;
      }
      return true;
    });

    // console.table(accresult);
    // tempAcc = accresult[0].acc;
    // console.log(accresult[0].acc);

    return accresult[0].acc;

  }




  // --------------------function generate button ----------------------


  $(document).on('click', '.generate', function() {
    palletdetails = [];
    temppalletdetails = [];
    $(".generatedRow").remove();
    list = 0;
    alert("Pallet details generated and calculated as per below.");
    presetpalletDetails();
  });

  // --------------------function generate presetpallet tables ----------------------

  function presetpalletDetails() {
    console.table(_lot2Details);
    Alltotalpallet = _totalpallet1 + _lot2Details[0]._totalpallet_new + _lot3Details[0]._totalpallet_new + _lot4Details[0]._totalpallet_new + _lot5Details[0]._totalpallet_new;


    //--------------------loop for lot 1 -------------------------------------

    temppalletdetails = presetpalletdetailscalculation(
      '1', Alltotalpallet, _sampleSize1, _totalpallet1, _pallet1_1, _pallet1_2, _pcsctn1_1, _pcsctn1_2, _ctnout1_1, _ctnout1_2, _ctn1_1, _ctn1_2

    );
    palletdetails = palletdetails.concat(temppalletdetails);
    // console.log('lot 1 all: ');
    // console.table(palletdetails);

    //----------------------end loop lot 1 --------------------------
    //--------------------loop for lot 2 -------------------------------------
    if (_balancePCS1 >= 1) {

      temppalletdetails = presetpalletdetailscalculation(
        '2', Alltotalpallet, _lot2Details[0]._sampleSize_new, _lot2Details[0]._totalpallet_new, _lot2Details[0]._pallet1, _lot2Details[0]._pallet2, _lot2Details[0]._pcsctn1, _lot2Details[0]._pcsctn2, _lot2Details[0]._ctnout1, _lot2Details[0]._ctnout2, _lot2Details[0]._ctn1, _lot2Details[0]._ctn2
      );
      palletdetails = palletdetails.concat(temppalletdetails);
    }
    // console.log('lot 2 all: ');
    // console.table(palletdetails);

    //----------------------end loop lot 2 --------------------------
    //--------------------loop for lot 3 -------------------------------------
    if (_lot2Details[0]._balancePCS_new >= 1) {
      temppalletdetails = presetpalletdetailscalculation(
        '3', Alltotalpallet, _lot3Details[0]._sampleSize_new, _lot3Details[0]._totalpallet_new, _lot3Details[0]._pallet1, _lot3Details[0]._pallet2, _lot3Details[0]._pcsctn1, _lot3Details[0]._pcsctn2, _lot3Details[0]._ctnout1, _lot3Details[0]._ctnout2, _lot3Details[0]._ctn1, _lot3Details[0]._ctn2
      );
      palletdetails = palletdetails.concat(temppalletdetails);
    }

    // console.log('lot 3 all: ');
    // console.table(palletdetails);
    //----------------------end loop lot 3 --------------------------
    //--------------------loop for lot 4 -------------------------------------
    if (_lot3Details[0]._balancePCS_new >= 1) {
      temppalletdetails = presetpalletdetailscalculation(
        '4', Alltotalpallet, _lot4Details[0]._sampleSize_new, _lot4Details[0]._totalpallet_new, _lot4Details[0]._pallet1, _lot4Details[0]._pallet2, _lot4Details[0]._pcsctn1, _lot4Details[0]._pcsctn2, _lot4Details[0]._ctnout1, _lot4Details[0]._ctnout2, _lot4Details[0]._ctn1, _lot4Details[0]._ctn2
      );
      palletdetails = palletdetails.concat(temppalletdetails);
    }

    // console.log('lot 4 all: ');
    // console.table(palletdetails);
    //----------------------end loop lot 4 --------------------------
    //--------------------loop for lot 5 -------------------------------------
    if (_lot4Details[0]._balancePCS_new >= 1) {
      temppalletdetails = presetpalletdetailscalculation(
        '5', Alltotalpallet, _lot5Details[0]._sampleSize_new, _lot5Details[0]._totalpallet_new, _lot5Details[0]._pallet1, _lot5Details[0]._pallet2, _lot5Details[0]._pcsctn1, _lot5Details[0]._pcsctn2, _lot5Details[0]._ctnout1, _lot5Details[0]._ctnout2, _lot5Details[0]._ctn1, _lot5Details[0]._ctn2
      );
      palletdetails = palletdetails.concat(temppalletdetails);
    }

    // console.log('lot 5 all: ');
    // console.table(palletdetails);
    //----------------------end loop lot 5 --------------------------

    //--------------------loop for lot 6 -------------------------------------
    if (_lot5Details[0]._balancePCS_new >= 1) {
      temppalletdetails = presetpalletdetailscalculation(
        '6', Alltotalpallet, _lot6Details[0]._sampleSize_new, _lot6Details[0]._totalpallet_new, _lot6Details[0]._pallet1, _lot6Details[0]._pallet2, _lot6Details[0]._pcsctn1, _lot6Details[0]._pcsctn2, _lot6Details[0]._ctnout1, _lot6Details[0]._ctnout2, _lot6Details[0]._ctn1, _lot6Details[0]._ctn2
      );
      palletdetails = palletdetails.concat(temppalletdetails);
    }

    // console.log('lot 6 all: ');
    // console.table(palletdetails);
    //----------------------end loop lot 6 --------------------------
    //--------------------loop for lot 7 -------------------------------------
    if (_lot6Details[0]._balancePCS_new >= 1) {
      temppalletdetails = presetpalletdetailscalculation(
        '7', Alltotalpallet, _lot7Details[0]._sampleSize_new, _lot7Details[0]._totalpallet_new, _lot7Details[0]._pallet1, _lot7Details[0]._pallet2, _lot7Details[0]._pcsctn1, _lot7Details[0]._pcsctn2, _lot7Details[0]._ctnout1, _lot7Details[0]._ctnout2, _lot7Details[0]._ctn1, _lot7Details[0]._ctn2
      );
      palletdetails = palletdetails.concat(temppalletdetails);
    }

    // console.log('lot 7 all: ');
    // console.table(palletdetails);
    //----------------------end loop lot 7 --------------------------
    //--------------------loop for lot 8 -------------------------------------
    if (_lot7Details[0]._balancePCS_new >= 1) {
      temppalletdetails = presetpalletdetailscalculation(
        '8', Alltotalpallet, _lot8Details[0]._sampleSize_new, _lot8Details[0]._totalpallet_new, _lot8Details[0]._pallet1, _lot8Details[0]._pallet2, _lot8Details[0]._pcsctn1, _lot8Details[0]._pcsctn2, _lot8Details[0]._ctnout1, _lot8Details[0]._ctnout2, _lot8Details[0]._ctn1, _lot8Details[0]._ctn2
      );
      palletdetails = palletdetails.concat(temppalletdetails);
    }

    // console.log('lot 8 all: ');
    // console.table(palletdetails);
    //----------------------end loop lot 8 --------------------------
    //--------------------loop for lot 9 -------------------------------------
    if (_lot8Details[0]._balancePCS_new >= 1) {
      temppalletdetails = presetpalletdetailscalculation(
        '9', Alltotalpallet, _lot9Details[0]._sampleSize_new, _lot9Details[0]._totalpallet_new, _lot9Details[0]._pallet1, _lot9Details[0]._pallet2, _lot9Details[0]._pcsctn1, _lot9Details[0]._pcsctn2, _lot9Details[0]._ctnout1, _lot9Details[0]._ctnout2, _lot9Details[0]._ctn1, _lot9Details[0]._ctn2
      );
      palletdetails = palletdetails.concat(temppalletdetails);
    }

    // console.log('lot 9 all: ');
    // console.table(palletdetails);
    //----------------------end loop lot 9 --------------------------
    //--------------------loop for lot 10 -------------------------------------
    if (_lot9Details[0]._balancePCS_new >= 1) {
      temppalletdetails = presetpalletdetailscalculation(
        '10', Alltotalpallet, _lot10Details[0]._sampleSize_new, _lot10Details[0]._totalpallet_new, _lot10Details[0]._pallet1, _lot10Details[0]._pallet2, _lot10Details[0]._pcsctn1, _lot10Details[0]._pcsctn2, _lot10Details[0]._ctnout1, _lot10Details[0]._ctnout2, _lot10Details[0]._ctn1, _lot10Details[0]._ctn2
      );
      palletdetails = palletdetails.concat(temppalletdetails);
    }

    // console.log('lot 10 all: ');
    // console.table(palletdetails);
    //----------------------end loop lot 10 --------------------------


    palletdetails.forEach((palletdetail, index) => {
      // console.table(palletdetail);
      // console.log('loop round :' + index);
      // console.log('list round :' + list);
      newrow(palletdetail, list);
    });

  }

  //---------------function for presetpalletdetailscalculation-------------------------



  function presetpalletdetailscalculation(
    _flcount, _falltotalpallet, _fsamplesize, _ftotalpallet, _fpallet1, _fpallet2,
    _fpcsctn1, _fpcsctn2, _fctnout1, _fctnout2, _fctn1, _fctn2
  ) {

    var palletnum = 1;
    var palletval = 0;
    var temp_details = [];
    var fpallet_details = [];
    var ctntotakeout = 0;
    var ctntotakecount = 1;
    var PcsInner1_1 = 0;
    var PcsInner2_1 = 0;
    var PcsInner1_2 = 0;
    var PcsInner2_2 = 0;
    var accHole = 0;
    var accNFG = 0;
    var accNAG = 0;
    var accMajor = 0;
    var accMinor = 0;
    var accGG = 0;
    var tempSS = 0;
    var accHoleup = 0;
    var accNFGup = 0;
    var accNAGup = 0;
    var accMajorup = 0;
    var accMinorup = 0;
    var accGGup = 0;
    var accHoledw = 0;
    var accNFGdw = 0;
    var accNAGdw = 0;
    var accMajordw = 0;
    var accMinordw = 0;
    var accGGdw = 0;
    var tempaccHole = 0;
    var tempaccNFG = 0;
    var tempaccNAG = 0;
    var tempaccMajor = 0;
    var tempaccMinor = 0;
    var tempaccGG = 0;
    var temptotalpallet = 0;


    // try {

    //------------- GET AQL Value -----------------------

    _aqlHole = $('#AQL_holes').val();
    _aqlNFG = $('#AQL_NFG').val();
    _aqlNAG = $('#AQL_NAG').val();
    _aqlMajor = $('#AQL_Major').val();
    _aqlMinor = $('#AQL_Minor').val();
    _aqlGG = $('#AQL_GG').val();

    //------------- GET acceptance Value -----------------------
    accHole = acceptanceVal(_fsamplesize, _aqlHole);
    accNAG = acceptanceVal(_fsamplesize, _aqlNFG);
    accNFG = acceptanceVal(_fsamplesize, _aqlNAG);
    accMajor = acceptanceVal(_fsamplesize, _aqlMajor);
    accMinor = acceptanceVal(_fsamplesize, _aqlMinor);
    accGG = acceptanceVal(_fsamplesize, _aqlGG);
    temptotalpallet = _ftotalpallet;

    accHoleup = Math.ceil(accHole / _ftotalpallet);
    accHoledw = Math.floor(accHole / _ftotalpallet);

    accNAGup = Math.ceil(accNAG / _ftotalpallet);
    accNAGdw = Math.floor(accNAG / _ftotalpallet);

    accNFGup = Math.ceil(accNFG / _ftotalpallet);
    accNFGdw = Math.floor(accNFG / _ftotalpallet);

    accMajorup = Math.ceil(accMajor / _ftotalpallet);
    accMajordw = Math.floor(accMajor / _ftotalpallet);

    accMinorup = Math.ceil(accMinor / _ftotalpallet);
    accMinordw = Math.floor(accMinor / _ftotalpallet);

    accGGup = Math.ceil(accGG / _ftotalpallet);
    accGGdw = Math.floor(accGG / _ftotalpallet);

    //------------- START LOOP CALCULATION Value -----------------------
    while (palletval < _fpallet1) {
      InnerCtn1 = Math.ceil(_fctn1 / 2);
      InnerCtn2 = _fctn1 - InnerCtn1;

      PcsInner1_1 = _fpcsctn1 * InnerCtn1;
      if (palletnum == _ftotalpallet) {
        // console.log("sec 1:"+_fsamplesize+" and "+PcsInner1_2+" and "+tempSS);
        PcsInner2_1 = _fsamplesize - PcsInner1_1 - tempSS;
      } else {
        PcsInner2_1 = _fpcsctn1 * InnerCtn2;
      }

      PcsInner1_2 = _fpcsctn2 * InnerCtn1;
      if (palletnum == _ftotalpallet) {
        // console.log("sec 2:"+_fsamplesize+" and "+PcsInner1_2+" and "+tempSS);
        if (_ftotalpallet == 1) {
          PcsInner2_2 = _fpcsctn1 * InnerCtn2;
        } else {
          PcsInner2_2 = _fsamplesize - PcsInner1_2 - tempSS;
        }
      } else {
        PcsInner2_2 = _fpcsctn2 * InnerCtn2;
      }

      if ((PcsInner1_2 + PcsInner2_2) != _fsamplesize && _ftotalpallet == 1) {
        PcsInner1_2 = _fpcsctn2 * InnerCtn2;
        PcsInner2_2 = _fpcsctn1 * InnerCtn1;
      }

      // console.log("-------------");
      // console.log(palletval);
      // console.log(_fpallet2);
      // console.log(ctntotakeout);
      // console.log(_fctnout2);
      // console.log(ctntotakecount);
      // console.log("-------------");

      temp_ctntotakeout1 = ctntotakeout + InnerCtn1;
      temp_ctntotakeout2 = ctntotakeout + InnerCtn1 + InnerCtn2;

      if (accHole == temptotalpallet * accHoleup) {
        tempaccHole = accHoleup;
        accHole -= accHoleup;
      } else {
        tempaccHole = accHoledw;
        accHole -= accHoledw;
      }

      if (accNAG == temptotalpallet * accNAGup) {
        tempaccNAG = accNAGup;
        accNAG -= accNAGup;
      } else {
        tempaccNAG = accNAGdw;
        accNAG -= accNAGdw;
      }

      if (accNFG == temptotalpallet * accNFGup) {
        tempaccNFG = accNFGup;
        accNFG -= accNFGup;
      } else {
        tempaccNFG = accNFGdw;
        accNFG -= accNFGdw;
      }

      if (accMinor == temptotalpallet * accMinorup) {
        tempaccMinor = accMinorup;
        accMinor -= accMinorup;
      } else {
        tempaccMinor = accMinordw;
        accMinor -= accMinordw;
      }

      if (accMajor == temptotalpallet * accMajorup) {
        tempaccMajor = accMajorup;
        accMajor -= accMajorup;
      } else {
        tempaccMajor = accMajordw;
        accMajor -= accMajordw;
      }

      if (accGG == temptotalpallet * accGGup) {
        tempaccGG = accGGup;
        accGG -= accGGup;
      } else {
        tempaccGG = accGGdw;
        accGG -= accGGdw;
      }
      // console.log('tempaccMajor: '+tempaccMajor);
      temptotalpallet -= 1;


      if (palletnum == _ftotalpallet && temp_ctntotakeout1 >= _fctnout1 && ctntotakecount == 1) {
        temp_details = [{
          Itemnumber: 0,
          LotCount: _flcount,
          PalletNumber: palletnum,
          CtnPallet: _fctn2,
          InnerCtn: InnerCtn1,
          PcsInner: PcsInner1_2,
          InnerCtn2: InnerCtn2,
          PcsInner2: PcsInner2_2,
          SSVisual: PcsInner1_2 + PcsInner2_2,
          SSApt: PcsInner1_2 + PcsInner2_2,
          AccHoles: tempaccHole,
          AccNFG: tempaccNFG,
          AccNAG: tempaccNFG,
          AccMajor: tempaccMajor,
          AccMinor: tempaccMinor,
          AccGG: tempaccGG
        }];
        tempSS += PcsInner1_2 + PcsInner2_2;
        // ctntotakeout++;
        ctntotakeout += _fctn1;
        // console.log("-------------");
        // console.log(ctntotakeout);
        // console.log("-------------");
        palletnum++;
        palletval++;
        fpallet_details = fpallet_details.concat(temp_details);
      } else if (ctntotakeout < _fctnout1 && ctntotakecount == 1) {
        temp_details = [{
          Itemnumber: 0,
          LotCount: _flcount,
          PalletNumber: palletnum,
          CtnPallet: _fctn1,
          InnerCtn: InnerCtn1,
          PcsInner: PcsInner1_1,
          InnerCtn2: InnerCtn2,
          PcsInner2: PcsInner2_1,
          SSVisual: PcsInner1_1 + PcsInner2_1,
          SSApt: PcsInner1_1 + PcsInner2_1,
          AccHoles: tempaccHole,
          AccNFG: tempaccNAG,
          AccNAG: tempaccNFG,
          AccMajor: tempaccMajor,
          AccMinor: tempaccMinor,
          AccGG: tempaccGG
        }];
        tempSS += PcsInner1_1 + PcsInner2_1;
        // ctntotakeout++;
        ctntotakeout += _fctn1;
        // console.log("-------------");
        // console.log(ctntotakeout);
        // console.log("-------------");
        palletnum++;
        palletval++;
        fpallet_details = fpallet_details.concat(temp_details);
      } else if (ctntotakeout < _fctnout2 && ctntotakecount == 2) {
        temp_details = [{
          Itemnumber: 0,
          LotCount: _flcount,
          PalletNumber: palletnum,
          CtnPallet: _fctn1,
          InnerCtn: InnerCtn1,
          PcsInner: PcsInner1_2,
          InnerCtn2: InnerCtn2,
          PcsInner2: PcsInner2_2,
          SSVisual: PcsInner1_2 + PcsInner2_2,
          SSApt: PcsInner1_2 + PcsInner2_2,
          AccHoles: tempaccHole,
          AccNFG: tempaccNAG,
          AccNAG: tempaccNFG,
          AccMajor: tempaccMajor,
          AccMinor: tempaccMinor,
          AccGG: tempaccGG
        }];
        tempSS += PcsInner1_2 + PcsInner2_2;
        // ctntotakeout++;
        ctntotakeout += _fctn1;
        // console.log("-------------");
        // console.log(ctntotakeout);
        // console.log("-------------");
        palletnum++;
        palletval++;
        fpallet_details = fpallet_details.concat(temp_details);
      } else if (ctntotakeout >= _fctnout1 && ctntotakecount == 1) {
        ctntotakeout = 0;
        ctntotakecount = 2;
      }
    }
    palletval = 0;

    while (palletval < _fpallet2) {
      InnerCtn1 = Math.ceil(_fctn2 / 2);
      InnerCtn2 = _fctn2 - InnerCtn1;

      PcsInner1_1 = _fpcsctn1 * InnerCtn1;
      if (palletnum == _ftotalpallet) {
        PcsInner2_1 = _fsamplesize - PcsInner1_1 - tempSS;
        // console.log("sec 3:"+_fsamplesize+" and "+PcsInner1_2+" and "+tempSS+" and "+PcsInner2_1 );
      } else {
        PcsInner2_1 = _fpcsctn1 * InnerCtn2;
      }

      PcsInner1_2 = _fpcsctn2 * InnerCtn1;
      if (palletnum == _ftotalpallet) {
        if (_ftotalpallet == 1) {
          PcsInner2_2 = _fpcsctn1 * InnerCtn2;
        } else {
          PcsInner2_2 = _fsamplesize - PcsInner1_2 - tempSS;
        }
        // console.log("sec 4:"+_fsamplesize+" and "+PcsInner1_2+" and "+tempSS+" and "+PcsInner2_2);
      } else {
        PcsInner2_2 = _fpcsctn2 * InnerCtn2;
      }

      if ((PcsInner1_2 + PcsInner2_2) != _fsamplesize && _ftotalpallet == 1) {
        PcsInner1_2 = _pcsctn2_2 * InnerCtn2;
        PcsInner2_2 = _pcsctn2_1 * InnerCtn1;
      }

      // console.log("-------------");
      // console.log(palletval);
      // console.log(_fpallet2);
      // console.log(ctntotakeout);
      // console.log(_fctnout2);
      // console.log(ctntotakecount);
      // console.log("-------------");

      temp_ctntotakeout1 = ctntotakeout + InnerCtn1;
      temp_ctntotakeout2 = ctntotakeout + InnerCtn1 + InnerCtn2;

      if (accHole == temptotalpallet * accHoleup) {
        tempaccHole = accHoleup;
        accHole -= accHoleup;
      } else {
        tempaccHole = accHoledw;
        accHole -= accHoledw;
      }

      if (accNAG == temptotalpallet * accNAGup) {
        tempaccNAG = accNAGup;
        accNAG -= accNAGup;
      } else {
        tempaccNAG = accNAGdw;
        accNAG -= accNAGdw;
      }

      if (accNFG == temptotalpallet * accNFGup) {
        tempaccNFG = accNFGup;
        accNFG -= accNFGup;
      } else {
        tempaccNFG = accNFGdw;
        accNFG -= accNFGdw;
      }

      if (accMinor == temptotalpallet * accMinorup) {
        tempaccMinor = accMinorup;
        accMinor -= accMinorup;
      } else {
        tempaccMinor = accMinordw;
        accMinor -= accMinordw;
      }

      if (accMajor == temptotalpallet * accMajorup) {
        tempaccMajor = accMajorup;
        accMajor -= accMajorup;
      } else {
        tempaccMajor = accMajordw;
        accMajor -= accMajordw;
      }

      if (accGG == temptotalpallet * accGGup) {
        tempaccGG = accGGup;
        accGG -= accGGup;
      } else {
        tempaccGG = accGGdw;
        accGG -= accGGdw;
      }
      // console.log('tempaccMajor: '+tempaccMajor);

      temptotalpallet -= 1;

      if (palletnum == _ftotalpallet && temp_ctntotakeout1 >= _fctnout1 && ctntotakecount == 1) {
        temp_details = [{
          Itemnumber: 0,
          LotCount: _flcount,
          PalletNumber: palletnum,
          CtnPallet: _fctn2,
          InnerCtn: InnerCtn1,
          PcsInner: PcsInner1_2,
          InnerCtn2: InnerCtn2,
          PcsInner2: PcsInner2_2,
          SSVisual: PcsInner1_2 + PcsInner2_2,
          SSApt: PcsInner1_2 + PcsInner2_2,
          AccHoles: tempaccHole,
          AccNFG: tempaccNAG,
          AccNAG: tempaccNFG,
          AccMajor: tempaccMajor,
          AccMinor: tempaccMinor,
          AccGG: tempaccGG
        }];
        tempSS += PcsInner1_2 + PcsInner2_2;
        // ctntotakeout++;
        ctntotakeout += _fctn2;
        // console.log("-------------");
        // console.log(ctntotakeout);
        // console.log("-------------");
        palletnum++;
        palletval++;
        fpallet_details = fpallet_details.concat(temp_details);
      } else if (ctntotakeout < _fctnout1 && ctntotakecount == 1) {
        temp_details = [{
          Itemnumber: 0,
          LotCount: _flcount,
          PalletNumber: palletnum,
          CtnPallet: _fctn2,
          InnerCtn: InnerCtn1,
          PcsInner: PcsInner1_1,
          InnerCtn2: InnerCtn2,
          PcsInner2: PcsInner2_1,
          SSVisual: PcsInner1_1 + PcsInner2_1,
          SSApt: PcsInner1_1 + PcsInner2_1,
          AccHoles: tempaccHole,
          AccNFG: tempaccNAG,
          AccNAG: tempaccNFG,
          AccMajor: tempaccMajor,
          AccMinor: tempaccMinor,
          AccGG: tempaccGG
        }];
        tempSS += PcsInner1_1 + PcsInner2_1;
        // ctntotakeout++;
        ctntotakeout += _fctn2;
        // console.log("-------------");
        // console.log(ctntotakeout);
        // console.log("-------------");
        palletnum++;
        palletval++;
        fpallet_details = fpallet_details.concat(temp_details);
      } else if (ctntotakeout < _fctnout2 && ctntotakecount == 2) {
        temp_details = [{
          Itemnumber: 0,
          LotCount: _flcount,
          PalletNumber: palletnum,
          CtnPallet: _fctn2,
          InnerCtn: InnerCtn1,
          PcsInner: PcsInner1_2,
          InnerCtn2: InnerCtn2,
          PcsInner2: PcsInner2_2,
          SSVisual: PcsInner1_2 + PcsInner2_2,
          SSApt: PcsInner1_2 + PcsInner2_2,
          AccHoles: tempaccHole,
          AccNFG: tempaccNAG,
          AccNAG: tempaccNFG,
          AccMajor: tempaccMajor,
          AccMinor: tempaccMinor,
          AccGG: tempaccGG
        }];
        tempSS += PcsInner1_2 + PcsInner2_2;
        // ctntotakeout++;
        ctntotakeout += _fctn2;
        // console.log("-------------");
        // console.log(ctntotakeout);
        // console.log("-------------");
        palletnum++;
        palletval++;
        fpallet_details = fpallet_details.concat(temp_details);

      } else if (ctntotakeout >= _fctnout1 && ctntotakecount == 1) {
        ctntotakeout = 0;
        ctntotakecount = 2;
      }
    }

    palletval = 0;
    temp_details = [];
    ctntotakeout = 0;
    ctntotakecount = 1;
    PcsInner1_1 = 0;
    PcsInner2_1 = 0;
    PcsInner1_2 = 0;
    PcsInner2_2 = 0;
    accHole = 0;
    accNFG = 0;
    accNAG = 0;
    accMajor = 0;
    accMinor = 0;
    palletnum = 1;
    tempSS = 0;
    // console.table(fpallet_details);
    // }
    //  catch(err) {
    //    console.log(err.message);
    //  }

    return fpallet_details;
  }

  //-------------------------------------------------------------------------------




  $("#SONumber").keyup(function() {

    var SONumber = $(this).val().trim();
    if (SONumber != '') {

      $("#checkk").show();



      if (SONumber.match(/\d/g).length === 10) {
        $("#checkk").html("<span style='color:green;'>Good</span>");
        //$("#BatchNumber").val("");
      } else {
        $("#checkk").html("<span style='color:red;'>Must be 10 digit</span>");
      }

    } else {
      $("#checkk").hide();
    }
  });


  $(".gloveSizePrimary").change(function() {
    //console.log(list);
    _selectedSize = $(".gloveSizePrimary").val();
    for (var i = 1; i <= list; i++) {
      //  console.log(i);
      sizeNew = ".sizeRow" + i;
      //console.log(sizeNew);
      //console.log(_selectedSize);
      if ($(sizeNew).val() == '') {
        $(sizeNew).val(_selectedSize);
      }
    }
  });

  $(document).on('click', '.add', function() {
    temp_details = {
      Itemnumber: 0,
      LotCount: 0,
      PalletNumber: list + 1,
      CtnPallet: 0,
      InnerCtn: 0,
      PcsInner: 0,
      InnerCtn2: 0,
      PcsInner2: 0,
      SSVisual: 0,
      SSApt: 0,
      AccHoles: 0,
      AccNFG: 0,
      AccNAG: 0,
      AccMajor: 0,
      AccMinor: 0,
      AccGG: 0
    };
    console.log(temp_details);
    newrow(temp_details, list);
  });




  function newrow(detail, ind) {
    var sizeoption_ = '<?php echo $size_; ?>';
    // console.log(sizeoption_);
    // console.log(detail);
    // console.log("itemnumber: "+ detail.Itemnumber);
    _selectedSize = $("#GloveSizeKey").val();
    _selectedSize = _selectedSize.substring(0, 1);
    if (list < 300) {
      ind++;
      list = ind;

      // console.log(list);
      var html = '';
      html += '<tr class="generatedRow">';
      html += '<td width="250px"><select name="GloveSizeKey[]" class="form-control gloveSizeSub fstdropdown-select sizeRow' + ind + '" required><option value="">Size</option>' + sizeoption_ + '</select></td>';
      html += '<td width="250px"><input type="number" oninput="this.value=this.value.slice(0,this.maxLength); this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" maxlength = "5" name="itemnumber[]" class="form-control itemnumber' + ind + '" placeholder="Enter Item Number" value="' + detail.Itemnumber + '" required></td>';
      html += '<td width="250px"><input type="number" oninput="this.value=this.value.slice(0,this.maxLength); this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" maxlength = "5" name="lotcount[]" class="form-control lotcount' + ind + '" placeholder="Lot Count" value="' + detail.LotCount + '" required></td>';
      html += '<td width="250px"><input type="number" oninput="this.value=this.value.slice(0,this.maxLength); this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" maxlength = "5" name="palletNumber[]" class="form-control palletNumber' + ind + '" placeholder="Pallet Number" value="' + ind + '"></td>';
      html += '<td width="250px"><input type="number" oninput="this.value=this.value.slice(0,this.maxLength); this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" maxlength = "5" name="ctnpallet[]" class="form-control ctnpallet' + ind + '" placeholder="0" value="' + detail.CtnPallet + '" required></td>';
      html += '<td width="250px"><input type="number" oninput="this.value=this.value.slice(0,this.maxLength); this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" maxlength = "5" name="innerctn[]" class="form-control innnerctn' + ind + '" placeholder="0" value="' + detail.InnerCtn + '" required></td>';
      html += '<td width="250px"><input type="number" oninput="this.value=this.value.slice(0,this.maxLength); this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" maxlength = "5" name="pcsinner[]" class="form-control pcsinner' + ind + '" placeholder="0" value="' + detail.PcsInner + '" required></td>';
      html += '<td width="250px"><input type="number" oninput="this.value=this.value.slice(0,this.maxLength); this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" maxlength = "5" name="innerctn2[]" class="form-control innerctn2' + ind + '" placeholder="0" value="' + detail.InnerCtn2 + '" required></td>';
      html += '<td width="250px"><input type="number" oninput="this.value=this.value.slice(0,this.maxLength); this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" maxlength = "5" name="pcsinner2[]" class="form-control pcsinner2' + ind + '" placeholder="0" value="' + detail.PcsInner2 + '" required></td>';
      html += '<td width="250px"><input type="number" oninput="this.value=this.value.slice(0,this.maxLength); this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" maxlength = "5" name="visual[]" class="form-control sample' + ind + '" placeholder="SS Visual" value="' + detail.SSVisual + '" required></td>';
      html += '<td width="250px"><input type="number" oninput="this.value=this.value.slice(0,this.maxLength); this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" maxlength = "5" name="sample[]" class="form-control sample' + ind + '" placeholder="APT/WTT" value="' + detail.SSApt + '" required></td>';
      html += '<td width="250px"><input type="number" oninput="this.value=this.value.slice(0,this.maxLength); this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" maxlength = "5" name="accFFH[]" class="form-control accFFH' + ind + '" placeholder="Acc FFH" value="' + detail.AccHoles + '" required></td>';
      html += '<td width="250px"><input type="number" oninput="this.value=this.value.slice(0,this.maxLength); this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" maxlength = "5" name="accNFG[]" class="form-control accNFG' + ind + '" placeholder="Acc Critical NFG" value="' + detail.AccNFG + '" required></td>';
      html += '<td width="250px"><input type="number" oninput="this.value=this.value.slice(0,this.maxLength); this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" maxlength = "5" name="accNAG[]" class="form-control accNAG' + ind + '" placeholder="Acc Critical NAG" value="' + detail.AccNAG + '" required></td>';
      html += '<td width="250px"><input type="number" oninput="this.value=this.value.slice(0,this.maxLength); this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" maxlength = "5" name="accMajor[]" class="form-control accMajor' + ind + '" placeholder="Acc Major" value="' + detail.AccMajor + '"  required></td>';
      html += '<td width="250px"><input type="number" oninput="this.value=this.value.slice(0,this.maxLength); this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" maxlength = "5" name="accMinor[]" class="form-control accMinor' + ind + '" placeholder="Acc Minor" value="' + detail.AccMinor + '" required></td>';
      html += '<td width="250px"><input type="number" oninput="this.value=this.value.slice(0,this.maxLength); this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" maxlength = "5" name="accGG[]" class="form-control accGG' + ind + '" placeholder="Acc GG" value="' + detail.AccGG + '" required></td>';
      html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="glyphicon glyphicon-minus"></span></button></td></tr>';

      $('#item_table').append(html);
      //console.log(_selectedSize);
      sizeRow = ".sizeRow" + ind;
      // alert(sizeRow);
      if (_selectedSize != '') {
        // console.log(_selectedSize);
        $(sizeRow).val(_selectedSize);
      }
    } else {
      alert("reached maximum number of pallets");
    }

  }

  $(document).on('click', '.remove', function() {
    list--;
    $(this).closest('tr').remove();
  });
</script>