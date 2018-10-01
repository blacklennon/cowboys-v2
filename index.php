<?php
    require 'functions.php'
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/style.css" />
    <title></title>
</head>

<body>
    <header class="header">
        <p>Manifeste</p>
    </header>
    <div class="main-container">

        <div class="manifest-container">
            <p><?php echo(file_get_contents(__DIR__ . "/__MANIFEST.txt")); ?></p>
        </div>

        <div class="bg-container">
            <div class="img-container">
                    <img src="assets/img/logo.svg" alt="logo" />
            </div>
            <div class="bg-black"></div>
        </div>

        <div class="contact-container">
            <?php echo(file_get_contents(__DIR__ . "/__CONTACT.txt")); ?>
        </div>

        <div class="slider-container">
            <div class="bouboule top none"></div>
            <div class="bouboule bottom none"></div>
            <div class="click-left"></div>
            <div class="click-right"></div>
            <div class="index">
                <button id="close-index"></button>
                <ul>
                    <li>
                        Narsico Rodriguez
                        <br />
                        <em>Campagne</em>
                    </li>
                    <li>
                        Dom Perignon
                        <br />
                        <em>Brand Content</em>
                    </li>
                    <li>
                        Perrier Jouet
                        <br />
                        <em>Campagne digitale</em>
                    </li>
                    <li>
                        Nom du projet
                        <br />
                        <em>Films</em>
                    </li>
                    <li>
                        Narsico Rodriguez
                        <br />
                        <em>Campagne</em>
                    </li>
                    <li>
                        M.A.C
                        <br />
                        <em>Campagne Print</em>
                    </li>
                </ul>
            </div>

            <div class="vertical-wrapper">
                <?php
                $content_id = 0;
                foreach (get_project() as $div => $project) {
                        $content_id++;
                        echo '<div class="h-content right none" id="content-'.$content_id.'">';
                        foreach (get_files_path($project) as $key => $value) {
                                if ($key == 0) {
                                    if (pathinfo($value, PATHINFO_EXTENSION) === 'mp4' || pathinfo($value, PATHINFO_EXTENSION) === 'flv' || pathinfo($value, PATHINFO_EXTENSION) === 'mov')
                                        echo '<video controls class="content active afterglow" width="1280" height="720" poster="'.preg_replace("/.mp4|.flv|.mov/", "-thumbnail.png", $value).'">
                                                <source src="'.$value.'" type="video/'.pathinfo($value, PATHINFO_EXTENSION).'">
                                                    Your browser does not support the video tag or the file format of this video.
                                                </video>';
                                    else
                                        echo '<img src="'.$value .'" alt="" class="content active" />';
                                    } else if ($key == count(get_files_path($project))) {
                                    break;
                                } else {
                                    if (pathinfo($value, PATHINFO_EXTENSION) === 'mp4' || pathinfo($value, PATHINFO_EXTENSION) === 'flv' || pathinfo($value, PATHINFO_EXTENSION) === 'mov')
                                    echo '<video controls class="content after afterglow" width="1280" height="720" poster="'.preg_replace("/.mp4|.flv|.mov/", "-thumbnail.png", $value).'">
                                            <source src="'.$value.'" type="video/'.pathinfo($value, PATHINFO_EXTENSION).'">
                                                Your browser does not support the video tag or the file format of this video.
                                            </video>';
                                    else if (pathinfo($value, PATHINFO_EXTENSION) === 'txt') {
                                        echo '<div class="content project-infos after">
                                        <ul>
                                            '.get_text($project).'
                                        </ul>
                                        </div>';
                                    }
                                    else
                                        echo '<img src="'.$value .'" alt="" class="content after" />';
                                }
                            }
                            echo '</div>';
                    }?>
                    
                    </div>
            </div>
        </div>
    </div>
    <footer class="footer">
        <p><span id="project-link">Projets</span><span id="project-title"></span></p>
        <p id="contact-link">Contact</p>
    </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
    <script src="assets/js/verticalSlider.js"></script>
    <script src="assets/js/horizontalSlider.js"></script>
    <script src="assets/js/contactAnimation.js"></script>
    <script src="assets/js/bottomInfos.js"></script>
    <script src="assets/js/indexMenu.js"></script>
    <script src="assets/js/afterglow.min.js"></script>
</body>

</html>