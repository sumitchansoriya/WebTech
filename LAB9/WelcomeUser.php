<html>
<head>

<style>

body {
  background-image: url('vaccinebg.jpg');
}

table
{
float: center;
position:absolute; 
top:225px; right:100px;
border-style:solid;
border-width:2px;
border-color:#6be3ec;
width: 500px;
height :500px;
color:#fff;
}
th, td {
  padding: 15px;
  text-align: left;
  
}
</style>

</head>
<body>
    <!--<img src="./vaccine_img.jpg" alt="Vaccination Portal" style="position:absolute; top:225px; left:30px; width:630px;height:430px;">-->
<?php

$userProfile = array ("Name"=>$_POST["name"],"Email"=>$_POST["email"],"Age"=>$_POST["age"],"Gender"=>$_POST["gender"],"Mobile"=>$_POST["mobile"],"Username"=>$_POST["username"],"Password"=>$_POST["password"]);
$address =  array ($_POST["address"],$_POST["state"],$_POST["country"]);
$vaccine = array (
  array("First Dose","CoviShield","Jhansi"),
  array("Second Dose","CoviShield","Bengaluru")
);
?>
<h1 style="position:absolute; top:45px; Right:500px; color:#fff">
<?php
$myfile = fopen("vaccination.txt", "r") or die("Unable to open file!");
echo fgets($myfile);
fclose($myfile);
?>
</h1> <br>

<?php

function print_address($location)
{
    echo '<tr>';
    echo "<th> Address </th>";
    echo '<td>'.$location[0].", ".$location[1].", ".$location[2].'</td>';
    echo '</tr>';
}

function print_vaccine($vaccine)
{
    echo '<tr>';
    echo "<th  rowspan='4'> Vaccine </th>";
    echo '<td>'.$vaccine[0][0]." --> ".$vaccine[0][1]." --> ".$vaccine[0][2].'</td>';
    echo '</tr>';

    echo '<tr>';
     echo '<td>'.$vaccine[1][0]." --> ".$vaccine[1][1]." --> ".$vaccine[1][2].'</td>';
    echo '</tr>';
    
}

function userinfo_to_table($userinfo,$location,$vaccine)
{
echo "<center><table border='1'>";
foreach($userinfo as $x => $x_value)
{
    echo '<tr>';
    echo '<th>'.$x.'</th>';
    echo '<td>'.$x_value.'</td>';
    echo '</tr>';
}

print_address($location);

print_vaccine($vaccine);

echo '</table></center>	';
}

userinfo_to_table($userProfile,$address,$vaccine);
?>

<?php
$myfile = fopen("userInfo.txt", "w") or die("Unable to open file!");
$txt = "User Informatio\n\nName : ".$userProfile['Name']."\n";
fwrite($myfile, $txt);
$txt = "Email : ".$userProfile['Email'];
fwrite($myfile, $txt);
fclose($myfile);
?>

</body>
</html>