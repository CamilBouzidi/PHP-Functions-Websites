<?php
    require("A4Q4Top.php");
    $userOk = FALSE;
    $pwOk = FALSE;
        if (isset($_POST["submit"])){
            if ((isset($_POST["user"]))&&(isset($_POST["password"]))){
                $user = $_POST["user"];
                $pw = $_POST["password"];
                if ((preg_match('/[A-Za-z]*/',$user))&&(preg_match('/\d*/',$user))&&(preg_match('/[^\W\_]/',$user))){
                    $_SESSION["user"]=$user;
                    $userOk = TRUE;
                }else
                    echo "The username you have entered does not meet the conditions. Please go back and try again.";
                if ((preg_match('/[A-Za-z]+/',$pw))&&(preg_match('/[0-9]+/',$pw))&&(preg_match('/[^\W\_]/',$pw))&&(strlen($pw)>=6)){
                    $_SESSION["pw"]=$pw;
                    $pwOk = TRUE;
                }else
                    echo "The password you have entered does not meet the conditions. Please go back and try again.";
            }
        }else
            echo "Please enter a valid username and password below";
        $single = file_get_contents("login.txt");
        $list = explode("\n",$single);
    if (($userOk)&&($pwOk)){
        $inFile=false;
        $toCheck = $_SESSION["user"].":".$_SESSION["pw"];
        foreach ($list as $key=>$val){
            trim($val);
            if ($toCheck == $val){
                echo "A match was found! You will be returned to the menu with the username ".$_SESSION["user"].". Click here to be redirected back to the search page: ";
                $inFile=true;
                $_SESSION["inFile"]=$inFile;
                ?><a href="A4Q4.php"><input type="button" name="backToSearch" value="Take me back to the search menu!" /></a><?php
                break;
            }
        }
        if ($inFile==false){
            echo "Your username and password were in the correct format, but they were not in our database. Adding them now...";
            $toWrite = fopen("login.txt","a"); //appending to list of existing user:password combinations
            fwrite($toWrite,$toCheck."\n");
            fclose($toWrite);
            $inFile==true;
            $_SESSION["inFile"]=$inFile;
            ?><a href="A4Q4.php"><input type="button" name="backToSearch" value="Take me back to the search menu!"/></a><?php
        }
    }
?>
<form method="POST">
    <label>Enter your usernname:
        <input type="text" name="user" />
    </label><br/>

    <label>
        Enter your password:
        <input type="text" name="password" />
    </label><br />
    <input type="submit" name="submit" value="Login" method="post"/>
</form>
<p>Your username can only have the following: </p>
<ul>
    <li>Letters (uppercase and lowercase)</li>
    <li>Digits</li>
</ul>
<p>Your password must: </p>
<ul>
    <li>Be at least 6 characters long</li>
    <li>Only be comprised of letters and digits</li>
    <li>Must have at least one letter and one digit</li>
</ul>
<?php
    require("A4Q4Bot.php");
?>