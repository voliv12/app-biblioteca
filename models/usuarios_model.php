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
        //$this->db->update('libro', 'estado');
        //$this->db->select('estado');
        //$this->db->from('libro');
        //$this->db->set('estado',$cambiaEstado);
        //echo $this->db->last_query();
    }

    //En esta funcion se quiere evaluar la cantidad de los libros, cuantos quedan disponibles
    //actualmente en el sistema por si queda solo 1, se manda a llamar la funcion de actualizar
    //el estado, para pasarlo a no disponible, si no que solo reste en 1 en el campo cantidad
    function cantidad($id){
        $this->db->select('cantidad');
        $this->db->from('libro');
        $query = $this->db->where('idLibro',$id)->get();

        if ($query->num_rows() > 0){
        
            foreach ($query->result() as $row) {
                echo $row->cantidad;
        
                if ($row->cantidad > 1){
                $data = array('cantidad' => 'cantidad=cantidad-1');
                $cantidadOri = $row->cantidad;
                $this->db->update('libro',$data);
                    echo "se quita un valor";
                }
        
                else{
                    $this->actualizar_estado($id);
                    echo "llega al segundo if";
                }
        
            }
        }
    }
}

?> 