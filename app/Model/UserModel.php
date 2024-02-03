<?php 

    namespace App\Model;

    use App\Interface\GerarSql;
    use App\Config\Database;
    use PDO;

    class UserModel implements GerarSql
    {   

        public static $table = 'users';

        public static function create($data)
        {
            $id_sex = intval($data['id_sexes']);
            $age    = intval($data['age']);

            $stmt = Database::conn()->prepare("INSERT INTO " . self::$table . " (id_sexes, name, cpf, age, profession) VALUES (?,?,?,?,?)");
            $stmt->bindParam(1, $id_sex, PDO::PARAM_INT);
            $stmt->bindParam(2, $data['name'], PDO::PARAM_STR);
            $stmt->bindParam(3, $data['cpf'], PDO::PARAM_STR);
            $stmt->bindParam(4, $age, PDO::PARAM_INT);
            $stmt->bindParam(5, $data['profession'], PDO::PARAM_STR);

            $stmt->execute();
        }

        public static function select($table, $dados, $condition = null)
        {

        }
        
        public static function put($id, $data)
        {

        }

        public static function delete($id)
        {

        }

    }