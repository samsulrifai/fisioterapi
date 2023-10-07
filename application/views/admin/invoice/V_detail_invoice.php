<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Dashboard</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>admin"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>C_pasien">Data Pasien</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Proses</li>
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
                    <h3 class="mb-0">Invoice</h3>
                </div>
                <div class="col-lg-12">
                    <div class="flash-message">
                        <?= $this->session->flashdata('message_pasien'); ?>
                    </div>
                    <form action="<?= base_url() ?>C_invoice/prosesEdit" method="post" enctype="multipart/form-data">
                        <?php
                        if(isset($invoice)){
                        foreach ($invoice as $dt_invoice) { ?>
                            <input type="hidden" value="<?= $dt_invoice['id_pasien'] ?>" name="id_pasien" id="id_pasien">
                            <input type="hidden" value="<?= $dt_invoice['id_invoice'] ?>" name="id_invoice" id="id_invoice">
                            <div class="form-group">
                                <label for="textarea-input" class=" form-control-label">Nama pasien</label>
                                <input value="<?= $dt_invoice['nama_pasien'] ?>" type="text" required class="form-control nama_pasien" name="nama_pasien" readonly>
                            </div>
                            <div class="form-group">
                                <label for="textarea-input" class="form-control-label">Umur</label>
                                <input type="text" name="umur" class="form-control umur" value="<?= $dt_invoice['umur']; ?>" placeholder="Umur" readonly>
                            </div>
                            <div class="form-group">
                                <label for="textarea-input" class=" form-control-label">NIK</label>
                                <input value="<?= $dt_invoice['nik'] ?>" type="number" min="0" required class="form-control nik" name="nik" placeholder="NIK" readonly>
                            </div>
                            <div class="form-group">
                                <label for="textarea-input" class=" form-control-label">Alamat</label>
                                <input type="text" value="<?= $dt_invoice['alamat'] ?>" class="form-control alamat" name="alamat" readonly>
                            </div>
                            <div class="form-group">
                                <label for="textarea-input" class=" form-control-label">No HP</label>
                                <input type="text" value="<?= $dt_invoice['no_hp'] ?>" class="form-control no_hp" name="no_hp" readonly>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 form-group">
                                    <label class="form-control-label">Tanggal Teraphy</label>
                                    <input type="date" name="tanggal_teraphy" class="form-control" value="<?= $dt_invoice['tanggal_teraphy'] ?>" required>
                                </div>
                                <div class="col-lg-4 form-group">
                                    <label class="form-control-label">Jam Teraphy</label>
                                    <input type="time" name="jam_teraphy" class="form-control" value="<?= $dt_invoice['jam_teraphy'] ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="textarea-input" class=" form-control-label">Keluhan</label>
                                    <select class="form-control select2" multiple name="keluhan[]" id="list_keluhan" placeholder="Pilih">
                                        <!-- <option value="<?= $dt_invoice['keluhan']; ?>"><?= $dt_invoice['keluhan']; ?></option> -->
                                    </select>
                            </div>
                            <div class="form-group">
                                <label for="textarea-input" class=" form-control-label">Diagnosa FT</label>
                                <input value="<?= $dt_invoice['diagnosa'] ?>" type="text"  class="form-control" name="diagnosa" placeholder="Diagnnosa" required>
                            </div>
                            <div class="form-group">
                                <label for="textarea-input" class=" form-control-label">Intervensi</label>
                                  <select class="form-control select2" multiple name="intervensi[]" id="list_teraphy" placeholder="Pilih">
                                        <!-- <option value="<?= $dt_invoice['intervensi']; ?>"><?= $dt_invoice['intervensi']; ?></option> -->
                                    </select>
                                <!-- <input value="<?= $dt_invoice['intervensi'] ?>" type="text"  class="form-control" id="list_teraphy" name="intervensi" placeholder="Intervensi" required> -->
                            </div>
                            <div class="form-group">
                                <label for="textarea-input" class=" form-control-label">Terapi Ke</label>
                                <input value="<?= $dt_invoice['terapi_ke'] ?>" type="number" class="form-control" name="terapi_ke" placeholder="Terapi Ke" required>
                            </div>
                            <div class="form-group">
                                <label for="textarea-input" class=" form-control-label">Total Harga</label>
                                <input value="<?= $dt_invoice['total_harga'] ?>" type="number" class="form-control" name="total_harga" placeholder="Total Harga" readonly>
                            </div>
                        <?php }
                        }
                        ?>
                        
                         <div class="text-center mb-3">
                                <button type="submit" class="btn btn-success btn-sm">Simpan Invoice</button>
                            </div>
                    </form>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="card">
                            <!-- Card header -->
                            <div class="card-header border-0">
                                <h3 class="mb-0">Riwayat Terapi Pasien</h3>
                            </div>
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table table-flush dataTable" id="datatable-id" role="grid" aria-describedby="datatable-basic_info">
                                    <thead class="thead-dark">
                                        <tr role="row">
                                            <th>No</th>
                                            <th>Nama Pasien</th>
                                            <th>Terapi ke</th>
                                            <th>Umur</th>
                                            <th>NIK</th>
                                            <th>Tanggal Teraphy</th>
                                            <th>No HP</th>
                                            <th>Keluhan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 0;
                                        if(isset($invoice)){
                                            foreach ($invoice as $dt_invoice) {
                                                $no++;
                                            ?>
                                                <tr>
                                                    <td><?= $no; ?></td>
                                                    <td><?= $dt_invoice['nama_pasien'] ?></td>
                                                    <td><?= $dt_invoice['terapi_ke'] ?></td>
                                                    <td><?= $dt_invoice['umur'] ?></td>
                                                    <td><?= $dt_invoice['nik'] ?></td>
                                                    <td><?= $dt_invoice['tanggal_teraphy'] ?></td>
                                                    <td><?= $dt_invoice['no_hp'] ?></td>
                                                    <td><?= $dt_invoice['keluhan'] ?></td>
                                                    <td>
                                                        <a href="<?= base_url() ?>C_invoice/proses/<?= $dt_invoice['id_invoice'] ?>" class="btn btn-sm btn-success">Lihat Detail</a>
                                                    </td>
                                                </tr>
                                            <?php
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
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    $(document).ready(function(){
        GetKeluhan();

    let flashmessage = $('.flash-message');
    flashmessage.delay(5000).fadeOut(400);
    
    });

    function GetKeluhan() {

        let id_invoice = $('#id_invoice').val();

        $.ajax({
        type: 'POST',
            url: `<?= base_url() ?>C_invoice/getDataKeluhan/`,
            dataType: 'json',
            data: {id_invoice},
            success: function(hasil) {
                if(hasil.status == true){
                    let isi = '';
                    $.map(JSON.parse('<?= json_encode($keluhan) ?>'), function (value, key) {
                        let list_opsi_selected = '';
                        console.log(hasil.data[0].keluhan.split(','))

                        $.map(hasil.data[0].keluhan.split(','), function (valSelected, key) {
                            if (value.keluhan == valSelected) {
                                list_opsi_selected = 'selected';
                                return false;
                            }
                        });
                        isi += `<option value="${value.keluhan}" ${list_opsi_selected}>${value.keluhan}</option>`;

                        // console.log(hasil.data[0].keluhan.split(','))
                    });

                    $('#list_keluhan').empty().append(isi);
                }
            },
            error: function () {
                alert("Fail")
            },
        });
        GetTeraphy();
    }

    function GetTeraphy() {

        let id_invoice = $('#id_invoice').val();

        $.ajax({
        type: 'POST',
            url: `<?= base_url() ?>C_invoice/getDataTeraphy/`,
            dataType: 'json',
            data: {id_invoice},
            success: function(hasil) {
                if(hasil.status == true){
                    let isi = '';
                    $.map(JSON.parse('<?= json_encode($teraphy) ?>'), function (value, key) {
                        let list_opsi_selected = '';
                        console.log(hasil.data[0].intervensi.split(','))
                        $.map(hasil.data[0].intervensi.split(','), function (valSelected, key) {
                            if (value.nama_teraphy == valSelected) {
                                list_opsi_selected = 'selected';
                                return false;
                            }
                        });
                        isi += `<option value="${value.nama_teraphy}" ${list_opsi_selected}>${value.nama_teraphy} | ${value.harga}</option>`;

                    });

                    $('#list_teraphy').empty().append(isi);
                }
            },
            error: function () {
                alert("Fail")
            },
        });
    }

</script>