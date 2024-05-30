document.addEventListener("DOMContentLoaded", function() {
    // Log the entire pathname for debugging
    console.log("Window location pathname:", window.location.pathname);

    // Extract the site name from the URL path
    const pathParts = window.location.pathname.split('/').filter(part => part);
    console.log("Path parts:", pathParts);

    // Assuming the site name is the last part of the URL path
    const siteName = pathParts[pathParts.length - 1];
    console.log("Extracted site name:", siteName);

    // Construct the fetch URL using the site name
    const fetchUrl = `/json/${siteName}.json`;

    // Log the fetch URL for debugging
    console.log("Fetch URL:", fetchUrl);

    fetch(fetchUrl)
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            const projectsContainer = document.getElementById('jsonContainer');
            data.forEach(project => {
                const projectLink = document.createElement('a');
                projectLink.href = project.url;
                projectLink.target = "_blank"; // Open the link in a new tab

                const projectDiv = document.createElement('div');

                const projectSpan = document.createElement('span');

                const projectName = document.createElement('p');
                projectName.textContent = project.name;
                projectSpan.appendChild(projectName);

                const projectUrl = document.createElement('p');
                projectUrl.classList.add('cardUrl');
                projectUrl.textContent = project.url;
                projectSpan.appendChild(projectUrl);

                const projectImg = document.createElement('img');
                projectImg.src = project.img;
                projectImg.alt = project.name;

                projectDiv.appendChild(projectSpan);
                projectDiv.appendChild(projectImg);

                projectLink.appendChild(projectDiv);
                projectsContainer.appendChild(projectLink);
            });
        })
        .catch(error => console.error('Error fetching the data:', error));
});
