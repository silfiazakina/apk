<?php

class Buku
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
            self::$instance = new Buku($pdo);
        }
        return self::$instance;
    }

    // Function to add a book
    public function add($judul, $pengarang, $penerbit)
    {
        try {
            $stmt = $this->db->prepare("INSERT INTO buku (judul, pengarang, penerbit) VALUES (:judul, :pengarang, :penerbit)");
            $stmt->bindParam(":judul", $judul);
            $stmt->bindParam(":pengarang", $pengarang);
            $stmt->bindParam(":penerbit", $penerbit);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            // Logging error to a file or handling error properly in production
            error_log($e->getMessage());
            return false;
        }
    }

    // Function to get book by ID
    public function getID($id_buku)
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM buku WHERE id_buku = :id_buku");
            $stmt->execute(array(":id_buku" => $id_buku));
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            return $data;
        } catch (PDOException $e) {
            // Logging error to a file or handling error properly in production
            error_log($e->getMessage());
            return false;
        }
    }

    // Function to edit a book
    public function edit($id_buku, $judul, $pengarang, $penerbit)
    {
        try {
            $stmt = $this->db->prepare("UPDATE buku SET judul = :judul, pengarang = :pengarang, penerbit = :penerbit WHERE id_buku = :id_buku");
            $stmt->bindParam(":id_buku", $id_buku);
            $stmt->bindParam(":judul", $judul);
            $stmt->bindParam(":pengarang", $pengarang);
            $stmt->bindParam(":penerbit", $penerbit);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            // Logging error to a file or handling error properly in production
            error_log($e->getMessage());
            return false;
        }
    }

    // Function to delete a book
    public function hapus($id_buku)
    {
        try {
            $stmt = $this->db->prepare("DELETE FROM buku WHERE id_buku = :id_buku");
            $stmt->bindParam(":id_buku", $id_buku);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            // Logging error to a file or handling error properly in production
            error_log($e->getMessage());
            return false;
        }
    }

    // Function to get all books
    public function getAll()
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM buku");
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
