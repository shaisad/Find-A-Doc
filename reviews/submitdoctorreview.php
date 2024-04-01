
<!-- 2 constraints : -->


<?php 
session_start();

$review = $_POST['review'];
$rpatientname = $_SESSION['patientname'];

require 'config/dbConfig.php'; 

if (!empty($review)){
    if(isset($_POST["submitreview"])){
        $sno = $_GET['docid'];

        // Check if the user is reviewing themselves
        $doctorQuery = "SELECT doctorid FROM doctor WHERE doctorid = '$sno' AND doctorname = '$rpatientname'";
        $doctorResult = mysqli_query($db, $doctorQuery);
        $doctorData = mysqli_fetch_assoc($doctorResult);

        if ($doctorData) {
           
            echo '<script>alert("You cannot review yourself as a doctor!")</script>'; ///
        } else {
            // Check if the user has already reviewed this doctor
            $checkQuery = "SELECT COUNT(*) as count FROM reviews WHERE rpatientname = '$rpatientname' AND rdoctorid = '$sno'";
            $checkResult = mysqli_query($db, $checkQuery);
            $checkData = mysqli_fetch_assoc($checkResult);

            if ($checkData['count'] > 0) {
                // User has already reviewed this doctor
                echo '<script>alert("You have already reviewed this doctor!")</script>'; ///
            } else {
                // Check if the patient has a 'Done' status from the doctor in requests table
                $statusQuery = "SELECT dstatus FROM requests WHERE frommail = '$rpatientname' AND tomail = (SELECT doctorname FROM doctor WHERE doctorid = '$sno') AND dstatus = 'Done'";
                $statusResult = mysqli_query($db, $statusQuery);
                $statusData = mysqli_fetch_assoc($statusResult);

                if (!$statusData) {
                    echo '<script>alert("You must have a completed appointment with the doctor before giving a review!")</script>'; ///
                } else {
                    
                    $INSERT = "INSERT INTO `reviews` (`rpatientname`, `review`, `rdoctorid`) VALUES ('$rpatientname', '$review', '$sno')";
                
                    if(mysqli_query($db, $INSERT))
                    {
                        echo '<script>alert("Review Successful!")</script>';
                        header("Location: reviews/showreview.php?docid=$sno");
                        exit;
                    }
                    else {
                        echo '<script>alert("Error while submitting review! Please try again!")</script>';
                    }
                }
            }
        }
    }
    else {
        echo '<script>alert("Must click the Post button to submit a review!")</script>';
    }
}
else {
    echo '<script>alert("Review field must be filled to submit a review!")</script>';
}

$db->close();
?>