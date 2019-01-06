<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Google Login::Metro Soft</title>
<style type="text/css">
.container{
	padding: 20px;
}
.wrapper{
	width: 340px;
	margin: auto;
	padding: 10px;
    background-color: #ffffff;
	box-shadow: 0 2px 4px 0 rgba(0,0,0,.25);
}
.wrapper h2{
	font-size: 20px;
	color:#333;
	text-align: center;
}
.wrapper img{
	max-width: 100%;
}
</style>
</head>
<body>
<div class="container">
	<div class="wrapper">
		<h2>Google+ Profile Details</h2>
		
		<!-- Display Google profile information -->
		<img src="<?php echo $userData['picture']; ?>"/>
		<p><b>Google ID: </b><?php echo $userData['oauth_uid']; ?></p>
        <p><b>Name: </b><?php echo $userData['first_name'].' '.$userData['last_name']; ?></p>
        <p><b>Email: </b><?php echo $userData['email']; ?></p>
        <p><b>Gender: </b><?php echo $userData['gender']; ?></p>
        <p><b>Locale: </b><?php echo $userData['locale']; ?></p>
        <p><b>Logged in with Google: </b><a href="<?php echo $userData['link']; ?>" target="_blank">Click to visit Google+</a></p>
        <p><b>Logout from <a href="<?php echo base_url().'user_authentication/logout'; ?>">Google</a></b></p>
	</div>
</div>
</body>
</html>