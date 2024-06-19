<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Conversor de temperaturas</title>
</head>
<body>
    <header>
        <h1> Conversor de temperaturas</h1>
    </header>
    <center>
    <div class="container">
    <form action="temperatura.php" method="POST">
        <label for="valor">Valor:</label>
        <input type="float" id="valor" name="valor" required> <br> <br>
        <label for="converter1">Converter para:</label>
        <select name="converter1" id="converter1">
            <option value="celsius">Celsius</option>
            <option value="fahr">Fahreinheit</option>
        </select> <br> <br>
        <input class="botao" type="submit" value="Calcular">

    </form>
    <a href="principal.php"><button class="botao">Voltar</button></a>
    
    <div class="resposta">
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                if(isset($_POST['valor'])){
                    $valor = $_POST['valor'];
                    $escolha = $_POST['converter1'];

                    $erro = empty($valor) ? "Todos os campos são obrigatórios" : ("");
                    if ($erro){
                        echo $erro;
                    }else{
                        if($escolha == "celsius"){
                            $resultado = ($valor-32) / 1.8;
                            echo "Temperatura em graus Celsius: $resultado °C";
                        } else {
                            $resultado = ($valor * 1.8) + 32;
                            echo "Temperatura em graus Fahreinheit: $resultado °F";
                        }
                        
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