<?php
// Include the necessary PHPMailer files
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';  // Make sure you installed PHPMailer via Composer

// Create a new PHPMailer instance
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();                                             // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';                        // Specify main SMTP server
    $mail->SMTPAuth   = true;                                    // Enable SMTP authentication
    $mail->Username   = 'saig14368@gmail.com';  // ✅ Your Gmail address
    $mail->Password   = 'bxbs gkpk dljc qdub';   // ✅ Your Gmail App Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption
    $mail->Port       = 587;                                     // TCP port to connect to

    // Recipients
    $mail->setFrom('saig14368@gmail.com', 'Intellidecor Booking');  // ✅ Sender
    $mail->addAddress('saig14368@gmail.com', 'Intellidecor Admin'); // ✅ Recipient

    // Email subject and body
    $mail->isHTML(true);                                          // Set email format to HTML
    $mail->Subject = 'New Booking Request - Intellidecor';         // Subject of the email

    // Safely get POST values and prevent empty fields
    $name = htmlspecialchars($_POST['name'] ?? 'N/A');
    $email = htmlspecialchars($_POST['email'] ?? 'N/A');
    $phone = htmlspecialchars($_POST['num'] ?? 'N/A');       // ✅ match input name
    $message = htmlspecialchars($_POST['prop'] ?? 'N/A');    // ✅ match input name
    

    $mail->Body = "
        <h2>New Online Consultation Booking</h2>
        <strong>Name:</strong> $name<br>
        <strong>Email:</strong> $email<br>
        <strong>Phone:</strong> $phone<br>
        <strong>Message:</strong> $message<br>
    ";

    // Send the email
    $mail->send();
    
    // Display success message and redirect after 2 seconds
    echo '✅ Your booking request has been sent successfully! Our Consultant will contact you shortly.';
    header("refresh:3;url=http://localhost/MAJOR/Interia/index.php"); // Redirect after 2 seconds
    exit; // Stop further script execution to ensure redirect happens
} catch (Exception $e) {
    echo "❌ Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>