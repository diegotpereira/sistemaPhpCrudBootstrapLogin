<?php
include_once('include/Database.php');
define('SS_DB_NAME', 'db_sistema_crud_php_login');
define('SS_DB_USER', 'root');
define('SS_DB_PASSWORD', 'root');
define('SS_DB_HOST', 'localhost');

$dsn	= 	"mysql:dbname=".SS_DB_NAME.";host=".SS_DB_HOST."";
$pdo	=	"";
try {
	$pdo = new PDO($dsn, SS_DB_USER, SS_DB_PASSWORD);
}catch (PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}
$conexao = mysqli_connect(SS_DB_HOST, SS_DB_USER, SS_DB_PASSWORD, SS_DB_NAME) or die ('Não foi possível conectar');
$db 	=	new Database($pdo);
?>

