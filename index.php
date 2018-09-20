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
            <p>Susam fuga. Nam volore, est exces trumqui tecus. Quibusaest id qui deliqui te posae. Itatur, cus alit que con eate perum, que nos seque pre sit aribus audae evender emquiat aut unte el eum im idi nobist qui atur,
            o ci aspellabore num sinum nos quidus, tquaeped ut quo omnisi iunti dipsunt Ectibusdaeped quia nos porposs edioreium nonsendem enti nihilit iaeperi tiissint quis sunt ulparci dit restotae.</p>
        </div>

        <div class="bg-container">
            <div class="img-container">
                    <img src="assets/img/logo.svg" alt="logo" />
            </div>
            <div class="bg-black"></div>
        </div>

        <div class="contact-container">

        </div>

        <div class="slider-container">
            <div class="bouboule top none"></div>
            <div class="bouboule bottom none"></div>
            <div class="click-left"></div>
            <div class="click-right"></div>
            <div class="vertical-wrapper">
                <?php foreach (get_project() as $div => $project) {
                        echo '<div class="h-content right none">';
                        foreach (get_files_path($project) as $key => $value) {
                                if ($key == 0) {
                                    if (pathinfo($value, PATHINFO_EXTENSION) === 'mp4' || pathinfo($value, PATHINFO_EXTENSION) === 'flv' || pathinfo($value, PATHINFO_EXTENSION) === 'mov')
                                        echo '<div id="img'.($div+1).'" class="img img'.($div+1).'" style="overflow: hidden; width:970px; margin-top:30px;">
                                            <video controls  poster="'.preg_replace("/.mp4|.flv|.mov/", "-thumbnail.png", $value).'" style="width: 970px;">
                                                <source src="'.$value.'" type="video/'.pathinfo($value, PATHINFO_EXTENSION).'">
                                                    Your browser does not support the video tag or the file format of this video.
                                                </video>
                                            </div><br />';
                                    else
                                        echo '<img src="'.$value .'" alt="" class="content active" />';
                                    } else if ($key == count(get_files_path($project))) {
                                    break;
                                } else {
                                    if (pathinfo($value, PATHINFO_EXTENSION) === 'mp4' || pathinfo($value, PATHINFO_EXTENSION) === 'flv' || pathinfo($value, PATHINFO_EXTENSION) === 'mov')
                                    echo '<div id="img'.($div+1).'-'.$key.'" class="img img'.($div+1).' secondaryImg" style="overflow: hidden; width:970px; margin-top:30px;">
                                        <video controls  poster="'.preg_replace("/.mp4|.flv|.mov/", "-thumbnail.png", $value).'" style="width: 970px;">
                                            <source src="'.$value.'" type="video/'.pathinfo($value, PATHINFO_EXTENSION).'">
                                                Your browser does not support the video tag or the file format of this video.
                                            </video>
                                        </div><br />';
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
        <p>Projets</p>
        <p id="contact-link">Contact</p>
    </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
    <script src="assets/js/verticalSlider.js"></script>
    <script src="assets/js/horizontalSlider.js"></script>
    <script src="assets/js/contactAnimation.js"></script>
</body>

</html>