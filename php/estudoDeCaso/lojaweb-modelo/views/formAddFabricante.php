<?php
require_once "includes/cabecalho.inc.php";
?>

<h1 class="text-center"><?php echo isset($_GET['codigo']) ? 'Editar Fabricante' : 'Adicionar Fabricante'; ?></h1>

<div class="row">
    <div class="col-lg-10 col-xl-9 mx-auto">
        <div class="card flex-row my-5 border-0 shadow rounded-3 overflow-hidden">
            <div class="card-img-left d-none d-md-flex">
                <!-- Background image for card set in CSS! -->
            </div>
            <div class="card-body p-4 p-sm-5">
                <h5 class="card-title text-center mb-5 fw-light fs-5"><?php echo isset($_GET['codigo']) ? 'Atualize as informações do fabricante' : 'Preencha as informações do fabricante'; ?></h5>
                <form action="../controlers/controllerFabricante.php?pOpcao=<?php echo isset($_GET['codigo']) ? '4' : '1'; ?>" method="post">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInputCodigo" placeholder="Código" name="codigo" value="<?php echo isset($_GET['codigo']) ? $_GET['codigo'] : ''; ?>" required>
                        <label for="floatingInputCodigo">Código</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInputNome" placeholder="Nome" name="nome" value="<?php echo isset($_GET['nome']) ? $_GET['nome'] : ''; ?>" required>
                        <label for="floatingInputNome">Nome</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInputRamo" placeholder="Ramo" name="ramo" value="<?php echo isset($_GET['ramo']) ? $_GET['ramo'] : ''; ?>" required>
                        <label for="floatingInputRamo">Ramo</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInputLogradouro" placeholder="Logradouro" name="logradouro" value="<?php echo isset($_GET['logradouro']) ? $_GET['logradouro'] : ''; ?>" required>
                        <label for="floatingInputLogradouro">Logradouro</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInputCidade" placeholder="Cidade" name="cidade" value="<?php echo isset($_GET['cidade']) ? $_GET['cidade'] : ''; ?>" required>
                        <label for="floatingInputCidade">Cidade</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInputCEP" placeholder="CEP" name="cep" value="<?php echo isset($_GET['cep']) ? $_GET['cep'] : ''; ?>" required>
                        <label for="floatingInputCEP">CEP</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInputEmail" placeholder="Email" name="email" value="<?php echo isset($_GET['email']) ? $_GET['email'] : ''; ?>" required>
                        <label for="floatingInputEmail">Email</label>
                    </div>

                    <div class="d-grid mb-2">
                        <button class="btn btn-lg btn-primary btn-login fw-bold text-uppercase" type="submit"><?php echo isset($_GET['codigo']) ? 'Atualizar' : 'Adicionar'; ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require_once "includes/rodape.inc.php"; ?>