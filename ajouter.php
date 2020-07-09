﻿<?php 

if(!session_id()){ session_start();}

if (!isset($_SESSION['username'])){
	header("Location: index.php");
		
	}



?>
<?php 
include'traiter.php';
$sql="select * from user ";
$result= mysqli_query($connect,$sql);

$ligne= mysqli_fetch_row($result);
$nom=$ligne[1];
 

?>
<?php 

if(isset($_POST['ajouter']))
{
	$nom=$_POST['nom'];
	$adrss=$_POST['adresse'];
	$user=$_POST['user'];
	$pwd=$_POST['password'];
 

$pyscript = 'scripts_py/Script_add_server.py';
$python = 'C:\Users\ANAS\AppData\Local\Programs\Python\Python38-32\python.exe';
$cmd='$python $pyscript $nom $adrss $user $pwd';
exec("$cmd", $output);

$pyscript1 ='scripts_py/Script_storage.py';
$cmd1='$python $pyscript1';
exec("$cmd1", $output);

$pyscript2 ='scripts_py/Script_ram.py';
$cmd2='$python $pyscript2';
exec("$cmd2", $output);

header("Location: serveurs.php");
}
?> 
<!DOCTYPE html>
<html>
<head>
	<title>Ajouter serveur</title>
	<link rel="stylesheet" type="text/css" href="css/style1.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
</head>
<body style="background-color: #e5e5e5;">

	<nav class="sidebar">
		<div class="sidebar-head"><div class="row">
				<div class="col-md-4 mx-auto">
				<img src="images/logo.jpeg" class="w-100">
				</div>
				
			</div></div>
		<div class="sidebar-body">
			<ul>
				<li><a href="accueil.php"><i class="fa fa-home"></i>Accueil</a></li>
				<li><a href="serveurs.php" class="active"><i class="fa fa-server"></i>Serveurs</a></li>
			</ul>

		</div>
	</nav>

	

	<div class="page-container">
		<nav class="navbar navbar-expand-sm fixed-top">
			<div class="navbrand">
				<a href="user_name.php" class="btn">
					<i class="fa fa-user" style="font-size: 25px;"></i>
					<span style="font-size: 18px;"><?php echo $nom?></span>
				</a>
			</div>
			<div class="nav-item ml-auto">
				<div class="profil">
					<div class="item mr-4">
						<a href="logout.php" class="btn" style="color:#f52a0f;font-size: 16px;">
							<i class="fa fa-sign-out"></i> déconnecter
						</a>
					</div>
				</div>
			</div>
		</nav>

		<div class="contenu">
			<div class="container">
				<div class="row mb-3 mt-4">
        			<div class="col-md-6"><h4>Ajouter serveur</h4></div>
        			<div class="col-md-6 text-right">
        				<a href="javascript:history.back()" class="btn btn-danger"role="button">
        					<i class="fa fa-chevron-circle-left"></i><b> Retour</b>
						</a>
        			</div>
    			</div>
    			<hr width="100%">
    			<div class="container">
    				<div class="row mt-4">
    					<div class="col-md-6 mx-auto bg-white shadow rounded">
    						<div class="container mt-4 mb-4">
    							<form method="POST" action="ajouter.php">
    								<div class="form-row">
    									<div class="form-group w-100">
    										<input class="form-control" type="text" name="nom" placeholder="Nom du serveur" required>
    									</div>
    								</div>
    								<div class="form-row">
    									<div class="form-group w-100">
    										<input class="form-control" type="text" name="adresse" placeholder="Adresse IP" required>
    									</div>
    								</div>
    								<div class="form-row">
    									<div class="form-group w-100">
    										<input class="form-control" type="text" name="user" placeholder="USER" required>
    									</div>
    								</div>
    								<div class="form-row">
    									<div class="form-group w-100">
    										<input class="form-control" type="password" name="password" placeholder="Password" required>
    									</div>
    								</div>
    								<div class="form-row mt-4">
    									<div class="form-group col-md-6 text-right">
    										<button class="btn btn-primary" type="submit" name="ajouter">
    											<i class="fa fa-check"></i> Ajouter
    										</button>
    									</div>
    									<div class="form-group col-md-6 text-left">
    										<button class="btn btn-dark" type="reset" name="ajouter">
    											<i class="fa fa-refresh"></i> Annuler
    										</button>
    									</div>
    								</div>

    							</form>
    						</div>
    					</div>
    				</div>
    			</div>
			</div>
			
				


		</div>
	</div>



	<script src="js/jquery-3.5.0.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap.js"></script>

</body>
</html>