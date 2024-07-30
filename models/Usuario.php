<?php
class Usuario {
    private $id;
    private $nome;
    private $email;

    public function getId() {
        return $this->id;
    }
    public function setId($i){
        $this->id = trim($i);
    }

    public function getNome(){
        return $this->nome;
    }
    public function setNome($n){
        $this->nome = ucwords(trim($n)); 
    }
    public function getEmail(){
        return $this->email;
    }
    public function setEmail($e){
        $this->email = strtolower(trim($e)); 
        
    }

}

interface UsuarioDAO {// aqui vamos criar basicamente o CRUD;
    public function add(Usuario $u); //recebe um objeto da classe usuario
    public function findALL(); // pegue todo mundo;
    public function findById($id);//quero encontrar 1 cara só
    //public function findByOQ QUERO ENCONTRAR(OQ QUERO ENCONTRAR);
    // esse findALGUMA COISA, é pra encontrar um item por aquele "id";
    public function update(Usuario $u);//faz o processo de att no BD
    public function delete(Usuario $id);//deleta a inf dentro do bd   
}