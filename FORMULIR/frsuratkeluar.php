</script>
<div class="c-tp-pnl">
    <h1>INPUT DATA SURAT KELUAR</h1>
    <form action="MOD/upload.php?hal=InputSuratKeluar&" method="POST" enctype="multipart/form-data">
        <div class="flex">
            <div>
                <h3>No. Surat</h3>
                <input type="text" id="nosurat" class="brad brsol inpt" placeholder="No. Surat" name="nosurat"/>     
            </div>
            <div>
                <h3>Tanggal Keluar</h3>
                <input type="date" id="tanggal" name="tanggal" class="brad brsol inpt date" value="<?php echo date("Y-m-d")?>"/></div>
        </div>
        <div class="c-frame brad brsol pengirim">
            <p class="nameframe">Data Pengirim</p>
            
                    <h3>Kepengurusan</h3>
                    <select id="jenis" name="jenis" class="brad brsol inpt">
                        <option value="DPN">DPN</option>
                        <option value="DKN">DKN</option>
                        <option value="POKJA">POKJA</option>
                        <option value="SETNAS">SEKRETARIAT</option>
                    </select>    
               
            <div class="flex">
                <div>
                    <h3>Nama</h3>
                    <input type="text" class="brad brsol inpt" placeholder="Nama" name="namapengirim"/>     
                </div>
                <div>
                    <h3>Jabatan</h3>
                    <input type="text" class="brad brsol inpt" placeholder="Jabatan" name="jabatanpengirim"/>
                </div>
            </div>
        </div>
        <div class="c-frame brad brsol">
            <p class="nameframe">Data Tujuan</p>
            <div class="flex">
                <div>
                    <h3>Nama</h3>
                    <input type="text" class="brad brsol inpt" placeholder="Nama" name="namatujuan"/>     
                </div>
                <div>
                    <h3>Jabatan</h3>
                    <input type="text" class="brad brsol inpt" placeholder="Jabatan" name="jabatantujuan"/>
                </div>
            </div>
            <h3>Instansi</h3>
            <input type="text" class="brad brsol inpt" placeholder="Instansi" name="instansitujuan"/>
        </div>
        <h3>Perihal</h3>
        <textarea placeholder="Perihal" class="txtarea brad brsol" name="perihal"></textarea>
        <h3>File Surat</h3>
        <input type="file" id="namafile" name="namafile" class="brad brsol inpt" /><br>
        <input type="submit" class="btn brsad" value="Input Surat" name="namafile"/>
    </form>
</div>