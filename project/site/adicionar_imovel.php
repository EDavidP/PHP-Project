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

    if (isset($_POST['distrito']))
	{
        //validation flag
        $flag_everything_OK = true;

        //check distrito
        $distrito = $_POST['distrito'];
        if ((strlen($distrito)<1))
        {
            $flag_everything_OK = false;
            $_SESSION['e_distrito'] = "Distrito não pode ficar vazio!";
        }
        //check concelho
        $concelho = $_POST['concelho'];
        if ((strlen($concelho)<1))
        {
            $flag_everything_OK = false;
            $_SESSION['e_concelho'] = "Concelho não pode ficar vazio!";
        }

        //check freguesia
        $freguesia = $_POST['freguesia'];
        if ((strlen($freguesia)<1))
        {
            $flag_everything_OK = false;
            $_SESSION['e_freguesia'] = "Freguesia não pode ficar vazio!";
        }

        //check zona
        $zona = $_POST['zona'];
        if ((strlen($zona)<1))
        {
            $flag_everything_OK = false;
            $_SESSION['e_zona'] = "Zona não pode ficar vazio!";
        }

        //check rua
        $rua = $_POST['rua'];
        if ((strlen($rua)<1))
        {
            $flag_everything_OK = false;
            $_SESSION['e_rua'] = "Rua não pode ficar vazio!";
        }

        //check numero da porta
        $numero = $_POST['numero'];
        if ((strlen($numero)<1))
        {
            $flag_everything_OK = false;
            $_SESSION['e_numero'] = "numero da porta não pode ficar vazio!";
        }
        if ($numero !=0){
            $floatVal1 = floatval($numero);
            // If the parsing succeeded and the value is not equivalent to an int
            if(!($floatVal1 && intval($floatVal1) == $floatVal1))
            {
                $flag_everything_OK = false;
                $_SESSION['e_numero'] = "numero da porta tem de ser um inteiro!";
            }
            if ($numero < 0)
            {
                $flag_everything_OK = false;
                $_SESSION['e_numero'] = "numero da porta tem de ser um número maior ou igual a 0!";
            }
        }
        //check andar
        $andar = $_POST['andar'];
        if ((strlen($andar)<1))
            {
                $flag_everything_OK = false;
                $_SESSION['e_andar'] = "Andar não pode ficar vazio!";
            }
        if($andar != 0){
            $floatVal1 = floatval($andar);
            // If the parsing succeeded and the value is not equivalent to an int
            if(!($floatVal1 && intval($floatVal1) == $floatVal1))
            {
                $flag_everything_OK = false;
                $_SESSION['e_andar'] = "Andar tem de ser um número inteiro!";
            }
            if ($andar < 0)
            {
                $flag_everything_OK = false;
                $_SESSION['e_andar'] = "Andar tem de ser um número maior ou igual a 0!";
            }
        }
        
        // check titulo
        $titulo = $_POST['titulo'];
        if ((strlen($titulo)<1))
        {
            $flag_everything_OK = false;
            $_SESSION['e_titulo'] = "Titulo não pode ficar vazio!";
        }

        // check descrição
        $descricao = $_POST['descricao'];
        if ((strlen($descricao)<1))
        {
            $flag_everything_OK = false;
            $_SESSION['e_descricao'] = "Descricao não pode ficar vazio!";
        }

        //check area bruta
        $area_bruta = $_POST['area-bruta'];
        if (is_numeric($area_bruta) == false)
        {
            $flag_everything_OK = false;
            $_SESSION['e_area_bruta'] = "Area bruta tem de ser um número!";
        }
        if ($area_bruta < 0)
        {
            $flag_everything_OK = false;
            $_SESSION['e_area_bruta'] = "Area bruta tem de ser um número maior ou igual a 0!";
        }

        // check area util
        $area_util = $_POST['area-util'];
        if (is_numeric($area_util) == false)
        {
            $flag_everything_OK = false;
            $_SESSION['e_area_util'] = "Area útil tem de ser um número!";
        }
        if ($area_util < 0)
        {
            $flag_everything_OK = false;
            $_SESSION['e_area_util'] = "Area útil tem de ser um número maior ou igual a 0!";
        }

        // check ano de contrução
        $ano_construcao = $_POST['ano-construcao'];
        if($ano_construcao != 0){
            $floatVal1 = floatval($ano_construcao);
            // If the parsing succeeded and the value is not equivalent to an int
            if(!($floatVal1 && intval($floatVal1) == $floatVal1))
            {
                $flag_everything_OK = false;
                $_SESSION['e_ano_construcao'] = "Ano de Construção tem de ser inteiro!";
            }
            if ($ano_construcao < 0 && $ano_construcao >= date("Y"))
            {
                $flag_everything_OK = false;
                $_SESSION['e_ano_construcao'] = "Ano de Construção tem de ser DC!";
            }
        }

        //check casas de banho
        $Casas_banho = $_POST['Casas-banho'];
        if ((strlen($Casas_banho)<1))
        {
            $flag_everything_OK = false;
            $_SESSION['e_Casas_banho'] = "numero de casas de banho não pode ficar vazio!";
        }
        if ($Casas_banho !=0){
            $floatVal1 = floatval($Casas_banho);
            // If the parsing succeeded and the value is not equivalent to an int
            if(!($floatVal1 && intval($floatVal1) == $floatVal1))
            {
                $flag_everything_OK = false;
                $_SESSION['e_Casas_banho'] = "numero de casas de banho tem de ser um inteiro!";
            }
            if ($Casas_banho < 0)
            {
                $flag_everything_OK = false;
                $_SESSION['e_Casas_banho'] = "numero de casas de banho tem de ser um número maior ou igual a 0!";
            }
        }

        //check numero de pisos
        $numero_pisos = $_POST['numero-pisos'];
        if ((strlen($numero_pisos)<1))
        {
            $flag_everything_OK = false;
            $_SESSION['e_numero_pisos'] = "numero de pisos não pode ficar vazio!";
        }
        if($numero_pisos != 0){
            $floatVal1 = floatval($numero_pisos);
            // If the parsing succeeded and the value is not equivalent to an int
            if(!($floatVal1 && intval($floatVal1) == $floatVal1))
            {
                $flag_everything_OK = false;
                $_SESSION['e_numero_pisos'] = "numero de pisos tem de ser inteiro!";
            }
            if ($numero_pisos < 0)
            {
                $flag_everything_OK = false;
                $_SESSION['e_numero_pisos'] = "numero de pisos tem de ser um número maior ou igual a 0!";
            }   
        }

        // check condominio
        $condominio = $_POST['condominio'];
        if (is_numeric($condominio) == false)
        {
            $flag_everything_OK = false;
            $_SESSION['e_condominio'] = "condominio tem de ser um número!";
        }
        if ($condominio < 0)
        {
            $flag_everything_OK = false;
            $_SESSION['e_condominio'] = "condominio tem de ser um número maior ou igual a 0!";
        }
        // check CE (A a F)
        $CE = strtoupper($_POST['CE']);
        if( (strcmp($CE, "A") !== 0) && (strcmp($CE, "B") !== 0) && (strcmp($CE, "C") !== 0) && (strcmp($CE, "D") !== 0) && (strcmp($CE, "E") !== 0) && (strcmp($CE, "F") !== 0) && (strcmp($CE, "Z") !== 0))
        {
            $flag_everything_OK = false;
            $_SESSION['e_CE'] = "O CE tem de ser uma letra de A a F ou Z se não aplicável!";
        }
 
        // check preço
        $preco = $_POST['preco'];
        if (is_numeric($preco) == false)
        {
            $flag_everything_OK = false;
            $_SESSION['e_preco'] = "Preço tem de ser um número!";
        }
        if ($preco < 0)
        {
            $flag_everything_OK = false;
            $_SESSION['e_preco'] = "Preço tem de ser um número positivo!";
        }

        //check tipologia
        $tipologia = $_POST['tipologia'];
        if ((strlen($tipologia)<1))
        {
            $flag_everything_OK = false;
            $_SESSION['e_tipologia'] = "numero de quartos não pode ficar vazio!";
        }
        if($tipologia != 0){
            $floatVal1 = floatval($tipologia);
            // If the parsing succeeded and the value is not equivalent to an int
            if(!($floatVal1 && intval($floatVal1) == $floatVal1))
            {
                $flag_everything_OK = false;
                $_SESSION['e_tipologia'] = "numero de quartos tem de ser inteiro!";
            }
            if ($numero_pisos < 0)
            {
                $flag_everything_OK = false;
                $_SESSION['e_tipologia'] = "numero de quartos tem de ser um número maior ou igual a 0!";
            }   
        }
        
        

        $tipo = $_POST['choices-tipo'];
        $estado = $_POST['choices-estado'];
        $negocio = $_POST['choices-negocio'];
        
        


        $file_tmp1 = $_FILES["fileImg1"]["tmp_name"];
		$file_name1 = $_FILES["fileImg1"]["name"];
        $e_img1 = "";

        $file_tmp2 = $_FILES["fileImg2"]["tmp_name"];
		$file_name2 = $_FILES["fileImg2"]["name"];
        $e_img2 = "";

        $file_tmp3 = $_FILES["fileImg3"]["tmp_name"];
		$file_name3 = $_FILES["fileImg3"]["name"];
        $e_img3 = "";

        $file_tmp4 = $_FILES["fileImg4"]["tmp_name"];
		$file_name4 = $_FILES["fileImg4"]["name"];
        $e_img4 = "";

        $file_tmp5 = $_FILES["fileImg5"]["tmp_name"];
		$file_name5 = $_FILES["fileImg5"]["name"];
        $e_img5 = "";

        
		//image directory where actual image will be store
        $file_path1 = "photos/".$file_name1;
        $file_path2 = "photos/".$file_name2;
        $file_path3 = "photos/".$file_name3;
        $file_path4 = "photos/".$file_name4;
        $file_path5 = "photos/".$file_name5;	

        


        //save inserted data
        $_SESSION['input_titulo'] = $titulo;
        $_SESSION['input_distrito'] = $distrito;
        $_SESSION['input_concelho'] = $concelho;
        $_SESSION['input_freguesia'] = $freguesia;
        $_SESSION['input_zona'] = $zona;
        $_SESSION['input_rua'] = $rua;
        $_SESSION['input_numero'] = $numero;
        $_SESSION['input_andar'] = $andar;
        $_SESSION['input_titulo'] = $titulo;
        $_SESSION['input_descricao'] = $descricao;
        $_SESSION['input_area_bruta'] = $area_bruta;
        $_SESSION['input_area_util'] = $area_util;
        $_SESSION['input_ano_construcao'] = $ano_construcao;
        $_SESSION['input_casas_banho'] = $Casas_banho;
        $_SESSION['input_numero_pisos'] = $numero_pisos;
        $_SESSION['input_condominio'] = $condominio;
        $_SESSION['input_numero_pisos'] = $numero_pisos;
        $_SESSION['input_preco'] = $preco;
        $_SESSION['input_CE'] = $CE;
        $_SESSION['input_estado'] = $estado;
        $_SESSION['input_negocio'] = $negocio;
        $_SESSION['input_tipo'] = $tipo;
        $_SESSION['input_tipologia'] = $tipologia;

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
				//check if imovel exists
                $result = $connection->query("SELECT referencia FROM imoveis_a WHERE tipo='$tipo' 
                AND preco='$preco' AND distrito='$distrito' AND concelho='$concelho' AND freguesia='$freguesia' 
                AND zona='$zona' AND rua='$rua' AND andar='$andar' AND numero='$numero' AND tipologia='$tipologia' 
                AND ncasas_de_banho='$Casas_banho' AND area_bruta='$area_bruta' AND area_util='$area_util' AND a_ce='$CE' 
                AND a_ano_de_construcao='$ano_construcao' AND a_estado_conservacao='$estado' AND a_npisos='$numero_pisos' 
                AND a_tipo_de_negocio='$negocio' AND a_condominio='$condominio' ");
				
				if (!$result) throw new Exception($connection->error);
				
				$count_imoveis = $result->num_rows;
				if($count_imoveis > 0)
				{
					$flag_everything_OK = false;
					$_SESSION['e_imovel'] = "Este imóvel já existe!";
				}		
				
				//console_log( $flag_everything_OK );
				
				if ($flag_everything_OK == true)
				{
					//Add to database
					
					$sql="INSERT INTO imoveis_a VALUES(NULL,'$tipo','$titulo','$preco','$distrito','$concelho','$freguesia','$zona','$rua','$andar','$numero','$tipologia','$Casas_banho','$area_bruta','$area_util','$CE','$ano_construcao','$estado','$numero_pisos','$negocio','$condominio','$descricao',TRUE,'$file_path1','$file_path2','$file_path3','$file_path4','$file_path5', SYSDATE(),FALSE)";
					console_log( $sql );
					
					if ($connection->query("INSERT INTO imoveis_a VALUES(NULL,'$tipo','$titulo','$preco','$distrito','$concelho','$freguesia','$zona','$rua','$andar','$numero','$tipologia','$Casas_banho','$area_bruta','$area_util','$CE','$ano_construcao','$estado','$numero_pisos','$negocio','$condominio','$descricao',TRUE,'$file_path1','$file_path2','$file_path3','$file_path4','$file_path5', SYSDATE(),FALSE)"))
					{	
                        move_uploaded_file($file_tmp1,$file_path1);
                        $e_img1 = "<p align=center>File ".$_FILES["fileImg1"]["name"].""."<br />Image saved into Table.";
                        move_uploaded_file($file_tmp2,$file_path2);
                        $e_img2 = "<p align=center>File ".$_FILES["fileImg2"]["name"].""."<br />Image saved into Table.";
                        move_uploaded_file($file_tmp3,$file_path3);
                        $e_img3 = "<p align=center>File ".$_FILES["fileImg3"]["name"].""."<br />Image saved into Table.";
                        move_uploaded_file($file_tmp4,$file_path4);
                        $e_img4 = "<p align=center>File ".$_FILES["fileImg4"]["name"].""."<br />Image saved into Table.";
                        move_uploaded_file($file_tmp5,$file_path5);
                        $e_img5 = "<p align=center>File ".$_FILES["fileImg5"]["name"].""."<br />Image saved into Table.";

                        $consultor_id = $_SESSION['user_id'];
						$result = $connection->query("SELECT referencia FROM imoveis_a WHERE tipo='$tipo' AND preco='$preco' 
                        AND distrito='$distrito' AND concelho='$concelho' AND freguesia='$freguesia'AND zona='$zona' AND rua='$rua' 
                        AND andar='$andar' AND numero='$numero' AND tipologia='$tipologia' AND ncasas_de_banho='$Casas_banho' 
                        AND area_bruta='$area_bruta' AND area_util='$area_util' AND a_ce='$CE' AND a_ano_de_construcao='$ano_construcao' 
                        AND a_estado_conservacao='$estado' AND a_npisos='$numero_pisos' AND a_tipo_de_negocio='$negocio' AND a_condominio='$condominio' ");
                        
                        $row = $result->fetch_assoc();
						$referencia=$row["referencia"];
						$connection->query("INSERT INTO consultor_imoveis_a VALUES('$consultor_id','$referencia')");
                        
                        $_SESSION['success_added'] = true;

						header('Location: consultor_main_page.php');
						//die();
					}
					else
					{
                        throw new Exception($connection->error);
                        header('Location: adicionar_imovel.php');
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
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
        <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
        <link href="css/adicionar_imovel.css" rel="stylesheet" />
    </head>
    <body>
        <header>
            <nav>
                
                    <div class="username-nav">
                      <b><?php echo $_SESSION['user_name']." ".$_SESSION['user_surname']?></b><br>
                      <?php echo$_SESSION['user_cargo']?>
                    </div>
                
                <span class="nav-title">ADICIONAR IMÓVEL</span>
                <div class="end-wrap">
                    <img src="images/house-black-silhouette-without-door.svg" alt="home_icon"  width="25" height="auto" onclick="window.location.href ='consultor_main_page.php'"/>
                    <a href="logout.php">Terminar Sessão</a>
		        </div>
            </nav>
            
        </header>
        <main>
        <?php echo $_SESSION['e_imovel']; ?>
            <br>
            <form method="post" enctype="multipart/form-data">
                <span class="title">Insira os dados do imóvel a adcionar</span>
                <br><br>
                <div class="content">
                    <center> <span class="subtitle1">Localização</span></center>
                    <br><br>
                    <div class="sibtitle1-choices">
                        <div class="wrap-input100">
                            <input class="input100"  id="input-distrito" name="distrito" type="text" placeholder="Distrito" value="<?php
                            if (isset($_SESSION['input_distrito']))
                            {
                                echo $_SESSION['input_distrito'];
                                unset($_SESSION['input_distrito']);
                            } ?>">
                            <?php
                                if (isset($_SESSION['e_distrito']))
                                {
                                    echo '<div class="error">'.$_SESSION['e_distrito'].'</div>';
                                    unset($_SESSION['e_distrito']);
                                }
                            ?>
                            <span class="focus-input100"></span>
                        </div>
                        <div class="wrap-input100">
                            <input class="input100" id="input-concelho" name="concelho" type="text" placeholder="Concelho" value="<?php
                            if (isset($_SESSION['input_concelho']))
                            {
                                echo $_SESSION['input_concelho'];
                                unset($_SESSION['input_concelho']);
                            } ?>"/>
                            <?php
                                if (isset($_SESSION['e_concelho']))
                                {
                                    echo '<div class="error">'.$_SESSION['e_concelho'].'</div>';
                                    unset($_SESSION['e_concelho']);
                                }
                            ?>
                            <span class="focus-input100"></span>
                        </div>
                        <div class="wrap-input100">
                            <input class="input100" id="input-freguesia" name="freguesia" type="text" placeholder="Freguesia" value="<?php
                            if (isset($_SESSION['input_freguesia']))
                            {
                                echo $_SESSION['input_freguesia'];
                                unset($_SESSION['input_freguesia']);
                            } ?>"/>
                            <?php
                                if (isset($_SESSION['e_freguesia']))
                                {
                                    echo '<div class="error">'.$_SESSION['e_freguesia'].'</div>';
                                    unset($_SESSION['e_freguesia']);
                                }
                            ?>
                            <span class="focus-input100"></span>
                        </div>
                        <div class="wrap-input100">
                            <input class="input100" id="input-zona" name="zona" type="text" placeholder="Zona" value="<?php
                            if (isset($_SESSION['input_zona']))
                            {
                                echo $_SESSION['input_zona'];
                                unset($_SESSION['input_zona']);
                            } ?>"/>
                            <?php
                                if (isset($_SESSION['e_zona']))
                                {
                                    echo '<div class="error">'.$_SESSION['e_zona'].'</div>';
                                    unset($_SESSION['e_zona']);
                                }
                            ?>
                            <span class="focus-input100"></span>
                        </div>
                        <div class="wrap-input100">
                            <input class="input100"  id="input-rua" name="rua" type="text" placeholder="Rua" value="<?php
                            if (isset($_SESSION['input_rua']))
                            {
                                echo $_SESSION['input_rua'];
                                unset($_SESSION['input_rua']);
                            } ?>"/>
                            <?php
                                if (isset($_SESSION['e_rua']))
                                {
                                    echo '<div class="error">'.$_SESSION['e_rua'].'</div>';
                                    unset($_SESSION['e_rua']);
                                }
                            ?>
                            <span class="focus-input100"></span>
                        </div>
                        <div class="wrap-input100">
                            <input class="input100"  id="input-numero" name="numero" type="text" placeholder="Número" value="<?php
                            if (isset($_SESSION['input_numero']))
                            {
                                echo $_SESSION['input_numero'];
                                unset($_SESSION['input_numero']);
                            } ?>"/>
                            <?php
                                if (isset($_SESSION['e_numero']))
                                {
                                    echo '<div class="error">'.$_SESSION['e_numero'].'</div>';
                                    unset($_SESSION['e_numero']);
                                }
                            ?>
                            <span class="focus-input100"></span>
                        </div>
                        <div class="wrap-input100">
                            <input class="input100"  id="input-andar" name="andar" type="text" placeholder="Andar" value="<?php
                            if (isset($_SESSION['input_andar']))
                            {
                                echo $_SESSION['input_andar'];
                                unset($_SESSION['input_andar']);
                            } ?>"/>
                            <?php
                                if (isset($_SESSION['e_andar']))
                                {
                                    echo '<div class="error">'.$_SESSION['e_andar'].'</div>';
                                    unset($_SESSION['e_andar']);
                                }
                            ?>
                            <span class="focus-input100"></span>
                        </div>
                    </div>
                    <br>

                    <center><span class="subtitle2">Descrição do imóvel</span></center>
                    <br><br>
                    <div class="titulo">
                        <div class="wrap-input100">
                            <textarea class="input100" id="titulo" name="titulo" type="text" placeholder="Escreva aqui o título do anúncio" rows="10" value="<?php
                            if (isset($_SESSION['input_titulo']))
                            {
                                echo $_SESSION['input_titulo'];
                                unset($_SESSION['input_titulo']);
                            } ?>"></textarea><?php
                            if (isset($_SESSION['e_titulo']))
                            {
                                echo '<div class="error">'.$_SESSION['e_titulo'].'</div>';
                                unset($_SESSION['e_titulo']);
                            }
                            ?>
                            <span class="focus-input100"></span>
                        </div>
                    </div>
                    <br><br>
                    <div class="descricao">
                        <div class="wrap-input200">
                            <textarea class="input200" id="descricao" name="descricao" type="text" placeholder="Escreva aqui a descrição do anúncio" rows="100" value="<?php
                            if (isset($_SESSION['input_descricao']))
                            {
                                echo $_SESSION['input_descricao'];
                                unset($_SESSION['input_descricao']);
                            } ?>"></textarea><?php
                            if (isset($_SESSION['e_descricao']))
                            {
                                echo '<div class="error">'.$_SESSION['e_descricao'].'</div>';
                                unset($_SESSION['e_descricao']);
                            }
                            ?>
                            <span class="focus-input200"></span>
                        </div>
                    </div>
                    <br>
                    <center><span class="subtitle2">Características</span></center>
                    <br><br>
                    <div class="sibtitle2-choices">
                        <span class="focus-input100"></span>
                        <div class="wrap-input100">
                            <input class="input100" id="input-area-bruta" name="area-bruta" type="text" placeholder="Area Bruta" value="<?php
                            if (isset($_SESSION['input_area_bruta']))
                            {
                                echo $_SESSION['input_area_bruta'];
                                unset($_SESSION['input_area_bruta']);
                            } ?>"/>
                            <?php
                                if (isset($_SESSION['e_area_bruta']))
                                {
                                    echo '<div class="error">'.$_SESSION['e_area_bruta'].'</div>';
                                    unset($_SESSION['e_area_bruta']);
                                }
                            ?>
                            <span class="focus-input100"></span>
                        </div>
                        <div class="wrap-input100">
                            <input class="input100" id="input-area-util" name="area-util" type="text" placeholder="Area Útil" value="<?php
                            if (isset($_SESSION['input_area_util']))
                            {
                                echo $_SESSION['input_area_util'];
                                unset($_SESSION['input_area_util']);
                            } ?>"/>
                            <?php
                                if (isset($_SESSION['e_area_util']))
                                {
                                    echo '<div class="error">'.$_SESSION['e_area_util'].'</div>';
                                    unset($_SESSION['e_area_util']);
                                }
                            ?>
                            <span class="focus-input100"></span>
                        </div>
                        <div class="wrap-input100">
                            <input class="input100" id="input-ano-construcao" name="ano-construcao" type="text" placeholder="Ano de Construção" value="<?php
                            if (isset($_SESSION['input_ano_construcao']))
                            {
                                echo $_SESSION['input_ano_construcao'];
                                unset($_SESSION['input_ano_construcao']);
                            } ?>"/>
                            <?php
                                if (isset($_SESSION['e_ano_construcao']))
                                {
                                    echo '<div class="error">'.$_SESSION['e_ano_construcao'].'</div>';
                                    unset($_SESSION['e_ano_construcao']);
                                }
                            ?>
                            <span class="focus-input100"></span>
                        </div>
                        <div class="wrap-input100">
                            <input class="input100" id="input-Casas-banho" name="Casas-banho" type="text" placeholder="Casas de Banho" value="<?php
                            if (isset($_SESSION['input_casas_banho']))
                            {
                                echo $_SESSION['input_casas_banho'];
                                unset($_SESSION['input_casas_banho']);
                            } ?>"/>
                            <?php
                                if (isset($_SESSION['e_casas_banho']))
                                {
                                    echo '<div class="error">'.$_SESSION['e_casas_banho'].'</div>';
                                    unset($_SESSION['e_casas_banho']);
                                }
                            ?>
                            <span class="focus-input100"></span>
                        </div>
                        <div class="wrap-input100">
                            <input class="input100" id="input-numero-pisos" name="numero-pisos" type="text" placeholder="Número de Pisos" value="<?php
                            if (isset($_SESSION['input_numero_pisos']))
                            {
                                echo $_SESSION['input_numero_pisos'];
                                unset($_SESSION['input_numero_pisos']);
                            } ?>"/>
                            <?php
                                if (isset($_SESSION['e_numero_pisos']))
                                {
                                    echo '<div class="error">'.$_SESSION['e_numero_pisos'].'</div>';
                                    unset($_SESSION['e_numero_pisos']);
                                }
                            ?>
                            <span class="focus-input100"></span>
                        </div>
                    </div>
                    <br><br>

                    <div class="sibtitle2-choices">
                        <div class="wrap-input100">
                            <input class="input100" id="input-condominio" name="condominio" type="text" placeholder="Condomínio" value="<?php
                            if (isset($_SESSION['input_condominio']))
                            {
                                echo $_SESSION['input_condominio'];
                                unset($_SESSION['input_condominio']);
                            } ?>"/>
                            <?php
                                if (isset($_SESSION['e_condominio']))
                                {
                                    echo '<div class="error">'.$_SESSION['e_condominio'].'</div>';
                                    unset($_SESSION['e_condominio']);
                                }
                            ?>
                            <span class="focus-input100"></span>
                        </div>
                        <div class="wrap-input100">
                            <input class="input100" id="CE" name="CE" type="text" placeholder="CE" value="<?php
                            if (isset($_SESSION['input_CE']))
                            {
                                echo $_SESSION['input_CE'];
                                unset($_SESSION['input_CE']);
                            } ?>"/>
                            <?php
                                if (isset($_SESSION['e_CE']))
                                {
                                    echo '<div class="error">'.$_SESSION['e_CE'].'</div>';
                                    unset($_SESSION['e_CE']);
                                }
                            ?>
                            <span class="focus-input100"></span>
                        </div>   

                        <div class="wrap-input100">
                            <input class="input100" id="input-preco" name="preco" type="text" placeholder="Preço" value="<?php
                            if (isset($_SESSION['input_preco']))
                            {
                                echo $_SESSION['input_preco'];
                                unset($_SESSION['input_preco']);
                            } ?>"/>
                            <?php
                                if (isset($_SESSION['e_preco']))
                                {
                                    echo '<div class="error">'.$_SESSION['e_preco'].'</div>';
                                    unset($_SESSION['e_preco']);
                                }
                            ?>
                            <span class="focus-input100"></span>
                        </div>
                        <div class="wrap-input100">
                            <input class="input100" id="input-tipologia" name="tipologia" type="text" placeholder="Tipologia" value="<?php
                            if (isset($_SESSION['input_tipologia']))
                            {
                                echo $_SESSION['input_tipologia'];
                                unset($_SESSION['input_tipologia']);
                            } ?>"/>
                            <?php
                                if (isset($_SESSION['e_tipologia']))
                                {
                                    echo '<div class="error">'.$_SESSION['e_tipologia'].'</div>';
                                    unset($_SESSION['e_tipologia']);
                                }
                            ?>
                            <span class="focus-input100"></span>
                        </div>
                    </div>
                    <br><br>
                    <div class="inner-form">
                        <div class="input-field first-wrap">
                            <div class="input-select">
                                <select data-trigger="" name="choices-estado">
                                    <option value="Como Novo" placeholder="">Como Novo</option>
                                    <option value="Bom Estado">Bom Estado</option>
                                    <option value="Para Recuperar">Para Recuperar</option>
                                    <option value="Não Aplicável">Não Aplicável</option>
                                </select>
                            </div>
                        </div>
                        <div class="input-field first-wrap">
                            <div class="input-select">
                                <select data-trigger="" name="choices-negocio">
                                    <option value="Comprar" placeholder="">Vender</option>
                                    <option value="Arrendar">Arrendar</option>
                                </select>
                            </div>
                        </div>
                        <div class="input-field first-wrap">
                            <div class="input-select">
                                <select data-trigger="" name="choices-tipo">
                                    <option value="Apartamento" placeholder="">Apartamento</option>
                                    <option value="Moradia">Moradia</option>
                                    <option value="Terrenos">Terrenos</option>
                                </select>
                            </div>
                        </div>
                        
                       
                    </div>
                    <br><br><br><br><br><br>

                    <center><span class="subtitle2">Insira fotografias do imóvel</span></center>
                    <br><br><br>

                    <div class="upload-zone">	
                        <div class="upload-single">				
                            <input type="file" name="fileImg1" class="file_input"/>
                        </div>
                        <br>
                        <div class="upload-single">				
                            <input type="file" name="fileImg2" class="file_input"/>
                        </div>
                        <br>
                        <div class="upload-single">				
                            <input type="file" name="fileImg3" class="file_input"/>
                        </div>
                        <br>
                        <div class="upload-single">				
                            <input type="file" name="fileImg4" class="file_input"/>
                        </div>
                        <br>
                        <div class="upload-single">				
                            <input type="file" name="fileImg5" class="file_input"/>
                        </div>
                    </div>
                    
                </div>
                <div class="container-login100-form-btn">
                    <button type="submit">Submeter</button>
                </div>
            </form>
        </main>
        <footer>

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