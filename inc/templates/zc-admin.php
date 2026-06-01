<h3>Theme Options</h3>
<?php settings_errors(); ?>
<form method="post" action="options.php">
    <?php
        settings_fields( 'zc-contact-info-group' );
        do_settings_sections( 'theme_options' );
        submit_button();
    ?>
</form>
