<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Conversor de moedas</title>
</head>
<body>
    <header>
        <h1> Conversor de moedas <br>(Atualizado para o dia 11/06 20:00)</h1>
    </header>
    <center>
    <div class="container">
    <form action="conversor.php" method="POST">
        <label for="valor">Valor:</label>
        <input type="float" id="valor" name="valor" required> <br> <br>
        <label for="converter1">Converter de:</label>
        <select name="converter1" id="converter1">
            <option value="dolar1">USD</option>
            <option value="real1">BRL</option>
            <option value="euro1">EUR</option>
        </select> <br> <br>
        <label for="converter2">Converter para:</label>
        <select name="converter2" id="converter2">
            <option value="dolar2">USD</option>
            <option value="real2">BRL</option>
            <option value="euro2">EUR</option>
        </select>  <br> <br>
        <input class="botao" type="submit" value="Calcular">

    </form>
    
    <div class="resposta">
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                if(isset($_POST['valor'])){
                    $valor = $_POST['valor'];
                    $converter1 = $_POST['converter1'];
                    $converter2 = $_POST['converter2'];
                    $erro = empty($valor) ? "Todos os campos são obrigatórios" : (($valor <=0) ? "Por favor, insira valores válidos" : "");
                    if ($erro){
                        echo $erro;
                    }else{
                        if ($converter1 == "dolar1" && $converter2 == "real2"){
                            $valorCambio = $valor*5.37;
                            $valorCambio = number_format($valorCambio, 2);
                            $valor = number_format($valor, 2);
                            echo "Valor em dólares: USD $valor <br> <br>";
                            echo "Cambio do dólar: USD 1 => R$ 5.37 <br> <br>";
                            echo "Resultado final: R$ $valorCambio <br> <br>";
                        } else if($converter1 == "dolar1" && $converter2 == "euro2"){
                            $valorCambio = $valor*0.93;
                            $valorCambio = number_format($valorCambio, 2);
                            $valor = number_format($valor, 2);
                            echo "Valor em dólares: USD $valor  <br> <br>";
                            echo "Cambio do dólar: USD 1 => € 0.93 <br> <br>" ;
                            echo "Resultado final: € $valorCambio <br> <br>";
                        } else if($converter1 == "real1" && $converter2 == "dolar2"){
                            $valorCambio = $valor*0.19;
                            $valorCambio = number_format($valorCambio, 2);
                            $valor = number_format($valor, 2);
                            echo "Valor em reais: R$ $valor <br> <br>";
                            echo "Cambio do real: R$ 1 => USD 0.19 <br> <br>";
                            echo "Resultado final: USD $valorCambio <br> <br>";
                        } else if($converter1 == "real1" && $converter2 == "euro2"){
                            $valorCambio = $valor*0.17;
                            $valorCambio = number_format($valorCambio, 2);
                            $valor = number_format($valor, 2);
                            echo "Valor em reais: R$ $valor <br> <br>";
                            echo "Cambio do real: R$ 1 => € 0.17 <br> <br>";
                            echo "Resultado final: € $valorCambio <br> <br>";
                        } else if($converter1 == "euro1" && $converter2 == "real2"){
                            $valorCambio = $valor*5.76;
                            $valorCambio = number_format($valorCambio, 2);
                            $valor = number_format($valor, 2);
                            echo "Valor em euros: € $valor <br> <br>";
                            echo "Cambio do euro: € 1 => R$ 5.76 <br> <br> ";
                            echo "Resultado final: R$ $valorCambio <br> <br>";
                        } else if($converter1 == "euro1" && $converter2 == "dolar2"){
                            $valorCambio = $valor*1.07;
                            $valorCambio = number_format($valorCambio, 2);
                            $valor = number_format($valor, 2);
                            echo "Valor em euros: € $valor <br> <br>";
                            echo "Cambio do euro: € 1 => USD 1.07 <br> <br>";
                            echo "Resultado final: USD $valorCambio <br> <br>";
                        } else {
                            echo "Selecione moedas diferentes!";
                        }
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