<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="#" type="text/css" rel="stylesheet">
        <link rel="shortcut icon" href="images/icon.ico">
        <meta name="author" content="obada">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	    <link rel="icon" type="image/ico" href="images/home.ico" />
		<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="crossorigin="anonymous"></script>


        <script>
            function showPass(){
            var pass=document.getElementById('pass');
            if(document.getElementById('showPass').checked){
                pass.setAttribute('type','text');
            }
            else
                pass.setAttribute('type','password');
        }
        </script>
        
    </head>
    
    <body style="max-width:550px;border:2px solid black;">
        <input type="button" value="Back" class="btn btn-primary" style="width:80px; margin-left:10px;" onclick="window.history.go(-1);"> <br>
        <center>
            <img src="images/logo.png" style="width:350px; height: 150px;"> <br> <br>
            <form  action = "DataLogin.php" method = "POST"> <!-- action = "DataLogin.php" method = "POST"-->
            <input type="email" name="mail" id="mail" placeholder="Email" class="form-control" style="max-width:350px;" required> <br>
            <input type="password" name="pass" placeholder="Password" id="pass" class="form-control" style="max-width:360px;" required> 
            <input type="checkbox" id="showPass" onclick="showPass();" style="margin-left:220px;">Show password <br>
            <br>
            <label class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0" style="margin-left:0px;" >
            <input type="checkbox" class="custom-control-input" checked>
            <span class="custom-control-indicator"></span>
            <span class="custom-control-description">Remember me</span>
        </label>
        
        <a href="#"> <label style="padding-left:95px;">Forgot password? </label></a>
        <br>
        <input  type="Submit" id="insert" value="Login" name="insert" class="btn btn-outline-primary" style="width:150px;">
		
        <br>
        <label style="font-size:24px; padding-top:30px;">No account?</label>
        <a href="register.php"><input type="button" value="Sign up" class="btn btn-success" style="color:gold;"></a>
        </form>

        </center>

	

    </body>
</html>