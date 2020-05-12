<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        # FIX: Replace this email with recipient email
        $mail_to = "poucet@simplon-charleville.fr";
        
        # Sender Data
        $sujet = trim($_POST["sujet"]);
        $lname = str_replace(array("\r","\n"),array(" "," ") , strip_tags(trim($_POST["lname"])));
        $fname = str_replace(array("\r","\n"),array(" "," ") , strip_tags(trim($_POST["fname"])));
        $mail = filter_var(trim($_POST["mail"]), FILTER_SANITIZE_EMAIL);
        $message = trim($_POST["message"]);
        
        if ( empty($lname) OR !filter_var($mail, FILTER_VALIDATE_EMAIL) OR empty($fname) OR empty($sujet) OR empty($message)) {
            # Set a 400 (bad request) response code and exit.
            http_response_code(400);
            echo "Veillez à bien compléter tous les champs.";
            exit;
        }
        
        # Mail Content
        $content = "Name: $fname . $lname\n";
        $content .= "Email: $mail\n\n";
        $content .= "Message:\n$message\n";

        # email headers.
        $headers = "From: $fname . $lname &lt;$mail&gt;";

        # Send the email.
        $success = mail($mail_to, $subject, $content, $headers);
        if ($success) {
            # Set a 200 (okay) response code.
            http_response_code(200);
            echo "Merci ! Votre message a bien été envoyé.";
        } else {
            # Set a 500 (internal server error) response code.
            http_response_code(500);
            echo "Oops! Une erreur est apparue. Votre message n'a pas été envoyé";
        }

        } else {
            # Not a POST request, set a 403 (forbidden) response code.
            http_response_code(403);
            echo "Le formulaire soumis n'est pas conforme. Une erreur est apparue.";
        }
