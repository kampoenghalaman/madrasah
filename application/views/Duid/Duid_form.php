<!DOCTYPE html>
<html>
<head>
	<title>Keuangan Madrasah</title>
	<script type="text/javascript">
		$(document).ready(function(){
        	$('.formpembayaran').hide();
        	$('#tutup').hide();

        	$('#tampil').click(function(){
            $('.formpembayaran').show();
            $('#tutup').show();
            document.getElementById('pembayaranbulan').value = "";
            document.getElementById('besaran').value = "";
            
        	});

        	$('#tutup').click(function(){
            	$('.formpembayaran').hide();
            	$('#tutup').hide();
        	});
        }); 

       
	</script>

</head>
<body>
<br><br>
<h1 style="margin-top:0px">Laporan Pembayran</h1>
<form method="POST" action="<?php print $_SERVER['PHP_SELF']?>">
	<table  width=100%>
	<tr><td><h4>Kelas</h4></td><td>:</td>
	<td>
	<select class="form-control" id="kelas" name="kelas">
	<option value="" disabled selected>Pilih Kelas</option>
	<?php foreach($kelas as $row){
		echo "<option value='".$row->kelas."'>".$row->kelas."</option>";
		}?>
	</select></td></tr>
	<tr><td width=25%><h4>Nama Siswa</h4></td><td>:</td><td>
	<select class="form-control" id="siswa" name="siswa">
	<option value="" disabled selected>Pilih Siswa</option>
	<?php foreach($siswa as $row){
		echo "<option value='".$row->id_siswa."' class='".$row->kelas."'>".$row->nama_siswa."</option>";
		}?>
	</select>
	
	</td></tr>
	<tr>
	<td colspan="3"><p align="right"><button type="submit" class="btn btn-primary">Cek</button> </p></td>
	</tr>
	</table>
</form>
	<table class="table table-bordered">
	<?php

	if(!empty($id_siswa)){
		if($cek == 0){
			echo "<tr><td><p align='center'>DATA PEMBAYARAN <b>".strtoupper($nama)."</b> KELAS <b>".$keles."</b> BELUM ADA</td</tr>";
		}else{echo "<tr><td colspan='5'><p align='center'>DATA PEMBAYARAN <b>".strtoupper($nama)."</b> KELAS <b>".$keles."</b></td</tr>";
			?>
			
				<tr align='center'>
					<th>No</th>
					<th>Tanggal Bayar</th>
					<th>Pembayaran Bulan</th>
					<th>Besaran</th>
					<th>action</th>
				</tr>

				<?php $i=1;
					foreach($dataduid as $row){
						echo "<tr align='center'>";
						echo "<th>".$i++."</th>";
						echo "<th>".date('d M Y', strtotime($row->tanggalbayar))."</th>";
						echo "<th>".$row->pembayaranbulan."</th>";
						echo "<th><p align='right'>Rp " . number_format($row->besaran,2,',','.')."</p></th>";
						echo "<th><button id='bhapus[]' value='".$row->id_duid."-".$id_siswa."' title='Hapus data pembayaran".strtoupper($nama)." bulan ".strtoupper($row->pembayaranbulan)."'><img src=".base_url('assets/hapus.png')." height='25' width='20'></button></th>";
						echo "</tr>";
						// duid/hapuspembayaran/'.$row->id_duid."-".$id_siswa
						// .anchor('',"<button onclick='peringatan()' title='Hapus data pembayaran".strtoupper($nama)." bulan ".strtoupper($row->pembayaranbulan)."'><img src=".base_url('assets/hapus.png')." height='25' width='20'></button>").
					}
				?>

		<?php }
			echo "<tr><td colspan='5'><p align='center'><button class='btn btn-primary' id='tampil'>Pembayaran Baru</button> <button class='btn btn-primary' id='tutup'>Batal</button> </td</tr>";
		}?>

	</table>

	<form method="POST" action="<?php echo base_url('duid/prosespembayaran')?>" class="formpembayaran">
		<table width=50% align="center">
		<tr>
			<td width=30%>Tanggal Bayar</td>
			<td width=10%>:</td>
			<td><input type="text" class="form-control" name="tanggalbayar" id="tanggalbayar" placeholder="Tanggal Bayar Siswa" value="<?php echo date('d F Y');?>" readonly/></td>
		</tr>
		<tr>
			<td>Pembayaran Bulan</td>
			<td>:</td>
			<td>
			<select name='pembayaranbulan' class="form-control" required>
				<option value="" disabled selected>Pilih Bulan</option>
				<option value="Januari">Januari</option>
				<option value="Februari">Februari</option>
				<option value="Maret">Maret</option>
				<option value="April">April</option>
				<option value="Mei">Mei</option>
				<option value="Juni">Juni</option>
				<option value="Juli">Juli</option>
				<option value="Agustus">Agustus</option>
				<option value="September">September</option>
				<option value="Oktober">Oktober</option>
				<option value="November">November</option>
				<option value="Desember">Desember</option>	
			</select>
			</td>
		</tr>
		<tr>
			<td>Besaran</td>
			<td>:</td>
			<td><input type="number" class="form-control" name="besaran" id="besaran" placeholder="Besaran" value=""  required/><input type="hidden" name="id_siswa" value="<?php echo $id_siswa;?>"/></td>
		</tr>
		<tr>
			<td colspan='3'><p align="right"><button type='submit' class='btn btn-primary'>Lakukan Pembayaran</button></p></td>
		</tr>
        </table>
        
	</form>

</body>
</html>
<script type="text/javascript">
    $(document).ready(function () {
        $("#siswa").chained("#kelas");
    });
</script>
<script>
$("#bhapus[]").click(function() {
    var r = confirm("Yakin Mau Hapus Data Pembayaran?");
    if(r == false ){
    	window.location = "<?php echo base_url('duid/index/'.$id_siswa);?>";
    }else{
    	var id = $("#bhapus").val();
    	window.location = "<?php echo base_url('duid/hapuspembayaran/');?>"+ id;
    }
});
</script>