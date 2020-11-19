<html>
  <head>
    <meta charset="UTF-8" />
    <script defer type="module" src="script.js"></script>
    <!-- <link rel="stylesheet" type="text/css" href="styles.css"> -->
  </head>
  <body>
    <form id="search-form" method="get">
      <label for="text">Search for</label>
      <input type="text" id="search" name="search" />
      <button type="submit">Go</button>
    </form>
<?php
// set search term
 $search = $_GET['search'] ?? "no term yet";
 
 define('DUCK_URL',"https://api.duckduckgo.com");
 $hasTerm = isset($_GET['search']);
 $image = null;
 $resultText = null;
 $result= null;
 $abstract = null;
 $related = null;
 $searchResults = null;
 if($hasTerm) {
     $queryParams = ARRAY('format'=>'json', 'q'=>$search);
     $url = DUCK_URL . "?" . http_build_query($queryParams);
     $result = file_get_contents($url);
     $searchResults = json_decode($result,true);
     $image = 'https://duckduckgo.com'. $searchResults['Image'];
     $abstract = $searchResults['Abstract'];
     $related = $searchResults['RelatedTopics'];
 }
echo <<<__RESULTS
    <h1 id="topic">$search</h1>
    <img id="image" src="$image" alt="$search" />
    <p id="abstract">$abstract</p>
    <p></p>
    __RESULTS;
if($related) {
echo <<<__RELATE_HEADER
<h2>Related</h2>
    <ul id="related">
__RELATE_HEADER;
    foreach ($related as $key => $value) {
        $result=$value['Result'] ?? null;
        echo <<<_R_ITEM
        <li>$result</li>
_R_ITEM;        
    }    
}
    echo '</ul>';
    echo var_dump($searchResults);
?>
  </body>
  </html>
