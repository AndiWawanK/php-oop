<?php ob_start(); ?>
<?php
  session_start();
  if (!isset($_SESSION['username'])) {
    header('location: login.php');
  }else{
    $username = $_SESSION['username'];
  }
 ?>
<?php
  require "functions/library.php";
  $error = "";
  $mahasiswa = new Library();
  if(isset($_POST['tambah'])){
    $nim        = htmlspecialchars($_POST['nim']);
    $nama       = htmlspecialchars($_POST['nama']);
    $prodi      = htmlspecialchars($_POST['prodi']);
    $semester   = htmlspecialchars($_POST['semester']);
    $alamat     = htmlspecialchars($_POST['alamat']);

    if(!empty(trim($nim)) && !empty(trim($nama)) && !empty(trim($prodi)) && !empty(trim($semester)) && !empty(trim($alamat))){
      $tambah = $mahasiswa->input_data($nim,$nama,$prodi,$semester,$alamat);
      if($tambah == 'Berhasil'){
        header('location: index.php');
      }else{
        header('location:insert.php');
      }
    }else{
      $error = "<strong>Input data terdahulu.</strong> isi data sesuai yang diminta!";
    }
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
    <link rel="shortcut icon" type="image/x-icon" href="../demo/img/pignose-ico.ico">
	  <link rel="stylesheet" type="text/css" href="plugin/calendar/demo/css/semantic.ui.min.css">
	  <link rel="stylesheet" type="text/css" href="plugin/calendar/demo/css/prism.css">
	  <link rel="stylesheet" type="text/css" href="plugin/calendar/demo/css/calendar-style.css">
	  <link rel="stylesheet" type="text/css" href="plugin/calendar/demo/css/style.css">
	  <link rel="stylesheet" type="text/css" href="plugin/calendar/dist/css/pignose.calendar.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="plugin/datatables/css/dataTables.bootstrap.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-12 box2">
          <h1>Tambah Data Mahasiswa</h1>
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
                  <a href="index"><button type="button" class="btn btn-primary navbar-btn"><i class="fa fa-table"></i> Table data</button></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

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
            <div class="container">
              <div class="row">
                <div class="col-md-8">
                    <div class="panel panel-primary">
                      <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-pencil-square-o"></i> Insert data</h3>
                      </div>
                      <div class="panel-body">
                        <form action="" method="post">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Nim</label>
                            <input type="text" name="nim" class="form-control" id="exampleInputEmail1" placeholder="Nim">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Nama</label>
                            <input type="text" name="nama" class="form-control" id="exampleInputPassword1" placeholder="nama">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Prodi</label>
                            <select class="form-control" name="prodi">
                              <option>Teknik Informatika</option>
                              <option>Sistem Informasi</option>
                              <option>Ilmu Komunikasi</option>
                              <option>Ilmu Komputer</option>
                              <option>Analist Komputer</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Semester</label>
                            <select class="form-control" name="semester">
                              <option>1 (satu)</option>
                              <option>2 (dua)</option>
                              <option>3 (tiga)</option>
                              <option>4 (empat)</option>
                              <option>5 (lima)</option>
                              <option>6 (enam)</option>
                              <option>7 (tujuh)</option>
                              <option>8 (delapan)</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Alamat</label>
                            <input type="text" name="alamat" class="form-control" id="exampleInputPassword1" placeholder="alamat">
                          </div>
                            <button type="button" name="tambah" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Tambah</button>

                            <div id='myModal' class='modal fade'>
                             <div class='modal-dialog modal-confirm'>
                               <div class='modal-content'>
                                 <div class='modal-header'>
                                   <div class='icon-box'>
                                     <i class='material-icons'>account_circle</i>
                                   </div>
                                   <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                 </div>
                                 <div class='modal-body text-center'>
                                   <h4>Info!</h4>
                                   <p>Apakah data yang anda masukkan sudah benar?.</p>
                                     <button type="button" class="btn btn-primary" data-dismiss='modal' aria-hidden='true'>Cancle</button>
                                     <button type="submit" name="tambah" class="btn btn-primary">Sudah Benar</button>
                                 </div>
                               </div>
                             </div>
                            </div>
                            <br><br>
                            <?php if($error != ''){ ?>
                              <div class="alert alert-danger alert-dismissible fade in" role="alert" id="error">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <?php echo $error; ?>
                              </div>
                            <?php } ?>
                        </form>

                    </div>
                  </div>
              </div>
              <div class="col-md-4">
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-calendar"></i> Calendar</h3>
                  </div>
                  <div class="panel-body">
                    <!-- Calndar -->
                    <div class="calendar"></div>
			                 <div class="box"></div>
                  </div>
                </div>
              </div> <!-- col-md-4-->
          </div>
        </div>
      </div>
    </div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="plugin/js/jquery.min.js"></script>
    <script src="plugin/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="plugin/calendar/demo/js/jquery.latest.min.js"></script>
	  <script type="text/javascript" src="plugin/calendar/demo/js/moment.latest.min.js"></script>
	  <script type="text/javascript" src="plugin/calendar/demo/js/semantic.ui.min.js"></script>
	  <script type="text/javascript" src="plugin/calendar/demo/js/prism.min.js"></script>
	  <script type="text/javascript" src="plugin/calendar/dist/js/pignose.calendar.js"></script>
    
    <script type="text/javascript">



	//<![CDATA[
	$(function() {
		$('#wrapper .version strong').text('v' + $.fn.pignoseCalendar.ComponentVersion);
		function onClickHandler(date, obj) {
			var $calendar = obj.calendar;
			var $box = $calendar.parent().siblings('.box').show();
			var text = 'You choose date ';

			if(date[0] !== null) {
				text += date[0].format('YYYY-MM-DD');
			}

			if(date[0] !== null && date[1] !== null) {
				text += ' ~ ';
			} else if(date[0] === null && date[1] == null) {
				text += 'nothing';
			}

			if(date[1] !== null) {
				text += date[1].format('YYYY-MM-DD');
			}

			$box.text(text);
		}

		// Default Calendar
		$('.calendar').pignoseCalendar({
			select: onClickHandler
		});

		$('.menu .item').tab();
	});

	</script>
  </body>
</html>
<?php ob_flush(); ?>
