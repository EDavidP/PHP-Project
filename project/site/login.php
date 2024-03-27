<?php
session_start();
if ((isset($_SESSION['logged'])) && ($_SESSION['logged']==true))
{
	header('Location: cliente_main_page.php');
	exit();
}
elseif ((isset($_SESSION['logged'])) && ($_SESSION['logged']==true) && (strcmp($_SESSION['user_cargo'],"Consultor") == 0) )
{
	header('Location: consultor_main_page.php');
	exit();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
	<head>
		<nav></nav>
	</head>
		<main>
			<div class="limiter">
				<div class="container-login100">
					<div class="wrap-login100">
						<form action="login_to_account.php" method="post" class="login100-form">
							<span class="login100-form-title">
								Seja Bem-vindo
							</span>

							
							<div class="wrap-input100">
								<input class="input100" type="text" name="email" placeholder="E-mail">
								<span class="focus-input100"></span>
							</div>
							
							
							<div class="wrap-input100">
								<input class="input100" type="password" name="pass" placeholder="Palavra-passe">
								<span class="focus-input100"></span>
							</div>

							<div class="container-login100-form-btn">
								<button type="submit">
									Login
								</button>
							</div>

							<?php
							if(isset($_SESSION['error_log']))
							{
							echo '</br>';
							echo $_SESSION['error_log'];
							unset($_SESSION['error_log']);
							}
							?>

							<div class="Registe_se_aqui">
									<a href="registo.php">
										Ainda não tem conta? Registe-se aqui!
									</a>
							</div>

						</form>
					</div>
				</div>
			</div>
		</main>
	<footer>
	</footer>


</body>
</html>
