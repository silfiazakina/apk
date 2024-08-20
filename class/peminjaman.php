<?php

class peminjaman
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
            self::$instance = new peminjaman($pdo);
        }
        return self::$instance;
    }

    // function for menambahkan peminjaman dimulaiiiii 
    public function add($nama, $nisn, $alamat)
    {
        try {
            $stmt = $this->db->prepare("INSERT INTO peminjaman (nama, nisn, alamat) VALUES (:nama, :nisn, :alamat)");
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

    public function getID($id_peminjaman)
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM peminjaman WHERE id_peminjaman = :id_peminjaman");
            $stmt->execute(array(":id_peminjaman" => $id_peminjaman));
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            return $data;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    // function for tambah peminjaman doneee

    // function for mengedit peminjaman dimulaiiiii 
    public function edit($id_peminjaman, $nama, $nisn, $alamat)
    {
        try {
            $stmt = $this->db->prepare("UPDATE peminjaman SET nama = :nama, nisn = :nisn, alamat = :alamat  WHERE id_peminjaman = :id_peminjaman");
            $stmt->bindParam(":id_peminjaman", $id_peminjaman);
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
    //function for mengedit peminjaman doneee

    // function for menghapus peminjaman dimulaiiiii 
    public function hapus($id_peminjaman, $nama, $nisn, $alamat)
    {
        try {
            $stmt = $this->db->prepare("DELETE FROM anggota WHERE id_anggota = :id_anggota");
            $stmt->bindParam(":id_peminjaman", $id_peminjaman);
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
    // function for menghapus peminjaman doneee

    // function for mendapatkan semua peminjaman dimulaiiiii 
    public function getAll()
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM peminjaman");
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    // function for menampilkan semua peminjaman doneee
}
?>