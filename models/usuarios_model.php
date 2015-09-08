<?php
//require_once APPPATH.'models/Generic_Dataset_Model.php';

class Usuarios_model extends CI_Model
{        
    function __construct(){
        parent :: __construct();
        $this->load->database();
    }

    function buscar_en_BD($usuario, $password)
    {
        $this->db->select('nombre');
        $this->db->from('administrador');
        //$this->db->where('num_personal', $usuario);
        //$this->db->where('contrasenia', $password);
        $query = $this->db->get();
              
        if ($query->num_rows() == 0){
            return FALSE;
        }else{
            return $query->row();
        }
     }
     
     
}

?> 