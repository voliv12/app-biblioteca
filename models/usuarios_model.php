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
        $this->db->where('num_personal', $usuario);
        //$this->db->where('contrasena', $password);
        $query = $this->db->get();


        if ($query->num_rows() == 0){
            return FALSE;
        }else{
            return $query->row();
        }
     
     }


     //En esta funcion se actualiza el estado del libro de disponible a no disponible
     //Recibiendo como parametro el id del libro
     function actualizar_estado($id){
        $cambiaEstado = "No Disponible";
        $data = array('estado' => $cambiaEstado );
        $this->db->where('idLibro', $id)->update('libro',$data);
        //echo $this->db->last_query();
    }

    function mostrarCampos($id){
        $this->db->select('titulo, autor, clasificacion');
        $this->db->from('libro');
        $query = $this->db->where('idLibro',$id)->get();
        $row = $query->row();
        //echo $this->db->last_query();
        echo $row->titulo;
        echo $row->autor;
        echo $row->clasificacion;
        //return $row->titulo;
    }
}

?> 