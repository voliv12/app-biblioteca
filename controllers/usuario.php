<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Usuario extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->database(); //Aqui se carga el driver de la bd.
        $this->load->library('grocery_crud'); //Aqui se hace la carga de la libreria
    }

    public function index(){
        $this->grocery_crud->set_table('usuario_biblioteca');
        $this->grocery_crud->set_subject('Usuarios');
        $this->grocery_crud->required_fields('nombre','apellidos','telefono','direccion','correo','tipo_credencial');
        $this->grocery_crud->display_as('nombre','Nombre') 
        ->display_as('apellidos','Apellidos')
        ->display_as('telefono','Telefono')
        ->display_as('direccion','Direccion') 
        ->display_as('correo','E-mail')
        ->display_as('tipo_credencial','Tipo credencial'); 
        $output = $this->grocery_crud->render();
        $this->_example_output($output);    
    }
 
    function _example_output($output = null){
        $output->titulo_tabla = "Lista de usuarios registrados actualmente";
        $datos_plantilla['contenido'] =  $this->load->view('output_view', $output, TRUE);  
        $this->load->view('usuarios_view', $datos_plantilla);   
    }
}