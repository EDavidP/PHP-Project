<?php
	session_start();
	
	function console_log( $data ){
		echo '<script>';
		echo 'console.log('. json_encode( $data ) .')';
		echo '</script>';
	}
	
	if (!isset($_SESSION['logged']))
	{
		header('Location: index.php');
		exit();
	}

	require_once "connect.php";
	
	$connection = @new mysqli($host, $db_user, $db_password, $db_name, $port);
	if ($connection->connect_errno != 0)
	{
		throw new Exception(mysqli_connect_errno());
	}        
        
	$sql ="UPDATE `imoveis_a` SET `a_aprovacao` = '1' WHERE `imoveis_a`.`referencia` =".$_GET['referencia'];
	console_log( $sql );

    $result = $connection->query($sql);
	
    header('Location: aprovar_adicao_imoveis.php');
    exit();

?>

    