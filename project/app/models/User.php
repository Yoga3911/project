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
}
