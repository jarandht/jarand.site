document.addEventListener("DOMContentLoaded", function() {
    fetch('/json/config/nav_config.json')
        .then(response => response.json())
        .then(data => {
            const navContainer = document.getElementById('navButtons');
            const currentPage = window.location.pathname;

            data.forEach(navItem => {
                if (navItem.children) {
                    const dropdownDiv = document.createElement('div');
                    dropdownDiv.classList.add('navButtonDropdown');
                    if (currentPage.startsWith('/projects')) {
                        dropdownDiv.classList.add('navButtonActive');
                    }
                    const dropdownIcon = document.createElement('img');
                    dropdownIcon.src = navItem.icon;
                    const dropdownLabel = document.createElement('p');
                    dropdownLabel.textContent = navItem.label;
                    const dropdownArrow = document.createElement('i');
                    
                    dropdownDiv.appendChild(dropdownIcon);
                    dropdownDiv.appendChild(dropdownLabel);
                    dropdownDiv.appendChild(dropdownArrow);

                    navItem.children.forEach(child => {
                        const childLink = document.createElement('a');
                        childLink.href = child.url;

                        const childSpan = document.createElement('span');
                        childSpan.classList.add('navButtonDropdown_child');
                        if (currentPage === child.url) {
                            childSpan.classList.add('navButtonActive', 'navButtonDropdown_child_Active');
                        }

                        const childIcon = document.createElement('img');
                        childIcon.src = child.icon;
                        const childLabel = document.createElement('p');
                        childLabel.textContent = child.label;

                        childSpan.appendChild(childIcon);
                        childSpan.appendChild(childLabel);
                        childLink.appendChild(childSpan);
                        dropdownDiv.appendChild(childLink);
                    });

                    navContainer.appendChild(dropdownDiv);
                } else {
                    const navLink = document.createElement('a');
                    navLink.href = navItem.url;

                    const navDiv = document.createElement('div');
                    if (currentPage === navItem.url) {
                        navDiv.classList.add('navButtonActive');
                    }

                    const navIcon = document.createElement('img');
                    navIcon.src = navItem.icon;
                    const navLabel = document.createElement('p');
                    navLabel.textContent = navItem.label;

                    navDiv.appendChild(navIcon);
                    navDiv.appendChild(navLabel);
                    navLink.appendChild(navDiv);
                    navContainer.appendChild(navLink);
                }
            });
        })
        .catch(error => console.error('Error fetching the nav data:', error));
});
