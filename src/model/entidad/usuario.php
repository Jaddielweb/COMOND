<?php

include_once("../bd/manejador.php");

class Usuario extends Manejador{
    private $id_usuario;
    private $nom_usuario;
    private $user_usuario;
    private $pass_usuario;

	private $cnn;

    //NO SIEMPRE QUE SE CREA UN OBJETO USUARIO SE NECESITA LA CONEXION A BD
    public function __construct(){} 
    
    public function __activate($tipoConexion) {
        $this->cnn = parent::conectar($tipoConexion); // ejecuta conectar de la clase padre
    }

    public function __destruct(){ // Destructor de la clase, se invoca cuando se iguala a null el objeto
        parent::cerrarConexion(); // Invoca al metodo cerrarConexion de la clase padre para eliminar la conexion con la BD
    }

    public function __construct($id_usuario, $nom_usuario, $user_usuario, $pass_usuario) {
        $this->id_usuario = $id_usuario;
        $this->nom_usuario = $nom_usuario;
        $this->user_usuario = $user_usuario;
        $this->pass_usuario = $pass_usuario;
    }

    public function setIdUsuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    public function getIdUsuario() {
        return $this->id_usuario;
    }

    public function setNomUsuario($nom_usuario) {
        $this->nom_usuario = $nom_usuario;
    }

    public function getNomUsuario() {
        return $this->nom_usuario;
    }

    public function setUserUsuario($user_usuario) {
        $this->user_usuario = $user_usuario;
    }

    public function getUserUsuario() {
        return $this->user_usuario;
    }

    public function setPassUsuario($pass_usuario) {
        $this->pass_usuario = $pass_usuario;
    }

    public function getPassUsuario() {
        return $this->pass_usuario;
    }
}

    // CRUD DE USUARIO

    // AUTENTICAR USUARIO
    public function autenticarUsuario( $nick , $pass ){ 
        try{	 
            $stmt = $this->cnn->prepare("SELECT * FROM usuario WHERE nom_usuario = :nom_usuario AND pass_usuario = :pass_usuario");
            // Especificamos el fetch mode antes de llamar a fetch()
            $stmt->setFetchMode(PDO::FETCH_ASSOC); // Devuelve los datos en un arreglo asociativo
            // Asiganmos valores a los parametros
            $stmt->bindParam(':nom_usuario', $nick);
            $stmt->bindParam(':pass_usuario', $pass);
            // Ejecutamos
            $stmt->execute();

            // Obtener un objeto usuario en lugar de un array
            return $stmt->fetchObject('usuario');

        }catch(PDOException $error) {
            // Mostramos un mensaje genérico de error.
            echo "Error: ejecutando consulta SQL.".$error->getMessage();
            exit();
        } 
    }

    //CREATE inertar Usuario
    public function insertarUsuario($usuario) {
        try {
            $stmt = $this->cnn->prepare("INSERT INTO usuario (nom_usuario, user_usuario, pass_usuario) VALUES (:nom_usuario, :user_usuario, :pass_usuario)");
            
            // Asignamos valores a los parametros
            $stmt->bindParam(':nom_usuario', $usuario->getNomUsuario());
            $stmt->bindParam(':user_usuario', $usuario->getUserUsuario());
            $stmt->bindParam(':pass_usuario', $usuario->getPassUsuario());

            // Ejecución, devuelve los resultados obtenidos, si es verdadero se inserta el usuario, si es falso no se inserta
            $exito = $stmt->execute();
            return $exito;

        } catch (PDOException $error) {
            echo "Error: ejecutando consulta SQL de insercion." . $error->getMessage();
            exit();
        }
    }

    //READ Consulta un Usuario

    public function consultarUsuario($id_usuario) {
        try {
            $stmt = $this->cnn->prepare("SELECT * FROM usuario WHERE id_usuario = :id_usuario");
            // Especificamos el fetch mode antes de llamar a fetch()
            $stmt->setFetchMode(PDO::FETCH_ASSOC); // Devuelve los datos en un arreglo asociativo
            // Asiganmos valores a los parametros
            $stmt->bindParam(':id_usuario', $id_usuario);
            // Ejecutamos
            $stmt->execute();

            // Obtener un objeto usuario en lugar de un array
            return $stmt->fetchObject('usuario');

        } catch (PDOException $error) {
            echo "Error: ejecutando consulta SQL al usuario." . $error->getMessage();
            exit();
        }
    }

    //READ Consulta un Usuario por Nombre

    public function consultarNombre( $nom_usuario ){
        try{	

            $stmt = $this->cnn->prepare("SELECT * FROM usuario WHERE nom_usuario = :nom_usuario");
            // Especificamos el fetch mode antes de llamar a fetch()
            $stmt->setFetchMode(PDO::FETCH_ASSOC); // Devuelve los datos en un arreglo asociativo
            // Asiganmos valores a los parametros
            $stmt->bindParam(':nom_usuario', $nom_usuario );

            // Ejecutamos
            $stmt->execute();
            return $stmt->execute();

        } catch (PDOException $error) {
            echo "Error: ejecutando consulta SQL al nombre.".$error->getMessage();
            exit();
        } 
    }

    // Consultar todos los usuarios

    public function consultarTodosUsuarios() {
        try {
            $stmt = $this->cnn->prepare("SELECT * FROM usuario");
            // Especificamos el fetch mode antes de llamar a fetch()
            $stmt->setFetchMode(PDO::FETCH_ASSOC); // Devuelve los datos en un arreglo asociativo
            // Se ejecuta y devuelve los resultados obtenidos
            $stmt->execute();
            return $stmt->fetchAll();
        }catch(PDOException $error) {
            // Mostramos un mensaje genérico de error.
            echo "Error: ejecutando consulta SQL.".$error->getMessage();
            exit();
            }
        }

    // UPDATE Modificar usuario

    public function modificarUsuario(){
        try{
            $stmt = $this->cnn->prepare("UPDATE usuario SET nom_usuario = :nom_usuario, user_usuario = :user_usuario, pass_usuario = :pass_usuario")
        // Asignamos valores a los parametros
        $stmt->bindParam(':id_usuario', $this->id_usuario);
        $stmt->bindParam(':nom_usuario', $this->nom_usuario);
        $stmt->bindParam(':user_usuario', $this->user_usuario);
        $stmt->bindParam(':pass_usuario', $this->pass_usuario);
        // Ejecuta y devuelve los resultados obtenidos 1:Exitoso, 0:Fallido
        $stmt->execute();
        return $stmt->rowCount(); // si es verdadero se insertó correctamente el registro

        } catch (PDOException $error) {
            // Mostramos un mensaje genérico de error.
            echo "Error: ejecutando consulta SQL en el Update.".$error->getMessage();
            exit();
            } 
    }

    // DELETE Eliminar un usuario

    public function eliminarUsuario($id_usuario){
        try{
            $stmt = $this->cnn->prepare("DELETE FROM usuario WHERE id_usuario = :id_usuario");
            $stmt->bindParam(':id_usuario', $id_usuario);
            // Ejecutamos
            $stmt->execute();
            // Devuelve los resultados obtenidos 1:Exitoso, 0:Fallido
            return $stmt->rowCount();

        } catch(PDOException $error) {
			    // Mostramos un mensaje genérico de error.
				echo "Error: ejecutando consulta SQL. No se pudo eliminar el usuario".$error->getMessage();
				exit();
        }
    }

?>