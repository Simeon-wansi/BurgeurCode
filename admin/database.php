<?php 
	
	class Database
	{
	private  static	$dbHost = "localhost";
	private  static $dbName = "burger_code";
	private  static $dbUser = "root";
	private  static $dbUserPassword = "";

	private  static $connection = null; // creation de la variable connnection pour que se soit accesiblr // et static pour que se soit accesible, car on ne veux pas cree des objet mais on veux utiliser les elments de classe

		Public static function connect() // public pour que la classe soir =t accesible par tous, / static parceque c'est la class diretement qu'on utilise
		{
				try
			{
				self::$connection = new PDO("mysql:host=".self::$dbHost. ";dbname=". self::$dbName,self::$dbUser,self::$dbUserPassword); // quand on est dans la class et qu'on veuille acceder à une propriété static on utilise self::
			}
			catch(PDOException $e)
			{
				die($e->getMessage());
			}
			return self::$connection;
		}

		function disconnect()
		{
			self::$connection = null;
		}
	}

	Database::connect();
	
 ?>