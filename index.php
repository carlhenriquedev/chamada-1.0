<?php
session_start();
include_once("config/connection.php");

// Verificar se a tabela 'gestores' existe
$tabelaExiste = $conexao->query("SHOW TABLES LIKE 'gestores'");
if ($tabelaExiste && $tabelaExiste->num_rows > 0) {

  // Verificar se já existe um gestor com o email especificado
  $verifica = $conexao->prepare("SELECT id FROM gestores WHERE email = ?");
  $email = "gestor@gmail.com";
  $verifica->bind_param("s", $email);
  $verifica->execute();
  $verifica->store_result();

  if ($verifica->num_rows === 0) {
    // Inserir novo gestor padrão
    $senhaHash = password_hash("123", PASSWORD_DEFAULT);
    $inserir = $conexao->prepare("INSERT INTO gestores (username, email, senha) VALUES (?, ?, ?)");
    $username = "gestor";
    $inserir->bind_param("sss", $username, $email, $senhaHash);
    $inserir->execute();
    $inserir->close();
  }

  $verifica->close();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chamada Escolar</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsivity.css" media="screen">



</head>

<body>

    <!-- cabeçalho com logo, menu de navegação e botão de entrar -->
    <header id="header">
        <div class="box-header">

            <div class="flex">

                <a href="index.php">
                    <img src="img/logotexto.png" alt="Logo">
                </a>

                <nav>
                    <ul>
                        <li><a href="#vantagens">VANTAGENS</a></li>
                        <li><a href="#sobre">SOBRE NÓS</a></li>
                        <li><a href="#depoimentos">DEPOIMENTOS</a></li>
                        <li><a href="#faq">DÚVIDAS</a></li>
                        <li><a href="#footer">CONTATOS</a></li>
                    </ul>

                </nav>

                <div class="menu-entrar">
                    <div class="icon-menu">
                        <button onclick="menuShow()"><i class="bi bi-list"></i></button>
                    </div>
                    <a class="btn-entrar" href="login.php">ENTRAR</a>
                </div>
                
            </div>

            <div class="mobile-menu">
                <ul>
                    <li><a class="item-mobile" href="#vantagens">VANTAGENS</a></li>
                    <li><a class="item-mobile" href="#sobre">SOBRE NÓS</a></li>
                    <li><a class="item-mobile" href="#depoimentos">DEPOIMENTOS</a></li>
                    <li><a class="item-mobile" href="#faq">DÚVIDAS</a></li>
                    <li><a class="item-mobile" href="#footer">CONTATOS</a></li>
                </ul>
            </div>
        </div>
    </header>

    <!-- container do banner com imagem ao fundo texto e botao de cadastro -->
    <section class="banner">
        <div class="interface">

            <div class="banner-container">
                <div class="banner-itens">

                    <img src="img/mae-e-filho-abra-ados-felizes-na-direita-da-imagem.jpg" alt="">
                    <div class="texto-banner">
                        <h2>CHAMADA ESCOLAR</h2>
                        <p>Tecnologia a serviço da segurança: monitoramento inteligente para proteção e controle em tempo real!</p>
                        <div>
                            <a class="cadastrar" href="cadastro-escola.php">CADASTRAR</a>
                        </div>
                        
                    </div>  

                </div>
            </div>
        </div>
    </section>

    <section class="vantagens" id="vantagens">
        <h2>Por que escolher o Chamada Escolar?</h2>
        <div class="vantagens-container">
            <div class="vantagem vantagem-1">
                <img src="https://img.icons8.com/ios-filled/50/ffffff/appointment-reminders.png" alt="Notificações">
                <h3>Notificações em Tempo Real</h3>
                <p>Os pais recebem alertas instantâneos sobre notas, faltas e atrasos dos alunos diretamente no celular.</p>
            </div>
            <div class="vantagem vantagem-2">
                <img src="https://img.icons8.com/ios-filled/50/ffffff/attendance-mark.png" alt="Presença">
                <h3>Controle de Presença Digital</h3>
                <p>Registro automatizado da presença dos alunos, com acesso fácil para pais e professores.</p>
            </div>
            <div class="vantagem vantagem-3">
                <img src="https://img.icons8.com/ios-filled/50/ffffff/combo-chart.png" alt="Desempenho">
                <h3>Acompanhamento de Desempenho</h3>
                <p>Relatórios visuais e intuitivos que mostram a evolução do aluno ao longo do tempo.</p>
            </div>
        </div>
    </section>

<!-- sobre nós -->
    <section class="container-sobre" id="sobre">
        <div class="sobre-header">
            <div class="gradiente"></div>

            <div class="titulo-sobre">
                <h4>Sobre nós</h4>
                <h1>Chamada Escolar em Tempo Real!</h1>

                <p>Mais do que um registro de presença, entregamos transparência, agilidade e segurança em cada chamada feita.</p>
            </div>

            <div class="texto-sobre">
                <p>Criada para facilitar o dia a dia de escolas, professores e alunos, tornando o controle de presença mais rápido, preciso e acessível. Com uma interface intuitiva, nosso sistema permite que professores realizem chamadas diretamente da sala de aula, com atualização instantânea para a gestão escolar e os responsáveis. Estamos comprometidos em construir um ambiente escolar mais conectado, eficiente e colaborativo. Aqui, a presença importa — e é registrada em tempo real.</p>
            </div>

        </div>
    </section>

    <!-- Depoimentos -->
    <section class="containers container-depoimentos" id="depoimentos">
        <div class="titulo-depoimentos">
            <h2>Depoimentos dos usuários</h2>
        </div>
            
        <div class="card-list">
            <div class="card">
                
                <div class="card-img">
                    <img src="img/mae.jpg" alt="Thiago Paz">
                </div>
                <div class="card-content">
                    <h4>Ana Laura</h4>
                    <p>"Desde que a escola começou a usar esse sistema de chamada em tempo real, eu me sinto muito mais tranquilo como pai. Recebo notificações assim que minha filha é registrada na aula, e isso me dá uma segurança enorme. Parabéns pela iniciativa!"</p>
                    <h3 class="badge2">Mãe de aluno</h3>     
                </div>
                
            </div>
            <div class="card">

                <div class="card-img">
                    <img src="img/tesla.jpg" alt="Thiago Paz">
                </div>
                <div class="card-content">
                    <h4>Thiago Luz</h4>
                    <p>"O sistema facilitou demais a nossa rotina em sala de aula. Antes, perder tempo com listas de papel era comum, mas agora faço a chamada direto do meu celular ou computador, de forma rápida e sem erros."</p>
                    <h3 class="badge1">Professor</h3>     
                </div>
            
            </div>
            <div class="card">

                <div class="card-img">
                    <img src="img/gestora.jpg" alt="Thiago Paz">
                </div>
                <div class="card-content">
                    <h4>Socorro D'lahur</h4>
                    <p> "É uma solução moderna, prática e totalmente alinhada com a educação do século XXI. Além disso, os pais se sentem mais seguros e engajados, o que fortalece a parceria entre escola e família."</p>
                    <h3 class="badge3">Gestora</h3>     
                </div>
            
            </div>

        </div>
    </section>
    
<!-- Perguntas frequentes e área do botão começar agora -->

    <div class="containers container-faq" id="faq">
        <section class="faq">
            <h1>Perguntas Frequentes</h1>
            <ul class="faq-list">
                <li>
                    <a  href="#">
                        <span>Como os pais são notificados sobre a presença dos alunos?</span>
                        <i class="bi bi-caret-right-fill"></i>
                    </a>    
                </li>
                <li>
                    <a  href="#">
                        <span>O sistema funciona em qualquer dispositivo?</span>
                        <i class="bi bi-caret-right-fill"></i>
                    </a>    
                </li>
                <li>
                    <a  href="#">
                        <span> É preciso instalar algum programa para usar o sistema?</span>
                        <i class="bi bi-caret-right-fill"></i>
                    </a>    
                </li>
            </ul>
            <a href="#" class="show-all">Mostrar todas as perguntas</a>
        </section>

        <section class="cta">
            <p class="cta-text">
                Pronto para transformar a organização <br>
                da sua escola? <br>
                Junte-se ao time!
            </p>
            <a href="criar.html" class="cta-button">Começar agora</a>
            
        </section>
    </div>

<!-- rodapé -->

    <footer id="footer">
        <div class="interface-footer">
            <div class="line-footer1">
                
                <h2 class="titulo-footer">Onde nos encontrar</h2>
                <div class="buttons-footer">
                    <a href="#" class="btn-sociais"><i class="bi bi-facebook"></i></a>     
                    <a href="#" class="btn-sociais"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="btn-sociais"><i class="bi bi-linkedin"></i></a>
                    <a href="#" class="btn-sociais"><i class="bi bi-whatsapp"></i></a>
                    <a href="#" class="btn-sociais"><i class="bi bi-youtube"></i></a>
                </div>

            </div>
            <div class="line-footer2">

                <div class="box-footer">
                    <img src="img/logotexto.png" alt="">
                    <p>Presença registrada em tempo real, trazendo mais confiança e tranquilidade para escolas, professores e famílias.</p>
                </div>

                <div class="box-footer">
                    <h3>Links úteis</h3>
                    <div class="links-footer">
                        <a href="#">Fórum</a>
                        <a href="#">Sobre nós</a>
                        <a href="#">Portifólio</a>
                    </div>
                </div>
                
                <div class="box-footer">
                    <h3>Serviços</h3>
                    <div class="links-footer">
                        <a href="#">Loja online</a>
                        <a href="#">Landing Page</a>
                    </div>
                </div>
                <div class="box-footer">
                    <h3>Suporte</h3>
                    <div class="links-footer">
                        <a href="#">Entre em contato</a>
                        <a href="#">Envie um e-mail</a>
                        <a href="#">Eu te ligo</a>
                        <a href="">FAQ</a>
                    </div>
                </div>
                
                    
                
            </div>

            <div class="line-footer3">
                <p>Chamada Escolar 2025 &copy; Todos os direitos reservados</p>
            </div>

        </div>
    </footer>


    <script src="scripts/script.js"></script>
</body>
</html>