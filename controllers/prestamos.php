<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Prestamos extends CI_Controller {
 
    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->database(); //Aqui se carga el driver de la bd.
        $this->load->library('grocery_crud'); //Aqui se hace la carga de la libreria
    }

   public function index(){
        $this->grocery_crud->set_table('prestamo');
        $this->grocery_crud->set_subject('Prestamos');
        $this->grocery_crud->required_fields('Fecha_salida', 'Fecha_entrada');
        $this->grocery_crud->display_as('idLibro','Titulo del Libro')
        ->display_as('idUsuario','Nombre de Usuario')
        ->display_as('Fecha_salida','Fecha de salida') 
        ->display_as('Fecha_entrada','Fecha de entrega');
        $this->grocery_crud->set_relation('idLibro','libro','titulo');
        $this->grocery_crud->set_relation('idUsuario','usuario_biblioteca','{nombre} {apellidos}');
        $output = $this->grocery_crud->render();
        $this->_example_output($output);    
    }
 
    function _example_output($output = null){
        $output->titulo_tabla = "Consulta de Prestamos de Libros";
        $datos_plantilla['contenido'] =  $this->load->view('output_view', $output, TRUE);
        $this->load->view('prestamos_view', $datos_plantilla);   
    }
}