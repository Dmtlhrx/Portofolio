<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $type = htmlspecialchars($_POST['type']);
    $nom = htmlspecialchars($_POST['company-name'] ?? $_POST['individual-name']);
    $email = htmlspecialchars($_POST['company-email'] ?? $_POST['individual-email']);
    $phone = htmlspecialchars($_POST['company-phone'] ?? $_POST['individual-phone']);
    $message = htmlspecialchars($_POST['message']);

    $to = "votre.email@example.com"; // Remplacez par votre adresse e-mail
    $subject = $type === 'entreprise' ? "Demande d'entreprise de $nom" : "Demande de particulier de $nom";
    $body = "Type : $type\nNom : $nom\nE-mail : $email\nTéléphone : $phone\n\nMessage :\n$message";

    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        echo "<p>Merci pour votre message. Nous vous répondrons dès que possible.</p>";
    } else {
        echo "<p>Une erreur est survenue, veuillez réessayer plus tard.</p>";
    }
} else {
    echo "<p>Accès interdit.</p>";
}
?>
