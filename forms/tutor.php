<?php
    require_once "class/Tutor.php";
    require_once "biblioteca_de_funcoes.php";

    if(isset($_POST["btnCadastrar"])){
        $tutorCadastrar = new Tutor();
        $tutorCadastrar->cpf = $_POST['cpf'];
        $tutorCadastrar->nome = $_POST['nome'];
        $tutorCadastrar->telefone = $_POST['telefone'];
        $tutorCadastrar->email = $_POST['email'];
        $tutorCadastrar->data_nasc = $_POST['data_nasc'];
        $tutorCadastrar->cep = $_POST['cep'];
        $tutorCadastrar->uf = $_POST['uf'];
        $tutorCadastrar->cidade = $_POST['cidade'];
        $tutorCadastrar->bairro = $_POST['bairro'];
        $tutorCadastrar->logradouro = $_POST['logradouro'];
        $tutorCadastrar->numero = $_POST['numero'];

        if($tutorCadastrar->cadastrar()){
            echo'<div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Cadastro</h4>
                    <p>Sucesso ao cadastrar tutor!!!</p>
                </div>';
        }
        else{
            echo'<div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">Cadastro</h4>
                <p>Erro ao cadastrar tutor</p>
            </div>';
        }  
    }   
    
    $tutor = new Tutor();  
    if(isset($_POST['buscar'])){
        $listaDeTutor = $tutor->consultarTodos($_POST['buscar']);
    }
    else{
        $listaDeTutor = $tutor->consultarTodos();
    }
?>
<h2>Tutor</h2>
<nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <button class="nav-link active" id="consultar"  data-bs-toggle="tab" data-bs-target="#nav-consultar" type="button" role="tab" aria-controls="nav-consultar" aria-selected="true">Consultar</button>
        <button class="nav-link"        id="cadastrar"  data-bs-toggle="tab" data-bs-target="#nav-cadastrar" type="button" role="tab" aria-controls="nav-cadastrar" aria-selected="false">Cadastar</button>
    </div>
</nav>
<div class="tab-content" id="nav-tabContent">
    <!-- Div para listagem -->
    <div class="tab-pane fade show active" id="nav-consultar" role="tabpanel" aria-labelledby="consultar" tabindex="0">
        <fieldset>
            <legend>Lista de tutores</legend>
            <form action="" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Busque aqui ..." aria-describedby="button-addon2" name="buscar">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">                
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"></path>
                        </svg>
                    </button>
                </div>
            </form>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">cpf</th>
                        <th scope="col">nome</th>
                        <th scope="col">telefone</th>
                        <th scope="col">email</th>
                        <th scope="col">data_nasc</th>
                        <th scope="col">cep</th>
                        <th scope="col">uf</th>
                        <th scope="col">cidade</th>
                        <th scope="col">bairro</th>
                        <th scope="col">logradouro</th>
                        <th scope="col">numero</th>
                    </tr>
                </thead>
                <tbody>
                    <?php                                      
                    if ($listaDeTutor) {
                        foreach ($listaDeTutor as $objTutor) {
                            echo exibirDadosEmTabela($objTutor);
                        }
                    } else {
                        echo ("Nenhum tutor encontrado");
                    }
                    ?>
                </tbody>
            </table>
        </fieldset>
    </div>
    <!-- Div para listagem -->
    <!-- Div para cadastro -->
    <div class="tab-pane fade" id="nav-cadastrar" role="tabpanel" aria-labelledby="cadastrar" tabindex="0">
        <fieldset>
            <legend>Cadastro</legend>
            <form method="POST">
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="CPF" name="cpf">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Nome" name="nome">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Telefone" name="telefone">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="E-mail" name="email">
                </div>
                <div class="mb-3">
                    <label class="form-label">Data de nascimento</label>
                    <input type="date" class="form-control" placeholder="Data de nascimento" name="data_nasc">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="CEP" name="cep">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="UP" name="uf">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Cidade" name="cidade">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Bairro" name="bairro">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Logradouro" name="logradouro">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Numero" name="numero">
                </div>                
                <button type="submit" name="btnCadastrar" class="btn btn-primary">Submit</button>
            </form>
        </fieldset>
    </div>
    <!-- Div para cadastro -->

</div>