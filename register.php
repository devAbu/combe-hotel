<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="#" type="text/css" rel="stylesheet">
    <title>Create an account</title>
    <meta name="author" content="obada">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="icon" type="image/ico" href="images/home.ico" />
	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="crossorigin="anonymous"></script>


</head>

<body style="max-width:550px;border:2px solid black;">
    <input type="button" value="Back" class="btn btn-primary" style="width:80px; margin-left:10px;" onclick="window.history.go(-1);">
    <br>
    <center>
    <img src="images/logo.png" style="width:350px; height: 150px;"> <br> <br>
    
    <form> <!--action="DataRegister.php" method="POST"-->
    <input type="text" name="first" id="first"  class="form-control" placeholder="First Name" autofocus="" required="required" style="width:350px;" > <br>
    <input type="text" name="last" id="last" class="form-control" placeholder="Last Name" autofocus="" required="required" style="width:350px;" > <br>
    
    <input type="email" name="mail" id="mail"  class="form-control" placeholder=" Email" autofocus="" required="required" style="width:350px;" >  <br>
    
    <input type="password" name="pass" id="pass"  class="form-control" placeholder="Password" autofocus="" required="required" style="width:350px;" > <br>
    
    <input class="btn btn-primary" id="insert" value="Sign up" name="insert" style="width:325px;">
    </form>

	<div id="mess" class="alert">

	</div>
    </center>

	<script>
		$("#mess").slideUp();
		$("#insert").click(function(){
			$("#mess").removeClass('alert-success').removeClass('alert-danger');	
			var first = $("#first").val();
			var last = $("#last").val();
			var mail = $("#mail").val();
			var pass = $("#pass").val();
			function validateEmail($email) {
				var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
				return emailReg.test( $email );
			}
			

			if (first  == ""){
				$("#mess").addClass('alert-danger');
				$("#mess").html('<strong>Error</strong> Please enter your first name.');
				$("#mess").slideDown(500).delay(1000).slideUp(500);
			}else if(last == ""){
				$("#mess").addClass('alert-danger');
				$("#mess").html('<strong>Error</strong> Please enter your last name.');
				$("#mess").slideDown(500).delay(1000).slideUp(500);
			}else if(mail == ""){
				$("#mess").addClass('alert-danger');
				$("#mess").html('<strong>Error</strong> Please enter your email address.');
				$("#mess").slideDown(500).delay(1000).slideUp(500);
			}else if(!validateEmail(mail)){
				$("#mess").addClass('alert-danger');
				$("#mess").html('<strong>Error</strong> Please enter validated email address.');
				$("#mess").slideDown(500).delay(1000).slideUp(500);
			}else if(pass == ""){
				$("#mess").addClass('alert-danger');
				$("#mess").html('<strong>Error</strong> Please enter password.');
				$("#mess").slideDown(500).delay(1000).slideUp(500);
			}else{
				$.ajax({
					url: "./registerAjax.php?task=newAcc&first="+first+"&last="+last+"&mail="+mail+"&pass="+pass,
                    success: function (data) {
						if(data == 'GOOD'){
								$("#mess").addClass('alert-success');
								$("#mess").html('<strong>'+data+'</strong> Account created.');
								$("#mess").slideDown(500).delay(1000).slideUp(500);
						}else{
							$("#mess").addClass('alert-danger');
							$("#mess").html('<strong>Error</strong>Username or Email already exists. Please try another one.');
							$("#mess").slideDown(500).delay(1000).slideUp(500);
						}
                    },
                    error: function (data, err) {
							$("#mess").addClass('alert-danger');
							$("#mess").html('<strong>Problem occured</strong> Please try later.');
							$("#mess").slideDown(500).delay(1000).slideUp(500);
					}
				});
			}

		});
	</script>

</body>
</html>