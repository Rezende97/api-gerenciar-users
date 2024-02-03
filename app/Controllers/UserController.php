<?php 

    namespace App\Controllers;

    use App\Funcoes\Request;
    use App\Funcoes\Response;
    use App\Model\UserModel;

    class UserController
    {
        public function index()
        {
            // echo json_encode(['status' => 200, "message" => 'funcionou o metodo']);
        }

        public function visible()
        {
            echo json_encode(['status' => 200, "message" => 'funcionou o metodo']);
        }
        
        public function cadastrar()
        {
            $dataUser = Request::all();

            if (in_array("", $dataUser)) {
                echo Response::json('Obrigatório preencher todas as informações', 400);
                return false;
            }

            UserModel::create($dataUser);

            // echo json_encode(['status' => 200, "message" => 'funcionou o metodo']);
        }

        public function atualizar()
        {
            echo json_encode(['status' => 200, "message" => 'funcionou o metodo']);
        }

        public function apagar()
        {
            echo json_encode(['status' => 200, "message" => 'funcionou o metodo']);
        }

        public function error()
        {
            echo json_encode(['status' => 400, "message"    => 'erro']);
        }
    }