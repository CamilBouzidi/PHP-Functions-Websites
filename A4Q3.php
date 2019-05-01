
<html>
<head>
    <title>Assignment 4 Question 3</title>
</head>
<body>
    <h1>
        Assignment 4, Question 3 by Camil Bouzidi
        <br />
    </h1>
    <form method="get" action="A4Q3.php">
        <label>
            Last name:
            <input type="text" name="last" />
        </label>
        <br />
        <label>
            Phone number (Should be in format: (ddd)-ddd-dddd):
            <input type="text" name="num" />
        </label>
        <br />
        <input type="submit" value="submit" name="submit" />
    </form>
    <?php
    $last = $_GET["last"];
    $num = $_GET["num"];
	if((preg_match('/^[A-Z][a-z]*$/',$last))&&(strlen($last))){?>
    <p>The format for the last name is correct!</p><?php }else{?>
    <p>The format for the last name is incorrect. Please try again.</p><?php }
	if (preg_match('/^[(]\d{3}[)]\-\d{3}\-\d{4}/',$_GET["num"])){?>
    <p>The format for the phone number <?php  is correct!</p><?php }else{?>
    <p>The format for the phone number is incorrect. Please try again.</p><?php }
    ?>
</body>
</html>