<?php

require 'db.php';

$json_str = file_get_contents('php://input');
$data = json_decode($json_str, true);
// return $data;
if (is_array($data)) {
    foreach ($data as $item) {

        $checkQuery = "SELECT * FROM estoque WHERE produto = :produto AND cor = :cor AND tamanho = :tamanho AND deposito = :deposito AND data_disponibilidade = :data_disponibilidade";
        $checkStmt = $pdo->prepare($checkQuery);
        $checkStmt->execute([
            'produto' => $item['produto'],
            'cor' => $item['cor'],
            'tamanho' => $item['tamanho'],
            'deposito' => $item['deposito'],
            'data_disponibilidade' => $item['data_disponibilidade']
        ]);

        if ($checkStmt->rowCount() > 0) {

            $updateQuery = "UPDATE estoque SET
                quantidade = :quantidade,
                updated_at = :updated_at
                WHERE 
                    produto = :produto
                    AND cor = :cor
                    AND tamanho = :tamanho 
                    AND deposito = :deposito 
                    AND data_disponibilidade = :data_disponibilidade";

            $updateStmt = $pdo->prepare($updateQuery);
            $updateStmt->execute([
                'produto' => $item['produto'],
                'cor' => $item['cor'],
                'tamanho' => $item['tamanho'],
                'deposito' => $item['deposito'],
                'data_disponibilidade' => $item['data_disponibilidade'],
                'quantidade' => $item['quantidade'],
                'updated_at' => date('Y-m-d H:i:s') 
            ]);
            
        } else {

            $insertQuery = "INSERT INTO estoque 
                (
                    produto,
                    cor,
                    tamanho,
                    deposito,
                    data_disponibilidade,
                    quantidade,
                    created_at,
                    updated_at
                )
                VALUES 
                (
                    :produto, :cor,
                    :tamanho, :deposito,
                    :data_disponibilidade,
                    :quantidade,
                    :created_at,
                    :updated_at
                )";

            $insertStmt = $pdo->prepare($insertQuery);
            $insertStmt->execute([
                'produto' => $item['produto'],
                'cor' => $item['cor'],
                'tamanho' => $item['tamanho'],
                'deposito' => $item['deposito'],
                'data_disponibilidade' => $item['data_disponibilidade'],
                'quantidade' => $item['quantidade'],
                'created_at' => date('Y-m-d H:i:s'), 
                'updated_at' => date('Y-m-d H:i:s') 
            ]);
        }
    }
    echo json_encode(['message' => 'Produtos processados com sucesso!']);
} else {
    echo json_encode(['message' => 'JSON inválido']);
}

?>