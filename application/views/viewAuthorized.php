<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
	<title>Aplikasi Data Mahasiswa</title>
 
<?php 
foreach($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
 
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
 
    <script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
 
	<style type='text/css'>
	body{
	    font-family: Arial;
	    font-size: 14px;
	}
	a{
	    color: blue;;
	    text-decoration: none;
	    font-size: 14px;
	}
	a:hover{
	    text-decoration: underline;
	}

	.user-area{
		text-align: right;
		padding:5px 40px 0 0;
	}
		.user-area span{
			color: #fd7e00;
			text-decoration: none;
			font-weight: bold;
			font-size:16px;
		}
		.user-area a{
			color: #1ABC9C;
			text-decoration: none;
			font-weight: bold;
			font-size:16px;
		}
		.user-area a:hover{
			text-decoration: underline;
		}
		
	.menu-item{
		text-align: left;
		padding:2px 0 0 30px;
	}
		.menu-item a{
			color:#EA912A;
			text-decoration: none;
			font-size:16px;
			font-weight: bold;
		}
		.menu-item a:hover{
			text-decoration: underline;
			color:#1ABC9C;
		}
	</style>

	<script type="text/javascript">
	function popup (name,width,height) {  
	     var options = "toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=1,resizable=0,width="+width+",height="+height;  
	     Cal2=window.open(name,"popup",options);  
	}     
	</script> 
</head>
<body>

			<!-- Beginning header -->
			<div class="user-area">
		   	<span>&lt;ADMINISTRATOR&gt;</span> <a href="<?php echo site_url('controllerAuthorized/logout')?>">&lt;LOGOUT&gt;</a>
			</div>

		    <div class="menu-item">
		        <a href="<?php echo site_url('controllerAuthorized')?>">Data Mahasiswa</a> | 
				<a href="<?php echo site_url('controllerAuthorized/dataKelas')?>">Data Kelas</a> | 
				<a href="<?php echo site_url('controllerAuthorized/dataDosen')?>">Data Dosen</a> | 
				<a href="<?php echo site_url('controllerAuthorized/dataJurusan')?>">Data Jurusan</a> | 
				<a href="<?php echo site_url('controllerAuthorized/dataFakultas')?>">Data Fakultas</a>
				 
			<!--<a href="JavaScript:popup('<?php echo site_url('controllerAuthorized/tabel_item_desk')?>',800,400)">Item Number</a> |
			<a href="JavaScript:popup('<?php echo site_url('controllerAuthorized/tabel_operator')?>',1024,768)">Item Number</a>-->
		    </div>
			<!-- End of header-->

    		<div style='height:20px;'></div>  
    
	<div>
    	<?php echo $output; ?>
	</div>

	<?php
	if(isset($dropdown_setup)) {
		$this->load->view('dependent_dropdown', $dropdown_setup);
	}
	?>
	
</body>
</html>