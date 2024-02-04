<?php 

    namespace App\Controllers;

    use App\Funcoes\Response;

    class ErrorController
    {
        /**
         * 
         * @return boolean
         * @author Juliano rezende 
         * @throws boolean o objetivo do metodo error é alertar o usuario que o endpoint informado esta incorreto
         * 
         */
        public function error()
        {
           echo Response::json('Endpoint não encontrada', 404);

           return true;
        }
    }