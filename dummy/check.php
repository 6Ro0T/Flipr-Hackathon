<!DOCTYPE html>
<html>
<head>
	<title>checking</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
	<form method="post">
	<input type="password" name="password" id="pass1">
	<input type="password" name="password2" id="pass2">
	<p id="status"></p>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#pass2").keyup(validate);
		});
		function validate(){
			var p1 = $("#pass1").val();
			var p2 = $("#pass2").val();

			if(p1==p2){
				$("#status").text("valid");
			}
			else{
				$("#status").text("invalid");
			}
		}
	</script>
</form>
</body>
</html>