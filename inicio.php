<?php
    include('conn.php')
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Pesquisa de CEP</title>
</head>

<body>


<section class="main">
    <div class="flex-box space">
    <div id="imagem" classe="imagem">
            <img src="img/mapa.png" alt="">
        </div>
        <!--Form para o cep-->
        <form action="data/salvar.php" method="post" id="formulario">
            <div class="conjunto-inicio">
                <h1>Encontre um Endereço</h1>
                <div class="barrinha"></div>
                <div class="cep-inicio">
                    <input type="text" name="cep" id="cep" placeholder="CEP" class="input-cep">
                </div>
                <div class="d-grid gap-2 col-6">
                    <input type="submit" name="banco" id="banco" value="Pesquisar" formaction="" class="btn-banco">
                </div>
            </div>
            <?php
                if (isset($_POST['banco'])) {
                    $cep = $_POST['cep'];
                        if (!empty($cep) && !preg_match('/^[0-9]{8}$/', $cep) == false) {
                            $query = "SELECT `id_enderecos`, `cep`, `rua`, `bairro`, `cidade`, `uf`, `ddd` FROM `lista_enderecos` WHERE `cep`= '$cep'";
                            $result = mysqli_query($conn, $query);
                            //Se ele encontrar no banco, insere as divs e mostra os dados.
                            if (mysqli_num_rows($result) != 0) {
                                while ($row = mysqli_fetch_array($result)) {
                                    echo '<div class="mb-3">
                                            <input type="text" name="rua" id="rua" placeholder="Rua" readonly="true" class="input-inserido" value="'.$row['rua'].'">
                                        </div>';
                                    echo '<div class="mb-3">
                                            <input type="text" name="bairro" id="bairro" placeholder="Bairro" readonly="true" class="input-inserido" value="'.$row['bairro'].'">
                                        </div>';
                                    echo '<div class="mb-3">
                                            <input type="text" name="cdd" id="cdd" placeholder="Cidade" readonly="true" class="input-inserido" value="'.$row['cidade'].'">
                                        </div>';
                                    echo '<div class="mb-3">
                                            <input type="text" name="uf" id="uf" placeholder="UF" readonly="true" class="input-inserido" value="'.$row['uf'].'">
                                        </div>';
                                    echo '<div class="mb-3">
                                            <input type="text" name="ddd" id="ddd" placeholder="DDD" readonly="true" class="input-inserido" value="'.$row['ddd'].'">
                                        </div>';
                                    echo '<div id="ceprepetido" class="form-text">Esse CEP já foi consultado. Tente outro!</div> ';
                                    die();
                                } 
                            } else { ?>
                                <!--Senão, o javasript busca --> 
                                <div class="mb-3 ">
                                    <input type="button" value="OK" name="search" id="search" formaction="" class="btn-js">
                                </div> 
                                <script>
                                    document.getElementById('banco').style.visibility = 'hidden';
                                </script> 
                                <div class="mb-3">
                                    <input type="text" name="rua" id="rua" placeholder="Rua" readonly="true" class="input-inserido">
                                </div>
                                <div class="mb-3">
                                    <input type="text" name="bairro" id="bairro" placeholder="Bairro" readonly="true" class="input-inserido">
                                </div>
                                <div class="mb-3">
                                    <input type="text" name="cdd" id="cdd" placeholder="Cidade" readonly="true" class="input-inserido">
                                </div>
                                <div class="mb-3">
                                    <input type="text" name="uf" id="uf" placeholder="UF" readonly="true" class="input-inserido">
                                </div>
                                <div class="mb-3">
                                    <input type="text" name="ddd" id="ddd" placeholder="DDD" readonly="true" class="input-inserido"> 
                                </div>
                                <div id="confirmar" class="form-text">Realize a confirmação do CEP.</div>
                                <div class="mb-3 btn-submit">
                                    <input type="submit" value="Enviar" name="submit" id="submit" class="enviar-btn"> 
                                </div>    
                                <div id="aviso-incorreto" class="form-text"></div>        
                    <?php }                  
                        } else {
                            echo '<div id="cepincorreto" class="form-text">Formato de CEP incorreto. Verifique e tente novamente.</div> ';
                        }
                } ?>               
        </form>
        <!--Fim form-->
        <?php
            /*if (isset($_GET["error"])) {
                if ($_GET["error"] == "campovazio") {
                    echo "<div class='campovazio'><p>Insira um CEP para poder salvar.</p></div>";
                } else if ($_GET["error"] == "falha") {
                    echo "<div class='campovazio'><p>Ocorreu um problema. Tente novamente</p></div>";
                } else if ($_GET["error"] == "none") {
                    echo "<div class='campovazio'><p>CEP salvo!</p></div>";
                }
            }*/
        
        ?>
        
    </div>
</section>

    <!--Bootstrap e scripts-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>
</html>