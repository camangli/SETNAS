<div class="c-tp-pnl">
    <h1>INPUT DATA SURAT MASUK</h1>
    <form action="MOD/upload.php?hal=InputSuratMasuk&" method="POST" enctype="multipart/form-data">
        <div class="flex">
            <div>
                <h3>No. Agenda</h3>
                <input type="text" id="noagenda" class="brad brsol inpt" placeholder="No. Agenda" name="noagenda"/>     
            </div>
            <div>
                <h3>Tanggal Masuk</h3>
                <input type="date" id="tanggal" class="brad brsol inpt date" value="<?php echo date("Y-m-d")?>" name="tanggal"/>
            </div>
        </div>
        <div class="c-frame brad brsol pengirim">
            <p class="nameframe">Data Pengirim</p>
            <h3>Tanggal Surat</h3>
                <input type="date" id="tanggal" class="brad brsol inpt date" value="<?php echo date("Y-m-d")?>" name="tanggalsurat"/>
            <div class="flex">
                <div>
                    <h3>Jenis Surat</h3>
                    <select id="jenis" class="brad brsol inpt" name="jenis">
                        <option value="DPP">DPP</option>
                        <option value="Anggota">Anggota</option>
                        <option value="Pemerintah">Pemerintah</option>
                        <option value="Umum">Umum</option>
                        <option value="Luar Negeri">Luar Negeri</option>
                    </select>   
                </div>
                <div>
                    <h3>No. Surat</h3>
                    <input type="text" class="brad brsol inpt" placeholder="No. Surat" name="nosurat"/>
                </div>
            </div>
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
            <h3>Instansi</h3>
            <input type="text" class="brad brsol inpt" placeholder="Instansi" name="instansi"/>
        </div>
        <h3>Perihal</h3>
        <textarea placeholder="Perihal" class="txtarea brad brsol" name="perihal"></textarea>
        <h3>File Surat</h3>
        <input type="file" class="brad brsol inpt" name="namafile"/><br>
        <input type="submit" class="btn brsad" value="Input Surat"/>
    </form>
</div>