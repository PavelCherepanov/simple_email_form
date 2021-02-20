<?php 
	$error = "";
	$successMessage = "";

	if ($_POST){
		
		if(!$_POST["email"]){
			$error .= "Email обязателен<br>";
		}

		if(!$_POST["subject"]){
			$error .= "Тема обязателена<br>";
		}

		if(!$_POST["text_mess"]){
			$error .= "Текст сообщения обязателен<br>";
		}

		if (!$_POST["email"] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
  			$error .= "Email не верный<br>";
		}

		if ($error != ""){
			$error = '<div class="alert alert-danger" role="alert"><p>У вас ошибка:</p>' . $error . '</div>';
		} else{
			$emailto = $_POST["email"];
			$subject = $_POST["subject"];
			$text = $_POST["text_mess"];
			$headers = "From: ".$_POST["email"];

			if (mail($emailTo, $subject, $text, $headers)){
				$successMessage = '<div class="alert alert-success" role="alert"><p>Ваше сообщение было отправлено</p></div>';
			} else {
				$error = '<div class="alert alert-danger" role="alert"><p>Ваше сообщение не было отправлено</p></div>';
			}
		}
	}
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">


    <title>Send Email</title>
  </head>
  <body>
  	<div class="container">
    	<h1>Напиши свою почту!</h1>
    	<div id="error"><? echo $error.$successMessage; ?></div>
		<form method="post">
		  <div class="mb-3">
		    <label for="email" class="form-label">Email</label>
		    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
		    <div id="emailHelp" class="form-text">Мы никому не скажем ваш email.</div>
		  </div>
		  <div class="mb-3">
		    <label for="subject" class="form-label">Тема</label>
		    <input type="text" class="form-control" id="subject" name="subject">
		  </div>
		  <div class="mb-3">
		    <label for="text_mess" class="form-label">Текст сообщения</label>
		    <textarea id="text_mess" class="form-control" rows="3" name="text_mess"></textarea>
		  </div>
		  <button type="submit" class="btn btn-primary">Отправить</button>
		</form>



    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>


    <script type="text/javascript">
    	
    	$("form").submit(function(e){
    		var error = "";

    		if ($("#email").val() == ""){
    			error += "Email обязателен<br>";
    		}

    		if ($("#subject").val() == ""){
    			error += "Тема письма обязательна<br>";
    		}

    		if ($("#text_mess").val() == ""){
    			error += "Текст письма обязателен<br>";
    		}

    		if (error != ""){
    			$("#error").html('<div class="alert alert-danger" role="alert"> <p>У вас ошибка:</p>' + error + '</div>');
    				return false;
    		}

    		else {
    			$("#error").css("display", "none");
    			return true;
    		}
    	});

    </script>

  </body>
</html>