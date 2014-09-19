mvc
===

Bienvenido
==========

Este es un pequeño framework mvc en desarrollo con fines practicos pero proximamente tendra implementaciones interesantes
	
Uso
========
-Crear un controlador

Dentro de la carpeta application/puedes crear un archivo con el nombre del controlador que deses crear, este mismo controlador sera utilizado al indicar http://url.axample/controller.
El controlador debe tener el formato basico:
	
	class Example extends Controller{
		function __construct(){
			parent::__construct();
		}
		public function index(){
			$this->load->view("inicio/index");
		}
	}

Cargar vistas y modelos
=======================

Dentro de cada controlador es posible cargar vistas y modelos usando el metodo load:

	
	$this->load->view("index");//esto carga la vista, usando la ruta dentro de la carpeta application/views
	$this->load->model("login_model");//esto carga un model de la carpeta application/model
Las vistas pueden recivir parametros desde el controlador pasando un array asociativo a la funcion

	
	$data["cantidad"] = 2000;
	$this->load->view("examples/index",$data);
	
Esto se ve en la vista como una variable normal

	echo $cantidad;//nos devuelve un 2000
	
Templates para vistas
=============
Para crear templates debemos crear un archivo dentro de la carpeta application/view/template y dentro declarar un array
de nombre template:
	
		$template=array("index/header","view","index/footer");

Cada elemento del array es una vista que se carga, el elemento view sera rempazado por la vista que queremos que se cargue dentro del
template, para cargar un template usamos el metodo load:
	
	$this->load->template("example","example_template");//el primer parametro es el template y el segundo es la vista
	//adicionalmente se le puede pasar un tercer parametro que se pasa a cada una de las vistas.

	
Crear un Modelo
==============
	
para crear un modelo es necesario configurar el archivo de la base de datos en application/config/database.php
Luego de poner adecuadamente los datos para la conexion creamos el modelo:

	Class Login_model extends Model{
		function __construct(){
			parent::__construct();
		}
		function buscar usuarios($usuarios){
			$usuarios = $this->db->new_query("SELECT * FROM users");
			return $this->db->fetch_all($usuarios);//metod creado para hacer un fetch all usando mysqli
		}
	}
	
