<?php

require 'vendor/autoload.php';
$result = new WhichBrowser\Parser(getallheaders());
echo $result->toJavascript();
