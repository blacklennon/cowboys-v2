<?php

    require '../functions.php';

    $to = 'didi28000@gmail.com';
    $subject = 'le sujet';
    $message = get_newsletter_text();
    $headers =  'From: newsletter@cowboysfilms.com' . "\r\n";
    // $headers =  'From: CowboyFilms - Newsletter <newsletter@cowboysfilms.com>' . "\r\n";

    // To send HTML mail, the Content-type header must be set
    $headers .= "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    $headers .= 'X-Mailer: PHP/' . phpversion();
    
    mail($to, $subject, $message, $headers);

    echo "done";
