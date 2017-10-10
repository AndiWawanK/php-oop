<?php ob_start(); ?>

<?php
  require "functions/library.php";
  $error = "";
  if(isset($_GET['id'])){
    $mahasiswa = new Library();
    $edit      = $mahasiswa->edit_data($_GET['id']);
    $update    = $edit->fetch(PDO::FETCH_OBJ);
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD</title>
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
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-12 box2">
          <h1>Edit Data Mahasiswa</h1>
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
                  <a href="index.php"><button type="button" class="btn btn-primary navbar-btn"><i class="fa fa-table"></i> Table data</button></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                  <form class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Search">
                      <button type="submit" class="btn btn-primary cari"><i class="fa fa-search"></i> Cari</button>
                    </div>
                  </form>
                  <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Separated link</a></li>
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
                        <h3 class="panel-title"><i class="fa fa-pencil-square-o"></i> Edit data</h3>
                      </div>
                      <div class="panel-body">
                        <form action="" method="post">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Nim</label>
                            <input type="text" name="nim" class="form-control" id="exampleInputEmail1" placeholder="Nim" value="<?php echo $update->nim ?>">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Nama</label>
                            <input type="text" name="nama" class="form-control" id="exampleInputPassword1" placeholder="nama" value="<?php echo $update->nama ?>">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Prodi</label>
                            <select class="form-control" name="prodi">
                              <option value="Teknik Informatika" <?php echo ($update->prodi == 'Teknik Informatika') ? "selected": "" ?> >Teknik Informatika</option>
                              <option value="Sistem Informasi" <?php echo ($update->prodi == 'Sistem Informasi') ? "selected": "" ?> >Sistem Informasi</option>
                              <option value="Ilmu Komunikasi" <?php echo ($update->prodi == 'Ilmu Komunikasi') ? "selected": "" ?> >Ilmu Komunikasi</option>
                              <option value="Ilmu Komputer" <?php echo ($update->prodi == 'Ilmu Komputer') ? "selected": "" ?> >Ilmu Komputer</option>
                              <option value="Analist Komputer" <?php echo ($update->prodi == 'Analist Komputer') ? "selected": "" ?> >Analist Komputer</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Semester</label>
                            <select class="form-control" name="semester">
                              <option value="1 (satu)" <?php echo ($update->semester == '1 (satu)') ? "selected": "" ?>>1 (satu)</option>
                              <option value="2 (dua)" <?php echo ($update->semester == '2 (dua)') ? "selected": "" ?>>2 (dua)</option>
                              <option value="3 (tiga)" <?php echo ($update->semester == '3 (tiga)') ? "selected": "" ?>>3 (tiga)</option>
                              <option value="4 (empat)" <?php echo ($update->semester == '4 (empat)') ? "selected": "" ?>>4 (empat)</option>
                              <option value="5 (lima)" <?php echo ($update->semester == '5 (lima)') ? "selected": "" ?>>5 (lima)</option>
                              <option value="6 (enam)" <?php echo ($update->semester == '6 (enam)') ? "selected": "" ?>>6 (enam)</option>
                              <option value="7 (tujuh)" <?php echo ($update->semester == '7 (tujuh)') ? "selected": "" ?>>7 (tujuh)</option>
                              <option value="8 (delapan)" <?php echo ($update->semester == '8 (delapan)') ? "selected": "" ?>>8 (delapan)</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Alamat</label>
                            <input type="text" name="alamat" class="form-control" id="exampleInputPassword1" placeholder="alamat" value="<?php echo $update->alamat ?>">
                          </div>
                            <button type="button" name="update" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-arrow-circle-up"></i> Update data</button>

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
                                     <button type="submit" name="update" class="btn btn-primary">Sudah Benar</button>
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
                        <?php
                        if(isset($_POST['update'])){
                          $id       = $_GET['id'];
                          $nim      = $_POST['nim'];
                          $nama     = $_POST['nama'];
                          $prodi    = $_POST['prodi'];
                          $semester = $_POST['semester'];
                          $alamat   = $_POST['alamat'];

                          $up = $mahasiswa->update_data($id,$nim,$nama,$prodi,$semester,$alamat);
                          if($up == 'Success'){
                            header('location: index.php');
                          }else{
                            header('location: index.php');
                          }
                        }
                         ?>
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
