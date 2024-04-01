<?php
session_start();

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, intial-scale=1.0">
    <title>Doctor Reviews</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Bootstrap CSS -->

    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!--Stylesheet--------------------------->
    <link rel="stylesheet" href="css/style.css" />
    <!--Fav-icon------------------------------>
    <link rel="shortcut icon" href="images/fav-icon.png" />
    <!--poppins-font-family------------------->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!--using-Font-Awesome-------------------->
    <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
</head>

<style>
    /* Reset styles */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Poppins', sans-serif;
        background-color: #093445;
        overflow-x: hidden;
    }

    .credentials {
        position: relative;
        left: 40px;
        top: 60px;
        color: white;
        margin-top: 25px;
    }

    /* Container styles */
    .container {
        max-width: 900px;
        margin: 0 auto;
        padding: 20px;
        position: relative;
        right: 60px;
    }


    .testimonial-heading h1 {
        font-size: 32px;
        font-weight: 600;
        color: white;
        margin-bottom: 30px;
        position: relative;
        left: 520px;
    }

    .testimonial-box-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px;
        align-items: center;
        /* Add align-items property */
    }

    .testimonial-box {
        width: 100vh;
        padding: 20px;
        box-shadow: 0 2px 6px white;
        background-color: #fff;
        transition: transform 0.3s ease;
    }

    .testimonial-box:hover {
        transform: translateY(-5px);
    }

    .testimonial-box .profile {
        display: flex;
        margin-bottom: 15px;
    }


    .testimonial-box .profile .name-user {
        font-size: 18px;
        font-weight: 500;
        color: #093445;
    }

    .testimonial-box .client-comment p {
        font-size: 16px;
        color: #4b4b4b;
        margin-bottom: 15px;
        align-items: center;
        justify-content: center;

    }


    /* Total review count styles */
    .totalreview {
        font-size: 24px;
        font-weight: 600;
        color: white;
        text-align: center;
        position: relative;
        bottom: 20px;
    }

    .totalreview span {
        color: #f8ae46;
    }

    .navbar {
        margin-top: 1px;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        background-color: #2980b9;

        /*rgb(9, 52, 69)*/
        height: 50px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 20px;
        color: #fff;
        z-index: 9999;
    }

    .logo h2 {
        height: 30px;
    }

    .navbar-links {
        margin-top: 4px;
        list-style: none;
        display: flex;
    }

    .navbar-links li {
        margin-left: 10px;
    }

    .navbar-links li:first-child {
        margin-left: 0;
    }

    .navbar-links li a {
        color: #fff;
        text-decoration: none;
        display: inline-block;
        padding: 8px 16px;
        background-color: #2980b9;
        border-radius: 4px;
        transition: background-color 0.3s ease;
    }

    .navbar-links li a:hover {
        background-color: #1e6692;
    }

    hr {
        color: white;
    }
</style>

<body>

    <div class="navbar">
        <div class="logo">
            <h2><i class="fa fa-user-md"></i> Find-A-Doc</h2>
        </div>
        <ul class="navbar-links">
            <li><a href="homepage/HomePage.html"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="patient/homepagepatient.php"><i class="fa fa-home"></i>Dashboard</a></li>
            <li><a href="patient/patientlogout.php"><i class="fa fa-fw fa-sign-out"></i> Logout</a>
            </li>
        </ul>
    </div>
    <hr>



    <?php

    require 'config/dbConfig.php';
    $sno = $_GET['docid'];
    $query = "SELECT doctorname, doctorlocation, doctorid FROM doctor where doctorstatus = 1 and doctor.doctorid = $sno";
    $query_run = mysqli_query($db, $query);
    $check_user = mysqli_num_rows($query_run) > 0;

    if ($check_user) {
        while ($row = mysqli_fetch_assoc($query_run)) {

            $doctorname = $row['doctorname'];
            $doctorlocation = $row['doctorlocation'];

        }
    }

    ?>

    <div class=credentials>
        <h1 class="">Doctor:
            <?php echo $doctorname; ?>
        </h1>
        <h4 class="restlocation">Location:
            <?php echo $doctorlocation; ?>
            </h1>

    </div>


    <?php





    require 'config/dbConfig.php';
    $sno = $_GET['docid'];

    $getr = "SELECT COUNT(*) AS total_reviews FROM reviews WHERE rdoctorid ='$sno'";
    $result = mysqli_query($db, $getr);

    $row = mysqli_fetch_array($result);


    $showr = "SELECT review, rpatientname  FROM reviews WHERE rdoctorid = '$sno' ";
    $result = mysqli_query($db, $showr);

    ?>
    <section id="testimonials">

        <div class="testimonial-heading">
            <h1>Reviewers say..</h1>
        </div>

        <?php

        ?>

        <div class="totalreview">
            <p>Review count:
                <?php echo $row['total_reviews']; ?>
            </p>
        </div>

        <?php






        while ($row = mysqli_fetch_array($result)) {



            ?>


            <div class="container py-1">
                <div class="row mt-3">

                    <!--testimonials-box-container------>
                    <div class="testimonial-box-container">




                        <!--BOX-1-------------->
                        <div class="col-md-6 mt-3">

                            <div class="testimonial-box">
                                <!--top------------------------->
                            <div class="box-top">
                                <!--profile----->
                                <div class="profile">

                                    <!--name-and-username-->
                                        <div class="name-user">
                                            <strong>Patient:
                                                <?php echo $row['rpatientname'] . "<br/>" ?>
                                            </strong>
                                        </div>

                                        <!-- <div class="client-commenttime">
                            <p><?php
                            //echo $row['submitdate']."<br/>"?> </p>
                        </div> -->

                                    </div>

                                </div>
                                <!--Comments---------------------------------------->
                                <div class="client-comment">
                                    <p>Comment:
                                        <?php echo $row['review'] . "<br/>" ?>
                                    </p>
                                </div>

                            </div>


                        </div>
                    </div>
                </div>

        </section>
        <?php

        }


        ?>
</body>

</html>