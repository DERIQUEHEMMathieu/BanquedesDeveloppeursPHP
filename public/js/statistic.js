// Generate each lines in the table, one line per json object
function makeTableRows(stat) {
    let table = document.getElementById("statTable");
    // For each json object in stat
    for(const data of stat) {
      // Add a row to the table
      let row = table.insertRow(-1);
      // For each property in the current JSON object
      for(prop in data) {
        // Add a cell in the row with the value of the property as text
        let cell = row.insertCell(-1);
        cell.innerText = data[prop];
      }
    }
  }
  
  // Start the AJAX request
  httpRequest = new XMLHttpRequest();
  httpRequest.onreadystatechange = function() {
    if (httpRequest.readyState === XMLHttpRequest.DONE) {
      if (httpRequest.status === 200) {
        // Turn the response into an array of JSON objects
        let stat = JSON.parse(httpRequest.responseText);
        makeTableRows(stat);
      }
      else {
  
      }
    }
  };
  httpRequest.open('GET', 'model/data/statistiques.json', true);
  httpRequest.send();