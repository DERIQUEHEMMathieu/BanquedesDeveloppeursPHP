function makeCol(article) {
    // Create a col element from Bootstrap
    let col = document.createElement("div");
    col.classList.add("col-12", "col-md-6", "col-lg-4");
    // Create also an article as a card
    let card = document.createElement("article");
    card.classList.add("card", "my-4")
    // Use the ES6 syntax and innerHTML to add all the HTML content at once
    card.innerHTML =
    `
      <div class="card-header bg-warning">
        <h4>${article.id}</h4>
      </div>
      <div class="card-body">
        <h5 class="card-title">${article.titre}</h5>
        <p class="card-text">${article.contenu}</p>
        <a href="#" class="btn btn-secondary text-white">En savoir plus</a>
      </div>
    `
    ;
    col.appendChild(card);
    // Return the full column
    return col;
  }
  
  // Function to display on the html page a serie of articles in JSON format
  function showArticles(articles) {
    // Get the row where articles will be stored
    let articleContainer = document.getElementById("articleContainer");
    // Loop through each article of the JSON array and create an html article
    for(const article of articles) {
      let col = makeCol(article);
      articleContainer.appendChild(col);
    }
  }
  
  // Start the AJAX request
  let httpRequest = new XMLHttpRequest();
  httpRequest.onreadystatechange = function() {
    if (httpRequest.readyState === XMLHttpRequest.DONE) {
      if (httpRequest.status === 200) {
        // Turn the response into an array of JSON objects
        let articles = JSON.parse(httpRequest.responseText);
        showArticles(articles);
      }
      else {
        let articleContainer = document.getElementById("articleContainer");
        articleContainer.innerHTML = "<div class='alert alert-danger'>Une erreur est survenue, nous ne pouvons pas afficher les articles</div>";
      }
    }
  };
  httpRequest.open('GET', 'https://oc-jswebsrv.herokuapp.com/api/articles', true);
  httpRequest.send();
  