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
		margin-left: -150px;
		margin-top: -120px;
	}
	form ul{
		background-color: black;
		border-radius: 5px;
		padding-top: 5px;
		padding-bottom: 1px;
	}
	form ul li{
		text-align: left;
		line-height: 40px;
		list-style: none;
		color: white;
		text-decoration: none;
		display: table;
		background-color: gray;
		width: 300px;
		margin-left: 5px;
		margin-right: 5px;
		margin-bottom: 4px;
	}
	form ul li:first-child{
		border-radius: 3px 3px 0px 0px;
	}
	form ul li:last-child{
		border-radius: 0px 0px 3px 3px;
	}


	ul li p{
		width: 100px;
		float: left;
		margin-left: 10px;
	}
	ul li div{
		width: 160px;
		float: left;
		margin-top: 5px;
	}
	div input{
		height: 30px;
		padding-left: 5px;
		width: 180px;
	}
	input[type="submit"]{
		width: 300px;
		text-align: center;
		border: none;
		border-radius: 0px 0px 3px 3px;
	}
	input[type="file"]{
		width: 280px;
		padding: 0;
		margin: 0 9px;
	}
</style>
<div class="orta">	
	<form method="POST" action="/kaydet.php" enctype="multipart/form-data">
		<ul>
			<li><p>Öğrenci No:</p><div><input type="number" name="o_no"></div></li>
			<li><p>İsim Soyisim:</p><div><input type="text" name="o_ad"></div></li>
			<li><p>Açıklama:</p><div><input type="text" name="o_acik"></div></li>
			<li><div><input type="file" name="o_dosya"></div></li>
			<li><input type="submit" name="gonder"></li>
		</ul>
	</form>
</div>


