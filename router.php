<?php
    require_once 'config.php';
    require_once 'libs/router.php';

    require_once 'app/controllers/api.controller.php';
    require_once 'app/controllers/camisetas.api.controller.php';
    

    $router = new Router();

    #                 endpoint                verbo        controller                     método
    $router->addRoute('camisetas',            'GET',    'CamisetasApiController',   'getCamisetas'          );
    $router->addRoute('camisetas/:ID',        'GET',    'CamisetasApiController',   'getCamisetaByid'          );
    $router->addRoute('camisetas',            'POST',   'CamisetasApiController',   'createCamisetas'       );
    $router->addRoute('camisetas/:ID',        'PUT',    'CamisetasApiController',   'updateCamisetas'       );
    $router->addRoute('camisetas' ,  'PUT', 'CamisetasApiController',   'ERROR'  );
   

    
    
    
    #               del htaccess resource=(), verbo con el que llamo GET/POST/PUT/etc
    $router->route($_GET['resource']        , $_SERVER['REQUEST_METHOD']);

