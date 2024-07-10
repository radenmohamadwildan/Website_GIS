<?php

class Database {

    public $mysqli;
    private $HOST = 'localhost';
    private $USER = 'root';
    private $PASS = '';
    private $DBNAME = 'websitegis'; // Sesuaikan dengan nama database yang benar

    public function __construct() {
        $this->mysqli = new mysqli($this->HOST, $this->USER, $this->PASS, $this->DBNAME);
        if (mysqli_connect_error()) {
            die('Koneksi Gagal');
        }
    }

    // Fungsi untuk login
    public function login($username, $password) {
        $username = $this->mysqli->real_escape_string($username);
        $password = $this->mysqli->real_escape_string($password);
        $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        return $this->mysqli->query($query);
    }

    // Fungsi untuk menambahkan data leader
    public function tambahDataLeader($nama, $alamat, $media_sosial, $foto, $kota_id) {
        $sql = "INSERT INTO data_leader (nama, alamat, media_sosial, foto, kota_id) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("ssssi", $nama, $alamat, $media_sosial, $foto, $kota_id);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    // Fungsi untuk mengedit data leader
    public function editDataLeader($nama, $alamat, $media_sosial, $foto, $kota_id, $id) {
        $sql = "UPDATE data_leader SET nama = ?, alamat = ?, media_sosial = ?, foto = ?, kota_id = ? WHERE id = ?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("ssssii", $nama, $alamat, $media_sosial, $foto, $kota_id, $id);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    // Metode untuk menghapus data leader beserta file foto
    public function hapusDataLeader($id) {
        // Ambil nama foto sebelum menghapus data leader
        $query = "SELECT foto FROM data_leader WHERE id = $id";
        $result = $this->mysqli->query($query);
        $row = $result->fetch_assoc();
        $foto = $row['foto'];

        // Hapus data leader dari database
        $query_delete = "DELETE FROM data_leader WHERE id = $id";
        $result_delete = $this->mysqli->query($query_delete);

        // Hapus file foto jika ada
        if ($foto) {
            $lokasi_foto = "../Asset/Foto_leader/" . $foto;
            if (file_exists($lokasi_foto)) {
                unlink($lokasi_foto); // Hapus file foto dari lokasi
            }
        }

        return $result_delete;
    }

    // Tambahkan metode untuk mengambil data leader berdasarkan ID
    public function getLeaderById($id) {
        $query = "SELECT * FROM data_leader WHERE id = $id";
        $result = $this->mysqli->query($query);
        return $result->fetch_assoc();
    }

    // Fungsi untuk mendapatkan nama kota berdasarkan kota_id
    public function getNamaKota($kota_id) {
        $sql = "SELECT nama_kota FROM kota WHERE id = ?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("i", $kota_id);
        $stmt->execute();
        $stmt->bind_result($nama_kota);
        $stmt->fetch();
        $stmt->close();
        return $nama_kota;
    }

    // Fungsi untuk menambahkan data artikel
    public function tambahDataArtikel($judul_artikel, $isi_artikel, $tanggal_publish, $file_foto, $penanggung_jawab, $kota_id) {
        $stmt = $this->mysqli->prepare("INSERT INTO data_artikel (judul_artikel, isi_artikel, tanggal_publish, file_foto, penanggung_jawab, kota_id) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssi", $judul_artikel, $isi_artikel, $tanggal_publish, $file_foto, $penanggung_jawab, $kota_id);
        return $stmt->execute();
    }

    public function editDataArtikel($judul_artikel, $isi_artikel, $tanggal_publish, $file_foto, $penanggung_jawab, $kota_id, $id) {
        $stmt = $this->mysqli->prepare("UPDATE data_artikel SET judul_artikel=?, isi_artikel=?, tanggal_publish=?, file_foto=?, penanggung_jawab=?, kota_id=? WHERE id=?");
        $stmt->bind_param("ssssssi", $judul_artikel, $isi_artikel, $tanggal_publish, $file_foto, $penanggung_jawab, $kota_id, $id);
        return $stmt->execute();
    }

    // Metode untuk menghapus data artikel beserta file foto
    public function hapusDataArtikel($id) {
        $stmt = $this->mysqli->prepare("DELETE FROM data_artikel WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    // Metode untuk mengambil data artikel berdasarkan ID
    public function getArtikelById($id) {
        $stmt = $this->mysqli->prepare("SELECT * FROM data_artikel WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // Metode untuk mengambil data kota berdasarkan ID
    public function getKotaById($id) {
        $stmt = $this->mysqli->prepare("SELECT nama_kota FROM kota WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
    // Tambahkan method getAllArtikel() ke dalam kelas Database
public function getAllArtikel() {
    $query = "SELECT * FROM data_artikel";
    $result = $this->mysqli->query($query);
    $artikels = array();
    while ($row = $result->fetch_assoc()) {
        $artikels[] = $row;
    }
    return $artikels;
}
}
?>
