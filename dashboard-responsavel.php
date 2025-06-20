<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard Responsável</title>
    <link rel="stylesheet" href="css/main-responsavel.css" />
  </head>

  <body>
    <header>
      <img src="img/logotexto.png" alt="" />
      <h3>Dashboard Responsável</h3>
      <a
        href="perfil-responsavel.html"
        class="perfil-desktop"
        data-target="tela-04"
      >
        Perfil
        <span class="perfil-icon" aria-hidden="true">
          <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
            <circle cx="10" cy="6.5" r="4" fill="#fff" />
            <path
              d="M3 17c0-2.7614 3.134-5 7-5s7 2.2386 7 5"
              stroke-linecap="round"
              fill="#fff"
            />
          </svg>
        </span>
      </a>
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
      <aside class="sidebar" id="sidebar">
        <p class="sidebar-title">Selecione o Aluno</p>
        <select
          class="sidebar-dropdown"
          name="aluno-selecionado"
          id="select-alunos"
        >
          <option value="id-01" selected>Carlos Henrique</option>
          <option value="id-02">Luciana Souza</option>
          <option value="id-03">Eduarda Elvira</option>
        </select>
        <div class="sidebar-buttons">
          <a class="button-enviar" data-target="tela-01">Avisos</a>
          <a class="button-enviar" data-target="tela-02">Frequência</a>
          <a class="button-enviar" data-target="tela-03">Boletim</a>
          <a href="perfil-responsavel.html" class="button-enviar perfil-mobile">
            Perfil
            <span class="perfil-icon" aria-hidden="true">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                <circle cx="10" cy="6.5" r="4" fill="#fff" />
                <path
                  d="M3 17c0-2.7614 3.134-5 7-5s7 2.2386 7 5"
                  stroke-linecap="round"
                  fill="#fff"
                />
              </svg>
            </span>
          </a>
        </div>
      </aside>

      <main>
        <div class="box-main" id="tela-01">
          <section class="home-section">
            <h1>Avisos do Aluno</h1>
            <div class="feed">
              <div class="feed-item">
                <p><strong>Título do aviso 1</strong></p>
                <div class="repo-card">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Voluptate incidunt neque pariatur accusamus aliquam a
                  laboriosam vitae recusandae vero, modi corrupti explicabo
                  deleniti tenetur facilis at, veritatis, est nulla accusantium!
                </div>
                <small>4 horas atrás</small>
              </div>
              <div class="feed-item">
                <p><strong>Título do aviso 2</strong></p>
                <div class="repo-card">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Quidem quam minima eius tempora at libero fugiat corrupti
                  magni tempore obcaecati? Repudiandae omnis dolorum velit illum
                  veritatis. Dignissimos atque eveniet assumenda.
                </div>
                <small>2 dias atrás</small>
              </div>
              <div class="feed-item">
                <p><strong>Título do aviso 3</strong></p>
                <div class="repo-card">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Quidem quam minima eius tempora at libero fugiat corrupti
                  magni tempore obcaecati? Repudiandae omnis dolorum velit illum
                  veritatis. Dignissimos atque eveniet assumenda.
                </div>
                <small>2 dias atrás</small>
              </div>
              <div class="feed-item">
                <p><strong>Título do aviso 4</strong></p>
                <div class="repo-card">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Quidem quam minima eius tempora at libero fugiat corrupti
                  magni tempore obcaecati? Repudiandae omnis dolorum velit illum
                  veritatis. Dignissimos atque eveniet assumenda.
                </div>
                <small>2 dias atrás</small>
              </div>
              <div class="feed-item">
                <p><strong>Título do aviso 5</strong></p>
                <div class="repo-card">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Quidem quam minima eius tempora at libero fugiat corrupti
                  magni tempore obcaecati? Repudiandae omnis dolorum velit illum
                  veritatis. Dignissimos atque eveniet assumenda.
                </div>
                <small>4 dias atrás</small>
              </div>
            </div>
          </section>
        </div>

        <div class="box-main" id="tela-02">
          <div class="vf-container">
            <h3 class="vf-subtitle">Selecione o Mês</h3>
            <input
              type="month"
              id="vf-mesAno"
              name="mesAno"
              class="vf-input-month"
            />

            <div class="vf-tabela-wrapper">
              <table class="vf-tabela">
                <thead>
                  <tr>
                    <th>Seg</th>
                    <th>Ter</th>
                    <th>Qua</th>
                    <th>Qui</th>
                    <th>Sex</th>
                  </tr>
                </thead>
                <tbody id="vf-tabela-corpo"></tbody>
              </table>
            </div>
          </div>
          <script src="scripts/calendario_responsavel.js"></script>
        </div>

        <div class="box-main" id="tela-03">
          <div class="resp-container">
            <h1 class="resp-titulo">Boletim Escolar</h1>

            <div class="resp-info">
              <span><strong>Aluno:</strong> Carlos Henrique Souza Santos</span>
              <span><strong>Série:</strong> 3 ano</span>
              <span><strong>Turma:</strong> A</span>
            </div>

            <table class="resp-tabela">
              <thead>
                <tr>
                  <th>Disciplina</th>
                  <th colspan="2">1º Bimestre</th>
                  <th colspan="2">2º Bimestre</th>
                  <th colspan="2">3º Bimestre</th>
                  <th colspan="2">4º Bimestre</th>
                  <th>Média</th>
                  <th>% Freq</th>
                  <th>Nota recup</th>
                  <th>Média anual</th>
                  <th>Situação</th>
                </tr>
                <tr>
                  <th></th>
                  <th>N</th>
                  <th>F</th>
                  <th>N</th>
                  <th>F</th>
                  <th>N</th>
                  <th>F</th>
                  <th>N</th>
                  <th>F</th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Artes</td>
                  <td>5,0</td>
                  <td>2</td>
                  <td>9,0</td>
                  <td>1</td>
                  <td>9,0</td>
                  <td>1</td>
                  <td>5,0</td>
                  <td>2</td>
                  <td>7,0</td>
                  <td>100%</td>
                  <td></td>
                  <td></td>
                  <td class="resp-aprovado">Aprovado</td>
                </tr>
                <tr>
                  <td>Biologia</td>
                  <td>2,0</td>
                  <td>2</td>
                  <td>9,0</td>
                  <td>1</td>
                  <td>9,0</td>
                  <td>1</td>
                  <td>2,0</td>
                  <td>2</td>
                  <td>5,5</td>
                  <td>80%</td>
                  <td></td>
                  <td></td>
                  <td class="resp-aprovado">Aprovado</td>
                </tr>
                <tr>
                  <td>Educação Física</td>
                  <td>5,0</td>
                  <td>2</td>
                  <td>9,0</td>
                  <td>1</td>
                  <td>9,0</td>
                  <td>1</td>
                  <td>5,0</td>
                  <td>2</td>
                  <td>7,0</td>
                  <td>90%</td>
                  <td></td>
                  <td></td>
                  <td class="resp-aprovado">Aprovado</td>
                </tr>
                <tr>
                  <td>Espanhol</td>
                  <td>5,0</td>
                  <td>1</td>
                  <td>9,0</td>
                  <td>2</td>
                  <td>9,0</td>
                  <td>2</td>
                  <td>5,0</td>
                  <td>2</td>
                  <td>7,0</td>
                  <td>80%</td>
                  <td></td>
                  <td></td>
                  <td class="resp-reprovado">Reprovado</td>
                </tr>
                <tr>
                  <td>História</td>
                  <td>5,0</td>
                  <td>1</td>
                  <td>5,0</td>
                  <td>2</td>
                  <td>6,0</td>
                  <td>2</td>
                  <td>5,0</td>
                  <td>2</td>
                  <td>6,0</td>
                  <td>90%</td>
                  <td></td>
                  <td></td>
                  <td class="resp-recuperacao">Recuperação</td>
                </tr>
                <tr>
                  <td>Matemática</td>
                  <td>9,0</td>
                  <td>1</td>
                  <td>9,0</td>
                  <td>2</td>
                  <td>9,0</td>
                  <td>2</td>
                  <td>5,0</td>
                  <td>2</td>
                  <td>7,0</td>
                  <td>70%</td>
                  <td></td>
                  <td></td>
                  <td class="resp-reprovado">Reprovado</td>
                </tr>
                <tr>
                  <td>Português</td>
                  <td>6,0</td>
                  <td>1</td>
                  <td>5,0</td>
                  <td>2</td>
                  <td>6,0</td>
                  <td>2</td>
                  <td>5,0</td>
                  <td>2</td>
                  <td>6,0</td>
                  <td>60%</td>
                  <td></td>
                  <td></td>
                  <td class="resp-recuperacao">Recuperação</td>
                </tr>
              </tbody>
            </table>

            <div class="resp-legenda">
              <p>
                <strong>N:</strong> Nota &nbsp; <strong>F:</strong> Frequência
              </p>
            </div>
          </div>
        </div>
      </main>
    </div>
  </body>
  <script src="scripts/dashboard.js"></script>
</html>
