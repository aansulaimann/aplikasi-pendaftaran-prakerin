<?php

// connect to db
$conn = mysqli_connect("localhost", "root", "", "pendaftaranprakerin");

// baseurl
define('BASEURL', 'http://localhost/aplikasi-pendaftaran-prakerin/public/');

// fungsi login
function login($data) {
    global $conn;
    $email = mysqli_real_escape_string($conn, htmlspecialchars(trim($data['email'])));
    $password = mysqli_real_escape_string($conn, htmlspecialchars(trim($data['password'])));

    $query = "SELECT id, email, username, password, role FROM tb_user WHERE email = '$email'";
    $result = mysqli_query($conn, $query);
    
    if(mysqli_num_rows($result) === 1) {
        $fetch = mysqli_fetch_assoc($result);

        if(password_verify($password, $fetch['password'])) {
            return $fetch;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

// fungsi registrasi
function register($data) {
    global $conn;

    $username = htmlspecialchars(trim($data['username']));
    $email = htmlspecialchars(trim($data['email']));
    $password = htmlspecialchars(trim($data['password']));
    $konfirmPass = htmlspecialchars(trim($data['konfirmPass']));

    if($password != $konfirmPass) {
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    $addUser = "INSERT INTO tb_user (id, email, username, password, role) 
                VALUES ('', '$email', '$username', '$password', 'user')";

    mysqli_query($conn, $addUser);
    return mysqli_affected_rows($conn);
}

// fungsi logout
function logout() {
    $_SESSION = [];
    session_unset();
    return true;
}

// fungsi flasher
function flasher($msg, $color, $aksi) {
    $_SESSION['flash'] = [
        'pesan' => $msg,
        'color' => $color,
        'aksi' => $aksi
    ];

    if(isset($_SESSION['flash'])) {
        echo '<div class="alert alert-'. $_SESSION['flash']['color'] .' alert-dismissible fade show" role="alert">
                    <strong>'. $_SESSION['flash']['pesan'] .'</strong> '. $_SESSION['flash']['aksi'] .'
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
        unset($_SESSION['flash']);
    }
}

function tambah($data) {
    global $conn;
    $id = $_SESSION['login']['id'];
    $cek = "SELECT user_id FROM tb_siswa WHERE user_id = '$id'";
    $stmt = mysqli_query($conn, $cek);

    if(mysqli_num_rows($stmt) === 1) {
        return false;
    } else {
        $nama_lengkap = htmlspecialchars(trim($data['nm_lengkap']));
        $email = htmlspecialchars(trim($data['email']));
        $no_telp = htmlspecialchars(trim($data['no_telp']));
        $tgl_lahir = htmlspecialchars(trim($data['tgl_lahir']));
        $jurusan = htmlspecialchars(trim($data['jurusan']));
        $nisn = htmlspecialchars(trim($data['nisn']));
        $prestasi = htmlspecialchars(trim($data['prestasi']));
        $asal_sekolah = htmlspecialchars(trim($data['asal_sekolah']));
        $created_at = date('Y-m-d');
        $user_id = $_SESSION['login']['id'];
        $lowongan = htmlspecialchars(trim($data['lowongan']));

        $tambah = "INSERT INTO tb_siswa (id, nama_lengkap, nisn, email, jurusan, no_telp, tgl_lahir, asal_sekolah, foto, prestasi, sertifikat, pilihan_lowongan, created_at, user_id) VALUES('', '$nama_lengkap', '$nisn', '$email', '$jurusan', '$no_telp', '$tgl_lahir', '$asal_sekolah', '', '$prestasi', '', '$lowongan', '$created_at', '$user_id')";

        mysqli_query($conn, $tambah);
        return mysqli_affected_rows($conn);
    }
}

// admin entry lowongan
function tambahLowongan($data) {
    global $conn;

    $nm_lowongan = htmlspecialchars(trim($data['nm_lowongan']));
    $kualifikasi = htmlspecialchars(trim($data['kualifikasi']));

    $tambah = "INSERT INTO tb_lowongan (id, nama_lowongan, kualifikasi) 
                VALUES ('', '$nm_lowongan', '$kualifikasi')";

    mysqli_query($conn, $tambah);
    return mysqli_affected_rows($conn);
}

function tambahJurusan($data) {
    global $conn;

    $nm_jurusan = htmlspecialchars(trim($data['nm_jurusan']));
    $singkatan = htmlspecialchars(trim($data['singkatan']));

    $jurusan = "INSERT INTO tb_jurusan (id, nama_jurusan, singkatan) VALUES ('', '$nm_jurusan', '$singkatan')";

    mysqli_query($conn, $jurusan);
    return mysqli_affected_rows($conn);
}

function getDataLowongan() {
    global $conn;

    $getDataLowongan = "SELECT id, nama_lowongan, kualifikasi FROM tb_lowongan";
    $res = mysqli_query($conn, $getDataLowongan);
    $data = [];

    while($row = mysqli_fetch_assoc($res)) {
        $data[] = $row;
    }

    return $data;
}

function getDataJurusan() {
    global $conn;

    $getJurusan = "SELECT * FROM tb_jurusan";
    $res = mysqli_query($conn, $getJurusan);
    $data = [];

    while($row = mysqli_fetch_assoc($res)) {
        $data[] = $row;
    }

    return $data;
}

function deleteLowongan($id) {
    global $conn;

    $deleteLowongan = "DELETE FROM tb_lowongan WHERE id = '$id'";
    mysqli_query($conn, $deleteLowongan);
    return mysqli_affected_rows($conn);
}

function deleteJurusan($id) {
    global $conn;

    $deleteJurusan = "DELETE FROM tb_jurusan WHERE id = '$id'";
    mysqli_query($conn, $deleteJurusan);
    return mysqli_affected_rows($conn);
}

function send($data) {
    global $conn;

    $id = htmlspecialchars(trim($data['id']));
    $pengirim_email = htmlspecialchars(trim($data['from']));
    $to = htmlspecialchars(trim($data['to']));
    $subjek = htmlspecialchars(trim($data['subjek']));
    $isi = htmlspecialchars(trim($data['isi']));
    $pwd = htmlspecialchars(trim($data['password']));

    // ini_set("SMTP","smtp.gmail.com");
    // ini_set("smtp_port","25");
    ini_set('sendmail_from', $pengirim_email);
    ini_set('auth_username', $pengirim_email);
    ini_set('auth_password', $pwd);
    ini_set('force_sender', $pengirim_email);

    $query = "INSERT INTO tb_menyetujui (id, user_id, pengirim_email, isi_email, subjek) 
                VALUES ('', '$id', '$pengirim_email', '$isi', '$subjek')";

    // Sending email
    if(mail("aansulaiman92@gmail.com", "coba", "coba kirim email")){
        // var_dump(mail($to, $subjek, $isi)); die;
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    } else{
        return 0;
    }
}

// =========

function getDataById($id) {
    global $conn;

    $getById = "SELECT nama_lengkap, jurusan, email, no_telp, tgl_lahir, asal_sekolah, foto, nisn, prestasi, sertifikat, user_id FROM tb_siswa WHERE user_id = '$id'";
    return mysqli_query($conn, $getById);
}

function getDataPendaftarById($id) {
    global $conn;

    $getById =  "SELECT id, username, email FROM tb_user WHERE id NOT IN (SELECT user_id FROM tb_siswa) AND role = 'user' AND id = '$id'";
    $res = mysqli_query($conn, $getById);

    return mysqli_fetch_assoc($res);
}

function getAllDataByKey($key) {
    global $conn;

    
    $keyword = htmlspecialchars(trim($key['key']));

    $getByKey = "SELECT * FROM tb_user WHERE id NOT IN (SELECT user_id FROM tb_siswa) AND username LIKE '%$keyword%'";

    $res = mysqli_query($conn, $getByKey);
    $rows = [];
    while($row = mysqli_fetch_assoc($res)) {
        $rows[] = $row;
    }

    return $rows;
}

function getAllCompleteDataByKey($key) {
    global $conn;

    $keyword = htmlspecialchars(trim($key['key']));

    $getAllData = "SELECT s.id, s.nama_lengkap, s.nisn, s.email, s.jurusan, s.asal_sekolah, s.foto, s.user_id, u.id FROM tb_siswa s, tb_user u WHERE s.user_id=u.id AND s.nama_lengkap LIKE '%$keyword%'";
    $res = mysqli_query($conn, $getAllData);
    $data = [];

    while($row = mysqli_fetch_assoc($res)) {
        $data[] = $row;
    }

    return $data;
}

function getAllDataRegist() {
    global $conn;

    $getAllData = "SELECT id, username, email FROM tb_user WHERE id NOT IN (SELECT user_id FROM tb_siswa) AND role = 'user' LIMIT 3";
    $res = mysqli_query($conn, $getAllData);
    $data = [];

    while($row = mysqli_fetch_assoc($res)) {
        $data[] = $row;
    }

    return $data;
}

function getAllData() {
    global $conn;

    $getAllData = "SELECT id, username, email FROM tb_user WHERE id NOT IN (SELECT user_id FROM tb_siswa) AND role = 'user'";
    $res = mysqli_query($conn, $getAllData);
    $data = [];

    while($row = mysqli_fetch_assoc($res)) {
        $data[] = $row;
    }

    return $data;
}

function getAllComplete() {
    global $conn;

    $getAllData = "SELECT s.id, s.nama_lengkap, s.nisn, s.email, s.jurusan, s.asal_sekolah, s.foto, s.user_id, s.pilihan_lowongan, u.id FROM tb_siswa s, tb_user u WHERE s.user_id=u.id LIMIT 3";
    $res = mysqli_query($conn, $getAllData);
    $data = [];

    while($row = mysqli_fetch_assoc($res)) {
        $data[] = $row;
    }

    return $data;
}

function getAllCompleteData() {
    global $conn;

    $getAllData = "SELECT s.id, s.nama_lengkap, s.nisn, s.email, s.jurusan, s.asal_sekolah, s.foto, s.user_id, s.pilihan_lowongan, u.id FROM tb_siswa s, tb_user u WHERE s.user_id=u.id";
    $res = mysqli_query($conn, $getAllData);
    $data = [];

    while($row = mysqli_fetch_assoc($res)) {
        $data[] = $row;
    }

    return $data;
}

function getAllCompleteDataById($id) {
    global $conn;

    $getAllDataById = "SELECT * FROM tb_siswa s, tb_user u WHERE s.user_id=u.id AND s.user_id='$id'";
    $res = mysqli_query($conn, $getAllDataById);

    return mysqli_fetch_assoc($res);
}

function getDataLaporan($data) {
    global $conn;

    $from = htmlspecialchars(trim($data['from']));
    $to = htmlspecialchars(trim($data['to']));

    $query = "SELECT s.id, s.nama_lengkap, s.nisn, s.email, s.jurusan, s.asal_sekolah, s.foto, s.user_id, s.created_at, u.id FROM tb_siswa s, tb_user u WHERE s.user_id=u.id AND s.created_at BETWEEN '$from' AND '$to'";

    $res = mysqli_query($conn, $query);
    $rows = [];

    while($row = mysqli_fetch_assoc($res)) {
        $rows[] = $row;
    }

    return $rows;
}

function uploadSertif() {
    global $conn;
    // deklarasi
    $namaFile = $_FILES['sertif']['name'];
    $ukuranFile = $_FILES['sertif']['size'];
    $error = $_FILES['sertif']['error'];
    $tmpName = $_FILES['sertif']['tmp_name'];

    // cek apakah tidak ada gambar yang di upload
    if( $error === 4 ){
        echo " <script> alert('Masukan gambar terlebih dahulu'); </script> ";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if( !in_array($ekstensiGambar, $ekstensiGambarValid) ){
        echo " <script> alert('Yang anda upload bukan gambar!'); </script> ";
        return false;
    }

    // cek jika ukurannya terlalu besar
    if( $ukuranFile > 100000 ) {
        echo " <script> alert('ukuran gambar terlalu besar'); </script> ";
        return false;
    }

    // lolos pengecekan gambar siap di upload
    // generate nama gambar baru
    $namaFileBaru = time() . "_" . $namaFile;
    
    move_uploaded_file($tmpName, 'uploads/sertif/' .$namaFileBaru);

    $id = $_SESSION['login']['id'];
    $updateProfile = "UPDATE tb_siswa SET sertifikat = '$namaFileBaru' WHERE user_id = '$id'";
    mysqli_query($conn, $updateProfile);
    return mysqli_affected_rows($conn);
}

function upload() {
    global $conn;
    // deklarasi
    $namaFile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpName = $_FILES['foto']['tmp_name'];

    // cek apakah tidak ada gambar yang di upload
    if( $error === 4 ){
        echo " <script> alert('Masukan gambar terlebih dahulu'); </script> ";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if( !in_array($ekstensiGambar, $ekstensiGambarValid) ){
        echo " <script> alert('Yang anda upload bukan gambar!'); </script> ";
        return false;
    }

    // cek jika ukurannya terlalu besar
    if( $ukuranFile > 100000 ) {
        echo " <script> alert('ukuran gambar terlalu besar'); </script> ";
        return false;
    }

    // lolos pengecekan gambar siap di upload
    // generate nama gambar baru
    $namaFileBaru = time() . "_" . $namaFile;
    
    move_uploaded_file($tmpName, 'uploads/profile/' .$namaFileBaru);

    $id = $_SESSION['login']['id'];
    $updateProfile = "UPDATE tb_siswa SET foto = '$namaFileBaru' WHERE user_id = '$id'";
    mysqli_query($conn, $updateProfile);
    return mysqli_affected_rows($conn);
}

function delete($id) {
    global $conn;
    
    $delete = "DELETE FROM tb_user WHERE id = '$id'";
    mysqli_query($conn, $delete);

    return mysqli_affected_rows($conn);
}

function deleteComplete($id) {
    global $conn;

    $d = "DELETE FROM tb_siswa WHERE user_id = '$id'";
    mysqli_query($conn, $d);

    return mysqli_affected_rows($conn);
}

function updateProfile($data) {
    global $conn;

    $nama_lengkap = htmlspecialchars(trim($data['nm_lengkap']));
    $email = htmlspecialchars(trim($data['email']));
    $no_telp = htmlspecialchars(trim($data['no_telp']));
    $tgl_lahir = htmlspecialchars(trim($data['tgl_lahir']));
    $jurusan = htmlspecialchars(trim($data['jurusan']));
    $nisn = htmlspecialchars(trim($data['nisn']));
    $prestasi = htmlspecialchars(trim($data['prestasi']));
    $asal_sekolah = htmlspecialchars(trim($data['asal_sekolah']));
    $user_id = htmlspecialchars(trim($data['user_id']));

    $ubahDataProfile = "UPDATE tb_siswa 
                        SET nama_lengkap = '$nama_lengkap', 
                            email = '$email',
                            no_telp = '$no_telp',
                            tgl_lahir = '$tgl_lahir',
                            jurusan = '$jurusan',
                            nisn = '$nisn',
                            prestasi = '$prestasi',
                            asal_sekolah = '$asal_sekolah'
                        WHERE user_id = '$user_id'";

    mysqli_query($conn, $ubahDataProfile);
    return mysqli_affected_rows($conn);
}