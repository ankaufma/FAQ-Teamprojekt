<?php
include('rating.php');
class RatingManager
{
	public function createRating(Rating $rating) {
		
		#INSERT INTO rating (Rating,User,Answer) VALUES (10,3,3);

		$db = mysqli_connect('127.0.0.1', 'root', '', 'tpfaq');
		$sql = "INSERT INTO rating (Rating,User,Answer)VALUES"."(".$rating->getRating().",".$rating->getUser()->getUserId().",".$rating->getAnswer()->getAnswerId().");";
		$result = mysqli_query($db, $sql) or die ('Unknown Database Error!');
		
		mysqli_close($db);
		
		
	}

	public function calcRatingForEachAnswer(Answer $answer){
		#SELECT ROUND(avg(RATING), 1) FROM RATING WHERE Answer = 1; 
		$db = mysqli_connect('127.0.0.1', 'root', '', 'tpfaq');
		$sql = "SELECT ROUND(avg(RATING), 1) FROM RATING WHERE Answer =".$answer->getAnswerId().";";
		$result = mysqli_query($db, $sql) or die ('Unknown Database Error!');
		$ratingRow = mysqli_fetch_row($result);
		$rating = $ratingRow[0];
		mysqli_close($db);
		
		return $rating;	
	}
		
}
?>