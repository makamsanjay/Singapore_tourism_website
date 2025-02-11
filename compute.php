<?php

if (isset($_GET['age']) && isset($_GET['retireAT'])) {
    $age      = $_GET['age'];
	$retireAT = $_GET['retireAT'];


    $yearsLeftToWork  =  0;

    echo "<h3 style='color:red'>You have to work &rarr;$yearsLeftToWork&larr; more years.</h3>";
}//end of if isset

?>