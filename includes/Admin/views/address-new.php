<div class="wrap">
	<h1><?php _e('Add New Address','wpcrud');?></h1>

    <form action="" method="post">
        <table class="form-table">
            <tbody>
            <tr>
                <th scope="row">
                    <lable for="name"><?php _e('Name','wpcrud');?></lable>
                </th>
                <td>
                    <input type="text" name="name" id="name" class="regular-text" value="">
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <lable for="address"><?php _e('Address','wpcrud');?></lable>
                </th>
                <td>
                    <textarea class="regular-text" name="address" id="address" cols="30" rows="10"></textarea>
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <lable for="phone"><?php _e('Phone','wpcrud');?></lable>
                </th>
                <td>
                    <input type="text" name="phone" id="phone" class="regular-text" value="">
                </td>
            </tr>
            </tbody>
        </table>
        <?php wp_nonce_field('wpcrud-nonce'); ?>
        <?php submit_button(__('Add Address','wpcrud'),'primary','submit_address');?>
    </form>
</div>