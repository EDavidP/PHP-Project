<?php
session_start();
	
if (!isset($_SESSION['logged']))
{
	header('Location: index.php');
	exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="css/consultor_main_page.css">
</head>
<body>
	<head>
		<nav>
			<div class="navbar-wrap">
                    <div class="username-nav">
                      <b><?php echo $_SESSION['user_name']." ".$_SESSION['user_surname']?></b><br>
                      <?php echo$_SESSION['user_cargo']?>
                    </div>
			</div>
			<a href="logout.php">Terminar Sessão</a>
		</nav>
	</head>
		<main>
			<div class="limiter">
				<div class="container-login100">
					<div class="wrap-login100">
							<span class="login100-title">
								Adicionar Imóvel
							</span>

							<div class="container-login100-form-btn">
								<button type="button" onclick="window.location.href='adicionar_imovel.php'">
								Adicionar
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
					</div>
				</div>
			</div>
		</main>
	<footer>

	</footer>


</body>
</html>