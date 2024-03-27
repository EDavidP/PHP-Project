<?php
    function console_log( $data ){
	echo '<script>';
	echo 'console.log('. json_encode( $data ) .')';
	echo '</script>';
	}

    session_start();
    if (!isset($_SESSION['logged']))
    {
        header('Location: cliente_main_page.php');
        exit();
    }
    elseif ((isset($_SESSION['logged'])) && ($_SESSION['logged']==true) && (strcmp($_SESSION['user_cargo'],"Consultor") == 0) )
    {
        header('Location: consultor_main_page.php');
        exit();
    } 

    require_once "connect.php";
    mysqli_report(MYSQLI_REPORT_STRICT);
  
    try{
        $connection = @new mysqli($host, $db_user, $db_password, $db_name, $port);
       
        if ($connection->connect_errno != 0)
        {
            throw new Exception(mysqli_connect_errno());
        }
        else{  
            $_SESSION['referancia_imovel'] = $_GET['referencia'];
            $sql ="SELECT * FROM imoveis_a WHERE referencia=".$_GET['referencia'];

            console_log( $sql );
            $result = $connection->query($sql);
            if (!$result) throw new Exception($connection->error);

            $row = mysqli_fetch_assoc($result);
            
            $referencia = $row['referencia'];
            $tipo = $row['tipo'];
            $titulo_do_anuncio = $row['titulo_do_anuncio'];
            $preco = $row['preco'];
            $distrito = $row['distrito'];
            $concelho = $row['concelho'];
            $freguesia = $row['freguesia'];
            $zona = $row['zona'];
            $rua = $row['rua'];
            $andar = $row['andar'];
            $numero = $row['numero'];
            $tipologia = $row['tipologia'];
            $ncasas_de_banho = $row['ncasas_de_banho'];
            $area_bruta = $row['area_bruta'];
            $area_util = $row['area_util'];
            $a_ce = $row['a_ce'];
            $a_ano_de_construcao = $row['a_ano_de_construcao'];
            $a_estado_conservacao = $row['a_estado_conservacao']; 
            $a_npisos = $row['a_npisos'];
            $a_tipo_de_negocio = $row['a_tipo_de_negocio'];
            $a_condominio = $row['a_condominio'];
            $a_descricao = $row['a_descricao'];
            $a_disponivel = $row['a_disponivel'];
            $a_imagem1 = $row['a_imagem1'];
            $a_imagem2 = $row['a_imagem2'];
            $a_imagem3 = $row['a_imagem3'];
            $a_imagem4 = $row['a_imagem4']; 
            $a_imagem5 = $row['a_imagem5'];
            $a_data_registo = $row['a_data_registo'];

            $sql = "SELECT * FROM utilizador 
                        WHERE utilizador.id = (SELECT consultor_utilizador_id FROM consultor_imoveis_a 
                            WHERE `imoveis_a_referencia`='$referencia' );";

            console_log( $sql );
            $result = $connection->query($sql);
            if (!$result) throw new Exception($connection->error);

            $row = mysqli_fetch_assoc($result);

            $_SESSION['consultor_id'] = $row['id'];
            $primeiro_nome = $row['primeiro_nome'];
            $ultimo_nome = $row['ultimo_nome'];
            $telemovel = $row['telemovel'];
            $foto_perfil = $row['foto_perfil'];
            $email = $row['email'];
        }
    }catch(Exception $e)
    {
        echo '<span style="color:red;">Server error! Try later</span>';
        echo '<br />Developer info: '.$e;
    }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    <link href="css/detalhes_imovel.css" rel="stylesheet" />
  </head>
  <body>
      <header>
        <nav>
            <span style="font-size:30px;cursor:pointer" onclick="window.location.href ='catalogo.php'">&#8678;</span>
            <div class="end-wrap">
                <img src="images/house-black-silhouette-without-door.svg" alt="home_icon"  width="25" height="auto" onclick="window.location.href ='index.php'"/>
                <a href="logout.php">Terminar Sessão</a>
            </div>
        </nav>
      </header>
      <main>
      
        <div class="big-wrap" style="width:auto; hight:auto; background-color: #fff; opacity:0.85">
            <div class="head">
                <span class="title"><?php echo $titulo_do_anuncio; ?></span>
                <span class="price-title"> - <?php echo $preco; ?> €</span>
            </div>

            <div class="houseInfo">
            
                <div class="details">
                    <span class="sub-title1"><?php echo $distrito;?>, <?php echo $concelho;?>, <?php echo $freguesia;?>, <?php echo $zona; ?></span><br><br>
                    <span class="sub-title2"><?php echo $tipologia;?> quartos, <?php echo $ncasas_de_banho;?> casas de banho, <?php echo $area_bruta;?>  m²</span> <br><br>
                    <span class="sub-title2">Descrição:</span><br><br>
                    <span class="descricao"><?php echo $a_descricao;?></span><br><br><br>

                    <table id="especificacoes" style="width:100%" CELLSPACING="5" >
                        <tr>
                            <td>Area Útil: <?php echo $area_util; ?> m²</td>
                            <td>Estado: <?php echo $a_estado_conservacao; ?></td>
                        </tr>
                        <tr>
                            <td>Classificação Energética: <?php echo $a_ce; ?></td>
                            <td>Andar: <?php echo $andar; ?>º</td>
                        </tr>
                        <tr>
                            <td>Ano de Construção: <?php echo intval($a_ano_de_construcao); ?></td>
                            <td>Condomíno: <?php echo $a_condominio; ?> €</td>
                        </tr>
                    </table>


                </div>
                <div class="slideshow-container-wrap" >
                    <div class="slideshow-container" >
                        <div class="mySlides fade">
                        <div class="numbertext">1 / 5</div>
                            <img src="<?php echo $a_imagem1; ?>" width="100%" height="auto">
                        </div>

                        <div class="mySlides fade">
                            <div class="numbertext">2 / 5</div>
                            <img src="<?php echo $a_imagem2; ?>" width="100%" height="auto">
                        </div>

                        <div class="mySlides fade">
                            <div class="numbertext">3 / 5</div>
                            <img src="<?php echo $a_imagem3; ?>" width="100%" height="auto">
                        </div>

                        <div class="mySlides fade">
                            <div class="numbertext">4 / 5</div>
                            <img src="<?php echo $a_imagem4; ?>" width="100%" height="auto">
                        </div>

                        <div class="mySlides fade">
                            <div class="numbertext">5 / 5</div>
                            <img src="<?php echo $a_imagem5; ?>" width="100%" height="auto">
                        </div>

                        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                        <a class="next" onclick="plusSlides(1)">&#10095;</a>

                    </div>
                    <div style="text-align:center">
                        <span class="dot" onclick="currentSlide(1)"></span> 
                        <span class="dot" onclick="currentSlide(2)"></span> 
                        <span class="dot" onclick="currentSlide(3)"></span> 
                        <span class="dot" onclick="currentSlide(4)"></span> 
                        <span class="dot" onclick="currentSlide(5)"></span> 
                    </div>
                </div>
                <br>         
            </div>
        </div>
        <form action="adicionar_visita_proposta.php" method="post">
            <div class="consultorInfo">
                <img src="<?php echo $foto_perfil; ?>" width="100" height="auto"><br><br>
                <span><?php echo $primeiro_nome;?>  <?php echo $ultimo_nome; ?></span><br>
                <span> Tel: <?php echo $telemovel; ?></span><br>
                <span> Email: <?php echo $email; ?></span><br><br>
                <div class="container-login100-form-btn">
                    <button type="submit" value="visita" name="visita">
                        Marcar Visita
                    </button>
                </div>
                <?php
                if (isset($_SESSION['e_visita']))
                {
                    echo '<div class="error">'.$_SESSION['e_visita'].'</div>';
                    unset($_SESSION['e_visita']);
                }
                ?> <br>
                <div class="container-login100-form-btn">
                    <button type="submit" value="proposta" name="proposta">
                    <?php echo $a_tipo_de_negocio; ?>
                    </button>
                </div>
                <?php
                if (isset($_SESSION['e_propostas']))
                {
                    echo '<div class="error">'.$_SESSION['e_propostas'].'</div>';
                    unset($_SESSION['e_propostas']);
                }
                ?>
            </div>
        </form>
       
        

      </main>
  




 

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            
        <script src="js/showInfo.js"></script>

        <script>
        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
        showSlides(slideIndex += n);
        }

        function currentSlide(n) {
        showSlides(slideIndex = n);
        }

        function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        if (n > slides.length) {slideIndex = 1}    
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";  
        dots[slideIndex-1].className += " active";
        }
        </script>
    </body>
</html>