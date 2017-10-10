<?php
  require_once "functions/library.php";
  $mahasiswa = new Library();
  if($_POST['id']){
    $id   = $_POST['id'];
    $view = $mahasiswa->query("SELECT * FROM data_mahasiswa WHERE id='$id'");
    if($view->num_rows){
      $row_view = $view->fetch_assoc();
      echo "
      <table class='table table-bordered'>
  <tr>
    <th>NAMA LENGKAP</th>
    <td>$data->nim</td>
  </tr>
  <tr>
    <th>KELAS</th>
    <td>$data->nama</td>
  </tr>
  <tr>
    <th>JURUSAN</th>
    <td>$data->prodi</td>
  </tr>
</table>
      ";
    }
  }
 ?>
