
<style><!--
p { font: 20px arial,sans-serif; margin-top: 10px;}
//-->
</style>


<?php
#$str1=50;
#echo "Total amount which you have in your account is $str1";

#echo '<br>';
/*
#It will output the result:
#Total amount which you have in your account is 50 
*/
#echo 'Total amount which you have in your account is $str1';
/*
It will output the result:
Total amount which you have in your account is $str1
*/
?>

<?php
require("rss_fetch.inc");
// Compile array of feeds
$feeds = array(
"http://feeds.bbci.co.uk/news/rss.xml",
"http://www.espncricinfo.com/rss/content/story/feeds/0.xml",
"http://www.huffingtonpost.com/feeds/index.xml",	
);
//"http://feeds.mashable.com/Mashable?format=xml"
// Iterate through each feed
foreach ($feeds as $feed) {
	
// Retrieve the feed
$rss = fetch_rss($feed);

// Format the feed for the browser
$feedTitle = $rss->channel['title'];
echo "<p><strong>$feedTitle</strong><br />";
$rss->items = array_slice($rss->items, 0, 3);
foreach ($rss->items as $item) {
		
$link = $item['link'];
$title = $item['title'];
$description = isset($item['description']) ? $item['description'].
"<br />" : "";
echo "<a href=\"$link\">$title</a><br />$description";
}
echo "</p>";
}
?>