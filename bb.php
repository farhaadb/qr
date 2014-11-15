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
			$con = mysql_connect("127.0.0.1","root","athens");
			
			if (!$con)
			{
				die('Could not connect: ' . mysql_error());
			}

			if(!mysql_select_db("quoterush", $con))
			{
				echo "select db error ".mysql_error($con);
			}

			if(!mysql_query("INSERT INTO breaking_bad (quote, name)
			VALUES ('".$_POST['quote']."', '".$_POST['name']."')"))
			{
				echo "query error ".mysql_error($con);
			}

			mysql_close($con);
		}
			
?>
</head>


<body background="img/bg/bb.jpg" style="background-size:100%">
<br><br><br>
<td style = 'text-align:center;'>
		<h1><b>Quote Mine</b><u>Quote Mine</u></h1>
	</td>
	<form action = "bb.php" method = "post">
	Quote
	<textarea placeholder="Enter Quotes Here..." name = "quote" cols = "40" rows = "6" ><?php  if($qCheck) echo "Enter a quote"; ?></textarea></br></br>
	Name
	<input type = "text" name = "name"><?php if($sCheck) echo "Enter a name"; ?></br>
	<input type = "submit" name = "submit" value="Add quote">
	</form>

</body>
</html>