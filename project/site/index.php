<?php
  
  session_start();
  if (isset($_SESSION['logged']))
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
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    <link href="css/index.css" rel="stylesheet" />
  </head>
  <body>
    <header>
      <nav>
          <ul>
              <button type="button" onclick="window.location.href='login.php'">
                  <li>
                      LOGIN
                  </li>
              </button>

              <a href="registo.php">
                  <li>Registe-se</li>
              </a>
          </ul>
      </nav>
    </header>
    <main>
    <div class="s003">
      <form action="catalogo.php" method="post">
        <fieldset class="message">
          <legend>Encontre a casa dos seus sonhos</legend>
        </fieldset>
        <div class="inner-form">
          <div class="input-field first-wrap">
            <div class="input-select">
              <select data-trigger="" name="choices-negocio">
                <option value="Comprar" placeholder="">Comprar</option>
                <option value="Arrendar">Arrendar</option>
              </select>
            </div>
          </div>
          <div class="input-field second-wrap">
            <input id="search" type="text" name="search-field" placeholder="Pesquise um distrito, concelho, freguesia ou zona" />
          </div>
          <div class="input-field third-wrap">
            <button class="btn-search" type="submit" onclick="window.location.href='catalogo.php'">
              <svg class="svg-inline--fa fa-search fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
              </svg>
            </button>
          </div>
        </div>
      </form>
    </div>
    </main>
    <footer>
      <div class="icons">
            <a href="https://www.facebook.com/luisascensao98">
              <img src="images/facebook.svg" alt="facebook icon" width="20" height="auto" >
            </a>
            <a href="https://twitter.com/JooLoureiro462">
              <img src="images/twitter.svg" alt="twitter icon" width="20" height="auto">
            </a>      
            <a href="https://www.instagram.com/_edson.david_/">
              <img src="images/instagram.svg" alt="instagram icon" width="20" height="auto">
            </a>
      </div>
    </footer>
    <script src="js/extention/choices.js"></script>
    <script>
      const choices = new Choices('[data-trigger]',
      {
        searchEnabled: false,
        itemSelectText: '',
      });

    </script>
  </body>
</html>
