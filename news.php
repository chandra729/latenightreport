
<?php
require("rss_fetch.inc");
// Compile array of feeds
$feeds = array(
"http://feeds.bbci.co.uk/news/rss.xml",
"http://feeds.reuters.com/Reuters/worldNews",
"http://feeds.mashable.com/Mashable?format=xml",
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
$rss->items = array_slice($rss->items, 0, 5);
foreach ($rss->items as $item) {
		
$link = $item['link'];
$title = $item['title'];
$publish_date=$item['pubdate'];
$description = isset($item['description']) ? $item['description'].
"<br />" : "";
echo "<a href=\"$link\">$title</a><br />$description";

echo $publish_date.'</br>';

}
echo "</p>";
}
?>
