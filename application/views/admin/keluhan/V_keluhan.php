<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Dashboard</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>admin"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data Keluhan</li>
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
                    <h3 class="mb-0">Tabel Keluhan</h3>
                </div>
                <div class="col-lg-12">
                    <div class="flash-message">
                        <?= $this->session->flashdata('message_keluhan'); ?>
                    </div>
                    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambah_keluhan_modal"><i class="fa fa-plus"></i> Tambah keluhan</button>
                    <div class="table-responsive">
                        <table class="table table-flush dataTable" id="datatable-id" role="grid" aria-describedby="datatable-basic_info">
                            <thead class="thead-dark">
                                <tr role="row">
                                    <th>No</th>
                                    <th>Nama keluhan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($keluhan as $dt_keluhan) {
                                ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= $dt_keluhan['keluhan'] ?></td>
                                        <td>
                                            <a href="<?php base_url() ?>C_keluhan/edit/<?= $dt_keluhan['id_keluhan'] ?>" class="btn btn-sm btn-warning"> Edit</a>
                                            <a href="<?php base_url() ?>C_keluhan/delete/<?= $dt_keluhan['id_keluhan'] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus menu <?= $dt_keluhan['keluhan'] ?>? Jika anda menghapus menu ini maka gambar menu ini ikut terhapus.')" class="btn btn-sm btn-danger"> Hapus</a>
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
    <div class="modal fade" id="tambah_keluhan_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Keluhan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url() ?>C_keluhan/tambah" method="POST">
                        <div class="form-group">
                            <label>Nama keluhan</label>
                            <input type="text" class="form-control" placeholder="" name="keluhan" required>
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