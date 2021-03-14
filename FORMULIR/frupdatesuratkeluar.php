<script>
    function nomor(){
        var jenis = document.getElementById("jenis").value;
        var tgl = document.getElementById("tanggal").value;
        var bulan = new Date(tgl);
        var romanbulan;
        
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

        document.getElementById("nosurat").value = "NOMOR/"+jenis+"/"+romanbulan+"/"+bulan.getFullYear();

    }

</script>
<div class="c-tp-pnl">
    <h1>UBAH DATA SURAT KELUAR</h1>
    <form action="?hal=InputSuratBaru">
        <div class="flex">
            <div>
                <h3>No. Surat</h3>
                <input type="text" id="nosurat" class="brad brsol inpt" placeholder="No. Surat" disabled/>     
            </div>
            <div>
                <h3>Tanggal Keluar</h3>
                <input type="date" id="tanggal" class="brad brsol inpt date" value="<?php echo date("Y-m-d")?>" onchange="nomor()" disabled/></div>
        </div>
        <div class="c-frame brad brsol pengirim">
            <p class="nameframe">Data Pengirim</p>
            
                    <h3>Kepengurusan</h3>
                    <select id="jenis" class="brad brsol inpt" onchange="nomor()">
                        <option value="DPN">DPN</option>
                        <option value="DKN">DKN</option>
                        <option value="POKJA">POKJA</option>
                        <option value="SETNAS">SEKRETARIAT</option>
                    </select>    
               
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
        </div>
        <div class="c-frame brad brsol">
            <p class="nameframe">Data Tujuan</p>
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