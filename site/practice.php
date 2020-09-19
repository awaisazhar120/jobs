<?php

$a="Hello, World, How Are You";
echo $a;
$array=explode(",", $a);
echo '<ul>';
foreach($array as $a){
	echo '<li>';
	echo $a;
	echo '</li>';
	
}
echo '</ul>';
?>