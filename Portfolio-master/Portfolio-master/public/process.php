<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $quantity = $_POST["quantity"];
    $boxType = $_POST["box-type"];
    $message = $_POST["message"];

    $to = "sales@divinepackaging.com";
    $subject = "Inquiry from $name";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    $messageBody = "Name: $name\nEmail: $email\nQuantity: $quantity\nBox Type: $boxType\nMessage:\n$message";

    if (mail($to, $subject, $messageBody, $headers)) {
        // Email sent successfully
        http_response_code(200);
        echo "Email sent successfully.";
    } else {
        // Email sending failed
        http_response_code(500);
        echo "Email sending failed.";
    }
} else {
    // Invalid request method
    http_response_code(405);
    echo "Invalid request method.";
}
?>
