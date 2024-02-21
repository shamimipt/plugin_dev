<div class="wrap">
	<h1><?php _e('Edit Address','wpcrud');?></h1>

	<form action="" method="post">
		<table class="form-table">
			<tbody>
			<tr class="row <?php echo $this->has_errors('name') ? 'form-invalid' : '' ;?>">
				<th scope="row">
					<lable for="name"><?php _e('Name','wpcrud');?></lable>
				</th>
				<td>
					<input type="text" name="name" id="name" class="regular-text" value="<?php echo esc_attr( $get_address->name ); ?>">
					<?php
					if ( $this->has_errors('name') ) { ?>
						<p class="description error"><?php echo $this->get_errors('name'); ?></p>
					<?php }
					?>
				</td>
			</tr>
			<tr class="row <?php echo $this->has_errors('address') ? 'form-invalid' : '' ;?>">
				<th scope="row">
					<lable for="address"><?php _e('Address','wpcrud');?></lable>
				</th>
				<td>
					<textarea class="regular-text" name="address" id="address" cols="30" rows="10"><?php echo esc_attr( $get_address->address ); ?></textarea>
					<?php
					if (  $this->has_errors('address') ) { ?>
						<p class="description error"><?php echo $this->get_errors('address'); ?></p>
					<?php }
					?>
				</td>
			</tr>
			<tr class="row <?php echo $this->has_errors('phone') ? 'form-invalid' : '' ;?>">
				<th scope="row">
					<lable for="phone"><?php _e('Phone','wpcrud');?></lable>
				</th>
				<td>
					<input type="text" name="phone" id="phone" class="regular-text" value="<?php echo esc_attr( $get_address->phone ); ?>">
					<?php
					if (  $this->has_errors('phone') ) { ?>
						<p class="description error"><?php echo $this->get_errors('phone'); ?></p>
					<?php }
					?>
				</td>
			</tr>
			</tbody>
		</table>
        <input type="hidden" name="id" id="id" class="regular-text" value="<?php echo esc_attr( $get_address->id ); ?>">
		<?php wp_nonce_field('wpcrud-nonce'); ?>
		<?php submit_button(__('Edit Address','wpcrud'),'primary','submit_address');?>
	</form>
</div>