<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Login</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
    /* Background */
body {
    background: white;
    background-size: cover;
    font-family: 'Poppins', sans-serif;
}

/* Glassmorphism card similar to green admin dashboard */
.login-card {
    background: rgba(0, 128, 0, 0.75); /* dark green like admin dashboard */
    backdrop-filter: blur(8px);
    border-radius: 1rem;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.4);
    color: #fff;
    padding: 2rem;
}

/* Headings */
h3 {
    text-align: center;
    margin-bottom: 1.5rem;
    font-weight: 700;
    font-size: 1.8rem;
    color: #fff;
    text-shadow: 0px 2px 4px rgba(0,0,0,0.5);
}

/* Input Fields */
.form-control {
    background: rgba(255, 255, 255, 0.9); /* contrast for dark green card */
    border: none;
    border-radius: 0.5rem;
    height: 45px;
}

.form-control:focus {
    box-shadow: 0 0 0 3px rgba(0, 200, 0, 0.5); /* green focus */
    outline: none;
}

/* Buttons */
.btnSubmit {
    width: 100%;
    border-radius: 0.6rem;
    padding: 0.8rem;
    border: none;
    cursor: pointer;
    font-weight: 600;
    background-color: #1538a9ff; /* bright green button */
    color: #fff;
    transition: 0.3s ease;
}

.btnSubmit:hover {
    background-color: #4085d4ff; /* darker green on hover */
    transform: translateY(-2px);
}

/* Error labels */
.error-msg {
    font-size: 0.9rem;
    color: #ff4d4d; /* red error messages */
    margin-top: 0.2rem;
}

/* Responsive */
@media (max-width: 992px) {
    .login-container {
        flex-direction: column;
    }
    .login-card {
        margin-bottom: 20px;
    }
}

    </style>
</head>
<body>

<?php
$emailmsg = $pasdmsg = $msg = $ademailmsg = $adpasdmsg = "";

if (!empty($_REQUEST['ademailmsg'])) $ademailmsg = $_REQUEST['ademailmsg'];
if (!empty($_REQUEST['adpasdmsg'])) $adpasdmsg = $_REQUEST['adpasdmsg'];
if (!empty($_REQUEST['emailmsg'])) $emailmsg = $_REQUEST['emailmsg'];
if (!empty($_REQUEST['pasdmsg'])) $pasdmsg = $_REQUEST['pasdmsg'];
if (!empty($_REQUEST['msg'])) $msg = $_REQUEST['msg'];
?>

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="row login-container w-100">
        <div class="col-lg-6 col-md-12 mb-4">
            <div class="login-card">
                <h3>Admin Login</h3>
                <form action="loginadmin_server_page.php" method="get">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="login_email" placeholder="Your Email *">
                        <?php if ($ademailmsg) echo "<div class='error-msg'>$ademailmsg</div>"; ?>
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" name="login_pasword" placeholder="Your Password *">
                        <?php if ($adpasdmsg) echo "<div class='error-msg'>$adpasdmsg</div>"; ?>
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="btnSubmit" value="Login">
                    </div>
                </form>
            </div>
        </div>

        <div class="col-lg-6 col-md-12">
            <div class="login-card">
                <h3>Student Login</h3>
                <form action="login_server_page.php" method="get">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="login_email" placeholder="Your Email *">
                        <?php if ($emailmsg) echo "<div class='error-msg'>$emailmsg</div>"; ?>
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" name="login_pasword" placeholder="Your Password *">
                        <?php if ($pasdmsg) echo "<div class='error-msg'>$pasdmsg</div>"; ?>
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="btnSubmit" value="Login">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
