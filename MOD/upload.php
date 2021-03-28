<?php
include "../MOD/function.php";
include "../MOD/session.php";

    $con = connect();
    $idsurat = $_GET['id'];
    $hal = $_GET['hal'];
    $idkar = $_SESSION['id'];
    $nosurat = $_POST['nosurat'];
    $tanggal = $_POST['tanggal'];
    $kepengurusan = $_POST['jenis'];
    $namapengirim = $_POST['namapengirim'];
    $jabatanpengirim = $_POST['jabatanpengirim'];
    $namatujuan = $_POST['namatujuan'];
    $jabatantujuan = $_POST['jabatantujuan'];
    $instansitujuan = $_POST['instansitujuan'];
    $namapenerima = $_POST['namapenerima']; //frpengiriman
    $jabatanpenerima = $_POST['jabatanpenerima']; //frpengiriman
    $kontak = $_POST['kontak']; //frpengiriman

    $perihal = $_POST['perihal'];
    $in_doc = $_FILES['namafile']['name'];
    $ad_doc = $_FILES['namafile']['tmp_name'];
    $ext = explode('.', $in_doc);
    $fn_doc = time().".".$ext[1];
    $intgl = date("$tanggal");
    $tglskrng = date("Y-m-d");

    if($hal == "InputSuratKeluar"){
        $mv_doc = move_uploaded_file($ad_doc, "../ADM/DATA/SuratKeluar/".$fn_doc);  
        $sql = "insert into suratkeluar(no_surat, tanggal_surat, kepengurusan, nama_pengirim, jabatan_pengirim, nama_tujuan, jabatan_tujuan, instansi_tujuan, perihal, nama_file)values('$nosurat','$tanggal','$kepengurusan','$namapengirim', '$jabatanpengirim','$namatujuan', '$jabatantujuan', '$instansitujuan', '$perihal', '$fn_doc');";
        $result = mysqli_query($con, $sql);
        header("location: ../?hal=SuratKeluar", true, 301);
        exit();
    }else if ($hal == "InputPengiriman"){
        $mv_doc = move_uploaded_file($ad_doc, "../ADM/DATA/BuktiPengiriman/".$fn_doc);  
        $sql = "insert into pengiriman (id_suratkeluar, id_karyawan, nama_penerima, jabatan_penerima, tanggal_kirim, kontak_penerima, nama_file)values('$idsurat','$idkar','$namapenerima','$jabatanpenerima','$tanggal', '$kontak', '$fn_doc');";
        $result = mysqli_query($con, $sql);
        header("location: ../?hal=Pengiriman&id=$idsurat", true, 301);
        exit();
    } else {
        echo "end";
    }
    

    if($result){
        echo "<script>alert('UPLOAD BERHASIL')</script>";
    } else{
        echo "<script>alert('UPLOAD GAGAL')</script>". mysqli_error($con);
    }
?>