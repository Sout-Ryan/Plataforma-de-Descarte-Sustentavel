<?php
    include_once('../conexao/conexao.php');

    if(isset($_POST['btn-atualizar'])) {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $cep = $_POST['cep'];
        $endereco = $_POST['endereco'];
        $tipo = $_POST['tipo_de_lixo'];

        $sql = "UPDATE cadastro_ecopontos SET nome=:nome, cep=:cep, endereco=:endereco, tipo_de_lixo=:tipo WHERE id=:id";
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':cep', $cep);
        $stmt->bindParam(':endereco', $endereco);
        $stmt->bindParam(':tipo', $tipo);
        $stmt->bindParam(':id', $id);

        if($stmt->execute()) {
            header("Location: eco_pontos.php");
        } else {
            echo "Erro ao atualizar.";
        }
    }

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM cadastro_ecopontos WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $dados = $stmt->fetch(PDO::FETCH_ASSOC);
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Eco Ponto</title>
    <link rel="stylesheet" href="../css/styleEditar.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>  

    <header style="margin-bottom: 200px;">
        <nav>
            <div class="div1Header">
                <img class="imgLogo" src="../favicon/descarte.png" alt="logo">
                <h1>Descarte Sustentavél</h1>
            </div>

            <div class="div2Header">
                <a href="../index.html">Início</a>
                <a href="eco_pontos.php">Eco Pontos</a>              
            </div>
        </nav>
    </header>

    <!-- formulario para editar -->
    <div class="form-container">
        <h2>Editar Ponto de Coleta</h2>
        
        <form action="atualizar.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">

            <label>Nome:</label>
            <input type="text" name="nome" value="<?php echo $dados['nome']; ?>" maxlength="100" required>

            <label>CEP:</label>
            <input type="text" name="cep" value="<?php echo $dados['cep']; ?>" maxlength="8" required>

            <label>Endereço:</label>
            <input type="text" name="endereco" value="<?php echo $dados['endereco']; ?>" maxlength="100" required>
            
            <label>Tipo de Lixo:</label>
            <select name="tipo_de_lixo" id="tipo_de_lixo" class="select">
                <option value="Lixo Orgânico" <?php echo ($dados['tipo_de_lixo'] == 'lixo_organico') ? 'selected' : ''; ?>>Lixo Orgânico</option>
                <option value="Lixo Reciclável (Seco)" <?php echo ($dados['tipo_de_lixo'] == 'lixo_reciclavel') ? 'selected' : ''; ?>>Lixo Reciclável (Seco)</option>
                <option value="Lixo Rejeito" <?php echo ($dados['tipo_de_lixo'] == 'lixo_rejeito') ? 'selected' : ''; ?>>Lixo Rejeito</option>
                <option value="Lixo Perigoso" <?php echo ($dados['tipo_de_lixo'] == 'lixo_perigoso') ? 'selected' : ''; ?>>Lixo Perigoso</option>
                <option value="Lixo Volumoso" <?php echo ($dados['tipo_de_lixo'] == 'lixo_volumoso') ? 'selected' : ''; ?>>Lixo Volumoso</option>
                <option value="Lixo Eletrônico (E-lixo)" <?php echo ($dados['tipo_de_lixo'] == 'lixo_eletronico') ? 'selected' : ''; ?>>Lixo Eletrônico (E-lixo)</option>
                <option value="Resíduos Verdes" <?php echo ($dados['tipo_de_lixo'] == 'residuos_verdes') ? 'selected' : ''; ?>>Resíduos Verdes</option>
                <option value="Outros" <?php echo ($dados['tipo_de_lixo'] == 'outros') ? 'selected' : ''; ?>>Outros</option>
            </select>

            <div class="botoes">
                <a href="eco_pontos.php" class="btn-cancelar">Cancelar</a>
                <button type="submit" name="btn-atualizar">Salvar</button>
            </div>
        </form>
    </div>

</body>
</html>