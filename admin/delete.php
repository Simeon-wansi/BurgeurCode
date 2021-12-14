<?php
	require 'database.php';

	$nameError = $descriptionError = $priceError = $categoryError= $imageError = $name = $description = $price= $category = $image="" ;
	if(!empty($_GET['id']))
	{
		$id = checkInput($_GET['id']);
	}

	function checkInput($data)
	{
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	if(!empty($_POST))
	{
		$id = checkInput($_POST['id']); 
		$db = Database::connect();
		$statement = $db->prepare("DELETE FROM items WHERE id = ?");
		$statement->execute(array($id));
		Database::disconnect();
		header("Location: index.php");
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Burger Code</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="text/javascript" src="../bootstrap-3.4.1-dist\jquery-3.6.0.min.js"></script>
		<link rel="stylesheet" type="text/css" href="../bootstrap-3.4.1-dist\css\bootstrap.min.css">
		
		<script type="text/javascript" src="../bootstrap-3.4.1-dist\js\bootstrap.min.js"></script>
		<link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="../css/style.css">
	</head>
	<body>
		<h1 class="text-logo"><span class="glyphicon glyphicon-cutlery"> </span> Burger Code<span class="glyphicon glyphicon-cutlery"> </span> </h1>

		<div class="container admin">
			<div class="row">
					<h1><strong>Suprimer un item </strong> </h1>
					<br>
					<form class="form action="delete.php" method="post"  >
						<input type="hidden" name="id" value="<?php echo $id; ?>">
						<p class="alert alert-warnig">Etes vous sur de vouloir supprimer ?</p>
						
					<div class="form-actions">
						<button type="submit" class="btn btn-warning">Oui </button> 
					
						<a class="btn btn-default" href="index.php">Non</a>
					</div>
					</form>		 
				 
		</div>

	</body>
</html>