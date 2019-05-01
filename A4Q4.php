<?php 
//Assignment 4 Question 4 by Camil Bouzidi, SOEN 287 April 14th 2019
require("A4Q4Top.php");
if (!empty($_SESSION["user"])){ //If the user is logged in, show their name. ?> 
    <label class="login">Welcome, <?php echo $_SESSION["user"]; ?><a href="login.php"><input type="button" class="login" name="login" value="Login here!"/></a></label>  
<?php } else { ?>
    <a href="login.php"><input type="button" class="login" name="login" value="Login here!"/></a>
<?php }
if(empty($_POST["Search"])){ //If the user hasn't searched anything yet, show this message.
    echo "Please fill out the form below. The search result will appear below the \"Search\" and \"Start Over\" buttons. <br/>To log out, you need to close your browser and reload the page.";
}

function checking(){//This is the function that looks for a result depending on the user's preferences and whether or not they are logged in.
    $anyMatch = false; //Variable used to check if any matches have been found.
    $isArray = is_array($_POST["location"]);//If the user tried to search multiple areas, will create an array of areas. If not, single variable used.
    if ($isArray)
        $ctr = count($_POST["location"]);
    else
        $ctr = 0;

    for ($i=0; $i<$ctr;$i++){//Iterates over the number of areas/locations chosen.
        if($isArray)
            $loc = $_POST["location"][$i];
        else
            $loc = $_POST["location"];
        $hotelsLong = file_get_contents("hotels.txt");
        $list = explode("\n",$hotelsLong); //Returns a list of the lines in the .txt file. I had a problem with the file("hotels.txt") method and the end of each line, which is why I used file_get_contents and explode.
        $inList = array (count($list));
        foreach($list as $key=>$val){
            $list[$key] = explode("/",$val); //List becomes a 2D array: D1 is the location, which D2 is the feature.
            $list[$key][4] = explode(",",$list[$key][4]); //This is the only position with 3rd dimension, used to store preffered facilities.
            if ($list[$key][1]==$loc){
                $inList[$key]=true;
            }
            else{
                $inList[$key]=false;
            }

            if($inList[$key]){
                $sameoptions = true;
                $allFacilities=$list[$key][4];
                if (!empty($_POST["facility"])){//Checks if the preferred facilities are in the list of the current hotel's facilities.
                    foreach ($_POST["facility"] as $index=>$fac){
                        if(!in_array($fac,$allFacilities)){
                            $sameoptions=false;
                            break;
                        }
                    }   
                }
                $samePrice=false;
                $price = $_POST["pRange"];
                //echo "price of hotel being looked at is: ".$list[$key][5];
                //echo "the price wanted is : ".$price;
                if(($list[$key][5]==$price)||($price=="no limit")){//Checks if the price is the same, or if the user doesn't care about the price range.
                    $samePrice=true;
                }

                $roomsOK = false;
                if($list[$key][3]>=$_POST["numRooms"]){//Checks if the number of rooms available in the hotel is greater or equal to the user's desired number of rooms.
                    $roomsOK=true;
                }

                if (($sameoptions)&&($samePrice)&&($roomsOK)){
                    $anyMatch=true;
                    $name = $list[$key][0];
                    $address = $list[$key][2];
                    $rooms = $list[$key][3];
                    $price = $list[$key][5];
                    //for user, prints out the required information
                    if(!empty($_SESSION["user"])){
                        echo "The hotel called $name in the region $loc at address $address, has $rooms rooms available, costs $price per night and has the following facilities: ";
                        foreach ($allFacilities as $op=>$opName){
                            echo $opName;
                            if($op!=(count($allFacilities)-1)){
                                echo ", ";
                            }
                            if($op==(count($allFacilities)-1))
                                echo ".<br/>";
                        }
                    }else{
                        //for non user, only prints out the location and a sign-in button
                        echo "A hotel in the region $loc matches your preferences! To see it, you'll have to log in: ";
                        ?> <a href="login.php"><input type="button" name="loginToSee" value="Go to login page" /></a> <?php
                    }
                }
            }
        }   
    }
    if ($anyMatch==false){//If not matches have been found.
        echo "Sorry, but we couldn't find any hotel with your preferences. Please try again.";
    }
}
?>
<p><br /><br/></p>
<form action="" name="frm" method="post">
	<fieldset class="col1">
		<legend class="col1">Reservation Information</legend>
			<label class="warning">Number of Rooms (maximum: 5 people per room):</label>
			<input type="number" name="numRooms" />
			<br /><br />
			<label class="warning">Smoker?</label>
			<label class="warning"><input type="radio" name="smoker" value="yes" />Yes</label>
			<label class="warning"><input type="radio" name="smoker" value="no" checked />No</label>
			<br /><br />
			<label class="warning">Check-in Date:</label>
			<input type="text" name="checkin" />
			<br /><br />
			<label class="warning">Check-out Date:</label>
			<input type="text" name="checkout" />
			<br /><br />
	</fieldset>

	<fieldset class="col2">
		<legend class="col2">Room Specifications (Location, price range, and special facilities options absolutely need to be filled).</legend>
		<ul>
			<li>
				<label class="warning">Number of single/double beds:</label><br />
				<label><input type="checkbox" name="bedTypes" value="0/2" />0/2 </label>
				<label><input type="checkbox" name="bedTypes" value="2/0" />2/0 </label>
				<label><input type="checkbox" name="bedTypes" value="1/1" />1/1 </label>
				<label><input type="checkbox" name="bedTypes" value="2/1" />2/1 </label>
				<label><input type="checkbox" name="bedTypes" value="1/2" />1/2 </label>
				<br /><br />
			</li>
			<li>
				<label class="warning">Do you have any preferred locations for the hotel?</label><br />
				<label><input type="checkbox" name="location[]" value="Downtown" checked id="dtown" />Downtown </label>
				<label><input type="checkbox" name="location[]" value="Montreal East" />Montreal East </label>
				<label><input type="checkbox" name="location[]" value="Montreal West" />Montreal West </label>
				<label><input type="checkbox" name="location[]" value="Near the airport" />Near the airport </label>
				<label><input type="checkbox" name="location[]" value="Oldport" />Oldport </label>
				<label><input type="checkbox" name="location[]" value="Don't care" />Don't care </label>
				<br /><br />
			</li>
			<li>
				<label class="warning">Price Range/night:</label><br />
				<select name="pRange">
					<option value="no limit" >No price limit</option>
					<option value="less 50$">Less than 50$</option>
					<option value="50$ to 80$" id="50to80">50$-80$</option>
					<option value="80$ to 100$" id="80to100">80$-100$</option>
					<option value="100$ to 120$">100$-120$</option>
				</select>
				<br /><br />
			</li>
			<li>
			<label class="warning">Number of Private Parking Spots:</label><br />
			<label><input type="radio" name="parking" value="0" checked />0</label><br />
			<label><input type="radio" name="parking" value="1" />1</label><br />
			<label><input type="radio" name="parking" value="2" />2</label><br />
			<label><input type="radio" name="parking" value="3" />3</label><br />
			<label><input type="radio" name="parking" value="4" />4</label><br />
			<label><input type="radio" name="parking" value="5" />5</label>
			<br /><br />
			</li>
			<li>
				<label class="warning">Special Facilities: </label><br />
				<label><input type="checkbox" name="facility[]" value="minibar" checked />Minibar </label>
				<label><input type="checkbox" name="facility[]" value="balcony" />Balcony </label>
				<label><input type="checkbox" name="facility[]" value="pool" />Pool </label>
				<label><input type="checkbox" name="facility[]" value="water front" />Water Front </label>
				<label><input type="checkbox" name="facility[]" value="garden front" />Garden Front </label>
				<label><input type="checkbox" name="facility[]" value="game room" />Game Room </label>
			</li>
		</ul>
	</fieldset>

	<!--<fieldset id ="res" class="sug">
		<legend class="sugleg">Expert Suggestion</legend>
		<ul>
			<li>It could be hard to find a hotel room in this price range Downtown.</li>   
		</ul>
	</fieldset>-->
	<p>Let's see what we can find for you!</p>
	<input type="submit" name="Search" value="Search" onclick="expSuggesAppear()" />
	<input type="reset" name="Start Over" value="Start Over" />
    <br/><br/>
</form>
<?php
if(!empty($_POST["Search"])){
    checking();
}
require("A4Q4Bot.php");
?>