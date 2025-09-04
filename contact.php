<?php
$success = "";
$error = "";

if(isset($_POST['send_message'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    if(!empty($name) && !empty($email) && !empty($message)){
        $success = "Thank you, $name. Your message has been sent!";
    } else {
        $error = "Please fill all fields!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Contact Us - APMC Gondal</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    body { background: #f8f9fa; font-family: Arial, sans-serif; }
    .contact-card { background: #fff; padding: 40px; border-radius: 12px; box-shadow: 0 8px 20px rgba(0,0,0,0.1); }
    .map-container { border-radius: 12px; overflow: hidden; margin-top: 30px; }
</style>
</head>
<body>

<div class="container my-5">
    <div class="text-center mb-4">
        <h1 class="text-success">📞 Contact Us</h1>
        <p>Get in touch with APMC Gondal for any queries or support</p>
    </div>

    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="contact-card">
                <h4>Contact Information</h4>
                <p><strong>Address:</strong> APMC Gondal, Gondal, Gujarat, India</p>
                <p><strong>Phone:</strong> +91 12345 67890</p>
                <p><strong>Email:</strong> info@apmcgondal.in</p>
                <p><strong>Office Hours:</strong> Mon - Fri: 9:00 AM - 6:00 PM</p>
            </div>

            <div class="map-container mt-4">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3710.676292049849!2d70.80817981501953!3d22.222950785130!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39579f6d0b9d1b1b%3A0xabcdef1234567890!2sAPMC%20Gondal!5e0!3m2!1sen!2sin!4v1693000000000!5m2!1sen!2sin" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="contact-card">
                <h4>Send us a Message</h4>
                <?php if($success) echo "<div class='alert alert-success'>$success</div>"; ?>
                <?php if($error) echo "<div class='alert alert-danger'>$error</div>"; ?>
                <form method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea name="message" id="message" class="form-control" rows="5" required></textarea>
                    </div>
                    <button type="submit" name="send_message" class="btn btn-success w-100">Send Message</button>
                </form>
            </div>
        </div>
    </div>

    <div class="text-center mt-5">
        <a href="index.php" class="btn btn-danger">⬅ Back to Home</a>
    </div>
</div>

</body>
</html>
