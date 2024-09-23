<?php require_once "includes/cabecalho.inc.php";
$cliente = $_SESSION['clienteLogado'];
?>

<!-- CONTEUDO -->
<h1 class="text-center">Cadastro de Usuário</h1>

<div class="row">
    <div class="col-lg-10 col-xl-9 mx-auto">
        <div class="card flex-row my-5 border-0 shadow rounded-3 overflow-hidden">
            <div class="card-img-left d-none d-md-flex">
                <!-- Background image for card set in CSS! -->
            </div>
            <div class="card-body p-4 p-sm-5">
                <h5 class="card-title text-center mb-5 fw-light fs-5">Preencha suas informações para cadastro</h5>
                <?php if (isset($_GET['aviso']) && !empty($_GET['aviso'])): ?>
                    <div class="alert alert-warning" role="alert">
                        <?php echo $_GET['aviso']; ?>
                    </div>
                <?php endif; ?>
                <form action="../controlers/controllerCliente.php" method="post">

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInputCPF" placeholder="CPF" name="pCpf" value="<?php echo $cliente['cpf'] ?? ''; ?>" required>
                        <label for="floatingInputCPF">CPF</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInputNome" placeholder="Nome" name="pNome" value="<?php echo $cliente['nome'] ?? ''; ?>" required>
                        <label for="floatingInputNome">Nome</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInputLogradouro" placeholder="Logradouro" name="pLogradouro" value="<?php echo $cliente['logradouro'] ?? ''; ?>" required>
                        <label for="floatingInputLogradouro">Logradouro</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInputCidade" placeholder="Cidade" name="pCidade" value="<?php echo $cliente['cidade'] ?? ''; ?>" required>
                        <label for="floatingInputCidade">Cidade</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInputEstado" placeholder="Estado" name="pEstado" value="<?php echo $cliente['estado'] ?? ''; ?>" required>
                        <label for="floatingInputEstado">Estado</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInputCEP" placeholder="CEP" name="pCep" value="<?php echo $cliente['cep'] ?? ''; ?>" required>
                        <label for="floatingInputCEP">CEP</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInputTelefone" placeholder="Telefone" name="pTelefone" value="<?php echo $cliente['telefone'] ?? ''; ?>" required>
                        <label for="floatingInputTelefone">Telefone</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="date" class="form-control" id="floatingInputDataNascimento" placeholder="Data de Nascimento" name="pDataNascimento" value="<?php echo $cliente['data_nascimento'] ?? ''; ?>" required>
                        <label for="floatingInputDataNascimento">Data de Nascimento</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInputEmail" placeholder="nome@exemplo.com" name="pEmail" value="<?php echo $cliente['email'] ?? ''; ?>" required>
                        <label for="floatingInputEmail">Endereço de Email</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Senha" name="pSenha" value="<?php echo $cliente['senha'] ?? ''; ?>" required>
                        <label for="floatingPassword">Senha</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInputRG" placeholder="RG" name="pRg" value="<?php echo $cliente['rg'] ?? ''; ?>" required>
                        <label for="floatingInputRG">RG</label>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tipo</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="pTipo" id="tipoCliente" value="C" <?php echo (isset($cliente['tipo']) && $cliente['tipo'] == 'C') ? 'checked' : ''; ?> required>
                                <label class="form-check-label" for="tipoCliente">Cliente</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="pTipo" id="tipoAdministrador" value="A" <?php echo (isset($cliente['tipo']) && $cliente['tipo'] == 'A') ? 'checked' : ''; ?> required>
                                <label class="form-check-label" for="tipoAdministrador">Administrador</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="pTipo" id="tipoCancelado" value="D" <?php echo (isset($cliente['tipo']) && $cliente['tipo'] == 'D') ? 'checked' : ''; ?> required>
                                <label class="form-check-label" for="tipoCancelado">Desativado</label>
                            </div>
                        </div>
                    </div>

                    <div class="d-grid mb-2">
                        <button class="btn btn-lg btn-primary btn-login fw-bold text-uppercase" type="submit">Cadastrar</button>
                        <input type="hidden" value="3" name="pOpcao">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<!-- Rodape -->

<?php require_once "includes/rodape.inc.php" ?>