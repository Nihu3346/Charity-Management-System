<?php
session_start();
@$connect = mysqli_connect("localhost","root","","charity") or die("couldn't connect!");
@$q = mysqli_query($connect,"SELECT * FROM `ngo_details` WHERE `approve`='1'");
while(@$row = mysqli_fetch_assoc($q))
{
echo "
<!DOCTYPE html>
<html lang='en' dir='ltr'>
  <head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Covid-19</title>
    <link rel='stylesheet' href='style1.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css'>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js' charset='utf-8'></script>
    <style>
body {
    font-family: Arial, Helvetica, sans-serif;
    background-image: url('NGO_homepage.jpg');
    background-repeat:repe;    
    background-size:100% 100%;
}

.navbar {
  overflow: hidden;
  background-color: #3F3A39;
}

.navbar a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.dropdown {
  float: left;
  overflow: hidden;
}
.dropdown_a {
  float: right;
}
.dropdown .dropbtn{
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: red;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}


.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}
.gallery_a img{
  width:250px;
  height: 250px;
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
  margin: 5px;
}

div.gallery {
  margin: 5px;
  border: 1px solid #ccc;
  float: left;
  width: 40px;
  /*height: 300px;*/
}

div.gallery:hover {
  border: 1px solid #777;
}

</style>

    </style>
  </head>
  <body>

    <input type='checkbox' id='check'>
    <!--header area start-->
    <header>
      <div class='left_area'>
        <h3>National <span>Relief</span> Fund</h3>
      </div>
      <label for='check'>
        <i class='fas fa-bars' id='sidebar_btn'></i>
      </label>
      <script>
        function goto()
        {
          location = '1234.php';
        }
      </script>
      <div class='right_area'>
        <button class='logout_btn' onclick='goto()'>Logout</button>
      </div>
    </header>
    <!--header area end-->
    <!--mobile navigation bar start-->
    <div class='mobile_nav'>
      <div class='nav_bar'>
        <img src='1.png' class='mobile_profile_image' alt=''>
        <i class='fa fa-bars nav_btn'></i>
      </div>
<!--      <div class='mobile_nav_items'>
        <a href='#'><i class='fas fa-desktop'></i><span>Dashboard</span></a>
        <a href='#'><i class='fas fa-cogs'></i><span>Components</span></a>
        <a href='#'><i class='fas fa-table'></i><span>Tables</span></a>
        <a href='#'><i class='fas fa-th'></i><span>Forms</span></a>
        <a href='#'><i class='fas fa-info-circle'></i><span>About</span></a>
        <a href='#'><i class='fas fa-sliders-h'></i><span>Settings</span></a>
      </div>-->
    </div>
    <!--mobile navigation bar end-->
    <!--sidebar start-->
    <div class='sidebar'>
      <div class='profile_info'>";
          @$var =$row['email'];
          @$name = $row['name'];

          @$result = mysqli_query($connect,"SELECT `name` FROM `ngo_image` WHERE `ngo_image`.`email`='$var'");
          @$numrows = mysqli_num_rows($result);
          if(@$numrows != 0)
          {
            while(@$row1 = mysqli_fetch_assoc(@$result))
            {
              echo '<img src="uploaded_photos/'.$row1['name'].'" class="profile_image" alt=""/>';
            }
          }                            
        echo "<h4>".$name."</h4>";
      echo "</div>
      <a href='123.php'><i class='fas fa-desktop'></i><span>Dashboard</span></a>
      <a href='profile_ngo_1.php'><i class='fas fa-desktop'></i><span>Profile</span></a>
      <a href='#'><span style='color:red;font-size:20px'>Document</span></a>
      <a href='add-remove_document_2.php'><i class='fas fa-cogs'></i><span>Documents List</span></a>

      <a href='#'><span style='color:red;font-size:20px'>Donors</span></a>
      <a href='#'><i class='fas fa-th'></i><span>Donor List</span></a>
    </div>
    <!--sidebar end-->

    <div class='content'>
    <br><br>
    <center>
      <div class='container'>
      <h2>Photos</h2>
      <div class='gallery_a'>";
      @$t = $row['email'];
      @$qu1 = mysqli_query($connect,"SELECT * FROM `ngo_pictures` WHERE `email` = '$t'");
    while (@$row2 = mysqli_fetch_assoc(@$qu1)) 
    {
      @$id = $row2['id'];
      @$url = 'uploaded_photos/'.$row2['pictures'];
      echo "<img src='".$url."'/>";
    }     
      echo "</div></div>
    </center>

    <br>

    <center><h2>About Us</h2></center>
  <center>
    <br><br>
    <table width='70%'>
      <tr>
        <td>
          <ul><li>";
          @$t1 = $row['email'];
          @$length=2500;
          @$query2 = mysqli_query($connect,"SELECT * FROM `ngo_details` WHERE `email`='$t1'");
          while (@$row3 = mysqli_fetch_assoc(@$query2)) 
          {
            @$dbtname = $row3['description'];
          }
          for ($i=0; $i < strlen($dbtname); $i++)
          {
            echo "".$dbtname[$i].""; 
            if ($dbtname[$i]=='.' && $i < (strlen($dbtname)-1))
            {
              echo "</li><li>";
            }
            else if($i == (strlen($dbtname)-1))
            {
              echo "</li>";
            }
          }
          echo "</ul>
        </td>
      </tr>

    </table>";
  @$t = $row['email'];
@$query1     = mysqli_query($connect,"SELECT * FROM `ngo_details` WHERE `email`='$t'");
  while (@$row4 = mysqli_fetch_assoc(@$query1)) 
  {

    @$dbtname = $row4['person_name'];
    @$dbtemail = $row4['temail'];
    @$dbid1 = $row4['id1'];
    @$dbid2 = $row4['id2'];
    @$dbc1 = $row4['c1'];
    @$dbc2 = $row4['c2'];
    @$dbadd = $row4['address'];
  }

    echo "<br><br>
    <center><h2>Contact Us</h2></center>
    <table width='70%'>
      <tr>
        <td width='20%'>
          Trustee name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
        </td>
        <td>".@$dbtname."</td>
      </tr>

      <tr>
        <td width='20%'>
          <br>
          Trustee Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
        </td>
        <td>".@$dbtemail."</td>
      </tr>

      <tr>
        <td width='20%'>
          <br>
          NGO Email IDs &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
        </td>
        <td>".@$dbid1."<br>".@$dbid2."
        </td>
      </tr>

      <tr>
        <td width='20%'>
          <br>
          NGO Contact No. &nbsp;&nbsp;:
        </td>
        <td>".@$dbc1."<br>".@$dbc2."
        </td>
      </tr>

      <tr>
        <td width='20%'>
          <br>
          NGO Address &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
        </td>
        <td>
          <br>".@$dbadd."
        </td>
      </tr>
    </table>
  </center>
    </div>

    <script type='text/javascript'>
    $(document).ready(function(){
      $('.nav_btn').click(function(){
        $('.mobile_nav_items').toggleClass('active');
      });
    });
    </script>

  </body>
</html>
                           
"; 
}
?>
