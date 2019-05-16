<div class="container" style="margin-top:100px;">
    <div class="row mt-3">
        <div class="col md-6">
            <div class="card">
                <div class="card-header text-center">
                    Form Ubah Jadwal Praktek Dokter
                </div>
                <div class="card-body">
                    <?php
                    foreach ($dokter as $dok) {
                    ?>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $dok['nama_dokter']; ?>" disabled>
                            <small class="form-text text-danger"><?= form_error('nama_dokter') ?>.</small>
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?php echo $dok['username']; ?>" disabled>
                            <small class="form-text text-danger"><?= form_error('username') ?>.</small>
                        </div>
                        <div class="form-group">
                            <label for="nohp">Jadwal Praktek Awal</label>
                            <input type="date" class="form-control" id="jadwal_awal" name="jadwal_awal" value="<?php echo $dok['jadwal_awal']; ?>">
                            <small class="form-text text-danger"><?= form_error('jadwal_awal') ?>.</small>
                        </div>
                        <div class="form-group">
                            <label for="nohp">Jadwal Praktek Akhir</label>
                            <input type="date" class="form-control" id="jadwal_akhir" name="jadwal_akhir" value="<?php echo $dok['jadwal_akhir']; ?>">
                            <small class="form-text text-danger"><?= form_error('jadwal_akhir') ?>.</small>
                        </div>
                        <button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data</button>
                    </form>
                    <?php
                    }
                    ?>
                </div>
            </div>

        </div>
    </div>
</div> 