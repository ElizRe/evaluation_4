<?php

	session_start();
	require 'database.php';
	$clientError = $chambreError = $dateEntreeError = $dateSortieError = $statutError = $client = $chambre = $dateEntree = $dateSortie = $statut = "";

	if(!empty($_POST))
	{
		$client = checkInput($_POST['clients.nom']);
		$chambre = checkInput($_POST['chambres.numero']);
		$dateEntree = checkInput($_POST['reservations.dateEntree']);
		$dateSortie = checkInput($_POST['reservations.dateSortie']);
		$statut = checkInput($_POST['reservations.statut']);
		$isSuccess = true;
		
		if(empty($client))
		{
			$clientError = 'Ce champ ne peut pas être vide';
			$isSuccess = false;
		}
		if(empty($chambre))
		{
			$chambreError = 'Ce champ ne peut pas être vide';
			$isSuccess = false;
		}
		if(empty($dateEntree))
		{
			$dateEntreeError = 'Ce champ ne peut pas être vide';
			$isSuccess = false;
		}
		   if(empty($dateSortie))
		{
			$dateSortieError = 'Ce champ ne peut pas être vide';
			$isSuccess = false;
		}
		if(empty($statut))
		{
			$statutError = 'Ce champ ne peut pas être vide';
			$isSuccess = false;
		}
		else{};
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
	<h1 class="text-logo"><img src="images/logo.png"> Ajouter/Modifier une réservation</h1>
		<div class="container admin">
			<div class="row">
				<div class="col-sm-6">
				<form class="form" role="form" action="<?php echo 'update.php?id=' . $id; ?>" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="client">Client:</label>
						<input type="text" class="form-control" id="client" name="client" placeholder="Client" value="<?php echo $client; ?>">
						<span class="help-inline"><?php echo $clientError; ?></span>
					</div>
					<div class="form-group">
						<label for="chambre">Chambre:</label>
						<input type="text" class="form-control" id="description" name="chambre" placeholder="Chambre" value="<?php echo $chambre; ?>">
						<span class="help-inline"><?php echo $chambreError; ?></span>
					</div>
					<div class="form-group">
						<label for="dateEntree">Date Entrée</label>
						<input type="date"class="form-control" id="dateEntree" name="dateEntree" placeholder="Date Entrée" value="<?php echo $dateEntree; ?>">
						<span class="help-inline"><?php echo $dateEntreeError; ?></span>
					</div>
					<div class="form-group">
						<label for="dateSortie">Date Sortie</label>
						<input type="date"class="form-control" id="dateSortie" name="dateSortie" placeholder="Date Sortie" value="<?php echo $dateSortie; ?>">
						<span class="help-inline"><?php echo $dateSortieError; ?></span>
					</div>
					<div class="form-group">
						<label for="statut">Statut:</label>
						<input type="text" class="form-control" id="statut" name="statut" placeholder="Statut" value="<?php echo $statut; ?>">
						<span class="help-inline"><?php echo $statutError; 
						?></span>
					</div>
					<div class="form-actions">
						<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span> Ajouter/Modifier</button>
						<a class="btn btn-primary" href="index.php"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
					</div>	
					</form>
				</div>
				</div>
			</div>
		</div>
	</body>
</html>