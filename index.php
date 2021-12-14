<!DOCTYPE html>
<html>
<head>
	<title>Burger Code</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="bootstrap-3.4.1-dist\jquery-3.6.0.min.js"></script>
	<link rel="stylesheet" type="text/css" href="bootstrap-3.4.1-dist\css\bootstrap.min.css">
	
	<script type="text/javascript" src="bootstrap-3.4.1-dist\js\bootstrap.min.js"></script>
	<link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="container site">
		<h1 class="text-logo"><span class="glyphicon glyphicon-cutlery"> </span> Burger Code<span class="glyphicon glyphicon-cutlery"> </span> </h1>
		<?php 
		require 'admin/database.php';
		echo '<nav>
			<ul class="nav nav-pills">';
				$db=Database::connect();
				$statement = $db->query('SELECT * FROM categories');
				$categories = $statement->fetchAll();
				foreach($categories as $category)
                {
                   if($category['id'] =='1') 
                       echo '<li role="presentation" class="active"><a href="#'.$category['id'].'" data-toggle="tab">'.$category['name'].'</a> </li> ';
                    else
                        echo '<li role="presentation" ><a href="#'.$category['id'].'" data-toggle="tab">'.$category['name'].'</a> </li>';
                }
            echo '	</ul>
             </nav>';
            echo '<div class="tab-content">';
            foreach($categories as $category)
            {
                if($category['id'] =='1') 
                echo '<div class="tab-pane active" id="'.$category['id'].'">';
             else
                 echo '<div class="tab-pane" id="'.$category['id'].'">';
                 echo '<div class="row"> ';
                 $statement = $db->prepare('SELECT * FROM items WHERE items.category = ?');
                 $statement->execute(array($category['id']));
                 while($item = $statement->fetch())
                 {
                     echo' <div class="col-sm-6 col-md-4">
                     <div class="thumbnail">
                         <img src="images/'.$item['image'].'" alt="...">
                         <div class="price">'.number_format($item['price'],2 , '.', '') .'€</div>
                         <div class="caption">
                             <h4>'.$item['name'].'</h4>
                             <p>'.$item ['description'].'</p>
                             <a href="#" class="btn btn-order"><span class="glyphicon glyphicon-shopping-cart"></span> Commander</a>
                         </div>
                     </div>
                 </div>';
                 }
          echo '</div>
             </div>';
            }
            Database::disconnect();
            echo '</div>'
		?>			
		
	</div>

</body>
</html>