<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = strip_tags(trim($_POST["name"]));
  $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
  $subject = trim($_POST["subject"]);
  $message = trim($_POST["message"]);

  // Set your email
  $to = "nandinit09250@gmail.com";
  $email_subject = "New Contact Form: $subject";
  $email_body = "You have received a new message from $name.\n\n".
                "Email: $email\n\n".
                "Message:\n$message";

  $headers = "From: $name <$email>";

  if (mail($to, $email_subject, $email_body, $headers)) {
    http_response_code(200);
    echo "Message sent successfully.";
  } else {
    http_response_code(500);
    echo "Oops! Something went wrong.";
  }
} else {
  http_response_code(403);
  echo "Invalid request.";
}
?>
