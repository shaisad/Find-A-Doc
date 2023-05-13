<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accept Booking Request</title>
    </head>
    <style>
body{
    background-color:rgb(9, 52, 69);
}
.attribute {
        font-size: 18px;
        font-style: normal;
        position: relative;
        top: 60px;
        left: 10px;
        font-family: 'Times New Roman', Times, serif;
        }
    .banner{
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 600px;
  height: 300px;
  margin: auto;
  text-align: center;
  font-family: 'Times New Roman', Times, serif;
  background-color: rgb(131, 208, 239);
  position: relative;
  top: 100px;
  border-radius: 5px;
    }
label {
    position: relative;
    right: 10px;
}
.banner .cbtnn1{
    float: left;
  display: block;
  color: rgb(219, 216, 216);
  text-align: center;
  padding: 8px;
  text-decoration:none;
  font-size: 15px;
  background-color: rgb(9, 52, 69);
  margin: 10px;
  border-radius: 5px;
  font-family: 'Times New Roman', Times, serif;
  border: none;
  position: relative;
  top: 40px;
  left: 210px;
}
.banner form input[type="email"]{
    width: 220px;
    font-family: 'Times New Roman', Times, serif;
}
.banner form input[type="checkbox"]{
    width: 45px;
    position: relative;
    left: 7px;
}
.banner .check{
    font-family: 'Times New Roman', Times, serif;
    color:  rgb(9, 52, 69);
    position: relative;
    right: 20px;
    top: 15px;
}
h2{
    color:  rgb(9, 52, 69);
    position: relative;
    top: 80px;
}
    </style>
<body>
    
<div class = "banner"> 
    <h2>Do you want to accept booking request?</h2>
<!--  -->
  <form  >
        <div class = "attribute">
            <button class="cbtnn1" onClick={this.handleAccSubmit}>Accept </button>
            <button class="cbtnn1" onClick={this.handleDecSubmit}>Decline</button></div>
          
</form>
                                      
    </div>
</body>
</html>