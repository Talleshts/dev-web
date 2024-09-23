<?php require_once "includes/cabecalho.inc.php" ?>

<!-- CONTEUDO -->
<h1 class="text-center">Login de Usuário</h1>

<div class="row">
    <div class="col-lg-10 col-xl-9 mx-auto">
        <div class="card flex-row my-5 border-0 shadow rounded-3 overflow-hidden">
            <div class="card-img-left d-none d-md-flex">
                <!-- Background image for card set in CSS! -->
            </div>
            <div class="card-body p-4 p-sm-5">
                <h5 class="card-title text-center mb-5 fw-light fs-5">Entre com suas informações de Login</h5>
                <form action="../controlers/controllerCliente.php" method="get">

                    <div class="form-floating mb-3">
                        <input type="pEmail" class="form-control" id="floatingInputEmail" placeholder="nome@exemplo.com" name="pEmail">
                        <label for="floatingInputEmail">Endereço de Email</label>
                    </div>

                    <hr>

                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Senha" name="pSenha">
                        <label for="floatingPassword">Senha</label>
                    </div>

                    <div class="d-grid mb-2">
                        <button class="btn btn-lg btn-primary btn-login fw-bold text-uppercase" type="submit">Efetuar Login</button>
                    </div>

                    <?php
                    echo "Erro de Login aqui!";
                    ?>

                    <a class="d-block text-center mt-2 small" href="formCliente.php">Não possui uma conta? Cadastre-se aqui</a>
                    <br>

                    <input type="hidden" value="1 " name="pOpcao">
                    <?php
                    if (isset($_REQUEST['erro'])) {
                        if ((int)($_REQUEST['erro']) == 1) {
                            echo "<b><font face='Verdana' size='2' color='red'>Login Incorreto!</font><b>";
                        } elseif ((int)($_REQUEST['erro']) == 2) {
                            $email = isset($_SESSION['pEmail']) ? htmlspecialchars($_SESSION['pEmail']) : '';
                            echo "<b><font face='Verdana' size='2' color='red'>Usuário Desativado! Deseja ativar o usuário?</font><b>";
                            echo '<form action="../controlers/controllerCliente.php" method="post">';
                            echo '<input type="hidden" name="pOpcao" value="6">';
                            echo '<input type="hidden" name="pEmail" value="' . $email . '">';
                            echo '<button type="submit" class="btn btn-primary">Ativar Usuário</button>';
                            echo '</form>';
                        }
                    }

                    if (isset($_REQUEST['ativado']) && (int)($_REQUEST['ativado']) == 1) {
                        echo "<b><font face='Verdana' size='2' color='green'>Usuário Ativado com Sucesso!</font><b>";
                    }
                    ?>
                </form>
            </div>
        </div>
    </div>

</div>

<!-- Rodape -->

<?php require_once "includes/rodape.inc.php" ?>