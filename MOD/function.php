<?php
function connect(){
    $sname = "localhost";
    $uname = "root";
    $pass = "";
    $db = "sekretariat";
    $con = new mysqli($sname, $uname, $pass, $db);
    return $con; 
}

function ceklogin($username, $pwd){
    $con = connect();
    $sql = mysqli_query($con, "select * from user where id_user='$username' AND password='$pwd'");
    $jml = mysqli_num_rows($sql);
    $is = mysqli_fetch_object($sql);
    $id = $is->id_karyawan;

    if($jml >= 1){
    session_regenerate_id();
	$_SESSION['login'] = true;
	$_SESSION['name'] = $username;
	$_SESSION['id'] = $id;
	header("location: ../../SETNAS/?hal=home", true, 301);
    }else{

        echo "<script language='javascript'>alert('Usernama atau password salah')</script>";
        header("location: ../../SETNAS/f-login.php", true, 301);
    }
}
function iuser($id){
    $con = connect();
    $dt = mysqli_query($con, "select * from karyawan where id_karyawan='$id'");
    $pos = mysqli_fetch_object($dt);
    $nama = $pos->nama;
    return $nama;
}

function iduser($id){
    return $id;
}
function ibagian($id){
    $con = connect();
    $dt = mysqli_query($con, "select * from karyawan where id_karyawan='$id'");
    $pos = mysqli_fetch_object($dt);
    $nama = $pos->jabatan;
    return $nama;
}
function tanggal($dttgl){
    $atgl = date_create("$dttgl");
    $ftgl = date_format($atgl, "d F Y");
    return $ftgl;
}

?>