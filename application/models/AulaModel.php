<?php
class AulaModel extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function findAulas() {
        $this->db->select();
        $this->db->from("aula");
        $query = $this->db->get();

        if($query->num_rows() > 0) {
            return $query->result();
        }else {
            $mensaje['mensaje'] = 'No se encontraron coincidencias';
            return $mensaje;
        }
    }
}
?>