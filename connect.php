<?php
	$Name = $_POST['Name'];
	$Roll_no = $_POST['Roll_no'];
	$Section = $_POST['Section'];
	$College_University = $_POST['College_University'];
	$Mobile_No = $_POST['Mobile_No'];
	$Email = $_POST['Email'];
    $Team_member = $_POST['Team_member'];
    $Participation = $_POST['Participation'];
    $Description = $_POST['Description'];

	$conn = new mysqli('localhost','root','','Cultural_Fest_Form');

	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} 
    else {
		$stmt = $conn->prepare("insert into Information(Name, Roll_no, Section, College_University, Mobile_No, Email, Team_member, Participation, Description) values(?, ?, ?, ?, ?, ?, ?, ?, ?)");

		$stmt->bind_param("ssssissss", $Name, $Roll_no, $Section, $College_University, $Mobile_No, $Email, $Team_member, $Participation, $Description);

		$execval = $stmt->execute();
		echo $execval;

		echo "Registration successful...";

		$stmt->close();
		$conn->close();
	}
?>