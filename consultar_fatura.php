<!DOCTYPE html>
<html lang="pt-br">
   <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css"><link rel="stylesheet" href="css/modificar.css">
        <title>Consultar</title>
  </head>

    <body class="meio"> 
    <section>
            <table>
                <tr>
                <div class="container-fluid">
                
                    <form class="d-flex" action="consultar_fatura.php" method="post">
                        <input class="form-control me-2" type="number" placeholder="Digite o cpf do comprador" aria-label="Search" name="buscar" required>
                    </tr>
                    <tr><td>
                        <button class="btn btn-outline-success" type="submit">Consultar</button>
                    </form>
                    </td></tr>
                </table>
                <table class="table table-hover table-dark">
                        <thead>
                            <tr>
                            <th scope="col">N</th>
                            <th scope="col">Nome da Fatura</th>
                            <th scope="col">Mensalidade</th>
                            <th scope="col">Prestaçao</th>
                            <th scope="col">CPF</th>
                            <th scope="col">ID</th>
                            
                            </tr>
                        </thead>
                        
        <?php 

                require_once 'conexao.php';

                $p = new Pessoa('Rose','127.0.0.1','root','root');

                if(isset($_POST['buscar']))
                {
                    $pesquisar = $_POST['buscar'];
                    $resu = $p->buscarDados($pesquisar);
                    echo"<tbody>";
                    if(count($resu)> 0)
                    {
                        for ($i=0; $i < count($resu) ; $i++) 
                        { 
                            echo"<tr>";
                            echo "<th scope='row'>".$i+1; 
                            
                            foreach ($resu[$i] as $k => $v) 
                            { 
                            echo"<th scope='col'>".$v."</th>";
                            }
                            echo"</th>";
                        }
                    } 
                }

        ?>
                </section>
                </div>
                    </tbody>
                </table>
                <section class="container-fluid">
                    <form action="confirmar_pagamento.php" method="post">
                        <input type="submit" value="Confirmar pagamento" class="btn btn-danger">
                    </form> 
                </section>

        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>-->    
    </body>
</html>