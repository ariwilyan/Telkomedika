<div class="container" style="margin-top:100px;">
    <div class="row mt-3">
        <div class="col">
            <div class="card">
                <div class="card-header text-center">
                    <h2>Form Input Jadwal Periksa</h2>
                </div>
                <div class="card-body">
                    <form action="<?php echo base_url('pasien/tambahJadwalPeriksa');?>" method="post">
                        <div class="form-group">
                            <label for="nama_item">Nama Pasien</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Pasien" value="<?= $this->session->datauser['nama_pasien']; ?>" disabled>
                            <small class="form-text text-danger"><?= form_error('nama') ?>.</small>
                        </div>
                        <div class="form-group">
                            <label for="sub_dokter">Pilih Dokter</label>
                            <select name="dokter" id="dokter" class="form-control">
                                <?php
                                foreach ($data as $dok) {
                                ?>
                                <option value="<?= $dok['id_dokter'] ?>"><?= $dok['nama_dokter'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <small class="form-text text-danger"><?= form_error('dokter') ?>.</small>
                        </div>
                        <div class="form-group">
                            <label for="nama_item">Tanggal Periksa</label>
                            <input type="date" class="form-control" id="tgl" name="tgl" placeholder="">
                            <small class="form-text text-danger"><?= form_error('tgl') ?>.</small>
                        </div>
                        <div class="form-group">
                            <label for="nama_item">Keluhan</label>
                            <textarea name="keluhan_pasien" id="keluhan" class="form-control" placeholder="Masukkan keluhan sakit yang anda rasakan . . ." style="height:150px;"></textarea>
                            <small class="form-text text-danger"><?= form_error('keluhan_pasien') ?>.</small>
                        </div>
                        <button href="<?php echo base_url('pasien/home');?>" type="submit" name="tambah" class="btn btn-primary float-right">Tambah Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>