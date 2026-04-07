<?php
	session_start();
	header('Content-Type: application/json');

	require_once(__DIR__ . '/../model/entidad/usuario.php');

	try {
		// Manejar solicitud para obtener un usuario por ID
		if ($_SERVER['REQUEST_METHOD'] === 'GET') {
			$idUsuario = $_GET['id'];
			// Limpiar la variable de sesión antes de asignar nuevos datos
			unset($_SESSION['datosUsuario']);

			$conn = new Usuario();
			$conn->__activate(1);
			$usuario = $conn->consultarUsuario($idUsuario);
			$conn->__destruct();

			$_SESSION['datosUsuario'] = $usuario;

			// Responder con el usuario obtenido
			echo json_encode($usuario);
			exit();
		}

		// Manejar solicitud para actualizar o agregar un usuario
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$nom_usuario = $_POST["nom_usuario"];
			$user_usuario = $_POST["user_usuario"];
			$pass_usuario = $_POST["pass_usuario"];
			$accion = $_POST["accion"];

			// Validar la acción
			$accionesValidas = ['CREAR', 'EDITAR'];

			if (!in_array($accion, $accionesValidas)) {
				throw new Exception("Acción no válida.");
			}
				$usuario = new Usuario();
				$usuario->setNomUsuario($nom_usuario);
				$usuario->setUserUsuario($user_usuario);
				$usuario->setPassUsuario($pass_usuario);

				$usuario->__activate(1);

				// Si no se crea, se edita
				if ($accion == "CREAR") {
					$consulta = $usuario->insertarUsuario();
				} else {
					$id_usuario = $_POST["id_usuario"];
					$usuario->setIdUsuario($id_usuario);
					$consulta = $usuario->modificarUsuario();
				}
				$_SESSION['usuarios'] = $usuario->consultarTodosUsuarios();
				$usuario->__destruct();

				if ($consulta) {
					header('Location: ../../public/index.php');
					exit;
				}
			echo json_encode(["success" => true, "message"	=> "Usuario " . ($accion == "CREAR" ? "creado" : "editado") . " exitosamente."]);
			exit();
		}

		// Manejar solicitud para actualizar un usuario
		if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
			$idUsuario = $_GET['id'];
			// Limpiar la variable de sesión antes de asignar nuevos datos
			unset($_SESSION['datosUsuario']);
			$conn = new Usuario();
			$conn->__activate(1);
			$usuario = $conn->consultarUsuario($idUsuario);
			$conn->__destruct();

			$_SESSION['datosUsuario'] = $usuario;

			// Responder con el usuario obtenido
			header('Content-Type: application/json');
			echo json_encode($usuario);
			exit();
		}

		// Manejar solicitud para eliminar un usuario
		if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
			$idUsuario = $_GET['id'];
			$conn = new Usuario();
			$conn->__activate(1);
			$consulta = $conn->eliminarUsuario($idUsuario);
			$conn->__destruct();

			if ($consulta) {
				echo json_encode(["success" => true, "message" => "Usuario eliminado exitosamente."]);
			} else {
				echo json_encode(["success" => false, "message" => "Error al eliminar el usuario."]);
			}
			exit();
		}	
	} catch (Exception $e) {
		echo json_encode(["success" => false, "message" => $e->getMessage()]);
		exit();
	}
?>