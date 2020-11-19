async function callApi() {
  let apiOutput = "loading..";
  const messageEl = document.getElementById("api-out");
  messageEl.innerText = apiOutput;
  try {
    const apiResult = await fetch("api.php");
    const result = await apiResult.json();
    console.log(result);
    messageEl.innerText = result.message;
  } catch (error) {
    console.log(`nope ${error}`);
    messageEl.innerText = `nope ${error}`;
  }
}
callApi();
