<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Prestamos extends CI_Controller {
 
    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('date');
        $this->load->database(); //Aqui se carga el driver de la bd.
        $this->load->library('grocery_crud'); //Aqui se hace la carga de la libreria
}

        function tablaprestamo($Llave_primaria){
        $variable=$Llave_primaria;
        $fecha = date("Y/m/d");
        $this->grocery_crud->set_table('prestamo');
        $this->grocery_crud->set_subject('Prestamos');
        $this->grocery_crud->required_fields('Fecha_salida', 'Fecha_entrada');
        $this->grocery_crud->display_as('idUsuario','Nombre de Usuario')
        ->display_as('idLibro','Nombre del libro');
        $this->grocery_crud->unset_edit();
        $this->grocery_crud->unset_delete();
        $this->grocery_crud->unset_print();
        $this->grocery_crud->unset_export();
        $this->grocery_crud->field_type('idLibro','hidden',$variable);
        //$this->grocery_crud->callback_before_insert(array($this,'mi_funcion'));
        $this->grocery_crud->set_relation('idUsuario','usuario_biblioteca','{nombre} {apellidos}');
        $this->grocery_crud->field_type('fecha_salida','hidden',$fecha);
        //$this->grocery_crud->set_relation('idLibro','libro','titulo');
        $output = $this->grocery_crud->render();
        $this->grocery_crud->set_relation('idLibro','libro','titulo');
        $this->_example_output($output);    
    }

        function tabla(){
        $fecha = date("Y/m/d");
        $this->grocery_crud->set_table('prestamo');
        $this->grocery_crud->set_subject('Prestamos');
        $this->grocery_crud->required_fields('Fecha_salida', 'Fecha_entrada');
        $this->grocery_crud->display_as('idUsuario','Nombre de Usuario')
        ->display_as('idLibro','Nombre del libro');
        $this->grocery_crud->unset_add();
        $this->grocery_crud->unset_edit();
        $this->grocery_crud->unset_delete();
        $this->grocery_crud->unset_print();
        $this->grocery_crud->unset_export();
        $this->grocery_crud->set_relation('idLibro','libro','titulo');
        //$this->grocery_crud->field_type('idLibro','hidden');
        //$this->grocery_crud->callback_before_insert(array($this,'mi_funcion'));
        $this->grocery_crud->set_relation('idUsuario','usuario_biblioteca','{nombre} {apellidos}');
        $this->grocery_crud->field_type('fecha_salida','hidden',$fecha);
        $output = $this->grocery_crud->render();
        $this->_example_output($output);    
    }
 
        function mi_funcion($post_array){
        $post_array['idLibro'] = $variable;
        return $post_array;
        }


        function _example_output($output = null){
        $output->titulo_tabla = "Consulta de Prestamos de Libros";
        $datos_plantilla['contenido'] =  $this->load->view('output_view', $output, TRUE);
        $this->load->view('prestamos_view', $datos_plantilla);   
    }
}