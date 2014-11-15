<html>
<head>
<title>QuoteRush: Loader</title>
<link rel='stylesheet' type='text/css' href='header.css'>
<center>
<?php

	$qCheck = false;
	$sCheck = false;
	
	if(isset($_POST['submit']))
		{
			if($_POST['quote'] == NULL)
				$qCheck = true;
				
			else
				$qCheck = false;
				
			if($_POST['name'] == NULL)
				$sCheck = true;
				
			else
				$sCheck = false;
		}
	
	if(isset($_POST['submit']) && $qCheck == false && $sCheck == false)
		{
			$con = mysql_connect("107.170.89.145","root","athens");
			
			if (!$con)
			{
				die('Could not connect: ' . mysql_error());
			}

			mysql_select_db("quoterush", $con);

			mysql_query("INSERT INTO vampire_diaries (quote, name)
			VALUES ('".$_POST['quote']."', '".$_POST['name']."')");

			mysql_close($con);
		}
			
?>
</head>


<body background="bg.png" style="background-size:100%">
<br><br><br>
<td style = 'text-align:center;'>
		<h1><b>QuoteRush Loader</b><u>QuoteRush Loader</u></h1>
	</td>
	<form action = "insert.php" method = "post">
	Quote
	<textarea placeholder="Enter Quotes Here..." name = "quote" cols = "40" rows = "6" ><?php  if($qCheck) echo "Enter a quote"; ?></textarea></br></br>
	Name
	<input type = "text" name = "name"><?php if($sCheck) echo "Enter a name"; ?></br>
	<input type = "submit" name = "submit" value="Add quote">
	</form>
<form action = "print.php" method = "post">
		<input type = "submit" name = "submit" value="Write My Code">
	</form>
</body>
</html>