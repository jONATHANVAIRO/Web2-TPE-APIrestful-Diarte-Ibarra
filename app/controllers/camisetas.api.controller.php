<?php
require_once 'app/models/camisetas.model.php';
require_once 'app/views/api.view.php';
require_once 'app/controllers/api.controller.php';

class CamisetasApiController extends ApiController
{
    private $model;

    function __construct()
    {
        parent::__construct();
        $this->model = new CamisetasModel();
        $this->view = new ApiView();
    }

    function getCamisetas($params = [])
    {
        if (isset($_GET['sort'])) {
            $params['sort'] = $_GET['sort'];
        }

        if (isset($_GET['order'])) {
            $params['order'] = $_GET['order'];
        }
        $camisetas = $this->model->getCamisetasOrder($params);
        $this->view->response($camisetas, 200);



        if (empty($params)) {
            $camisetas =  $this->model->getcamisetas();
            $this->view->response($camisetas, 200);
        }
    }

    function getCamisetaByid($params = [])
    {
        $camiseta = $this->model->getCamisetaById($params[':ID']);
        if (!empty($camiseta)) {
            $this->view->response($camiseta, 200);
        } else {
            $this->view->response(['La Camiseta con el id = (' . $params[':ID'] . ') no existe'], 404);
        }
    }




    function createCamisetas($params = [])
    {

        $body = $this->getData();
        if (empty($body->nombre_equipo)) {
            return $this->view->response('No ingreso el nombre del equipo', 400);
        }
        $nombre_equipo = $body->nombre_equipo;

        if (empty($body->categoria_camiseta)) {
            return $this->view->response('No ingreso la categoria del equipo', 400);
        }
        $categoria_camiseta = $body->categoria_camiseta;

        if (empty($body->tipo_camiseta)) {
            return $this->view->response('No ingreso el tipo de camiseta', 400);
        }
        $tipo_camiseta = $body->tipo_camiseta;

        if (empty($body->imagen)) {
            return $this->view->response('No ingreso la imagen', 400);
        }
        $imagen = $body->imagen;

        if (empty($body->id_decada)) {
            return $this->view->response('No ingreso la id de la decada', 400);
        }
        $id_decada = $body->id_decada;


        $this->model->createCamisetas($nombre_equipo, $categoria_camiseta, $tipo_camiseta, $imagen, $id_decada);

        $this->view->response('La camiseta fue insertada. Camisetas actualizadas:  ', 201);

        $camisetas = $this->model->getcamisetas();
        $this->view->response($camisetas, 201);
    }
   

    function updateCamisetas($params = [])
    {
        if (empty($params)) {
            $this->view->response('No ha ingresado una ID', 404);
        } else {


            $id = $params[':ID'];
            $camiseta = $this->model->getCamisetaById($params[':ID']);

            if ($camiseta) {
                $body = $this->getData();

                if (empty($body->nombre_equipo)) {
                    return $this->view->response('No ingreso el nombre del equipo', 400);
                }
                $nombre_equipo = $body->nombre_equipo;
        
                if (empty($body->categoria_camiseta)) {
                    return $this->view->response('No ingreso la categoria del equipo', 400);
                }
                $categoria_camiseta = $body->categoria_camiseta;
        
                if (empty($body->tipo_camiseta)) {
                    return $this->view->response('No ingreso el tipo de camiseta', 400);
                }
                $tipo_camiseta = $body->tipo_camiseta;
        
                if (empty($body->imagen)) {
                    return $this->view->response('No ingreso la imagen', 400);
                }
                $imagen = $body->imagen;
        
                if (empty($body->id_decada)) {
                    return $this->view->response('No ingreso la id de la decada', 400);
                }
                $id_decada = $body->id_decada;

                $this->model->updateCamisetasData($nombre_equipo, $categoria_camiseta, $tipo_camiseta, $imagen, $id_decada, $id);

                $this->view->response('La camiseta con el id = ' . $id . ' fue modificada', 200);
            } else {
                $this->view->response('La camiseta con el id = ' . $id . ' no existe', 404);
            }
        }
    }

    function ERROR()
    {
        $this->view->response('No ha ingresado una ID', 404);
    }
}
