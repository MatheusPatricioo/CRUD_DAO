<?php
require_once 'models/Usuario.php';

class UsuarioDaoMysql implements UsuarioDAO {
    private $pdo;

    public function __construct(PDO $driver){
        $this->pdo = $driver;
    }

    public function add(Usuario $u){


    }

    public function findALL(){
        $array =[];

        $sql = $this->pdo->query("SELECT * FROM usuarios");
        if ($sql->rowCount() > 0){
            $data = $sql->fetchALL();

//cria um objeto, preenche ele e joga no array
            foreach($data as $item) {
                $u = new Usuario ();// obj do tipo usuario
                $u->setId($item['ID']);
                $u->setNome($item['Nome']);
                $u->setEmail($item['email']);

                $array[] = $u;
            }
        } 

        return $array;
    }

    public function findByEmail($email){
        
    }


    public function findById($id){

    }

    public function update(Usuario $u){

    }

    public function delete(Usuario $id){

    }

}