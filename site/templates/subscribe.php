<?php snippet('header') ?>
<?PHP $email = $_POST['email']; ?>
<article>
 <section>

<h2><?PHP echo l::get('headersubscr') ?></h2>
<?PHP if(!v::email($email)) {
  echo l::get('validemail');
  $email ="";
} ?>

<?PHP if (empty($email)) { ?>

<!-- email form -->
		
		<center>
		<form action="<?php echo $PHP_SELF ?>" method="post">
			<input type="text" name="email" value="" />
			<input class="btn btn-rounded btn-submit" type="submit" value="<?PHP echo l::get('submit') ?>">
		</form>
		</center>
<!-- end email form -->
<?PHP } ?>
<?PHP 
if (!empty($email)) {
	try {
		$username = explode('@', $email);
		
		$user = $site->users()->create(array(
	    'username' => $username[0],
	    'email' => $email,
	    'role' => 'newsletter',
	    'password' => 'noneadfadsfadsfdasfwegtjzivvaasd',
	    ));
	  echo l::get('thanks');
	  
	
	} catch(Exception $e) {
	
	  echo l::get('error');
	  // optional error message: 
	  echo $e->getMessage();
	}
	
}
?>

 </section>
</article>

<?php snippet('footer') ?>




