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
    $router->get("/", "UserController:index");
    $router->get("/show", "UserController:visible");
    $router->post("/register", "UserController:cadastrar");
    $router->put("/updateRegister", "UserController:atualizar");
    $router->delete("/deleteRegister", "UserController:apagar");

    /**
     * 
     * Erro ao acessar o endpoint errado
     * 
     */
    $router->group("error");
    $router->get("/{errcode}", "UserController:error");

    $router->dispatch();

    if ($router->error()) {
        $router->redirect("/error/{$router->error()}");
    }