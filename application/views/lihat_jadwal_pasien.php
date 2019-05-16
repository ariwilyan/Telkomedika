<div class="container">
    <div class="box">
      <h2>Jadwal Dokter Tersedia</h2>
      <p>Tabel Data Dokter Telkomedika</p>
      <br>
      <table class="table table-bordered" id="table">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Dokter</th>
            <th>Jadwal Praktek Awal</th>
            <th>Jadwal Praktek Akhir</th>
          </tr>
        </thead>
        <tbody>
          <?php if (empty($data)) : ?>
            <div class="alert alert-danger" role="alert">
                Data tidak ditemukan
            </div>
            <?php endif; ?>

          <?php $no=1; foreach ($data as $dok) : ?>
          <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $dok['nama_dokter']; ?></td>
            <td><?php echo $dok['jadwal_awal']; ?></td>
            <td><?php echo $dok['jadwal_akhir']; ?></td>
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