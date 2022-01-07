<?php
    $name = $_POST['name'];
    $visitor_email = $_POST['email'];
    $message = $_POST['message'];

    $email_from = 'klothedpretotype@klothedapp.com';

    $email_subject = "New Form submission";

    $email_body = "You have received a new message from the user $name.\n".
                              "Here is the message:\n $message".


    $to = "dp4418@ic.ac.uk, christos.trapezaris18@imperial.ac.uk, simon.daigneault18@imperial.ac.uk,
    gaurav.gidwani18@imperial.ac.uk";

    $headers = "From: $email_from \r\n";

    $headers .= "Form submission by $name \r\n";

    mail($to,$email_subject,$email_body,$headers);

    function IsInjected($str)
    {
        $injections = array('(\n+)',
               '(\r+)',
               '(\t+)',
               '(%0A+)',
               '(%0D+)',
               '(%08+)',
               '(%09+)'
               );

        $inject = join('|', $injections);
        $inject = "/$inject/i";

        if(preg_match($inject,$str))
        {
          return true;
        }
        else
        {
          return false;
        }
    }

    if(IsInjected($visitor_email))
    {
        echo "Bad email value!";
        exit;
    }

    if(IsInjected($name))
    {
        echo "Bad name value!";
        exit;
    }

    #Thank user or notify them of a problem
    if ($sent) {

    ?>
        <html>
        <head>
        <title>Thank You</title>
        </head>
        <body>
        <h1>Thank You</h1>
        <p>Thank you for your feedback.</p>
        <p> Click <a href='https://dim-pan.github.io/Entrepreneuership-Pretotype/'
            >here</a> to go back to the Klothed demo</p>
        </body>
        </html>

    <?php

    } else {

    ?>
        <html>
        <head>
        <title>Something went wrong</title>
        </head>
        <body>
        <h1>Something went wrong</h1>
        <p>We could not send your feedback. Please try again.</p>
        <p> Click <a href='https://dim-pan.github.io/Entrepreneuership-Pretotype/'>here</a> to go back to the Klothed demo</p>
        </body>
        </html>
    <?php
    }
    ?>
