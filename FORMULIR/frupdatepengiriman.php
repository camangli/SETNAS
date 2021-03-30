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
    <h1>PENGIRIMAN SURAT KELUAR</h1>
    <div class="flex">
            <div>
                <h3>No. Surat</h3>
                <p class="brad brsol inpt"><?php echo $data->no_surat ?></p>
            </div>
            <div>
                <h3>Tanggal Surat</h3>
                <p class="brad brsol inpt"><?php echo tanggal($data->tanggal_surat) ?></p>
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
    <form action="MOD/update.php?hal=UpdatePengiriman&id=<?php echo $data2->id_pengiriman ?>&" method="POST" enctype="multipart/form-data">
    <div class="c-frame brad brsol" >
        <p class="nameframe">Data Penerima</p>
            <div class='flex'>
                <div>
                    <h3>Nama</h3>
                    <input type='text' value='<?php echo $data2->nama_penerima?>' id='namapenerima' name='namapenerima' class='brad brsol inpt' placeholder='Nama' />     
                </div>
                <div>
                    <h3>Jabatan</h3>
                    <input type='text' value='<?php echo $data2->jabatan_penerima?>' id='jabatanpenerima' name='jabatanpenerima' class='brad brsol inpt' placeholder='Jabatan' />
                </div>
            </div>
            <div class='flex'>
                <div>
                    <h3>Kontak</h3>
                    <input type='text' value='<?php echo $data2->kontak_penerima?>' id='kontak' name='kontak' class='brad brsol inpt' placeholder='kontak' />    
                </div>
                <div>
                    <h3>Tanggal Kirim</h3>
                    <input type='date' value='<?php echo $data2->tanggal_kirim?>' id='tanggal' name='tanggal' class='brad brsol inpt date' />
                </div>
            </div>
    </div>
    <h3>Bukti Pengiriman Surat</h3>
    <input type='file' id='namafile' name='namafile'  class='brad brsol inpt'/><br>
    <input type='submit' class='btn brsad' value='Update Bukti Pengiriman'/>
    </form>
</div>
            
 