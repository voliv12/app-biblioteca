<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class principal extends CI_Controller {
 
    function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('date');
        $this->load->library('grocery_CRUD');
    }

    public function index(){
        $this->grocery_crud->set_table('libro');
        $this->grocery_crud->set_subject('Libros');
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
        $this->grocery_crud->required_fields('clasificacion','titulo','autor','editorial');
        $this->grocery_crud->columns('clasificacion','titulo','autor','editorial','ISBN','estado');
        //$this->grocery_crud->add_action('Smileys', 'http://www.midietaideal.com/spl/libros-de-la-biblioteca-icono-5623-16.png', 'prestamos/index/add');
        $this->grocery_crud->add_action('Prestamos','http://www.fancyicons.com/free-icons/155/quartz/png/16/books_16.png','','',array($this, 'just_a_test'));
        $this->grocery_crud->field_type('estado','hidden','Disponible');
        //$this->grocery_crud->set_rules('fecha_entrega','estado','No Disponible');
        $output = $this->grocery_crud->render();
        $this->_example_outputADM($output);
        }       

        function just_a_test($primary_key, $row){
        //return site_url('demo/action/action_photos').'?country='.$row->country;
        //$ide = $this->grocery_crud->callback_after_insert(array($this, 'mi_funcion'));  
        return site_url('prestamos/tablaprestamo/'.$primary_key.'/add/'.$primary_key);
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