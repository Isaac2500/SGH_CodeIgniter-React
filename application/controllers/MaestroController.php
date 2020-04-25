<?php
use Restserver\Libraries\RestController;
require_once(APPPATH . 'controllers/header.php');

class MaestroController extends RestController {
    private $modelName = "MaestroModel";
    private $peticion;

    public function __construct() {
		parent::__construct();
		
		header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

        $this->load->model($this->modelName);
        $this->peticion = new Peticion();
    }

    public function maestros_get($usuario) {
		try {
			$data = $this->MaestroModel->findSpecific($usuario);
			$response = $this->peticion->aceptada($data);
		} catch (\Exception $e) {
			$response = $this->peticion->rechazada();
		}
		
		$this->response($response['response'], $response['codeHTTP']);
	}

	public function maestros_horarios_get($usuario, $dia = null) {
		try {
			if(isset($dia)) {
				$data = $this->MaestroModel->revisarHorario($usuario);
			}else {
				$data = $this->MaestroModel->revisarHorarioDia($usuario, $dia);
			}
			$response = $this->peticion->aceptada($data);
		} catch (\Exception $e) {
			$response = $this->peticion->rechazada();
		}
		
		$this->response($response['response'], $response['codeHTTP']);
	}

}
?>