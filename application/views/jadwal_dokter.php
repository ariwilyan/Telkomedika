<div class="container">
    <div class="box">
      <h2>Data Jadwal Praktek Dokter</h2>
      <p>Tabel Jadwal Praktek Dokter Telkomedika</p>
      <?php if ($this->session->flashdata('success')) : ?>
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data Jadwal Dokter <strong>berhasil</strong> <?= $this->session->flashdata('success'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                 </div>
             </div>
         </div>
      <?php endif; ?>            
      <a href="#"><button type="button" class="btn btn-primary">TAMBAH JADWAL PRAKTEK</button></a>
      <br><br>
      <table class="table table-bordered" id="table">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Jadwal Awal</th>
            <th>Jadwal Akhir</th>
            <th>Edit</th>
          </tr>
        </thead>
        <tbody>
        <?php if (empty($data)) : ?>
            <div class="alert alert-danger" role="alert">
                Data jadwal tidak ditemukan
            </div>
            <?php endif; ?>

          <?php $no=1; foreach ($data as $dok) : ?>
          <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $dok['nama_dokter']; ?></td>
            <td><?php echo $dok['jadwal_awal']; ?></td>
            <td><?php echo $dok['jadwal_akhir']; ?></td>

            <td><a href="<?php echo base_url('dokter/ubahJadwal');?>"><button type="button" class="btn btn-warning"><i class="fas fa-user-edit"></i></button></a></td>
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