<?php
include "../MOD/function.php";
    $con = connect();
    $nosurat = $_POST['nosurat'];
    $tanggal = $_POST['tanggal'];
    $kepengurusan = $_POST['jenis'];
    $namapengirim = $_POST['namapengirim'];
    $jabatanpengirim = $_POST['jabatanpengirim'];
    $namatujuan = $_POST['namatujuan'];
    $jabatantujuan = $_POST['jabatantujuan'];
    $instansitujuan = $_POST['instansitujuan'];
    $perihal = $_POST['perihal'];
    $in_doc = $_FILES['namafile']['name'];
    $ad_doc = $_FILES['namafile']['tmp_name'];
    $ext = explode('.', $in_doc);
    $fn_doc = time().".".$ext[1];
    $mv_doc = move_uploaded_file($ad_doc, "../SuratKeluar/".$fn_doc);

    $intgl = date("$tanggal");
    $sql = "insert into suratkeluar(no_surat, tanggal_surat, kepengurusan, nama_pengirim, jabatan_pengirim, nama_tujuan, jabatan_tujuan, instansi_tujuan, perihal, nama_file)values('$nosurat','$tanggal','$kepengurusan','$namapengirim', '$jabatanpengirim','$namatujuan', '$jabatantujuan', '$instansitujuan', '$perihal', '$fn_doc');";
    $result = mysqli_query($con, $sql);
    header("location: ../?hal=SuratKeluar", true, 301);
    exit();
    if($result){
        echo "alert('UPLOAD BERHASIL')";
    } else{
        echo "alert('UPLOAD GAGAL')". mysqli_error($con);
    }
?>