<link rel="stylesheet" href="/css/nav.css">

<?php
// Get the current page from the request URI
$current_page = rtrim($_SERVER['REQUEST_URI'], '/');

$hostname = $_SERVER['SERVER_NAME'];

$current_year = date('Y');
?>

<nav class="nav">
    <div class="profile">
        <div class="profileImg" style="background: url(/img/egg5.jpg); background-position: top; background-size: cover; " alt=""></div>
        <h1>Jarand Holmefjord Tyssen</h1>
    </div>
    <div class="navButtons">
        <a href="/home"><div <?php echo $_SERVER['SCRIPT_NAME'] === '/home' ? 'class="c"' : ''; ?>><img src="/img/homegrey.png" alt=""><p>Home</p></div></a>
        <div class="navButtonDropdown <?php echo strpos($current_page, '/projects') !== false ? 'navButtonActive' : ''; ?> <?php echo isset($_SESSION['dropdownOpen']) && $_SESSION['dropdownOpen'] ? 'active' : ''; ?>">
            <img src="/img/gray_docs.png" alt=""><p>Projects</p>
            <i></i>
            <a href="/projects/websites"><span class="navButtonDropdown_child <?php echo strpos($current_page, '/projects/websites') !== false ? 'navButtonActive navButtonDropdown_child_Active' : ''; ?>">
                <img src="/img/gray_internet.png" alt=""><p>Websites</p>
            </span></a>
            <a href="/projects/other"><span class="navButtonDropdown_child <?php echo strpos($current_page, '/projects/other') !== false ? 'navButtonActive navButtonDropdown_child_Active' : ''; ?>">
                <img src="/img/gray_other.png" alt=""><p>Other</p>
            </span></a>
            <a href="/projects/homelab"><span class="navButtonDropdown_child <?php echo strpos($current_page, '/projects/homelab') !== false ? 'navButtonActive navButtonDropdown_child_Active' : ''; ?>">
                <img src="/img/gray_cloud_server.png" alt=""><p>Homelab</p>
            </span></a>
        </div>
        <a href="/personal_sites"><div <?php echo strpos($current_page, '/personal_sites') !== false ? 'class="navButtonActive"' : ''; ?>><img src="/img/gray_edit.png" alt=""><p>Personal Sites</p></div></a>
    </div>
    <div class="copyright">
        <p>© - <?php echo $hostname; ?> - <?php echo $current_year; ?></p>
    </div>
</nav>


<script>
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
</script>
