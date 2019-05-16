<div class="container">
    <div class="box">
      <h2>Daftar Obat Tersedia</h2>
      <p>Tabel Data Obat Telkomedika</p>
      <a class="btn btn-primary" href="<?= base_url()?>apoteker/tambahObat">TAMBAH OBAT</a>

      <?php if ($this->session->flashdata('berhasil')) { ?>
      <div class="row mt-3">
        <div class="col-md-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Obat <strong>berhasil</strong> <?= $this->session->flashdata('berhasil'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
      </div>
      <?php } else if($this->session->flashdata('hapus')) { ?>
      <div class="row mt-3">
        <div class="col-md-6">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Data Obat <strong>berhasil</strong> <?= $this->session->flashdata('hapus'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
      </div>
      <?php } ?>

      <br><br>
      <table class="table table-bordered" id="table">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Obat</th>
            <th>Jenis Obat</th>
            <th>Gambar Obat</th>
            <th>Harga Obat</th>
            <th>Stok Obat</th>
            <th>Edit</th>
            <th>Hapus</th>
          </tr>
        </thead>
        <tbody>
          <?php if (empty($data)) : ?>
            <div class="alert alert-danger" role="alert">
                Data obat tidak ditemukan
            </div>
            <?php endif; ?>

          <?php $no=1; foreach ($data as $obt) : ?>
          <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $obt['nama_obat']; ?></td>
            <td><?php echo $obt['jenis_obat']; ?></td>
            <td><center><img src="<?= base_url();?>assets/gambar/<?= $obt['gambar_obat'] ?>" width="100px"></center></td>
            <td><?php echo $obt['harga_obat']; ?></td>
            <td><?php echo $obt['stok_obat']; ?></td>

            <td><a class="btn btn-warning" href="<?= base_url()?>apoteker/ubahObat/<?= $obt['id_obat'] ?>"><i class="fas fa-user-edit"></i></a></td>
            <td><a class="btn btn-danger"  href="<?= base_url()?>apoteker/hapusObat/<?= $obt['id_obat'] ?>?foto=<?= $obt['gambar_obat'] ?>" onClick="return confirm('Apakah Anda Yakin?')" ><i class="fas fa-user-times"></i></a></td>
          </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
</div>

</body>
  <script type="text/javascript">
    $(document).ready( function () {
        $('#table').DataTable();
    });
  </script>
</html>