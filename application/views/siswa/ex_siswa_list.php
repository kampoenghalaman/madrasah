<!doctype html>
<html>
    <head>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <!--<style>
            body{
                padding: 15px;
            }
        </style>-->
    </head>
    <body>
        <h2 style="margin-top:0px">Daftar Siswa Kelas <?php echo urldecode($this->input->get('kelas', TRUE)); ?></h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('siswa/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('siswa/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('siswa'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th><p align="center">No</p></th>
		<th><p align="center">Nama Siswa</p></th>
		<th><p align="center">Jenis Kelamin</p></th>
		<th><p align="center">Kelas</p></th>
		<!-- <th>Indo</th>
		<th>Mtk</th>
		<th>Inggris</th> -->
		<th><p align="center">Action</p></th>
            </tr><?php
            foreach ($siswa_data as $siswa)
            {
                ?>
                <tr>
			<td width="80px" style="text-align:center"><?php echo ++$start ?></td>
			<td style="text-align:center"><?php echo $siswa->nama_siswa ?></td>
			<td style="text-align:center"><?php echo $siswa->jk ?></td>
			<td style="text-align:center"><?php echo $siswa->kelas ?></td>
			<!-- <td><?php echo $siswa->indo ?></td>
			<td><?php echo $siswa->mtk ?></td>
			<td><?php echo $siswa->inggris ?></td> -->
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('siswa/read/'.$siswa->id_siswa),'<button class="btn btn-primary"><i class="icon-search"></i></button>'); 
				// echo ' | '; 
				// echo anchor(site_url('siswa/update/'.$siswa->id_siswa),'Update'); 
				// echo ' | '; 
				// echo anchor(site_url('siswa/delete/'.$siswa->id_siswa),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
		<?php #echo anchor(site_url('siswa/excel'), 'Excel', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>