<?php
    require("../conexao/conexao.php");



    if(isset($_POST)) {

        $nome = $_POST['nome'];
        $cep = $_POST['cep'];
        $endereco = $_POST['endereco'];
        $tipo_de_lixo = $_POST['tipo_de_lixo'];
        
        $query = "INSERT INTO cadastro_ecopontos (nome,cep,endereco,tipo_de_lixo) VALUES
        ('$nome', '$cep', '$endereco', '$tipo_de_lixo')";

        
        // statment - evitar sql injection
        $stmt = $pdo->prepare($query);
        $stmt->execute(); 

        // mudar dominio
        header("Location: ../paginas_php/eco_pontos.php?cadastro=sucesso");
    }
?>





