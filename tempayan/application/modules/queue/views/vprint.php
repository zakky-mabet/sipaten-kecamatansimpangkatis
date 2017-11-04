
<html moznomarginboxes mozdisallowselectionprint>
    <head>
        <title>
            <?php echo $title ?>
        </title>
        <style type="text/css">
            html {
                font-family: "Verdana";
            }
            .content {
                width: 40mm;
                font-size: 10px;
            }
            .content .title {
                text-align: center;
            }
            .content .head-desc {
                margin-top: 0px;
                display: table;
                width: 100%;
            }
            .content .head-desc > div {
                display: table-cell;
            }
            .content .head-desc .user {
                text-align: right;
            }
            .content .nota {
                text-align: center;
                margin-top: 5px;
                margin-bottom: 5px;
            }
            .content .separate {
                margin-top: 0px;
                margin-bottom: 10px;
                border-top: 1px dashed #000;
            }
            .content .transaction-table {
                width: 100%;
                font-size: 12px;
            }
            .content .transaction-table .name {
                width: 185px;
            }
            .content .transaction-table .qty {
                text-align: center;
            }
            .content .transaction-table .sell-price, .content .transaction-table .final-price {
                text-align: right;
                width: 65px;
            }
            .content .transaction-table tr td {
                vertical-align: top;
                font-size: 9px;
            }
            .content .transaction-table .price-tr td {
                padding-top: 0px;
                padding-bottom: 0px;
            }
            .content .transaction-table .discount-tr td {
                padding-top: 0px;
                padding-bottom: 0px;
            }
            .content .transaction-table .separate-line {
                height: 1px;
                border-top: 1px dashed #000;
            }
            .content .thanks {
                margin-top: 10px;
                text-align: center;
            }
            .content .azost {
                margin-top:5px;
                text-align: center;
                font-size:10px;
            }
            @media print {
                @page  { 
                    width: 80mm;
                    margin: 0mm;
                }
            }

            .nomor {
                font-size: 7em;
                text-align: center;
                font-weight: 600;
            }

        </style>
    </head>
    <body onload="window.print()">
        <div class="content">
            <div class="title">
                Nomor Antrian Pelayanan <br> Kecamatan Simpang Katis        
            </div>
            <div class="head-desc">
                <div class="nomor"><?php echo $print->nomor ?></div>
            </div>
            <div class="separate"></div>
            <div class="transaction">
              Tanggal : <?php echo $print->date.' '.substr($print->time,0,5); ?>
            </div>
            <div class="thanks">
                Mohon Menunggu Panggilan, 
                Pastikan Anda dilayani dengan baik oleh petugas kami. Terima Kasih !
            </div>
            <div class="azost">
       
            </div>
        </div>
    </body>
</html>


