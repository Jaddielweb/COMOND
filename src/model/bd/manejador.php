<?php
    
	include_once ("config.php"); //Valores para la conexión

    class Manejador extends PDO {

		public $srv	= SRV; //Host
		public $usr	= USR; //Usuario
		public $pas	= PAS; //Password
		public $dbn	= BDN; //Nombre de la Base de datos

		private $conexionBD; // Conexion a Base de Datos
        public function __construct($tipoConexion) { 
			// Constructor de la clase
		}

		public function conectar($tipoConexion){
			try{
				switch ($tipoConexion) {
				    case 0: // Postgresql
				        $dsn = "pgsql:dbname=$this->dbn;host=$this->srv";
				        $mensaje = "Conexion Exitosa Postgresql"; 
				        break;
				    case 1: // Mysql
				        $dsn = "mysql:host=$this->srv;dbname=$this->dbn";
				        $mensaje = "Conexion Exitosa Mysql";
				        break;				    
				}
				$dbh = new PDO($dsn, $this->usr, $this->pas);
    			$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Permite manejar los errores
				
				//DE ESTA MANERA SE PUEDEN VISUALIZAR U DEBBUGUEAR EN LA CONSOLA DEL NAVEGADOR DESDE PHP
				// echo("<script> console.log('" . $mensaje ."' );</script>"); 
				
            }catch(PDOExeption $e) {
                die("error: " . $e->getMessage());
            }
                $this->conexionBD = $dbh;
                return $this->conexionBD;	
        }

        public function cerrarConexion(){
            $this->conexionBD = null;
        }
    }

?>