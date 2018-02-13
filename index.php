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
    <link href="plugin/datatables/css/dataTables.bootstrap.css" rel="stylesheet">
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
          <table class="table table-bordered" id="mydata">
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
            <tbody id="showData">

            </tbody>
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
    <script src="plugin/jquery/jquery-2.1.4.min.js"></script>
    <script src="plugin/datatables/js/jquery.dataTables.min.js"></script>
    <script src="plugin/datatables/js/dataTables.bootstrap.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){

        tampil_data();
        $('#mydata').dataTable();

        function tampil_data(){
          $.ajax({
            type  : 'ajax',
            url   : 'functions/show.php',
            async : false,
            dataType : 'json',
            success : function(data){
              var mhsw = '';
              var i;
              for(i=0; data.length; i++){
                mhsw += '<tr>'+
                        '<td>'+data[i].id+'</td>'+
                        '<td>'+data[i].nim+'</td>'+
                        '<td>'+data[i].nama+'</td>'+
                        '<td>'+data[i].prodi+'</td>'+
                        '<td>'+data[i].semester+'</td>'+
                        '<td>'+data[i].alamat+'</td>'+
                        '</tr>';
              }
              console.log(url);
              $('#showData').html(mhsw);
            }
          });
        }
      });
    </script>
  </body>
</html>
 <?php ob_flush(); ?>
