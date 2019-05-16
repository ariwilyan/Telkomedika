<div class="container" style="margin-top:100px;">
    <div class="row mt-3">
        <div class="col">
            <div class="card">
                <div class="card-header text-center">
                    Form Tambah Data Obat
                </div>
                <div class="card-body">
                    <form action="<?php echo base_url('apoteker/tambahObat')?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nama">Nama Obat</label>
                            <input type="text" class="form-control" id="nama" name="nama">
                            <small class="form-text text-danger"><?= form_error('nama') ?>.</small>
                        </div>
                        <div class="form-group">
                            <label for="jenis">Jenis Obat</label>
                            <input type="text" class="form-control" id="jenis" name="jenis">
                            <small class="form-text text-danger"><?= form_error('jenis') ?>.</small>
                        </div>
                        <div class="form-group">
                            <label for="foto">Gambar Obat</label>
                            <input type="file" class="form-control" id="foto" name="foto">
                            <small class="form-text text-danger"><?= form_error('foto') ?>.</small>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga Obat</label>
                            <input type="text" class="form-control" id="harga" name="harga">
                            <small class="form-text text-danger"><?= form_error('harga') ?>.</small>
                        </div>
                        <div class="form-group">
                            <label for="stok">Stok Obat</label>
                            <input type="text" class="form-control" id="stok" name="stok">
                            <small class="form-text text-danger"><?= form_error('stok') ?>.</small>
                        </div>
                        <button href="<?php base_url(); ?>apoteker/cekDaftarObat" type="submit" name="tambah" class="btn btn-primary float-right">Tambah Data Obat</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>