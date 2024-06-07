<link rel="stylesheet" href="/css/nav.css">

<?php
// Get the current page from the request URI
$current_page = rtrim($_SERVER['REQUEST_URI'], '/');

$hostname = $_SERVER['SERVER_NAME'];

$current_year = date('Y');
?>
<div class="navColapse">
    <img src="/img/nav_icons/grey_angle-double-right.png" alt="">
    <img src="/img/nav_icons/grey_angle-double-right.png" alt="">
</div>
<nav class="nav">
    <section class="navContentContainer">
        <div class="profile" id="profile">
        </div>
        <div class="navButtons" id="navButtons">
            <a href="/home"><div <?php echo $current_page == '/home' ? 'class="navButtonActive"' : ''; ?>><img src="/img/nav_icons/homegrey.png" alt=""><p>Home</p></div></a>
            <div class="navButtonDropdown <?php echo strpos($current_page, '/projects') !== false ? 'navButtonActive' : ''; ?> <?php echo isset($_SESSION['dropdownOpen']) && $_SESSION['dropdownOpen'] ? 'active' : ''; ?>">
                <img src="/img/nav_icons/gray_docs.png" alt=""><p>Projects</p>
                <i></i>
                <a href="/projects/websites"><span class="navButtonDropdown_child <?php echo strpos($current_page, '/projects/websites') !== false ? 'navButtonActive navButtonDropdown_child_Active' : ''; ?>">
                    <img src="/img/nav_icons/gray_internet.png" alt=""><p>Websites</p>
                </span></a>
                <a href="/projects/other"><span class="navButtonDropdown_child <?php echo strpos($current_page, '/projects/other') !== false ? 'navButtonActive navButtonDropdown_child_Active' : ''; ?>">
                    <img src="/img/nav_icons/gray_other.png" alt=""><p>Other</p>
                </span></a>
                <!-- <a href="/projects/homelab"><span class="navButtonDropdown_child <?php echo strpos($current_page, '/projects/homelab') !== false ? 'navButtonActive navButtonDropdown_child_Active' : ''; ?>">
                    <img src="/img/nav_icons/gray_cloud_server.png" alt=""><p>Homelab</p>
                </span></a> -->
            </div>
            <a href="/personal_sites"><div <?php echo strpos($current_page, '/personal_sites') !== false ? 'class="navButtonActive"' : ''; ?>><img src="/img/nav_icons/gray_edit.png" alt=""><p>Personal Sites</p></div></a>
        </div>
        <div class="copyright">
            <p>© - <?php echo $hostname; ?> - <?php echo $current_year; ?></p>
        </div>
    </section>
</nav>


<script src="/js/nav_dropdown.js"></script>
<script>
        document.addEventListener('DOMContentLoaded', function() {
            const navCollapse = document.querySelector('.navColapse');
            const nav = document.querySelector('.nav');

            navCollapse.addEventListener('click', function() {
                nav.classList.toggle('navColapsed');
            });
        });
    </script>