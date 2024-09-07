<?php
namespace App\Back;
require_once '../vendor/autoload.php';

$methodo = $_SERVER['REQUEST_METHOD']; // pegar as requisições do frontend
$uri = $_SERVER['REQUEST_URI'];


$users = [];


switch ($methodo) {
    case 'GET':
        if ($uri == '/') {
            http_response_code(200);
            echo json_encode([
                'status' => true,
                'message' => 'Chegou com sucesso'
            ]);
        }
        break;

    case 'POST':
        if ($uri == '/') {
            $input = json_decode(file_get_contents('php://input'), true);
            http_response_code(201);
            echo json_encode([
                'message' => 'Usuário criado',
                'user' => $input
            ]);
        }
        break;

    case 'PUT':
        if (preg_match('/\/api\.php\/users\/(\d+)/', $uri, $matches)) {
            $id = $matches[1];
            $input = json_decode(file_get_contents('php://input'), true);
            $users[$id] = $input;
            http_response_code(200);
            echo json_encode([
                'status' => true,
                'message' => 'Usuário atualizado',
                'user' => $input
            ]);
        }
        break;

    case 'DELETE':
        if (preg_match('/\/api\.php\/users\/(\d+)/', $uri, $matches)) {
            $id = $matches[1];
            unset($users[$id]);
            http_response_code(204);
            echo json_encode([
                'status' => true,
                'message' => 'Usuário deletado'
            ]);
        }
        break;
}