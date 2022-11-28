<?php


function restock($itemCount, $target,$n){
	for($i =0;$i<$n; $i++){
		$target-=$itemCount[$i];
	}

	echo $target;

	
}

$item = array(20,1,20,10,1);

restock($item,100,2);