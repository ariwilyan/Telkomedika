<div class="container" style="margin-top:100px;">
    <div class="row mt-3">
        <div class="col md-6">
            <div class="card">
                <div class="card-header text-center">
                    Form Ubah Data Obat
                </div>
                <div class="card-body">
                    <?php
                    foreach ($item as $row) {
                    ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $row["id_obat"] ?>">
                        <input type="hidden" name="foto_lama" value="<?php echo $row["gambar_obat"] ?>">
                        <div class="form-group">
                            <label for="nama">Nama Obat</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $row["nama_obat"] ?>">
                            <small class="form-text text-danger"><?= form_error('nama') ?>.</small>
                        </div>
                        <div class="form-group">
                            <label for="jenis">Jenis Obat</label>
                            <input type="text" class="form-control" id="jenis" name="jenis" value="<?php echo $row["jenis_obat"] ?>">
                            <small class="form-text text-danger"><?= form_error('jenis') ?>.</small>
                        </div>
                        <div class="form-group">
                            <label for="foto">Gambar Obat</label>
                            <input type="file" class="form-control" id="foto" name="foto" value="<?php echo $row["gambar_obat"] ?>">
                            <small class="form-text text-danger"><?= form_error('foto') ?>.</small>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga Obat</label>
                            <input type="text" class="form-control" id="harga" name="harga" value="<?php echo $row["harga_obat"] ?>">
                            <small class="form-text text-danger"><?= form_error('harga') ?>.</small>
                        </div>
                        <div class="form-group">
                            <label for="stok">Stok Obat</label>
                            <input type="text" class="form-control" id="stok" name="stok" value="<?php echo $row["stok_obat"] ?>">
                            <small class="form-text text-danger"><?= form_error('stok') ?>.</small>
                        </div>
                        <button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data Obat</button>
                    </form>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div> 