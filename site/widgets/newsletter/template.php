<div class="field">

Choose your post to be sent as newsletter.

<form action="<?php echo page('newsletter')->url(); ?>" method="post">
	<div class="field-content">
		<div class="input input-with-selectbox" data-focus="true">
			<div class="selectbox-wrapper">
				<select class="selectbox" name="selectpost">
					<? foreach(page('blog')->children()->visible()->sortBy('date', 'desc')->limit(5) as $entry): ?>
						<option value="<?echo $entry->uri(); ?>"><?echo $entry->title(); ?></option>
					<? endforeach; ?>
				</select>
			</div>
		</div>
		<div class="field-icon"><i class="icon fa fa-chevron-down"></i>
	</div>
	</div>
	<center><input class="btn btn-rounded btn-submit" type="submit" value="send"></center>
</form>

</div>