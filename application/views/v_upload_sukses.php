<html>
<head>
	<title>upload file codeigniter</title>
</head>
<body>
	<center><h1>Latihan Upload File Codeigniter</h1></center>
	<ul>
		<?php foreach ($upload_data as $item => $value):?>
			<li><?php echo $item;?>: <?php echo $value;?></li>
		<?php endforeach; ?>
	</ul>	
</body>
</html>