<?php
    function console_log( $data ){
	echo '<script>';
	echo 'console.log('. json_encode( $data ) .')';
	echo '</script>';
	}
	session_start();
	
    if (!isset($_SESSION['logged']))
    {
        header('Location: catalogo.php');
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

    $negocio = $_POST['choices-negocio'];

    if (strcmp($negocio,'Comprar') == 0){
        $other_negocio = 'Arrendar';
        $_SESSION['negocio'] = $negocio;
        $_SESSION['other_negocio'] = $other_negocio;
    }
    elseif(strcmp($negocio,'Arrendar') == 0){
        $other_negocio = 'Comprar';
        $_SESSION['negocio'] = $negocio;
        $_SESSION['other_negocio'] = $other_negocio;
    }
        
    $negocio = $_SESSION['negocio'];
    $sql = "SELECT * FROM imoveis_a WHERE a_tipo_de_negocio = '$negocio' AND a_disponivel = true AND a_aprovacao = true " ;

    if (isset($_POST['search-field'])){
        $search_field = ucwords($_POST['search-field']);
        $sql .= "AND (distrito LIKE '%$search_field%' OR concelho LIKE '%$search_field%' OR freguesia LIKE '%$search_field%' OR zona LIKE '%$search_field%') ";
    }

    console_log( $sql );
    $result = $connection->query($sql);
    if (!$result) throw new Exception($connection->error);//pesquisa que vem do index
    $num_of_results = mysqli_num_rows($result);
        
    
    if (isset($_POST["choices-negocio-small"])){
        $negocio = $_POST['choices-negocio-small'];
        if (strcmp($negocio,'Comprar') == 0){
            $other_negocio = 'Arrendar';
            $_SESSION['negocio'] = $negocio;
            $_SESSION['other_negocio'] = $other_negocio;
        }
        elseif(strcmp($negocio,'Arrendar') == 0){
            $other_negocio = 'Comprar';
            $_SESSION['negocio'] = $negocio;
            $_SESSION['other_negocio'] = $other_negocio;
        }
            
         $sql = "SELECT * FROM imoveis_a WHERE a_tipo_de_negocio = '$negocio' AND a_disponivel = true AND a_aprovacao = true " ;

        
        if (isset($_POST['search-field-small'])){
            $search_field = ucwords($_POST['search-field-small']);
            $sql .= "AND (distrito LIKE '%$search_field%' OR concelho LIKE '%$search_field%' OR freguesia LIKE '%$search_field%' OR zona LIKE '%$search_field%') ";
        }

        $preco_min = ($_POST['minpreco']);
        $preco_max = ($_POST['maxpreco']);
        if (strcmp($preco_max,'limitless')  == 0){
            $sql_small = "SELECT max(preco) as max_preco FROM imoveis_a;";
            console_log( $sql_small );
            $result = $connection->query($sql_small);
            $rows = mysqli_fetch_assoc($result);
            $preco_max = $rows['max_preco']+1;
            if (!$result) throw new Exception($connection->error);
        }
        $sql .= "AND (preco BETWEEN '$preco_min' AND '$preco_max') ";

        $area_bruta_min = $_POST['min-Area-bruta'];
        $area_bruta_max = $_POST['max-Area-bruta'];
        if (strcmp($area_bruta_max,'limitless') == 0){
            $sql_small = " SELECT max(area_bruta) as area_bruta FROM `imoveis_a`;";
            console_log( $sql_small );
            $result = $connection->query($sql_small);
            $rows = mysqli_fetch_assoc($result);
            $area_bruta_max = $rows['area_bruta'] +1;
            if (!$result) throw new Exception($connection->error);
        }
        $sql .= "AND (area_bruta BETWEEN '$area_bruta_min' AND '$area_bruta_max') ";

        $area_util_min = $_POST['min_Area_util'];
        $area_util_max = $_POST['max_Area_util'];
        if (strcmp($area_util_max,'limitless') == 0){
            $sql_small = " SELECT max(area_util) as area_util FROM `imoveis_a`;";
            console_log( $sql_small );
            $result = $connection->query($sql_small);
            $rows = mysqli_fetch_assoc($result);
            $area_util_max = $rows['area_util'] +1;
            if (!$result) throw new Exception($connection->error);
        }
        $sql .= "AND (area_util BETWEEN '$area_util_min' AND '$area_util_max') ";

        if (isset($_POST['Apartamento']) && strcmp($_POST['Apartamento'],'Apartamento') == 0) 
        {
            $sql .= "AND (tipo = 'Apartamento') ";
        }
        if (isset($_POST['Moradia']) && strcmp($_POST['Moradia'],'Moradia') == 0) 
        {
            $sql .= "AND (tipo = 'Moradia') ";
        }
        if (isset($_POST['Terrenos']) && strcmp($_POST['Terrenos'],'Terrenos') == 0) 
        {
            $sql .= "AND (tipo = 'Terrenos') ";
        }

        if (isset($_POST['T0']) && strcmp($_POST['T0'],'T0') == 0) 
        {
            $sql .= "AND (tipologia = 0) ";
        }
        if (isset($_POST['T1']) && strcmp($_POST['T1'],'T1') == 0) 
        {
            $sql .= "AND (tipologia = 1) ";
        }
        if (isset($_POST['T2']) && strcmp($_POST['T2'],'T2') == 0) 
        {
            $sql .= "AND (tipologia = 2) ";
        }
        if (isset($_POST['T3']) && strcmp($_POST['T3'],'T3') == 0) 
        {
            $sql .= "AND (tipologia = 3) ";
        }
        if (isset($_POST['T4']) && strcmp($_POST['T4'],'T4') == 0) 
        {
            $sql .= "AND (tipologia >= 4) ";
        }

        if (isset($_POST['1']) && strcmp($_POST['1'],'1') == 0) 
        {
            $sql .= "AND (ncasas_de_banho = 1) ";
        }
        if (isset($_POST['2']) && strcmp($_POST['2'],'2') == 0) 
        {
            $sql .= "AND (ncasas_de_banho = 2) ";
        }
        if (isset($_POST['3']) && strcmp($_POST['3'],'3') == 0) 
        {
            $sql .= "AND (ncasas_de_banho >= 3) ";
        }

        if (isset($_POST['ComoNovo']) && strcmp($_POST['ComoNovo'],'Como Novo') == 0)
        {
            $sql .= "AND (a_estado_conservacao = 'Como Novo') ";
        }
        if (isset($_POST['BomEstado']) && strcmp($_POST['BomEstado'],'Bom Estado') == 0) 
        {
            $sql .= "AND (a_estado_conservacao = 'Bom Estado') ";
        }
        if (isset($_POST['ParaRecuperar']) && strcmp($_POST['ParaRecuperar'],'Para Recuperar') == 0) 
        {
            $sql .= "AND (a_estado_conservacao = 'Para Recuperar') ";
        }
        if (isset($_POST['NãoAplicável']) && strcmp($_POST['NãoAplicável'],'Não Aplicável') == 0) 
        {
            $sql .= "AND (a_estado_conservacao = 'Não Aplicável') ";
        }
 
        $sql .= "AND a_disponivel = true;";
        console_log( $sql );
        $result = $connection->query($sql);
        if (!$result) throw new Exception($connection->error); // pesquisa da sidenav
        $num_of_results = mysqli_num_rows($result); 
    }
   
    $connection->close();

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
        <link href="css/catalogo_logado.css" rel="stylesheet" />
        <script src="js/showInfo.js"></script>
    </head>
<body>

    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="sidenav-content">
            <form action="catalogo_logado.php" method="post">
                <select data-trigger="" name="choices-negocio-small" class="choices-negocio-small">
                    <option value="<?php echo $_SESSION['negocio']?>" placeholder=""><?php echo $_SESSION['negocio'] ?></option>
                    <option value="<?php echo $_SESSION['other_negocio'] ?>" ><?php echo $_SESSION['other_negocio'] ?></option>
                </select>
                <input type="text" class="search-field-small" name="search-field-small" placeholder="distrito, concelho, freguesia ou zona" value="<?php echo $search_field ?>"> 
                <br><br>
                <span class="title">
                <center>Filtre a sua pesquisa</center><br>
                </span>
                <p></p>
                <div class="Preco">
                    <span class="Preco-title" >
                    <b>Preço</b> <br>
                    </span>
                    <div class="preco-input">
                        <select data-trigger="" name="minpreco">
                            <option value="0" placeholder="">MIN</option>
                            <option value="60000" >60.000</option>
                            <option value="100000" >100.000</option>
                            <option value="120000" >120.000</option>
                            <option value="140000" >140.000</option>
                            <option value="150000" >150.000</option>
                            <option value="160000" >160.000</option>
                            <option value="180000" >180.000</option>
                            <option value="200000" >200.000</option>
                            <option value="220000" >220.000</option>
                            <option value="240000" >240.000</option>
                            <option value="260000" >260.000</option>
                            <option value="280000" >280.000</option>
                            <option value="300000" >300.000</option>
                            <option value="320000" >320.000</option>
                            <option value="340000" >340.000</option>
                            <option value="360000" >360.000</option>
                            <option value="380000" >380.000</option>
                            <option value="400000" >400.000</option>
                            <option value="450000" >450.000</option>
                            <option value="500000" >500.000</option>
                            <option value="550000" >550.000</option>
                            <option value="600000" >600.000</option>
                            <option value="650000" >650.000</option>
                            <option value="700000" >700.000</option>
                            <option value="750000" >750.000</option>
                            <option value="800000" >800.000</option>
                            <option value="850000" >850.000</option>
                            <option value="900000" >900.000</option>
                            <option value="950000" >950.000</option>
                            <option value="1000000" >1 milhão</option>
                            <option value="1100000" >1,1 milhão</option>
                            <option value="1200000" >1,2 milhão</option>
                            <option value="1300000" >1,3 milhão</option>
                            <option value="1400000" >1,4 milhão</option>
                            <option value="1500000" >1,5 milhão</option>
                            <option value="1600000" >1,6 milhão</option>
                            <option value="1700000" >1,7 milhão</option>
                            <option value="1800000" >1,8 milhão</option>
                            <option value="1900000" >1,9 milhão</option>
                            <option value="2000000" >2 milhões</option>
                            <option value="2100000" >2,1 milhões</option>
                            <option value="2200000" >2,2 milhões</option>
                            <option value="2300000" >2,3 milhões</option>
                            <option value="2400000" >2,4 milhões</option>
                            <option value="2500000" >2,5 milhões</option>
                            <option value="2600000" >2,6 milhões</option>
                            <option value="2700000" >2,7 milhões</option>
                            <option value="2800000" >2,8 milhões</option>
                            <option value="2900000" >2,9 milhões</option>
                            <option value="3000000" >3 milhões</option>
                            <option value="0" >Sem Limite</option>
                        </select>
                        <select data-trigger="" name="maxpreco">
                            <option value="limitless" placeholder="">MAX</option>
                            <option value="60000" >60.000</option>
                            <option value="100000" >100.000</option>
                            <option value="120000" >120.000</option>
                            <option value="140000" >140.000</option>
                            <option value="150000" >150.000</option>
                            <option value="160000" >160.000</option>
                            <option value="180000" >180.000</option>
                            <option value="200000" >200.000</option>
                            <option value="220000" >220.000</option>
                            <option value="240000" >240.000</option>
                            <option value="260000" >260.000</option>
                            <option value="280000" >280.000</option>
                            <option value="300000" >300.000</option>
                            <option value="320000" >320.000</option>
                            <option value="340000" >340.000</option>
                            <option value="360000" >360.000</option>
                            <option value="380000" >380.000</option>
                            <option value="400000" >400.000</option>
                            <option value="450000" >450.000</option>
                            <option value="500000" >500.000</option>
                            <option value="550000" >550.000</option>
                            <option value="600000" >600.000</option>
                            <option value="650000" >650.000</option>
                            <option value="700000" >700.000</option>
                            <option value="750000" >750.000</option>
                            <option value="800000" >800.000</option>
                            <option value="850000" >850.000</option>
                            <option value="900000" >900.000</option>
                            <option value="950000" >950.000</option>
                            <option value="1000000" >1 milhão</option>
                            <option value="1100000" >1,1 milhão</option>
                            <option value="1200000" >1,2 milhão</option>
                            <option value="1300000" >1,3 milhão</option>
                            <option value="1400000" >1,4 milhão</option>
                            <option value="1500000" >1,5 milhão</option>
                            <option value="1600000" >1,6 milhão</option>
                            <option value="1700000" >1,7 milhão</option>
                            <option value="1800000" >1,8 milhão</option>
                            <option value="1900000" >1,9 milhão</option>
                            <option value="2000000" >2 milhões</option>
                            <option value="2100000" >2,1 milhões</option>
                            <option value="2200000" >2,2 milhões</option>
                            <option value="2300000" >2,3 milhões</option>
                            <option value="2400000" >2,4 milhões</option>
                            <option value="2500000" >2,5 milhões</option>
                            <option value="2600000" >2,6 milhões</option>
                            <option value="2700000" >2,7 milhões</option>
                            <option value="2800000" >2,8 milhões</option>
                            <option value="2900000" >2,9 milhões</option>
                            <option value="3000000" >3 milhões</option>
                            <option value="limitless" >Sem Limite</option>
                        </select>
                    </div>
                    <br><br>
                </div>

                <div class="Area-bruta">
                    <span class="Area-bruta-title" >
                        <b>Area Bruta</b> <br>
                    </span>
                    <div class="Area-bruta-input">
                        <select data-trigger="" name="min-Area-bruta">
                            <option value="0" placeholder="">MIN</option>
                            <option value="40" placeholder="">40 m²</option>
                            <option value="60" placeholder="">60 m²</option>
                            <option value="80" placeholder="">80 m²</option>
                            <option value="100" placeholder="">100 m²</option>
                            <option value="120" placeholder="">120 m²</option>
                            <option value="140" placeholder="">140 m²</option>
                            <option value="160" placeholder="">160 m²</option>
                            <option value="180" placeholder="">180 m²</option>
                            <option value="200" placeholder="">200 m²</option>
                            <option value="250" placeholder="">250 m²</option>
                            <option value="300" placeholder="">300 m²</option>
                            <option value="350" placeholder="">350 m²</option>
                            <option value="400" placeholder="">400 m²</option>
                            <option value="450" placeholder="">450 m²</option>
                            <option value="500" placeholder="">500 m²</option>
                            <option value="600" placeholder="">600 m²</option>
                            <option value="700" placeholder="">700 m²</option>
                            <option value="800" placeholder="">800 m²</option>
                            <option value="900" placeholder="">900 m²</option>
                            <option value="0" >Sem Limite</option>
                        </select>
                        <select data-trigger="" name="max-Area-bruta">
                            <option value="limitless" placeholder="">MAX</option>
                            <option value="40" placeholder="">40 m²</option>
                            <option value="60" placeholder="">60 m²</option>
                            <option value="80" placeholder="">80 m²</option>
                            <option value="100" placeholder="">100 m²</option>
                            <option value="120" placeholder="">120 m²</option>
                            <option value="140" placeholder="">140 m²</option>
                            <option value="160" placeholder="">160 m²</option>
                            <option value="180" placeholder="">180 m²</option>
                            <option value="200" placeholder="">200 m²</option>
                            <option value="250" placeholder="">250 m²</option>
                            <option value="300" placeholder="">300 m²</option>
                            <option value="350" placeholder="">350 m²</option>
                            <option value="400" placeholder="">400 m²</option>
                            <option value="450" placeholder="">450 m²</option>
                            <option value="500" placeholder="">500 m²</option>
                            <option value="600" placeholder="">600 m²</option>
                            <option value="700" placeholder="">700 m²</option>
                            <option value="800" placeholder="">800 m²</option>
                            <option value="900" placeholder="">900 m²</option>
                            <option value="limitless" >Sem Limite</option>
                        </select>
                    </div>
                    <br><br>
                </div>

                <div class="Area-util">
                    <span class="Area-util-title" >
                       <b>Area Útil</b> <br>
                    </span>
                    <div class="Area-util-input">
                        <select data-trigger="" name="min_Area_util">
                            <option value="0" placeholder="">MIN</option>
                            <option value="40" placeholder="">40 m²</option>
                            <option value="60" placeholder="">60 m²</option>
                            <option value="80" placeholder="">80 m²</option>
                            <option value="100" placeholder="">100 m²</option>
                            <option value="120" placeholder="">120 m²</option>
                            <option value="140" placeholder="">140 m²</option>
                            <option value="160" placeholder="">160 m²</option>
                            <option value="180" placeholder="">180 m²</option>
                            <option value="200" placeholder="">200 m²</option>
                            <option value="250" placeholder="">250 m²</option>
                            <option value="300" placeholder="">300 m²</option>
                            <option value="350" placeholder="">350 m²</option>
                            <option value="400" placeholder="">400 m²</option>
                            <option value="450" placeholder="">450 m²</option>
                            <option value="500" placeholder="">500 m²</option>
                            <option value="600" placeholder="">600 m²</option>
                            <option value="700" placeholder="">700 m²</option>
                            <option value="800" placeholder="">800 m²</option>
                            <option value="900" placeholder="">900 m²</option>
                            <option value="0" >Sem Limite</option>
                        </select>
                        <select data-trigger="" name="max_Area_util">
                            <option value="limitless" placeholder="">MAX</option>
                            <option value="40" placeholder="">40 m²</option>
                            <option value="60" placeholder="">60 m²</option>
                            <option value="80" placeholder="">80 m²</option>
                            <option value="100" placeholder="">100 m²</option>
                            <option value="120" placeholder="">120 m²</option>
                            <option value="140" placeholder="">140 m²</option>
                            <option value="160" placeholder="">160 m²</option>
                            <option value="180" placeholder="">180 m²</option>
                            <option value="200" placeholder="">200 m²</option>
                            <option value="250" placeholder="">250 m²</option>
                            <option value="300" placeholder="">300 m²</option>
                            <option value="350" placeholder="">350 m²</option>
                            <option value="400" placeholder="">400 m²</option>
                            <option value="450" placeholder="">450 m²</option>
                            <option value="500" placeholder="">500 m²</option>
                            <option value="600" placeholder="">600 m²</option>
                            <option value="700" placeholder="">700 m²</option>
                            <option value="800" placeholder="">800 m²</option>
                            <option value="900" placeholder="">900 m²</option>
                            <option value="limitless" >Sem Limite</option>
                        </select>
                    </div>
                    <br><br>
                </div>

                <div class="Tipo-de-Casa">
                    <span class="Tipo-de-Casa-title" >
                        <p>Tipo de Casa</p>
                    </span>
                    <input type="checkbox" id="Apartamento" name="Apartamento" value="Apartamento">
                    <label for="Apartamento"> Apartamento</label><br>
                    <input type="checkbox" id="Moradia" name="Moradia" value="Moradia">
                    <label for="Moradia"> Moradia</label><br>
                    <input type="checkbox" id="Terrenos" name="Terrenos" value="Terrenos">
                    <label for="Terrenos"> Terrenos</label><br><br><br>
                </div>

                <div class="Tipologia">
                    <span class="Tipologia-title" >
                        <p>Quartos</p>
                    </span>
                    <input type="checkbox" id="T0" name="T0" value="T0">
                    <label for="T0">T0</label><br>
                    <input type="checkbox" id="T1" name="T1" value="T1">
                    <label for="T1">T1</label><br>
                    <input type="checkbox" id="T2" name="T2" value="T2">
                    <label for="T2">T2</label><br>
                    <input type="checkbox" id="T3" name="T3" value="T3">
                    <label for="T3"> T3</label><br>
                    <input type="checkbox" id="T4" name="T4" value="T4">
                    <label for="T4"> T4 ou +</label><br><br>
                </div>

                <div class="Casas-banho">
                    <span class="Casas-banho-title" >
                        <p>Casas de Banho</p>
                    </span>
                    <input type="checkbox" id="1" name="1" value="1">
                    <label for="1">1</label><br>
                    <input type="checkbox" id="2" name="2" value="2">
                    <label for="2">2</label><br>
                    <input type="checkbox" id="3" name="3" value="3">
                    <label for="3">3 ou +</label><br><br>
                </div>

                <div class="Estado">
                    <span class="Estado-title" >
                        <p>Estado</p>
                    </span>
                    <input type="checkbox" id="Como Novo" name="ComoNovo" value="Como Novo">
                    <label for="Como Novo">Como Novo</label><br>
                    <input type="checkbox" id="Bom Estado" name="BomEstado" value="Bom Estado">
                    <label for="Bom Estado">Bom Estado</label><br>
                    <input type="checkbox" id="Para Recuperar" name="ParaRecuperar" value="Para Recuperar">
                    <label for="Para Recuperar">Para Recuperar</label><br>
                    <input type="checkbox" id="Não Aplicável" name="NãoAplicável" value="Não Aplicável">
                    <label for="Não Aplicável">Não Aplicável</label><br><br>
                </div>
                <div class="container-login100-form-btn">
                    <button type="submit" value="search" name="search">
                        Pesquisar
                    </button>
                </div>
                <br><br><br><br>
            </form>
        </div>
    </div>

    <div id="main" class="main">
        <nav>
            <div class="navbar-start-wrap">
                <span style="font-size:30px;cursor:pointer"  onclick="openNav()">&#9776;</span>
            <div class="username-nav">
                <b><?php echo $_SESSION['user_name']." ".$_SESSION['user_surname'] ?></b><br>
                <?php echo$_SESSION['user_cargo']?>
            </div>
            </div> 
            <div class="end-wrap">
                <img src="images/house-black-silhouette-without-door.svg" alt="home_icon"  width="25" height="auto" onclick="window.location.href ='cliente_main_page.php'"/>
                <a href="logout.php">Terminar Sessão</a>
            </div>
        </nav>

        <main>
            <br><br>
            <?php
                $remainder = fmod($num_of_results, 3);
                if($num_of_results>0){

                    echo '<center><center><br><br>
                        <table id="imoveisTable" BORDER=0 WIDTH="80%" CELLSPACING="10" ALIGN="center">
                            <tr></tr>';

                    for ($i = 1; $i <= $num_of_results; $i = $i+3){
                                        
                        $row1 = mysqli_fetch_assoc($result);
                        $row2 = mysqli_fetch_assoc($result);
                        $row3 = mysqli_fetch_assoc($result);

                        $referencia1 = $row1['referencia'];
                        $img1 = $row1['a_imagem1'];
                        $titulo1 = $row1['titulo_do_anuncio'];
                        $preco1 = $row1['preco'];
                        $tipologia1 = $row1['tipologia'];
                        $area1 = $row1['area_util'];

                        $tipologia1 .= " quartos e ";
                        $area1 .=" m²"; 
                        
                        $referencia2 = $row2['referencia'];
                        $img2 = $row2['a_imagem1'];
                        $titulo2 = $row2['titulo_do_anuncio'];
                        $preco2 = $row2['preco'];
                        $tipologia2 = $row2['tipologia'];
                        $area2 = $row2['area_util'];

                        $tipologia2 .= " quartos e ";
                        $area2 .= " m²"; 

                        $referencia3 = $row3['referencia'];
                        $img3 = $row3['a_imagem1'];
                        $titulo3 = $row3['titulo_do_anuncio'];
                        $preco3 = $row3['preco'];
                        $tipologia3 = $row3['tipologia'];
                        $area3 = $row3['area_util'];

                        $tipologia3 .= " quartos e ";
                        $area3 .= " m²"; 

                        if ($i+3>$num_of_results+1){
                            break;
                        }

                        echo
                        '<tr>
                        <td style="display:none;" width="2%">'.$referencia1.'</td> 
                        <td><img clss="profile-picture" src="'.$img1.'" alt=""  width="200" height="auto" /><br>
                        '.$titulo1.'<br>'.$preco1." €".'<br>'.$tipologia1.$area1.'<br>
                        <input type="button" value="ver" onclick="showInfo11(this)"></td>
                        
                        <td style="display:none;" width="2%">'.$referencia2.'</td> 
                        <td><img clss="profile-picture" src="'.$img2.'" alt=""  width="200" height="auto" /><br>
                        '.$titulo2.'<br>'.$preco2." €".'<br>'.$tipologia2.$area2.'<br>
                        <input type="button" value="ver" onclick="showInfo22(this)"></td>
                        
                        <td style="display:none;" width="2%">'.$referencia3.'</td> 
                        <td><img clss="profile-picture" src="'.$img3.'" alt=""  width="200" height="auto" /><br>
                        '.$titulo3.'<br>'.$preco3." €".'<br>'.$tipologia3.$area3.'<br>
                        <input type="button" value="ver" onclick="showInfo33(this)"></td>
                        </tr>'; 
     
                    }
                    echo '</table>';  
                    if ($remainder == 1){
                        echo '<center><center><br><br>
                        <table id="imoveisTable2" BORDER=0 WIDTH="80%" CELLSPACING="10" ALIGN="center">
                            <tr></tr>';

                            $referencia1 = $row1['referencia'];
                            $img1 = $row1['a_imagem1'];
                            $titulo1 = $row1['titulo_do_anuncio'];
                            $preco1 = $row1['preco'];
                            $tipologia1 = $row1['tipologia'];
                            $area1 = $row1['area_util'];

                            $tipologia1 .= " quartos e ";
                            $area1 .=" m²"; 

                            echo
                            '<tr>
                            <td style="display:none;" width="2%">'.$referencia1.'</td> 
                            <td><img clss="profile-picture" src="'.$img1.'" alt=""  width="200" height="auto" /><br>
                            '.$titulo1.'<br>'.$preco1." €".'<br>'.$tipologia1.$area1.'<br>
                            <input type="button" value="ver" onclick="showInfo11rem(this)"></td>
                            </tr>'; 
        
                        echo '</table>';  

                    }
                    elseif ($remainder == 2){
                        echo '<center><center><br><br>
                        <table id="imoveisTable2" BORDER=0 WIDTH="50%" CELLSPACING="10" ALIGN="center"><style>#imoveisTable2{margin-right:30%;}</style>
                            <tr></tr>';

                            $referencia1 = $row1['referencia'];
                            $img1 = $row1['a_imagem1'];
                            $titulo1 = $row1['titulo_do_anuncio'];
                            $preco1 = $row1['preco'];
                            $tipologia1 = $row1['tipologia'];
                            $area1 = $row1['area_util'];

                            $tipologia1 .= " quartos e ";
                            $area1 .=" m²"; 

                            $referencia2 = $row2['referencia'];
                            $img2 = $row2['a_imagem1'];
                            $titulo2 = $row2['titulo_do_anuncio'];
                            $preco2 = $row2['preco'];
                            $tipologia2 = $row2['tipologia'];
                            $area2 = $row2['area_util'];

                            $tipologia2 .= " quartos e ";
                            $area2 .= " m²"; 

                            echo
                            '<tr>
                            <td style="display:none;" width="2%">'.$referencia1.'</td> 
                            <td><img clss="profile-picture" src="'.$img1.'" alt=""  width="200" height="auto" /><br>
                            '.$titulo1.'<br>'.$preco1." €".'<br>'.$tipologia1.$area1.'<br>
                            <input type="button" value="ver" onclick="showInfo11rem(this)"></td>

                            <td style="display:none;" width="2%">'.$referencia2.'</td> 
                            <td><img clss="profile-picture" src="'.$img2.'" alt=""  width="200" height="auto" /><br>
                            '.$titulo2.'<br>'.$preco2." €".'<br>'.$tipologia2.$area2.'<br>
                            <input type="button" value="ver" onclick="showInfo22rem(this)"></td>
                            </tr>'; 
        
                        echo '</table>';  

                    }
                }
                else
                {    
                    echo "Pesquisámos por todo o lado...
                    mas não encontrámos o que procuras :-(";
                }
            ?>
        </main>
        
       
    </div>

    <script>
    function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
    }

    function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
    }
    </script>
    
</body>
</html> 