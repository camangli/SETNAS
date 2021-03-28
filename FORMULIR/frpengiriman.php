<?php
include "../MOD/function.php";

$con = connect();
$idsurat = $_GET['id'];
$sql = "select * from suratkeluar where id_suratkeluar='$idsurat'";
$q = mysqli_query($con, $sql);
$data = mysqli_fetch_object($q);
$hal = $_GET['hal'];

$sql2 = "select * from pengiriman where id_suratkeluar='$idsurat'";
$q2 = mysqli_query($con, $sql2);
$jml = mysqli_num_rows($q2);
$data2 = mysqli_fetch_object($q2);
?>
<div class="c-tp-pnl">
    <h1>UPLOAD BUKTI PENGIRIMAN SURAT KELUAR</h1>
    <div class="flex">
            <div>
                <h3>No. Surat</h3>
                <p class="brad brsol inpt"><?php echo $data->no_surat ?></p>
            </div>
            <div>
                <h3>Tanggal Surat</h3>
                <p class="brad brsol inpt"><?php echo $data->tanggal_surat ?></p>
            </div>
        </div>
        <div class="c-frame brad brsol">
            <p class="nameframe">Data Tujuan</p>
            <table>
                    <td>Nama</td>
                    <td>: <?php echo $data->nama_tujuan ?></td>
                </tr>
                </tr>
                    <td>Jabatan</td>
                    <td>: <?php echo $data->jabatan_tujuan ?></td>
                </tr>
                </tr>
                    <td>Instansi</td>
                    <td>: <?php echo $data->instansi_tujuan ?></td>
                </tr>
                </tr>
                    <td>Perihal</td>
                    <td>: <?php echo $data->perihal ?></td>
                </tr>
            </table>
        </div>
            <?php 
            $tglsekarang = date("Y-m-d");
            $tgl = tanggal($data2->tanggal_kirim);
            if ($jml >= 1){
                echo "
                <div class='c-frame brad brsol' >
                <p class='nameframe'>Data Penerima</p>
                <table>
                    <td>Nama</td>
                    <td>: $data2->nama_penerima</td>
                </tr>
                </tr>
                    <td>Jabatan</td>
                    <td>: $data2->jabatan_penerima</td>
                </tr>
                </tr>
                    <td>Kontak</td>
                    <td>: $data2->kontak_penerima </td>
                </tr>
                </tr>
                    <td>Tanggal Diterima</td>
                    <td>: $tgl</td>
                </tr>
            </table>
            <div class='c-mn-cb-pnl'>
                <a href='?hal=UpdatePengiriman&id=$idsurat' class='mn-cb-pnl net'><span class='lg-m ubh'></span>Edit</a></td>
                </div>
            </form>
            </div>
            <div class='c-frame brad brsol pengirim'>
                <p class='nameframe'>Bukti Pengiriman</p>
                <iframe src='ADM/DATA/BuktiPengiriman/$data2->nama_file' type='application/pdf' width='100%' height='500px'>
                </iframe>        
            </div>
                ";
            }else{
                echo "
                <form action='MOD/upload.php?hal=InputPengiriman&id=$idsurat&' method='POST' enctype='multipart/form-data'>
                <div class='c-frame brad brsol' >
                <p class='nameframe'>Data Penerima</p>
                <div class='flex'>
                <div>
                    <h3>Nama</h3>
                    <input type='text' id='namapenerima' name='namapenerima' class='brad brsol inpt' placeholder='Nama' />     
                </div>
                <div>
                    <h3>Jabatan</h3>
                    <input type='text' id='jabatanpenerima' name='jabatanpenerima' class='brad brsol inpt' placeholder='Jabatan' />
                </div>
                </div>
                <div class='flex'>
                <div>
                    <h3>Kontak</h3>
                    <input type='text' id='kontak' name='kontak' class='brad brsol inpt' placeholder='kontak' />    
                </div>
                <div>
                    <h3>Tanggal Kirim</h3>
                    <input type='date' id='tanggal' name='tanggal' value='$tglsekarang' class='brad brsol inpt date' />
                </div>
                </div>
                </div>
                <h3>Bukti Pengiriman Surat</h3>
                <input type='file' id='namafile' name='namafile'  class='brad brsol inpt'/><br>
                <input type='submit' class='btn brsad' value='Upload Bukti Pengiriman'/>
                </form>
                </div>
                ";
            }
            ?>
            
            
 