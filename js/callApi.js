async function callApi() {
  // display a message while w wait for the api
  let apiOutput = "loading..";
  const messageEl = document.getElementById("api-out");
  messageEl.innerText = apiOutput;
  try {
    // call the api, which has no parameters.  convert the result to JSON
    const apiResult = await fetch("api.php");
    const result = await apiResult.json();
    // log to console and the page
    console.log(result);
    messageEl.innerText = result.message;
  } catch (error) {
    // if it's an error log that to console and the page
    console.log(`nope ${error}`);
    messageEl.innerText = `nope ${error}`;
  }
}

// since we are using async/await, we wrapped our code in a function.  Call it here.
callApi();
