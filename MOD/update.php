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

    //pegawai
    $namapegawai = $_POST['nama'];
    $idbagian = $_POST['bagian'];
    $jabatanpegawai = $_POST['jabatan'];
    $notelp = $_POST['notelp'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $username = $_POST['userid'];
    $paslama = $_POST['paslama'];
    $pasbaru = $_POST['pasbaru'];
    
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
       header("location: ../?page=SuratMenyurat&hal=DetailSuratKeluar&id=$idv", true, 301);
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
        header("location: ../?page=SuratMenyurat&hal=Pengiriman&id=$idsurat", true, 301);
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
       header("location: ../?page=SuratMenyurat&hal=DetailSuratMasuk&id=$idv", true, 301);
       exit();
    }else if($hal == 'UpdatePegawai'){
        if($_FILES['namafile']['size'] == 0){
            if($iduser == 1){
                $inbagian = "id_bagian='$idbagian',";
            }
            $sql = "update karyawan set nama='$namapegawai', $inbagian jabatan='$jabatanpegawai', no_telp='$notelp', email='$email', alamat='$alamat' where id_karyawan='$idv'";
            $sql2 = "select * from user where id_karyawan='$idv'";
            $q = mysqli_query($con, $sql2);
            $data = mysqli_fetch_object($q);
            if(md5($paslama) == $data->password){
                $upsas = md5($pasbaru);
                $sqlpas = "update user set password='$upsas' where id_user='$data->id_user'";
                $resultpas = mysqli_query($con, $sqlpas);
            }
        }else{
            if($iduser == 1){
                $inbagian = "id_bagian='$idbagian',";
            }
            $sql2 = "select * from karyawan where id_karyawan='$idv'";
            $q = mysqli_query($con, $sql2);
            $data = mysqli_fetch_object($q);
            unlink("../IMG/asset/Profile/$data->foto");
            $mv_doc = move_uploaded_file($ad_doc, "../IMG/asset/Profile/".$fn_doc);       
            $sql = "update karyawan set nama='$namapegawai', $inbagian jabatan='$jabatanpegawai', no_telp='$notelp', email='$email', alamat='$alamat', foto='$fn_doc' where id_karyawan='$idv'";
            $sql3 = "select * from user where id_karyawan='$idv'";
            $q2 = mysqli_query($con, $sql3);
            $data2 = mysqli_fetch_object($q2);
            if(md5($paslama) == $data2->password){
                $upsas = md5($pasbaru);
                $sqlpas = "update user set password='$upsas' where id_user='$data2->id_user'";
                $resultpas = mysqli_query($con, $sqlpas);
            }
        }
      $result = mysqli_query($con, $sql); 
      header("location: ../?page=Kepegawaian", true, 301);
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