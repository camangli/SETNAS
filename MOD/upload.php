<?php
include "../MOD/function.php";
include "../MOD/session.php";

    $con = connect();
    $idsurat = $_GET['id'];
    $hal = $_GET['hal'];
    $idkar = $_SESSION['id'];
    $nosurat = $_POST['nosurat'];
    $noagenda = $_POST['noagenda']; //frsuratmasuk
    $tanggal = $_POST['tanggal'];
    $tanggalsurat = $_POST['tanggalsurat']; //frsuratmasuk
    $jenis = $_POST['jenis'];
    $namapengirim = $_POST['namapengirim'];
    $jabatanpengirim = $_POST['jabatanpengirim'];
    $namatujuan = $_POST['namatujuan'];
    $jabatantujuan = $_POST['jabatantujuan'];
    $instansi = $_POST['instansi'];
    $namapenerima = $_POST['namapenerima']; //frpengiriman
    $jabatanpenerima = $_POST['jabatanpenerima']; //frpengiriman
    $kontak = $_POST['kontak']; //frpengiriman
    $tanggapan = $_POST['tanggapan']; //frtanggapan

    $perihal = $_POST['perihal'];
    $in_doc = $_FILES['namafile']['name'];
    $ad_doc = $_FILES['namafile']['tmp_name'];
    $ext = explode('.', $in_doc);
    $fn_doc = time().".".$ext[1];
    $intgl = date("$tanggal");
    date_default_timezone_set("Asia/Jakarta");
    $tglskrng = date("Y-m-d");
    $tglwkt = date("Y-m-d H:i:s");


    if($hal == "InputSuratKeluar"){
        $mv_doc = move_uploaded_file($ad_doc, "../ADM/DATA/SuratKeluar/".$fn_doc);  
        $sql = "insert into suratkeluar(no_surat, tanggal_surat, kepengurusan, nama_pengirim, jabatan_pengirim, nama_tujuan, jabatan_tujuan, instansi_tujuan, perihal, nama_file)values('$nosurat','$tanggal','$jenis','$namapengirim', '$jabatanpengirim','$namatujuan', '$jabatantujuan', '$instansi', '$perihal', '$fn_doc');";
        $result = mysqli_query($con, $sql);
        header("location: ../?page=SuratMenyurat&hal=SuratKeluar", true, 301);
        exit();
    }else if ($hal == "InputPengiriman"){
        $mv_doc = move_uploaded_file($ad_doc, "../ADM/DATA/BuktiPengiriman/".$fn_doc);  
        $sql = "insert into pengiriman (id_suratkeluar, id_karyawan, nama_penerima, jabatan_penerima, tanggal_kirim, kontak_penerima, nama_file)values('$idsurat','$idkar','$namapenerima','$jabatanpenerima','$tanggal', '$kontak', '$fn_doc');";
        $result = mysqli_query($con, $sql);
        header("location: ../?page=SuratMenyurat&hal=Pengiriman&id=$idsurat", true, 301);
        exit();
    }else if ($hal == "InputSuratMasuk"){
        $mv_doc = move_uploaded_file($ad_doc, "../ADM/DATA/SuratMasuk/".$fn_doc);  
        $sql = "insert into suratmasuk (no_agenda, no_surat, tanggal_masuk, tanggal_surat, jenis_surat, nama, jabatan, instansi, perihal, nama_file)values('$noagenda','$nosurat', '$tanggal', '$tanggalsurat', '$jenis','$namapengirim','$jabatanpengirim', '$instansi', '$perihal', '$fn_doc')";
        $result = mysqli_query($con, $sql);
        header("location: ../?page=SuratMenyurat&hal=SuratMasuk", true, 301);
        exit();
    }else if ($hal == "Tanggapan"){  
        $sql = "insert into tanggapan (id_karyawan, id_suratmasuk, tanggapan, waktu_tanggapan)values('$idkar','$idsurat', '$tanggapan', '$tglwkt')";
        $result = mysqli_query($con, $sql);
        header("location: ../?page=SuratMenyurat&hal=DetailSuratMasuk&id=$idsurat", true, 301);
        exit();
    }else {
        echo "end";
    }
    

    if($result){
        echo "<script>alert('UPLOAD BERHASIL')</script>";
    } else{
        echo "<script>alert('UPLOAD GAGAL')</script>". mysqli_error($con);
    }
?>