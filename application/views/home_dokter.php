<?php
    $data_user = $this->session->userdata("datauser");
    $nama = $data_user["nama_dokter"];
?>
  <div class="container" style="margin-top: 50px">
    <br><br><br>
    <center><h1><b>Sistem Informasi Rumah Sakit</b></h1></center>
    <center><h2><b>Telkomedika</b></h2></center>
    <center><img class="center-block" src="<?php echo base_url('assets/gambar/telkom.png') ?>" width="450px"></center>
  </div>
</body>
</html>