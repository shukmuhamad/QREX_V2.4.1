<?php


include('../includes/session.php');
require('../../vendor/phpqrcode-based64/phpqrcode.php');
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.3.0/paper.css">
<style>
    

    td.td2 span {
        display: block;
        white-space: nowrap;
        overflow: hidden;
        background-color: white;
        font-size: 11px;
    }
    td.td1 span {
        display: block;
        white-space: nowrap;
        overflow: hidden;
        background-color: white;
        font-size: 11px;
        text-align: center;
    }
    .inside-24 {
        border-collapse: collapse;
    }
    table.inside-24 tbody tr td {
        border: 1px solid black;
        background-color: white;
        margin: 0;
    }
    table.table-24 tbody tr {
        padding-top: 1px;
    }
    .td-pad {
        padding-top: 5px;
    }
    .size-24mm {
        width: 20mm;
        height: 30mm;
    }
    .s2 {
        max-width: 20mm;
        height: 1mm;
        padding: 0;
        margin: 0;
    }
    .qrimage {
        width: 24mm;
        height: 20mm;
    }
    .tdmid {
        text-align: center;
        width: 20mm;
    }
</style>

<body>
    <section class="sheet padding-5mm">


        <?php
        $cell_data = '<td class="td-pad">
                        <div class="size-24mm">
                            <table class="inside-24">
                                <tbody>
                                    <tr>
                                        <td class="s2 td2"><span>' . $_SESSION['BrandName'] . '</span></td>
                                    </tr>
                                    <tr>
                                        <td class="tdmid"><img src="' . $_SESSION['QRimg'] . '" class="qrimage"></td>
                                    </tr>
                                    <tr>
                                        <td class="s2 td1"><span>' . $_SESSION['SONumber'] . '</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </td>';

        ?>
        <div style="width:45%;padding-left: 5px;">
            <table class="table-24">
                <tbody>
                    <?php
                    for ($j = 0; $j < 1; $j++) { ?>
                        <tr>
                            <?php
                            for ($i = 0; $i < 1; $i++) {
                                echo $cell_data;
                            }
                            ?>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>



            </table>


        </div>

    </section>

    <script type="text/javascript">
        function codeAddress() {
            window.print();
        }

        window.onload = codeAddress();
    </script>
</body>