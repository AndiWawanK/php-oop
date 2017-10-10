<?php
class Library{
  public function __construct(){
    $this->db = new PDO('mysql:host=localhost;dbname=mahasiswa;','root','');
  }
  public function input_data($nim,$nama,$prodi,$semester,$alamat){
    $sql   = "INSERT INTO data_mahasiswa (nim,nama,prodi,semester,alamat) VALUES ('$nim','$nama','$prodi','$semester','$alamat')";
    $query = $this->db->query($sql);
    if(!$query){
      return "Failed";
    }else{
      return "Berhasil";
    }
  }
  public function view_data(){
    $sql   = "SELECT * FROM data_mahasiswa ";
    $query = $this->db->query($sql);
    return $query;
  }
  public function view_data_id($id){
    $sql   = "SELECT * FROM data_mahasiswa WHERE id = '$id' ";
    $query = $this->db->query($sql);
    return $query;
  }
  public function edit_data($id){
    $sql   = "SELECT * FROM data_mahasiswa WHERE id = '$id' ";
    $query = $this->db->query($sql);
    return $query;
  }
  public function update_data($id,$nim,$nama,$prodi,$semester,$alamat){
    $sql   = "UPDATE data_mahasiswa SET nim = '$nim',nama = '$nama',prodi = '$prodi',semester = '$semester',alamat = '$alamat' WHERE id = '$id'";
    $query = $this->db->query($sql);
    if(!$query){
      return 'Failed';
    }else{
      return 'Success';
    }
  }
  public function delete_data($id){
    $sql   = "DELETE FROM data_mahasiswa WHERE id='$id'";
    $query = $this->db->query($sql);
  }
}
