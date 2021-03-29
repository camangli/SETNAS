<?php
include "../MOD/function.php";
include "../MOD/session.php";

$con = connect();
$idkar = $_SESSION['id'];

  if ($idkar == 1){
        $sql = "select * from karyawan";
        $q = mysqli_query($con, $sql);
        
    }else{
        $sql = "select * from karyawan where id_karyawan='$idkar'";
        $q = mysqli_query($con, $sql);
    }
    while ($data = mysqli_fetch_object($q)){
        $sql2 = "select * from user where id_karyawan='$data->id_karyawan'";
        $q2 = mysqli_query($con, $sql2);
        $data2 = mysqli_fetch_object($q2);
        echo "
        <div class='c-frame brad brsol'>
            <p class='nameframe'>Data Pegawai</p>
            <table>
                <tr>
                    <td rowspan='7' style='height:150px; padding-right:20px;'><div class='ft-p'><img src='../SETNAS/IMG/asset/Profile/$data->foto'></div></td>
                </tr>
                </tr>
                    <td>User ID</td>
                    <td>: $data2->id_user</td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>: $data->nama</td>
                </tr>
                <tr>
                    <td>Jabatan</td>
                    <td>: $data->jabatan </td>
                </tr>
                    <td>No. Telp</td>
                    <td>: $data->no_telp </td>
                </tr>
                </tr>
                    <td>Email</td>
                    <td>: $data->email </td>
                </tr>
                </tr>
                    <td>Alamat/Domisili</td>
                    <td>: $data->alamat </td>
                </tr>
            </table>
            <div class='c-mn-cb-pnl'>
            <a href='?page=Kepegawaian&hal=UpdatePegawai&id=$data->id_karyawan' class='mn-cb-pnl net'><span class='lg-m ubh'></span>Ubah</a>
            </div>
        </div>
        ";
    }
    ?>