<?php require $_SERVER['DOCUMENT_ROOT'] . '/blocks/all.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="/css/all.css">
    <link rel="stylesheet" href="/css/projectsMain.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jarand Holmefjord Tyssen</title>
</head>
<body>
    <section class="contentContainer">
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/blocks/nav.php'; ?>
        <main class="main">
            <section class="projects">
                <h2>
                <?php
                $url_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
                $url_parts = explode('/', trim($url_path, '/'));
                $first_segment = isset($url_parts[0]) ? $url_parts[0] : '';
                ?>
                <?php echo $first_segment; ?>
                </h2>
                <div class="projectsContainer">
                    <a target="_blank" href="https://links.jarand.site">
                        <div>
                            <span>
                                <p>Links</p>
                                <p class="projectUrl">https://links.jarand.site</p>
                            </span>
                            <img src="/img/link.png" alt="">
                        </div>
                    </a>
                    <a target="_blank" href="https://github.com/BrodBoyChees">
                        <div>
                            <span>
                                <p>GitHub</p>
                                <p class="projectUrl">https://github.com/BrodBoyChees</p>
                            </span>
                            <img src="/img/logo-github-128.webp" alt="">
                        </div>
                    </a>
                </div>
            </section>
        </main>
    </section>
</body>
</html>