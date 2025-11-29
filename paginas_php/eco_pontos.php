<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eco Pontos</title>
    <link rel="stylesheet" href="../css/eco_pontos.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/styleTabela.css">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
    <link rel="stylesheet" href="../css/mapa.css">
    
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" defer></script>
    <script src="../js/mapa.js" defer></script>
</head>
<body id="topo">
    <header>
        <nav>
            <div class="div1Header">
                <img class="imgLogo" src="../favicon/descarte.png" alt="logo">
                <h1>Descarte Sustentavél</h1>
            </div>

            <div class="div2Header">
                <a href="../index.html">Início</a>
                <a href="#ecoPontos">Eco Pontos</a>              
            </div>
        </nav>
    </header>

    <main>
        <h2 class="opcao">Opcões</h2>
        <div class="cadastro_excluir">
            <a href="../paginas_php/cadastrar.php">Cadastrar</a>
        </div>

        <!-- linha separadora -->
        <div class="separetorLine"></div>

        <!-- exibir tabela -->
        <?php
            include_once('../conexao/conexao.php');

            $sql = "SELECT * FROM cadastro_ecopontos";

            try {
                $stmt = $pdo->prepare($sql);
                $stmt->execute();

                $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                echo "Erro ao buscar dados: " . $e->getMessage();
            }
        ?>

        <div class="tabela-container">
            <table class="tabela-estilizada">
                <thead>
                    <tr>
                        <!-- <th>ID</th> -->
                        <th>Nome</th>
                        <th>CEP</th>
                        <th>Endereço</th>
                        <th>Tipo de Lixo</th>
                        <th>Ações</th> </tr>
                </thead>
                <tbody>
                    <?php if (count($resultados) > 0): ?>
                        <?php foreach ($resultados as $linha): ?>
                            <tr>
                                <!-- <td><?php echo $linha['id']; ?></td> -->
                                <td><?php echo $linha['nome']; ?></td>
                                <td><?php echo $linha['cep']; ?></td>
                                <td><?php echo $linha['endereco']; ?></td>
                                <td><?php echo $linha['tipo_de_lixo']; ?></td>
                                <td style="display: flex;">
                                    <a href="atualizar.php?id=<?php echo $linha['id']; ?>" class="btn-acao">Editar</a>

                                    <a href="excluir.php?id=<?php echo $linha['id']; ?>" class="btn-acao" onclick="return confirm('Tem certeza que deseja excluir este item?');">Excluir</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6">Nenhum dado encontrado.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

    <!-- Mapa -->
    <div class="divMapa">
        <div class="inp-but">
            <input type="text" id="searchInput" placeholder="Buscar por local">
            <button id="searchBtn">Buscar</button>            
        </div>
    </div>
    <div id="map"></div>                 

        <!-- linha separadora -->
        <div class="separetorLine"></div>

        <!-- formulario opniao -->
        <div class="opniaoPagina">
            <form action="https://formsubmit.co/c248d4be4926a6d04a862df1a287435b" method="post">
                <h3>Deixa sua opnião sobre a pagína</h3><br>

                <label for="nome">Nome:</label> 
                <input type="text" name="nome" id="nome" placeholder="seu nome aqui" maxlength="20" required> 

                <label for="email">E-mail:</label> 
                <input type="email" name="email" id="email" placeholder="seu email aqui" maxlength="50" required> 

                <label for="mensagem">Mensagem:</label> 
                <textarea name="mensagem" id="mensagem" placeholder="Escreva sua mensagem aqui" maxlength="1000" required></textarea> 

                <button class="buttonForm" type="submit">Enviar</button>

                <!-- remover captcha -->
                <input type="hidden" name="_captcha" value="false">

                <!-- ir para a pagina de agradecimento obrigado.html -->
                <!-- altera dominio! -->
                <input type="hidden" name="_next" value="http://localhost/descarte%20sustentavel/obrigado.html">
            </form>
    </main>

    <footer>
        <div>
            <p> Copyright&copy; - Feito por <b>Ryan</b>, <b>Daniela</b> e <b>Leonardo</b></p>
            <p>Projeto Descarte Sustentavél - <a href="https://www.umc.br/" target="_blank">UMC</a> - Curso: Análise e Desenvolvimento de Sistema - Professor: Pedro Miho</p>
            <a href="#topo">Voltar ao topo da página</a>        
        </div>
    </footer>
</body>
</html>