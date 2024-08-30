<?php

class pengembalian
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
            self::$instance = new pengembalian($pdo);
        }
        return self::$instance;
    }

    // Function for adding pengembalian
    public function add($nama, $nisn, $tanggal_pengembalian)
    {
        try {
            $stmt = $this->db->prepare("INSERT INTO pengembalian (nama, nisn, tanggal_pengembalian) VALUES (:nama, :nisn, :tanggal_pengembalian)");
            $stmt->bindParam(":nama", $nama);
            $stmt->bindParam(":nisn", $nisn);
            $stmt->bindParam(":tanggal_pengembalian", $tanggal_pengembalian);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getID($id_pengembalian)
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM pengembalian WHERE id_pengambalian = :id_pengembalian");
            $stmt->execute(array(":id_pengembalian" => $id_pengembalian));
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            return $data;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    // Function for editing pengembalian
    public function edit($id_pengembalian, $nama, $nisn, $tanggal_pengembalian)
    {
        try {
            $stmt = $this->db->prepare("UPDATE pengembalian SET id_pengembalian = :id_pengembalian, nama = :nama, nisn = :nisn, tanggal_pengembalian = :tanggal_pengembalian WHERE id_pengembalian = :id_pengembalian");
            $stmt->bindParam(":id_pengembalian", $id_pengembalian);
            $stmt->bindParam(":nama", $nama);
            $stmt->bindParam(":nisn", $nisn);
            $stmt->bindParam(":tanggal_pengembalian", $tanggal_pengembalian);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            // Logging error to a file or handling error properly in production
            error_log($e->getMessage());
            return false;
        }
    }

    // Function for deleting pengembalian
    public function hapus($id_pengembalian)
    {
        try {
            $stmt = $this->db->prepare("DELETE FROM pengembalian WHERE id_pengambalian = :id_pengambalian");
            $stmt->bindParam(":id_pengembalian", $id_pengembalian);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    // Function for getting all pengembalian
    public function getAll()
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM pengembalian");
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
