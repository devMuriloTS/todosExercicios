<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Área do Círculo</title>
</head>
<body>
    <header>
        <h1> Área do Círculo </h1>
    </header>
    <center>
    <div class="container">
    <form action="areacirculo.php" method="POST">
        <label for="valor">Raio (cm):</label>
        <input type="float" id="valor" name="valor" required> <br> <br>
        <input class="botao" type="submit" value="Calcular">

    </form>
    
    <div class="resposta">
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                if(isset($_POST['valor'])){
                    $valor = $_POST['valor'];

                    $erro = empty($valor) ? "Todos os campos são obrigatórios" : ((!is_numeric($valor) || $valor <=0 ) ? "Por favor, insira valores válidos" : "");
                    if ($erro){
                        echo $erro;
                    }else{
                        $resultado = 3.1415926 * ($valor*$valor);
                        $resultado = number_format($resultado, 3);
                        $valor = number_format($valor, 3);
                        echo "Raio do círculo: $valor cm<br>";
                        echo "Área do círculo: $resultado cm²<br>";
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