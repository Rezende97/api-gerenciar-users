<?php 

    namespace App\Funcoes;

    class Response
    {
        /**
         * @return string
         * @author Juliano rezende 
         * @throws string o objetivo do metodo é realizar a comunicação em json
         * @method json
         * 
        */
        public static function json($message, $status){
            echo $json = json_encode(['status' => $status, "message" => $message], JSON_UNESCAPED_UNICODE);

            return $json;
        }
    }