<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Área do Triângulo</title>
</head>
<body>
    <header>
        <h1> Área do Triângulo </h1>
    </header>
    <center>
    <div class="container">
    <form action="areatriangulo.php" method="POST">
        <label for="altura">Altura do triângulo:</label>
        <input type="float" id="altura" name="altura" required> <br> <br>
        <label for="base">Base:</label>
        <input type="float" id="base" name="base" required> <br> <br>
        <input class="botao" type="submit" value="Calcular">

    </form>
    
    <div class="resposta">
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                if(isset($_POST['altura']) && isset($_POST['base'])){
                    $altura = $_POST['altura'];
                    $base = $_POST['base'];

                    $erro = empty($base) || empty($altura) ? "Todos os campos são obrigatórios" : ((!is_numeric($base) || !is_numeric($altura) || $base <=0 || $altura <= 0 ) ? "Por favor, insira valores válidos" : "");
                    if ($erro){
                        echo $erro;
                    }else{
                        $area = ($altura * $base) / 2;
                        echo "Área do triângulo: $area cm²";
                    }
                } else {
                    echo " Formulário não enviado corretamente";
                }
            }
        ?>
    </div>
    <a href="selectareas.php"><button class="botao">Voltar</button></a>
    </div>
    </center>
</body>
</html>