window.onload = function downloadFromAPI() {
    httpRequest = new XMLHttpRequest();
    let cards = document.getElementsByClassName("card");

    httpRequest.onreadystatechange = function() {
        if (httpRequest.readyState === XMLHttpRequest.DONE) {
            if(httpRequest.status === 200) {
                data = JSON.parse(httpRequest.responseText);
                for (let i = 0; i < cards.length; i ++) {
                    let cardTitle = cards[i].getElementsByClassName("card-title")[0];
                    cardTitle.innerText = data[i].id;

                    let cardSubtitle = cards[i].getElementsByClassName("card-subtitle")[0];
                    cardSubtitle.innerText = data[i].titre;

                    let cardText = cards[i].getElementsByClassName("card-text")[0];
                    cardText.innerText = data[i].contenu;
                }
            }
            else {
                console.log("Il y a eu un problème");
            }
        }
        else {
            console.log("XMLHttpRequest ne fonction pas");
        }
    }
    httpRequest.open("GET","https://oc-jswebsrv.herokuapp.com/api/articles", true);
    httpRequest.send();
}