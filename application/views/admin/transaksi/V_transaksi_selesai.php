<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Dashboard</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>admin"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Laporan transaksi</li>
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
                    <h3 class="mb-0">Laporan transaksi</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <form action="<?= base_url() ?>C_transaksi_selesai/filterLaporantransaksi" method="POST">
                                <label class=" form-control-label">Tanggal Awal</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="Start date" name="startDate" type="date" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class=" form-control-label">Tanggal Akhir</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="End date" name="endDate" type="date" required>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <button type="submit" name="submit" class="btn btn-success btn-sm"><i class="fa fa-search"></i> Filter</button>
                            </form>
                            <?php
                            if (!empty($startDate)) {
                            ?>
                                <form action="<?= base_url() ?>transaksi/filterCetaktransaksi" method="POST" target="_blank" style="display: inline-block;">
                                    <input type="hidden" name="startDate" value="<?= $startDate ?>">
                                    <input type="hidden" name="endDate" value="<?= $endDate ?>">
                                    <button class="btn btn-primary btn-sm"><i class="fa fa-print"></i> Cetak Filter Data</button>
                                </form>
                            <?php
                            } else {
                            ?>

                                <!-- <a href="<?= base_url() ?>transaksi/cetakLaporantransaksi" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-print"></i> Cetak Semua Data</a> -->
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-flush dataTable" id="datatable-id" role="grid" aria-describedby="datatable-basic_info">
                            <thead class="thead-dark">
                                <tr role="row">
                                    <th>No</th>
                                    <th>Nama Pasien</th>
                                    <th>Umur</th>
                                    <th>NIK</th>
                                    <th>Tanggal Transaksi</th>
                                    <th>Intervensi</th>
                                    <th>Total Bayar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 0;
                                if(isset($booking)){
                                foreach ($booking as $dt_booking) {
                                    $no++;
                                ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= $dt_booking['nama_pasien'] ?></td>
                                        <td><?= $dt_booking['umur'] ?></td>
                                        <td><?= $dt_booking['nik'] ?></td>
                                        <td><?= date("d-m-Y", strtotime($dt_booking['tanggal_teraphy'])) ?></td>
                                        <td><?= $dt_booking['intervensi'] ?></td>
                                        <td>Rp. <?= number_format($dt_booking['total_harga'], 0, ',', '.')  ?></td>
                                        <td>
                                            <a href="<?php base_url() ?>C_transaksi_selesai/detail/<?= $dt_booking['id_invoice'] ?>" class="btn btn-sm btn-warning"></i>Detail</a>
                                            <a href="<?php base_url() ?>C_transaksi_selesai/cetakNotatransaksi/<?= $dt_booking['id_invoice'] ?>" target="_blank" class="btn btn-sm btn-danger"><i class="fa fa-print"></i> Cetak Nota</a>
                                        </td>
                                    </tr>
                                <?php
                                } } 
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>