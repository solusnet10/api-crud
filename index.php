<?php
/** Informa o nivel dos erros que serão exibidos */
error_reporting(E_ALL);
/** Habilita a exibição de erros */
ini_set("display_errors", 1);


// Headers necessários
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Conexão com o banco de dados
include_once 'conexao.php';

$query_produtos = "SELECT id, titulo, descricao FROM produtos ORDER BY ID DESC";
$result_produtos = $conn->prepare($query_produtos);
$result_produtos->execute();

if (($result_produtos) AND ($result_produtos->rowCount() != 0)) {
    while ($row_produto = $result_produtos->fetch(PDO::FETCH_ASSOC)) {
        extract($row_produto);

        $lista_produtos["records"][$id] = [
            'id' => $id,
            'titulo' => $titulo,
            'descricao' => $descricao
        ];
    }

    // Resposta com status(200)
    http_response_code(200);

    // Retorna os produtos em formato json
    echo json_encode($lista_produtos);
}