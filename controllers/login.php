<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->library('encrypt');
        $this->load->library('form_validation'); 
        $this->load->library('grocery_CRUD');  
    }           
    
    function index(){    			        
        $datos_plantilla['contenido'] = " "; 
        $this->load->view('login_view', $datos_plantilla);        
    }
    
    function validar_usuario(){                                                          
        $this->form_validation->set_rules('password','password','trim|required|min_length[5]|sha1');        
        if ($this->form_validation->run() == FALSE){
                $datos['mensaje'] = "La contraseña debe contener como mínimo 5 carácteres";                
                $datos_plantilla['contenido'] = $this->load->view('success_login', $datos, true);
                $this->load->view('login_view', $datos_plantilla);    
            } else {
                extract($_POST);        
                $usuario = $this->input->post('num_personal');            
                $this->load->model('usuarios_model');
                $row = $this->usuarios_model->buscar_en_BD($usuario, $password);

                if(!$row){   
                    $datos['mensaje'] = "El usuario ".$datos['num_personal'] = $usuario." no está registrado o la contraseña es incorrecta. Intentelo de nuevo!";
                    $datos_plantilla['contenido'] = $this->load->view('success_login', $datos, true);
                    $this->load->view('login_view', $datos_plantilla);
                }else{
                        $newdata = array(                                     
                            'num_personal'=> $row->nomusuario,
                            'logged_in' => TRUE );  
                        $this->session->set_userdata($newdata);
                        redirect('principal/admi');
                }
            }
    }
}
