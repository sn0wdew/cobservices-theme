<h1>Home Page Settings</h1>
<p>Description here</p>

<?php settings_errors(); ?>
<form action="options.php" method="post">
  <?php settings_fields('cob-services-settings-home-group'); ?>
  <?php do_settings_sections('cob_theme_create_home_page') ?>
  <?php submit_button() ?>
</form>
