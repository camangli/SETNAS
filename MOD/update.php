<?php
include "../MOD/function.php";

    $con = connect();
    $idv = $_GET['id'];
    $iduser = $_SESSION['id'];
    $hal = $_GET['hal'];
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

    $perihal = $_POST['perihal'];
    $in_doc = $_FILES['namafile']['name'];
    $ad_doc = $_FILES['namafile']['tmp_name'];
    $ext = explode('.', $in_doc);
    $fn_doc = time().".".$ext[1];
    $intgl = date("$tanggal");

    if($hal == 'UpdateSuratKeluar'){
        if($_FILES['namafile']['size'] == 0){
            $sql = "update suratkeluar set no_surat='$nosurat', tanggal_surat='$tanggal', kepengurusan='$jenis', nama_pengirim='$namapengirim', jabatan_pengirim='$jabatanpengirim', nama_tujuan='$namatujuan', jabatan_tujuan='$jabatantujuan', instansi_tujuan='$instansi', perihal='$perihal' where id_suratkeluar='$idv'";
        }else{
            $sql2 = "select * from suratkeluar where id_suratkeluar='$idv'";
            $q = mysqli_query($con, $sql2);
            $data = mysqli_fetch_object($q);
            unlink("../ADM/DATA/SuratKeluar/$data->nama_file");
            $mv_doc = move_uploaded_file($ad_doc, "../ADM/DATA/SuratKeluar/".$fn_doc);       
            $sql = "update suratkeluar set no_surat='$nosurat', tanggal_surat='$tanggal', kepengurusan='$jenis', nama_pengirim='$namapengirim', jabatan_pengirim='$jabatanpengirim', nama_tujuan='$namatujuan', jabatan_tujuan='$jabatantujuan', instansi_tujuan='$instansi', perihal='$perihal', nama_file='$fn_doc' where id_suratkeluar='$idv'"; 
        }
       $result = mysqli_query($con, $sql); 
       header("location: ../?hal=DetailSuratKeluar&id=$idv", true, 301);
       exit();
    }else if($hal == 'UpdatePengiriman'){
        $sql2 = "select * from pengiriman where id_pengiriman='$idv'";
        $q = mysqli_query($con, $sql2);
        $data = mysqli_fetch_object($q);
        $idsurat = $data->id_suratkeluar;
        if($_FILES['namafile']['size'] == 0){
            $sql = "update pengiriman set nama_penerima='$namapenerima', jabatan_penerima='$jabatanpenerima', tanggal_kirim='$tanggal', kontak_penerima='$kontak' where  id_pengiriman='$idv'";
        }else{
            unlink("../ADM/DATA/BuktiPengiriman/$data->nama_file");   
            $mv_doc = move_uploaded_file($ad_doc, "../ADM/DATA/BuktiPengiriman/".$fn_doc);    
            $sql = "update pengiriman set nama_penerima='$namapenerima', jabatan_penerima='$jabatanpenerima', tanggal_kirim='$tanggal', kontak_penerima='$kontak', nama_file='$fn_doc' where id_pengiriman='$idv'"; 
        }
        $result = mysqli_query($con, $sql); 
        header("location: ../?hal=Pengiriman&id=$idsurat", true, 301);
        exit();
    }else if($hal == 'UpdateSuratMasuk'){
        if($_FILES['namafile']['size'] == 0){
            $sql = "update suratmasuk set no_agenda='$noagenda', no_surat='$nosurat', tanggal_masuk='$tanggal', tanggal_surat='$tanggalsurat', jenis_surat='$jenis', nama='$namapengirim', jabatan='$jabatanpengirim', instansi='$instansi', perihal='$perihal' where id_suratmasuk='$idv'";
        }else{
            $sql2 = "select * from suratmasuk where id_suratmasuk='$idv'";
            $q = mysqli_query($con, $sql2);
            $data = mysqli_fetch_object($q);
            unlink("../ADM/DATA/SuratMasuk/$data->nama_file");
            $mv_doc = move_uploaded_file($ad_doc, "../ADM/DATA/SuratMasuk/".$fn_doc);       
            $sql = "update suratmasuk set no_agenda='$noagenda', no_surat='$nosurat', tanggal_masuk='$tanggal', tanggal_surat='$tanggalsurat', jenis_surat='$jenis', nama='$namapengirim', jabatan='$jabatanpengirim', instansi='$instansi', perihal='$perihal', nama_file='$fn_doc' where id_suratmasuk='$idv'"; 
        }
       $result = mysqli_query($con, $sql); 
       header("location: ../?hal=DetailSuratMasuk&id=$idv", true, 301);
       exit();
    }else{
        echo "end";
    }
    if($result){
        echo "alert('UPLOAD BERHASIL')";
    } else{
        echo "alert('UPLOAD GAGAL')". mysqli_error($con);
    }
?>