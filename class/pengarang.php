<?php

class pengarang
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
            self::$instance = new pengarang($pdo);
        }
        return self::$instance;
    }

    // function for menambahkan pengarang dimulaiiiii 
    public function add($nama, $no_tlp)
    {
        try {
            $stmt = $this->db->prepare("INSERT INTO pengarang (nama, no_tlp) VALUES (:nama, :no_tlp)");
            $stmt->bindParam(":nama", $nama);
            $stmt->bindParam(":no_tlp", $no_tlp);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getID($id_pengarang)
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM pengarang WHERE id_pengarang = :id_pengarang");
            $stmt->execute(array(":id_pengarang" => $id_pengarang));
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            return $data;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    // function for tambah pengarang doneee

    // function for mengedit pengarang dimulaiiiii 
    public function edit($id_pengarang, $nama, $no_tlp)
    {
        try {
            $stmt = $this->db->prepare("UPDATE pengarang SET nama = :nama, no_tlp = :no_tlp");
            $stmt->bindParam(":id_pengarang", $id_pengarang);
            $stmt->bindParam(":nama", $nama);
            $stmt->bindParam(":no_tlp", $no_tlp);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    // function for mengedit pengarang doneee

    // function for menghapus pengarang dimulaiiiii 
    public function hapus($id_pengarang)
    {
        try {
            $stmt = $this->db->prepare("DELETE FROM pengarang WHERE id_pengarang = :id_pengarang");
            $stmt->bindParam(":id_pengarang", $id_pengarang);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    // function for menghapus pengarang doneee

    // function for mendapatkan semua pengarang dimulaiiiii 
    public function getAll()
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM pengarang");
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    // function for menampilkan semua pengarang doneee
}
?>