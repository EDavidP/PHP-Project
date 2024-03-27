<?php
	function console_log( $data ){
	echo '<script>';
	echo 'console.log('. json_encode( $data ) .')';
	echo '</script>';
	}
	session_start();
	

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
    <link href="css/perfil.css" rel="stylesheet" />
  </head>
  <body>
    <header>
      <nav>
		<div class="username-nav">
			<b><?php echo $_SESSION['user_name']." ".$_SESSION['user_surname']?></b><br>
			<?php echo $_SESSION['user_cargo']?>
		</div>
		<span class="nav-title">DADOS PESSOAIS</span>
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
							<center><img clss="profile-picture" src="<?php echo $_SESSION['user_picture']; ?>" alt="photo_perfil"  width="160" height="auto" /></center>
							<br>
						<div class="inputs">
							<div class="name-surname">
								<div class="wrap-input100">
                                    <input class="input100" type="text" name="name"  placeholder="Primeiro Nome: <?php echo $_SESSION['user_name']?>" disabled>
									<span class="focus-input100"></span>
								</div>

								<div class="wrap-input100">
									<input class="input100" type="text" name="surname" placeholder="Último Nome: <?php echo $_SESSION['user_surname']?>" disabled>
									<span class="focus-input100"></span>
								</div>
							</div>
							
							<div class="email-phone">
								<div class="wrap-input100">
									<input class="input100" type="text" name="email" placeholder="E-mail: <?php echo $_SESSION['user_email']?>" disabled>
									<span class="focus-input100"></span>
								</div>

								<div class="wrap-input100">
									<input class="input100" type="text" name="phone"  placeholder="Telemóvel: <?php echo $_SESSION['user_phone']?>" disabled>
									<span class="focus-input100"></span>
								</div>
							</div>
						</div>
						<div class="container-login100-form-btn">
							<button type="button" onclick="window.location.href ='alterar_dados_pessoais.php'">
								Alterar
							</button>
						</div>
				</div>
			</div>
		</div>
    </main>
  </body>
</html>