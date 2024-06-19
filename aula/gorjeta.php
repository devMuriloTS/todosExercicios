<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Gorjetas</title>
</head>
<body>
    <header>
        <h1> Calculadora de Gorjetas</h1>
    </header>
    <center>
    <div class="container">
    <form action="gorjeta.php" method="POST">
        <label for="valor">Valor da conta:</label>
        <input type="float" id="valor" name="valor" required> <br> <br>
        <label for="porcentagem">Porcentagem de Gorjeta:</label>
        <input type="float" id="porcentagem" name="porcentagem" required> <br> <br>
        <input class="botao" type="submit" value="Calcular">

    </form>
    
    <div class="resposta">
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                if(isset($_POST['valor']) && isset($_POST['porcentagem'])){
                    $valor = $_POST['valor'];
                    $porcentagem = $_POST['porcentagem'];

                    $erro = empty($valor) || empty($porcentagem) ? "Todos os campos são obrigatórios" : (($valor <=0 || $porcentagem <= 0 ) ? "Por favor, insira valores válidos": "");
                    if ($erro){
                        echo $erro;
                    }else{
                        $gorjeta = ($porcentagem/100) * $valor;
                        $finalConta = $gorjeta + $valor;
                        $finalConta = number_format($finalConta, 2);
                        $gorjeta = number_format($gorjeta, 2);
                        echo "Conta no valor de: R$ $valor <br><br>";
                        echo "Porcentagem de gorjeta: $porcentagem% <br><br>";
                        echo "Gorjeta: R$$gorjeta <br><br>";
                        echo "Valor final: R$$finalConta";
                        
                    }
                } else {
                    echo " Formulário não enviado corretamente";
                }
            }
        ?>
    </div>
    <a href="principal.php"><button class="botao">Voltar</button></a>
    </div>
    </center>
</body>
</html>