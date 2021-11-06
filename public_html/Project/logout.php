<?php
session_start();
require(__DIR__ . "/../../lib/functions.php");
reset_session();
die(header("Location: login.php"));
flash("Successfully logged out", "success");
?>
<?php
require(__DIR__ . "/../../partials/flash.php");
?>