<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota <?= $book->id_invoice ?></title>
    <link href="<?= base_url() ?>assets/admin/css/invoice.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<?php foreach($intervensi as $dt_invoice){
    $teraphy = $dt_invoice['teraphy'];
} ?>

<body>
    <div id="invoice">
        <div class="invoice overflow-auto">
            <div style="min-width: 100%">
                <header>
                    <div class="row">
                        <img style="width:60px;height:80px;"  src="<?= base_url() ?>assets/auth/images/icon.png">
                        <div class="col-md-10 company-details">
                            <h2 class="text-left name"><?= $nama_usaha ?></h2>
                            <h6 class="text-left name"><?= $alamat ?></h6>
                        </div>
                    </div>
                </header>
                <main>
                    <div class="row contacts">
                        <div class="col invoice-details">
                            <!-- <h1 class="invoice-id"><?= $book->id_invoice ?></h1> -->
                            <div class="date">Tanggal Transaksi: <?= date("d-m-Y", strtotime($book->tanggal_teraphy))  ?></div>
                            <div class="date">Jam Transaksi: <?php date_default_timezone_set('Asia/Jakarta');
                                                                echo date('H:i:s'); ?></div>
                        </div>
                    </div>
                    <table border="0" cellspacing="0" cellpadding="0">
                        <!-- <thead>
                            <tr>
                                <th class="text-left">Nama Pasien</th>
                                <th class="text-left">Umur</th>
                                <th class="text-left">NIK</th>
                                <th class="text-left">Alamat</th>
                                <th class="text-left">Keluhan</th>
                            </tr>
                        </thead> -->
                        <tbody>
                            <?php
                            $no = 0;
                            foreach ($invoice as $dt_invoice) {
                                $no++; ?>
                                <!-- // $harga_satuan = $dt_invoice['sub_total'] / $dt_invoice['jumlah']; -->
                                <tr>
                                    <th class="text-left">Nama Pasien</th>
                                    <td class="text-left"><h3>: <?= $dt_invoice['nama_pasien'] ?></h3></td>
                                </tr>
                                <tr>
                                    <th class="text-left">Umur</th>
                                    <td class="text-left"><h3>: <?= $dt_invoice['umur'] ?></h3></td>
                                </tr>
                                <tr>
                                    <th class="text-left">NIK</th>
                                    <td class="text-left"><h3>: <?= $dt_invoice['nik'] ?></h3></td>
                                </tr>
                                <tr>
                                    <th class="text-left">Alamat</th>
                                    <td class="text-left"><h3>: <?= $dt_invoice['alamat'] ?></h3></td>
                                </tr>
                                <tr>
                                    <th class="text-left">No HP</th>
                                    <td class="text-left"><h3>: <?= $dt_invoice['no_hp'] ?></h3></td>
                                </tr>
                                <tr>
                                    <th class="text-left">Keluhan</th>
                                    <td class="text-left"><h3>: <?= $dt_invoice['keluhan'] ?></h3></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr><td colspan="4"></td></tr>
                            <tr><td colspan="4"></td></tr>
                            <tr>
                                <td class="text-left"><h3>Intervensi</h3></td>
                                <td class="text-left"><h3>Harga</h3></td>
                            </tr>
                            <?php foreach ($intervensi as $dt_intervensi){ ?>
                                <tr class="text-left">
                                    <td class="text-left"><?= $dt_intervensi['teraphy'] ?></td>
                                    <td class="text-left">Rp. <?=number_format($dt_intervensi['harga_teraphy'], 0, ',', '.') ?></td>
                                </tr>
                            <?php } ?>
                            <tr>
                                    <td colspan="1" class="text-left">Total Biaya</td>
                                <?php
                                $TotalHarga = '';
                                if(isset($invoice)){
                                    foreach ($invoice as $dt_invoice) {
                                        $TotalHarga = number_format($dt_invoice['total_harga'], 0, ',', '.');
                                    } ?>
                                    <td class="text-left">Rp. <?= $TotalHarga; ?></td>
                                <?php } ?>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="notices">
                        <div>Terimakasih telah berobat diklinik kami.</div>
                    </div>
                </main>
            </div>
        </div>
    </div>
</body>
<script>
    $(document).ready(() => {
        window.print();

        window.onafterprint = (event) => {
            console.log('After print');
            window.open(`<?= base_url() ?>admin`);
        };
    });
</script>

</html>






<!-- SELECT
	teraphy.harga,
	SUBSTRING_INDEX( SUBSTRING_INDEX( intervensi, ',', numbers.n ), ',', - 1 ) AS terap 
FROM
	invoice
	JOIN teraphy ON invoice.intervensi = teraphy.nama_teraphy
	CROSS JOIN ( SELECT 1 n UNION ALL SELECT 2 UNION ALL SELECT 3 
WHERE
	n <= 1 + LENGTH( intervensi ) - LENGTH(
	REPLACE ( intervensi, ',', '' ));
	
	
SELECT DISTINCT
    teraphy.harga,
    id_invoice,
    SUBSTRING_INDEX(SUBSTRING_INDEX(invoice.intervensi, ',', numbers.n), ',', -1) AS therapy
FROM
    invoice
    JOIN teraphy ON FIND_IN_SET(teraphy.nama_teraphy, invoice.intervensi) > 0
    CROSS JOIN (
        SELECT 1 n UNION ALL 
        SELECT 2 UNION ALL 
        SELECT 3
    ) numbers
WHERE
    n <= 1 + LENGTH(intervensi) - LENGTH(REPLACE(intervensi, ',', ''));
		
		
		
SELECT 
    teraphy.harga,
    invoice.id_invoice,
		invoice.intervensi
--     SUBSTRING_INDEX(SUBSTRING_INDEX(invoice.intervensi, ',', numbers.n), ',', -1) AS terteraphy
FROM 
    invoice
JOIN 
    teraphy ON FIND_IN_SET(teraphy.nama_teraphy, invoice.intervensi) > 0
CROSS JOIN 
    (SELECT 1 AS n UNION ALL SELECT 2 UNION ALL SELECT 3) numbers
WHERE 
    n <= 1 + LENGTH(intervensi) - LENGTH(REPLACE(intervensi, ',', ''))
    AND id_invoice = '37'
GROUP BY 
   teraphy.harga  -->