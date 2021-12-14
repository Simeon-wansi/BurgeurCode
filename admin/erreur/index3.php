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
				 <h1><strong>Liste des items  </strong> <a href="#" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-plus"></span>Ajouter</a></h1>
				 <table class="table table-striped table-bordered">  
				 	<thead>
				 		<tr>
				 			<th>Nom</th>
				 			<th>Description</th>
				 			<th>Prix</th>
				 			<th>Categories</th>
				 			<th>Actions</th>
				 		</tr>
				 	</thead>
				 	<tbody>
				 		<?php
				 			require 'database.php';
							$db = Database::connect();
							$statement = $db->query('SELECT items.id, items.name, items.description, categories.name AS category FROM items LEFT JOIN categories ON items.category = categories.id');

							while($item = $statement->fetch())
							{
								echo '<tr>';
				 			echo '<td>'. $item['name'].'</td>';
				 			echo '<td>'. $item['description'] .'</td>';
				 			echo '<td>'. $item['price'].'</td>';
				 			echo '<td>'. $item['category'].'</td>';
				 			echo '<td width="300px">';
				 			echo '<a class="btn btn-default" href="view.php?id='. $item['id'] .'"><span class="glyphicon glyphicon-eye-open "></span> Voir</a>';
				 			echo	'<a class="btn btn-primary" href="insert.php?id='. $item['id'] .'"><span class="glyphicon glyphicon-pencil "></span> Modifier</a>';
				 			echo '<a class="btn btn-danger" href="delete.php?id='.$item['id']. '"><span class="glyphicon glyphicon-remove"></span> Supprimer</a>';
				 		echo '</td>';
				 		echo '</tr>';
							}
				 		?>





				 		
				 		<tr>
				 			<td>Item 2</td>
				 			<td>Descrition 2</td>
				 			<td>Prix 2</td>
				 			<td>Catégorie 2</td>
				 			<td width="300px">
				 				<a class="btn btn-default" href="view.php?id=2"><span class="glyphicon glyphicon-eye-open "></span> Voir</a>
				 				<a class="btn btn-primary" href="insert.php?id=2"><span class="glyphicon glyphicon-pencil "></span> Modifier</a>
				 				<a class="btn btn-danger" href="delete.php?id=2"><span class="glyphicon glyphicon-remove"></span> Supprimer</a>
				 			</td>
				 		</tr>
				 	</tbody>
				 	
				 </table>
			</div>
		</div>

	</body>
</html>
<!--
table-striped : class permettant de faire apparaitre des ligne blanche et grise alterné dans la tables -->