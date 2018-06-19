<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>COMBRERO HOTEL</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">    
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">  
	<link rel="icon" type="image/ico" href="images/home.ico" />
	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="crossorigin="anonymous"></script>


   
    <script>
        function checkPrice(){
            var num1 = document.getElementById("adultNum").value;
            var num2 = document.getElementById("childNum").value;
           
            var price1 = num1 * 75;
            var price2 = num2 * 45;
        
            var priceTotal = price1 + price2;
            document.getElementById("totalPrice").value = priceTotal;
        }
        
        
    </script>
    
    
</head>
<body>
     <div class="w3-sidebar w3-bar-block w3-border-right" style="display:none;width:100%;opacity:0.93;" id="mySidebar">
  <button onclick="w3_close()" class="w3-bar-item w3-large">Close &times;</button>
   <header>
        <img src="images/logo.png" alt="logo" style="width:350px; height:150px; margin-left:500px;">
    </header>

    <aside style=" float:left; margin-left:30px; ">
        <h3 style="font-size:30px;">MENU</h3>
        <hr style="width:700px;">
        <a href="index.php" class="link"> HOME </a> <br> <br>
        <a href="hotel.php" class="link"> HOTELS </a> <br> <br>
        <a href="#" class="link"> A DAY WITH US </a> <br> <br>
        <a href="#" class="link"> ACTIVITIES </a> <br> <br>
        <a href="events.php" class="link"> EVENTS </a> <br> <br>
        <a href="#" class="link"> CONTACTS </a>
        <hr>
        <a href="https://facebook.com">
        <img src="images/facebook.png" alt="FACEBOOK" style="width:70px; height:45px; border-radius:50%; margin-top:-10px; "></a>
        <a href="https://instagram.com">
        <img src="images/instagram.png" alt="INSTAGRAM" style="width:90px; height:80px; border-radius:50%; margin-left:-26px; margin-top:-50px;"></a>
        <a href="https://twitter.com">
        <img src="images/twitter.png" alt="TWITTER" style="width:45px; height:50px; border-radius:50%; margin-left:-13px;"></a>
        <a href="https://youtube.com">
        <img src="images/youtube.png" alt="YOUTUBE" style="width:45px; height:50px; border-radius:50%; margin-left:7px;"></a>
    </aside>

    <aside style="float:right; margin-right:30px;">
        <form> <!-- action="DataBook.php" method="POST" -->
        <h3 style="font-size:30px;">BOOK NOW</h3>
        <hr> 
        <label style="font-size:25px;">Check-in date:</label>
        <input type="date" style="width:270px; margin-bottom:15px;" name="checkIn" id="checkIn" required min="2018-01-01" max="2020-01-01"> <br>
        <label style="font-size:25px;">Check-out date:</label>
        <input type="date" style="width:270px; margin-bottom:15px;" name="checkOut" id="checkOut" min="2018-01-01" max="2020-01-01" required><br>
        <input type="number" placeholder="Number of adults" id="adultNum" name="adultsNum" onchange="checkPrice();" style="width:399px;" class="form-control bfh-number"> <br>
        <input type="number" placeholder="Number of children" id="childNum" onchange="checkPrice();" name="childrenNum" class="form-control bfh-number" style="width:399px;"> <br>
        <center>
            <input type="number" name="price" id="totalPrice" placeholder="Price" readonly class="form-control bfn-number" style="width:100px;">
        </center>
        <br>
        <input id="book" name="insert" value="Book Now" class="btn btn-outline-dark btn-lg" style="width:300px;height:100px;color:gold; font-size:30px;" >
        <hr>
        </form>
		<div id="mess" class="alert">

		</div>

        <a href="#" class="lang"> ARB </a>
        <a href="#" class="lang"> ENG </a>
        <a href="#" class="lang"> BOS </a>
    </aside>
</div>

<!-- Page Content -->
  <button class="w3-button w3-teal w3-xlarge" onclick="w3_open()">☰</button>

  <script>
		$("#mess").slideUp();
		$("#book").click(function(){
			$("#mess").removeClass('alert-success').removeClass('alert-danger');	
			var checkIn = $("#checkIn").val();
			var checkOut = $("#checkOut").val();
			var adultNum = $("#adultNum").val();
			var childNum = $("#childNum").val();
			var totalPrice = $("#totalPrice").val();

			if (checkIn  == ""){
				$("#mess").addClass('alert-danger');
				$("#mess").html('<strong>Error</strong> Please enter check in date.');
				$("#mess").slideDown(500).delay(1000).slideUp(500);
			}else if(checkOut == ""){
				$("#mess").addClass('alert-danger');
				$("#mess").html('<strong>Error</strong> Please enter check out date.');
				$("#mess").slideDown(500).delay(1000).slideUp(500);
			}else if(checkOut < checkIn){
				$("#mess").addClass('alert-danger');
				$("#mess").html('<strong>Error</strong> Please enter valid date.');
				$("#mess").slideDown(500).delay(1000).slideUp(500);
			}else if(adultNum == ""){
				$("#mess").addClass('alert-danger');
				$("#mess").html('<strong>Error</strong> Please enter number of adults.');
				$("#mess").slideDown(500).delay(1000).slideUp(500);
			}else if(childNum == ""){
				$("#mess").addClass('alert-danger');
				$("#mess").html('<strong>Error</strong> Please enter number of child.');
				$("#mess").slideDown(500).delay(1000).slideUp(500);
			}else{
				$.ajax({
					url: "./bookingAjax.php?task=succ&checkIn="+checkIn+"&checkOut="+checkOut+"&adultNum="+adultNum+"&childNum="+childNum+"&totalPrice="+totalPrice,
                    success: function (data) {
						if(data == 'SUCC'){
								$("#mess").addClass('alert-success');
								$("#mess").html('<strong>'+data+'</strong> Reservation created.');
								$("#mess").slideDown(500).delay(1000).slideUp(500);
						}else{
							$("#mess").addClass('alert-danger');
							$("#mess").html('<strong>Error</strong>Date is taken. Please try another one.');
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

<script>
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
}
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
}
</script>

        <header id="top">
		<?php 
			if(isset($_SESSION['username'])){
				echo '<a href = "logout.php"><input type="button" value="Logout" class="btn btn-primary btn-lg" style="float:right;margin-top:-50px;margin-right:30px"></a>';
			}else{
			   echo '<a href="log.php"><input type="button" value="Login" class="btn btn-primary btn-lg" style="float:right;margin-top:-50px;margin-right:30px"></a>';
			}
		?>
			<a href="register.php"><input type="button" value="Sign up" class="btn btn-primary btn-lg" style="float:right;margin-right:130px;margin-top:-50px;"></a>
                <center>
                    <img src="images/logo.png" alt="LOGO" id="logo">
                </center>
                <hr>
                
                <a href="rooms.php"><input type="button" value="ROOMS" class="btn btn-primary "></a>
                <a href="skyBar.php"><input type="button" value="SKY BAR" class="btn btn-primary "></a>
                <input type="button" value="RESTAURANT" class="btn btn-primary">
                <a href="swimmingPool.php"><input type="button" value="SWIMMING POOL" class="btn btn-primary"></a>
                <input type="button" value="PANORAMIC SPA"  class="btn btn-primary ">
                <input type="button" value="GYM"  class="btn btn-primary ">     
                <input type="button" value="SKY POOL" class="btn btn-primary">  
                <hr>
            </header>

    <section>
        <a href="index.php">Home</a>
        <a href="hotel.php">Hotel</a>
        <a href="swimmingPool.php">Swimming Pool</a>
        <br>
        <img src="images/" alt="SLIDESHOW">
    </section>

    <article style="margin-left:50px;">
        <h2 style="margin-top:30px;">NEKI NASLOV</h2>
        <p style="max-width:500px;">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>
        <label>SHARE </label>
        <a href="https://facebook.com">
        <img src="images/facebook.png" alt="Facebook" style="margin-left:15px;  width:70px; height:40px;"></a>
        <a href="https://twitter.com">
        <img src="images/twitter.png" alt="Twitter" style="margin-left:10px; width:55px; height:45px;"></a>
        <p style="max-width:500px; margin-top:-200px; margin-left:950px;" >The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum"</p>
        <p style="margin-left:950px;">Follow us on <a href="https://www.facebook.com"><img src="images/facebook.png" alt="Facebook" style="margin-left:15px;  width:70px; height:40px;"></a></p>
    </article>

    <article style="margin-top:80px;">
            <p style="max-width:500px;">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>            
            <img src="images/hotel.jpg" alt="NEKA SLIKA" style="width:700px; height:250px; margin-left:600px; margin-top:-150px;">
    </article>
    
    <img src="images/" alt="SLIDESHOW" style="margin-top:50px;">

    <article style="margin-top:40px;">
        <label>You might also like: </label>
        <input type="button" value="SWIMMING IN THE SKY POOL" style="margin-left:610px;margin-bottom:30px; width:350px;" class="btn btn-outline-danger btn-lg"> <br>
        <input type="button" value="LUNCH UNDER THE ..." style="margin-left:750px;width:350px;"  class="btn btn-outline-danger btn-lg">
    </article>

    <hr style="margin-left:30px;">
    <h2 style="margin-left:30px; font-size:35px;">ABOUT US</h2>
    <label style="margin-left:30px; font-size:27px;">ARTICLES</label>
    <br>
    <img src="images/" alt="slideshow" style="margin-left:30px;">
    <br> <br>
    <h3 style="margin-left:800px; font-size:35px; margin-top:-150px;">AWARDS</h3>
    <table style="margin-left:800px;">
        <tr>
            <th>First</th>
        </tr>
        <tr>
            <th>Second</th>
        </tr>
    </table><br>
    <hr style="margin-left:30px;">
    <footer style="margin-left:30px;">
        <img src="images/logo.png" alt="Logo" style="width:150px; height:100px; margin-left:-20px;">
        <br><br>
        <label>abu</label>
        <label>oba</label>
        <label>sin</label>
        <p style="font-size:20px;">Languages:</p>
        <input type="button" value="ENG">
        <input type="button" value="ARA">
        <input type="button" value="BOS">
        <br><br>
        <label>Done by Oba</label>

        <h3 style="margin-left:300px; margin-top:-270px;">CONTACT</h3>
        <br>
        <label style="margin-left:300px;">Phone <span style="margin-left:255px;">(+387)62896557</span></label> <br>
        <label style="margin-left:300px;">Fax <span style="margin-left:275px;">(+387)33578421</span></label><br>
        <label style="margin-left:300px;">E-mail <span style="margin-left:150px;">obada_almonajed@hotmail.com</span></label><br>

        <input type="email" placeholder="Enter your e-mail" style="margin-top:30px; margin-left:300px; max-width:350px;" class="form-control" > <br> 
        <input type="button" value="SUBSCRIBE" style="margin-left:300px; width:150px; float:left;" class="btn btn-primary btn-lg ">

        <p style="margin-left:870px; margin-top:-240px;">Follow us:</p>
        <a href="https://facebook.com">
        <img src="images/facebook.png" alt="Facebook" style="margin-left:955px; margin-top:-85px; width:70px; height:40px;"></a>
        <a href="https://twitter.com">
        <img src="images/twitter.png" alt="Twitter" style="margin-left:1030px; margin-top:-130px; width:55px; height:45px;"></a>
        <a href="https://youtube.com">
        <img src="images/youtube.png" alt="Youtube" style="margin-left:1100px; margin-top:-178px; width:55px; height:50px;"></a>
        <a href="https://instagram.com">
        <img src="images/instagram.png" alt="Instagram" style="margin-left:1155px; margin-top:-240px; width:75px; height:70px;"></a>
        <br>
        <img src="images/book.jpg" alt="BOOK NOW" style="margin-left:870px; margin-top:-250px; width:350px; height:150px;">
        <input type="button" value="BOOK NOW" style="position:absolute; margin-top:-150px; margin-left:-180px;border:0px;color:white;" class="btn btn-outline-primary ">


    </footer>

</body>
</html>