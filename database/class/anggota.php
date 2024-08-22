<?php

class anggota
{
    private $db;
    private static $instance = null;

    public function __construct($db_conn)
    {
        $this->db = $db_conn;
    }

    public static function getInstance($pdo)
    {
        if (self::$instance == null) {
            self::$instance = new anggota($pdo);
        }
        return self::$instance;
    }

    // Function for adding anggota
    public function add($nama, $nisn, $Alamat, $tanggal_lahir)
    {
        try {
            $stmt = $this->db->prepare("INSERT INTO anggota (nama, nisn, Alamat, tanggal_lahir) VALUES (:nama, :nisn, :Alamat, :tanggal_lahir)");
            $stmt->bindParam(":nama", $nama);
            $stmt->bindParam(":nisn", $nisn);
            $stmt->bindParam(":Alamat", $Alamat);
            $stmt->bindParam(":tanggal_lahir", $tanggal_lahir);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getID($id_anggota)
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM anggota WHERE id_anggota = :id_anggota");
            $stmt->execute(array(":id_anggota" => $id_anggota));
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            return $data;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    // Function for editing anggota
    public function edit($id_anggota, $nama, $nisn, $Alamat, $tanggal_lahir)
    {
        try {
            $stmt = $this->db->prepare("UPDATE anggota SET nama = :nama, nisn = :nisn, Alamat = :Alamat, tanggal_lahir = :tanggal_lahir WHERE id_anggota = :id_anggota");
            $stmt->bindParam(":id_anggota", $id_anggota);
            $stmt->bindParam(":nama", $nama);
            $stmt->bindParam(":nisn", $nisn);
            $stmt->bindParam(":Alamat", $Alamat);
            $stmt->bindParam(":tanggal_lahir", $tanggal_lahir);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    // Function for deleting anggota
    public function hapus($id_anggota)
    {
        try {
            $stmt = $this->db->prepare("DELETE FROM anggota WHERE id_anggota = :id_anggota");
            $stmt->bindParam(":id_anggota", $id_anggota);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    // Function for getting all anggota
    public function getAll()
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM anggota");
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
?>
