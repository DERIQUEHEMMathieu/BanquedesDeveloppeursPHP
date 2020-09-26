function createArray() {
    document.getElementById("valuesList").innerHTML = ""
    // Base object to manage requests and responses
    httpRequest = new XMLHttpRequest();

    // Code to execute
    httpRequest.onreadystatechange = function() {
    // Response processing instructions
    // Everything is fine, the response has been received
    if (httpRequest.readyState === XMLHttpRequest.DONE) {
        if (httpRequest.status === 200) {
            // The answer is exploitable and valid
            let data = JSON.parse(httpRequest.responseText);
            const TBODY = document.getElementById("valuesList");
            for (i=0; i<data.length; i++) {
                let tr = document.createElement("tr");
                for (const PROPERTY in data[i]) {
                    const TD = document.createElement("td");
                    TD.innerText = data[i][PROPERTY];
                    tr.appendChild(TD);
                }
                TBODY.appendChild(tr);
            }
        }
        else {
            // There was a problem with the request. For example, the answer can be a code 404 (Not found) or 500 (Internal server error)
            console.log("Une erreur est survenue");
        }
    }
    else {
        // Answer not yet ready
        console.log("Réponse en attente");
    }
    };

    // Opening and sending of the request
    httpRequest.open('GET', 'data/statistiques.json', true);
    httpRequest.send();
}