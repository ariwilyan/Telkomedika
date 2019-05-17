<div class="container" style="margin-top:100px;">
    <div class="row mt-3">
        <div class="col md-6">
            <div class="card">
                <div class="card-header text-center">
                    Form Ubah Data Profil Pasien
                </div>
                <div class="card-body">
                    <?php
                    foreach ($pasien as $row) {
                    ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $row["id_pasien"] ?>">
                        <input type="hidden" name="foto_lama" value="<?php echo $row["foto"] ?>">
                        <div class="form-group">
                            <label for="nama">Nama Pasien</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $row["nama_pasien"] ?>" readonly>
                            <small class="form-text text-danger"><?= form_error('nama') ?>.</small>
                        </div>
                        <div class="form-group">
                            <label for="username">Username Pasien</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?php echo $row["username"] ?>" readonly>
                            <small class="form-text text-danger"><?= form_error('username') ?>.</small>
                        </div>
                        <div class="form-group">
                            <label for="email">Email Pasien</label>
                            <input type="text" class="form-control" id="email" name="email" value="<?php echo $row["email"] ?>">
                            <small class="form-text text-danger"><?= form_error('email') ?>.</small>
                        </div>
                        <div class="form-group">
                            <label for="jk">Jenis Kelamin Pasien</label>
                            <input type="text" class="form-control" id="jk" name="jk" value="<?php echo $row["jenis_kelamin"] ?>" readonly>
                            <small class="form-text text-danger"><?= form_error('jk') ?>.</small>
                        </div>
                        <div class="form-group">
                            <label for="birth">Tanggal Lahir Pasien</label>
                            <input type="text" class="form-control" id="birth" name="birth" value="<?php echo $row["birthday"] ?>" readonly>
                            <small class="form-text text-danger"><?= form_error('birth') ?>.</small>
                        </div>
                        <div class="form-group">
                            <label for="notelpon">No Telepon Pasien</label>
                            <input type="text" class="form-control" id="notelpon" name="notelpon" value="<?php echo $row["no_telepon"] ?>">
                            <small class="form-text text-danger"><?= form_error('notelpon') ?>.</small>
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto Profil</label>
                            <input type="file" class="form-control" id="foto" name="foto" value="<?php echo $row["foto"] ?>">
                            <small class="form-text text-danger"><?= form_error('foto') ?>.</small>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat Pasien</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $row["alamat"] ?>">
                            <small class="form-text text-danger"><?= form_error('alamat') ?>.</small>
                        </div>
                        <button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data Profil Pasien</button>
                    </form>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div> 