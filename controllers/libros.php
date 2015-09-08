<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Usuario extends CI_Controller {
 
    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->database(); //Aqui se carga el driver de la bd.
        $this->load->library('grocery_crud'); //Aqui se hace la carga de la libreria
    }

   public function index(){
        $this->grocery_crud->set_table('libro');
        $this->grocery_crud->set_subject('Libros de la biblioteca');
        $this->grocery_crud->required_fields('clasificacion','titulo','autor','editorial','estado');
        $this->grocery_crud->display_as('clasificacion','Clasificacion')
        ->display_as('titulo','Titulo')
        ->display_as('autor','Autor')
        ->display_as('idLibro','Estado del Libro');
        $this->grocery_crud->set_relation('idLibro','prestamo','estado');
        $output = $this->grocery_crud->render();
        $this->_example_output($output);    
    }
 
    function _example_output($output = null){
        $output->titulo_tabla = "Consulta de libros";
        $datos_plantilla['contenido'] =  $this->load->view('output_view', $output, TRUE);  
        $this->load->view('libros_view', $datos_plantilla);   
    }