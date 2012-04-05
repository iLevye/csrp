<div id="top">
	<div class="wrapper">
		<a  id="logo">LOGO</a>
		<div class="login">
			<?php
			if(isset($_SESSION['user'])) {			
			?>
			<div class="loginMemberBox">
			<a class="userName"><?php echo $_SESSION['user']['user_manager_username'] . "--" . $_SESSION['user']['user_manager_id'];?></a>
			<a href="index.php?i=logout" class="userName">ÇIKIŞ</a>
			</div>			
			<?php }else { ?>
			<form method="POST" name="login" class="form" action="?i=login">
				<div class="loginFormBox">
					<input type="text" class="loginTextForm" name="email" value="E-Mail Adresiniz..." onfocus="if(this.value == 'E-Mail Adresiniz...'){this.value=''};" onblur="if(this.value == ''){this.value='E-Mail Adresiniz...';}" />
					<input type="password" class="loginTextForm" onfocus="if(this.value == '***************'){this.value=''};" onblur="if(this.value == ''){this.value='***************';}" name="sifre" value="***************"/>
					<input type="submit" name="giris" value="Giriş" class="loginSubmit" />
				</div>
				<? if(@$data['loginfail']){ ?>
					<p style="color:red">Hatalı e-posta yada şifre</p>
				<? } ?> 
			</form>	
			<?php } ?>
				
		</div>
		<div class="clear"></div>
	</div>
</div>
