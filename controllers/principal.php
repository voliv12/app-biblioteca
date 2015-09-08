<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class principal extends CI_Controller {
 
    function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->library('grocery_CRUD');
    }
 
    public function index(){
        $this->grocery_crud->set_table('libro');
        $this->grocery_crud->set_subject('Libros');
        $this->grocery_crud->required_fields('clasificacion','titulo','autor','editorial','ISBN','estado');
        $this->grocery_crud->display_as('clasificacion','Clasificacion') 
        ->display_as('titulo','Titulo') 
        ->display_as('autor','Autor') 
        ->display_as('editorial','Editorial')
        ->display_as('ISBN','ISBN')
        ->display_as('estado','Estado del libro'); 
        $this->grocery_crud->unset_add();
        $this->grocery_crud->unset_edit();
        $this->grocery_crud->unset_delete();
        $this->grocery_crud->unset_print();
        $this->grocery_crud->unset_export();
        $output = $this->grocery_crud->render();
        $this->_example_output($output);
        }

        function admi(){
        $this->grocery_crud->set_table('libro');
        $this->grocery_crud->set_subject('Libros');
        $this->grocery_crud->required_fields('clasificacion','titulo','autor','editorial','ISBN','estado');
        $this->grocery_crud->display_as('clasificacion','Clasificacion') 
        ->display_as('titulo','Titulo') 
        ->display_as('autor','Autor') 
        ->display_as('editorial','Editorial')
        ->display_as('ISBN','ISBN')
        ->display_as('estado','Estado del libro'); 
        $output = $this->grocery_crud->render();
        $this->_example_outputADM($output);
        }
        
        function _example_output($output = null){
        $output->titulo_tabla = "Libros actualmente en la Biblioteca";
        $datos_plantilla['contenido'] =  $this->load->view('output_view', $output, TRUE);  
        $this->load->view('principal_viewusuario', $datos_plantilla); 
        }  

        function _example_outputADM($output = null){
        $output->titulo_tabla = "Libros actualmente en la Biblioteca";
        $datos_plantilla['contenido'] =  $this->load->view('output_view', $output, TRUE);  
        $this->load->view('principal_view', $datos_plantilla); 
        }

}
 