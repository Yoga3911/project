<?php

class Cart
{
    private $db;
    private $table = 'cart';

    public function __construct()
    {
        $this->db = new Database;
    }

    public function addData($id, $unit)
    {
        $query = "INSERT INTO " . $this->table . " VALUES('', :produk_unit, :user_id, :produk_id)";
        $this->db->query($query);
        $this->db->bind('produk_unit', $unit);
        $this->db->bind('user_id', $_SESSION['id']);
        $this->db->bind('produk_id', $id);
        $this->db->execute();
    }

    public function getDataByUser($id)
    {
        //Mencegah SQL Injection
        $this->db->query('SELECT * FROM produk
        JOIN ' . $this->table . ' ON produk.id = ' . $this->table . '.produk_id WHERE ' .
        $this->table . '.user_id=:id');
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->getAll();
    }

    public function deleteProduct($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
    }
}
