<?php
$myFile = "testFile.txt";
$fh = fopen($myFile, 'a');
fwrite($fh, "dsfdsf\n");
fclose($fh);
?>
