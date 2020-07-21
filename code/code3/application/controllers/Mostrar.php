<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mostrar extends CI_Controller {
  public $dep;

   /**NO BORRAR POR AHORA,GRACIAS */
    /*public function __construct(){
        parent:: __construct();
        $container = new \DI\ContainerBuilder();
        $container-> useAutowiring(false);
        $container-> useAnnotations(false);
        $container->addDefinitions(require 'application\controllers\dependencia.php');
        $this->dep= $container->build();   
        //var_dump($valor->get('ImagenCLiente_ImpDTO'));
       // $this->dep= $valor->get('ImagenCLiente_ImpDTO');          
     } */

     public function __construct(){
         parent::__construct();
        $this->app2=new ImagenCliente_Imp();    
        $app= new ImagenCliente_ImpDTO($this->app2);
        $this->dep=$app;
   
    }
/*
	/index Carga 2 vistas header y body, Valida una peticion post y 
	Crea una nueva ImagenClienteDTO y lo guarda en la base de datos
*/
 public function pruebaIsAdmin ($datos){
		$pruebas  = $datos;
		$resultado = "admin";
		$nombre = 'tipo Admin';
		$dato ['pruebas']=$this->unit->run($pruebas,$resultado,$nombre,'prueba que sea un admiistrador');
		$dato ['titulo']='prueba tipo de usuario';
		$dato ['contenido']='pruebas';
        $this->load->view('VistaImagen/header');
        $this->load->view('VistaImagen/body');
		$this->load->view('VistaImagen/pruebas',$dato);
		
 }
 public function pruebaIsCliente ($datos){
		$pruebas  = $datos;
		$resultado = "cliente";
		$nombre = 'tipo cliente';
		$dato ['pruebas']=$this->unit->run($pruebas,$resultado,$nombre,'preuba que sea un cliente');
		$dato ['titulo']='prueba tipo de usuario';
		$dato ['contenido']='pruebas';
        $this->load->view('VistaImagen/header');
        $this->load->view('VistaImagen/body');
		$this->load->view('VistaImagen/pruebas',$dato);
		
 }

 public function pruebaIsDev ($datos){
		$pruebas  = $datos;
		$resultado = "desarrollador";
		$nombre = 'tipo cliente';
		$dato ['pruebas']=$this->unit->run($pruebas,$resultado,$nombre,'prueba que sea un desarrolador');
		$dato ['titulo']='prueba tipo de usuario';
		$dato ['contenido']='pruebas';
        $this->load->view('VistaImagen/header');
        $this->load->view('VistaImagen/body');
		$this->load->view('VistaImagen/pruebas',$dato);
		
 }

 public function pruebaImageNombre ($datos){
		$pruebas  = $datos;
		$resultado = 'is_string';
		$nombre = 'Nombre imagen String';
		$dato ['pruebas']=$this->unit->run($pruebas,$resultado,$nombre.'prueba que sea un strng el nombre de la imagen');
		$dato ['titulo']='prueba tipo de usuario';
		$dato ['contenido']='pruebas';
        $this->load->view('VistaImagen/header');
        $this->load->view('VistaImagen/body');
		$this->load->view('VistaImagen/pruebas',$dato);
		
 }

  public function pruebaCarga ($datos){
		$pruebas  = $datos;
		$resultado = 'is_null';
		$nombre = 'url de la imagen no es vacio';
		$dato ['pruebas']=$this->unit->run($pruebas,$resultado,$nombre,'prueba que la url no esta vacia, es decir se puede cargar');
		$dato ['titulo']='prueba tipo de usuario';
		$dato ['contenido']='pruebas';
        $this->load->view('VistaImagen/header');
        $this->load->view('VistaImagen/body');
		$this->load->view('VistaImagen/pruebas',$dato);
		
 }

	public function index()
	{
		$this->load->library('unit_test');
		if(isset($_POST['submit'])){
        $imageName=$_POST['imagename'];
        $userType="cliente";
        $urlImagen=uploadImage($userType,$imageName); 
        $datos= new ImagenClienteDTO($urlImagen,$imageName,1);
		$this->pruebaIsCliente($userType);
		$this->pruebaImageNombre($imageName);
		$this->pruebaCarga($urlImagen);
        $this->dep->Guardar($datos,$this->db);  
		
        }

		
    }
   

}




?>
