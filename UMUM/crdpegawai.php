<?php
include "../MOD/function.php";
include "../MOD/session.php";
$con = connect();
$idkar = $_SESSION['id'];

  if ($idkar == 1){
        $sql = "select * from karyawan";
        $q = mysqli_query($con, $sql);
        $tbltbh = "<a href='?page=Kepegawaian&hal=TambahKaryawan' class='mn-cb-pnl'><span class='lg tbh'></span>Tambah Pegawai</a>"; 
    }else{
        $sql = "select * from karyawan where id_karyawan='$idkar'";
        $q = mysqli_query($con, $sql);
    }
    echo $tbltbh;
    while ($data = mysqli_fetch_object($q)){
        $sql2 = "select * from user where id_karyawan='$data->id_karyawan'";
        $q2 = mysqli_query($con, $sql2);
        $data2 = mysqli_fetch_object($q2);
        if ($idkar == 1){
            $del = "<a onClick=\"javascript: return confirm('Apakah Yakin Akan Menghapus Data');\" href='MOD/hapus.php?q=Karyawan&id=$data->id_karyawan' class='mn-cb-pnl alrt'><span class='lg-m hps'></span>Hapus</a>"; 
        }
        echo "
        <div class='c-frame brad brsol'>
            <p class='nameframe'>Biodata</p>
            <table>
                <tr>
                    <td rowspan='7' style='height:150px; padding-right:20px;'><div class='ft-p'><img src='../IMG/asset/Profile/$data->foto'></div></td>
                </tr>
                </tr>
                    <td>User ID</td>
                    <td style='width: 10px;'>:</td>
                    <td>$data2->id_user</td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td style='width: 10px;'>:</td>
                    <td>$data->nama</td>
                </tr>
                <tr>
                    <td>Jabatan</td>
                    <td style='width: 10px;'>:</td>
                    <td>$data->jabatan </td>
                </tr>
                    <td>No. Telp</td>
                    <td style='width: 10px;'>:</td>
                    <td>$data->no_telp </td>
                </tr>
                </tr>
                    <td>Email</td>
                    <td style='width: 10px;'>:</td>
                    <td>$data->email </td>
                </tr>
                </tr>
                    <td>Alamat/Domisili</td>
                    <td style='width: 10px;'>:</td>
                    <td>$data->alamat </td>
                </tr>
            </table>
            <div class='c-mn-cb-pnl'>
            <a href='?page=Kepegawaian&hal=UpdatePegawai&id=$data->id_karyawan' class='mn-cb-pnl net'><span class='lg-m ubh'></span>Ubah</a>
            $del 
            </div>
        </div>
        ";
    }
    ?>