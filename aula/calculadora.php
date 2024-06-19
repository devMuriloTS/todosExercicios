<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>IMC</title>
</head>
<body>
    <header>
        <h1> Calculadora IMC</h1>
    </header>
    <center>
    <div class="container">
    <form action="calculadora.php" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required> <br> <br>
        <label for="peso">Peso(KG):</label>
        <input type="number" id="peso" name="peso" step="0.1" required> <br> <br>
        <label for="altura">Altura(m):</label>
        <input type="number" id="altura" name="altura" step="0.01" required> <br> <br>
        <label for="nascimento">Ano nascimento:</label>
        <input type="number" id="nascimento" name="nascimento" step="1" required> <br> <br>
        <input class="botao" type="submit" value="Calcular">

    </form>
    
    <div class="resposta">
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                if(isset($_POST['peso']) && isset($_POST['altura'])){
                    $nome = $_POST['nome'];
                    $peso = $_POST['peso'];
                    $altura = $_POST['altura'];
                    $ano = $_POST['nascimento'];
                    $erro = empty($peso) || empty($altura) || empty($nome) || empty($ano) ? "Todos os campos são obrigatórios" : ((!is_numeric($altura) || $peso <=0 || $altura<=0 || $ano <=0) ? "Por favor, insira valores válidos" : "");
                    if ($erro){
                        echo $erro;
                    }else{
                        $hoje = date('Y');
                        $idade = $hoje - $ano; 
                        $imc = $peso / ($altura*$altura);
                        $imc = number_format($imc,2);
                        $classificacao = ($imc < 18.5) ? "Abaixo do peso" : (($imc < 24.9) ? "Peso normal" : (($imc < 29.9) ? "Sobre peso" : "Obesidade"));
                        echo "Seu nome é: $nome <br>";
                        echo "Seu peso é: $peso KG<br>";
                        echo "Sua altura é: $altura metros<br>";
                        echo "Sua idade é: $idade <br>";
                        echo "Seu imc é : $imc <br>";
                        echo "Classificação: $classificacao";
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