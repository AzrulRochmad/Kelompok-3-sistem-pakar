<?php
include('koneksi.php');

if(isset($_SESSION['login_user'])){
header("location: about.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sistem Pakar</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="icon" href="img/2.png">
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
      </ul>
      <ul class="nav navbar-nav navbar-right">
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid text-center">
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <p><a href="homeadmin.php"><button type="button" class="btn btn-primary btn-block">BERANDA</button></a></p>
      <p><a href="daftarkerusakan.php"><button type="button" class="btn btn-primary btn-block active">Kerusakan</button></a></p>
      <p><a href="gejala.php"><button type="button" class="btn btn-primary btn-block">CIRI KERUSAKAN</button></a></p>
      <p><a href="basispengetahuan.php"><button type="button" class="btn btn-primary btn-block">BASIS PENGETAHUAN</button></a></p>
      <br><br><br><br><br><br><br><br><br><br>
      <p><a href="logout.php"><button type="button" class="btn btn-primary btn-block" id="myBtn">LOGOUT</button></a></p>
    </div>
    <div class="col-sm-8 text-left">
      <h2 class="text-center">DETAIL KERUSAKAN</h2>
      <div class="form-group"  method="POST">
      			<br><label class="control-label col-sm-2">ID :</label>
      		<div class="col-sm-10">
                <?php
                       $tampil = "SELECT * FROM kerusakan where idkerusakan='".$_GET['id']."'";
                       $sql = mysqli_query ($konek_db,$tampil);
                       while($data = mysqli_fetch_array ($sql))
                    {
                       echo "<input type='text'  class='form-control' id='idkerusakan' readonly value='".$data['idkerusakan']."'><br>";
                    }
                ?>
     		 </div>
        </div>
        <div class="form-group"  method="POST">
      			<br><label class="control-label col-sm-2">NAMA :</label>
      		<div class="col-sm-10">
                <?php
                       $tampil = "SELECT * FROM kerusakan where idkerusakan='".$_GET['id']."'";
                       $sql = mysqli_query ($konek_db,$tampil);
                       while($data = mysqli_fetch_array ($sql))
                    {
                       echo "<input type='text'  class='form-control' id='namakerusakan' readonly value='".$data['namakerusakan']."'><br>";
                    }
                ?>
     		 </div>
        </div>
        <div class="form-group"  method="POST">
      			<br><label class="control-label col-sm-2">JENIS :</label>
      		<div class="col-sm-10">
                <?php
                       $tampil = "SELECT * FROM kerusakan where idkerusakan='".$_GET['id']."'";
                       $sql = mysqli_query ($konek_db,$tampil);
                       while($data = mysqli_fetch_array ($sql))
                    {
                       echo "<input type='text'  class='form-control' id='jenishp' readonly value='".$data['jenishp']."'><br>";
                    }
                ?>
     		 </div>
        </div>
         <div class="form-group"  method="POST">
      			<br><label class="control-label col-sm-2">Ciri Kerusakan:</label>
      		<div class="col-sm-10">
                <?php
                       $tampil = "SELECT * FROM kerusakan p, basispengetahuan b where p.idkerusakan='".$_GET['id']."' and p.namakerusakan=b.namakerusakan";
                       $sql = mysqli_query ($konek_db,$tampil);
                       while($data = mysqli_fetch_array ($sql))
                    {
                       echo "<input type='text'  class='form-control' id='jenishp' readonly value='".$data['gejala']."'><br>";
                    }
                 echo "<input type='text'  class='form-control' id='jenishp' readonly value=''><br>";
                ?>
     		 </div>
        </div>
        <div class="form-group"  method="POST">
      			<br><label class="control-label col-sm-2">Cara mengatasi:</label><br>
      		<div class="col-sm-10">
                <?php
                       $tampil = "SELECT * FROM kerusakan where idkerusakan='".$_GET['id']."'";
                       $sql = mysqli_query ($konek_db,$tampil);
                       while($data = mysqli_fetch_array ($sql))
                    {
                       echo "<textarea  rows='8' class='form-control' id='penanganan'  readonly>".$data['caramengatasi']."</textarea><br>";
                    }
                ?>
     		 </div>

        </div>
    </div>


 <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
         <form role="form" method="post" action="ceklogin.php">
            <div class="form-group" method="post">
              <label for="username"><span class="glyphicon glyphicon-user"></span> Username</label>
              <input type="text" class="form-control" name="username" id="password" placeholder="Enter username">
            </div>
            <div class="form-group" method="post">
              <label for="password"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
              <input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
            </div>
              <button type="submit" id="submit" nama="submit" class="btn btn-primary btn-block" method="post"><span class="glyphicon glyphicon-off"></span> Login</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>


<script>
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
});
</script>
<footer class="container-fluid text-center">
  <p>Kelompok 3</p>
  </footer>
</body>
</html>
