<header>
	<div class="row">
		<div class="logo col-4"> 
			<h1>QuizBitz</h1>
		</div>
		<div class="col-8">
		</div>
	</div>
</header>
<div class="window_box">
	<div class="row window_title">
		<h2>Login</h2>
	</div>
	<div class="window_body">
		<form class="row login" method="post" action="<?php echo base_url()."index.php/login/check"?>">
			<input type="text" name="user" placeholder="Username" value="" required><br>
			<input type="password" name="passwd" placeholder="Password" required><br>
			<div class="error"><?php echo $error?></div>
			<input type="submit" value="Login"><br>
		</form>
	</div>
</div>