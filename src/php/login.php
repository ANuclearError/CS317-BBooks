<?php

include("connect.php");

if (isset($_GET['email']) && isset($_GET['password'])) {     
    $result = mysql_query("SELECT * FROM users WHERE email = '{$_GET['email']}' AND password = '{$_GET['password']}'") or die(mysql_error());
    if($row = mysql_fetch_array($result)) {
		session_start();
		$_SESSION['id'] = $row[0];
        echo "{ 'ID': '{$row[0]}', 'firstname': '{$row[1]}', 'surname': '{$row[2]}', '{$row[3]}' '{$row[4]}' '{$row[5]}' '{$row[6]}";
    }
	else echo "err-wrongdata";
} else {
    if (!isset($_GET['email']) && !isset($_GET['password']))
		echo "err-nodata";
	else if (!isset($_GET['email']))
		echo "err-noemail";
	else if (!isset($_GET['password']))
		echo "err-nopw";
}
?>