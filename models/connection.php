<?php

class Connection {

    private $databaseFile;
    private $connection;

    public function __construct()
    {
        $this->databaseFile = realpath(__DIR__ . "/../database/db.sqlite");
        $this->connect();
    }

    private function connect()
    {
        return $this->connection = new PDO("sqlite:{$this->databaseFile}");
    }

    public function getConnection()
    {
        return $this->connection ?: $this->connection = $this->connect();
    }

    public function query($query)
    {
        $result      = $this->getConnection()->query($query);

        $result->setFetchMode(PDO::FETCH_ASSOC);

        return $result;
    }

    public function findById($id){
        $stmt = $this->connection->prepare('SELECT * FROM users WHERE id = :id;');
        $stmt-> bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $res = $stmt->fetch();

        return $res;
    }

    public function getAllUsers(){
        $query = 'SELECT * FROM users';
        $result = $this->getConnection()->query($query);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        return $result;
    }

    public function setUser($name, $email){
        $data = array($name,$email);
        $stmt = $this->connection->prepare('INSERT INTO users (name, email) VALUES (?,?)');

        if( $stmt->execute($data) == TRUE){
            $stmt->closeCursor();
            return true;
        }else{
            $stmt->closeCursor();
            return false;
        }
    }

    public function updateUser($id, $name, $email){
         $data = array($name,$email,$id);

         $stmt = $this->connection->prepare('UPDATE users SET name = ?, email = ? WHERE id = ?');

         if( $stmt->execute($data)== TRUE){
            $stmt->closeCursor();
            return true;
         }else{
            $stmt->closeCursor();
            return false;
         }
    }

    public function deleteUser($id){
        $stmt = $this->connection->prepare('DELETE FROM users WHERE id = :id;');
        $stmt-> bindParam(':id', $id, PDO::PARAM_INT);
        
        if( $stmt->execute() == TRUE){
            $stmt->closeCursor();
            return true;
         }else{
            $stmt->closeCursor();
            return false;
         }
    }

    public function getUserColor($id_user){
        $stmt = $this->connection->prepare('SELECT cor.name, cor.id FROM user_colors us INNER JOIN COLORS cor ON (cor.id = us.color_id) WHERE us.user_id = :user_id;');
        $stmt->bindParam(':user_id', $id_user, PDO::PARAM_INT);
        $stmt->execute();
        
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }

    public function createUserColor($id_user, $id_color){
        $data = array($id_user,$id_color);
        $stmt = $this->connection->prepare('INSERT INTO user_colors (user_id, color_id) VALUES (?,?);');

        if( $stmt->execute($data) == TRUE){
            return true;
        }else{
            return false;
        }
    }

    public function deleteUserColor($id_user, $id_color){
        $stmt = $this->connection->prepare('DELETE FROM user_colors WHERE user_id = :id_user AND color_id = :id_color;');
        $stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $stmt->bindParam(':id_color', $id_color, PDO::PARAM_INT);
        
        if( $stmt->execute() == TRUE){
            return true;
         }else{
            return false;
         }
    }

    public function getAllColors(){
        $query = 'SELECT * FROM colors';
        $result = $this->getConnection()->query($query);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        return $result;
    }
    
}