<script>
    function nomor(){
        var jenis = document.getElementById("jenis").value;
        var tgl = document.getElementById("tanggal").value;
        var bulan = new Date(tgl);
        var romanbulan;
        var jenissurat;

        switch(jenis){
            case 'DPP':
                jenissurat = "/A/DPP/";
                break;
            case 'Anggota':
                jenissurat = "/A/ANG/";
                break;
            case 'Pemerintah':
                jenissurat = "/B/PEM/";
                break;
            case 'Umum':
                jenissurat = "/C/UM/";
                break;
            case 'Luar Negeri':
                jenissurat = "/D/LN/";
                break;
        }
        
        switch(bulan.getMonth()){
            case 0:
                romanbulan = "I";
                break;
            case 1:
                romanbulan = "II";
                break;
            case 2:
                romanbulan = "III";
                break;
            case 3:
                romanbulan = "IV";
                break;
            case 4:
                romanbulan = "V";
                break;
            case 5:
                romanbulan = "VI";
                break;
            case 6:
                romanbulan = "VII";
                break;
            case 7:
                romanbulan = "VIII";
                break;
            case 8:
                romanbulan = "IX";
                break;
            case 9:
                romanbulan = "X";
                break;
            case 10:
                romanbulan = "XI";
                break;
            case 11:
                romanbulan = "XII";
                break;
            }

        document.getElementById("nosurat").value = "NOMOR"+jenissurat+romanbulan+"/"+bulan.getFullYear();

    }

</script>
<div class="c-tp-pnl">
    <h1>INPUT DATA SURAT MASUK</h1>
    <form action="?hal=inputSuratKeluar">
        <div class="flex">
            <div>
                <h3>No. Agenda</h3>
                <input type="text" id="nosurat" class="brad brsol inpt" placeholder="No. Surat" disabled/>     
            </div>
            <div>
                <h3>Tanggal Masuk</h3>
                <input type="date" id="tanggal" class="brad brsol inpt date" value="<?php echo date("Y-m-d")?>" onchange="nomor()" disabled/>
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