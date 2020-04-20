<?php
use Restserver\Libraries\RestController;
require_once(APPPATH . 'controllers/header.php');

class AlumnoController extends RestController {
    private $modelName = "AlumnoModel";
    private $peticion;

    public function __construct() {
        parent::__construct();

        $this->load->model($this->modelName);
        $this->peticion = new Peticion();
    }
    
	public function alumnos_get($usuario) {
		try {
            $data = $this->AlumnoModel->findSpecific($usuario);
			$response = $this->peticion->aceptada($data);
		} catch (\Exception $e) {
            $response = $this->peticion->rechazada();
		}
		
		$this->response($response['response'], $response['codeHTTP']);
	}

	public function alumnos_horarios_get($usuario, $dia) {
		try {
			if(isset($dia)) {
				$data = $this->AlumnoModel->revisarHorario($usuario);
			}else {
				$data = $this->AlumnoModel->revisarHorario($usuario, $dia);
			}
			$response = $this->peticion->aceptada($data);
		} catch (\Exception $e) {
			$response = $this->peticion->rechazada();
		}

		$this->response($response['response'], $response['codeHTTP']);
    }
}
?>