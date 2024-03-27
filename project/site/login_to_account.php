<?php
	session_start();
	if((!isset($_POST['email']))||(!isset($_POST['pass'])))
	{
		header('Location: login.php');
		exit();
	}
	require_once "connect.php";
	$connection = @new mysqli($host, $db_user, $db_password, $db_name, $port);
	
	if ($connection->connect_errno!=0){
		echo "Error: ".$connection->connect_errno;
	}
	else{
		$email = $_POST['email'];
		$pass = $_POST['pass'];
		$email = htmlentities($email, ENT_QUOTES, "UTF-8");
		if ($result= @$connection->query(
		sprintf("select * from utilizador where email ='%s' AND password = '%s'" , 
		mysqli_real_escape_string($connection,$email),mysqli_real_escape_string($connection,$pass)))){
			$count_users = $result->num_rows;
			if($count_users>0){
				$row = $result->fetch_assoc();
				
				$_SESSION['logged'] = true;
				$_SESSION['user_id'] = $row['id'];
				$_SESSION['user_name'] = $row['primeiro_nome'];
				$_SESSION['user_surname'] = $row['ultimo_nome'];
				$_SESSION['user_email'] = $row['email'];
				$_SESSION['user_phone'] = $row['telemovel'];
				$_SESSION['user_cargo'] = $row['cargo'];
				$_SESSION['user_pass'] = $row['password'];
				$_SESSION['user_picture'] = $row['foto_perfil'];

				unset($_SESSION['error_log']);
				if (strcmp($_SESSION['user_cargo'],"Consultor") == 0){
					header('Location: consultor_main_page.php');
				}elseif (strcmp($_SESSION['user_cargo'],"Administrador") == 0){
					header('Location: admin_main_page.php');
				}else{
					header('Location: cliente_main_page.php');
				} 	
			} 
			else{
				$_SESSION['error_log'] = '<span style="color:red">E-mail ou pass errados!</span>';
				header('Location: login.php');	
			}
		}
		else{
			$_SESSION['error_log'] = '<span style="color:red">não tem conta</span>';
			header('Location: login.php');
		}
		$connection->close();
	}
?>