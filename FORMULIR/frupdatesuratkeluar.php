<?php
include "../MOD/function.php";

$con = connect();
$idsurat = $_GET['id'];
$sql = "select * from suratkeluar where id_suratkeluar='$idsurat'";
$q = mysqli_query($con, $sql);
$data = mysqli_fetch_object($q);

?>
<div class="c-tp-pnl">
    <h1>UBAH DATA SURAT KELUAR</h1>
    <form action="MOD/update.php?hal=UpdateSuratKeluar&id=<?php echo $data->id_suratkeluar ?>&" method="POST" enctype="multipart/form-data">
        <div class="flex">
            <div>
                <h3>No. Surat</h3>
                <input type="text" id="nosurat" name="nosurat" class="brad brsol inpt" placeholder="No. Surat" value="<?php echo $data->no_surat ?>"/>     
            </div>
            <div>
                <h3>Tanggal Keluar</h3>
                <input type="date" id="tanggal" name="tanggal" class="brad brsol inpt date" value="<?php echo $data->tanggal_surat ?>"/></div>
        </div>
        <div class="c-frame brad brsol pengirim">
            <p class="nameframe">Data Pengirim</p>
            
                    <h3>Kepengurusan</h3>
                    <select id="jenis" name='jenis' class="brad brsol inpt">
                        <?php 
                            switch ($data->kepengurusan){
                                case "DPN":
                                    echo "<option value='DPN' selected>DPN</option>
                                    <option value='DKN'>DKN</option>
                                    <option value='POKJA'>POKJA</option>
                                    <option value='SETNAS'>SEKRETARIAT</option>";
                                    break;
                                case "DKN":
                                    echo "<option value='DPN'>DPN</option>
                                    <option value='DKN' selected>DKN</option>
                                    <option value='POKJA'>POKJA</option>
                                    <option value='SETNAS'>SEKRETARIAT</option>";
                                    break;
                                case "POKJA":
                                    echo "<option value='DPN'>DPN</option>
                                    <option value='DKN'>DKN</option>
                                    <option value='POKJA' selected>POKJA</option>
                                    <option value='SETNAS'>SEKRETARIAT</option>";
                                    break;
                                case "SETNAS":
                                    echo "<option  value='DPN'>DPN</option>
                                    <option value='DKN'>DKN</option>
                                    <option value='POKJA'>POKJA</option>
                                    <option value='SETNAS' selected>SEKRETARIAT</option>";
                                    break;
                                default:
                                echo "<option value='DPN'>DPN</option>
                                    <option value='DKN'>DKN</option>
                                    <option value='POKJA'>POKJA</option>
                                    <option value='SETNAS'>SEKRETARIAT</option>";
                            }
                        ?>
                        
                    </select>    
               
            <div class="flex">
                <div>
                    <h3>Nama</h3>
                    <input type="text" class="brad brsol inpt" name="namapengirim" placeholder="Nama" value="<?php echo $data->nama_pengirim ?>"/>     
                </div>
                <div>
                    <h3>Jabatan</h3>
                    <input type="text" class="brad brsol inpt" name="jabatanpengirim" placeholder="Jabatan" value="<?php echo $data->jabatan_pengirim ?>"/>
                </div>
            </div>
        </div>
        <div class="c-frame brad brsol">
            <p class="nameframe">Data Tujuan</p>
            <div class="flex">
                <div>
                    <h3>Nama</h3>
                    <input type="text" class="brad brsol inpt" name="namatujuan" placeholder="Nama" value="<?php echo $data->nama_tujuan ?>"/>     
                </div>
                <div>
                    <h3>Jabatan</h3>
                    <input type="text" class="brad brsol inpt" name="jabatantujuan" placeholder="Jabatan" value="<?php echo $data->jabatan_tujuan ?>"/>
                </div>
            </div>
            <h3>Instansi</h3>
            <input type="text" class="brad brsol inpt" name="instansitujuan" placeholder="Instansi" value="<?php echo $data->instansi_tujuan ?>"/>
        </div>
        <h3>Perihal</h3>
        <textarea placeholder="Perihal" class="txtarea brad brsol" name="perihal"><?php echo $data->perihal ?></textarea>
        <h3>File Surat</h3>
        <input type="file" name="namafile" class="brad brsol inpt"/><br>
        <input type="submit" class="btn brsad" value="Update Surat"/>
    </form>
</div>