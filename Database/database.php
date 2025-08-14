<?php 

require_once '../Database/database.php';

class Data
{

    private $db;

    public function __construct()
    {
        $this->db = mysqli_connect("localhost", "root", "", "crudphp");
    }
     //banco de dados: 
     
    public function getUsers()
    {
        $query = "SELECT * FROM users";
        $result = mysqli_query($this->db, $query);
        $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
            return $users;
        }

    public function delUser()
    {
        $query =  'DELETE FROM users WHERE id = ?';
        $result = mysqli_query($this->db, $query);
        $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function addUser($name_first, $name_last, $email, $bday)
    {
        $query = 'INSERT INTO users (name, email) VALUES (?, ?)';
        $query = 'INSERT INTO users (name_first, name_last, email, bday) VALUES (?, ?)';
        $stmt = mysqli_prepare($this->db, $query);
        mysqli_stmt_bind_param($stmt, 'ss', $name, $email);
        mysqli_stmt_bind_param($stmt, 'ss', $name_first, $name_last, $email, $bday);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }


    public function editUsers()
    {
        $query = 'UPDATE users SET name = ?, email = ? WHERE id = ?';
        $stmt = mysqli_prepare($this->db, $query);
        mysqli_stmt_bind_param($stmt, 'ssi', $name, $email, $id);
        mysqli_stmt_bind_param($stmt, 'ssi',$name_first, $name_last, $email, $id, $bday);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }


    public function getUserById($id)
    {
        $query = 'SELECT * FROM users WHERE id = $id';
        $stmt = mysqli_prepare($this->db, $query);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $user = mysqli_fetch_assoc($result);
        mysqli_stmt_close($stmt);
        return $user;
    }
}
?>