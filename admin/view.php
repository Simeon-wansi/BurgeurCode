<?php 
	require 'database.php';

	if(!empty($_GET['id']))
	{
		$id = checkInput($_GET['id']);
	}
	$db = Database::connect();
	$statement = $db->prepare('SELECT items.id, items.name, items.description, items.price, items.image, categories.name AS category FROM items LEFT JOIN categories ON items.category = categories.id WHERE items.id = ? ');
	$statement->execute(array($id));
	$item = $statement->fetch();

	Database::disconnect();

	function checkInput($data)
	{
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		return $data;
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
				<div class="col-sm-6">
					<h1><strong>Voir un item </strong> </h1>
					<br>
					<form>
						<div class="form-group">
							<label>Nom:</label> <?php echo ' '. $item['name']; ?>
						</div>
						<div class="form-group">
							<label>Description:</label> <?php echo ' '. $item['description']; ?>
						</div>
						<div class="form-group">
							<label>Prix:</label> <?php echo ' '. number_format((float)$item['price'],2,'.',''); ?>
						</div>
						
						<div class="form-group">
							<label>Catégorie:</label> <?php echo ' '. $item['category']; ?>
						</div>
						<div class="form-group">
							<label>Image:</label> <?php echo ' '. $item['image']; ?>
						</div>
					</form>
					<br>
					<div class="form-actions">
						<a class="btn btn-primary" href="index.php"><span class=" glyphicon glyphicon-arrow-left"></span> Retour</a>
					</div>
				</div>
				 
				 <div class="col-sm-6 site">
						<div class="thumbnail">
							<img src="<?php echo'../images/'.$item['image']; ?> " alt="...">
							<div class="price"> <?php echo number_format((float)$item['price'],2,'.',''); ?>€</div>
							<div class="caption">
								<h4><?php echo $item['name']; ?></h4>
								<p><?php echo $item['description']; ?></p>
								<a href="#" class="btn btn-order"><span class="glyphicon glyphicon-shopping-cart"></span> Commander</a>
							</div>
						</div>
				</div>

			</div>
		</div>

	</body>
</html>
<!--
table-striped : class permettant de faire apparaitre des ligne blanche et grise alterné dans la tables -->