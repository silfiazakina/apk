<?php

class penerbit
{
    private $db;
    private static $instance = null;

    // Constructor menerima koneksi database
    public function __construct($db_conn)
    {
        $this->db = $db_conn;
    }

    // Singleton pattern to ensure only one instance
    public static function getInstance($pdo)
    {
        if (self::$instance == null) {
            self::$instance = new penerbit($pdo);
        }
        return self::$instance;
    }

    // Function to add a new publisher
    public function add($nama, $kota_penerbit, $no_tlp)
    {
        if (empty($nama) || empty($kota_penerbit) || empty($no_tlp)) {
            throw new InvalidArgumentException('Semua parameter harus diisi.');
        }

        // Pastikan $no_tlp benar
        if (!preg_match('/^\d+$/', $no_tlp)) {
            throw new InvalidArgumentException('Nomor telepon tidak valid.');
        }

        try {
            $stmt = $this->db->prepare("INSERT INTO penerbit (nama, kota_penerbit, no_tlp) VALUES (:nama, :kota_penerbit, :no_tlp)");
            $stmt->bindParam(":nama", $nama, PDO::PARAM_STR);
            $stmt->bindParam(":kota_penerbit", $kota_penerbit, PDO::PARAM_STR);
            $stmt->bindParam(":no_tlp", $no_tlp, PDO::PARAM_STR);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            // Log error message for debugging
            error_log($e->getMessage());
            return false;
        }
    }

    // Function to get a publisher by ID
    public function getID($id_penerbit)
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM penerbit WHERE id_penerbit = :id_penerbit");
            $stmt->bindParam(":id_penerbit", $id_penerbit, PDO::PARAM_INT); // Asumsi ID adalah integer
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            return $data;
        } catch (PDOException $e) {
            // Log error message for debugging
            error_log($e->getMessage());
            return false;
        }
    }

    // Function to update a publisher's details
    public function edit($id_penerbit, $nama, $kota_penerbit, $no_tlp)
    {
        try {
            $stmt = $this->db->prepare("UPDATE penerbit SET nama = :nama, kota_penerbit = :kota_penerbit, no_tlp = :no_tlp WHERE id_penerbit = :id_penerbit");
            $stmt->bindParam(":id_penerbit", $id_penerbit, PDO::PARAM_INT);
            $stmt->bindParam(":nama", $nama, PDO::PARAM_STR);
            $stmt->bindParam(":kota_penerbit", $kota_penerbit, PDO::PARAM_STR);
            $stmt->bindParam(":no_tlp", $no_tlp, PDO::PARAM_STR);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            // Log error message for debugging
            error_log($e->getMessage());
            return false;
        }
    }

    // Function to delete a publisher
    public function hapus($id_penerbit)
    {
        try {
            $stmt = $this->db->prepare("DELETE FROM penerbit WHERE id_penerbit = :id_penerbit");
            $stmt->bindParam(":id_penerbit", $id_penerbit, PDO::PARAM_INT);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            // Log error message for debugging
            error_log($e->getMessage());
            return false;
        }
    }

    // Function to get all publishers
    public function getAll()
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM penerbit");
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } catch (PDOException $e) {
            // Log error message for debugging
            error_log($e->getMessage());
            return false;
        }
    }
}
?>
