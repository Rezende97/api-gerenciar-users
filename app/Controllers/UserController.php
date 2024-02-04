<?php 

    namespace App\Controllers;

    use App\Funcoes\Request;
    use App\Funcoes\Response;
    use App\Model\UserModel;

    class UserController
    {

        private $name;

        private $email;

        private $cpf;

        private $age;

        private $profession;

        private $message = null;
         
        private $status  = null;

        /**
         * @return string
         * @author Juliano rezende 
         * @throws array o objetivo do metodo é visualizar a listagem de perfil de usuários
         * @method showListUsers
        */
        public function showListUsers()
        {
            $listUsers = UserModel::select('*');

            $response_user = empty($listUsers) ? 'Lista de perfil de usuários sem registro' : $listUsers;

            return Response::json($response_user, 200);
        }

        /**
         * @return string
         * @author Juliano rezende 
         * @throws array o objetivo do metodo é visualizar o perfil do usuário
         * @method showListUsers
        */
        public function showUser($id_user)
        {
            $id_user = Request::all();

            if (in_array("", $id_user)) {
                return Response::json('Obrigatório informar a identificação do usuário', 400);
            }

            if (!filter_var($id_user['id_user'], FILTER_VALIDATE_INT)) {
                return Response::json('Usuário Inválido', 400);
            }

            $showUser = UserModel::select('*', "id_user = ".$id_user['id_user']);

            if(empty($showUser)){
                $this->message = 'Usuário não encontrado';
                $this->status  = 400;
            }else{
                $this->message = $showUser;
                $this->status  = 200;
            }

            return Response::json($this->message, $this->status);
        }
        
        /**
         * @return string
         * @author Juliano rezende 
         * @throws string o objetivo do metodo é registrar novo perfil de usuário
         * @method registerUser
         * 
        */
        public function registerUser($dataUser)
        {
            $dataUser         = Request::all();

            $this->name       = $dataUser['name'];
            $this->email      = $dataUser['email'];
            $this->cpf        = preg_replace('/[^0-9]/', '', $dataUser['cpf']);
            $this->age        = $dataUser['age'];
            $this->profession = $dataUser['profession'];

            if (in_array("", $dataUser)) {
                return Response::json('Obrigatório preencher todas as informações', 400);
            }

            $validationUser = UserModel::select('COUNT(*) as countCpf', "cpf = ".$this->cpf);
            
            if ($validationUser[0]['countCpf'] == 1) {
                return Response::json('CPF, já está cadastrado', 400);
            }

            if (!preg_match("/^[A-Za-z\s]{3,}$/", $this->name)) { 
                return Response::json('Nome inválido', 400);
            }
            
            if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
                return Response::json('E-mail inválido', 400);
            }

            if (!preg_match("/^\d{11}$/", $this->cpf)) {
                return Response::json('CPF inválido', 400);
            }
            
            if (!filter_var($this->age, FILTER_VALIDATE_INT)) {
                return Response::json('Idade inválida', 400);
            }

            if (!preg_match("/^[A-Za-z\s]{3,}$/", $this->profession)) { 
                return Response::json('Profissão inválido', 400);
            }

            $registerUser = [
                'name'       => $this->name,
                'email'      => $this->email,
                'cpf'        => $this->cpf,
                'age'        => $this->age,
                'profession' => $this->profession
            ];

            if(UserModel::create($registerUser)){
                $this->message = 'Usuário cadastrado com sucesso';
                $this->status  = 201;
            }else{
                $this->message = 'Erro ao cadastrar Usuário';
                $this->status  = 400;
            }

            return Response::json($this->message, $this->status);
        }

        /**
         * @return string
         * @author Juliano rezende 
         * @throws string o objetivo do metodo é atualizar o perfil do usuário
         * @method updateUser
         * 
        */
        public function updateUser($dataUser)
        {
            $dataUser = Request::all();

            $this->name       = $dataUser['name'];
            $this->email      = $dataUser['email'];
            $this->cpf        = preg_replace('/[^0-9]/', '', $dataUser['cpf']);
            $this->age        = $dataUser['age'];
            $this->profession = $dataUser['profession'];

            if (in_array("", $dataUser)) {
                return Response::json('Obrigatório preencher todas as informações', 400);
            }

            if (!filter_var($dataUser['id_user'], FILTER_VALIDATE_INT) || empty($dataUser['id_user'])) {
                return Response::json('Obrigatório informar a identificação do usuário', 400);
            }

            $validationUser = UserModel::select('COUNT(*) as countUser ', "id_user = ".$dataUser['id_user']);

            if ($validationUser[0]['countUser'] == 0) {
                return Response::json('Usuário não encontrado', 400);
            }

            if (!preg_match("/^[A-Za-z\s]{3,}$/", $this->name)) { 
                return Response::json('Nome inválido', 400);
            }
            
            if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
                return Response::json('E-mail inválido', 400);
            }
            
            if (!preg_match("/^\d{11}$/", $this->cpf)) {
                return Response::json('CPF inválido', 400);
            }
            
            if (!filter_var($this->age, FILTER_VALIDATE_INT)) {
                return Response::json('Idade inválida', 400);
            }

            if (!preg_match("/^[A-Za-z\s]{3,}$/", $this->profession)) { 
                return Response::json('Profissão inválido', 400);
            }  
            
            $putUser = [
                'id_user'    => $dataUser['id_user'],
                'name'       => $this->name,
                'email'      => $this->email,
                'cpf'        => $this->cpf,
                'age'        => $this->age,
                'profession' => $this->profession
            ];

            if(UserModel::put($putUser)){
                $this->message = 'Usuário atualizado com sucesso';
                $this->status  = 200;
            }else{
                $this->message = 'Erro ao atualizar Usuário';
                $this->status  = 400;
            }

            return Response::json($this->message, $this->status);
        }

        /**
         * @return string
         * @author Juliano rezende 
         * @throws string o objetivo do metodo é excluir o perfil do usuário
         * @method deleteUser
         * 
        */
        public function deleteUser($id_user)
        {
            $id_user = Request::all();

            if (in_array("", $id_user)) {
                return Response::json('Obrigatório preencher todas as informações', 400);
            }

            if (!filter_var($id_user['id_user'], FILTER_VALIDATE_INT) || empty($id_user['id_user'])) {
                return Response::json('Obrigatório informar a identificação do usuário', 400);
            }

            $validationUser = UserModel::select('COUNT(*) as countUser ', "id_user = ".$id_user['id_user']);

            if ($validationUser[0]['countUser'] == 0) {
                return Response::json('Usuário não encontrado', 400);
            }

            if(UserModel::delete($id_user)){
                $this->message = 'Usuário excluído com sucesso';
                $this->status  = 200;
            }else{
                $this->message = 'Erro ao excluir o Usuário';
                $this->status  = 400;
            }

            return Response::json($this->message, $this->status);
        }

    }