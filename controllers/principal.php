<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class principal extends CI_Controller {
 
     function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('date');
        $this->load->library('grocery_CRUD');
    
        //Variable global
        $variableGlobal = "";
        $registro = "";

       //Obtenemos la fecha actual
        $timestamp = now();
        $timezone = 'UM8';
        $daylight_saving = FALSE;
        $now = gmt_to_local($timestamp, $timezone, $daylight_saving);
        $datestring = "%Y-%m-%d %h:%i:%s";
        $this->now = mdate ($datestring, $now);
        $this->load->helper('date');
        }

        //Se ejecuta cuando el usuario no esta logeado
        function index(){
            $crud = new grocery_crud();
            $crud->set_table('libro');
            $crud->set_subject('Libros');
            $crud->unset_add();
            $crud->unset_edit();
            $crud->unset_delete();
            $crud->unset_print();
            $crud->unset_export();
            $crud->columns('clasificacion','titulo','autor','editorial','ISBN','estado');
            $output = $crud->render();
            $this->_example_output($output);
        }

        //Cuando el usuario esta logeado se ejecuta esta funcion
        function admi(){
            $crud = new grocery_crud();
            $crud->set_table('libro');
            $crud->set_subject('Libros');
            $crud->required_fields('clasificacion','titulo','autor','editorial','cantidad');
            $crud->columns('clasificacion','titulo','autor','editorial','ISBN','cantidad','cantidadDisponible','estado');
            $crud->display_as('cantidadDisponible','Libros Disponibles')
            ->display_as('cantidad','Libros en Biblioteca');
            $crud->add_fields('clasificacion','titulo','autor','editorial','cantidad','ISBN','estado');
            $crud->edit_fields('clasificacion','titulo','autor','editorial','cantidad','ISBN','estado');
            $crud->add_action('Prestamos','http://www.fancyicons.com/free-icons/155/quartz/png/16/books_16.png','','',array($this, 'just_a_test'));
            $output = $crud->render();
            $this->_example_outputADM($output);
        }

        //En esta funcion es llamada por la accion Prestamos, donde se le 
        //pasa el ID del libro al cual se va a prestar
        function just_a_test($primary_key){
            global $variableGlobal, $registro;
            $variableGlobal = $primary_key;
            $this->db->select('titulo,autor,clasificacion');
            $this->db->from('libro');
            $query = $this->db->where('idLibro',$variableGlobal)->get();
            $registro = $query->row();
            return site_url('prestamos/tablaprestamo/'.$variableGlobal.'/'.$registro->clasificacion.' '.$registro->titulo.' '.$registro->autor.'/add/'.$variableGlobal.'/'.$registro->clasificacion.' '.$registro->titulo.' '.$registro->autor);
        }


        //Es llamada por la funcion index para el usuario normal
        function _example_output($output = null){
            $output->titulo_tabla = "Libros actualmente en la Biblioteca";
            $datos_plantilla['contenido'] =  $this->load->view('output_view', $output, TRUE);  
            $this->load->view('principal_viewusuario', $datos_plantilla); 
        }

        //Es llamada por la funcion de admi para el administrador
        function _example_outputADM($output = null){
            $output->titulo_tabla = "Libros actualmente en la Biblioteca";
            $datos_plantilla['contenido'] =  $this->load->view('output_view', $output, TRUE);  
            $this->load->view('principal_view', $datos_plantilla); 
        }
}