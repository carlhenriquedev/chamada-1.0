<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fazer Login</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>

<body>
    <a href="index.html" class="btn-voltar">
        <i class="fas fa-arrow-left"></i>
    </a>

    <div class="container-esquerdo">
        <img class="banner-img" src="img/banner-login.jpg" alt="Foto de banner da tela de login">
    </div>

    <div class="container-direito">

        <form action="subs/validação.php" method="post">

            <?php
            session_start();
            if (isset($_SESSION["mensagem"])) {
                echo "<p class='mensagem'>" . $_SESSION["mensagem"] . "</p>";
                unset($_SESSION["mensagem"]);
            }
            ?>
            <img src="img/rodape_logo.png" class="logo-img" alt="Logo Chamada Escolar">

            <div class="input-group tipo-acesso">
                <input type="radio" name="tipo_acesso" id="gestor" value="gestor" required>
                <label for="gestor">Gestor</label>

                <input type="radio" name="tipo_acesso" id="professor" value="professor">
                <label for="professor">Professor</label>

                <input type="radio" name="tipo_acesso" id="responsavel" value="responsavel">
                <label for="responsavel">Responsável</label>
            </div>

            <div class="input-group">
                <img src="img/e-mail.png" alt="Ícone E-mail">
                <input type="email" name="email" placeholder="Digite o seu E-mail" required>
            </div>

            <div class="input-group">
                <img src="img/senha.png" alt="Ícone Senha">
                <input type="password" name="senha" placeholder="Digite a sua senha" required>
            </div>

            <a class="estilo-textos esqueci-senha" href="esqueceu-senha.php">Esqueceu a senha?</a>

            <button type="submit" name="submit" class="login-button">Entrar</button>


            <a href="#" class="google-login">
                <img src="img/Logo-Google.png" alt="Google Icon">
                <span>Entrar com Google</span>
            </a>

        </form>
    </div>
</body>

</html>