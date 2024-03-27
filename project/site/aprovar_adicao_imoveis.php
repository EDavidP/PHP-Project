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
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
    
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <script src="js/aprovarImovel.js"></script>
    <style>
        table, th, td {
            border: 2px solid black;
            border-collapse: collapse;
            }

            th, td {
            padding: 5px;
            }

            th, td {
            text-align: left;
            }
    </style>
</head>

<body>
	
	<center><a href="admin_main_page.php" >Início</a></center>
	<br><br/>

<?php
	
    require_once "connect.php";
        
    $connection = @new mysqli($host, $db_user, $db_password, $db_name, $port);
    if ($connection->connect_errno != 0){
        throw new Exception(mysqli_connect_errno());
    }        
    $sql = "SELECT * FROM imoveis_a WHERE a_aprovacao = false AND a_disponivel = true";
    console_log( $sql );
    $result = $connection->query($sql);
    
    $num_of_results = mysqli_num_rows($result);        
        
	if($num_of_results>0)	{
                
        echo '<h2><b>Aprovar Adição</b></h2>
            <table id="aprovacaoTable" style="width:75%">
                <tr>
                    <th style="display:none;">referencia</th>      
                    <th>Titulo</th>
                    <th>Concelho</th>
                    <th>Freguesia</th>
                    <th>Zona</th>
                    <th>Rua</th>
                    <th>Aprovar</th>
                </tr>';

        for ($i = 1; $i <= $num_of_results; $i++) {

              $row = mysqli_fetch_assoc($result);

		      $referencia = $row['referencia'];
              $titulo_do_anuncio = $row['titulo_do_anuncio'];
              $concelho = $row['concelho'];
              $freguesia = $row['freguesia'];
              $zona = $row['zona'];
              $rua = $row['rua'];
							
            echo							
            '<tr>
            <td style="display:none;">'.$referencia.'</td>
            <td>'.$titulo_do_anuncio.'</td>
            <td>'.$concelho.'</td>
            <td>'.$freguesia.'</td>
            <td>'.$zona.'</td>
            <td>'.$rua.'</td>
            <td><input type="button" value="Aprova" onclick="aprova(this)"></td>     
            </tr>'; 
        }
      echo '</table>';    
    }
    else{     
        echo "Não há imoveis para aprovar";
    }
       
?>

 </body>  
	
</html>   