<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Usuario extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->database(); //Aqui se carga el driver de la bd.
        $this->load->library('grocery_crud'); //Aqui se hace la carga de la libreria
    }

    //Funcion que se ejecuta para mostrar los datos de los usuarios
    public function index(){
        $crud = new grocery_crud();
        $crud->set_table('usuario_biblioteca');
        $crud->set_subject('Usuarios');
        $crud->required_fields('nombre','apellidos','telefono','direccion','correo','tipo_credencial');
        $crud->display_as('nombre','Nombre') 
        ->display_as('apellidos','Apellidos')
        ->display_as('telefono','Telefono')
        ->display_as('direccion','Direccion') 
        ->display_as('correo','E-mail')
        ->display_as('tipo_credencial','Tipo credencial')
        ->display_as('contrasena','Contraseña'); 
        $output = $crud->render();
        $this->_example_output($output);    
    }
 
    //Es mandada a llamar por la funcion anterior
    function _example_output($output = null){
        $output->titulo_tabla = "Lista de usuarios registrados actualmente";
        $datos_plantilla['contenido'] =  $this->load->view('output_view', $output, TRUE);  
        $this->load->view('usuarios_view', $datos_plantilla);   
    }
}