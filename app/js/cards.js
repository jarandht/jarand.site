document.addEventListener("DOMContentLoaded", function() {
    // Extract the site name from the URL path
    const pathParts = window.location.pathname.split('/').filter(part => part);
    // Assuming the site name is the last part of the URL path
    const siteName = pathParts[pathParts.length - 1];
    // Construct the fetch URL using the site name
    const fetchUrl = `/json/${siteName}.json`;

    fetch(fetchUrl)
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            const cardsContainer = document.getElementById('jsonContainer');
            data.forEach(card => {
                const cardLink = document.createElement('a');
                cardLink.href = card.url;
                cardLink.target = "_blank"; // Open the link in a new tab

                const cardDiv = document.createElement('div');
                cardDiv.style.textAlign = card.align;

                const cardSpan = document.createElement('span');

                const cardName = document.createElement('p');
                cardName.textContent = card.name;
                cardName.classList.add('cardName');
                cardSpan.appendChild(cardName);
                
                const cardUrl = document.createElement('p');
                cardUrl.classList.add('cardUrl');
                if(card.display_url == "no"){
                    cardUrl.style.display = "none";
                } else {
                    cardUrl.style.display = "block";
                }
                cardUrl.textContent = card.url;
                cardSpan.appendChild(cardUrl);
                
                const cardDescription = document.createElement('p');
                cardDescription.classList.add('cardDescription');
                cardDescription.textContent = card.description;
                cardSpan.appendChild(cardDescription);

                const cardImg = document.createElement('img');
                cardImg.src = card.img;
                cardImg.alt = card.name;

                cardDiv.appendChild(cardSpan);
                cardDiv.appendChild(cardImg);

                cardLink.appendChild(cardDiv);
                cardsContainer.appendChild(cardLink);
            });
        })
        .catch(error => console.error('Error fetching the data:', error));
});