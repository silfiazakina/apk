<?php

class Pengarang
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
            self::$instance = new Pengarang($pdo);
        }
        return self::$instance;
    }

    // Function to add a new author
    public function add($nama, $no_tlp)
    {
        try {
            $stmt = $this->db->prepare("INSERT INTO pengarang (nama, no_tlp) VALUES (:nama, :no_tlp)");
            $stmt->bindParam(":nama", $nama);
            $stmt->bindParam(":no_tlp", $no_tlp);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            // Logging error to a file or handling error properly in production
            error_log($e->getMessage());
            return false;
        }
    }

    // Function to get author by ID
    public function getID($id_pengarang)
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM pengarang WHERE id_pengarang = :id_pengarang");
            $stmt->execute(array(":id_pengarang" => $id_pengarang));
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            return $data;
        } catch (PDOException $e) {
            // Logging error to a file or handling error properly in production
            error_log($e->getMessage());
            return false;
        }
    }

    // Function to update author information
    public function edit($id_pengarang, $nama, $no_tlp)
    {
        try {
            $stmt = $this->db->prepare("UPDATE pengarang SET id_pengarang = :id_pengarang, nama = :nama, no_tlp = :no_tlp WHERE id_pengarang = :id_pengarang");
            $stmt->bindParam(":id_pengarang", $id_pengarang);
            $stmt->bindParam(":nama", $nama);
            $stmt->bindParam(":no_tlp", $no_tlp);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            // Logging error to a file or handling error properly in production
            error_log($e->getMessage());
            return false;
        }
    }

    // Function to delete an author
    public function hapus($id_pengarang)
    {
        try {
            $stmt = $this->db->prepare("DELETE FROM pengarang WHERE id_pengarang = :id_pengarang");
            $stmt->bindParam(":id_pengarang", $id_pengarang);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            // Logging error to a file or handling error properly in production
            error_log($e->getMessage());
            return false;
        }
    }

    // Function to get all authors
    public function getAll()
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM pengarang");
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } catch (PDOException $e) {
            // Logging error to a file or handling error properly in production
            error_log($e->getMessage());
            return false;
        }
    }
}
?>
