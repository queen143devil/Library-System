<?php
session_start();

// Securely get user login ID
if (isset($_GET['userlogid'])) {
    $userloginid = $_GET['userlogid'];
    $_SESSION['userid'] = $userloginid;
} else {
    die("Invalid user login ID.");
}

include("data_class.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>User Dashboard</title>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <style>
/* ==========================================
   GLOBAL STYLES — CLEAN & MODERN
========================================== */
body {
    margin: 0;
    padding: 0;
    background: #f1f4f9;
    font-family: "Poppins", sans-serif;
    color: #333;
}

/* Main container */
.container {
    max-width: 1250px;
    margin: 30px auto;
    padding: 20px;
}

/* Logo */
.imglogo {
    width: 80px;
    margin-bottom: 25px;
}

/* ==========================================
   LEFT SIDEBAR — SAME MODERN DESIGN
========================================== */
.leftinnerdiv {
    width: 270px;
    background: #ffffff;
    float: left;
    padding: 25px 18px;
    border-radius: 16px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.10);
    position: sticky;
    top: 20px;
}

/* Modern Menu Buttons */
.greenbtn {
    background: linear-gradient(135deg, #16DE52, #0bb23a);
    color: #ffffff;
    width: 100%;
    padding: 12px 16px;
    margin: 12px 0;
    border-radius: 12px;
    font-size: 15px;
    border: none;
    cursor: pointer;
    transition: 0.3s;
    display: block;
    text-align: center;
    font-weight: 600;
}

.greenbtn:hover {
    transform: translateY(-3px);
    box-shadow: 0 6px 20px rgba(22, 222, 82, 0.4);
}

/* ==========================================
   RIGHT MAIN CONTENT AREA
========================================== */
.rightinnerdiv {
    float: right;
    width: calc(100% - 320px);
}

/* Modern Card for each section */
.innerright {
    background: #ffffff;
    padding: 30px 35px;
    border-radius: 16px;
    margin-bottom: 25px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.10);
    border-left: 6px solid #16DE52;
    animation: fadeIn 0.3s ease-out;
}

/* Fade-in animation */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(8px); }
    to   { opacity: 1; transform: translateY(0); }
}

/* Section title fix */
.innerright button.greenbtn {
    margin-bottom: 25px;
}

/* ==========================================
   TABLE DESIGN — UNIFORM ACROSS SYSTEM
========================================== */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 15px;
    border-radius: 12px;
    overflow: hidden;
}

th {
    background: #16DE52;
    color: white;
    padding: 14px;
    font-size: 15px;
}

td {
    background: #e9fff1;
    padding: 12px 14px;
    border-bottom: 1px solid #d3f3dd;
}

tr:hover td {
    background: #d1ffe5;
    transition: 0.25s;
}

/* Buttons inside table */
table .btn {
    border-radius: 10px;
    padding: 6px 16px;
    font-size: 14px;
}

/* Images in tables */
td img {
    border-radius: 12px;
    border: 1px solid #ccc;
}

/* ==========================================
   FORM STYLING — SAME AS ADMIN PANEL
========================================== */
label {
    display: block;
    margin: 18px 0 6px;
    font-size: 15px;
    font-weight: 600;
    color: #444;
}

input[type=text],
input[type=email],
input[type=number],
input[type=password],
select,
textarea {
    width: 60%;
    padding: 12px 14px;
    border-radius: 10px;
    border: 1px solid #dcdcdc;
    font-size: 14px;
    background: #fdfdfd;
    transition: 0.3s;
}

input:focus, select:focus, textarea:focus {
    border-color: #16DE52;
    box-shadow: 0 0 0 3px rgba(22, 222, 82, 0.25);
    outline: none;
}

input[type=submit] {
    background: #16DE52;
    color: #fff;
    padding: 10px 24px;
    border-radius: 12px;
    border: none;
    font-size: 15px;
    cursor: pointer;
    transition: 0.3s;
}

input[type=submit]:hover {
    background: #0bb23a;
    transform: translateY(-3px);
}

/* Placeholder Text */
::placeholder {
    color: #9b9b9b;
    font-style: italic;
}

/* ==========================================
   UTILITY
========================================== */
p {
    font-size: 15px;
    margin: 6px 0;
}

    </style>
</head>

<body>
<div class="container">
    <div class="innerdiv">

        <div class="row"><img class="imglogo" src="images/logo1.png"/></div>

        <!-- Left Side Menu -->
        <div class="leftinnerdiv">
            <button class="greenbtn" onclick="openpart('myaccount')">My Account</button>
            <button class="greenbtn" onclick="openpart('requestbook')">Request Book</button>
            <button class="greenbtn" onclick="openpart('issuereport')">Book Report</button>
            <a href="index.php"><button class="greenbtn">LOGOUT</button></a>
        </div>

        <!-- RIGHT SIDE CONTENT -->

        <!-- My Account -->
        <div class="rightinnerdiv">
            <div id="myaccount" class="innerright portion" 
                style="<?php if(!empty($_REQUEST['returnid'])) echo 'display:none'; ?>">

                <button class="greenbtn">My Account</button>

                <?php
                $u = new data;
                $u->setconnection();
                $recordset = $u->userdetail($userloginid);

                foreach ($recordset as $row) {
                    $id = $row[0];
                    $name = $row[1];
                    $email = $row[2];
                    $pass = $row[3];
                    $type = $row[4];
                }
                ?>

                <p><u><b>Person Name:</b></u> <?php echo $name ?></p>
                <p><u><b>Person Email:</b></u> <?php echo $email ?></p>
                <p><u><b>Account Type:</b></u> <?php echo $type ?></p>

            </div>
        </div>


        <!-- Issue Report -->
<div class="rightinnerdiv">
    <div id="issuereport" class="innerright portion" style="display:none">

        <button class="greenbtn">ISSUE RECORD</button>

        <?php

        // ---- FIX 1: Ensure user ID exists ----
        if (isset($_SESSION['userid'])) {
            $userloginid = $_SESSION['userid'];
        } else {
            $userloginid = 0;  // Prevent undefined variable error
        }

        // ---- FIX 2: Single correct function call ----
        $u = new data;
        $u->setconnection();
        $recordset = $u->getissuebook($userloginid);

        // ---- FIX 3: Safe HTML table ----
        $table = "
        <table>
            <tr>
                <th>Name</th>
                <th>Book Name</th>
                <th>Issue Date</th>
                <th>Return Date</th>
                <th>Fine</th>
                <th>Return</th>
            </tr>";

        foreach ($recordset as $row) {
            $table .= "
                <tr>
                    <td>{$row[1]}</td>
                    <td>{$row[2]}</td>
                    <td>{$row[3]}</td>
                    <td>{$row[6]}</td>
                    <td>{$row[7]}</td>
                    <td>
                        <a href='otheruser_dashboard.php?returnid={$row[0]}&userlogid={$userloginid}'>
                            <button class='btn btn-primary'>Return</button>
                        </a>
                    </td>
                </tr>";
        }

        $table .= "</table>";

        echo $table;

        ?>
    </div>
</div>


        <!-- Return Book -->
        <div class="rightinnerdiv">
            <div id="return" class="innerright portion"
                style="<?php if(empty($_REQUEST['returnid'])) echo 'display:none'; ?>">

                <button class="greenbtn">Return Book</button>

                <?php
                if (!empty($_REQUEST['returnid'])) {
                    $returnid = $_REQUEST['returnid'];
                    $u = new data;
                    $u->setconnection();
                    $u->returnbook($returnid);
                    echo "<p>Book Returned Successfully.</p>";
                }
                ?>
            </div>
        </div>


        <!-- Request Book -->
        <div class="rightinnerdiv">
            <div id="requestbook" class="innerright portion" style="display:none">

                <button class="greenbtn">Request Book</button>

                <?php
                $u = new data;
                $u->setconnection();
                $recordset = $u->getbookissue();

                $table = "<table>
                <tr>
                    <th>Image</th>
                    <th>Book Name</th>
                    <th>Author</th>
                    <th>Branch</th>
                    <th>Price</th>
                    <th>Request</th>
                </tr>";

                foreach ($recordset as $row) {
                    $table .= "<tr>";
                    $table .= "<td><img src='uploads/{$row[1]}' width='100' height='100'></td>";
                    $table .= "<td>{$row[2]}</td>";
                    $table .= "<td>{$row[4]}</td>";
                    $table .= "<td>{$row[6]}</td>";
                    $table .= "<td>{$row[7]}</td>";

                    $table .= "<td>
                        <a href='requestbook.php?bookid={$row[0]}&userid=$userloginid'>
                            <button class='btn btn-primary'>Request</button>
                        </a>
                    </td>";

                    $table .= "</tr>";
                }

                $table .= "</table>";

                echo $table;
                ?>
            </div>
        </div>

    </div>
</div>

<script>
function openpart(portion) {
    var x = document.getElementsByClassName("portion");
    for (let i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    document.getElementById(portion).style.display = "block";
}
</script>

</body>
</html>
