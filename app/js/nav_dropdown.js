document.addEventListener('DOMContentLoaded', () => {
    const dropdown = document.querySelector('.navButtonDropdown');

    // Function to toggle dropdown
    function toggleDropdown(event) {
        const isDropdownChild = event.target.closest('.navButtonDropdown_child');
        if (!isDropdownChild) {
            const isActive = dropdown.classList.toggle('active');
            // Store the state in a cookie with SameSite=None and Secure attributes
            document.cookie = 'dropdownOpen=' + isActive + '; expires=' + new Date(Date.now() + 86400000).toUTCString() + '; path=/; SameSite=None; Secure';
        }
    }

    // Event listener for dropdown click
    dropdown.addEventListener('click', toggleDropdown);

    // Check if the dropdown state is stored in a cookie
    const dropdownOpenCookie = document.cookie.split('; ').find(row => row.startsWith('dropdownOpen='));
    if (dropdownOpenCookie) {
        const isActive = dropdownOpenCookie.split('=')[1] === 'true';
        if (isActive) {
            dropdown.classList.add('active');
        }
    }
});