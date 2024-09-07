<?php
namespace App\Back\Controller;
use App\Back\Model\User;

class UserController {
    public function getUsers() {
        return [
            ['nome'=> 'eux', 'idade'=>15],
            ['nome'=> 'tu', 'idade'=> 16],
        ];
    }

    public function insertUsers($data) {
        $user = new User();
        $idade = $data['idade'];

        $idade += 5;
        $user->setNome($data['nome']);
        $user->setIdade($idade);
        return ['nome'=> $user->getNome(), 'idade'=> $user->getIdade()];
    }

    public function updateUsers($id, $data) {
        $user = new User();
        $idade = $data['idade'];
        $idade += 5;
        $user->setNome($data['nome']);
        $user->setIdade($idade);
        return ['nome'=> $user->getNome(), 'idade'=> $user->getIdade()];
    }

    public function deleteUsers($id, $data) {
        $user = new User();
        $idade = $data['idade'];
        $idade -= 5;
        $user->setNome($data['nome']);
        $user->setIdade($idade);
        return ['nome'=> $user->getNome(), 'idade'=> $user->getIdade()];
    }
}