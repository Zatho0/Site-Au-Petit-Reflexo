<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require_once __DIR__ . '/vendor/autoload.php';

// Récupération données du formulaire
$name = htmlspecialchars($_POST['name']);
$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
$message = htmlspecialchars($_POST['message']);
$telephone = htmlspecialchars($_POST['telephone']);
$service = htmlspecialchars($_POST['service']);

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

if (!$email) {
    die('Adresse email invalide.');
}

$mail = new PHPMailer(true);
$mail->CharSet = 'UTF-8';
$mail->Encoding = 'base64';

try {
    // Configuration SMTP Gmail
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = $_ENV['EMAIL_USER'];
    $mail->Password = $_ENV['EMAIL_PASS'];         // Ton mot de passe d’application Gmail
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Expéditeur et destinataire
    $mail->setFrom($mail->Username, 'Prise de rendez-vous');
    $mail->addAddress($email, 'Auptit reflexo'); // Tu peux aussi mettre une autre adresse

    // Contenu de l'email
    $mail->isHTML(false);
    $mail->Subject = 'Prise de rendez-vous';
    $mail->Body = "Bonjour $name,\n\n"
                . "Vous avez reçu un nouveau message de prise de rendez-vous :\n\n"
                . "Nom : $name\n"
                . "Email : $email\n"
                . "Téléphone : $telephone\n"
                . "Message : $message\n\n"
                . "Service demandé : $service\n\n"
                . "Merci de répondre à ce message pour confirmer le rendez-vous.";

    $mail->send();
    echo "✅ Message envoyé avec succès !";
} catch (Exception $e) {
    echo "❌ Le message n'a pas pu être envoyé. Erreur: {$mail->ErrorInfo}";
}
?>
