<?php

require_once 'database.php';

class Usuario
{
    private $primer_nombre;
    private $segundo_nombre;
    private $primer_apellido;
    private $segundo_apellido;
    private $fecha_nacimiento;
    private $telefono;
    private $correo;
    private $direccion;

    private PDO $conn;


    public function setDatos($datos) {
        $this->primer_nombre = $datos['primer_nombre'];
        $this->segundo_nombre = $datos['segundo_nombre'];
        $this->primer_apellido = $datos['primer_apellido'];
        $this->segundo_apellido = $datos['segundo_apellido'];
        $this->fecha_nacimiento = $datos['fecha_nacimiento'];
        $this->telefono = $datos['telefono'];
        $this->correo = $datos['correo'];
        $this->direccion = $datos['direccion'];
    }

    public function __construct()
    {
        $this->conn = (new Database())->getConnection();
    }

    public function listarUsuarios()
    {
        $sql= "SELECT * FROM usuarios";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

        print_r ($usuarios);
        return $usuarios;
        // Lógica para obtener todos los usuarios
    }

    public function obtenerUsuario($id)
    {
        // Lógica para obtener un usuario por ID --JOSE
    }

    public function crearUsuario()
    {
        $sql= "INSERT INTO usuarios (primer_nombre, segundo_nombre,primer_apellido,segundo_apellido,fecha_nacimiento,telefono,correo,direccion)
        VALUES (?,?,?,?,?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$this->primer_nombre, $this->segundo_nombre, $this->primer_apellido, $this->segundo_apellido, $this->fecha_nacimiento, $this->telefono, $this->correo, $this->direccion]);
        // Lógica para insertar usuario 
    }

    public function actualizarUsuario()
    {
        // Lógica para actualizar un usuario --JOSE
    }

    public function eliminarUsuario($id)
    {
        // Lógica para eliminar un usuario --JOSE
    }
}
