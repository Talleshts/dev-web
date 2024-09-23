<header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
    <a href="index.php" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
        <img src="imagens/logo2.png">&nbsp;&nbsp;
        <h4> Loja Web</h4>
    </a>


    <div class="col-md-3 text-end">
        <?php
        if (!isset($_SESSION['clienteLogado'])) {
        ?>
            <a class="btn btn-outline-primary me-2" role="button" href="formLogin.php">Login</a>
        <?php
        } else {
        ?>
        <?php
            include_once "modal.inc.php";
        }
        ?>
    </div>
</header>