<?php

	session_start();
	require 'database.php';

$resNum = $nomClient = $dateEntree = $dateSortie = $chambreNumero = $client = "";


	if(!empty($_GET['id']))
	{
		$id = checkInput($_GET['id']);
	}	

	if(!empty($_POST))
	{
		$id = checkInput($_POST['id']);
		$db = Database::connect();
		$statement = $db->prepare("DELETE FROM clients WHERE id = ?");
		$statement->execute(array($id));
		Database::disconnect();
		header("Location: index.php");
	}

	function checkInput($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Hotel Ritz Cahors</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale-1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
<header>
	<h1 class="text-logo"><span class=""><img src="images/logo.png"></span> Suppression d'une réservation </h1>
	</header>
		<div class="container admin">
			<div class="row">
				<div class="col-lg-8 col-xs-12 col-centered">
				<form class="form" role="form" action="delete.php" method="post">
					<input type="hidden" name="id" value="<?php echo $id;?>"/>
					<p class="alert alert-warning">Etes vous sur de vouloir supprimer la réservation?</p>
					<div class="form-group">
						<label for="resNum">Reservation #:</label>
						<input type="text" class="form-control" id="resNum" name="resNum" placeholder="Reservation Numero" value="<?php echo $resNum; ?>">
					</div>
					<div class="form-group">
						<label for="nomClient">Client:</label>
						<input type="text" class="form-control" id="resNum" name="nomClient" placeholder="Nom Client" value="<?php echo $nomClient; ?>">
					</div>
					<div class="form-group">
						<label for="chambreNumero">Chambre #:</label>
						<input type="text" class="form-control" id="chambreNumero" name="chambreNumero" placeholder="Chambre #" value="<?php echo $chambreNumero; ?>">
					</div>
					<div class="form-group">
						<label for="dateEntree">Date Entrée:</label>
						<input type="text" class="form-control" id="dateEntree" name="dateEntree" placeholder="Date Entrée" value="<?php echo $dateEntree; ?>">
					</div>
					<div class="form-group">
						<label for="dateSortie">Date Sortie:</label>
						<input type="text" class="form-control" id="dateSortie" name="dateSortie" placeholder="Date Sortie" value="<?php echo $dateSortie; ?>">
					</div>
					<div class="form-actions">
						<a class="btn btn-default" href="index.php">Annuler</a>
						<button type="submit" class="btn btn-warning">Confirmer la suppression</button>
						
					</div>	
				</form>
			</div>
		</div>
	</body>
</html>