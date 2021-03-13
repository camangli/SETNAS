<div class="c-tp-pnl">
    <h1>INPUT DATA SURAT MASUK</h1>
    <form action="?hal=inputSuratKeluar">
        <div class="flex">
            <div>
                <h3>No. Agenda</h3>
                <p class="brad brsol inpt">1111/A/DM/2021</p>
            </div>
            <div>
                <h3>Tanggal Masuk</h3>
                <p class="brad brsol inpt">19/21/2021</p>
            </div>
        </div>
        <div class="c-frame brad brsol pengirim">
            <p class="nameframe">Data Pengirim</p>
            <h3>Tanggal Surat</h3>
                <input type="date" id="tanggal" class="brad brsol inpt date" value="<?php echo date("Y-m-d")?>"/>
            <div class="flex">
                <div>
                    <h3>Jenis Surat</h3>
                    <select id="jenis" class="brad brsol inpt" onchange="nomor()">
                        <option value="DPP">DPP</option>
                        <option value="Anggota">Anggota</option>
                        <option value="Pemerintah">Pemerintah</option>
                        <option value="Umum">Umum</option>
                        <option value="Luar Negeri">Luar Negeri</option>
                    </select>   
                </div>
                <div>
                    <h3>No. Surat</h3>
                    <input type="text" class="brad brsol inpt" placeholder="No. Surat"/>
                </div>
            </div>
            <div class="flex">
                <div>
                    <h3>Nama</h3>
                    <input type="text" class="brad brsol inpt" placeholder="Nama"/>     
                </div>
                <div>
                    <h3>Jabatan</h3>
                    <input type="text" class="brad brsol inpt" placeholder="Jabatan"/>
                </div>
            </div>
            <h3>Instansi</h3>
            <input type="text" class="brad brsol inpt" placeholder="Instansi"/>
        </div>
        <h3>Perihal</h3>
        <textarea placeholder="Perihal" class="txtarea brad brsol"></textarea>
        <h3>File Surat</h3>
        <input type="file" class="brad brsol inpt"/><br>
        <input type="submit" class="btn brsad" value="Input Surat"/>
    </form>
</div>