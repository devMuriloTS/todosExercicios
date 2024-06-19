<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Área do retângulo</title>
</head>
<body>
    <header>
        <h1> Área do retângulo </h1>
    </header>
    <center>
    <div class="container">
    <form action="arearetangulo.php" method="POST">
        <label for="largura">Largura (cm):</label>
        <input type="float" id="largura" name="largura" required> <br> <br>
        <label for="altura">Altura (cm):</label>
        <input type="float" id="altura" name="altura" required> <br> <br>
        <input class="botao" type="submit" value="Calcular">

    </form>

    <a href="selectareas.php"><button class="botao">Voltar</button></a>
    
    <div class="resposta">
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                if(isset($_POST['largura']) && isset($_POST['altura'])){
                    $largura = $_POST['largura'];
                    $altura = $_POST['altura'];

                    $erro = empty($largura) || empty($altura) ? "Todos os campos são obrigatórios" : ((!is_numeric($largura) || !is_numeric($altura) || $largura <=0 || $altura <= 0 ) ? "Por favor, insira valores válidos" : "");
                    if ($erro){
                        echo $erro;
                    }else{
                        $area = $largura*$altura;
                        $perimetro = ($largura*2) + ($altura*2);
                        echo "Largura: $largura cm <br> <br>";
                        echo "Altura: $altura cm <br> <br>";
                        echo "Perímetro: $perimetro cm <br> <br>";
                        echo "Área: $area cm² <br> <br>";
                        
                    }
                } else {
                    echo " Formulário não enviado corretamente";
                }
            }
        ?>
    </div>

    </div>
    </center>
</body>
</html>