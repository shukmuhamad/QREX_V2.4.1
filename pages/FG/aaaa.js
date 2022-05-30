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