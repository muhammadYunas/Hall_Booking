<?php $title = 'Contact'; ?>
<header>
  <?php include("include/header.php");?>
</header>

<section class="mg-top-30 mg-bottom-30">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<div class="text-center mg-top-30">
			    	<h1 class="text-uppercase">Contact Form</h1>
			    	<div class="green-line"></div>
			    </div>

				<form action="" method="post">
					<div class="form-group">
						<input type="text" name="name" class="form-control" placeholder="Name">
					</div>
					<div class="form-group">
						<input type="text" name="email" class="form-control" placeholder="Email" id="txtEmail">
					</div>
					<div class="form-group">
						<textarea class="form-control" name="message" placeholder="Enter Your Message"></textarea>
					</div>
					<input type="submit" value="Send" class="btn btn-primary" name="send">
				</form>
			</div>
		</div>
	</div>
</section>
<hr>
<?php include("include/footer.php");?>
<?php
if(isset($_POST["send"]))
	{
$myemail = 'donboklari@gmail.com';
if(empty($_POST['name'])  || empty($_POST['email']) || empty($_POST['message']))
{
    echo "<script>alert('All Field Required')</script>";
	return;
}
$name = @trim(stripslashes( $_POST["name"]));
$email_address =@trim(stripslashes($_POST["email"]));
$message = @trim(stripslashes($_POST["message"]));
if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i",$email_address))
{
   echo "<script>alert('Invalid email address')</script>";
   return;
}

	else
		{
			$to = $myemail;
			$email_subject = "Contact From Client: $name";
			$email_body = "You have received a new message. "." Details:\n Name: $name \n "."Email: $email_address\n Message \n $message";
			$headers = "From: $myemail\n";
			$headers .= "Reply-To: $email_address";
			mail($to,$email_subject,$email_body,$headers);
			echo "<script>alert('Email Send')</script>";
		}
}
?>