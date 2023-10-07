<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Dashboard</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>admin"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>C_teraphy">Master Teraphy</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit</li>
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
                    <h3 class="mb-0">Edit Teraphy</h3>
                </div>
                <div class="col-lg-12">
                    <?= $this->session->flashdata('message_teraphy'); ?>
                    <form action="<?= base_url() ?>C_teraphy/prosesEdit" method="post" enctype="multipart/form-data">
                        <?php
                        foreach ($teraphy as $dt_teraphy) { ?>
                            <input type="hidden" value="<?= $dt_teraphy['id_teraphy'] ?>" name="id_teraphy">
                            <div class="form-group">
                                <label for="textarea-input" class=" form-control-label">Nama Teraphy</label>
                                <input value="<?= $dt_teraphy['nama_teraphy'] ?>" type="text" required class="form-control" name="nama_teraphy" placeholder="Nama Menu">
                            </div>
                            <div class="form-group">
                                <label for="textarea-input" class="form-control-label">Kode</label>
                                <input type="text" name="kode" class="form-control" value="<?= $dt_teraphy['kode']; ?>" placeholder="kode" required>
                            </div>
                            <div class="form-group">
                                <label for="textarea-input" class=" form-control-label">Detail Menu</label>
                                <textarea rows="9" class="form-control" name="deskripsi" placeholder="Detail Menu" required><?= $dt_teraphy['deskripsi'] ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="textarea-input" class=" form-control-label">Harga</label>
                                <input value="<?= $dt_teraphy['harga'] ?>" type="number" min="0" required class="form-control" name="harga" placeholder="Harga">
                            </div>
                            <div class="text-center mb-3">
                                <a href="<?= base_url() ?>C_teraphy" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
                                <button type="submit" class="btn btn-success btn-sm">Edit Teraphy</button>
                            </div>
                        <?php }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>