<?php
$host = "";
$dbUsername = "";
$dbPassword = "";
$dbname = "";

$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

if (mysqli_connect_error()) {
  die('Connect Error(' . mysqli_connect_errno() . ')' . mysqli_connect_error());
}

session_start();
$email = $_SESSION['patientemail'];
$name = $_SESSION['patientname'];
?>

<html>

<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <title>
My Requests
  </title>
  <link rel="stylesheet">
  <link rel="stylesheet" href="requests/patientviewreq.css">
</head>

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

  <?php
  $query = "SELECT DISTINCT pname, date, time, tomail, status, requestId FROM requests WHERE pname = '$name' AND frommail = '$email' ORDER BY date DESC, time DESC";
  $result = mysqli_query($conn, $query);
  ?>
  <div class="container">
    <h1>My Requests</h1>
    <table>
      <thead>
        <tr>
          <th>Appointment Date</th>
          <th>Appointment Time</th>
          <th>Doctor Contact</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($row = mysqli_fetch_array($result)) {
          $date = $row['date'];
          $time = $row['time'];
          $tomail = $row['tomail'];
          $status = $row['status'];
          $requestId = $row['requestId'];
          ?>
          <tr>
            <td style="text-align: center;">
              <?php echo $date; ?>
            </td>
            <td>
              <?php echo $time; ?>
            </td>
            <td>
              <?php echo $tomail; ?>
            </td>
            <td>
              <span class="status <?php echo $status; ?>">
                <?php echo $status; ?>
              </span>
              </td>
              <td>
              <?php
              if ($status == 'Rejected') {
                ?>
                 <a href="patient/reschedule.php?requestId=<?php echo $requestId; ?>" class="mark-as-done-button" > <i class="fa fa-refresh"></i> Reschedule  </a>
                <?php
              }
              else {
                ?>
                 <a href="patient/deleterequest.php?requestId=<?php echo $requestId; ?>" class="mark-as-delete-button">
                 <i class="fa fa-trash-o"></i> Delete
                 </a>

                <?php
              }
              ?>
            </td>
          </tr>
          <?php
        }
        ?>
      </tbody>
    </table>
  </div>
</body>

</html>