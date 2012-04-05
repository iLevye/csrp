<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Counter Strike</title>
<link href="<?=base_url()?>css/reset.css" rel="stylesheet" type="text/css" />
<link href="<?=base_url()?>css/main.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/grid.css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/ui-lightness/jquery-ui-1.8.16.custom.css" media="screen" />
<script type="text/javascript" src="<?=base_url()?>js/jquery-1.7.1.min.js"></script> 
<script type="text/javascript" src="<?=base_url()?>js/jquery-ui-1.8.16.custom.min.js"></script> 	
<script type="text/javascript">
	$(document).ready(function() {
		$('#LoginForm').submit(function() {
			$.post("<?=base_url()?>user_control/login/",{
			email : $("#email").val(),
			sifre : $("#sifre").val()
			},
			function (data) {
				if(data==1) {
					location.href="<?=base_url()?>main/";
				}else{
					$("#errors").html("E-Mail Adresiniz veya Şifreniz Yalnış");
					$("#errors").dialog();
				}
			});
			return false;
		});

		$('#signup').submit(function() {
			$.post("<?=base_url()?>user_control/inserts/",{
			email : $("#insertEmail").val(),
			userName : $("#insertUserName").val(),
			inname : $("#insertName").val(),
			sifre : $("#insertPassword").val(),			
			country : $("#insertCountry").val(),
			city : $("#insertCity").val()		
			},
			function (data) {
				if(data==1) {
					location.href="<?=base_url()?>main/";
				}else{
					$("#errors").html("Kaydedilemedi.");
					$("#errors").dialog();
				}
			});
			return false;
		});	
	});
</script>


</head>

<body>
<?php include('header.php');?>
<div id="content">
	<div class="wrapper">
		<div class="contentLeft">
			<h1 class="contentTitle">Connect With</h1>
			<?php 
			for($i=0;$i < 9;$i++) {
			?>
			<div class="connectIcons" ></div>
			<?php } ?>
		</div>
		<div class="contentRight">
			<h1 class="contentTitle">Sign Up</h1>
			<form id="signup" name="member">
				<input type="text" name="insertEmail" id="insertEmail" class="memberFormText" value="E-Mail Adresiniz" onfocus="if(this.value == 'E-Mail Adresiniz'){this.value=''};" onblur="if(this.value == ''){this.value='E-Mail Adresiniz';}" />
				<input type="text" name="insertUserName" id="insertUserName" class="memberFormText" value="Kullanıcı Adınız" onfocus="if(this.value == 'Kullanıcı Adınız'){this.value=''};" onblur="if(this.value == ''){this.value='Kullanıcı Adınız';}"/>
				<input type="text" name="insertName" id="insertName" class="memberFormText" value="Adınız ve Soyadınız" onfocus="if(this.value == 'Adınız'){this.value=''};" onblur="if(this.value == ''){this.value='Adınız';}"/>
				<input type="password" name="inserPassword" id="inserPassword" class="memberFormText" value="**********************" onfocus="if(this.value == '**********************'){this.value=''};" onblur="if(this.value == ''){this.value='**********************';}" />
				<input type="password" name="inserPasswordControl" class="memberFormText" value="**********************" onfocus="if(this.value == '**********************'){this.value=''};" onblur="if(this.value == ''){this.value='**********************';}" />
				<input type="text" name="insertCountry" id="insertCountry" class="memberFormText" value="Ülke" onfocus="if(this.value == 'Ülke'){this.value=''};" onblur="if(this.value == ''){this.value='Ülke';}" />
				<input type="text" name="insertCity" id="insertCity" class="memberFormText" value="Şehir" onfocus="if(this.value == 'Şehir'){this.value=''};" onblur="if(this.value == ''){this.value='Şehir';}"/>
				<input type="submit" name="sign" value="Sign Up" class="signSubmit" />
			</form>
		</div>
	</div>
</div>	
		
		
<? print_r($this->session->all_userdata());?>
</body>

</html>
