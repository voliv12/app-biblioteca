<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Academico extends CI_Controller {
 
    function __construct()
    {
        parent::__construct();
 
        /* Standard Libraries of codeigniter are required */
        $this->load->database();
        $this->load->helper('url');
        /* ------------------ */ 
 
        $this->load->library('grocery_CRUD');
 
    }
 
    public function academico_registro()
    {
        $this->grocery_crud->set_table('academicos');
        $this->grocery_crud->set_subject('personal');
        $this->grocery_crud->required_fields('Num_personal','Nombre');
         $output = $this->grocery_crud->display_as('Num_personal','Numero de personal'); 
        $output = $this->grocery_crud->render();
        
        $this->_example_output($output);   
    }
 
   
 
    function _example_output($output = null)
 
    {
        $output->titulo_tabla = "Registro de Personal";
        $datos_plantilla['contenido'] =  $this->load->view('output_view', $output, TRUE);  
        $this->load->view('principal_view', $datos_plantilla);  
    }
}
 
