<?php   

    namespace App\Interface;

    interface GerarSql
    {
        public static function create($data);
        
        public static function select($table, $dados, $condition = null);

        public static function put($id, $data);

        public static function delete($id);

    }