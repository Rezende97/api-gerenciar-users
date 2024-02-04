<?php 

    namespace App\Config;

    use PDO;
    use PDOException;

    class Database
    {
        private static $host      = HOST;
        private static $user      = USER;
        private static $password  = PASSWORD;
        private static $database  = DATABASE;
        private static $charset   = 'utf8';

        private static function conexao()
        {
            try {
                $pdo = new PDO("mysql:host=".self::$host.";dbname=".self::$database.";charset=".self::$charset, self::$user, self::$password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }

            return $pdo;
        }

        public static function conn()
        {
            return self::conexao();
        }
    }