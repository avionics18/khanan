<!DOCTYPE html>
<html lang="en">
<html>
<head>
	<title>Khanan '19 | Register</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="shortcut icon" href="img/logo.png">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  	<link rel="stylesheet" type="text/css" href="css/style.css">
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>
<body>

<?php

	error_reporting(-1);
	ini_set('display_errors', 'On');
	set_error_handler("var_dump");
	
	$conn = mysqli_connect("localhost","root","bringit1","khanan") or die("Failed to connect ".mysqli_connect_error());

	if (isset($_POST['submit'])) {

		$name = mysqli_real_escape_string($conn , $_POST['name']);
		$email = mysqli_real_escape_string($conn , $_POST['email']);
		$contact = mysqli_real_escape_string($conn , $_POST['contact']);
		$college = mysqli_real_escape_string($conn , $_POST['college']);
		$bny = mysqli_real_escape_string($conn , $_POST['bny']);
		$event = $_POST['event'];
		$size = $_POST['tees'];

		$events = implode(",", $event);
		
		$query = "INSERT INTO registration(Name,Email,Contact,College,BranchYear,Size,Events) VALUES('$name','$email','$contact','$college','$bny','$size','$events')";

		if (!mysqli_query($conn,$query)) {
			echo "Error ".mysqli_error($conn);
		}
		else{
		    $to      = $email;
            $subject = 'Khanan 2018 registration confirmation';
            $message_body ="Hello ".$name.",\n\nThank you for registering with us in the events ".$events.".\nWe are looking forward to see you in the upcoming events.\n\nTo stay updated follow our facebook page https://www.facebook.com/Khananiitism/.\n\nBest Regards\nTeam Khanan\nIIT(ISM) Dhanbad";
    
               
    
            $sent = mail( $to, $subject, $message_body );
            
            if($sent){
               echo "<script>alert('Thank you for registering for Khanan 19. A confirmation message has been sent to your email id.');</script>"; 
            }
            
			
		}

	}

?>

<div class="register">
	<div class="container">
		 <div class="row">
		 	<div class="col-md-6 text-center">
			 	<h1 style="color: #ffffff;">REGISTER</h1>
			 	<img src="img/my/logo.png" class="img-fluid" width="50%">
			 	<p class="lead">Venues and schedules will be updated later</p>
			 	<p class="lead">Like our facebook page for more updates:</p>
			 	<a href="https://www.facebook.com/pg/Khananiitism" target="_blank"><img src="https://img.icons8.com/color/48/000000/facebook-circled.png"></a>
			 </div>
			 <div class="col-md-6" id="regform">
			 	<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" autocomplete="off" method="post">
			 		  <div class="form-group">
						  <label for="usr">Name:</label>
						  <input type="text" class="form-control" id="usr" name="name" required>
					  </div>
					  <div class="form-group">
						    <label for="email">Email address:</label>
						    <input type="email" class="form-control" id="email" name="email" required>
					  </div>
					  <div class="form-group">
						  <label for="cn">Contact Number:</label>
						  <input type="text" class="form-control" id="cn" name="contact" required>
					  </div>
					  <div class="form-group">
						  <label for="inst">College/Institute Name:</label>
						  <input type="text" class="form-control" id="inst" name="college" required>
					  </div>
					  <div class="form-group">
						  <label for="bny">Branch & Year:</label>
						  <input type="text" class="form-control" id="bny" name="bny" required>
					  </div>
					  <div class="form-group">
								  <label for="sel1">Select T-Shirt Size:</label>
								  <select class="form-control" id="sel1" name="tees">
								    <option>S</option>
								    <option>M</option>
								    <option>L</option>
								    <option>XL</option>
								    <option>XXL</option>
								  </select>
								</div>
					  <p><b>Select Events to Register:</b></p>
					  <div class="form-group">
					  			<div class="form-check">
								  <label class="form-check-label">
								    <input type="checkbox" class="form-check-input" value="Ideate" name="event[]">Ideate
								  </label>
								</div>
								<div class="form-check">
								  <label class="form-check-label">
								    <input type="checkbox" class="form-check-input" value="Nirvana" name="event[]">Nirvana
								  </label>
								</div>
								<div class="form-check">
								  <label class="form-check-label">
								    <input type="checkbox" class="form-check-input" value="Topographia" name="event[]">Topographia
								  </label>
								</div>
								<div class="form-check">
								  <label class="form-check-label">
								    <input type="checkbox" class="form-check-input" value="Robotica" name="event[]">Robotica
								  </label>
								</div>
								<div class="form-check">
								  <label class="form-check-label">
								    <input type="checkbox" class="form-check-input" value="Placement Fever" name="event[]">Placement Fever
								  </label>
								</div>
								<div class="form-check">
								  <label class="form-check-label">
								    <input type="checkbox" class="form-check-input" value="Quizzine" name="event[]">Quizzine
								  </label>
								</div>
								<div class="form-check">
								  <label class="form-check-label">
								    <input type="checkbox" class="form-check-input" value="Minnovare" name="event[]">Minnovare
								  </label>
								</div>
								<div class="form-check">
								  <label class="form-check-label">
								    <input type="checkbox" class="form-check-input" value="Tresure Hunt" name="event[]">Khanan Mafia 2.0
								  </label>
								</div>
								<div class="form-check">
								  <label class="form-check-label">
								    <input type="checkbox" class="form-check-input" value="IDP" name="event[]">IDP
								  </label>
								</div>
								<div class="form-check">
								  <label class="form-check-label">
								    <input type="checkbox" class="form-check-input" value="Gamicon" name="event[]">Gamicon
								  </label>
								</div>
								<div class="form-check">
								  <label class="form-check-label">
								    <input type="checkbox" class="form-check-input" value="Workshop" name="event[]">Workshop
								  </label>
								</div>

						</div>
					  <button type="submit" class="btn btn-dark" name="submit">Submit</button>
				</form>
			 </div>
		 </div>
	</div>
</div>

<script>
   $('input[type=checkbox]').change(function(e){
   if ($('input[type=checkbox]:checked').length > 6) {
        $(this).prop('checked', false)
        alert("Maximum 6 events allowed!");
   }
});

   $(document).ready(function(){
    $("form").submit(function(){
		if ($('input:checkbox').filter(':checked').length < 1){
        alert("Select atleast 1 event!");
		return false;
		}
    });
});

</script>

</body>
</html>