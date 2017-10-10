<?php
session_start();
$link = mysqli_connect($host='localhost',$user='root',$pass='',$db='mahasiswa');
if(isset($_SESSION['username'])){
  header('location: index.php');
}

$error = "";

if(!empty($_POST)){

    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM users WHERE username='$username' and password='$password'";
    $query = mysqli_query($link, $sql);

    if($query){
        $row = mysqli_num_rows($query);
        if($row > 0){
            $_SESSION['isLoggedIn']=1;
            $_SESSION['username']=$username;
            header('Location: index');
        }else{
            $error = "Username dan Password Salah!";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="plugin/css/bootstrap.min.css" rel="stylesheet">
    <link href="plugin/style.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
     <div class="row">
       <div class="col-sm-6 col-md-4 col-md-offset-4">
         <div class="account-wall">
           <img class="profile-img" src="https://storage.googleapis.com/cdn.thenewstack.io/media/2014/09/go-muscat-300x167.png" alt="">
           <h1 class="text-center login-title" >Selamat datang</h1>
             <form class="form-signin" action="" method="post">
               <input type="text" name="username" class="form-control" placeholder="Username" required autofocus><br>
               <input type="password" name="password" class="form-control" placeholder="Password" required>
               <button class="buton btn-block" type="submit" name="login">Sign in</button><br><br>
               <?php if($error != ''){ ?>
                 <div class="alert alert-danger" role="alert" id="error">
                   <?php echo $error; ?>
                 </div>
               <?php } ?>
             </form>
           </div>
       </div>
     </div>
   </div>

    <script src="plugin/js/jquery.min.js"></script>
    <script src="plugin/js/bootstrap.min.js"></script>
  </body>
</html>
