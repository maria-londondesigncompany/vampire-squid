<?php

add_action ('acf/init', function () {
  require_once __DIR__ . '/acf/anchor.php';
  require_once __DIR__ . '/acf/buttons.php';
  require_once __DIR__ . '/acf/background_options.php';
  require_once __DIR__ . '/acf/flexible_content.php';
  require_once __DIR__ . '/acf/template_default.php';
  require_once __DIR__ . '/acf/options.php';
});

