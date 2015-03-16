<?php snippet('header') ?>
<? $email = $_POST['email']; ?>
<article>
 <section>

<h2>Please enter your Email address to receive our Newsletter.</h2>
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
		$username = explode('@', $email);
		
		$user = $site->users()->create(array(
	    'username' => $username[0],
	    'email' => $email,
	    'role' => 'newsletter',
	    'password' => 'noneadfadsfadsfdasfwegtjzivvaasd',
	    ));
	  echo "Thank you for subscribing to our newsletter!";
	  
	
	} catch(Exception $e) {
	
	  echo 'The user could not be created';
	  // optional error message: 
	  echo $e->getMessage();
	}
	
}
?>

 </section>
</article>

<?php snippet('footer') ?>




