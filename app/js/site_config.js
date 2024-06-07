// Head

document.addEventListener("DOMContentLoaded", function() {
    fetch('/json/config/site_config.json')
        .then(response => response.json())
        .then(data => {
            const headContainer = document.getElementById('head');

            // Assuming that data contains only one head object
            if (data.length > 0) {
                const headData = data[0];

                const headImg = document.createElement('link');
                headImg.rel = "icon";
                headImg.type = "image/png";
                headImg.href = headData.header_img

                const headTitle = document.createElement('title');
                headTitle.textContent = headData.header_title;

                headContainer.appendChild(headImg);
                headContainer.appendChild(headTitle);
            }
        })
        .catch(error => console.error('Error fetching the head data:', error));
});


//  NAV

document.addEventListener("DOMContentLoaded", function() {
    fetch('/json/config/site_config.json')
        .then(response => response.json())
        .then(data => {
            const profileContainer = document.getElementById('profile');

            // Assuming that data contains only one profile object
            if (data.length > 0) {
                const profileData = data[0];

                const profileImg = document.createElement('div');
                profileImg.className = "profileImg"; // Correctly set class name
                profileImg.style.background = `url(${profileData.img}) top / cover`; // Correctly set background

                const profileTitle = document.createElement('h1');
                profileTitle.textContent = profileData.title; // Correctly set title

                profileContainer.appendChild(profileImg);
                profileContainer.appendChild(profileTitle);
            }
        })
        .catch(error => console.error('Error fetching the profile data:', error));
});