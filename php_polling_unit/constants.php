<?php
	
session_start();
 	
define("DBHOST", "sql109.epizy.com");
define("USERNAME", "epiz_28246274");
define("PASSWORD", "zYjQSa3K6Ac");
define("DBNAME", "epiz_28246274_bincom_polling");


$conn = mysqli_connect(DBHOST, USERNAME, PASSWORD, DBNAME) or die(mysql_error());