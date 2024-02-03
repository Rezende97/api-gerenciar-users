<?php 

    namespace App\Funcoes;

    class Request
    {
        public static function all()
        {
            return json_decode(file_get_contents("php://input"), true);
        } 
    }