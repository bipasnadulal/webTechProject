<?php
// Dummy verification logic for testing purposes

header('Content-Type: application/json');

// Simulating a successful verification
echo json_encode([
    "success" => true,
    "message" => "Dummy Payment verified successfully!"
]);
?>
