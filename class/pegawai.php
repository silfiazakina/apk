<?php

class pegawai
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
            self::$instance = new pegawai($pdo);
        }
        return self::$instance;
    }

    // function for menambahkan pegawai dimulaiiiii 
    public function add($nama, $nisn, $alamat)
    {
        try {
            $stmt = $this->db->prepare("INSERT INTO pegawai (nama, nisn, alamat) VALUES (:nama, :nisn, :alamat)");
            $stmt->bindParam(":nama", $nama);
            $stmt->bindParam(":nisn", $nisn);
            $stmt->bindParam(":alamat", $alamat);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getID($id_pegawai)
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM pegawai WHERE id_pegawai = :id_pegawai");
            $stmt->execute(array(":id_pegawai" => $id_pegawai));
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            return $data;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    // function for tambah pegawai doneee

    // function for mengedit pegawai dimulaiiiii 
    public function edit($id_pegawai, $nama, $nisn, $alamat,)
    {
        try {
            $stmt = $this->db->prepare("UPDATE pegawai SET nama = :nama, nisn = :nisn, alamat = :alamat WHERE id_pegawai = :id_pegawai");
            $stmt->bindParam(":id_pegawai", $id_pegawai);
            $stmt->bindParam(":nama", $nama);
            $stmt->bindParam(":nisn", $nisn);
            $stmt->bindParam(":alamat", $alamat);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    // function for mengedit pegawai doneee

    // function for menghapus pegawai dimulaiiiii 
    public function hapus($id_pegawai)
    {
        try {
            $stmt = $this->db->prepare("DELETE FROM pegawai WHERE id_pegawai = :id_pegawai");
            $stmt->bindParam(":id_pegawai", $id_pegawai);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    // function for menghapus pegawai doneee

    // function for mendapatkan semua pegawai dimulaiiiii 
    public function getAll()
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM pegawai");
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
            //koneksi berhasil
        }
    }
    // function for menampilkan semua pegawai doneee
}
?>