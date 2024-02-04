<?php 

    namespace App\Model;

    use App\Interface\GerarSql;
    use App\Config\Database;
    use PDO;

    class UserModel implements GerarSql
    {   

        public static $table = 'users';

        /**
         * 
         * @return boolean
         * @author Juliano rezende 
         * @throws boolean o objetivo do metodo é registrar novo usuário
         * @method create
         * 
        */
        public static function create($data)
        {
            $create = Database::conn()->prepare("INSERT INTO " . self::$table . " (name, email, cpf, age, profession) VALUES (?,?,?,?,?)");
            $create->bindParam(1, $data['name'], PDO::PARAM_STR);
            $create->bindParam(2, $data['email'], PDO::PARAM_STR);
            $create->bindParam(3, $data['cpf'], PDO::PARAM_STR);
            $create->bindParam(4, $data['age'], PDO::PARAM_INT);
            $create->bindParam(5, $data['profession'], PDO::PARAM_STR);

            return $create->execute() ? true : false;
        }

        /**
         * 
         * @return array
         * @author Juliano rezende 
         * @throws array o objetivo do metodo realizar consulta dos dados do usuário
         * @method select
         * 
        */
        public static function select($campos, $condition = null)
        {
            $select = null;

            if ($condition == null) {
                $select = Database::conn()->prepare("SELECT $campos FROM " . self::$table);
            }else{
                $select = Database::conn()->prepare("SELECT $campos FROM " . self::$table . " WHERE $condition" );
            }
            
            $select->execute();
            $response_register = $select->fetchAll(PDO::FETCH_ASSOC);
           
            return $response_register;
        }
        
        public static function put($data)
        {
            $put = Database::conn()->prepare("UPDATE " . self::$table . " SET name = :name, email = :email, cpf = :cpf, age = :age, profession = :profession WHERE id_user = :id_user");

            $put->bindParam(':id_user', $data['id_user'], PDO::PARAM_INT);
            $put->bindParam(':name', $data['name'], PDO::PARAM_STR);
            $put->bindParam(':email', $data['email'], PDO::PARAM_STR);
            $put->bindParam(':cpf', $data['cpf'], PDO::PARAM_STR);
            $put->bindParam(':age', $data['age'], PDO::PARAM_INT);
            $put->bindParam(':profession', $data['profession'], PDO::PARAM_STR);
            
            return $put->execute() ? true : false;
        }

        public static function delete($id_user)
        {
            $put = Database::conn()->prepare("DELETE FROM " . self::$table . " WHERE id_user = :id_user");

            $put->bindParam(':id_user', $id_user['id_user'], PDO::PARAM_INT);
            
            return $put->execute() ? true : false;
        }

    }