<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" 
        rel="stylesheet" 
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" 
        crossorigin="anonymous">
</head>

<body>
    <!-- Menu -->
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container ">
            <a class="navbar-brand" href="?#">Adote pet</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="?tutor">Tutor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?pet">Pet</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?adocao">Adoção</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Menu -->

    <div class="container">
        <?php
            if(isset($_GET["tutor"])){
                require_once "forms/tutor.php"; // incluindo tutor
            }
            elseif(isset($_GET["pet"])){

            }
            elseif(isset($_GET["adocao"])){

            }
            else{
                echo"<h1>Escolha no menu a função a ser executada</h1>";
            }
        ?>
    </div>


    <script 
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" 
        crossorigin="anonymous">
    </script>
</body>

</html>