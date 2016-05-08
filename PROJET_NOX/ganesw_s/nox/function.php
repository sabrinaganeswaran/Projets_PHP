<?php
function my_explode($string, $element)
{
	$delimiter = "/([\s*|,|;|.|!|?|:|\"|@]+)/";
	return (preg_split($delimiter, $element));
}
?>