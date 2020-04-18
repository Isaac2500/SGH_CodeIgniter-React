<?php
class GrupoModel extends CI_Model {
    private $tabla = 'grupo';
    private $clvGrupo = 'Clv_Grupo';
    private $materia;
    private $aula;
    private $carrera;
    private $alumnos;
    private $maestro;

    public function __construct() {
        $this->load->database();
    }

    public function findAlumnos($clvGrupo) {
        $this->db->select();
        $this->db->from($this->tabla);
        $this->db->where($this->clvGrupo, $clvGrupo);
        $consulta = $this->db->get();
        
        return $consulta->result();
    }
}