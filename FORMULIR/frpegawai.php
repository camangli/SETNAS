<?php
$con = connect();
$idkar = $_SESSION['id'];
$sql = "select * from karyawan where id_karyawan='$idkar'";
$q = mysqli_query($con, $sql);
$data = mysqli_fetch_object($q);
?>
<script type="text/javascript">
function previewImage() {
    document.getElementById("pvi").style.display = "block";
    var oFReader = new FileReader();
     oFReader.readAsDataURL(document.getElementById("namafile").files[0]);
 
    oFReader.onload = function(oFREvent) {
      document.getElementById("pvi").src = oFREvent.target.result;
    };
  };
</script>
    <form action="MOD/upload.php?hal=Pegawai" method="POST" enctype="multipart/form-data">
        <div class="c-frame brad brsol pengirim">
            <p class="nameframe">Data Pegawai</p>
            <h3>Nama</h3>
            <input type="text" id="nama" class="brad brsol inpt" name="nama"/>     
            <div class="flex">
                <div>
                    <h3>Bagian</h3>
                    <?php
                        if($data->id_bagian != 1){
                            $disable = "disabled";
                        }
                    ?>
                    <select id="bagian" class="brad brsol inpt" name="bagian" <?php echo $disable?>>
                        <?php
                            $sql3 = "select * from bagian";
                            $q3 = mysqli_query($con, $sql3);
                            while ($data3 = mysqli_fetch_object($q3)){
                                if ($data3->id_bagian == $data->id_bagian){
                                    $select = "selected";
                                }
                                echo "<option value='$data3->id_bagian' $select>$data3->nama_bagian</option>";
                            }
                        ?>
                    </select>   
                </div>
                <div>
                    <h3>Jabatan</h3>
                    <input type="text" class="brad brsol inpt" placeholder="Jabatan" name="jabatan" />
                </div>
            </div>
            <div class="flex">
                <div>
                    <h3>No. Telp</h3>
                    <input type="text" class="brad brsol inpt" placeholder="No. Telp" name="notelp" />     
                </div>
                <div>
                    <h3>E-mail</h3>
                    <input type="email" class="brad brsol inpt" placeholder="E-mail" name="email" />
                </div>
            </div>
        </div>
        <h3>Alamat</h3>
        <textarea placeholder="Alamat" class="txtarea brad brsol" name="alamat"></textarea>
        <div class="flex" style="margin-top: 30px;">
                <div>
                    <img id="pvi" class="brsol brad" style="width: 200px;" src="IMG/asset/defbck.png" alt="your image" />
                </div>
                <div>
                    <h3>Foto</h3>
                    <input type="file" class="brad brsol inpt" onchange="previewImage();" id="namafile" name="namafile"/>
                </div>
            </div>
      
            <div class="c-frame brad brsol pengirim">
                    <p class="nameframe">User Login</p>
                    <h3>User ID</h3>
                    <input type="text" class="brad brsol inpt" placeholder="User ID" name="userid" <?php echo $disable ?>/>
                    <div class="flex">
                        <div>
                            <h3>Password</h3>
                            <input type="password" class="brad brsol inpt" placeholder="Password Baru" name="pasbaru" id="pasbaru" oninput="valpass()" />
                        </div>
                        <div>
                            <script>
                                function valpass(){
                                    var pasbaru = document.getElementById("pasbaru").value;
                                    var valpas = document.getElementById("valpasbaru").value;
                                    if (pasbaru != valpas ){
                                        document.getElementById("valpasbaru").style.backgroundColor = "rgb(255, 137, 137)";
                                        document.getElementById("submit").disabled = true;
                                        document.getElementById("plc").style.visibility = "visible";
                                    }else{
                                        document.getElementById("valpasbaru").style.backgroundColor = "white";
                                        document.getElementById("submit").disabled = false;
                                        document.getElementById("plc").style.visibility = "hidden";
                                    }
                                }
                            </script>
                            <h3>Password (validasi)</h3>
                            <input type="password" class="brad brsol inpt" placeholder="Validasi Password Baru" id="valpasbaru" name="valpasbaru" oninput="valpass()" />
                            <p id="plc" style="visibility: hidden;" class="plc red">Password tidak sama!</p>
                        </div>
                    </div>
            </div>
        <input type="submit" id="submit" class="btn brsad" value="Tambah Data"/>
    </form>