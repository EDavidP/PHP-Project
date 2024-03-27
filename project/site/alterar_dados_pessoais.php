<?php
	function console_log( $data ){
	echo '<script>';
	echo 'console.log('. json_encode( $data ) .')';
	echo '</script>';
	}
	session_start();

		if (!isset($_SESSION['logged']))
			{
				header('Location: index.php');
				exit();
		}
		elseif ((isset($_SESSION['logged'])) && ($_SESSION['logged']==true) && (strcmp($_SESSION['user_cargo'],"Consultor") == 0) )
		{
			header('Location: consultor_main_page.php');
			exit();
		} 

		require_once "connect.php";
		mysqli_report(MYSQLI_REPORT_STRICT);


		$connection = new mysqli($host, $db_user, $db_password, $db_name, $port);

		$id = $_SESSION['user_id'];
		$sql = "SELECT * FROM utilizador WHERE id='$id';";
		console_log( $sql );
		$result = $connection->query("SELECT * FROM utilizador WHERE id='$id';");

		if (!$result) throw new Exception($connection->error);
			
		$row = mysqli_fetch_assoc($result);
	
		//save old data
		$phone_old = $row['telemovel'];
		$email_old = $row['email'];
		$password_old = $row['password'];
		$name_old = $row['primeiro_nome'];
		$surname_old  = $row['ultimo_nome'];
		$file_path = $row['foto_perfil'];
	
	if (isset($_POST['email']))
	{
		//validation flag
		$flag_everything_OK = true;

		//check name
		$name = $_POST['name'];
		if ((strlen($name)<1))
		{
			$flag_everything_OK = false;
			$_SESSION['e_name'] = "Name field cannot be empty!";
		}
		//check surname
		$surname = $_POST['surname'];
		if ((strlen($surname)<1))
		{
			$flag_everything_OK = false;
			$_SESSION['e_surname'] = "Surname field cannot be empty!";
		}

		//check email
		$email = $_POST['email'];
		$emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
		
		if ((filter_var($emailB, FILTER_VALIDATE_EMAIL) == false) || ($emailB!=$email))
		{
			$flag_everything_OK = false;
			$_SESSION['e_email'] = "Incorrect email address!";
		}

		//check phone
		$phone = $_POST['phone'];
		
		//length of phone
		if (strlen($phone) != 9)
		{
			$flag_everything_OK = false;
			$_SESSION['e_phone'] = "phone number must have 9 integers!";
		}
		
		if (is_numeric($phone) == false)
		{
			$flag_everything_OK = false;
			$_SESSION['e_phone'] = "phone number has to consist of only integers!";
		}
		
		//check password
		$password1 = $_POST['pass1'];
		$password2 = $_POST['pass2'];
		
		if ((strlen($password1)<4) || (strlen($password1)>20))
		{
			$flag_everything_OK = false;
			$_SESSION['e_password'] = "Password under 4 or over 20 characters!";
		}
		
		if ($password1 != $password2)
		{
			$flag_everything_OK = false;
			$_SESSION['e_password'] = "Passwords are different!";
		}	
	
		//$password_hash = password_hash($password1, PASSWORD_DEFAULT);
		$password_hash = $password1;

		
		$file_tmp = $_FILES["fileImg"]["tmp_name"];
		$file_name = $_FILES["fileImg"]["name"];
		$e_img = "";

		if (strlen($file_tmp)>0){
			//image directory where actual image will be store
			$file_path = "photos/".$file_name;
		}
		
		//console_log( $flag_everything_OK );
		
		//save insterted data
		$_SESSION['input_phone'] = $phone;
		$_SESSION['input_email'] = $email;
		$_SESSION['input_password1'] = $password1;
		$_SESSION['input_password2'] = $password2;
		$_SESSION['input_name'] = $name;
		$_SESSION['input_surname'] = $surname;
		
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
				$result = $connection->query("SELECT email FROM utilizador WHERE email='$email' AND id!='$id';");
				
				if (!$result) throw new Exception($connection->error);
				
				$count_emails = $result->num_rows;
				if($count_emails > 0)
				{
					$flag_everything_OK = false;
					$_SESSION['e_email'] = "Account with this email already exists!";
				}		
				
				if ($flag_everything_OK == true)
				{
					$sql = "UPDATE utilizador SET primeiro_nome='$name',ultimo_nome='$surname',
					email='$email',telemovel='$phone',`password`='$password_hash', foto_perfil ='$file_path' 
					WHERE utilizador.id='$id'; ";
					console_log( $sql );
					
					if ($connection->query("UPDATE `utilizador` SET `primeiro_nome`='$name',`ultimo_nome`='$surname',`email`='$email',`telemovel`='$phone',`password`='$password_hash', foto_perfil ='$file_path' WHERE `utilizador`.`id`='$id'; "))
					{	
						move_uploaded_file($file_tmp,$file_path);
                        $e_img = "<p align=center>File ".$_FILES["fileImg"]["name"].""."<br />Image saved into Table.";

						$_SESSION['update_success'] = true;
						$_SESSION['user_name'] = $name;
						$_SESSION['user_surname'] = $surname;
						$_SESSION['user_email'] = $email;
						$_SESSION['user_phone'] = $phone;
						$_SESSION['user_pass'] = $password_hash;
						$_SESSION['user_picture'] = $file_path;

						header('Location: perfil.php');
						exit();
					}
					else
					{
						throw new Exception($connection->error);
						header('Location: perfil.php');	
					}
					
				}
				
				$connection->close();
			}	
		}
		catch(Exception $e)
		{
			echo '<span style="color:red;">Server error! Try later</span>';
			echo '<br />Developer info: '.$e;
		}	
	}
	
?>

<html>
  <head>
  	<link rel="shortcut icon" href="">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    <link href="css/alterar_dados_pessoais.css" rel="stylesheet" />
  </head>
  <body>
    <header>
	<nav>
		<div class="username-nav">
			<b><?php echo $_SESSION['user_name']." ".$_SESSION['user_surname']?></b><br>
			<?php echo $_SESSION['user_cargo']?>
		</div>
		<span class="nav-title">ALTERAR DADOS PESSOAIS</span>
		<div class="end-wrap">
			<img src="images/house-black-silhouette-without-door.svg" alt="home_icon"  width="25" height="auto" onclick="window.location.href ='cliente_main_page.php'"/>
			<a href="logout.php">Terminar Sessão</a>
		</div>		
      </nav>
    </header>
    <main>
    <div class="limiter">
			<div class="container-login100">
				<div class="wrap-login100">
					<form class="login100-form" method="post" enctype="multipart/form-data">
						<div class="wrap-input200">		
							<span>Altere a foto de perfil</span><br><br>	
                            <input type="file" name="fileImg" class="file_input"/>
                        </div>
						<div class="inputs">
							<div class="name-surname">
								<div class="wrap-input100">
									<input class="input100" type="text" name="name" value="<?php
										echo $name_old;
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
											echo $surname_old;
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
											echo $email_old;
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
											echo $phone_old;
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
											echo $password_old;
									?>" placeholder="Palavra-passe">
									<?php
									if (isset($_SESSION['e_password1']))
									{
										echo '<div class="error">'.$_SESSION['e_password'].'</div>';
										unset($_SESSION['e_password']);
									}
									?>	
									<span class="focus-input100"></span>
								</div>

								<div class="wrap-input100">
									<input class="input100" type="password" name="pass2" value="<?php
										echo $password_old;
									?>" placeholder="Confirmar Palavra-passe">
									<span class="focus-input100"></span>
								</div>
							</div>
						</div>
						<div class="gravar-cancelar">
							<div class="container-login100-form-btn">
								<button type="submit" onclick="window.location.href ='perfil.php'">
									Gravar
								</button>
							</div>
							<div class="container-login100-form-btn">
								<button type="button" onclick="window.location.href ='perfil.php'">
									Canelar
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
    </main>
  </body>
</html>