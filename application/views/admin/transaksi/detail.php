<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Dashboard</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>admin"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>penjualan">Riwayat Transaksi</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail Transaksi</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                    <h3 class="mb-0">Detail Transaksi</h3>
                </div>
                <div class="col-lg-12">
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">ID Transaksi</label></div>
                        <div class="col-12 col-md-9"> <label>: <?= $book->id_invoice ?></label></div>
                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Nama Pasien</label></div>
                        <div class="col-12 col-md-9"> <label>: <?= $book->nama_pasien ?></label></div>
                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Umur</label></div>
                        <div class="col-12 col-md-9"> <label>: <?= $book->umur ?></label></div>
                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">NIK</label></div>
                        <div class="col-12 col-md-9"> <label>: <?= $book->nik ?></label></div>
                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Alamat</label></div>
                        <div class="col-12 col-md-9"> <label>: <?= $book->alamat ?></label></div>
                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">No HP</label></div>
                        <div class="col-12 col-md-9"> <label>: <?= $book->no_hp ?></label></div>
                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Tanggal Teraphy</label></div>
                        <div class="col-12 col-md-9"> <label>: <?= date("d-m-Y", strtotime($book->tanggal_teraphy))  ?></label></div>
                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Jam Transaksi</label></div>
                        <div class="col-12 col-md-9"> <label>: <?= $book->jam_teraphy ?></label></div>
                    </div>
                    <div class="col-lg-12">
                        <div class="row form-group">
                            <table border="0" cellspacing="0" cellpadding="0">
                                <tbody>
                                    <tr><td colspan="4"></td></tr>
                                    <tr><td colspan="4"></td></tr>
                                    <tr>
                                        <td class="text-left"><h3>Intervensi</h3></td>
                                        <!-- <td class="text-left"><h3>Harga</h3></td> -->
                                    </tr>
                                    <?php foreach ($intervensi as $dt_intervensi){ ?>
                                        <tr class="text-left">
                                            <td class="text-left"><?= $dt_intervensi['teraphy'] ?></td>
                                            <td class="text-left"> = Rp. <?=number_format($dt_intervensi['harga_teraphy'], 0, ',', '.') ?></td>
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
                                            <td class="text-left"> = Rp. <?= $TotalHarga; ?></td>
                                        <?php } ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>