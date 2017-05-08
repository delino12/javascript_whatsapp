<!DOCTYPE html>
<html>
<head>
	<title>Test JavaScript Ajax</title>
</head>
<body>

<?php
// on your register button
if($_GET['fname']&&$_GET['email']&&$_GET['password']&&$_GET['phone'])
{
	# assign get request
	$fname = $_GET['fname'];
	$email = $_GET['email'];
	$password = $_GET['password'];
	$phone = $_GET['phone'];
}
?>
<form onsubmit="return apiSignup()">
	<input type="hidden" id="fname" name="" value="<?php echo $fname; ?>">
	<input type="hidden" id="email" name="" value="<?php echo $email; ?>">
	<input type="hidden" id="password" name="" value="<?php echo $password; ?>">
	<input type="hidden" id="phone" name="" value="<?php echo $phone; ?>">
	<button>register user with Facebook for </button>
</form>



<div id="load-api"></div>
<script type="text/javascript">
	$(document).ready(function (){
		// add your click triger but i like functions
		function apiSignup()
		{
			var fname = $("#fname").val();
			var email = $("#email").val();
			var password = $("#password").val();
			var phone = $("#phone").val();

			$.ajax({
				type: "POST",
				url: "register_user.php",
				data: {
					fname:fname,
					email:email,
					password:password,
					phone:phone
				},
				cache:false,
				success: function (data)
				{
					$("#load-api").html(data);
				}
			});
		}
	});
</script>
</body>
</html>

