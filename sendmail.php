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
    $mail->setFrom($mail->Username, 'Reception de votre message');
    $mail->addAddress($email, 'Utilisateur'); // Tu peux aussi mettre une autre adresse

    // Contenu de l'email
    $mail->isHTML(false);
    $mail->Subject = 'Confirmation de reception';
    $mail->Body = "Bonjour $name,\n\n"
                . "Merci pour votre message concernant le service $service.\n"
                . "Nous avons bien reçu votre message et nous vous contacterons bientôt.\n\n"
                . "Cordialement,\n"
                . "L'équipe Auptit reflexo\n\n"
                ."Nous contacter au : 06 06 06 06 06\n";

    $mail->send();

    //envoie du message a autpit reflexo
    $mail->isHTML(false);
    $mail->setFrom($mail->Username, "Nouveau message de $name");
    $mail->addAddress("thomas.reix4@gmail.com", 'Auptit reflexo');
    $mail->Subject = "Nouveau message de $name";
    $mail->Body = "Vous avez reçu un nouveau message de $name.\n\n"
                . "Email: $email\n"
                . "Téléphone: $telephone\n"
                . "Service: $service\n\n"
                . "Message:\n$message";
    
    $mail->send();

    echo "✅ Message envoyé avec succès !";
} catch (Exception $e) {
    echo "❌ Le message n'a pas pu être envoyé. Erreur: {$mail->ErrorInfo}";
}
?>
