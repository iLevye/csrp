<div id="top">
	<div class="wrapper">
		<a  id="logo">LOGO</a>
		<div class="login">	
			<form id="LoginForm" class="form" >
				<div class="loginFormBox">
					<input type="text" class="loginTextForm" name="email" id="email" value="E-Mail Adresiniz..." onfocus="if(this.value == 'E-Mail Adresiniz...'){this.value=''};" onblur="if(this.value == ''){this.value='E-Mail Adresiniz...';}" />
					<input type="password" class="loginTextForm" id="sifre" onfocus="if(this.value == '***************'){this.value=''};" onblur="if(this.value == ''){this.value='***************';}" name="sifre" value="***************"/>
					<input type="submit" name="giris" value="Giriş" class="loginSubmit" />
				</div>

			</form>	
			<div id="errors" style="display:none;color:red;float:left;font-size:12px;" title="Kullanıcı Girişi"></div>
		</div>
		<div class="clear"></div>
	</div>
</div>
