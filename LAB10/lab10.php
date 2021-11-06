<?php
    
    $servername ='localhost';
    $username ='root';
    $password ='';
    
	echo "<center><b><h1> Vaccination Portal </h1></b><br><br>";
	
	// Connecting to DB
	$conn = new mysqli($servername, $username, $password);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	echo "<center><h3> Creating a new DB </h3>	<br>";
	// Creating new database
	$sql = "CREATE DATABASE VaccinationPortal";
	if ($conn->query($sql) === TRUE) {
	echo "Database created successfully!<br>";
	} else {
	echo "Error creating database: " . $conn->error;
	}
	echo "<br>--------------------------------------------------------<br>";

    //Creating a Table
    $createQuery="CREATE TABLE VaccinationPortal.Vaccination(
            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            patient varchar(30) NOT NULL,
            vaccine varchar(30),
            location varchar(30),
            vaccinator varchar(30)
        )";

    echo "<h3>Creating the table</h3><br><br>";

    echo "<center><b>Checking if the table exists or not. If not, creating the table: </b>";
    if($conn->query($createQuery)==TRUE)
    {
        echo "<br>Table created successfully!<br><br>";
    }
    else
    {
        echo "Table not created!<br><br>" . $conn->error;
    }
	echo "<br>--------------------------------------------------------<br>";

    //Inserting data in the table

    echo "<h3>Inserting the data</h3><br><br>";

    $insert="INSERT INTO VaccinationPortal.Vaccination VALUES('','Sumit Chansoriya','CoviShield','Jhansi','Arpit Dhir'), ('','Dhoni','CoviShield','Mumbai','Sachin Tendulkar'),('','Amit Chansoriya','Covaxin','Pune','John Doe')";

    if($conn->query($insert)==TRUE){
        echo "The records has been inserted successfully!<br><br>";
    }
    else{
        echo "The records were not inserted!<br><br>".mysqli_error($conn)."<br><br>";
    }

    $names = array();
	echo "--------------------------------------------------------<br>";

    //Selecting rows into array
	echo "<h3>Selecting the data</h3>";

    $result = $conn->query("SELECT * FROM VaccinationPortal.Vaccination ORDER BY id");    

    echo "<h4>Table data</h4>";

    echo "Details of people vaccinated:<br><br>";

    //Printing the data in the table

    while($row = $result->fetch_assoc()) {
        array_unshift($names,$row);
    }

    foreach($names as $name)
    {
        echo $name['id'].'. '.$name['patient'].' - '.$name['vaccine']." - ".$name['location']."<br><br>";
    }

    $result->free();
	echo "--------------------------------------------------------<br>";

    //Updating the data

    echo "<h3>Updating the data</h3><br><br>";

    $update = "UPDATE VaccinationPortal.Vaccination SET vaccinator = 'Chaman' WHERE 'patient' = 'Sumit Chansoriya'";

    if($conn->query($update)==TRUE){
        echo "The record has been updated successfully!<br><br>";
    }
    else{
        echo "The record failed to update!<br><br>".mysqli_error($conn)."<br><br>";
    }

    $result = $conn->query("SELECT * FROM VaccinationPortal.Vaccination");
    $rows = $result->num_rows;

    echo "There are ".$rows." rows in the Vaccination table.<br>";
	echo "--------------------------------------------------------<br>";


    //Deleting the data

    echo "<h3>Deleting the data</h3><br><br>";

    $delete = "DELETE FROM VaccinationPortal.Vaccination WHERE `patient` = 'Amit Chansoriya'";

    if($conn->query($delete) == TRUE){
        echo "The record has been deleted successfully!<br><br>";
    }
    else{
        echo "The record deletion failed!<br><br>".mysqli_error($conn)."<br><br>";
    }

    $result = $conn->query("SELECT * FROM VaccinationPortal.Vaccination");
    $rows = $result->num_rows;

    echo "There are ".$rows." rows in the Vaccination table.<br>";
	echo "--------------------------------------------------------<br>";

    $conn->close();

?>