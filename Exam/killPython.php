
<?php
$pid=$_POST['pid'];
 
		  
	    echo shell_exec("python killing.py ".$pid);
 
	 
?>
