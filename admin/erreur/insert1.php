<?php
	require 'database.php';
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
				<div class="col-sm-6">
					<h1><strong>Ajouter un item </strong> </h1>
					<br>
					<form class="form action="insert.php" method="post" enctype="multipart/form-data" >
						<div class="form-group">
							<label for="name">Nom:</label>
							<input type="text" class="form-control" id="name" name="name" placeholder="Nom" value="<?php echo $name; ?>">
							<span class="help-inline"><?php echo $nameError; ?></span>
						</div>
						
						<div class="form-group">
							<label for="description">Description:</label>
							<input type="text" class="form-control" id="description" name="description" placeholder="Description" value="<?php echo $description; ?>">
							<span class="help-inline"><?php echo $descriptionError; ?></span>
						</div>
						
						<div class="form-group">
							<label for="price">Prix:</label>
							<input type="number" step="0.01" class="form-control" name="name" id="price" placeholder="Prix" value="<?php echo $price; ?>">
							<span class="help-inline"><?php echo $priceError; ?></span>
						</div>
						<div class="form-group">
							<label for="category">Categorie:</label>
							<select class="form-control" id="category" name="category">
								$db = databade
							</select>
							<span class="help-inline"><?php echo $nameError; ?></span>
						</div>
						<div class="form-group">
							<label for="name">Nom:</label>
							<input type="text" class="form-control" id="" name="name" placeholder="Nom" value="<?php echo $name; ?>">
							<span class="help-inline"><?php echo $nameError; ?></span>
						</div>
					</form>
					<br>
					<div class="form-actions">
						<a class="btn btn-primary" href="index.php"><span class=" glyphicon glyphicon-arrow-left"></span> Retour</a>
					</div>
				</div>
				 
				 
		</div>

	</body>
</html>