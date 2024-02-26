<?php
session_start();
if(!$_SESSION['valid_user']){
    header("Location: login.php");
    exit;
} 
?>
<!DOCTYPE html>
<html>
<head>

</head>
<body>

<?php
// remove all session variables
session_unset();

// destroy the session
session_destroy();

// include('scrape_logout/start.php');

header("Location: login.php");
exit;
?>

</body>
</html> 