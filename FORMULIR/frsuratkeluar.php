<script>
function getnomor(str) {
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
  if (str=="") {
    document.getElementById("nosurat").value ="";
    return;
  }
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("nosurat").value = this.responseText+str+romanbulan+"/"+bulan.getFullYear();
    }
  }
  xmlhttp.open("GET","MOD/getnomor.php?q="+str+"&hal=nosurat",true);
  xmlhttp.send();
}
</script>
<div class="c-tp-pnl">
    <h1>INPUT DATA SURAT KELUAR</h1>
    <form action="MOD/upload.php?hal=InputSuratKeluar&" method="POST" enctype="multipart/form-data">
        <div class="flex">
            <div>
                <h3>No. Surat</h3>
                <input type="text" id="nosurat" class="brad brsol inpt" placeholder="No. Surat" name="nosurat" onclick="getnomor(document.getElementById('jenis').value)"/>     
            </div>
            <div>
                <h3>Tanggal Keluar</h3>
                <input type="date" id="tanggal" name="tanggal" class="brad brsol inpt date" value="<?php echo date("Y-m-d")?>" oninput="getnomor(document.getElementById('jenis').value)"/></div>
        </div>
        <div class="c-frame brad brsol pengirim">
            <p class="nameframe">Data Pengirim</p>
            
                    <h3>Kepengurusan</h3>
                    <select id="jenis" name="jenis" class="brad brsol inpt" oninput="getnomor(this.value)"> 
                        <option value="/SKJ/DPN/" selected>DPN</option>
                        <option value="/BDH/DPN/">BENDAHARA</option>
                        <option value="/DKN/">DKN</option>
                        <option value="/POKJA/DPN/">POKJA</option>
                        <option value="/SETNAS/">SEKRETARIAT</option>
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
            <input type="text" class="brad brsol inpt" placeholder="Instansi" name="instansi"/>
        </div>
        <h3>Perihal</h3>
        <textarea placeholder="Perihal" class="txtarea brad brsol" name="perihal"></textarea>
        <h3>File Surat</h3>
        <input type="file" id="namafile" name="namafile" class="brad brsol inpt" /><br>
        <input type="submit" class="btn brsad" value="Input Surat" name="namafile"/>
    </form>
</div>