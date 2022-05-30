<?php $size_ = size_selection($connect, $M_GloveSize); ?>


<script>
  var list = 0;
  var _selectedSize = '';
  var sizeRow = '';
  var sizeNew = '';

  var tempExceedPallet = 0;
  var limitpalletperlot = 0;
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
  var _totalCtnTake = 0;
  var _pallet_lot1_low = 0;
  var _ctn_lot1_down = 0;
  var _pallet_lot1_high = 0;
  var _ctn_lot1_up = 0;
  var _pcsctn_lot1_down = 0;
  var _pcsctn_lot1_up = 0;
  var _ctnout_lot1_low = 0;
  var _ctnout_lot1_high = 0;

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
  _sampleinner = $("#sampleinner").val("1");


  $("#totalPcsSize").keyup(function() {
    totalPcsSize = $(this).val();
    totalCTN = $("#totalCTN").val();
    totalPcsCtn = $("#totalPcsCtn").val();
    maxPCS = $("#maxPCS").val();
    _sampleinner = $("#sampleinner").val();

    if (totalPcsSize == '') {
      totalPcsSize = 0;
    }
    // console.log("totalPcsSize: "+totalPcsSize);

    if (totalPcsSize > 0 && totalCTN > 0 && totalPcsCtn > 0 && maxPCS > 0 && _sampleinner > 0) {
      calculateProcess();
    }
  });

  $("#totalCTN").keyup(function() {
    totalCTN = $(this).val();
    totalPcsSize = $("#totalPcsSize").val();
    totalPcsCtn = $("#totalPcsCtn").val();
    maxPCS = $("#maxPCS").val();
    _sampleinner = $("#sampleinner").val();
    if (totalCTN == '') {
      totalCTN = 0;
    }
    // console.log("totalCTN: "+totalCTN);

    if (totalPcsSize > 0 && totalCTN > 0 && totalPcsCtn > 0 && maxPCS > 0 && _sampleinner > 0) {
      calculateProcess();
    }
  });

  $("#totalPcsCtn").keyup(function() {
    totalPcsCtn = $(this).val();
    totalPcsSize = $("#totalPcsSize").val();
    totalCTN = $("#totalCTN").val();
    maxPCS = $("#maxPCS").val();
    _sampleinner = $("#sampleinner").val();
    if (totalPcsCtn == '') {
      totalPcsCtn = 0;
    }
    // console.log("totalPcsCtn: "+totalPcsCtn);

    if (totalPcsSize > 0 && totalCTN > 0 && totalPcsCtn > 0 && maxPCS > 0 && _sampleinner > 0) {
      calculateProcess();
    }
  });

  $("#maxPCS").keyup(function() {
    maxPCS = $(this).val();
    totalPcsSize = $("#totalPcsSize").val();
    totalCTN = $("#totalCTN").val();
    totalPcsCtn = $("#totalPcsCtn").val();
    _sampleinner = $("#sampleinner").val();

    if (maxPCS == '') {
      maxPCS = 0;
    }
    // console.log("maxPCS: "+maxPCS);
    if (parseInt(maxPCS) >= 300000) {
      if (totalPcsSize > 0 && totalCTN > 0 && totalPcsCtn > 0 && maxPCS > 0 && _sampleinner > 0) {
        calculateProcess();
      }
    }

  });

  $("#sampleinner").keyup(function() {
    _sampleinner = $(this).val();
    totalPcsSize = $("#totalPcsSize").val();
    totalCTN = $("#totalCTN").val();
    totalPcsCtn = $("#totalPcsCtn").val();
    maxPCS = $("#maxPCS").val();

    if (_sampleinner == '') {
      _sampleinner = 0;
    }
    // console.log("maxPCS: "+maxPCS);

    if (totalPcsSize > 0 && totalCTN > 0 && totalPcsCtn > 0 && maxPCS > 0 && _sampleinner > 0) {
      calculateProcess();
    }
  });


  // --------------------function calculate process----------------------
  function calculateProcess() {
    var limitPCS = 0;
    tempExceedPallet = 0;
    totalOrder = totalPcsSize / totalPcsCtn;
    totalPallet = Math.ceil((totalPcsSize / totalPcsCtn) / totalCTN);
    // console.log("!!! totalPallet: "+totalPallet);
    // console.log("!!! totalOrder: "+totalOrder);
    console.log("!!! totalPcsSize: "+totalPcsSize);
    // console.log("!!! totalPcsCtn: "+totalPcsCtn);
    // console.log("!!! totalCTN: "+totalCTN);
    console.log("!!! maxPCS: "+maxPCS);
    totalPcsSize = Number.parseInt(totalPcsSize);
    maxPCS = Number.parseInt(maxPCS);
    if (totalPcsSize >= maxPCS) {
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

      limitpalletperlot = Math.floor(parseInt(limitPCS) / (parseInt(totalPcsCtn) * parseInt(totalCTN)));
      // console.log("IF " + limitPCS + "/(" + totalPcsCtn + "*" + totalCTN + ") = " + _totalpallet1);

      // _totalCTN1 = _totalpallet1 * totalCTN;
    } else {
      limitpalletperlot = Math.ceil(parseInt(limitPCS) / (parseInt(totalPcsCtn) * parseInt(totalCTN)));
      // console.log("Else " + limitPCS + "/(" + totalPcsCtn + "*" + totalCTN + ") = " + _totalpallet1);
      // _totalCTN1 = totalOrder;
    }
    console.log("limitpalletperlot: " + limitpalletperlot);

    var totallotcount = 0;
    var temppalletinlot = totalPallet;
    console.log("temppalletinlot outside loop: " + temppalletinlot);
    //loop yang tentukan berapa lot
    while (temppalletinlot > 0) {
      temppalletinlot = temppalletinlot - limitpalletperlot;
      console.log("temppalletinlot: " + temppalletinlot);

      totallotcount++;
    }
    console.log("totallotcount: " + totallotcount);

    //total pallet untuk lot pertama
    _totalpallet1 = Math.ceil(totalPallet / totallotcount);
    //next lot punya total pallet bole check untuk tgk sama rata
    _nexttotalpallet = Math.floor(totalPallet / totallotcount);
    let tempNotExceedPallet = _nexttotalpallet * totallotcount;
    //mesti kosong kalau x kene tambah formulation baru
    tempExceedPallet = totalPallet - tempNotExceedPallet;

    console.log("tempNotExceedPallet: " + tempNotExceedPallet);
    console.log("tempExceedPallet: " + tempExceedPallet);


    if (parseInt(totalOrder) - 1 >= (parseInt(limitPCS) / parseInt(totalPcsCtn))) {
      _totalCTN1 = _totalpallet1 * totalCTN;
    } else {
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

    _actualctn1 = ((_totalPCS1 / totalPcsCtn).toFixed(2));
    if (parseInt(_balancePCS1) >= parseInt(formulaTrigger)) {
      _formula1 = formulaTrigger;
    } else {
      _formula1 = _balancePCS1;
    }

    _sampleSize1 = samplesize_Check(_totalPCS1);

    if (Math.sqrt(_actualctn1) >= 13) {
      _totalCtnTake = 13;
    } else {
      _totalCtnTake = Math.ceil(Math.sqrt(_actualctn1));
    }
    _ctn_lot1_down = Math.floor(_totalCtnTake / _totalpallet1);
    _ctn_lot1_up = Math.ceil(_totalCtnTake / _totalpallet1);


    _pallet_lot1_low = (_ctn_lot1_up * _totalpallet1) - _totalCtnTake;
    _pallet_lot1_high = _totalpallet1 - _pallet_lot1_low;


    console.log("_ctn_lot1_down: " + _ctn_lot1_down);
    console.log("_ctn_lot1_up: " + _ctn_lot1_up);
    console.log("_totalCtnTake: " + _totalCtnTake);
    console.log("_totalpallet1: " + _totalpallet1);

    //untuk pastikan pallet yang x cukup sifat dikira sebagai 1 pallet jugek

    if (_totalCtnTake > 0 && _pallet_lot1_low == 0 && _pallet_lot1_high == 0) {
      _pallet_lot1_low = _totalpallet1;
    }

    console.log("_pallet_lot1_low: " + _pallet_lot1_low);
    console.log("_pallet_lot1_high: " + _pallet_lot1_high);


    _pcsctn_lot1_down = Math.floor(_sampleSize1 / (_totalCtnTake * _sampleinner));
    _pcsctn_lot1_up = Math.ceil(_sampleSize1 / (_totalCtnTake * _sampleinner));

    _ctnout_lot1_low = (_pcsctn_lot1_up * _totalCtnTake) - _sampleSize1;
    _ctnout_lot1_high = _totalCtnTake - _ctnout_lot1_low;

    if (_pcsctn_lot1_down == _pcsctn_lot1_up && _totalpallet1 == 1) {
      _ctnout_lot1_low = ((_sampleSize1 / 2) / _pcsctn_lot1_down);
      _ctnout_lot1_high = ((_sampleSize1 / 2) / _pcsctn_lot1_up);
    }

    console.log("_pcsctn_lot1_down: " + _pcsctn_lot1_down);
    console.log("_pcsctn_lot1_up: " + _pcsctn_lot1_up);
    console.log("_ctnout_lot1_low: " + _ctnout_lot1_low);
    console.log("_ctnout_lot1_high: " + _ctnout_lot1_high);

    console.log("_totalCtnTake: " + _totalCtnTake);
    console.log("_pcsctn_lot1_down: " + _pcsctn_lot1_down);
    console.log("_pcsctn_lot1_up: " + _pcsctn_lot1_up);
    console.log("_ctnout_lot1_low: " + _ctnout_lot1_low);
    console.log("_ctnout_lot1_high: " + _ctnout_lot1_high);


    $('#TPallet1').val(_totalpallet1);
    $('#TCTN1').val(_totalCTN1);//xnk tgk
    $('#TPcs1').val(_totalPCS1);
    $('#Balance1').val(_balancePCS1);
    $('#ATCTN1').val(_actualctn1);
    $('#Formula1').val(_formula1);//xnk tgk
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
        _ctn_down: 0,
        _ctn_up: 0,
        _pallet_low: 0,
        _pallet_high: 0,
        _pcsctn_down: 0,
        _pcsctn_high: 0,
        _ctnout_low: 0,
        _ctnout_high: 0
      }
    };
    // console.table(exceed_output);

    // ---------- lot number 2 --------------

    if (_balancePCS1 == 0) {
      _lot2Details = exceed_output;
      // console.table(_lot2Details);
    } else {
      _lot2JSON = calculateLotDetails(_totalpallet1, _nexttotalpallet, _formula1, limitPCS, totalCTN, totalPcsCtn, _balancePCS1, formulaTrigger);
      _lot2Details = JSON.parse(_lot2JSON);
      // console.table(_lot2Details);
    }

    $('#TPallet2').val(_lot2Details[0]._totalpallet_new);
    // $('#TCTN2').val(_lot2Details[0]._totalCTN_new);
    $('#TPcs2').val(_lot2Details[0]._totalPCS_new);
    // $('#Balance2').val(_lot2Details[0]._balancePCS_new);
    $('#ATCTN2').val(_lot2Details[0]._actualctn_new);
    $('#Formula2').val(_lot2Details[0]._formula_new);
    $('#TSS2').val(_lot2Details[0]._sampleSize_new);

    // ---------- lot number 3 --------------

    if (_lot2Details[0]._balancePCS_new == 0) {
      _lot3Details = exceed_output;
      // console.table(_lot3Details);
    } else {
      _lot3JSON = calculateLotDetails(_totalpallet1, _nexttotalpallet, _lot2Details[0]._formula_new, limitPCS, totalCTN, totalPcsCtn, _lot2Details[0]._balancePCS_new, formulaTrigger);
      _lot3Details = JSON.parse(_lot3JSON);
      // console.table(_lot3Details);
    }

    $('#TPallet3').val(_lot3Details[0]._totalpallet_new);
    // $('#TCTN3').val(_lot3Details[0]._totalCTN_new);
    $('#TPcs3').val(_lot3Details[0]._totalPCS_new);
    // $('#Balance3').val(_lot3Details[0]._balancePCS_new);
    $('#ATCTN3').val(_lot3Details[0]._actualctn_new);
    $('#Formula3').val(_lot3Details[0]._formula_new);
    $('#TSS3').val(_lot3Details[0]._sampleSize_new);

    // ---------- lot number 4 --------------

    if (_lot3Details[0]._balancePCS_new == 0) {
      _lot4Details = exceed_output;
      // console.table(_lot4Details);
    } else {
      _lot4JSON = calculateLotDetails(_totalpallet1, _nexttotalpallet, _lot3Details[0]._formula_new, limitPCS, totalCTN, totalPcsCtn, _lot3Details[0]._balancePCS_new, formulaTrigger);
      _lot4Details = JSON.parse(_lot4JSON);
      // console.table(_lot4Details);
    }

    $('#TPallet4').val(_lot4Details[0]._totalpallet_new);
    // $('#TCTN4').val(_lot4Details[0]._totalCTN_new);
    $('#TPcs4').val(_lot4Details[0]._totalPCS_new);
    // $('#Balance4').val(_lot4Details[0]._balancePCS_new);
    $('#ATCTN4').val(_lot4Details[0]._actualctn_new);
    $('#Formula4').val(_lot4Details[0]._formula_new);
    $('#TSS4').val(_lot4Details[0]._sampleSize_new);

    // ---------- lot number 5 --------------

    if (_lot4Details[0]._balancePCS_new == 0) {
      _lot5Details = exceed_output;
      // console.table(_lot5Details);
    } else {
      _lot5JSON = calculateLotDetails(_totalpallet1, _nexttotalpallet, _lot4Details[0]._formula_new, limitPCS, totalCTN, totalPcsCtn, _lot4Details[0]._balancePCS_new, formulaTrigger);
      _lot5Details = JSON.parse(_lot5JSON);
      // console.table(_lot5Details);
    }

    $('#TPallet5').val(_lot5Details[0]._totalpallet_new);
    // $('#TCTN5').val(_lot5Details[0]._totalCTN_new);
    $('#TPcs5').val(_lot5Details[0]._totalPCS_new);
    // $('#Balance5').val(_lot5Details[0]._balancePCS_new);
    $('#ATCTN5').val(_lot5Details[0]._actualctn_new);
    $('#Formula5').val(_lot5Details[0]._formula_new);
    $('#TSS5').val(_lot5Details[0]._sampleSize_new);

    // ---------- lot number 6 --------------

    if (_lot5Details[0]._balancePCS_new == 0) {
      _lot6Details = exceed_output;
      // console.table(_lot6Details);
    } else {
      _lot6JSON = calculateLotDetails(_totalpallet1, _nexttotalpallet, _lot5Details[0]._formula_new, limitPCS, totalCTN, totalPcsCtn, _lot5Details[0]._balancePCS_new, formulaTrigger);
      _lot6Details = JSON.parse(_lot6JSON);
      // console.table(_lot6Details);
    }

    $('#TPallet6').val(_lot6Details[0]._totalpallet_new);
    // $('#TCTN6').val(_lot6Details[0]._totalCTN_new);
    $('#TPcs6').val(_lot6Details[0]._totalPCS_new);
    // $('#Balance6').val(_lot6Details[0]._balancePCS_new);
    $('#ATCTN6').val(_lot6Details[0]._actualctn_new);
    $('#Formula6').val(_lot6Details[0]._formula_new);
    $('#TSS6').val(_lot6Details[0]._sampleSize_new);

    // ---------- lot number 7 --------------

    if (_lot6Details[0]._balancePCS_new == 0) {
      _lot7Details = exceed_output;
      // console.table(_lot7Details);
    } else {
      _lot7JSON = calculateLotDetails(_totalpallet1, _nexttotalpallet, _lot6Details[0]._formula_new, limitPCS, totalCTN, totalPcsCtn, _lot6Details[0]._balancePCS_new, formulaTrigger);
      _lot7Details = JSON.parse(_lot7JSON);
      // console.table(_lot7Details);
    }

    $('#TPallet7').val(_lot7Details[0]._totalpallet_new);
    // $('#TCTN7').val(_lot7Details[0]._totalCTN_new);
    $('#TPcs7').val(_lot7Details[0]._totalPCS_new);
    // $('#Balance7').val(_lot7Details[0]._balancePCS_new);
    $('#ATCTN7').val(_lot7Details[0]._actualctn_new);
    $('#Formula7').val(_lot7Details[0]._formula_new);
    $('#TSS7').val(_lot7Details[0]._sampleSize_new);


    // ---------- lot number 8 --------------

    if (_lot7Details[0]._balancePCS_new == 0) {
      _lot8Details = exceed_output;
      // console.table(_lot8Details);
    } else {
      _lot8JSON = calculateLotDetails(_totalpallet1, _nexttotalpallet, _lot7Details[0]._formula_new, limitPCS, totalCTN, totalPcsCtn, _lot7Details[0]._balancePCS_new, formulaTrigger);
      _lot8Details = JSON.parse(_lot8JSON);
      // console.table(_lot8Details);
    }

    $('#TPallet8').val(_lot8Details[0]._totalpallet_new);
    // $('#TCTN8').val(_lot8Details[0]._totalCTN_new);
    $('#TPcs8').val(_lot8Details[0]._totalPCS_new);
    // $('#Balance8').val(_lot8Details[0]._balancePCS_new);
    $('#ATCTN8').val(_lot8Details[0]._actualctn_new);
    $('#Formula8').val(_lot8Details[0]._formula_new);
    $('#TSS8').val(_lot8Details[0]._sampleSize_new);


    // ---------- lot number 9 --------------

    if (_lot8Details[0]._balancePCS_new == 0) {
      _lot9Details = exceed_output;
      // console.table(_lot9Details);
    } else {
      _lot9JSON = calculateLotDetails(_totalpallet1, _nexttotalpallet, _lot8Details[0]._formula_new, limitPCS, totalCTN, totalPcsCtn, _lot8Details[0]._balancePCS_new, formulaTrigger);
      _lot9Details = JSON.parse(_lot9JSON);
      // console.table(_lot9Details);
    }

    $('#TPallet9').val(_lot9Details[0]._totalpallet_new);
    // $('#TCTN9').val(_lot9Details[0]._totalCTN_new);
    $('#TPcs9').val(_lot9Details[0]._totalPCS_new);
    // $('#Balance9').val(_lot9Details[0]._balancePCS_new);
    $('#ATCTN9').val(_lot9Details[0]._actualctn_new);
    $('#Formula9').val(_lot9Details[0]._formula_new);
    $('#TSS9').val(_lot9Details[0]._sampleSize_new);

    // ---------- lot number 10 --------------

    if (_lot9Details[0]._balancePCS_new == 0) {
      _lot10Details = exceed_output;
      // console.table(_lot10Details);
    } else {
      _lot10JSON = calculateLotDetails(_totalpallet1, _nexttotalpallet, _lot9Details[0]._formula_new, limitPCS, totalCTN, totalPcsCtn, _lot9Details[0]._balancePCS_new, formulaTrigger);
      _lot10Details = JSON.parse(_lot10JSON);
      // console.table(_lot10Details);
    }

    $('#TPallet10').val(_lot10Details[0]._totalpallet_new);
    // $('#TCTN10').val(_lot10Details[0]._totalCTN_new);
    $('#TPcs10').val(_lot10Details[0]._totalPCS_new);
    // $('#Balance10').val(_lot10Details[0]._balancePCS_new);
    $('#ATCTN10').val(_lot10Details[0]._actualctn_new);
    $('#Formula10').val(_lot10Details[0]._formula_new);
    $('#TSS10').val(_lot10Details[0]._sampleSize_new);

    console.log('-----------------end-----------------------');

  }

  //------------function calculate for 2nd lot and after------------

  function calculateLotDetails(_totalpalletup, _totalpalletdown, _formula_old, limitPCS, totalCTN_old, totalPcsCtn, _balancePCS_old, formulaTrigger) {

    if (tempExceedPallet - 1 > 0) {
      _totalpallet_new = _totalpalletup;
      tempExceedPallet -= 1;
    } else {
      _totalpallet_new = _totalpalletdown;
    }

    // if (_formula_old == limitPCS) {
    //   _totalpallet_new = Math.floor(_formula_old / totalCTN_old / totalPcsCtn);
    // } else {
    //   _totalpallet_new = Math.ceil(_formula_old / totalCTN_old / totalPcsCtn);
    // }
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
    _ctn_down = Math.floor(_ctnTake_new / _totalpallet_new);
    _ctn_up = Math.ceil(_ctnTake_new / _totalpallet_new);

    _pallet_low = (_ctn_up * _totalpallet_new) - _ctnTake_new;
    _pallet_high = _totalpallet_new - _pallet_low;

    console.log("_ctn_down: " + _ctn_down);
    console.log("_ctn_up: " + _ctn_up);
    console.log("_ctnTake_new: " + _ctnTake_new);
    console.log("_totalpallet_new: " + _totalpallet_new);

    if (_ctnTake_new > 0 && _pallet_low == 0 && _pallet_high == 0) {
      _pallet_low = _totalpallet_new;
    }

    console.log("_pallet_low: " + _pallet_low);
    console.log("_pallet_high: " + _pallet_high);


    _pcsctn_down = Math.floor(_sampleSize_new / (_ctnTake_new * _sampleinner));
    _pcsctn_high = Math.ceil(_sampleSize_new / (_ctnTake_new * _sampleinner));

    _ctnout_low = (_pcsctn_high * _ctnTake_new) - _sampleSize_new;
    _ctnout_high = _ctnTake_new - _ctnout_low;

    if (_pcsctn_down == _pcsctn_high && _totalpallet_new == 1) {
      _ctnout_low = ((_sampleSize_new / 2) / _pcsctn_down);
      _ctnout_high = ((_sampleSize_new / 2) / _pcsctn_high);
    }

    // console.log("_ctn_up_1: "+_ctn_down);
    // console.log("_ctn_up_2: "+_ctn_up);
    // console.log("_ctnTake2: "+_ctnTake_new);
    // console.log("_totalpallet2: "+_totalpallet_new);
    // console.log("pallet1: "+_pallet_low);
    // console.log("pallet2: "+_pallet_high);
    //
    // console.log("_sampleSize2: "+_sampleSize_new);
    // console.log("_pcsctn_high_1: "+_pcsctn_down);
    // console.log("_pcsctn_high_2: "+_pcsctn_high);
    // console.log("_ctnout_high_1: "+_ctnout_low);
    // console.log("_ctnout_high_2: "+_ctnout_high);

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
      _ctn_down: _ctn_down,
      _ctn_up: _ctn_up,
      _pallet_low: _pallet_low,
      _pallet_high: _pallet_high,
      _pcsctn_down: _pcsctn_down,
      _pcsctn_high: _pcsctn_high,
      _ctnout_low: _ctnout_low,
      _ctnout_high: _ctnout_high
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
      '1', Alltotalpallet, _sampleSize1, _totalpallet1, _pallet_lot1_low, _pallet_lot1_high, _pcsctn_lot1_down, _pcsctn_lot1_up, _ctnout_lot1_low, _ctnout_lot1_high, _ctn_lot1_down, _ctn_lot1_up

    );
    palletdetails = palletdetails.concat(temppalletdetails);
    // console.log('lot 1 all: ');
    // console.table(palletdetails);

    //----------------------end loop lot 1 --------------------------
    //--------------------loop for lot 2 -------------------------------------
    if (_balancePCS1 >= 1) {

      temppalletdetails = presetpalletdetailscalculation(
        '2', Alltotalpallet, _lot2Details[0]._sampleSize_new, _lot2Details[0]._totalpallet_new, _lot2Details[0]._pallet_low, _lot2Details[0]._pallet_high, _lot2Details[0]._pcsctn_down, _lot2Details[0]._pcsctn_high, _lot2Details[0]._ctnout_low, _lot2Details[0]._ctnout_high, _lot2Details[0]._ctn_down, _lot2Details[0]._ctn_up
      );
      palletdetails = palletdetails.concat(temppalletdetails);
    }
    // console.log('lot 2 all: ');
    // console.table(palletdetails);

    //----------------------end loop lot 2 --------------------------
    //--------------------loop for lot 3 -------------------------------------
    if (_lot2Details[0]._balancePCS_new >= 1) {
      temppalletdetails = presetpalletdetailscalculation(
        '3', Alltotalpallet, _lot3Details[0]._sampleSize_new, _lot3Details[0]._totalpallet_new, _lot3Details[0]._pallet_low, _lot3Details[0]._pallet_high, _lot3Details[0]._pcsctn_down, _lot3Details[0]._pcsctn_high, _lot3Details[0]._ctnout_low, _lot3Details[0]._ctnout_high, _lot3Details[0]._ctn_down, _lot3Details[0]._ctn_up
      );
      palletdetails = palletdetails.concat(temppalletdetails);
    }

    // console.log('lot 3 all: ');
    // console.table(palletdetails);
    //----------------------end loop lot 3 --------------------------
    //--------------------loop for lot 4 -------------------------------------
    if (_lot3Details[0]._balancePCS_new >= 1) {
      temppalletdetails = presetpalletdetailscalculation(
        '4', Alltotalpallet, _lot4Details[0]._sampleSize_new, _lot4Details[0]._totalpallet_new, _lot4Details[0]._pallet_low, _lot4Details[0]._pallet_high, _lot4Details[0]._pcsctn_down, _lot4Details[0]._pcsctn_high, _lot4Details[0]._ctnout_low, _lot4Details[0]._ctnout_high, _lot4Details[0]._ctn_down, _lot4Details[0]._ctn_up
      );
      palletdetails = palletdetails.concat(temppalletdetails);
    }

    // console.log('lot 4 all: ');
    // console.table(palletdetails);
    //----------------------end loop lot 4 --------------------------
    //--------------------loop for lot 5 -------------------------------------
    if (_lot4Details[0]._balancePCS_new >= 1) {
      temppalletdetails = presetpalletdetailscalculation(
        '5', Alltotalpallet, _lot5Details[0]._sampleSize_new, _lot5Details[0]._totalpallet_new, _lot5Details[0]._pallet_low, _lot5Details[0]._pallet_high, _lot5Details[0]._pcsctn_down, _lot5Details[0]._pcsctn_high, _lot5Details[0]._ctnout_low, _lot5Details[0]._ctnout_high, _lot5Details[0]._ctn_down, _lot5Details[0]._ctn_up
      );
      palletdetails = palletdetails.concat(temppalletdetails);
    }

    // console.log('lot 5 all: ');
    // console.table(palletdetails);
    //----------------------end loop lot 5 --------------------------

    //--------------------loop for lot 6 -------------------------------------
    if (_lot5Details[0]._balancePCS_new >= 1) {
      temppalletdetails = presetpalletdetailscalculation(
        '6', Alltotalpallet, _lot6Details[0]._sampleSize_new, _lot6Details[0]._totalpallet_new, _lot6Details[0]._pallet_low, _lot6Details[0]._pallet_high, _lot6Details[0]._pcsctn_down, _lot6Details[0]._pcsctn_high, _lot6Details[0]._ctnout_low, _lot6Details[0]._ctnout_high, _lot6Details[0]._ctn_down, _lot6Details[0]._ctn_up
      );
      palletdetails = palletdetails.concat(temppalletdetails);
    }

    // console.log('lot 6 all: ');
    // console.table(palletdetails);
    //----------------------end loop lot 6 --------------------------
    //--------------------loop for lot 7 -------------------------------------
    if (_lot6Details[0]._balancePCS_new >= 1) {
      temppalletdetails = presetpalletdetailscalculation(
        '7', Alltotalpallet, _lot7Details[0]._sampleSize_new, _lot7Details[0]._totalpallet_new, _lot7Details[0]._pallet_low, _lot7Details[0]._pallet_high, _lot7Details[0]._pcsctn_down, _lot7Details[0]._pcsctn_high, _lot7Details[0]._ctnout_low, _lot7Details[0]._ctnout_high, _lot7Details[0]._ctn_down, _lot7Details[0]._ctn_up
      );
      palletdetails = palletdetails.concat(temppalletdetails);
    }

    // console.log('lot 7 all: ');
    // console.table(palletdetails);
    //----------------------end loop lot 7 --------------------------
    //--------------------loop for lot 8 -------------------------------------
    if (_lot7Details[0]._balancePCS_new >= 1) {
      temppalletdetails = presetpalletdetailscalculation(
        '8', Alltotalpallet, _lot8Details[0]._sampleSize_new, _lot8Details[0]._totalpallet_new, _lot8Details[0]._pallet_low, _lot8Details[0]._pallet_high, _lot8Details[0]._pcsctn_down, _lot8Details[0]._pcsctn_high, _lot8Details[0]._ctnout_low, _lot8Details[0]._ctnout_high, _lot8Details[0]._ctn_down, _lot8Details[0]._ctn_up
      );
      palletdetails = palletdetails.concat(temppalletdetails);
    }

    // console.log('lot 8 all: ');
    // console.table(palletdetails);
    //----------------------end loop lot 8 --------------------------
    //--------------------loop for lot 9 -------------------------------------
    if (_lot8Details[0]._balancePCS_new >= 1) {
      temppalletdetails = presetpalletdetailscalculation(
        '9', Alltotalpallet, _lot9Details[0]._sampleSize_new, _lot9Details[0]._totalpallet_new, _lot9Details[0]._pallet_low, _lot9Details[0]._pallet_high, _lot9Details[0]._pcsctn_down, _lot9Details[0]._pcsctn_high, _lot9Details[0]._ctnout_low, _lot9Details[0]._ctnout_high, _lot9Details[0]._ctn_down, _lot9Details[0]._ctn_up
      );
      palletdetails = palletdetails.concat(temppalletdetails);
    }

    // console.log('lot 9 all: ');
    // console.table(palletdetails);
    //----------------------end loop lot 9 --------------------------
    //--------------------loop for lot 10 -------------------------------------
    if (_lot9Details[0]._balancePCS_new >= 1) {
      temppalletdetails = presetpalletdetailscalculation(
        '10', Alltotalpallet, _lot10Details[0]._sampleSize_new, _lot10Details[0]._totalpallet_new, _lot10Details[0]._pallet_low, _lot10Details[0]._pallet_high, _lot10Details[0]._pcsctn_down, _lot10Details[0]._pcsctn_high, _lot10Details[0]._ctnout_low, _lot10Details[0]._ctnout_high, _lot10Details[0]._ctn_down, _lot10Details[0]._ctn_up
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
    _flcount, _falltotalpallet, _fsamplesize, _ftotalpallet, _fpallet_low, _fpallet_high,
    _fpcsctn_down, _fpcsctn_up, _fctnout_low, _fctnout_high, _fctn_down, _fctn_up
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
    var tempaccHole_val = 0;
    var tempaccNAG_val = 0;
    var tempaccNFG_val = 0;
    var tempaccMajor_val = 0;
    var tempaccMinor_val = 0;
    var tempaccGG_val = 0;
    var tempaccHole = [];
    var tempaccNFG = [];
    var tempaccNAG = [];
    var tempaccMajor = [];
    var tempaccMinor = [];
    var tempaccGG = [];
    var temptakeCtn1 = 0;
    var temptakeCtn2 = 0;
    var temptotalCtn = 0;
    var temptotalpallet = 0;
    var tempCtnTakeArr1 = [];
    var tempCtnTakeArr2 = [];
    var tempSampleSizeArray = [];
    var detailsSampleSizeArray = [];


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
    accNAG = acceptanceVal(_fsamplesize, _aqlNAG);
    accNFG = acceptanceVal(_fsamplesize, _aqlNFG);
    accMajor = acceptanceVal(_fsamplesize, _aqlMajor);
    accMinor = acceptanceVal(_fsamplesize, _aqlMinor);
    accGG = acceptanceVal(_fsamplesize, _aqlGG);
    temptotalpallet = _ftotalpallet;

    tempaccHole_val = accHole;
    tempaccNAG_val = accNAG;
    tempaccNFG_val = accNFG;
    tempaccMajor_val = accMajor;
    tempaccMinor_val = accMinor;
    tempaccGG_val = accGG;

    //------------- START LOOP CALCULATION Value -----------------------

    var tempCtnOut_low = _fctnout_low;
    var tempCtnOut_high = _fctnout_high;
    // console.log("tempCtnOut_low: " + tempCtnOut_low);

    for (var j = 0; j < _ftotalpallet; j++) {
      tempCtnTakeArr1[j] = 0;
    }

    for (var i = 0; i < _fctnout_low; i++) {
      for (var j = 0; j < _ftotalpallet; j++) {
        if (tempCtnOut_low > 0) {
          tempCtnTakeArr1[j] += 1;
          tempCtnOut_low--;
        }
      }

    }

    for (var j = 0; j < _ftotalpallet; j++) {
      tempCtnTakeArr2[j] = 0;
    }

    for (var i = 0; i < _fctnout_high; i++) {
      for (var j = _ftotalpallet; j > 0; j--) {
        if (tempCtnOut_high > 0) {
          tempCtnTakeArr2[j - 1] += 1;
          tempCtnOut_high--;
        }
      }

    }

    //----------------acceptance ------------------

    for (var j = 0; j < _ftotalpallet; j++) {
      tempaccHole[j] = 0;
    }

    while (tempaccHole_val > 0) {
      for (var j = 0; j < _ftotalpallet; j++) {
        if (tempaccHole_val > 0) {
          tempaccHole[j] += 1;
          tempaccHole_val--;
        }
      }

    }

    for (var j = 0; j < _ftotalpallet; j++) {
      tempaccNAG[j] = 0;
    }

    while (tempaccNAG_val > 0) {
      for (var j = 0; j < _ftotalpallet; j++) {
        if (tempaccNAG_val > 0) {
          tempaccNAG[j] += 1;
          tempaccNAG_val--;
        }
      }

    }

    for (var j = 0; j < _ftotalpallet; j++) {
      tempaccNFG[j] = 0;
    }

    while (tempaccNFG_val > 0) {
      for (var j = 0; j < _ftotalpallet; j++) {
        if (tempaccNFG_val > 0) {
          tempaccNFG[j] += 1;
          tempaccNFG_val--;
        }
      }

    }

    for (var j = 0; j < _ftotalpallet; j++) {
      tempaccMinor[j] = 0;
    }

    while (tempaccMinor_val > 0) {
      for (var j = 0; j < _ftotalpallet; j++) {
        if (tempaccMinor_val > 0) {
          tempaccMinor[j] += 1;
          tempaccMinor_val--;
        }
      }

    }

    for (var j = 0; j < _ftotalpallet; j++) {
      tempaccMajor[j] = 0;
    }

    while (tempaccMajor_val > 0) {
      for (var j = 0; j < _ftotalpallet; j++) {
        if (tempaccMajor_val > 0) {
          tempaccMajor[j] += 1;
          tempaccMajor_val--;
        }
      }

    }

    for (var j = 0; j < _ftotalpallet; j++) {
      tempaccGG[j] = null;
    }

    while (tempaccGG_val > 0) {
      for (var j = 0; j < _ftotalpallet; j++) {
        if (tempaccGG_val > 0) {
          tempaccGG[j] += 1;
          tempaccGG_val--;
        }
      }

    }
    // console.table(tempCtnTakeArr1);
    // console.table(tempCtnTakeArr2);


    for (var i = 0; i < _ftotalpallet; i++) {
      if (tempCtnTakeArr1[i] == 0) {
        tempInnerCtn1 = 0;
      } else {
        tempInnerCtn1 = _sampleinner;
      }

      if (tempCtnTakeArr2[i] == 0) {
        tempInnerCtn2 = 0;
      } else {
        tempInnerCtn2 = _sampleinner;
      }


      tempSampleSizeArray = [{

        CtnPallet: tempCtnTakeArr1[i],
        InnerCtn: tempInnerCtn1,
        PcsInner: _fpcsctn_down,
        CtnPallet2: tempCtnTakeArr2[i],
        InnerCtn2: tempInnerCtn2,
        PcsInner2: _fpcsctn_up,
        SSVisual: (tempCtnTakeArr1[i] * tempInnerCtn1 * _fpcsctn_down) + (tempCtnTakeArr2[i] * tempInnerCtn2 * _fpcsctn_up),
        SSApt: (tempCtnTakeArr1[i] * tempInnerCtn1 * _fpcsctn_down) + (tempCtnTakeArr2[i] * tempInnerCtn2 * _fpcsctn_up)
      }];
      detailsSampleSizeArray = detailsSampleSizeArray.concat(tempSampleSizeArray);
    }
    detailsSampleSizeArray = detailsSampleSizeArray.sort((a, b) => b.SSVisual - a.SSVisual)



    for (var i = 0; i < _ftotalpallet; i++) {
      // console.log("inside here: " + i);

      temp_details = [{
        Itemnumber: 0,
        LotCount: _flcount,
        PalletNumber: palletnum,
        CtnPallet: detailsSampleSizeArray[i].CtnPallet,
        InnerCtn: detailsSampleSizeArray[i].InnerCtn,
        PcsInner: detailsSampleSizeArray[i].PcsInner,
        CtnPallet2: detailsSampleSizeArray[i].CtnPallet2,
        InnerCtn2: detailsSampleSizeArray[i].InnerCtn2,
        PcsInner2: detailsSampleSizeArray[i].PcsInner2,
        SSVisual: detailsSampleSizeArray[i].SSVisual,
        SSApt: detailsSampleSizeArray[i].SSApt,
        AccHoles: tempaccHole[i],
        AccNFG: tempaccNFG[i],
        AccNAG: tempaccNAG[i],
        AccMajor: tempaccMajor[i],
        AccMinor: tempaccMinor[i],
        AccGG: tempaccGG[i]
      }];
      palletnum++;
      palletval++;
      fpallet_details = fpallet_details.concat(temp_details);
    }

    console.log('here');
    console.table(fpallet_details);


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
      CtnPallet2: 0,
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
    // console.log(temp_details);
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
      html += '<td width="250px"><input type="number" oninput="this.value=this.value.slice(0,this.maxLength); this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" maxlength = "5" name="ctnpallet2[]" class="form-control ctnpallet2' + ind + '" placeholder="0" value="' + detail.CtnPallet2 + '" required></td>';
      html += '<td width="250px"><input type="number" oninput="this.value=this.value.slice(0,this.maxLength); this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" maxlength = "5" name="takeCtn2[]" class="form-control InnerCtn2' + ind + '" placeholder="0" value="' + detail.InnerCtn2 + '" required></td>';
      html += '<td width="250px"><input type="number" oninput="this.value=this.value.slice(0,this.maxLength); this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" maxlength = "5" name="pcsinner2[]" class="form-control pcsinner2' + ind + '" placeholder="0" value="' + detail.PcsInner2 + '" required></td>';
      html += '<td width="250px"><input type="number" oninput="this.value=this.value.slice(0,this.maxLength); this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" maxlength = "5" name="visual[]" class="form-control sample' + ind + '"  value="' + detail.SSVisual + '" required></td>';
      html += '<td width="250px"><input type="number" oninput="this.value=this.value.slice(0,this.maxLength); this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" maxlength = "5" name="sample[]" class="form-control sample' + ind + '" value="' + detail.SSApt + '" required></td>';
      html += '<td width="250px"><input type="number" oninput="this.value=this.value.slice(0,this.maxLength); this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" maxlength = "5" name="accFFH[]" class="form-control accFFH' + ind + '"  value="' + detail.AccHoles + '" required></td>';
      html += '<td width="250px"><input type="number" oninput="this.value=this.value.slice(0,this.maxLength); this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" maxlength = "5" name="accNFG[]" class="form-control accNFG' + ind + '"  value="' + detail.AccNFG + '" required></td>';
      html += '<td width="250px"><input type="number" oninput="this.value=this.value.slice(0,this.maxLength); this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" maxlength = "5" name="accNAG[]" class="form-control accNAG' + ind + '"  value="' + detail.AccNAG + '" required></td>';
      html += '<td width="250px"><input type="number" oninput="this.value=this.value.slice(0,this.maxLength); this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" maxlength = "5" name="accMajor[]" class="form-control accMajor' + ind + '"  value="' + detail.AccMajor + '"  required></td>';
      html += '<td width="250px"><input type="number" oninput="this.value=this.value.slice(0,this.maxLength); this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" maxlength = "5" name="accMinor[]" class="form-control accMinor' + ind + '"  value="' + detail.AccMinor + '" required></td>';
      html += '<td width="250px"><input type="number" oninput="this.value=this.value.slice(0,this.maxLength); this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null;" maxlength = "5" name="accGG[]" class="form-control accGG' + ind + '" value="' + detail.AccGG + '" ></td>';
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