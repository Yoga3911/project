<?php

class Produk
{
    private $db;
    private $table = 'produk';

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
        //Mencegah SQL Injection
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->getOne();
    }

    //Tambah product
    public function addProduct($data)
    {
        $gambar = $this->upload();
        try {
            $query = "INSERT INTO " . $this->table . " VALUES(0, :produk, :unit, :harga, :jenis, :deskripsi, :gambar)";
            $this->db->query($query);
            $this->db->bind('produk', htmlspecialchars($data['produk']));
            $this->db->bind('unit', htmlspecialchars($data['unit']));
            $this->db->bind('harga', htmlspecialchars($data['harga']));
            $this->db->bind('jenis', htmlspecialchars($data['jenis']));
            $this->db->bind('deskripsi', htmlspecialchars($data['deskripsi']));
            $this->db->bind('gambar', htmlspecialchars($gambar));
            $this->db->execute();
        } catch (Exception $e) {
            return false;
        }

        // var_dump($query); die;
        return $this->db->rowCount();
    }

    //Tambah product
    public function ubahProduct($data)
    {
        try {
            $query = "UPDATE " . $this->table . " SET 
            nama_produk = :produk, 
            unit = :unit, 
            harga = :harga, 
            jenis = :jenis, 
            deskripsi = :deskripsi, 
            image = :gambar
            WHERE id = :id";

            $this->db->query($query);
            $this->db->bind('id', htmlspecialchars($data['id']));
            $this->db->bind('produk', htmlspecialchars($data['produk']));
            $this->db->bind('unit', htmlspecialchars($data['unit']));
            $this->db->bind('harga', htmlspecialchars($data['harga']));
            $this->db->bind('jenis', htmlspecialchars($data['jenis']));
            $this->db->bind('deskripsi', htmlspecialchars($data['deskripsi']));
            $this->db->bind('gambar', htmlspecialchars($data['gambar']));
            $this->db->execute();
        } catch (Exception $e) {
            return false;
        }

        // var_dump($query); die;
        return $this->db->rowCount();
    }

    //Hapus product
    public function deleteProduct($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
    }

    //Parse Image
    public function upload()
    {
        $nama = $_FILES['gambar']['name'];
        $error = $_FILES['gambar']['error'];
        $lokasi_file = $_FILES['gambar']['tmp_name'];
        $size = $_FILES['gambar']['size'];
        $split = explode('.', $nama);
        $ekstensi = strtolower(end($split));
        $format = ['jpg', 'jpeg', 'png'];
        // cek format file
        if (!in_array($ekstensi, $format)) {
            echo "<script>
            alert('Format file tidak sesuai');
        </script>";
            return false;
        };
        // cek jika blm upload foto
        if ($error === 4) {
            echo "<script>
            alert('Gambar tidak boleh kosong');
        </script>";
        }
        // cek ukuran file <= 1mb
        if ($size > 10000000) {
            echo "<script>
            alert('Ukuran gambar terlalu besar');
        </script>";
        }
        $uniq = uniqid();
        $nama_baru = $uniq . '.' . $ekstensi;
        move_uploaded_file($lokasi_file,  'images/' . $nama_baru);
        // if( $moved ) {
        //     echo "Successfully uploaded"; die;
        //   } else {
        //     echo "Not uploaded because of error #".$_FILES["gambar"]["error"]; die;
        //   }
        return $nama_baru;
    }
}
