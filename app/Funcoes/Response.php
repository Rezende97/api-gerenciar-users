<?php 

    namespace App\Funcoes;

    class Response
    {
        public static function json($message, $status){
            return json_encode(['status' => $status, "message" => $message], JSON_UNESCAPED_UNICODE);
        }
    }