<?php

include_once 'config/settings.php';
include_once 'lib/lib.php';

print_info("Installing Remora Version ".VERSION);

// Establish a db connection
$conn = db_init();

print_info("Installation completed successfully");

?>