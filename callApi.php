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
  // define a constant for the api URL
  define('DUCK_URL',"https://api.duckduckgo.com");
  // set search term
  $search = $_GET['search'] ?? "no term yet";
  $hasTerm = isset($_GET['search']);
  // define the variables that we will substitute in the html with the stuff we get
  // from the API
  $image = null;
  $resultText = null;
  $result= null;
  $abstract = null;
  $related = null;
  $searchResults = null;
  // if someone has typed the search term; then go ahead and do the search
  if($hasTerm) {
     $queryParams = ARRAY('format'=>'json', 'q'=>$search);
     // build the search query parameters, encoding spaces and special characters
     $url = DUCK_URL . "?" . http_build_query($queryParams);
     // call the api with a get
     $result = file_get_contents($url);
     // convert the JSON to an associative array.
     $searchResults = json_decode($result,true);
     // set the main results for the page
     $image = 'https://duckduckgo.com'. $searchResults['Image'];
     $abstract = $searchResults['Abstract'];
     $related = $searchResults['RelatedTopics'];
 }
 // output the search results
  echo <<<__RESULTS
    <h1 id="topic">$search</h1>
    <img id="image" src="$image" alt="$search" />
    <p id="abstract">$abstract</p>
    <p></p>
    __RESULTS;
  // output related topics area if it exists
    if($related) {
  echo <<<__RELATE_HEADER
  <h2>Related</h2>
      <ul id="related">
  __RELATE_HEADER;
  // loop through each related topic, adding a list element to the html
    foreach ($related as $key => $value) {
        $result=$value['Result'] ?? null;
        echo <<<_R_ITEM
        <li>$result</li>
_R_ITEM;        
    }    
// close the list
echo '</ul>';
}
// dump the search results; or dump null if no search has been done to the page
echo var_dump($searchResults);
?>
  </body>
  </html>
