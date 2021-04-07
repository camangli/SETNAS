<html>
	<head>
	<link rel="stylesheet" href="../CSS/main.css">
	</head>
<body>
<?php
include "../MOD/function.php";
include "../MOD/session.php";

$con = connect();
$idsurat = $_GET['id'];
$idkar = $_SESSION['id'];
$sql = "select * from suratmasuk where id_suratmasuk='$idsurat'";
$sql2 = "select * from tanggapan where id_suratmasuk='$idsurat'";
$q = mysqli_query($con, $sql);
$q2 = mysqli_query($con, $sql2);
$data = mysqli_fetch_object($q);
?>
	<div class="con-prn">
		<div class="flex">
			<div>
				<img class="lg-print" src="../IMG/asset/logo.png">
			</div>
			<div class="judul">
				<h1>LEMBAR PENGEDARAN SURAT MASUK</h1>
			</div>
		</div>
		<table class="tbl-main">
			<tr>
				<td style="width: 80px;">Surat Dari</td>
				<td style="width: 10px;">:</td>
				<td colspan="5"><?php echo "<b>$data->nama</b><br>$data->jabatan<br> $data->instansi" ?></td>
			</tr>
			<tr>
				<td style="width: 80px;">No/Tgl Surat</td>
				<td style="width: 10px;">:</td>
				<td><?php echo $data->no_surat ?></td>
				<td><?php echo tanggal($data->tanggal_masuk) ?></td>
				<td style="width: 80px;">No. Agenda</td>
				<td style="width: 10px;">:</td>
				<td><?php echo $data->no_agenda ?></td>
			</tr>
			<tr>
				<td style="width: 80px;">Perihal</td>
				<td style="width: 10px;">:</td>
				<td colspan="5"><?php echo $data->perihal ?></td>
			</tr>
		</table>
		<div class="flex col2">
		<div class="c-col flex-col">
			<div class="t-distri">
				<h3>Distribusi :</h3>
				<div class="flex">
					<div class="c-dis"><h3>PEF</h3></div>
					<div class="c-dis"><h3>DJJ</h3></div>
					<div class="c-dis"><h3></h3></div>
				</div>
				<div class="flex">
					<div class="c-dis"><h3>LSI</h3></div>
					<div class="c-dis"><h3> </h3></div>
					<div class="c-dis"><h3> </h3></div>
				</div>
				<div class="flex">
					<div class="c-dis"><h3> </h3></div>
					<div class="c-dis"><h3> </h3></div>
					<div class="c-dis"><h3> </h3></div>
				</div>
			</div>
			<div class="t-distri">
				<h3>Masukan Setnas:</h3>
				<?php
                        while ($data2 = mysqli_fetch_object($q2)){
                            $sql3 = "select * from karyawan where id_karyawan='$data2->id_karyawan' and id_bagian !='2'";
                            $q3 = mysqli_query($con, $sql3);
                            $data3 = mysqli_fetch_object($q3);
                            $tgl = $data2->waktu_tanggapan;
                            $tglonly = tanggal($tgl);
                            $tglwkt = tglwkt($tgl);
                            date_default_timezone_set("Asia/Jakarta");
                            if(tanggal(date("Y-m-d")) == $tglonly){
                                $vtgl = $tglwkt;
                            }else{
                                $vtgl = "$tglonly, $tglwkt";
                            }
                            if($data3->id_karyawan == $idkar){
                                $del =  " - <a class='plc-hps' href='MOD/hapus.php?q=Tanggapan&id=$data2->id_tanggapan'>Hapus</a>";
                            } else {
                                $del = "";
                            }
							if ($data3->id_karyawan != null){
								echo "
                            	<div class='c-m-tgp'>
                                <h4>$data3->nama</h4>
                                <p>$data2->tanggapan</p>
                            	</div>";
							}
                            
                        }
                    ?>
			</div>
			<div class="t-distri">
				<h3>Keputusan DPN:</h3>
				<h4>Undangan</h4>
				<input type="checkbox" id="dihadiri" name="dihadiri" value="dihadiri">
				<label for="dihadiri"> Dihadiri Oleh</label><br>
				<input type="checkbox" id="tidakdihadiri" name="tidakdihadiri" value="tidakdihadiri">
				<label for="tidakdihadiri"> Tidak dihadiri</label><br>
				<h4>Undangan</h4>
				<input type="checkbox" id="disebar" name="disebar" value="disebar">
				<label for="disebar"> Disebarluaskan Kepada</label><br>
				<input type="checkbox" id="arsip" name="tidakdihadiri" value="arsip">
				<label for="arsip"> File / Arsip</label><br>
				<h4>Lain-Lain</h4>

			</div>
		</div>
		<div class="c-col">
			<div class="t-pendapat">
				<h3>Pendapat DPN :</h3>
				<?php
						$sqla = "select * from tanggapan where id_suratmasuk='$idsurat'";
						$qa = mysqli_query($con, $sqla);
                        while ($data4 = mysqli_fetch_object($qa)){
                            $sql5 = "select * from karyawan where id_karyawan='$data4->id_karyawan' and id_bagian ='2'";
                            $q5 = mysqli_query($con, $sql5);
                            $data5 = mysqli_fetch_object($q5);
                            $tgl2 = $data4->waktu_tanggapan;
                            $tglonly2 = tanggal($tgl2);
                            $tglwkt2 = tglwkt($tgl2);
                            date_default_timezone_set("Asia/Jakarta");
                            if(tanggal(date("Y-m-d")) == $tglonly2){
                                $vtgl2 = $tglwkt2;
                            }else{
                                $vtgl2 = "$tglonly2, $tglwkt2";
                            }
                            if($data5->id_karyawan == $idkar){
                                $del =  " - <a class='plc-hps' href='MOD/hapus.php?q=Tanggapan&id=$data4->id_tanggapan'>Hapus</a>";
                            } else {
                                $del = "";
                            }
							if ($data5->id_karyawanEE != null){
								echo "
                            	<div class='c-m-tgp'>
                                <h4>$data5->nama</h4>
                                <p>$data4->tanggapan</p>
                            	</div>";
							}
                            
                        }
                    ?>
			</div>
		</div>
	</div>
	</div>
	
</body>
</html>

