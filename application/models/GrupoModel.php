<?php
class GrupoModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function findGrupos(){
        $this->db->select('Clv_Grupo');
        $this->db->from('Grupo');
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