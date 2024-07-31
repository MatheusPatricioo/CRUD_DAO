<?php
require_once 'models/Usuario.php';

class UsuarioDaoMysql implements UsuarioDAO
{
    private $pdo;

    public function __construct(PDO $driver)
    {
        $this->pdo = $driver;
    }

    //o metodo add é o funcionario da livraria que cadastra os clientes :|)
    public function add(Usuario $u)
    {
        $sql = $this->pdo->prepare("INSERT INTO usuarios (nome, email) VALUES (:nome, :email)");
        $sql->bindValue(':nome', $u->getNome());
        $sql->bindValue(':email', $u->getEmail());
        $sql->execute();

        $u->setId($this->pdo->lastInsertId());
        return $u;
    }

    public function findALL()
    {
        $array = [];

        $sql = $this->pdo->query("SELECT * FROM usuarios");
        if ($sql->rowCount() > 0) {
            $data = $sql->fetchALL();

            //cria um objeto, preenche ele e joga no array
            foreach ($data as $item) {
                $u = new Usuario(); // obj do tipo usuario
                $u->setId($item['ID']);
                $u->setNome($item['Nome']);
                $u->setEmail($item['email']);

                $array[] = $u;
            }
        }

        return $array;
    }

    //p findByEmail é como se fosse um bibliotecario eficiente : )
    public function findByEmail($email)
    {
        $sql = $this->pdo->prepare("SELECT * FROM usuarios WHERE email =:email");
        $sql->bindValue(':email', $email);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $data = $sql->fetch();

            $u = new Usuario();
            $u->setId($data['ID']);
            $u->setNome($data['Nome']);
            $u->setEmail($data['email']);

            return $u;
        } else {
            return false;
        }
    }


    public function findById($id)
    {
        $sql = $this->pdo->prepare("SELECT * FROM usuarios WHERE ID =:ID");
        $sql->bindValue(':ID', $id);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $data = $sql->fetch();

            $u = new Usuario();
            $u->setId($data['ID']);
            $u->setNome($data['Nome']);
            $u->setEmail($data['email']);

            return $u;
        } else {
            return false;
        }
    }

    public function update(Usuario $u)
    {
        $sql = $this->pdo->prepare("UPDATE usuarios SET Nome = :Nome, email = :email WHERE ID =:ID");
        $sql->bindValue(':Nome', $u->getNome());
        $sql->bindValue(':email', $u->getEmail());
        $sql->bindValue(':ID', $u->getId());
        $sql->execute();

        return true;
    }

    public function delete($id)
    {
        $sql = $this->pdo->prepare("DELETE FROM usuarios WHERE ID =:ID");
        $sql->bindValue(':ID', $id);
        $sql->execute();
    }
}
