<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Dashboard</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>admin"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data Pasien</li>
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
                    <h3 class="mb-0">Tabel Pasien</h3>
                </div>
                <div class="col-lg-12">
                    <div class="flash-message">

                        <?= $this->session->flashdata('message_pasien'); ?>
                    </div>
                    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambah_pasien_modal"><i class="fa fa-plus"></i> Tambah Pasien</button>
                    <div class="table-responsive">
                        <table class="table table-flush dataTable" id="datatable-id" role="grid" aria-describedby="datatable-basic_info">
                            <thead class="thead-dark">
                                <tr role="row">
                                    <th>No</th>
                                    <th>Nama Pasien</th>
                                    <th>Umur</th>
                                    <th>NIK</th>
                                    <th>Alamat</th>
                                    <th>No HP</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                if(isset($pasien)){
                                    foreach ($pasien as $dt_pasien) {
                                    ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $dt_pasien['nama_pasien'] ?></td>
                                            <td><?= $dt_pasien['umur'] ?></td>
                                            <td><?= $dt_pasien['nik'] ?></td>
                                            <td><?= $dt_pasien['alamat'] ?></td>
                                            <td><?= $dt_pasien['no_hp'] ?></td>
                                            <td>
                                                <a href="<?php base_url() ?>C_pasien/proses/<?= $dt_pasien['id_pasien'] ?>" class="btn btn-sm btn-success">Proses Pasien</a>
                                                <a href="<?php base_url() ?>C_pasien/edit/<?= $dt_pasien['id_pasien'] ?>" class="btn btn-sm btn-warning"> Edit</a>
                                                <a href="<?php base_url() ?>C_pasien/delete/<?= $dt_pasien['id_pasien'] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus Pasien <?= $dt_pasien['nama_pasien'] ?>?')" class="btn btn-sm btn-danger"> Hapus</a>
                                            </td>
                                        </tr>
                                    <?php
                                        $no++;
                                    }
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
    <div class="modal fade" id="tambah_pasien_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Pasien</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url() ?>C_pasien/tambah" method="POST">
                        <div class="form-group">
                            <label>Nama Pasien</label>
                            <input type="text" class="form-control" placeholder="" name="nama_pasien" required>
                            <label>Umur</label>
                            <input type="text" class="form-control" placeholder="" name="umur" required>
                            <label>NIK</label>
                            <input type="number" class="form-control" placeholder="" name="nik" required|numeric>
                            <label>Alamat</label>
                            <textarea class="form-control" placeholder="" name="alamat" required></textarea>
                            <label>No HP</label>
                            <input type="number" class="form-control" placeholder="" name="no_hp" numeric>
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

    <script>
          $(document).ready(function(){
        let flashmessage = $('.flash-message');
        flashmessage.delay(5000).fadeOut(400);
       });
    </script>