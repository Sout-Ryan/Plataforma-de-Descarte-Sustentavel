<?php
include_once('../conexao/conexao.php');

// Verifica se o ID veio na URL
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepara o comando de deletar
    // IMPORTANTE: Troque 'nome_da_tabela' pelo nome real da sua tabela
    $sql = "DELETE FROM cadastro_ecopontos WHERE id = :id";
    
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        // Se der certo, volta para a página da lista
        header("Location: eco_pontos.php");
    } catch (PDOException $e) {
        echo "Erro ao excluir: " . $e->getMessage();
    }
} else {
    // Se tentar abrir o arquivo sem ID, volta pra lista
    header("Location: eco_pontos.php");
}
?>