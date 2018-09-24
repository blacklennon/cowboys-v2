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
            <table>
                <tr>
                    <th></th>
                    <th class="contact-type">Nicolas Tzipine<br /><em>Producteur</em></th>
                </tr>
                <tr>
                    <td class="pre-text">Tel.</td>
                    <td>00 00 00 00 00</td>
                </tr>
                <tr>
                    <td class="contact-mail pretext">Mail.</td>
                    <td class="contact-mail">nicolastzipine@cowboysfilms.com</td>
                </tr>
                <tr>
                    <td class="pre-text">Add.</td>
                    <td>0, rue Emile Allez<br />00000 Paris</td>
                </tr>
            </table>
            <table>
                <tr>
                    <th></th>
                    <th class="contact-type">Nicolas Tzipine<br /><em>Producteur</em></th>
                </tr>
                <tr>
                    <td class="pre-text">Tel.</td>
                    <td>00 00 00 00 00</td>
                </tr>
                <tr>
                    <td class="contact-mail pretext">Mail.</td>
                    <td class="contact-mail">nicolastzipine@cowboysfilms.com</td>
                </tr>
                <tr>
                    <td class="pre-text">RS.</td>
                    <td><table>
                        <tr>
                            <td><a href="//instagram.com">Instagram</a></td>
                            <td><a href="//twitter.com">Twitter</a></td>
                        </tr>
                        <tr>
                            <td><a href="//facebook.com">Facebook</a></td>
                            <td><a href="//pinterest.com">Pinterest</a></td>
                        </tr>
                    </table></td>
                </tr>
            </table>
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
                                        echo '<video controls class="content active" poster="'.preg_replace("/.mp4|.flv|.mov/", "-thumbnail.png", $value).'">
                                                <source src="'.$value.'" type="video/'.pathinfo($value, PATHINFO_EXTENSION).'">
                                                    Your browser does not support the video tag or the file format of this video.
                                                </video>';
                                    else
                                        echo '<img src="'.$value .'" alt="" class="content active" />';
                                    } else if ($key == count(get_files_path($project))) {
                                    break;
                                } else {
                                    if (pathinfo($value, PATHINFO_EXTENSION) === 'mp4' || pathinfo($value, PATHINFO_EXTENSION) === 'flv' || pathinfo($value, PATHINFO_EXTENSION) === 'mov')
                                    echo '<video controls class="content after" poster="'.preg_replace("/.mp4|.flv|.mov/", "-thumbnail.png", $value).'">
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
</body>

</html>