
<?php


if (ini_get('safe_mode')) {
    echo 'safe_mode is ON';
}
else{
    echo  'safe_mode is OFF';
}
	 phpinfo();
?>