<div class="c-tp-pnl">
    <h1>PENGAJUAN PENGADAAN BARANG & JASA <br>(PURCHASE ORDER)</h1>
    <form action="?hal=DetailPengadaan">
        <div class="flex">
            <div>
                <h3>Nama Barang :</h3>
                <input type="text" class="brad brsol inpt" placeholder="Nama Barang"/>  
            </div>
            <div>
                <h3>Jenis :</h3>
                <select name="Jenis" id="Jenis" class="brad brsol slct">
                    <option value="Aset">Aset</option>
                    <option value="Habis Pakai">Habis Pakai</option>
                </select>
            </div>
        </div>
        <div class="flex">
            <div>
                <h3>Harga / Unit :</h3>
                <input type="text" class="brad brsol inpt" placeholder="Harga / Unit"/>     
            </div>
            <div>
                <h3>Jumlah :</h3>
                <input type="text" class="brad brsol inpt jml" placeholder="Jumlah"/></div>
            </div>
       
        <h3>Penyedia :</h3>
        <input type="text" class="brad brsol inpt" placeholder="Penyedia"/>
        <h3>Spesifikasi / Persyaratan :</h3>
        <textarea placeholder="Rincian Pengadaan" class="txtarea brad brsol"></textarea>
        <h3>Pembanding :</h3>
        <input type="file" class="brad brsol inpt"/>
        <input type="submit" class="btn brsad" value="Buat Pengajuan"/>
    </form>
</div>