<?php require_once 'core/init.php'; ?>
<?php
	if (Input::varsa()) {
		$o_list_j=file_get_contents("ogrenci_list.json");
		$o_list=json_decode($o_list_j, true);
		$tamam=1;
		$hata=1;
		$g_don=1;
		$hata_y=array();
		$o_no=Input::getir("o_no");
		$o_ad=Input::getir("o_ad");
		$o_acik=Input::getir("o_acik");
		$o_dosya=Input::getir("o_dosya");
		$d_tur = strtolower(pathinfo($o_dosya,PATHINFO_EXTENSION));
		$id=substr(md5(time()), -10);
		$d_boyut=$_FILES["o_dosya"]["size"];
		if (trim($o_no)==""||trim($o_ad)==""||trim($o_acik)==""||$o_dosya=="") {
		    $hata_y[]="Boş Alan Bırakmayın.";
		    $hata=0;
		}else{
			foreach ($o_list as $o_list_no => $o_list_ad) {
				if ($o_list_no==$o_no&&yap_tr($o_list_ad)==yap_tr($o_ad)) {
					$hata=0;
					if ($d_boyut > 500000) {
					    $hata_y[]="Dosya Çok Büyük.";
					    $tamam = 0;
					}
					if($d_tur != "zip" && $d_tur != "rar" && $d_tur != "7z" && $d_tur != "c") {
					    $hata_y[]="Sadece rar, zip, 7z, c Dosyalarını Yükleyebilirsiniz.";
					    $tamam = 0;
					}
					if ($tamam == 0) {
					    $hata_y[]= "Yükleme Başarısız.";
					} else {
						$dosya="odevler/".yap_tr($o_list_ad).'('.yap_tr($o_list_no).')'."/".yap_tr($o_acik."-".$o_no."-".$id).".".$d_tur;
						if (!file_exists('odevler/'.yap_tr($o_list_ad).'('.yap_tr($o_list_no).')')) {
						    mkdir('odevler/'.yap_tr($o_list_ad).'('.yap_tr($o_list_no).')', 0777, true);
						    move_uploaded_file($_FILES["o_dosya"]["tmp_name"], $dosya);
						    $hata_y[]="Yükleme Başarılı.";
						    $g_don=0;
						}else if (move_uploaded_file($_FILES["o_dosya"]["tmp_name"], $dosya)) {
					        $hata_y[]="Yükleme Başarılı.";
						    $g_don=0;
					    } else {
					        $hata_y[]="Yükleme Başarısız.";
					    }
					}
				}
			}
		}
		if ($hata==1) {
			$hata_y[]="Hatalı İsim veya Öğrenci No.";
		}
		?>
		<style>	
		*{
			margin: 0;
			padding:0;
			font-size: 14px;
			font-family: arial;
		}
		.orta{
			position: absolute;
			top: 50%;
			left: 50%;
			display: table;
			width: auto;
			height: auto;
			margin-left: -300px;
			margin-top: -80px;
		}
		.orta ul{
			background-color: black;
			border-radius: 5px;
			padding-top: 5px;
			padding-bottom: 1px;
		}ul li{
			text-align: center;
			line-height: 40px;
			list-style: none;
			color: white;
			text-decoration: none;
			display: table;
			background-color: gray;
			width: 600px;
			margin-left: 5px;
			margin-right: 5px;
			margin-bottom: 4px;
		}
		ul li:first-child{
			border-radius: 3px 3px 0px 0px;
		}
		ul li:last-child{
			border-radius: 0px 0px 3px 3px;
		}
		.geri {
			background-color: white;
			cursor: pointer;
			color: black;
		}
		.geri:hover{
			background-color: orange;
			color: white;
		}
		</style>
		<div class="orta">	
			<ul>
				<?php 
				foreach ($hata_y as $yaz) {
				?>
				<li><?php echo $yaz;?></li>
				<?php
				}
					if ($g_don==1) {
					?>
					<li class="geri" onclick="history.go(-1);">Geri Dön</li>
					<?php
					}
				?>
			</ul>
		</div>
		<?php
	}else{
		Yonlendir::git("/");
	}
?>