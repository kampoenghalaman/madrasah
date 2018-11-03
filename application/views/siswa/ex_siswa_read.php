<!doctype html>
<html>
    <head>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            /*body{
                padding: 15px;
            }*/
        </style>
        <script>
         //Inisiasi awal penggunaan jQuery
        function myFunction() {
            document.getElementById("nama_siswa").readOnly = false;
            document.getElementById("jk").readOnly = false;
            document.getElementById("kelas").readOnly = false;
        }
         </script>
    </head>
    <body>
        <h2 style="margin-top:0px">Laporan Nilai <?php echo $nama_siswa;?></h2>
        <table class="table">
        <form action="<?php echo $action; ?>" method="post">
        <input type="hidden" class="form-control" name="id_siswa" value="<?php echo $id_siswa; ?>"/>
	    <tr><td>Nama Siswa</td><td><input type="text" class="form-control" name="nama_siswa" id="nama_siswa" placeholder="Nama Siswa" value="<?php echo $nama_siswa; ?>" readonly/></td></tr>
	    <tr><td>Jenis Kelamin</td><td><input type="text" class="form-control" name="jk" id="jk" placeholder="Jk" value="<?php echo $jk; ?>" readonly/></td></tr>
	    <tr><td>Kelas</td><td><input type="text" class="form-control" name="kelas" id="kelas" placeholder="Kelas" value="<?php echo $kelas; ?>" readonly/></td></tr>
        <table class="table table-bordered" >
	    <tr>
            <th style="text-align:center" width="25%">Mata Pelajaran</th><th style="text-align:center">Tugas 1</th><th style="text-align:center">Tugas 2</th><th style="text-align:center">Ujian</th><th style="text-align:center">Rata-Rata</th>
        </tr>
        <tr>
            <td>AQIDAH</td>
            <td width="15%"><input type="number" class="form-control" name="aqidaht1" id="aqidaht1" placeholder="AQIDAH" value="<?php echo $aqidaht1; ?>" /></td>
            <td width="15%"><input type="number" class="form-control" name="aqidaht2" id="aqidaht2" placeholder="AQIDAH" value="<?php echo $aqidaht2; ?>" /></td>
            <td width="15%"><input type="number" class="form-control" name="aqidahu" id="aqidahu" placeholder="AQIDAH" value="<?php echo $aqidahu; ?>" /></td>
            <td width="15%"><input type="number" class="form-control" name="aqidahr" id="aqidahr" placeholder="AQIDAH" value="" readonly/></td>
        </tr>
	    <tr>
            <td>AL-QURAN</td>
            <td width="15%"><input type="number" class="form-control" name="alqurant1" id="alqurant1" placeholder="AL-QURAN" value="<?php echo $alqurant1; ?>" /></td>
            <td width="15%"><input type="number" class="form-control" name="alqurant2" id="alqurant2" placeholder="AL-QURAN" value="<?php echo $alqurant2; ?>" /></td>
            <td width="15%"><input type="number" class="form-control" name="alquranu" id="alquranu" placeholder="AL-QURAN" value="<?php echo $alquranu; ?>" /></td>
            <td width="15%"><input type="number" class="form-control" name="alquranr" id="alquranr" placeholder="AL-QURAN" value="" readonly/></td>
        </tr>
	    <tr>
            <td>AL-HADITS</td>
            <td width="15%"><input type="number" class="form-control" name="alhaditst1" id="alhaditst1" placeholder="AL-HADITS" value="<?php echo $alhaditst1; ?>" /></td>
            <td width="15%"><input type="number" class="form-control" name="alhaditst2" id="alhaditst2" placeholder="AL-HADITS" value="<?php echo $alhaditst2; ?>" /></td>
            <td width="15%"><input type="number" class="form-control" name="alhaditsu" id="alhaditsu" placeholder="AL-HADITS" value="<?php echo $alhaditsu; ?>" /></td>
            <td width="15%"><input type="number" class="form-control" name="alhaditsr" id="alhaditsr" placeholder="AL-HADITS" value="" readonly/></td>
        </tr>
        <tr>
            <td>BAHASA ARAB</td>
            <td width="15%"><input type="number" class="form-control" name="bat1" id="bat1" placeholder="B.ARAB" value="<?php echo $bat1; ?>" /></td>
            <td width="15%"><input type="number" class="form-control" name="bat2" id="bat2" placeholder="B.ARAB" value="<?php echo $bat2; ?>" /></td>
            <td width="15%"><input type="number" class="form-control" name="bau" id="bau" placeholder="B.ARAB" value="<?php echo $bau; ?>" /></td>
            <td width="15%"><input type="number" class="form-control" name="bar" id="bar" placeholder="B.ARAB" value="" readonly/></td>
        </tr>
        <tr>
            <td>AKHLAK</td>
            <td width="15%"><input type="number" class="form-control" name="akht1" id="akht1" placeholder="AQIDAH" value="<?php echo $akht1; ?>" /></td>
            <td width="15%"><input type="number" class="form-control" name="akht2" id="akht2" placeholder="AQIDAH" value="<?php echo $akht2; ?>" /></td>
            <td width="15%"><input type="number" class="form-control" name="akhu" id="akhu" placeholder="AQIDAH" value="<?php echo $akhu; ?>" /></td>
            <td width="15%"><input type="number" class="form-control" name="akhr" id="akhr" placeholder="AQIDAH" value="" readonly/></td>
        </tr>
        <tr>
            <td>SKI</td>
            <td width="15%"><input type="number" class="form-control" name="skit1" id="skit1" placeholder="SKI" value="<?php echo $skit1; ?>" /></td>
            <td width="15%"><input type="number" class="form-control" name="skit2" id="skit2" placeholder="SKI" value="<?php echo $skit2; ?>" /></td>
            <td width="15%"><input type="number" class="form-control" name="skiu" id="skiu" placeholder="SKI" value="<?php echo $skiu; ?>" /></td>
            <td width="15%"><input type="number" class="form-control" name="skir" id="skir" placeholder="SKI" value="" readonly/></td>
        </tr>
        <tr>
            <td>FIQIH</td>
            <td width="15%"><input type="number" class="form-control" name="fiqiht1" id="fiqiht1" placeholder="FIQIH" value="<?php echo $fiqiht1; ?>" /></td>
            <td width="15%"><input type="number" class="form-control" name="fiqiht2" id="fiqiht2" placeholder="FIQIH" value="<?php echo $fiqiht2; ?>" /></td>
            <td width="15%"><input type="number" class="form-control" name="fiqihu" id="fiqihu" placeholder="FIQIH" value="<?php echo $fiqihu; ?>" /></td>
            <td width="15%"><input type="number" class="form-control" name="fiqihr" id="fiqihr" placeholder="FIQIH" value="" readonly/></td>
        </tr>
        </table>
        <table>
	    <tr><td></td><td><a href="<?php echo site_url('siswa/index?kelas='.$kelas) ?>" class="btn btn-default">Cancel</a> | <button class="btn btn-info">Ubah Data Nilai</button> | </form><button class="btn btn-danger" onclick="myFunction()"><i class="icon-user"></i> Ubah Identitas</button></td></tr>
        </table>
	</table>
        </body>
</html>
        <script>
        // ready
            $("#aqidaht1,#aqidaht2,#aqidahu").ready(function () {
                $('#aqidahr').val((parseInt($('#aqidaht1').val()) + parseInt($('#aqidaht2').val()) + parseInt($('#aqidahu').val()))/ 3);
            });
            $("#alqurant1,#alqurant2,#alquranu").ready(function () {
                $('#alquranr').val((parseInt($('#alqurant1').val()) + parseInt($('#alqurant2').val()) + parseInt($('#alquranu').val()))/ 3);
            });
            $("#alhaditst1,#alhaditst2,#alhaditsu").ready(function () {
                $('#alhaditsr').val((parseInt($('#alhaditst1').val()) + parseInt($('#alhaditst2').val()) + parseInt($('#alhaditsu').val()))/ 3);
            });
            $("#bat1,#bat2,#bau").ready(function () {
                $('#bar').val((parseInt($('#bat1').val()) + parseInt($('#bat2').val()) + parseInt($('#bau').val()))/ 3);
            });
            $("#akht1,#akht2,#akhu").ready(function () {
                $('#akhr').val((parseInt($('#akht1').val()) + parseInt($('#akht2').val()) + parseInt($('#akhu').val()))/ 3);
            });
            $("#fiqiht1,#fiqiht2,#fiqihu").ready(function () {
                $('#fiqihr').val((parseInt($('#fiqiht1').val()) + parseInt($('#fiqiht2').val()) + parseInt($('#fiqihu').val()))/ 3);
            });
            $("#skit1,#skit2,#skiu").ready(function () {
                $('#skir').val((parseInt($('#skit1').val()) + parseInt($('#skit2').val()) + parseInt($('#skiu').val()))/ 3);
            });

        // keyup
            $("#aqidaht1,#aqidaht2,#aqidahu").keyup(function () {
                $('#aqidahr').val((parseInt($('#aqidaht1').val()) + parseInt($('#aqidaht2').val()) + parseInt($('#aqidahu').val()))/ 3);
            });
            $("#alqurant1,#alqurant2,#alquranu").keyup(function () {
                $('#alquranr').val((parseInt($('#alqurant1').val()) + parseInt($('#alqurant2').val()) + parseInt($('#alquranu').val()))/ 3);
            });
            $("#alhaditst1,#alhaditst2,#alhaditsu").keyup(function () {
                $('#alhaditsr').val((parseInt($('#alhaditst1').val()) + parseInt($('#alhaditst2').val()) + parseInt($('#alhaditsu').val()))/ 3);
            });
            $("#bat1,#bat2,#bau").keyup(function () {
                $('#bar').val((parseInt($('#bat1').val()) + parseInt($('#bat2').val()) + parseInt($('#bau').val()))/ 3);
            });
            $("#akht1,#akht2,#akhu").keyup(function () {
                $('#akhr').val((parseInt($('#akht1').val()) + parseInt($('#akht2').val()) + parseInt($('#akhu').val()))/ 3);
            });
            $("#fiqiht1,#fiqiht2,#fiqihu").keyup(function () {
                $('#fiqihr').val((parseInt($('#fiqiht1').val()) + parseInt($('#fiqiht2').val()) + parseInt($('#fiqihu').val()))/ 3);
            });
            $("#skit1,#skit2,#skiu").keyup(function () {
                $('#skir').val((parseInt($('#skit1').val()) + parseInt($('#skit2').val()) + parseInt($('#skiu').val()))/ 3);
            });
        </script>