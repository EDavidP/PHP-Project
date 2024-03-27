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

            if (strcmp($_POST['visita'],'visita') == 0){

                //validation flag
                $flag_everything_OK = true;
                
                //ver se já não uma visita deste cliente
                $cliente_id = $_SESSION['user_id'];
                $consultor_id = $_SESSION['consultor_id'];
                $referencia = $_SESSION['referancia_imovel'];

                $sql = "SELECT * FROM visita WHERE cliente_utilizador_id ='$cliente_id' AND imoveis_referencia='$referencia'; ";
                console_log( $sql );       
                $result = $connection->query($sql);       
                 
                if (!$result) throw new Exception($connection->error);
                
                $count_visitas = $result->num_rows;
                if($count_visitas > 0)
                {
                    $flag_everything_OK = false;
                    $_SESSION['e_visita'] = "Já tem uma vista agendada para este imóvel!";
                }	

                if ($flag_everything_OK == true)
				{
                    //Add to database
                    
                    $sql ="INSERT INTO visita VALUES(SYSDATE(),DATE_ADD(NOW(), INTERVAL 7 DAY),'$cliente_id','$referencia','$cliente_id');";
                    console_log( $sql );
                    if ($connection->query($sql)){	
                        $result = $connection->query($sql);

                        // check se o consultor e o cliente já estão emparelhados
                        $sql = "SELECT * FROM consultor_cliente WHERE cliente_utilizador_id ='$cliente_id' AND consultor_utilizador_id='$consultor_id';";
                        console_log( $sql );       
                        $result = $connection->query($sql);       
                        
                        if (!$result) throw new Exception($connection->error);

                        $count_pair = $result->num_rows;
                        if($count_pair > 0)
                        {
                            $flag_everything_OK = false;
                            header('Location: catalogo_logado.php');
                        }else{	

                            $sql = "INSERT INTO consultor_cliente VALUES('$consultor_id','$cliente_id')";
                            console_log( $sql );
                            if ($connection->query($sql)){
                                $result = $connection->query($sql);

                                header('Location: catalogo_logado.php');
                            }
                            else
                            {
                                throw new Exception($connection->error);
                                header('Location: catalogo_logado.php');	
                            }
                        }
                    }
                    else
                    {
                        throw new Exception($connection->error);
                        header('Location: catalogo_logado.php');	
                    }
                }
                header('Location: detalhes_imovel_logado.php?referencia='.$referencia);
                $connection->close(); 
            }

            if (isset($_POST["proposta"]) == "proposta"){

                //validation flag
                $flag_everything_OK = true;
                
                //ver se já não uma proposta deste cliente
                $cliente_id =$_SESSION['user_id'];
                $consultor_id = $_SESSION['consultor_id'];
                $referencia = $_SESSION['referancia_imovel'];

                $sql = "SELECT * FROM propostas WHERE cliente_utilizador_id ='$cliente_id' AND imoveis_referencia='$referencia'; ";
                console_log( $sql );       
                $result = $connection->query($sql);       
                
                if (!$result) throw new Exception($connection->error);
                
                $count_propostas = $result->num_rows;
                if($count_propostas > 0)
                {
                    $flag_everything_OK = false;
                    $_SESSION['e_propostas'] = "Já tem uma proposta para este imóvel!";
                }	

                if ($flag_everything_OK == true)
				{
                    //Add to database
                    
                    $sql ="INSERT INTO propostas VALUES(SYSDATE(),FALSE,'$cliente_id','$referencia','$cliente_id');";
                    console_log( $sql );
                    if ($connection->query($sql)){	
                        $result = $connection->query($sql);
                        
                        // check se o consultor e o cliente já estão emparelhados
                        $sql = "SELECT * FROM consultor_cliente WHERE cliente_utilizador_id ='$cliente_id' AND consultor_utilizador_id='$consultor_id';";
                        console_log( $sql );       
                        $result = $connection->query($sql);       
                        
                        if (!$result) throw new Exception($connection->error);

                        $count_pair = $result->num_rows;
                        if($count_pair > 0)
                        {
                            $flag_everything_OK = false;
                            header('Location: catalogo_logado.php');
                        }else{	
                            

                                $sql = "INSERT INTO consultor_cliente VALUES('$consultor_id','$cliente_id')";
                                console_log( $sql );
                                if ($connection->query($sql)){
                                    $result = $connection->query($sql);

                                    header('Location: catalogo_logado.php');
                                }
                                else
                                {
                                    throw new Exception($connection->error);
                                    header('Location: catalogo_logado.php');	
                                }
                            
                        }
                    }
                    else
                    {
                        throw new Exception($connection->error);
                        header('Location: catalogo_logado.php');	
                    }
                }
                header('Location: detalhes_imovel_logado.php?referencia='.$referencia);
                $connection->close();
            }

        }
    }catch(Exception $e)
    {
        echo '<span style="color:red;">Server error! Try later</span>';
        echo '<br />Developer info: '.$e;
    }
    



?>