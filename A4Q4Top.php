<?php
//Assignment 4 Question 4 Header by Camil Bouzidi
//It contains not only the header, but the start of the HTML code and the needed CSS for all of the pages.
session_start();?>
<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<style>
				body {background-color: lightblue;}
				.headerfooter{background-color: pink; color: green;}
                .login{float: right; width: 100px; height: 50px;}
				.col1 {border-color: #004060; color: #00a9ff; background-color: #004060;}
				.col2 {border-color: #ff96df; color: #ffddfa; background-color: #ff96df;}
				label.warning {font-weight: bold;}
				legend {font-size: 20px}
                .sug{
                    visibility: hidden;
                    background-color: mediumpurple;
                    color: orange;
                }
                .sugleg{
                    background-color: mediumpurple;
                    color: orange;
                }
				
				
		</style>
        <script type="text/javascript" src="A4Q4.js">
			clock();
		</script>
		<title>Assignment 4: Question 4</title>
	</head>
	
	<body>
			<div class="headerfooter">
				<table>
				<tr>
					<td><a href="A4Q4.php"><img src="https://s3-eu-west-2.amazonaws.com/folio-website-images/content/uploads/2018/07/25093042/James-Gilleard-Grand-Budapest.jpg" alt="Hotel Image" width="200" height="200"></a></td>
					<td><h1>Hotel Reservation Form (by Camil Bouzidi)</h1></td>
				</tr>
				</table>
				<h2 id="dateVar"></h2>
			</div>
            <hr/>