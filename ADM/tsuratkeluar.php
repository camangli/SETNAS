<div class="c-mn-cb-pnl">
    <a  class="mn-cb-pnl" href="?hal=SuratBaru"><span class="lg-m tbh"></span>Surat Baru</a>
</div>
<table>
    <tr>
        <th>No. Surat</th>
        <th>Tujuan</th>
        <th>Perihal</th>
        <th>Status</th>
        <th style="width: 80px;">Action</th>
    </tr>
    <?php
        $con = connect();
        $no = 1;
        $sql1 = mysqli_query($con, "select distinct tanggal_surat from suratkeluar");
        while($data1 = mysqli_fetch_object($sql1)){
            $tgl = $data1->tanggal_surat;
            echo "<tr>
            <th class='sb-tjdl' colspan='5'>$tgl</th>
            </tr>";
            $no++;
            $no2 = 1;
            $sql2 = mysqli_query($con, "select * from suratkeluar where tanggal_surat='$tgl'");
            while($data2 = mysqli_fetch_object($sql2)){
                echo "<tr>
                <td>$data2->no_surat</td>
                <td>$data2->nama_tujuan<br><b>$data2->jabatan_tujuan<br>$data2->instansi_tujuan</b></td>
                <td>Perihal</td>
                <td><span class='lg-m tstj'></span>Status</td>
                <td style='width: 80px;'><a href='?hal=DetailSuratKeluar' class='net'><span class='lg-m dtl'></span>Detail</a></td>
                </tr>";
                $no2++;
            }
        }
    ?>