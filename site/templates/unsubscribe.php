<?php snippet('header') ?>
<? $email = $_POST['email']; ?>
<article>
 <section>

<h2>Please enter your Email address to unsubscribe from our newsletter.</h2>
<? if(!v::email($email)) {
  echo 'Please enter a valid email.';
  $email ="";
} ?>

<? if (empty($email)) { ?>

<!-- email form -->
		
		<center>
		<form action="<?php echo $PHP_SELF ?>" method="post">
			<input type="text" name="email" value="" />
			<input class="btn btn-rounded btn-submit" type="submit" value="enter">
		</form>
		</center>
<!-- end email form -->
<? } ?>
<? 
if (!empty($email)) {
	try {
		// not working at this time, issue here with selecting user by email
		$username = explode('@', $email);
		$site->user($username[0])->delete();
		echo 'The email address has been deleted<br>';
		
		} catch(Exception $e) {
		echo 'The user could not be deleted<br>';
		// optional reason: 
		echo $e->getMessage();
		}	
	}
?>

 </section>
</article>

<?php snippet('footer') ?>




