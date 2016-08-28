<?php
//Author: Divyanshu Kalra
function cacheAndGetJsonDump()
{
	$cache_Time = 60*60; # one hour
	if(file_exists("./phpTempFiles/lasttime.collegespace"))
	{
		$lastTime = file_get_contents("./phpTempFiles/lasttime.collegespace");
		if(time() > intval($lastTime) + $cache_Time)
		{
			$jsonDump = file_get_contents("http://updates.collegespace.in/wp-json/posts?filter[posts_per_page]=74");
			$timeNow = time();
			file_put_contents("./phpTempFiles/lasttime.collegespace", $timeNow);
			file_put_contents("./phpTempFiles/cachedResult.collegespace", $jsonDump);
		}
		else
		{
			$jsonDump = file_get_contents("./phpTempFiles/cachedResult.collegespace");
		}
	}
	else
	{
		$jsonDump = file_get_contents("http://updates.collegespace.in/wp-json/posts?filter[posts_per_page]=74");
		$timeNow = time();
		file_put_contents("./phpTempFiles/lasttime.collegespace", $timeNow);
		file_put_contents("./phpTempFiles/cachedResult.collegespace", $jsonDump);
	}
	return $jsonDump;
}
function GetScore($content, $query, $scoreAddition = 10)
{
	$words = explode(" ", $query);
	$score = 0;
	foreach ($words as $word)
	{
		if (strpos($content, $word) !== false) {
			$score += $scoreAddition;
		}
	}
	return $score;
}
if(isset($_GET["query"]))
{
	
	$jsonDump = cacheAndGetJsonDump();
	$jsonedDump = json_decode($jsonDump);
	$result = array();
	$query = $_GET["query"];
	foreach ($jsonedDump as $article)
	{
		//print_r(json_decode(json_encode($article), true));
		$articleTemp = json_decode(json_encode($article), true);
		//$id = $article->ID;
		$content = $article->content;
		$score = 0;
		if (filter_var($content, FILTER_VALIDATE_URL)) {
			// is a link.
			$score += GetScore($content, $query, 8);
		}
		else
		{
			$score += GetScore($content, $query, 10);
		}
		
		$link = $article->link;
		$score += GetScore($link, $query, 6);
		
		$title = $article->title;
		$score += GetScore($link, $query, 12);
		$articleTemp["score"] = $score;

		//echo $articleTemp["score"];

		if($score > 0)
		{
			array_push($result, $articleTemp);
		}
	}
	header('Content-Type: application/json');
	//print_r($result);
	echo(json_encode($result));
}
else
{
?>
<form action="" method="get">
	<input type="text" name="query"></br>
	<input type="submit" value="go">
</form>
<?php
}
?>