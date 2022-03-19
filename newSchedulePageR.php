<!DOCTYPE html>
<html lang="en-US">

<head>
	<title>Vulcan Schedule Planner</title>
	<link rel="stylesheet" href="siteStyle.css">
	<style>

	</style>
</head>

<?php
	//starts connection to database
	include "dataConn.php";
	$userI = $_GET["userI"];
	$userI_COURSE_NUM = $_GET["userI_COURSE_NUM"];
	$classID = "";
	$courseID = "";
	
?>

<body>
	<div class="heading">
		<img src="calu_logo_2.png" class="logo">
	</div>
	<ul>
		<li style="padding: 14px 16px"><a href="http://vulcanplanner.gearhostpreview.com/">Home</a></li>
		<li style="padding: 14px 16px"><a href="http://vulcanplanner.gearhostpreview.com/vulcanHome.php">Scheduler</a></li>
		<li style="padding: 14px 16px"><a href="https://mer3942.wixsite.com/vulcanplanner">Project Page</a></li>
		<li style="padding: 14px 16px"><a href="http://vulcanplanner.gearhostpreview.com/newSchedulePage.html">Class Search</a></li>
	</ul>
	<br>
	<br>
	<div class="opening">
		<h1 style="text-align:center; font-size:30px; color:white"> 
			Search for classes! 
		</h1>
	</div>
	<br>
	<br>
	<table>
		<!-- Submission of form navigates User to keySearch page-->
		<form action="newSchedulePageR.html">
			<tr>
				<td style="color:white">
					Subject
				</td>
				<td style="color:white">
					Course Number
				</td>
			</tr>
			<tr>
			<!-- User input in subject line gets sent to search page-->
				<td>
					<input type="text" name="userI" disabled>
				</td>
				<td>
					<input type="text" disabled>
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit"value="Search" disabled>
				</td>
			</tr>
		</form>

	<form method="get" action="/newSchedulePage.html">
    		<button type="submit">Make Another Search</button>
	</form>
		
    </table>
	<br>
	<div class="information">
	<h2 style="border: 1px solid"> Showing classes matching search query </h2>
	
<?php

//echo "</br>";
echo "<h4 style=\"text-align:left\">A '1' in Spring or Fall indicates which semester it is being offered.  A '0' indicates it is not available </h4>" ;
//echo "</br>";

$sql = "SELECT * FROM `class_list` WHERE `Major` = \"$userI\" AND `Class Number` = \"$userI_COURSE_NUM\" ";
$result = $mysqli->query($sql);

//Displays rows
if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
		echo "Major: ". $row["Major"]. "  ". $row["Class Number"]. "  ". $row["Class Name"]. " Credits: ". $row["Credits"]. "\r\n";
		
		$classID = $row["ClassID"];
	}
}

$timesByClassID = "SELECT * FROM `class_requirements` WHERE `ClassID` = \"$classID\" ";
$result = $mysqli->query($timesByClassID);

if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){

		$courseID = $row["CourseID1"];
	}
}

$timesByCourseID = "SELECT * FROM `class_times` WHERE `CourseID` = \"$courseID\" ";
$result = $mysqli->query($timesByCourseID);

if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){

		echo "<br>";
		echo "Start Time: ". $row["StartTime"]. "  End Time ". $row["EndTime"]. " Days of Week: ". $row["DaysOfWeek"]. " Spring: ". $row["SpringSemester"]. " Fall: ".  $row["FallSemester"]. "\r\n";
		echo "<br>";
		echo "<br>";
	}
}


//display the search results that are partial matches
echo "<h2>SHOWING PARTIAL SEARCH QUERY RESULTS</h2>";

//Grabbing rows that have search query in major field
$sqlPartialResults = "SELECT * FROM `class_list` WHERE `Major` LIKE \"$userI\" ";
$result = $mysqli->query($sqlPartialResults);

//Displays rows
if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
		echo "Major: ". $row["Major"]. "  ". $row["Class Number"]. "  ". $row["Class Name"]. " Credits: ". $row["Credits"]."\r\n";
		echo "<br>";
		echo "<br>";
	}
}




?>
</div>

</html>