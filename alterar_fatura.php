<!doctype html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/modificar.css">
    <title>Faturas!</title>
</head>

<body class="meio">

    <?php
    require_once 'conexao.php';
    // Mesclar Funcoes de conexao.php

    $p = new Pessoa('rose', 'localhost', 'root', '');

    if (isset($_POST['nome_dono'])) {
        $nome_dono = addslashes($_POST['nome_dono']);
        $nome_fatura = addslashes($_POST['nome_fatura']);
        $mensalidade = addslashes($_POST['mensalidade']);
        // $data = addslashes($_POST["data"]);
        $prestacoes = addslashes($_POST['prestacoes']);

        if (!empty($nome_dono) && !empty($nome_fatura) && !empty($mensalidade) && !empty($prestacoes)) {
            // tirei a data
            // cadastrar pessoas se positivo

            if (!$p->AdicionarFatura($nome_dono, $nome_fatura, $mensalidade, $prestacoes)) {

                exit();
            } else {
                // $p->AdicionarFatura($nome_dono, $nome_fatura, $mensalidade, $prestacoes);


            }
        } else {
            Mensagem("OPS!, E necessario preencher todos os campos!", "danger");
        }
    }

    ?>
    <br>

    <h1>Faturas</h1>

    <form method="post">
        <!-- Nome do Comprador -->
        <div class="forms-goup">
            <label for="nome">CPF</label>
            <input type="number" name="nome_dono" class="form-control" required placeholder="Digite apenas os numeros">
        </div>

        <!-- Nome fatura -->
        <div class="forms-goup">
            <label for="nome_fatura">Nome da Compra</label>
            <input type="text" name="nome_fatura" class="form-control" required placeholder="De um nome a sua compra Exemplo: Amazon.">
        </div>

        <!-- mensalidade -->
        <div class="forms-goup">
            <label for="mensalidade">Valor da Mensalidade</label>
            <input type="number" name="mensalidade" step="0.01" class="form-control" required placeholder="Sempare os decimais por '.' EX: R$34.54">
        </div>

        <!-- Prestacoes -->
        <div class="forms-goup">
            <label for="prestacoes">Prestaçoes</label>
            <input type="number" name="prestacoes" class="form-control" required placeholder="Em quantas vezes a compra foi dividida?">
        </div>
        <br>

        <!-- data -->
        <table>
            <tr>
                <td>


                    <!-- botao enviar -->
                    <label for="botao"></label>
                    <input type="submit" class="btn btn-success" value="Enviar">
    </form>
    </td>
    <td>


        <form action="tela_inicial.php" method="post">
            <label for="botao"></label>
            <input type="submit" class="btn btn-danger" value="Voltar">
        </form>
    </td>
    </tr>
    </table>





    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
        -->
</body>

</html>