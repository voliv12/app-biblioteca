<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Prestamos extends CI_Controller {
 
    function __construct(){
        parent::__construct();
        $this->load->database(); //Aqui se carga el driver de la bd.
        $this->load->helper('url');
        $this->load->helper('date');
        $this->load->library('grocery_crud'); //Aqui se hace la carga de la libreria
    }

        //Esta funcion se manda a llamar cuando se selecciona un libro y el cual recibe
        //un parametro que es el ID de ese libro
        function tablaprestamo($primary_key,$valor,$valor1){
            global $variableGlobal, $registro; 
            $variableGlobal = $primary_key;
            $registro = urldecode($valor);
            $fecha = date("Y/m/d");
            $crud = new grocery_crud();
            $crud->set_table('prestamo','libro');
            $crud->set_subject('Prestamos');
            $crud->display_as('idLibro','Datos del libro')
            ->display_as('idUsuario','Nombre de Usuario');
            $crud->unset_edit();
            $crud->unset_delete();
            $crud->unset_print();
            $crud->unset_export();
            $crud->set_relation('idUsuario','usuario_biblioteca','{nombre} {apellidos}');
            $crud->field_type('fecha_entrega','hidden',$this->calculaFecha("days",14,$fecha));
            $crud->callback_field('idLibro',array($this,'recuperaDatos'));
            $output = $crud->render();
            $this->_example_output($output);
            $this->load->model('usuarios_model');
            $row1 = $this->usuarios_model->cantidad($variableGlobal);
            $row = $this->usuarios_model->actualizar_estado($variableGlobal);
        }


        function recuperaDatos(){
            global $registro;
            return '<input type="text" name="clasificacion" value="'.$registro.'" readonly>';


            //$variable = $registro;
            //echo $variable; 
            //return '<div class="form-display-as-box" id="titulooo"></div>';
            //<input type="text" name="titulo" value="'.$registro.'" readonly>';
        }








        //Esta funcion es llamada cuando el administrador da clic sobre la pestaña de prestamos
        function tabla(){
            $fecha = date("Y/m/d");
            $crud = new grocery_crud();
            $crud->set_table('prestamo');
            $crud->set_subject('Prestamos');
            $crud->required_fields('Fecha_salida', 'Fecha_entrega');
            $crud->display_as('idUsuario','Nombre de Usuario')
            ->display_as('idLibro','Nombre del libro');
            $crud->add_action('Entrega','https://cdn3.iconfinder.com/data/icons/musthave/16/Check.png','','',array($this, 'libro_regresa'));
            $crud->unset_add();
            $crud->unset_edit();
            $crud->unset_delete();
            $crud->unset_print();
            $crud->unset_export();
            $crud->set_relation('idLibro','libro','titulo');
            $crud->set_relation('idUsuario','usuario_biblioteca','{nombre} {apellidos}');
            $crud->field_type('fecha_salida','hidden',$fecha);
            $output = $crud->render();
            $this->_example_output($output);    
        }

        //En esta funcion regresaran los libros prestados.
        function libro_regresa($primary_key, $row){
            global $variableGlobal;
            $variableGlobal = $primary_key;
            //return site_url('prestamos/tablaprestamo/'.$variableGlobal.'/add/'.$variableGlobal);
        }

        //Se carga el contenido de la vista
        function _example_output($output = null){ 
            $output->titulo_tabla = "Consulta de Prestamos de Libros";
            $datos_plantilla['contenido'] = $this->load->view('output_view', $output, TRUE);
            $this->load->view('principal_view', $datos_plantilla);   
        }

        //Aqui se calcula la fecha de entrega del libro que es mandada a llamar por la funcion
        //tablaprestamo, donde recibe 3 parametros que son, el modo que es en dias, el valor 
        //que son a 14 dias y la fecha_inicio que es la fecha actual
        function calculaFecha($modo,$valor,$fecha_inicio=false){
            if($fecha_inicio!=false){
                $fecha_base = strtotime($fecha_inicio);
            }else {
                $time=time();
                $fecha_actual=date("Y-m-d",$time);
                $fecha_base=strtotime($fecha_actual);
            }
            $calculo = strtotime("$valor $modo", "$fecha_base");
            return date("Y-m-d",$calculo);
        }
}