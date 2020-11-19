# Api Examples for WebTech 2020

This file containes some examples of calling and implementing an api in PHP.

## Implemnting a PHP API and calling from JavaScript

The files `index.php`, `/js/callApi.js` and `api.php` show how to impplement and cal an api from a php file:

### index.php

This is mostly html which uses `callApi.js` to call the api.

## js/callApi.js

This file calls `api.php` and places the output of the api call on the page.

### api.php

This file implements the api; it always returns a json structure of:

```json
{
  "message": "Hello World",
  "status": "success"
}
```

## Calling an external api from PHP

The file `callApi.php` implements search by calling the duckduckgo api. It dumps the full result of the search call at the bottom of the page.

The functionality is identical to [this all javascript version on stackblitz](https://stackblitz.com/edit/ashweb2020-api?file=script.js).
