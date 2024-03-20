<div class="wpcrud-enquiry-form" id="wpcrud-enquiry-form">
	<form action="" method="post">

		<div class="form-row">
			<label for="name"><?php _e('Name','wp-crud');?></label>
			<input type="text" id="name" name="name" value="" required>
		</div>

		<div class="form-row">
			<label for="email"><?php _e('Email','wp-crud')?></label>
			<input type="email" id="email" name="email" value="" required>
		</div>

		<div class="form-row">
			<label for="message"><?php _e('Message', 'wp-crud'); ?></label>
			<textarea name="message" id="message" cols="30" rows="10"></textarea>
		</div>

		<div class="form-row">

			<?php wp_nonce_field('wd-ac-enquiry-form-1'); ?>

			<input type="hidden" name="action" value="wp_crud_enquiry">
			<input type="submit" name="send_enquiry" value="<?php esc_attr_e('Send Enquiry','wp-crud');?>">
		</div>

	</form>
</div>