<?php 

    require_once __DIR__ . "/vendor/autoload.php";

    use CoffeeCode\Router\Router;

    $router = new Router(URL);

    $router->namespace("App\Controllers");

    /**
     * 
     * Agrupamento das rotas do usuario
     * 
     */
    $router->group(null);
    // Listar todos os usuários
    $router->get("/", "UserController:showListUsers");
    // Listar apenas um usuário
    $router->get("/showUser/id", "UserController:showUser");
    // cadastrar usuário
    $router->post("/registerUser", "UserController:registerUser");
    // atualizar dados do usuário
    $router->put("/updateRegisterUser/id", "UserController:updateUser");
    // excluir usuário
    $router->delete("/deleteRegisterUser/id", "UserController:deleteUser");

    /**
     * 
     * Erro ao acessar o endpoint errado
     * 
     */
    $router->group("error");
    $router->get("/{errcode}", "ErrorController:error");

    $router->dispatch();

    if ($router->error()) {
        $router->redirect("/error/{$router->error()}");
    }