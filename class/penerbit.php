<?php

class penerbit
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
            self::$instance = new penerbit($pdo);
        }
        return self::$instance;
    }

    // function for menambahkan penerbit dimulaiiiii 
    public function add($nama, $kota_penerbit, $no_tlp )
    {
        try {
            $stmt = $this->db->prepare("INSERT INTO penerbit (nama, kota_penerbit, no_tlp ) VALUES (:nama, :kota_penerbit, :no_tlp )");
            $stmt->bindParam(":nama", $nama);
            $stmt->bindParam(":kota_penerbit", $kota_penerbit);
            $stmt->bindParam(":no_tlp", $no_tlp);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getID($id_penerbit)
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM penerbit WHERE id_penerbit = :id_penerbit");
            $stmt->execute(array(":id_penerbit" => $id_penerbit));
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            return $data;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    // function for tambah penerbit doneee

    // function for mengedit penerbit dimulaiiiii 
    public function edit($id_penerbit, $nama, $kota_penerbit, $no_tlp,)
    {
        try {
            $stmt = $this->db->prepare("UPDATE penerbit SET nama = :nama, kota_penerbit = :kota_penerbit, no_tlp = :no_tlp, WHERE id_penerbit = :id_penerbit");
            $stmt->bindParam(":id_penerbit", $id_penerbit);
            $stmt->bindParam(":nama", $nama);
            $stmt->bindParam(":kota_penerbit", $kota_penerbit);
            $stmt->bindParam(":no_tlp", $no_tlp);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    // function for mengedit penerbit doneee

    // function for menghapus penerbit dimulaiiiii 
    public function hapus($id_penerbit)
    {
        try {
            $stmt = $this->db->prepare("DELETE FROM penerbit WHERE id_penerbit = :id_penerbit");
            $stmt->bindParam(":id_penerbit", $id_penerbit);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    // function for menghapus penerbit doneee

    // function for mendapatkan semua penerbit dimulaiiiii 
    public function getAll()
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM penerbit");
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    // function for menampilkan semua penerbit doneee
}
?>