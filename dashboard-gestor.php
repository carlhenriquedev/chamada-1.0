<?php
session_start();

$tipoPermitido = 'gestor';
include("subs/verificaPermissao.php");

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard Gestor</title>

  <link rel="stylesheet" href="css/main-gestor.css" />

</head>

<body>

  <?php
  if (isset($_SESSION["mensagem"])) {
    $tipo = $_SESSION["tipoMensagem"] ?? "sucesso";
    echo "<div class='mensagem {$tipo}'>";
    echo "<p class='mensagemText'>" . $_SESSION["mensagem"] . "</p>";
    unset($_SESSION["mensagem"]);
    echo "</div>";
  }
  ?>
  <!-- HEADER -->
  <header>
    <img src="img/logotexto.png" alt="" />
    <h3>Dashboard Gestor</h3>
    <a href="" class="perfil-desktop">Gestor</a>

    <button id="menu-toggle" class="menu-toggle" aria-label="Abrir menu">
      <!-- SVG do menu sanduíche aqui -->
      <svg width="32" height="32" viewBox="0 0 32 32" fill="none">
        <rect y="7" width="32" height="3" rx="1.5" fill="currentColor" />
        <rect y="15" width="32" height="3" rx="1.5" fill="currentColor" />
        <rect y="23" width="32" height="3" rx="1.5" fill="currentColor" />
      </svg>
    </button>
  </header>

  <div class="container">

    <!-- MENU LATERAL -->
    <aside class="sidebar" id="sidebar">
      <div class="sidebar-buttons">
        <a class="button-enviar" data-target="tela-01">Cadastro de Aluno</a>
        <a class="button-enviar" data-target="tela-02">Cadastro de Professor</a>
        <a class="button-enviar" data-target="tela-03">Avisos</a>
        <a class="button-enviar" data-target="tela-04">Gestão de usuários</a>
        <a class="button-enviar" style="background-color: red;" href="subs/sair.php">Sair</a>

        <a href="" class="button-enviar perfil-mobile">
          Perfil
        </a>
      </div>
    </aside>

    <!-- CONTAINER CENTRAL DO DASHBOARD -->
    <main>
      <!-- TELA DO CADASTRO ALUNO/RESPONSAVEL -->
      <div class="box-main" id="tela-01">
        <div class="main-header">
          <form class="container-direito" method="post" action="subs/cadastro-aluno.php" enctype="multipart/form-data">
            <div class="row form-icon">
              <img class="icon-estudante" src="img/icon_estudante.png" class="logo-img" alt="ícone estudante" />
            </div>

            <div class="row">
              <h3>Dados do aluno(a)</h3>
            </div>

            <div class="row">
              <div class="input-group">
                <img src="img/usuario.png" alt="Ícone Usuário" />
                <input type="text" name="nome" placeholder="Nome Completo" required />
              </div>
              <div class="input-group">
                <input type="file" name="foto" accept="image/*">
              </div>
            </div>

            <div class="row">
              <div class="input-group">
                <input type="date" name="nascimento" placeholder="Nascimento" required />
              </div>

              <div class="input-group">
                <input type="text" name="rg" placeholder="RG" required />
              </div>

              <div class="input-group">
                <input type="text" name="cpf" placeholder="CPF" required />
              </div>
            </div>

            <div class="row">
              <div class="input-group">
                <select name="sexo" required>
                  <option value="" disabled selected>Sexo</option>
                  <option value="Masculino">Masculino</option>
                  <option value="Feminino">Feminino</option>
                  <option value="Prefiro não informar">
                    Prefiro não informar
                  </option>
                </select>
              </div> 

              <div class="input-group">
                <select name="raca" required>
                  <option value="" disabled selected>Cor/raça</option>
                  <option value="Branco">Branco</option>
                  <option value="Preto">Preto</option>
                  <option value="Pardo">Pardo</option>
                  <option value="Amarelo">Amarelo</option>
                  <option value="Indídena">Indídena</option>
                </select>
              </div>

              <div class="input-group">
                <select name="sangue" required>
                  <option value="" disabled selected>Tipo Sanguíneo</option>
                  <option value="A+">A+</option>
                  <option value="A-">A-</option>
                  <option value="B+">B+</option>
                  <option value="B-">B-</option>
                  <option value="AB+">AB+</option>
                  <option value="AB-">AB-</option>
                  <option value="O+">O+</option>
                  <option value="O-">O-</option>
                </select>
              </div>
            </div>

            <div class="row">
              <div class="input-group">
                <input type="text" name="nacionalidade" placeholder="Nacionalidade" required />
              </div>

              <div class="input-group">
                <input type="text" id="naturalidade" name="naturalidade" placeholder="Naturalidade" required />
              </div>

              <div class="input-group">
                <select name="turma" required>
                  <option value="" disabled selected>Turma</option>
                  <option value="6º ano">6º ano</option>
                  <option value="7º ano">7º ano</option>
                  <option value="8º ano">8º ano</option>
                  <option value="9º ano">9º ano</option>
                </select>
              </div>
            </div>

            <div class="row">
              <div class="input-deficiencia">
                <h4>Possui alguma deficiência?</h4>
                <input type="checkbox" name="" onclick="gerirInputDeDeficiencia(this.checked)" />
              </div>
              <div class="input-group">
                <input type="text" name="deficiencia" style="background-color: #ccc" id="texto-deficiencia" placeholder="Se houver deficiência, informe-a" disabled />
              </div>
            </div>

            <div class="row">
              <div class="input-deficiencia">
                <h4>Responsável já cadastrado?</h4>
                <input type="checkbox" onclick="gerirSeletorDoResponsavel(this.checked)" />
              </div>
              <div class="input-group">
                <input type="text" name="responsavel" style="background-color: #ccc" id="seletor-responsavel" placeholder="Se houver responsável, informe o e-mail" disabled>

                </input>
              </div>
            </div>

            <div class="section-responsaveis" id="section-responsaveis">
              <div class="row">
                <h3>Dados do Responsável</h3>
              </div>

              <div class="row">
                <div class="input-group">
                  <img src="img/usuario.png" alt="Ícone Usuário" />
                  <input type="text" name="nome_responsavel" placeholder="Nome Completo" />
                </div>
              </div>

              <div class="row">
                <div class="input-group">
                  <input type="text" name="rg_responsavel" placeholder="RG" />
                </div>

                <div class="input-group">
                  <input type="text" name="cpf_responsavel" placeholder="CPF" />
                </div>

                <div class="input-group">
                  <select name="parentesto" required>
                    <option value="" disabled selected>
                      Grau de parentesco
                    </option>
                    <option value="Pai">Pai</option>
                    <option value="Mãe">Mãe</option>
                    <option value="Avô">Avô</option>
                    <option value="Avó">Avó</option>
                    <option value="Tio">Tio</option>
                    <option value="Tia">Tia</option>
                  </select>
                </div>
              </div>

              <div class="row">
                <div class="input-group">
                  <input type="text" name="rua" placeholder="Nome da rua" required />
                </div>

                <div class="input-group">
                  <input type="text" name="numero" placeholder="Número" required />
                </div>

                <div class="input-group">
                  <input type="text" name="bairro" placeholder="Bairro" required />
                </div>
              </div>

              <div class="row">
                <div class="input-group">
                  <input type="text" name="cidade" placeholder="Cidade" required />
                </div>

                <div class="input-group">
                  <input type="text" name="complemento" placeholder="Complemento" required />
                </div>

                <div class="input-group">
                  <input type="text" name="cep" placeholder="CEP" required />
                </div>
              </div>

              <div class="row">
                <div class="input-group">
                  <input type="text" name="telefone" placeholder="Telefone" required />
                </div>

                <div class="input-group">
                  <input type="text" name="email" placeholder="Email" required />
                </div>
              </div>

              <div class="row">
                <div class="input-group">
                  <img src="img/senha.png" alt="Ícone Senha" />
                  <input type="password" name="senha1" placeholder="Senha" required />
                </div>

                <div class="input-group">
                  <img src="img/senha.png" alt="Ícone Confirmar Senha" />
                  <input type="password" name="senha2" placeholder="Repetir senha" required />
                </div>
              </div>
            </div>

            <div class="row">
              <button type="submit" name="submit" class="button-enviar-laranja">
                Cadastrar
              </button>
            </div>
          </form>
        </div>
      </div>

      <!-- TELA DO CADASTRO PROFESSOR -->
      <div class="box-main" id="tela-02">

        <div class="main-header">

          <form method="post" action="subs/cadastro-professor.php" enctype="multipart/form-data" class="container-direito">
            <div class="row form-icon">
              <img class="icon-prof" src="img/icon_professor.png" class="logo-img" alt="ícone professor" />
            </div>

            <div class="row">
              <h3>Cadastro Professor(a)</h3>
            </div>

            <div class="row">
              <div class="input-group">
                <img src="img/usuario.png" alt="Ícone Usuário" />
                <input type="text" name="nome" placeholder="Nome Completo" required />
              </div>
              <div class="input-group">
                <input type="file" name="foto" accept="image/*">
              </div>
            </div>

            <div class="row">
              <div class="input-group">
                <input type="date" name="nascimento" placeholder="Nascimento" required />
              </div>

              <div class="input-group">
                <input type="text" name="rg" placeholder="RG" required />
              </div>

              <div class="input-group">
                <input type="text" name="cpf" placeholder="CPF" required />
              </div>
            </div>

            <div class="row">
              <div class="input-group">
                <select name="sexo" required>
                  <option value="" disabled selected>Sexo</option>
                  <option value="Masculino">Masculino</option>
                  <option value="Feminino">Feminino</option>
                  <option value="Prefiro não informar">
                    Prefiro não informar
                  </option>
                </select>
              </div>

              <div class="input-group">
                <select name="raca" required>
                  <option value="" disabled selected>Cor/raça</option>
                  <option value="Branco">Branco</option>
                  <option value="Preto">Preto</option>
                  <option value="Pardo">Pardo</option>
                  <option value="Amarelo">Amarelo</option>
                  <option value="Indídena">Indídena</option>
                </select>
              </div>

              <div class="input-group">
                <select name="sangue" required>
                  <option value="" disabled selected>Tipo Sanguíneo</option>
                  <option value="A+">A+</option>
                  <option value="A-">A-</option>
                  <option value="B+">B+</option>
                  <option value="B-">B-</option>
                  <option value="AB+">AB+</option>
                  <option value="AB-">AB-</option>
                  <option value="O+">O+</option>
                  <option value="O-">O-</option>
                </select>
              </div>
            </div>

            <div class="row">
              <div class="input-group">
                <input type="text" name="formacao" placeholder="Formação acadêmica" required />
              </div>

              <div class="input-group">
                <input type="text" name="disciplina" placeholder="Disciplina" required />
              </div>

              <div class="input-group">
                <select name="turma" required>
                  <option value="" disabled selected>Turma</option>
                  <option value="6º ano">6º ano</option>
                  <option value="7º ano">7º ano</option>
                  <option value="8º ano">8º ano</option>
                  <option value="9º ano">9º ano</option>
                </select>
              </div>
            </div>

            <div class="row">
              <div class="input-group">
                <input type="text" name="rua" placeholder="Nome da Rua" />
              </div>

              <div class="input-group">
                <input type="text" name="numero" placeholder="Número" />
              </div>

              <div class="input-group">
                <input type="text" name="bairro" placeholder="Bairro" />
              </div>
            </div>

            <div class="row">
              <div class="input-group">
                <input type="text" name="cidade" placeholder="Cidade" />
              </div>

              <div class="input-group">
                <input type="text" name="complemento" placeholder="Complemento" />
              </div>

              <div class="input-group">
                <input type="text" name="cep" placeholder="CEP" />
              </div>
            </div>

            <div class="row">
              <div class="input-group">
                <input type="text" name="telefone" placeholder="Telefone" required />
              </div>

              <div class="input-group">
                <input type="text" name="email" placeholder="Email" required />
              </div>
            </div>

            <div class="row">
              <div class="input-group">
                <img src="img/senha.png" alt="Ícone Senha" />
                <input type="password" name="senha1" placeholder="Senha" required />
              </div>

              <div class="input-group">
                <img src="img/senha.png" alt="Ícone Confirmar Senha" />
                <input type="password" name="senha2" placeholder="Repetir senha" required />
              </div>
            </div>

            <div class="row">
              <button type="submit" name="submit" class="button-enviar-laranja">
                Cadastrar
              </button>
            </div>
          </form>

        </div>
      </div>

      <!-- TELA DO CADASTRO AVISOS -->
      <div class="box-main" id="tela-03">
        <form action="subs/addaviso.php" method="post" class="main-header">
          <div class="main-header-row">
            <h4>Adicione um novo aviso:</h4>
            <button type="submit" class="button-enviar-laranja">Enviar</button>
          </div>
          <input type="text" placeholder="Título" name="titulo_aviso" class="title-avisos" required />
          <textarea placeholder="Descrição" rows="2" name="aviso" class="desc-avisos" required></textarea>
        </form>

        <section class="home-section">
          <h1>Avisos da Turma</h1>
          <div class="feed">
            <?php
            include_once("config/connection.php");

            $sql = "SELECT avisos.*, 
              CASE 
                WHEN autor_tipo = 'gestor' THEN gestores.username
                WHEN autor_tipo = 'professor' THEN professores.nome 
              END AS autor_nome
            FROM avisos
            LEFT JOIN gestores ON autor_tipo = 'gestor' AND autor_id = gestores.id
            LEFT JOIN professores ON autor_tipo = 'professor' AND autor_id = professores.id
            ORDER BY data_publicacao DESC
            LIMIT 10";

            $resultado = $conexao->query($sql);

            if ($resultado->num_rows > 0) {
              while ($aviso = $resultado->fetch_assoc()) {
                $id = $aviso['id'];
                echo "<div class='feed-item'>";
                echo "<p><strong>" . htmlspecialchars($aviso['titulo']) . "</strong></p>";
                echo "<div class='repo-card'>" . nl2br(htmlspecialchars($aviso['descricao'])) . "</div>";
                echo "<small>Por " . htmlspecialchars($aviso['autor_nome']) . " em " . date("d/m/Y H:i", strtotime($aviso['data_publicacao'])) . "</small>";

                echo "<form method='post' action='subs/del-edit-aviso.php' style='display:inline;' onsubmit=\"return confirm('Deseja remover este aviso?');\">";
                echo "<input type='hidden' name='delete_id' value='{$id}'>";
                echo "<button class='btn-remove-aviso' type='submit'>Remover</button>";
                echo "</form>";
                echo "</div>";
              }
            } else {
              echo "<p>Nenhum aviso publicado.</p>";
            }
            ?>
          </div>
        </section>

      </div>

      <!-- GESTAO DE USUARIOS, VISUALIZACAO, EDICAO, EXCLUSAO -->
      <div class="box-main" id="tela-04">

        <div class="container-admin">
          <h1 class="mb-4">gestão de usuários</h1>

          <div class="tab-nav">
            <button class="tab-link active" data-target="professores">Professores</button>
            <button class="tab-link" data-target="alunos">Alunos</button>
            <button class="tab-link" data-target="responsaveis">Responsáveis</button>
          </div>

          <!-- LISTAGENS PROFESSORES, ALUNOS, RESPONSAVEIS -->
          <div class="tab-content active" id="professores">
            <?php
            include_once("config/connection.php");
            $sql = "SELECT * FROM professores WHERE removido_em IS NULL";
            $resultado = $conexao->query($sql);

            if ($resultado->num_rows > 0) {
              echo "<ul class='list-group'>";
              while ($p = $resultado->fetch_assoc()) {
                $id = $p['id'];
                echo "<li class='list-group-item' id='professor-{$id}'>";

                // Dados visíveis
                echo "<div class='dados-visiveis'>";
                echo "<strong>{$p['nome']}</strong><p>{$p['disciplina']}</p>";

                echo "<div style='margin-top: 5px;'>";
                echo "<button type='button' onclick=\"toggleEditar('professor-$id')\">Editar</button>";

                echo "<form method='post' action='subs/del-edit-professor.php' enctype='multipart/form-data' style='display:inline;' onsubmit=\"return confirm('Deseja remover este professor?');\">";
                echo "<input type='hidden' name='delete_id' value='{$id}'>";
                echo "<button type='submit'>Remover</button>";
                echo "</form>";
                echo "</div>";
                echo "</div>";

               
                echo "<form method='post' action='subs/del-edit-professor.php' id='form-editar-professor-{$id}' style='display:none; margin-top:10px;'>";

                echo "<input type='hidden' name='id' value='{$id}'>";

              
                echo "<input type='text' name='nome' value='" . htmlspecialchars($p['nome']) . "' placeholder='Nome completo' required>";

                echo "<label for='foto-{$id}'>Foto (opcional):</label>";
                echo "<input type='file' name='foto' id='foto-{$id}' accept='image/*'>";
             
                echo "<input type='date' name='nascimento' value='{$p['nascimento']}' required>";
                echo "<input type='text' name='rg' value='{$p['rg']}' placeholder='RG' required>";
                echo "<input type='text' name='cpf' value='{$p['cpf']}' placeholder='CPF' required>";

                
                echo "<select name='sexo' required>";
                foreach (['Masculino', 'Feminino', 'Prefiro não informar'] as $opcao) {
                  $selected = ($p['sexo'] == $opcao) ? 'selected' : '';
                  echo "<option value='$opcao' $selected>$opcao</option>";
                }
                echo "</select>";

                echo "<select name='raca' required>";
                foreach (['Branco', 'Preto', 'Pardo', 'Amarelo', 'Indídena'] as $opcao) {
                  $selected = ($p['raca'] == $opcao) ? 'selected' : '';
                  echo "<option value='$opcao' $selected>$opcao</option>";
                }
                echo "</select>";

                echo "<select name='sangue' required>";
                foreach (['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'] as $opcao) {
                  $selected = ($p['sangue'] == $opcao) ? 'selected' : '';
                  echo "<option value='$opcao' $selected>$opcao</option>";
                }
                echo "</select>";

                // Linha 4 - formação, disciplina, turma
                echo "<input type='text' name='formacao' value='{$p['formacao']}' placeholder='Formação acadêmica' required>";
                echo "<input type='text' name='disciplina' value='{$p['disciplina']}' placeholder='Disciplina' required>";

                echo "<select name='turma' required>";
                foreach (['6º ano', '7º ano', '8º ano', '9º ano'] as $opcao) {
                  $selected = ($p['turma'] == $opcao) ? 'selected' : '';
                  echo "<option value='$opcao' $selected>$opcao</option>";
                }
                echo "</select>";

                // Linha 5 - endereço
                echo "<input type='text' name='rua' value='{$p['rua']}' placeholder='Rua' required>";
                echo "<input type='text' name='numero' value='{$p['numero']}' placeholder='Número' required>";
                echo "<input type='text' name='bairro' value='{$p['bairro']}' placeholder='Bairro' required>";
                echo "<input type='text' name='cidade' value='{$p['cidade']}' placeholder='Cidade' required>";
                echo "<input type='text' name='complemento' value='{$p['complemento']}' placeholder='Complemento'>";
                echo "<input type='text' name='cep' value='{$p['cep']}' placeholder='CEP' required>";

                // Linha 6 - contato
                echo "<input type='text' name='telefone' value='{$p['telefone']}' placeholder='Telefone' required>";
                echo "<input type='email' name='email' value='{$p['email']}' placeholder='Email' required>";

                // Botões
                echo "<button type='submit'>Salvar</button>";
                echo "<button type='button' onclick=\"toggleEditar('$id')\">Cancelar</button>";

                echo "</form>";
                echo "</li>";
              }
              echo "</ul>";
            } else {
              echo "<p>Nenhum professor cadastrado.</p>";
            }
            ?>

          </div>

          <div class="tab-content" id="alunos">

            <!-- LISTAGEM ALUNOS 6 ANO -->
            <?php
            $sql = "SELECT * FROM alunos WHERE removido_em IS NULL AND turma = '6º ano' ORDER BY nome;";
            $resultado = $conexao->query($sql);

            echo "<h4>6° ano</h4>";
            if ($resultado->num_rows > 0) {
              echo "<ul class='list-group'>";
              while ($a = $resultado->fetch_assoc()) {
                $id = $a['id'];

                echo "<li class='list-group-item' id='aluno-{$id}'>";

                // Dados visíveis
                echo "<div class='dados-visiveis'>";
                echo "<strong>{$a['nome']}</strong>";
                echo "<div style='margin-top: 5px;'>";
                echo "<button type='button' onclick=\"toggleEditar('aluno-$id')\">Editar</button>";

                echo "<form method='post' action='subs/del-edit-aluno.php' style='display:inline;' onsubmit=\"return confirm('Deseja remover este aluno?');\">";
                echo "<input type='hidden' name='delete_id' value='{$id}'>";
                echo "<button type='submit'>Remover</button>";
                echo "</form>";
                echo "</div>";
                echo "</div>";

                // Formulário de edição embutido

                echo "<form method='post' action='subs/del-edit-aluno.php' enctype='multipart/form-data' id='form-editar-aluno-{$id}' style='display:none; margin-top:10px;'>";
                echo "<input type='hidden' name='id' value='{$id}'>";

                echo "<label for='foto-{$id}'>Foto (opcional):</label>";
                echo "<input type='file' name='foto' id='foto-{$id}' accept='image/*'>";

                echo "<input type='text' name='nome' value='{$a['nome']}' placeholder='Nome completo' required>";
                echo "<input type='date' name='nascimento' value='{$a['nascimento']}' required>";
                echo "<input type='text' name='rg' value='{$a['rg']}' placeholder='RG' required>";
                echo "<input type='text' name='cpf' value='{$a['cpf']}' placeholder='CPF' required>";

                echo "<select name='sexo' required>";
                foreach (['Masculino', 'Feminino', 'Prefiro não informar'] as $opcao) {
                  $selected = ($a['sexo'] == $opcao) ? 'selected' : '';
                  echo "<option value='$opcao' $selected>$opcao</option>";
                }
                echo "</select>";

                echo "<select name='raca' required>";
                foreach (['Branco', 'Preto', 'Pardo', 'Amarelo', 'Indídena'] as $opcao) {
                  $selected = ($a['raca'] == $opcao) ? 'selected' : '';
                  echo "<option value='$opcao' $selected>$opcao</option>";
                }
                echo "</select>";

                echo "<select name='sangue' required>";
                foreach (['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'] as $opcao) {
                  $selected = ($a['sangue'] == $opcao) ? 'selected' : '';
                  echo "<option value='$opcao' $selected>$opcao</option>";
                }
                echo "</select>";

                echo "<input type='text' name='nacionalidade' value='{$a['nacionalidade']}' placeholder='Nacionalidade' required>";
                echo "<input type='text' name='naturalidade' value='{$a['naturalidade']}' placeholder='Naturalidade' required>";

                echo "<select name='turma' required>";
                foreach (['6º ano', '7º ano', '8º ano', '9º ano'] as $opcao) {
                  $selected = ($a['turma'] == $opcao) ? 'selected' : '';
                  echo "<option value='$opcao' $selected>$opcao</option>";
                }
                echo "</select>";

                echo "<input type='text' name='deficiencia' value='{$a['deficiencia']}' placeholder='Deficiência (se houver)'>";

                echo "<label>Responsável:</label>";
                echo "<select name='responsavel_id'>";
                echo "<option value=''>Nenhum</option>";
                $res = $conexao->query("SELECT id, nome FROM responsaveis");
                while ($resp = $res->fetch_assoc()) {
                  $selected = ($a['responsavel_id'] == $resp['id']) ? 'selected' : '';
                  echo "<option value='{$resp['id']}' $selected>{$resp['nome']}</option>";
                }
                echo "</select>";

                echo "<button type='submit'>Salvar</button>";
                echo "<button type='button' onclick=\"toggleEditar('{$id}')\">Cancelar</button>";
                echo "</form>";

                echo "</li>";
              }
              echo "</ul>";
            } else {
              echo "<p class= 'naUser';>Nenhum aluno cadastrado.</p>";
            }
            ?>

            <!-- LISTAGEM ALUNOS 7 ANO -->
            <?php
            $sql = "SELECT * FROM alunos WHERE removido_em IS NULL AND turma = '7º ano' ORDER BY nome;";
            $resultado = $conexao->query($sql);

            echo "<h4>7° ano</h4>";
            if ($resultado->num_rows > 0) {
              echo "<ul class='list-group'>";
              while ($a = $resultado->fetch_assoc()) {
                $id = $a['id'];

                echo "<li class='list-group-item' id='aluno-{$id}'>";


                echo "<div class='dados-visiveis'>";
                echo "<strong>{$a['nome']}</strong>";
                echo "<div style='margin-top: 5px;'>";
                echo "<button type='button' onclick=\"toggleEditar('aluno-$id')\">Editar</button>";

                echo "<form method='post' action='subs/del-edit-aluno.php' style='display:inline;' onsubmit=\"return confirm('Deseja remover este aluno?');\">";
                echo "<input type='hidden' name='delete_id' value='{$id}'>";
                echo "<button type='submit'>Remover</button>";
                echo "</form>";
                echo "</div>";
                echo "</div>";


                echo "<form method='post' action='subs/del-edit-aluno.php' enctype='multipart/form-data' id='form-editar-aluno-{$id}' style='display:none; margin-top:10px;'>";
                echo "<input type='hidden' name='id' value='{$id}'>";

                echo "<input type='text' name='nome' value='{$a['nome']}' placeholder='Nome completo' required>";

                echo "<label for='foto-{$id}'>Foto (opcional):</label>";
                echo "<input type='file' name='foto' id='foto-{$id}' accept='image/*'>";

                echo "<input type='date' name='nascimento' value='{$a['nascimento']}' required>";
                echo "<input type='text' name='rg' value='{$a['rg']}' placeholder='RG' required>";
                echo "<input type='text' name='cpf' value='{$a['cpf']}' placeholder='CPF' required>";

                echo "<select name='sexo' required>";
                foreach (['Masculino', 'Feminino', 'Prefiro não informar'] as $opcao) {
                  $selected = ($a['sexo'] == $opcao) ? 'selected' : '';
                  echo "<option value='$opcao' $selected>$opcao</option>";
                }
                echo "</select>";

                echo "<select name='raca' required>";
                foreach (['Branco', 'Preto', 'Pardo', 'Amarelo', 'Indídena'] as $opcao) {
                  $selected = ($a['raca'] == $opcao) ? 'selected' : '';
                  echo "<option value='$opcao' $selected>$opcao</option>";
                }
                echo "</select>";

                echo "<select name='sangue' required>";
                foreach (['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'] as $opcao) {
                  $selected = ($a['sangue'] == $opcao) ? 'selected' : '';
                  echo "<option value='$opcao' $selected>$opcao</option>";
                }
                echo "</select>";

                echo "<input type='text' name='nacionalidade' value='{$a['nacionalidade']}' placeholder='Nacionalidade' required>";
                echo "<input type='text' name='naturalidade' value='{$a['naturalidade']}' placeholder='Naturalidade' required>";

                echo "<select name='turma' required>";
                foreach (['6º ano', '7º ano', '8º ano', '9º ano'] as $opcao) {
                  $selected = ($a['turma'] == $opcao) ? 'selected' : '';
                  echo "<option value='$opcao' $selected>$opcao</option>";
                }
                echo "</select>";

                echo "<input type='text' name='deficiencia' value='{$a['deficiencia']}' placeholder='Deficiência (se houver)'>";

                echo "<label>Responsável:</label>";
                echo "<select name='responsavel_id'>";
                echo "<option value=''>Nenhum</option>";
                $res = $conexao->query("SELECT id, nome FROM responsaveis");
                while ($resp = $res->fetch_assoc()) {
                  $selected = ($a['responsavel_id'] == $resp['id']) ? 'selected' : '';
                  echo "<option value='{$resp['id']}' $selected>{$resp['nome']}</option>";
                }
                echo "</select>";

                echo "<button type='submit'>Salvar</button>";
                echo "<button type='button' onclick=\"toggleEditar('{$id}')\">Cancelar</button>";
                echo "</form>";

                echo "</li>";
              }
              echo "</ul>";
            } else {
              echo "<p class= 'naUser';>Nenhum aluno cadastrado.</p>";
            }
            ?>

            <!-- LISTAGEM ALUNOS 8 ANO -->
            <?php
            $sql = "SELECT * FROM alunos WHERE removido_em IS NULL AND turma = '8º ano' ORDER BY nome;";
            $resultado = $conexao->query($sql);

            echo "<h4>8° ano</h4>";
            if ($resultado->num_rows > 0) {
              echo "<ul class='list-group'>";
              while ($a = $resultado->fetch_assoc()) {
                $id = $a['id'];

                echo "<li class='list-group-item' id='aluno-{$id}'>";

                echo "<div class='dados-visiveis'>";
                echo "<strong>{$a['nome']}</strong>";
                echo "<div style='margin-top: 5px;'>";
                echo "<button type='button' onclick=\"toggleEditar('aluno-$id')\">Editar</button>";

                echo "<form method='post' action='subs/del-edit-aluno.php' enctype='multipart/form-data' style='display:inline;' onsubmit=\"return confirm('Deseja remover este aluno?');\">";
                echo "<input type='hidden' name='delete_id' value='{$id}'>";
                echo "<button type='submit'>Remover</button>";
                echo "</form>";
                echo "</div>";
                echo "</div>";

                echo "<form method='post' action='subs/del-edit-aluno.php' id='form-editar-aluno-{$id}' style='display:none; margin-top:10px;'>";
                echo "<input type='hidden' name='id' value='{$id}'>";

                echo "<input type='text' name='nome' value='{$a['nome']}' placeholder='Nome completo' required>";

                echo "<label for='foto-{$id}'>Foto (opcional):</label>";
                echo "<input type='file' name='foto' id='foto-{$id}' accept='image/*'>";


                echo "<input type='date' name='nascimento' value='{$a['nascimento']}' required>";
                echo "<input type='text' name='rg' value='{$a['rg']}' placeholder='RG' required>";
                echo "<input type='text' name='cpf' value='{$a['cpf']}' placeholder='CPF' required>";

                echo "<select name='sexo' required>";
                foreach (['Masculino', 'Feminino', 'Prefiro não informar'] as $opcao) {
                  $selected = ($a['sexo'] == $opcao) ? 'selected' : '';
                  echo "<option value='$opcao' $selected>$opcao</option>";
                }
                echo "</select>";

                echo "<select name='raca' required>";
                foreach (['Branco', 'Preto', 'Pardo', 'Amarelo', 'Indídena'] as $opcao) {
                  $selected = ($a['raca'] == $opcao) ? 'selected' : '';
                  echo "<option value='$opcao' $selected>$opcao</option>";
                }
                echo "</select>";

                echo "<select name='sangue' required>";
                foreach (['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'] as $opcao) {
                  $selected = ($a['sangue'] == $opcao) ? 'selected' : '';
                  echo "<option value='$opcao' $selected>$opcao</option>";
                }
                echo "</select>";

                echo "<input type='text' name='nacionalidade' value='{$a['nacionalidade']}' placeholder='Nacionalidade' required>";
                echo "<input type='text' name='naturalidade' value='{$a['naturalidade']}' placeholder='Naturalidade' required>";

                echo "<select name='turma' required>";
                foreach (['6º ano', '7º ano', '8º ano', '9º ano'] as $opcao) {
                  $selected = ($a['turma'] == $opcao) ? 'selected' : '';
                  echo "<option value='$opcao' $selected>$opcao</option>";
                }
                echo "</select>";

                echo "<input type='text' name='deficiencia' value='{$a['deficiencia']}' placeholder='Deficiência (se houver)'>";

                echo "<label>Responsável:</label>";
                echo "<select name='responsavel_id'>";
                echo "<option value=''>Nenhum</option>";
                $res = $conexao->query("SELECT id, nome FROM responsaveis");
                while ($resp = $res->fetch_assoc()) {
                  $selected = ($a['responsavel_id'] == $resp['id']) ? 'selected' : '';
                  echo "<option value='{$resp['id']}' $selected>{$resp['nome']}</option>";
                }
                echo "</select>";

                echo "<button type='submit'>Salvar</button>";
                echo "<button type='button' onclick=\"toggleEditar('{$id}')\">Cancelar</button>";
                echo "</form>";

                echo "</li>";
              }
              echo "</ul>";
            } else {
              echo "<p class= 'naUser';>Nenhum aluno cadastrado.</p>";
            }
            ?>

            <!-- LISTAGEM ALUNOS 9 ANO -->
            <?php
            $sql = "SELECT * FROM alunos WHERE removido_em IS NULL AND turma = '9º ano' ORDER BY nome;";
            $resultado = $conexao->query($sql);

            echo "<h4>9° ano</h4>";
            if ($resultado->num_rows > 0) {
              echo "<ul class='list-group'>";
              while ($a = $resultado->fetch_assoc()) {
                $id = $a['id'];

                echo "<li class='list-group-item' id='aluno-{$id}'>";

                // Dados visíveis
                echo "<div class='dados-visiveis'>";
                echo "<strong>{$a['nome']}</strong>";
                echo "<div style='margin-top: 5px;'>";
                echo "<button type='button' onclick=\"toggleEditar('aluno-$id')\">Editar</button>";

                echo "<form method='post' action='subs/del-edit-aluno.php' enctype='multipart/form-data' style='display:inline;' onsubmit=\"return confirm('Deseja remover este aluno?');\">";
                echo "<input type='hidden' name='delete_id' value='{$id}'>";
                echo "<button type='submit'>Remover</button>";
                echo "</form>";
                echo "</div>";
                echo "</div>";

                // Formulário de edição embutido

                echo "<form method='post' action='subs/del-edit-aluno.php' id='form-editar-aluno-{$id}' style='display:none; margin-top:10px;'>";
                echo "<input type='hidden' name='id' value='{$id}'>";

                echo "<input type='text' name='nome' value='{$a['nome']}' placeholder='Nome completo' required>";

                echo "<label for='foto-{$id}'>Foto (opcional):</label>";
                echo "<input type='file' name='foto' id='foto-{$id}' accept='image/*'>";

                echo "<input type='date' name='nascimento' value='{$a['nascimento']}' required>";
                echo "<input type='text' name='rg' value='{$a['rg']}' placeholder='RG' required>";
                echo "<input type='text' name='cpf' value='{$a['cpf']}' placeholder='CPF' required>";

                echo "<select name='sexo' required>";
                foreach (['Masculino', 'Feminino', 'Prefiro não informar'] as $opcao) {
                  $selected = ($a['sexo'] == $opcao) ? 'selected' : '';
                  echo "<option value='$opcao' $selected>$opcao</option>";
                }
                echo "</select>";

                echo "<select name='raca' required>";
                foreach (['Branco', 'Preto', 'Pardo', 'Amarelo', 'Indídena'] as $opcao) {
                  $selected = ($a['raca'] == $opcao) ? 'selected' : '';
                  echo "<option value='$opcao' $selected>$opcao</option>";
                }
                echo "</select>";

                echo "<select name='sangue' required>";
                foreach (['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'] as $opcao) {
                  $selected = ($a['sangue'] == $opcao) ? 'selected' : '';
                  echo "<option value='$opcao' $selected>$opcao</option>";
                }
                echo "</select>";

                echo "<input type='text' name='nacionalidade' value='{$a['nacionalidade']}' placeholder='Nacionalidade' required>";
                echo "<input type='text' name='naturalidade' value='{$a['naturalidade']}' placeholder='Naturalidade' required>";

                echo "<select name='turma' required>";
                foreach (['6º ano', '7º ano', '8º ano', '9º ano'] as $opcao) {
                  $selected = ($a['turma'] == $opcao) ? 'selected' : '';
                  echo "<option value='$opcao' $selected>$opcao</option>";
                }
                echo "</select>";

                echo "<input type='text' name='deficiencia' value='{$a['deficiencia']}' placeholder='Deficiência (se houver)'>";

                echo "<label>Responsável:</label>";
                echo "<select name='responsavel_id'>";
                echo "<option value=''>Nenhum</option>";
                $res = $conexao->query("SELECT id, nome FROM responsaveis");
                while ($resp = $res->fetch_assoc()) {
                  $selected = ($a['responsavel_id'] == $resp['id']) ? 'selected' : '';
                  echo "<option value='{$resp['id']}' $selected>{$resp['nome']}</option>";
                }
                echo "</select>";

                echo "<button type='submit'>Salvar</button>";
                echo "<button type='button' onclick=\"toggleEditar('{$id}')\">Cancelar</button>";
                echo "</form>";

                echo "</li>";
              }
              echo "</ul>";
            } else {
              echo "<p>Nenhum aluno cadastrado.</p>";
            }
            ?>
          </div>

          <div class="tab-content" id="responsaveis">
            <?php
            $sql = "SELECT * FROM responsaveis WHERE removido_em IS NULL";
            $resultado = $conexao->query($sql);

            if ($resultado->num_rows > 0) {
              echo "<ul class='list-group'>";
              while ($r = $resultado->fetch_assoc()) {
                $id = $r['id'];
                echo "<li class='list-group-item' id='responsavel-{$id}'>";

                // Dados visíveis
                echo "<div class='dados-visiveis'>";
                echo "<strong>{$r['nome']}</strong><p>{$r['email']}</p>";

                echo "<div style='margin-top: 5px;'>";
                echo "<button type='button' onclick=\"toggleEditar('$id')\">Editar</button>";
                echo "<form method='post' action='subs/del-edit-responsavel.php' style='display:inline;' onsubmit=\"return confirm('Deseja remover este responsável?');\">";
                echo "<input type='hidden' name='delete_id' value='{$id}'>";
                echo "<button type='submit'>Remover</button>";
                echo "</form>";
                echo "</div>";
                echo "</div>";

                // Formulário de edição embutido
                echo "<form method='post' action='subs/del-edit-responsavel.php' id='form-editar-{$id}' style='display:none; margin-top:10px;'>";

                echo "<input type='hidden' name='id' value='{$id}'>";
                echo "<input type='text' name='nome' value='" . htmlspecialchars($r['nome']) . "' placeholder='Nome completo' required>";
                echo "<input type='text' name='rg' value='{$r['rg']}' placeholder='RG'>";
                echo "<input type='text' name='cpf' value='{$r['cpf']}' placeholder='CPF'>";

                echo "<select name='parentesco' required>";
                $parentescos = ['Pai', 'Mãe', 'Avô(ó)', 'Tio(a)', 'Responsável Legal'];
                foreach ($parentescos as $opcao) {
                  $selected = $r['parentesco'] == $opcao ? 'selected' : '';
                  echo "<option value='$opcao' $selected>$opcao</option>";
                }
                echo "</select>";

                echo "<input type='text' name='rua' value='{$r['rua']}' placeholder='Rua' required>";
                echo "<input type='text' name='numero' value='{$r['numero']}' placeholder='Número' required>";
                echo "<input type='text' name='bairro' value='{$r['bairro']}' placeholder='Bairro' required>";
                echo "<input type='text' name='cidade' value='{$r['cidade']}' placeholder='Cidade' required>";
                echo "<input type='text' name='complemento' value='{$r['complemento']}' placeholder='Complemento'>";
                echo "<input type='text' name='cep' value='{$r['cep']}' placeholder='CEP' required>";

                echo "<input type='text' name='telefone' value='{$r['telefone']}' placeholder='Telefone' required>";
                echo "<input type='email' name='email' value='{$r['email']}' placeholder='Email' required>";

                echo "<button type='submit'>Salvar</button>";
                echo "<button type='button' onclick=\"toggleEditar('$id')\">Cancelar</button>";

                echo "</form>";
                echo "</li>";
              }
              echo "</ul>";
            } else {
              echo "<p>Nenhum responsável cadastrado.</p>";
            }
            ?>
          </div>

        </div>
      </div>

    </main>
  </div>
</body>
<script src="scripts/dashboard.js"></script>
<script src="scripts/gestaoUsers.js"></script>

</html>