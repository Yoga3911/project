<?php

class User
{
    private $db;
    private $table = 'user';

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getData()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->getAll();
    }

    public function getDataById($id)
    {
        // Mencegah sql injection
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->getOne();
    }

    public function getDataByEmail($email)
    {
        // Mencegah sql injection
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE email=:email');
        $this->db->bind('email', $email);
        return $this->db->getOne();
    }

    // Register
    public function insertData($data)
    {
        $result = $this->getData();
        foreach($result as $i) {
            if ($data['username_r'] == $i['username']) {
                return 'username';
            } else if ($data['email_r'] == $i['email']) {
                return 'email';
            }
        }
        if ($data['password_r'] != $data['password2_r']) {
            return 'password';
        }
        $query = "INSERT INTO user VALUES(0, :username, :email, :pass, 0, 0, '')";
        $this->db->query($query);
        $this->db->bind('username', htmlspecialchars($data['username_r']));
        $this->db->bind('email', htmlspecialchars($data['email_r']));
        $this->db->bind('pass', htmlspecialchars($data['password_r']));

        $this->db->execute();
        return $this->db->rowCount();
    }
}
