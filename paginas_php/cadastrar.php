<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastra Eco pontos</title>
    <link rel="stylesheet" href="../css/eco_pontos.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/cadastrar.css">
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
                <a href="../paginas_php/eco_pontos.php">Eco Pontos</a>               
            </div>
        </nav>
    </header>

    <main>
        <h2 class="opcao">Opcões</h2>
        <div class="cadastro_excluir">          
            <a href="../paginas_php/eco_pontos.php">Voltar</a> 
        </div>

        <!-- linha separadora -->
        <div class="separetorLine"></div>
        
        <!-- formulario para cadastro -->
        <div class="formCadastrar">
            <form action="../CRUDs/create.php" method="post">
                <h3 style="text-align: center;">Cadastro de Eco Pontos</h3>

                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome" maxlength="100" required placeholder="Nome">

                <label for="cep">cep</label>
                <input type="text" id="cep" name="cep" class="cep" maxlength="8" placeholder="_____-___">

                <label for="endereco">Endereço</label>
                <input type="text" id="endereco" name="endereco" maxlength="100" required placeholder="(Rua, 00)"> 

                <label for="tipo_de_lixo">Tipo de Lixo</label>
                <select name="tipo_de_lixo" id="tipo_de_lixo" name="tipo_de_lixo">
                    <option value="Lixo Orgânico">Lixo Orgânico</option>
                    <option value="Lixo Reciclável (Seco)">Lixo Reciclável (Seco)</option>
                    <option value="Lixo Rejeito">Lixo Rejeito</option>
                    <option value="Lixo Perigoso">Lixo Perigoso</option>
                    <option value="Lixo Volumoso">Lixo Volumoso</option>
                    <option value="Lixo Eletrônico (E-lixo)">Lixo Eletrônico (E-lixo)</option>
                    <option value="Resíduos Verdes">Resíduos Verdes</option>
                    <option value="Outros">Outros</option>
                </select>

                <input type="submit" value="Enviar"></input>
            </form>
        </div>
        <div class="descarte_incorreto">

            <h1 style="margin-bottom: 20px;">Tipos de Lixo</h1>
            <h3>Lixo Orgânico</h3>
            <div>
                <p>Resíduos de origem biológica, que se decompõem naturalmente.
                <br>
                <b>Exemplos:</b> restos de comida, cascas de frutas, folhas, grãos, borra de café, ossos.</p>
            </div>

            <h3>Lixo Reciclável (Seco)</h3>
            <div>
               
                <p>Materiais que podem ser reaproveitados no processo de reciclagem.</p>
                <p><b>Principais subtipos:</b></p>
                <ul>
                    <li><b>Papel</b> – jornais, caixas, cadernos.</li>
                    <li><b>Plástico</b> – garrafas PET, embalagens, sacolas.</li>
                    <li><b>Metal</b> – latas de alumínio, aço, cobre</li>
                    <li><b>Vidro</b> – garrafas, potes, frascos.</li>
                </ul>
            </div>          

            <h3>Lixo Rejeito</h3>
            <div>               
                <p>Resíduos que <b>não têm reciclagem</b> e nem reaproveitamento possível. 
                <br>
                <b>Exemplos:</b> papel higiênico usado, fraldas descartáveis, papel engordurado, esponjas velhas.</p>
            </div>
            
            <h3>Lixo Perigoso</h3>
            <div>
                <p>Materiais que oferecem riscos à saúde ou ao meio ambiente.
                <br>
                <b>Exemplos:</b> pilhas, baterias, produtos químicos, agulhas, seringas, remédios vencidos, tintas, solventes.</p>
            </div>
            
            <h3>Lixo Volumoso</h3>
            <div>
                <p>Itens grandes que não vão na coleta comum. 
                <br>
                <b>Exemplos:</b> móveis velhos, colchões, eletrodomésticos grandes.</p>
            </div>
            
            <h3>Lixo Eletrônico (E-lixo)</h3>
            <div>
                <p>Equipamentos eletrônicos e suas peças.
                <br>
                <b>Exemplos:</b> celulares antigos, computadores, cabos, TVs, carregadores.</p>
            </div>
                
            <h3>Resíduos Verdes</h3>
            <div>
                <p>Material vegetal. 
                <br>
                <b>Exemplos:</b> galhos, podas de árvores, grama cortada.</p>
            </div>
        </div>

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
                <!-- <input type="hidden" name="_captcha" value="false"> -->

                <!-- ir para a pagina de agradecimento obrigado.html -->
                <!-- altera dominio! -->
                <!-- <input type="hidden" name="_next" value="http://localhost/descarte%20sustentavel/obrigado.html"> -->
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