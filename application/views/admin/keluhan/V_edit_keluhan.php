<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Dashboard</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>admin"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>C_keluhan">Data Keluhan</a></li>
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
                    <h3 class="mb-0">Edit keluhan</h3>
                </div>
                <div class="col-lg-12">
                    <div class="flash-message">
                        <?= $this->session->flashdata('message_keluhan'); ?>
                    </div>
                    <form action="<?= base_url() ?>C_keluhan/prosesEdit" method="post" enctype="multipart/form-data">
                        <?php
                        foreach ($keluhan as $dt_keluhan) { ?>
                            <input type="hidden" value="<?= $dt_keluhan['id_keluhan'] ?>" name="id_keluhan">
                            <div class="form-group">
                                <label for="textarea-input" class=" form-control-label">Nama keluhan</label>
                                <input value="<?= $dt_keluhan['keluhan'] ?>" type="text" required class="form-control" name="keluhan" placeholder="Nama Menu">
                            </div>
                            <div class="text-center mb-3">
                                <a href="<?= base_url() ?>C_keluhan" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
                                <button type="submit" class="btn btn-success btn-sm">Edit Data</button>
                            </div>
                        <?php }
                        ?>
                    </form>
                </div>
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