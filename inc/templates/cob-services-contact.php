<h1>Contact Page Settings</h1>
<?php settings_errors(); ?>
<form action="options.php" method="post">
  <?php settings_fields('cob-services-settings-contact-group'); ?>
  <?php do_settings_sections('cob_theme_create_contact_page') ?>
  <?php submit_button() ?>
</form>
