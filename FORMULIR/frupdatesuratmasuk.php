<?php
include "../MOD/function.php";

$con = connect();
$idsurat = $_GET['id'];
$sql = "select * from suratmasuk where id_suratmasuk='$idsurat'";
$q = mysqli_query($con, $sql);
$data = mysqli_fetch_object($q);

?>
<div class="c-tp-pnl">
    <h1>INPUT DATA SURAT MASUK</h1>
    <form action="MOD/update.php?hal=UpdateSuratMasuk&id=<?php echo $data->id_suratmasuk ?>" method="POST" enctype="multipart/form-data">
        <div class="flex">
            <div>
                <h3>No. Agenda</h3>
                <input type="text" id="noagenda" class="brad brsol inpt" placeholder="No. Agenda" name="noagenda" value="<?php echo $data->no_agenda ?>"/>     
            </div>
            <div>
                <h3>Tanggal Masuk</h3>
                <input type="date" id="tanggal" class="brad brsol inpt date" value="<?php echo $data->tanggal_masuk ?>" name="tanggal"/>
            </div>
        </div>
        <div class="c-frame brad brsol pengirim">
            <p class="nameframe">Data Pengirim</p>
            <h3>Tanggal Surat</h3>
                <input type="date" id="tanggal" class="brad brsol inpt date" value="<?php echo $data->tanggal_surat ?>" name="tanggalsurat"/>
            <div class="flex">
                <div>
                    <h3>Jenis Surat</h3>
                    <select id="jenis" class="brad brsol inpt" name="jenis">
                        <?php
                        switch ($data->jenis_surat){
                            case "DPP":
                                echo "
                                <option value='DPP' selected>DPP</option>
                                <option value='Anggota'>Anggota</option>
                                <option value='Pemerintah'>Pemerintah</option>
                                <option value='Umum'>Umum</option>
                                <option value='Luar Negeri'>Luar Negeri</option>";
                                break;
                            case "Anggota":
                                echo "
                                <option value='DPP'>DPP</option>
                                <option value='Anggota' selected>Anggota</option>
                                <option value='Pemerintah'>Pemerintah</option>
                                <option value='Umum'>Umum</option>
                                <option value='Luar Negeri'>Luar Negeri</option>";
                                break;
                            case "Pemerintah":
                                echo "
                                <option value='DPP'>DPP</option>
                                <option value='Anggota'>Anggota</option>
                                <option value='Pemerintah' selected>Pemerintah</option>
                                <option value='Umum'>Umum</option>
                                <option value='Luar Negeri'>Luar Negeri</option>";
                                break;
                            case "Umum":
                                echo "
                                <option value='DPP'>DPP</option>
                                <option value='Anggota'>Anggota</option>
                                <option value='Pemerintah'>Pemerintah</option>
                                <option value='Umum' selected>Umum</option>
                                <option value='Luar Negeri'>Luar Negeri</option>";
                                break;
                            case "Luar Negeri":
                                echo "
                                <option value='DPP'>DPP</option>
                                <option value='Anggota'>Anggota</option>
                                <option value='Pemerintah'>Pemerintah</option>
                                <option value='Umum'>Umum</option>
                                <option value='Luar Negeri' selected>Luar Negeri</option>";
                                break;
                            default:
                                echo "
                                <option value='DPP'>DPP</option>
                                <option value='Anggota'>Anggota</option>
                                <option value='Pemerintah'>Pemerintah</option>
                                <option value='Umum'>Umum</option>
                                <option value='Luar Negeri'>Luar Negeri</option>";
                                break;
                        }
                        
                        ?>
                    </select>   
                </div>
                <div>
                    <h3>No. Surat</h3>
                    <input type="text" class="brad brsol inpt" placeholder="No. Surat" name="nosurat" value="<?php echo $data->no_surat ?>"/>
                </div>
            </div>
            <div class="flex">
                <div>
                    <h3>Nama</h3>
                    <input type="text" class="brad brsol inpt" placeholder="Nama" name="namapengirim" value="<?php echo $data->nama ?>"/>     
                </div>
                <div>
                    <h3>Jabatan</h3>
                    <input type="text" class="brad brsol inpt" placeholder="Jabatan" name="jabatanpengirim" value="<?php echo $data->jabatan ?>"/>
                </div>
            </div>
            <h3>Instansi</h3>
            <input type="text" class="brad brsol inpt" placeholder="Instansi" name="instansi" value="<?php echo $data->instansi ?>"/>
        </div>
        <h3>Perihal</h3>
        <textarea placeholder="Perihal" class="txtarea brad brsol" name="perihal"><?php echo $data->perihal ?></textarea>
        <h3>File Surat</h3>
        <input type="file" class="brad brsol inpt" name="namafile"/><br>
        <input type="submit" class="btn brsad" value="Ubah Surat"/>
    </form>
</div>