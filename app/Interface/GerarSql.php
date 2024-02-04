<?php   

    namespace App\Interface;

    interface GerarSql
    {
        public static function create($data);
        
        public static function select($campos, $condition = null);

        public static function put($data);

        public static function delete($id);

    }