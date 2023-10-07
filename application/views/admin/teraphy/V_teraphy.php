<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Dashboard</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>admin"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Master Teraphy</li>
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
                    <h3 class="mb-0">Tabel Teraphy</h3>
                </div>
                <div class="col-lg-12">
                    <?= $this->session->flashdata('message_teraphy'); ?>
                    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambah_teraphy_modal"><i class="fa fa-plus"></i> Tambah Teraphy</button>
                    <div class="table-responsive">
                        <table class="table table-flush dataTable" id="datatable-id" role="grid" aria-describedby="datatable-basic_info">
                            <thead class="thead-dark">
                                <tr role="row">
                                    <th>Nama Teraphy</th>
                                    <th>Kode</th>
                                    <th>Deskripsi</th>
                                    <th>Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($teraphy as $dt_teraphy) {
                                ?>
                                    <tr>
                                        <td><?= $dt_teraphy['nama_teraphy'] ?></td>
                                        <td><?= $dt_teraphy['kode'] ?></td>
                                        <td><?= $dt_teraphy['deskripsi'] ?></td>
                                        <td>Rp. <?= number_format($dt_teraphy['harga'], 0, ',', '.')  ?></td>
                                        <td>
                                            <a href="<?php base_url() ?>C_teraphy/edit/<?= $dt_teraphy['id_teraphy'] ?>" class="btn btn-sm btn-warning"> Edit</a>
                                            <a href="<?php base_url() ?>C_teraphy/delete/<?= $dt_teraphy['id_teraphy'] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus menu <?= $dt_teraphy['nama_teraphy'] ?>? Jika anda menghapus menu ini maka gambar menu ini ikut terhapus.')" class="btn btn-sm btn-danger"> Hapus</a>
                                        </td>
                                    </tr>
                                <?php
                                    $no++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="tambah_teraphy_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Teraphy</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url() ?>C_teraphy/tambah" method="POST">
                        <div class="form-group">
                            <label>Nama Teraphy</label>
                            <input type="text" class="form-control" placeholder="" name="nama_teraphy" required>
                            <label>Deskrpisi</label>
                            <input type="text" class="form-control" placeholder="" name="deskripsi" required>
                            <label>Kode</label>
                            <input type="text" class="form-control" placeholder="" name="kode" required>
                            <label>Harga</label>
                            <input type="number" class="form-control" placeholder="" name="harga" required|numeric>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>