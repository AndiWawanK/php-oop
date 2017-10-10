<?php ob_start(); ?>
<?php
  session_start();
  require_once "functions/library.php";
  if (!isset($_SESSION['username'])) {
    header('location: login.php');
  }else{
    $username = $_SESSION['username'];
  }
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD [oop]</title>
    <link href="plugin/css/bootstrap.min.css" rel="stylesheet">
    <link href="plugin/css/font-awesome.min.css" rel="stylesheet">
    <link href="plugin/style.css" rel="stylesheet">
	  <link rel="stylesheet" type="text/css" href="plugin/calendar/demo/css/style.css">
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-12 box2">
          <h1>Data Mahasiswa</h1>
            <nav class="navbar navbar-default">
              <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <a href="insert"><button type="button" class="btn btn-primary navbar-btn"><i class="fa fa-pencil-square-o"></i> Insert data</button></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                  <form action="" method="get" class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                      <input type="text" name="query" class="form-control" placeholder="Please enter nim mahasiswa" disabled>
                      <button type="submit" name="cari" class="btn btn-primary cari" disabled><i class="fa fa-search"></i> Cari</button>
                    </div>
                  </form>

                  <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="#">Menu 1</a></li>
                        <li><a href="#">Menu 2</a></li>
                        <li><a href="#">Menu 3</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out"></i> Log Out</a></li>
                      </ul>
                    </li>
                  </ul>
                </div><!-- /.navbar-collapse -->
              </div><!-- /.container-fluid -->
            </nav>
            <!-- =========- -->
          <table class="table table-bordered">
            <thead class="thead">
              <tr>
                <td>No</td>
                <td>Nim</td>
                <td>Nama</td>
                <td>Prodi</td>
                <td>Semester</td>
                <td>Alamat</td>
                <td>Opsi</td>
              </tr>
            </thead>
              <?php
              require_once "functions/library.php";
              $mahasiswa = new Library();
              $view = $mahasiswa->view_data();
              while($data = $view->fetch(PDO::FETCH_OBJ)){
                echo "
                <tr>
                  <td>$data->id</td>
                  <td>$data->nim</td>
                  <td>$data->nama</td>
                  <td>$data->prodi</td>
                  <td>$data->semester</td>
                  <td>$data->alamat</td>
                  <td class='opsi'>
                    <button id='$data->id' type='button' class='view_data btn btn-success btn-md' data-toggle='modal' data-target='#myModal$data->id'><i class='fa fa-eye'></i> View</button>
                    <div class='modal fade' id='myModal$data->id' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
                        <div class='modal-dialog' role='document'>
                          <div class='modal-content'>
                            <div class='modal-header'>
                              <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                              <h4 class='modal-title' id='myModalLabel'><i class='fa fa-user'></i> Data Mahasiswa</h4>
                            </div>
                            <div class='modal-body detil-mahasiswa' id='data_mahasiswa'>
                              <table class='table table bordered'>
                              <tr>
                                <td>Nim</td>
                                <td>: $data->nim</td>
                              </tr>
                              <tr>
                                <td>Nama</td>
                                <td>: $data->nama</td>
                              </tr>
                              <tr>
                                <td>Prodi</td>
                                <td>: $data->prodi</td>
                              </tr>
                              <tr>
                                <td>Semester</td>
                                <td>: $data->semester</td>
                              </tr>
                              <tr>
                                <td>Alamat</td>
                                <td>: $data->alamat</td>
                              </tr>
                              </table>
                            </div>
                            <div class='modal-footer'>
                              <button type='button' class='btn btn-primary' data-dismiss='modal'>Close</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    <a href='edit.php?id=$data->id' class='btn btn-primary btn-md'><i class='fa fa-pencil'></i> Edit</a>
                    <a href='' type='button' class='btn btn-danger btn-md' data-toggle='modal' data-target='#myModal'><i class='fa fa-trash'></i> Delete</a>
                    <div class='modal fade' id='myModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
                        <div class='modal-dialog' role='document'>
                          <div class='modal-content'>
                            <div class='modal-header'>
                              <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                              <h4 class='modal-title' id='myModalLabel'>Anda yakin ingin mengapus data ini?</h4>
                            </div>
                            <div class='modal-body'>
                              <p>Data yang dihapus akan Hilang!</p>
                            </div>
                            <div class='modal-footer'>
                              <button type='button' class='btn btn-primary' data-dismiss='modal'>Cancel</button>
                              <a href='index.php?delete=$data->id'><button class='btn btn-danger'>Confirm</button></a>
                            </div>
                          </div>
                        </div>
                      </div>
                  </td>
                </tr>
                ";
              }
               ?>

          </table>
          <?php
          if(isset($_GET['delete'])){
            $id   = $_GET['delete'];
            $mahasiswa->delete_data($id);
            header('location: index.php');
          }
           ?>

        <!-- View data mahasiswa -->



        <!-- Search Data Mahasiswa -->


        <!-- ====================== -->
        </div>
      </div>
    </div>


    <script src="plugin/js/jquery.min.js"></script>
    <script src="plugin/js/bootstrap.min.js"></script>
  </body>
</html>
 <?php ob_flush(); ?>
