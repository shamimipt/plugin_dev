<div class="wrap">
	<h1 class="wp-heading-inline"><?php _e('Address Book','wpcrud');?></h1>
    <a href="<?php echo admin_url('admin.php?page=wp-crud&action=new'); ?>" class="page-title-action"><?php _e('Add New','wpcrud');?></a>

    <?php
        $table = new \Shamimipt\WpCrud\Admin\Address_List();
        $table->prepare_items();
        $table->display();

    ?>
</div>