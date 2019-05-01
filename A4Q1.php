<html>
 <head>
  <title>Assignment 4 Question 1</title>
 </head>
 <body>
     <h1>Assignment 4, Question 1 by Camil Bouzidi</h1>
     <?php
 function findSummation($x){
	if (!is_numeric($x)||($x<0)){//the variable is not a valid number
		echo "$x is not a positive number.";
		return FALSE;
	}
		$sum=0;
		while($x>=0){
			$sum+=$x;
			$x--;
		}
		return $sum;
 }

 function uppercaseFirstandLastSorted(String $s){
	$arr = explode(" ",$s);
	sort($arr);//Sorting the array in alphabetical order
	foreach ($arr as $key=>$word){
		$arr[$key]=ucwords(substr($word,0,-1)).ucwords(substr($word,-1)); //making the first and last letter uppercase
	}
	sort($arr);
	$s = implode(" ",$arr); //putting the array back together into a single string.
	return $s;
 }

 function findAverage_and_Median(array $arr){
	$sum=0;
	sort($arr);
	if (count($arr)%2==1){
		$ind = (int)(count($arr)/2);//Finding the index of the middle value if number of entries is odd.
		$med = $arr[$ind];
	}
	else{
		$ind = count($arr)/2;//Finding the index that is one of the numbers to use for the median if the number of entries is even.
		$med = ($arr[$ind]+$arr[$ind-1])/2;
	}
	foreach ($arr as $key=>$val){//summing all of the entries
		$sum+=$val;
	}
	$avg = $sum/count($arr);//Finding the average
	return "Average: $avg, Median: $med";
 }

 function find4Digits(String $s){
 	 $arr = explode(" ", $s);
	 $wordMatch=null;
	 $wordFound=FALSE;
	 foreach ($arr as $key=>$word){
	 	 if (preg_match('/^[0-9]{4}/',$word)){
			$wordMatch=$word;
			$wordFound=TRUE;
			break;
		 }
	 }
	 if ($wordFound){
		return $wordMatch;
	 }
	 else{
         echo "There aren't 4 digits in this string.";
		return FALSE;
	 }
 }
     ?> 
 <h1>Assignment 4, Question 1 by Camil Bouzidi<br/></h1>

 <h2>findSummation</h2>
 <p>Calling findSummation for the number 3. The sum is: <?php echo findSummation(3); ?></p>
 <p>Calling findSummation for the number 4. The sum is: <?php echo findSummation(4); ?></p>
 <p>Calling findSummation for the number -1. The sum is: <?php echo findSummation(-1); ?></p>
  <p>Calling findSummation for the string "hello": The sum is: <?php echo findSummation("hello"); ?></p>

 <h2>uppercaseFirstandLastSorted</h2>
 <p>Calling uppercaseFirstandLastSorted for the string "My name is Camil":  <?php echo uppercaseFirstandLastSorted("My name is Camil"); ?></p>
 <p>Calling uppercaseFirstandLastSorted for the string "I have a very nice cat":  <?php echo uppercaseFirstandLastSorted("I have a very nice cat"); ?></p>
 <p>Calling uppercaseFirstandLastSorted for the string "My girlfriend is the best and her dog loves to play fetch":  <?php echo uppercaseFirstandLastSorted("My girlfriend is the best and her dog loves to play fetch");?></p>
 
 <h2>findAverage_and_Median</h2>
 <p>Calling findAverage_and_Median for the array of values [2,4,5]:  <?php echo findAverage_and_Median(array(2,4,5)); ?></p>
 <p>Calling findAverage_and_Median for the array of values [2,4,5,6]:  <?php echo findAverage_and_Median(array(2,4,5,6)); ?></p>
 <p>Calling findAverage_and_Median for the array of values [8,3,10]:  <?php echo findAverage_and_Median(array(8,3,10)); ?></p>
 <p>Calling findAverage_and_Median for the array of values [8,3,10,4]:  <?php echo findAverage_and_Median(array(8,3,10,4)); ?></p>

 <h2>find4Digits</h2>
 <p>Calling find4Digits on "123 43 1324 273 3743": <?php echo find4Digits("123 43 1324 273 3743");?></p>
 <p>Calling find4Digits on "123": <?php echo find4Digits("123");?></p>
 <p>Calling find4Digits on "42 49 686 588 5849 348 3": <?php echo find4Digits("42 49 686 588 5849 348 3");?></p>


 </body>
</html>