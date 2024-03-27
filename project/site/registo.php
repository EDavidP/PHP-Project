<?php

	function console_log( $data ){
	echo '<script>';
	echo 'console.log('. json_encode( $data ) .')';
	echo '</script>';
	}

	session_start();
	
	if (isset($_POST['email']))
	{
		//validation flag
		$flag_everything_OK = true;

		//check name
		$name = $_POST['name'];
		if ((strlen($name)<1))
		{
			$flag_everything_OK = false;
			$_SESSION['e_name'] = "Este campo não pode ficar vazio!";
		}
		//check surname
		$surname = $_POST['surname'];
		if ((strlen($surname)<1))
		{
			$flag_everything_OK = false;
			$_SESSION['e_surname'] = "Este campo não pode ficar vazio!";
		}

		//check email
		$email = $_POST['email'];
		$emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
		
		if ((filter_var($emailB, FILTER_VALIDATE_EMAIL) == false) || ($emailB!=$email))
		{
			$flag_everything_OK = false;
			$_SESSION['e_email'] = "email incorreto!";
		}

		//check phone
		$phone = $_POST['phone'];
		
		//length of phone
		if (strlen($phone) != 9)
		{
			$flag_everything_OK = false;
			$_SESSION['e_phone'] = "úmero de telemóvel só pode ter 9 números inteiros!";
		}
		
		if (is_numeric($phone) == false)
		{
			$flag_everything_OK = false;
			$_SESSION['e_phone'] = "número de telemóvel só pode ter números inteiros!";
		}
		
		//check password
		$password1 = $_POST['pass1'];
		$password2 = $_POST['pass2'];
		
		if ((strlen($password1)<4) || (strlen($password1)>20))
		{
			$flag_everything_OK = false;
			$_SESSION['e_password'] = "A Password tem de ter entre 4 e 20 caracteres!";
		}
		
		if ($password1 != $password2)
		{
			$flag_everything_OK = false;
			$_SESSION['e_password'] = "Passwords are different!";
		}	
	
		//$password_hash = password_hash($password1, PASSWORD_DEFAULT);
		$password_hash = $password1;

		//console_log( $flag_everything_OK );

		$photo = 'photos/no_profile_picture.jpg';
		
		//save insterted data
		$_SESSION['input_phone'] = $phone;
		$_SESSION['input_email'] = $email;
		$_SESSION['input_password1'] = $password1;
		$_SESSION['input_password2'] = $password2;
		$_SESSION['input_name'] = $name;
		$_SESSION['input_surname'] = $surname;

		require_once "connect.php";
		mysqli_report(MYSQLI_REPORT_STRICT);
		
		try 
		{
			$connection = new mysqli($host, $db_user, $db_password, $db_name, $port);
			if ($connection->connect_errno != 0)
			{
				throw new Exception(mysqli_connect_errno());
			}
			else
			{
				//check if email exists
				$result = $connection->query("SELECT email FROM utilizador WHERE email='$email'");
				
				if (!$result) throw new Exception($connection->error);
				
				$count_emails = $result->num_rows;
				if($count_emails > 0)
				{
					$flag_everything_OK = false;
					$_SESSION['e_email'] = "Já existe uma conta com este email!";
				}		
				
				//check if phone exists
				$result = $connection->query("SELECT telemovel FROM utilizador WHERE telemovel='$phone'");
				
				if (!$result) throw new Exception($connection->error);
				
				$count_phones = $result->num_rows;
				if($count_phones > 0)
				{
					$flag_everything_OK = false;
					$_SESSION['e_phone'] = "Já existe uma conta com este telemóvel!";
				}	

				//console_log( $flag_everything_OK );
				
				if ($flag_everything_OK == true){
					//Add to database

					$sql="INSERT INTO utilizador VALUES(NULL,'$name', '$surname', '$email','$password_hash', '$phone', 'Cliente', SYSDATE(),'$photo')";
					console_log( $sql );
					
					if ($connection->query("INSERT INTO utilizador VALUES(NULL,'$name', '$surname', '$email','$password_hash', '$phone', 'Cliente', SYSDATE(),'$photo')"))
					{	
						$result = $connection->query("SELECT id FROM utilizador where email = '$email' ");
						$row = $result->fetch_assoc();
						$var=$row["id"];
						$connection->query("INSERT INTO cliente VALUES('$var', FALSE)");
						
						$_SESSION['registration_success'] = true;
						$_SESSION['user_id'] = $row['id'];
						$_SESSION['user_name'] = $row['primeiro_nome'];
						$_SESSION['user_surname'] = $row['ultimo_nome'];
						$_SESSION['user_email'] = $row['email'];
						$_SESSION['user_phone'] = $row['telemovel'];
						$_SESSION['user_cargo'] = $row['cargo'];
						$_SESSION['user_pass'] = $row['password'];


						header('Location: login.php');
						echo $nick."Bem Vindo".$haslo_hash;
						//die();
					}
					else
					{
						throw new Exception($connection->error);
						header('Location: login.php');	
					}	
				}
				
				$connection->close();
			}	
		}
		catch(Exception $e){
			echo '<span style="color:red;">Server error! Try later</span>';
			echo '<br />Developer info: '.$e;
		}	
	}	
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">	
		<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
		<link rel="stylesheet" type="text/css" href="css/registo.css">
	</head>
	<body>
		<head>
			<nav></nav>
		</head>
		<main>
			<div class="limiter">
				<div class="container-login100">
					<div class="wrap-login100">
						<form class="login100-form" method="post">
							<span class="login100-form-title">
								Faça o seu registo
							</span>
							<div class="inputs">
								<div class="name-surname">
									<div class="wrap-input100">
										<input class="input100" type="text" name="name" value="<?php
											if (isset($_SESSION['input_name']))
											{
												echo $_SESSION['input_name'];
												unset($_SESSION['input_name']);
											}
										?>" placeholder="Primeiro nome">
										<?php
											if (isset($_SESSION['e_name']))
											{
												echo '<div class="error">'.$_SESSION['e_name'].'</div>';
												unset($_SESSION['e_name']);
											}
										?>
										<span class="focus-input100"></span>
									</div>

									<div class="wrap-input100">
										<input class="input100" type="text" name="surname"  value="<?php
											if (isset($_SESSION['input_surname']))
											{
												echo $_SESSION['input_surname'];
												unset($_SESSION['input_surname']);
											}
										?>" placeholder="Último nome">
										<?php
										if (isset($_SESSION['e_surname']))
										{
											echo '<div class="error">'.$_SESSION['e_surname'].'</div>';
											unset($_SESSION['e_surname']);
										}
										?>
										<span class="focus-input100"></span>
									</div>
								</div>
								
								<div class="email-phone">
									<div class="wrap-input100">
										<input class="input100" type="text" name="email"value="<?php
										if (isset($_SESSION['input_email']))
										{
											echo $_SESSION['input_email'];
											unset($_SESSION['input_email']);
										}
										?>" placeholder="E-mail">
										<?php
										if (isset($_SESSION['e_email']))
										{
											echo '<div class="error">'.$_SESSION['e_email'].'</div>';
											unset($_SESSION['e_email']);
										}
										?>
										<span class="focus-input100"></span>
									</div>

									<div class="wrap-input100">
										<input class="input100" type="text" name="phone" value="<?php
										if (isset($_SESSION['input_phone']))
										{
											echo $_SESSION['input_phone'];
											unset($_SESSION['input_phone']);
										}
										?>" placeholder="Telemóvel">

										<?php
										if (isset($_SESSION['e_phone']))
										{
											echo '<div class="error">'.$_SESSION['e_phone'].'</div>';
											unset($_SESSION['e_phone']);
										}
										?>
										<span class="focus-input100"></span>
									</div>
								</div>
								
								<div class="password-confirm">
									<div class="wrap-input100">
										<input class="input100" type="password" name="pass1"  value="<?php
										if (isset($_SESSION['input_password1']))
										{
											echo $_SESSION['input_password1'];
											unset($_SESSION['input_password1']);
										}
										?>" placeholder="Palavra-passe">
										<?php
										if (isset($_SESSION['e_password']))
										{
											echo '<div class="error">'.$_SESSION['e_password'].'</div>';
											unset($_SESSION['e_password']);
										}
										?>	
										<span class="focus-input100"></span>
									</div>

									<div class="wrap-input100">
										<input class="input100" type="password" name="pass2" value="<?php
										if (isset($_SESSION['input_password2']))
										{
											echo $_SESSION['input_password2'];
											unset($_SESSION['input_password2']);
										}
										?>" placeholder="Confirmar Palavra-passe">
										<span class="focus-input100"></span>
									</div>
								</div>
							</div>

							<div class="container-login100-form-btn">
								<button type="submit">
									Registo
								</button>
							</div>

							<div class="Registe_se_aqui">
			
							</div>

						</form>
					</div>
				</div>
			</div>
		</main>
	</body>
</html>