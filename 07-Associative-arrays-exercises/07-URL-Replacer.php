<?php
$text = trim(fgets(STDIN));
$openTagRegex = "/<a\s+(?:[^>]*?\s+)?href=\"([^\"]*)\">/g";
$closeTagRegex = "/<\/a>/g";

preg_replace($openTagRegex, "");