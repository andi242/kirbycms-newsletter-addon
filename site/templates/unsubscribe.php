<?php snippet('header') ?>
<? $email = $_POST['email']; ?>
<article>
 <section>

<h2><? echo l::get('headerunsubscr') ?></h2>
<? if(!v::email($email)) {
  echo l::get('validemail');
  $email ="";
} ?>

<? if (empty($email)) { ?>

<!-- email form -->
		
		<center>
		<form action="<?php echo $PHP_SELF ?>" method="post">
			<input type="text" name="email" value="" />
			<input class="btn btn-rounded btn-submit" type="submit" value="<? echo l::get('submit') ?>">
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
		echo l::get('deleteunsubscr');
		
		} catch(Exception $e) {
		echo l::get('error');
		// optional reason: 
		echo $e->getMessage();
		}	
	}
?>

 </section>
</article>

<?php snippet('footer') ?>




