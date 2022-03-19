<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
     <!--<meta http-equiv="X-UA-Compatible" content="IE=edge">-->
    <title>Vulcan Schedule Planner</title>
	<link rel="stylesheet" href="siteStyle.css">
    <meta name="description" content="An automatic schedule planner">
    <!--<link rel="stylesheet" href="main.css"> -->
</head>

<style>
.button{
  background-color: black;
  border: none;
  color: white;
  padding: 2px 2px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 14px;
  margin: 2px 2px;
  cursor: pointer;
}
</style>

<div class="heading">
		<img src="calu_logo_2.png" class="logo">
	</div>
	<ul>
		<li style="padding: 14px 16px"><a href="http://vulcanplanner.gearhostpreview.com/">Home</a></li>
		<li style="padding: 14px 16px"><a href="http://vulcanplanner.gearhostpreview.com/vulcanHome.php">Scheduler</a></li>
		<li style="padding: 14px 16px"><a href="https://mer3942.wixsite.com/vulcanplanner">Project Page</a></li>
		<li style="padding: 14px 16px"><a href="http://vulcanplanner.gearhostpreview.com/newSchedulePage.html">Class Search</a></li>
	</ul>

<div id="bannerDiv">
<h1 style="color:black; text-align:center; color:white">Welcome to the Vulcan Schedule Planner!</h1>
</div>



<?php

include "dataConn.php";


?>


		
		<h1 style="font-size:20px; color:white">Click on the "Choose File" button to upload a file:</h1>

			<input type="file" id="fileInput">
			

<?php


if(isset($_POST['submit'])){
	$file = $_POST['fileTest.txt'];
	$document = file_get_contents($file);
	echo "File contents" . $document;
}

//Close database connection
$mysqli->close();
?>



<div style="text-align: center;" id="newStudentDiv">

<p style="text-align:center; font-size:18px; color:white;"> Click the button below if you are a highschool student with no SAT/ACT exam scores or placement exam scores </p>



<form action="https://www.calu.edu/catalog/current/undergraduate/academic-departments/computer-information-engineering/bachelor-computer-science.aspx">
   <p style="color:white; font-size:18px;">  For the Cal U suggested schedule to all starting CSC students click here: <a href="https://www.calu.edu/catalog/current/undergraduate/academic-departments/computer-information-engineering/bachelor-computer-science.aspx" class="button regularButton"><button class="button regularButton">Cal U Suggested Schedule</button></a></p>        
   
   
</form>

</div>


<div class="information">
<div>

<h2 style="text-align:center; border: 1px solid"> SAT/ACT and Placement Exam Scores: </h2>

<input type="checkbox"  value="SAT" id="SATTYPE"> Check if Using Old SAT (Pre 2016) scores <br/>
	<br/>
	<br/>

<input type="checkbox"  value="SAT" id="SAT"> 
	Check if using SAT scores <br/>
	SAT Math: <input type="text" id="SATmath" value="">
	SAT English (Evidence Based Reading & Writing): <input type="text" id="SATenglish" value="">
	<br/>
	<br/>
	<input type="checkbox"  value="ACT" id="ACT"> Check if using ACT scores <br/>
	ACT Math: <input type="text" id="ACTmath" value="">
	ACT English: <input type="text" id="ACTenglish" value="">
	<br/>
	<br/>
	Placement Part A: <input type="text" id="PlacementA" value="0">
	<br/>
	Placement Part B: <input type="text" id="PlacementB" value="0">
	<br/>
	<br/>

	<button class="button updateButton" onclick="updateScores()">Update Scores</button>

	<br/>
	<br/>

	Suggested English Course: <input type="text" id="startingEng" value="" readonly>
	<br/>
	<br/>
	Suggested Math Course: <input type="text" id="startingMat" value="" readonly>


</div>







<h1 style="text-align:center; border: 1px solid"> Course Checklist: </h1>

<div style="text-align:center">
	<p>
		Select the semester you are scheduling for:
	</p>
	<input type="checkbox" name='Fall' value="Fall" id = "Fall" onclick = "setSemester(this.id)"> Fall Semester  <br/>
	<input type="checkbox" name='Spring' value="Spring" id = "Spring" onclick = "setSemester(this.id)"> Spring Semester <br/>
</div>

<br/>
<br/>
 <div class="alert alert-info" style="text-align:center">
     <strong>Info!</strong> Double check all courses are checked before generating a schedule to ensure accuracy. <br/>
	 <strong>Info!</strong> Some courses will not have the course id and code displayed due to the large amount of options for that requirement such as freshman year gen ed courses.<br/>
	 <strong>Info!</strong> If you check off a course, we are assuming you have passed with the minimum C- grade to move to the next level.<br/>
 </div>


<h4 style="text-align:left; border: 1px solid">  General Education Requirements: </h4>



<?php

//connection data for connecting to the database in the dataConn.php file
	include "dataConn.php";


	include "databaseCheckboxes.php";



?>
</div>

<br></br>
<br></br>

<h2 style="text-align:center; border: 1px solid; color:white"> Generated Schedule: 

	<div style="text-align:center;">
		<textarea cols='100' rows='20' id="scheduleTextArea" style="font-size:16px; font-family:verdana;" readonly> </textarea>
	</div>	
	
</h2>

<br></br>
<br></br>


<button class="button updateButton" onclick="updateSchedule()">Update Schedule</button>
<button type ="button" class="button updateButton" onclick="download()">Save Schedule</button>

<form method="post"> 
        <input type="submit" name="clearButton"
                class="button clearButton" value="Clear Form" /> 
</form> 


<br></br>
<br></br>




<?php

    if(array_key_exists('clearButton', $_POST)) { 
        clearForm(); 
    } 
    function clearForm() { 
		
			
        echo "The form has been cleared."; 
    } 
	

?>






<script>


var semester = "";
var Fall = document.getElementById("Fall");
var Spring = document.getElementById("Spring");

function setSemester(semesterID){
	
		if(semesterID == "Fall"){
			
			document.getElementById("Spring").checked = false;
			semester = "Fall";
		}else{
			document.getElementById("Fall").checked = false;
			semester = "Spring";
		}
	
	
}

var fileInput = document.getElementById('fileInput');
var fileDisplayArea = document.getElementById('fileDisplayArea');
//Function grabs user input file contents and runs checker to add classes
fileInput.addEventListener('change', function(e) {
	
	
	var file = fileInput.files[0];
    var textType = /text.*/;
    
    if (file.type.match(textType)) {
        var reader = new FileReader();
        
        reader.onload = function(e) {
            var content = reader.result;
			var char = '\n';
            //Here the content has been read successfuly
			console.log(content);
            alert(content);
        
        
        //check for each class in the content of the files
			//if(content.includes("MUS 100" || "ART 106" || "ART 110" || "THE 100"))
			if( (content.includes("MUS 100" )) || (content.includes("ART 100" )) || (content.includes("ART 110" )) || (content.includes("THE 100" )) || (content.includes("ART 000" )) )
			{
				console.log("ART 110 or ART 106 or MUS 100 or THE 100");
				document.getElementById("ART000").checked = true;
				auto_checker("ART000");
				
			}
			/*
			//if(content.includes("BIO 103" || "CHE 101" || "PHS 120" || "PHY 101" || "EAS 100" || "EAS 104"))
			if( (content.includes("BIO 103")) || (content.includes("CHE 101")) || (content.includes("PHS 120")) || (content.includes("PHS 101"))  || (content.includes("EAS 100")) || (content.includes("EAS 104")) || (content.includes("SCI 000")) )
			{
				console.log("Found natural sciences");
				document.getElementById("SCI000").checked = true;
				auto_checker("SCI000");
				
			}
			*/
			//if(content.includes("HIS " || "PHI 100" || "PHI 115" || "PHI 220"))
			if( (content.includes("HIS ")) || (content.includes("PHI 100")) || (content.includes("PHI 115")) || (content.includes("PHI 220")) || (content.includes("HUM 000")) )
			{
				console.log("Found humanities Course");
				document.getElementById("HUM000").checked = true;
				auto_checker("HUM000");
			}
			//if(content.includes("BUS 100" || "ANT 100" || "CMD 108" || "EAS 104" || "GEO 100" || "PSY 100" || "POS " || "SOW 150"))
			if( (content.includes("BUS 100")) || (content.includes("ANT 100")) || (content.includes("CMD 108")) || (content.includes("EAS 104"))  || (content.includes("GEO 100")) || (content.includes("PSY 100")) || (content.includes("POS "))  || (content.includes("SOW 150")) || (content.includes("SOC 000"))  )
			{
				console.log("Found social sciences course");
				document.getElementById("SOC000").checked = true;
				auto_checker("SOC000");
			}
			//if(content.includes("REC 165" || "HSC 115" || "BIO 112" || "BIO 117"))
			if( (content.includes("REC 165" )) || (content.includes("HSC 115" )) || (content.includes("BIO 112" )) || (content.includes("BIO 117" )) || (content.includes("REC 000" )) )
			{
				console.log("REC 165 or HSC 115 or BIO 112 or 117");
				document.getElementById("REC000").checked = true;
				auto_checker("REC000");
			}
			if(content.includes("ENG 100"))
			{
				console.log("Found ENG 100");
				document.getElementById("ENG100").checked = true;
				auto_checker("ENG100");
			}
			if(content.includes("CSC 120"))
			{
				console.log("Found CSC 120");
				document.getElementById("CSC120").checked = true;
				auto_checker("CSC120");
			}
			if(content.includes("CSC 124"))
			{
				console.log("Found CSC 124");
				document.getElementById("CSC124").checked = true;
				auto_checker("CSC124");
			}
			
			if(content.includes("CET 350"))
			{
				console.log("Found CET 350");
				document.getElementById("CET350").checked = true;
				auto_checker("CET350");
			}
			if(content.includes("DMA 092"))
			{
				console.log("Found DMA 092");
				document.getElementById("DMA092").checked = true;
				auto_checker("DMA092");
			}
			if(content.includes("MAT 181"))
			{
				console.log("Found MAT 181");
				document.getElementById("MAT181").checked = true;
				auto_checker("MAT181");
			}
			if(content.includes("MAT 215"))
			{
				console.log("Found MAT 215");
				document.getElementById("MAT215").checked = true;
				auto_checker("MAT215");
			}
			if(content.includes("MAT 281"))
			{
				console.log("Found MAT 281");
				document.getElementById("MAT281").checked = true;
				auto_checker("MAT281");
			}
			if(content.includes("MAT 282"))
			{
				console.log("Found MAT 282");
				document.getElementById("MAT282").checked = true;
				auto_checker("MAT282");
			}
			if(content.includes("UNI 100"))
			{
				console.log("Found UNI 100");
				document.getElementById("UNI100").checked = true;
				auto_checker("UNI100");
			}
			if(content.includes("CSC 216"))
			{
				console.log("Found CSC 216");
				document.getElementById("CSC216").checked = true;
				auto_checker("CSC216");
			}
			if(content.includes("CSC 265"))
			{
				console.log("Found CSC 265");
				document.getElementById("CSC265").checked = true;
				auto_checker("CSC265");
			}
			if(content.includes("CSC 323"))
			{
				console.log("Found CSC 323");
				document.getElementById("CSC323").checked = true;
				auto_checker("CSC323");
			}
			if(content.includes("CSC 328"))
			{
				console.log("Found CSC 328");
				document.getElementById("CSC328").checked = true;
				auto_checker("CSC328");
			}
			if(content.includes("CSC 360"))
			{
				console.log("Found CSC 360");
				document.getElementById("CSC360").checked = true;
				auto_checker("CSC360");
			}
			if(content.includes("CSC 378"))
			{
				console.log("Found CSC 378");
				document.getElementById("CSC378").checked = true;
				auto_checker("CSC378");
			}
			if(content.includes("CSC 400"))
			{
				console.log("Found CSC 400");
				document.getElementById("CSC400").checked = true;
				auto_checker("CSC400");
			}
			if(content.includes("CSC 455"))
			{
				console.log("Found CSC 455");
				document.getElementById("CSC455").checked = true;
				auto_checker("CSC455");
			}
			if(content.includes("CSC 460"))
			{
				console.log("Found CSC 460");
				document.getElementById("CSC460").checked = true;
				auto_checker("CSC460");
			}
			if(content.includes("CSC 475"))
			{
				console.log("Found CSC 475");
				document.getElementById("CSC475").checked = true;
				auto_checker("CSC475");
			}
			if(content.includes("CSC 490"))
			{
				console.log("Found CSC 490");
				document.getElementById("CSC490").checked = true;
				auto_checker("CSC490");
			}
			if(content.includes("CSC 492"))
			{
				console.log("Found CSC 492");
				document.getElementById("CSC492").checked = true;
				auto_checker("CSC492");
			}
			if(content.includes("MAT 195"))
			{
				console.log("Found MAT 195");
				document.getElementById("MAT195").checked = true;
				auto_checker("MAT195");
			}
			if(content.includes("MAT 191"))
			{
				console.log("Found MAT 191");
				document.getElementById("MAT191").checked = true;
				auto_checker("MAT191");
			}
			if(content.includes("MAT 199"))
			{
				console.log("Found MAT 199");
				document.getElementById("MAT199").checked = true;
				auto_checker("MAT199");
			}
			if(content.includes("CSC 304"))
			{
				console.log("Found CSC 304");
				document.getElementById("CSC304").checked = true;
				auto_checker("CSC304");
			}
			if(content.includes("CSC 306"))
			{
				console.log("Found CSC 306");
				document.getElementById("CSC306").checked = true;
				auto_checker("CSC306");
			}
			if(content.includes("CSC 308"))
			{
				console.log("Found CSC 308");
				document.getElementById("CSC308").checked = true;
				auto_checker("CSC308");
			}
			if(content.includes("CSC 419"))
			{
				console.log("Found CSC 419");
				document.getElementById("CSC419").checked = true;
				auto_checker("CSC419");
			}
			if(content.includes("CDC 101"))
			{
				console.log("Found CDC 101");
				document.getElementById("CDC101").checked = true;
				auto_checker("CDC101");
			}
			if(content.includes("ENG 101"))
			{
				console.log("Found ENG 101");
				document.getElementById("ENG101").checked = true;
				auto_checker("ENG101");
			}
			if(content.includes("ENG 100"))
			{
				console.log("Found ENG 100");
				document.getElementById("ENG100").checked = true;
				auto_checker("ENG100");
			}
			if(content.includes("Lab 1"))
			{
				console.log("Found Lab 1");
				document.getElementById("LAB1").checked = true;
				auto_checker("LAB1");
			}
			if(content.includes("Lab 2"))
			{
				console.log("Found Lab 2");
				document.getElementById("LAB2").checked = true;
				auto_checker("LAB2");
			}
			
	}
            
        reader.readAsText(file);	
		} else {
        fileDisplayArea.innerText = "File not supported!"
		}
		
}
);




function searchFile(content)
{
	var input = content;
	
	console.log(input);
	
	
}



	//
	//	Create variables for each of the classes in the checklist
	//	These will allow us to get the value of them with .value, which has the Course ID, Name, And Major. It can also be modified to include the times of the courses
	//	From there we can also access if they are checked or not with .checked
	//
	
	var coursesCompleted = 0;		//will track how many courses the student has completed with at least a C- so far. Does not include classes about to be scheduled.
	
	var coursesScheduled = 0;		//will track how many courses we are having the student take in a semester
	
	//gen ed and elective courses
	var uni100 = document.getElementById("UNI100");
	var cdc101 = document.getElementById("CDC101");
	var healthWellnessCourse = document.getElementById("REC000");
	var humanitiesCourse = document.getElementById("HUM000");
	var fineArtsCourse = document.getElementById("ART000");
	//var naturalSciencesCourse = document.getElementById("SCI000");
	var socialScienceCourse = document.getElementById("SOC000");
	
	
	//english courses
	var eng100 = document.getElementById("ENG100");
	var eng101 = document.getElementById("ENG101");
	var eng217 = document.getElementById("ENG217");
	
	//math courses
	var dma092 = document.getElementById("DMA092");
	
	var mat181 = document.getElementById("MAT181");		//add back int odatabase
	var mat191 = document.getElementById("MAT191");
	var mat195 = document.getElementById("MAT195");
	var mat199 = document.getElementById("MAT199");
	var mat215 = document.getElementById("MAT215");		//add back into the database
	var mat281 = document.getElementById("MAT281");
	var mat282 = document.getElementById("MAT282");
	var mat341 = document.getElementById("MAT341");
	var mat3rdLevel = document.getElementById("MAT441 MAT381");
	
	
	//csc courses
	var csc120 = document.getElementById("CSC120");
	var csc124 = document.getElementById("CSC124");
	var csc216 = document.getElementById("CSC216");
	var csc265 = document.getElementById("CSC265");
	
	var csc304 = document.getElementById("CSC304");
	var csc306 = document.getElementById("CSC306");
	var csc308 = document.getElementById("CSC308");
	
	var csc323 = document.getElementById("CSC323");
	var csc328 = document.getElementById("CSC328");
	var csc352 = document.getElementById("CSC352");
	var csc360 = document.getElementById("CSC360");
	var csc378 = document.getElementById("CSC378");
	var csc400 = document.getElementById("CSC400");
	
	var csc419 = document.getElementById("CSC419");
	
	var csc455 = document.getElementById("CSC455");
	var csc460 = document.getElementById("CSC460");
	var csc475 = document.getElementById("CSC475");
	var csc490 = document.getElementById("CSC490");
	var csc492 = document.getElementById("CSC492");
	var cet350 = document.getElementById("CET350");		//add back into the database
	var cet440 = document.getElementById("CET440");
	
	
	var cscElec = document.getElementById("CSCELE1");
	
	//lab based sciences
	var lab1 = document.getElementById("LAB1");
	//var lab1LVL2 = document.getElementById("LAB1LVL2");
	var lab2 = document.getElementById("LAB2");
	
	
	//---------------------------------------------------------------END CREATING THE COURSE VARIABLES------------------------------------------------------------------------------------------
	


//
//automatically checks off other courses if they are a prerequisite for the class clicked by the user
//
function auto_checker(clicked_value)
{
	if(clicked_value == "CSC124")
	{
		document.getElementById("CSC120").checked = true;
		coursesCompleted +=1;
	}
	else if(clicked_value == "CSC120")
	{
		document.getElementById("CSC120").checked = true;
		coursesCompleted +=1;
	}
	else if(clicked_value == "CSC216")
	{
		document.getElementById("MAT195").checked = true;
		coursesCompleted +=1;
	}
	else if(clicked_value == "CSC265"){
		
		document.getElementById("CSC120").checked = true;
		document.getElementById("CSC124").checked = true;
		coursesCompleted +=2;
	}
	else if(clicked_value == "CSC304"){
		
		document.getElementById("CSC124").checked = true;
		coursesCompleted +=1;
	}
	else if(clicked_value == "CSC306"){
		
		document.getElementById("CSC120").checked = true;
		coursesCompleted +=1;
	}
	else if(clicked_value == "CSC308"){
		
		document.getElementById("CSC120").checked = true;
		document.getElementById("CSC124").checked = true;
		coursesCompleted +=2;
	}
	else if(clicked_value == "CSCELE1"){
		document.getElementById("CSC120").checked = true;
		document.getElementById("CSC124").checked = true;
		document.getElementById("CSC265").checked = true;
		coursesCompleted +=3;
	}
	else if(clicked_value == "CSC323"){
		document.getElementById("CSC120").checked = true;
		document.getElementById("CSC124").checked = true;
		document.getElementById("CSC265").checked = true;
		coursesCompleted +=3;
	}
	else if(clicked_value == "CSC328"){
		document.getElementById("CSC120").checked = true;
		document.getElementById("CSC124").checked = true;
		document.getElementById("CSC265").checked = true;
		coursesCompleted +=3;
	}
	else if(clicked_value == "CSC352"){
		console.log(document.getElementById("ENG101").value)
		document.getElementById("ENG101").checked = true;
		coursesCompleted +=1;
	}
	else if(clicked_value == "CSC360"){
		document.getElementById("CSC120").checked = true;
		document.getElementById("CSC124").checked = true;
		document.getElementById("CSC265").checked = true;
		document.getElementById("CSC328").checked = true;
		coursesCompleted +=4;
	}
	else if(clicked_value == "CSC378"){
		document.getElementById("CSC120").checked = true;
		document.getElementById("CSC124").checked = true;
		document.getElementById("CSC265").checked = true;
		document.getElementById("CSC323").checked = true;
		coursesCompleted +=4;
	}
	else if(clicked_value == "CSC400"){
		document.getElementById("CSC120").checked = true;
		document.getElementById("CSC124").checked = true;
		document.getElementById("CSC265").checked = true;
		document.getElementById("CSC323").checked = true;
		document.getElementById("CSC378").checked = true;
		coursesCompleted +=5;
	}
	else if(clicked_value == "CSC455"){
		document.getElementById("CSC120").checked = true;
		document.getElementById("CSC124").checked = true;
		document.getElementById("CSC265").checked = true;
		document.getElementById("CSC328").checked = true;
		coursesCompleted +=4;
	}
	else if(clicked_value == "CSC460"){
		document.getElementById("CSC120").checked = true;
		document.getElementById("CSC124").checked = true;
		document.getElementById("CSC265").checked = true;
		document.getElementById("CSC323").checked = true;
		document.getElementById("CSC328").checked = true;
		document.getElementById("CSC475").checked = true;
		coursesCompleted +=6;
	}
	else if(clicked_value == "CSC475"){
		document.getElementById("CSC120").checked = true;
		document.getElementById("CSC124").checked = true;
		document.getElementById("CSC216").checked = true;
		document.getElementById("MAT195").checked = true;
		document.getElementById("CSC181").checked = true;
		coursesCompleted +=5;
	}
	else if(clicked_value == "CSC490"){
		document.getElementById("CSC120").checked = true;
		document.getElementById("CSC124").checked = true;
		document.getElementById("CSC265").checked = true;
		//
		//	add checker since the requirements to get in are easy to meet early on
		//
		document.getElementById("CSC181").checked = true;
		coursesCompleted +=4;
	}
	else if(clicked_value == "CSC492"){
		document.getElementById("CSC120").checked = true;
		document.getElementById("CSC124").checked = true;
		document.getElementById("CSC265").checked = true;
		document.getElementById("CSC490").checked = true;
		coursesCompleted +=4;
	}
	//end of csc courses
	else if(clicked_value == "ENG100")
	{
		document.getElementById("ENG100").checked = true;
		coursesCompleted +=1;
	}
	else if(clicked_value == "ENG217")
	{
		document.getElementById("ENG101").checked = true;
		coursesCompleted +=1;
	}
	else if(clicked_value == "MAT215"){
		
		document.getElementById("DMA092").checked = true;
		document.getElementById("MAT181").checked = true;
		coursesCompleted +=2;
	}
	else if(clicked_value == "MAT281"){
		
		document.getElementById("MAT199").checked = true;
		document.getElementById("DMA092").checked = true;
		document.getElementById("MAT181").checked = true;
		document.getElementById("MAT191").checked = true;
		coursesCompleted +=4;
	}
	else if(clicked_value == "MAT282"){
		
		document.getElementById("MAT281").checked = true;
		document.getElementById("MAT199").checked = true;
		document.getElementById("DMA092").checked = true;
		document.getElementById("MAT181").checked = true;
		document.getElementById("MAT191").checked = true;
		coursesCompleted +=5;
	}
	else if(clicked_value == "MAT341"){
		
		document.getElementById("MAT195").checked = true;
		coursesCompleted +=1;
	}
	else if(clicked_value == "CALC3 LIN2"){
		
		document.getElementById("MAT195").checked = true;
		//
		// add more options
		//
		coursesCompleted +=1;
	}
	else if(clicked_value == "CET350"){
		
		document.getElementById("MAT195").checked = true;
		document.getElementById("MAT281").checked = true;
		document.getElementById("CSC120").checked = true;
		document.getElementById("CSC124").checked = true;
		document.getElementById("CSC265").checked = true;
		coursesCompleted +=5;
	}
	else if(clicked_value == "MAT181"){
		document.getElementById("DMA092").checked = true;
		coursesCompleted +=1;
	}
	else if(clicked_value == "MAT191"){
		document.getElementById("DMA092").checked = true;
		document.getElementById("MAT181").checked = true;
		coursesCompleted +=2;
	}
	else if(clicked_value == "MAT199"){
		document.getElementById("DMA092").checked = true;
		document.getElementById("MAT181").checked = true;
		document.getElementById("MAT191").checked = true;
		coursesCompleted +=3;
	}
	else if(clicked_value == "REC000"){
		document.getElementById("REC000").checked = true;
		coursesCompleted +=1;
	}
	else if(clicked_value == "HUM000"){
		document.getElementById("HUM000").checked = true;
		coursesCompleted +=1;
	}
	else if(clicked_value == "ART000"){
		document.getElementById("ART000").checked = true;
		coursesCompleted +=1;
	}
	else if(clicked_value == "SCO000"){
		document.getElementById("SCO000").checked = true;
		coursesCompleted +=1;
	}
	/*
	else if(clicked_value == "SCI000"){
		document.getElementById("SCI000").checked = true;
		coursesCompleted +=1;
	}
	*/
	else if(clicked_value == "DMA092"){
		document.getElementById("DMA092").checked = true;
		coursesCompleted +=1;
	}
	else if(clicked_value == "CDC101"){
		document.getElementById("CDC101").checked = true;
		coursesCompleted +=1;
	}
	else if(clicked_value == "CSC304"){
		document.getElementById("CSC304").checked = true;
		coursesCompleted +=1;
	}
	else if(clicked_value == "CSC306"){
		document.getElementById("CSC306").checked = true;
		coursesCompleted +=1;
	}
	else if(clicked_value == "CSC308"){
		document.getElementById("CSC308").checked = true;
		coursesCompleted +=1;
	}
	else if(clicked_value == "LAB1"){
		document.getElementById("LAB1").checked = true;
		coursesCompleted +=1;
	}
	/*
	else if(clicked_value == "LAB1LVL2"){
		document.getElementById("LAB1LVL2").checked = true;
		coursesCompleted +=1;
	}
	*/
	else if(clicked_value == "LAB2"){
		document.getElementById("LAB2").checked = true;
		coursesCompleted +=1;
	}
	
	
	
	
}




//
// updates the reccommended classes based on the scores entered by the user for the SAT/ACT and placement exams
//
function updateScores() {
	
  //the user is going by new sat scores
  if(document.getElementById("SAT").checked == true && document.getElementById("SATTYPE").checked == false)	
  {
	if(document.getElementById("SATmath").value <= 480 || document.getElementById("PlacementA").value <=11)
    {
    	document.getElementById("startingMat").value = "DMA 092";
    }
    
    if(document.getElementById("SATmath").value >=550 && document.getElementById("SATmath").value < 600 && document.getElementById("PlacementA").value >=11 && document.getElementById("PlacementB").value >=12)
    {
    	document.getElementById("startingMat").value = "MAT 181";
    }
    
    if(document.getElementById("SATmath").value >=600 && document.getElementById("SATmath").value < 660 && document.getElementById("PlacementA").value >=11 && document.getElementById("PlacementB").value >=12)
    {
    	document.getElementById("startingMat").value = "MAT 191";
    }
    
    if(document.getElementById("SATmath").value >=660 && document.getElementById("SATmath").value < 730 && document.getElementById("PlacementA").value >=11 && document.getElementById("PlacementB").value >=12)
    {
    	document.getElementById("startingMat").value = "MAT 199";	
    }
    
    if(document.getElementById("SATmath").value >=730 && document.getElementById("PlacementA").value >=11 && document.getElementById("PlacementB").value >=12)
    {
    	document.getElementById("startingMat").value = "MAT 281";	
    }
    
    
	if(document.getElementById("SATenglish").value < 460)
    {
    	document.getElementById("startingEng").value = "ENG 100";
    }else{
    	document.getElementById("startingEng").value = "ENG 101";
    }
	
}


//the user is using the old sat scores
if(document.getElementById("SAT").checked == true && document.getElementById("SATTYPE").checked == true)	
{
	if(document.getElementById("SATmath").value <= 440 || document.getElementById("PlacementA").value <=11)
    {
    	document.getElementById("startingMat").value = "DMA 092";
    }
    
    if(document.getElementById("SATmath").value >=520 && document.getElementById("SATmath").value < 580 && document.getElementById("PlacementA").value >=11 && document.getElementById("PlacementB").value >=12)
    {
    	document.getElementById("startingMat").value = "MAT 181";
    }
    
    if(document.getElementById("SATmath").value >=580 && document.getElementById("SATmath").value < 640 && document.getElementById("PlacementA").value >=11 && document.getElementById("PlacementB").value >=12)
    {
    	document.getElementById("startingMat").value = "MAT 191";
    }
    
    if(document.getElementById("SATmath").value >=640 && document.getElementById("SATmath").value < 700 && document.getElementById("PlacementA").value >=11 && document.getElementById("PlacementB").value >=12)
    {
    	document.getElementById("startingMat").value = "MAT 199";	
    }
    
    if(document.getElementById("SATmath").value >=700 && document.getElementById("PlacementA").value >=11 && document.getElementById("PlacementB").value >=12)
    {
    	document.getElementById("startingMat").value = "MAT 281";	
    }
		
        
        
    if(document.getElementById("SATenglish").value < 520)
    {
    	document.getElementById("startingEng").value = "ENG 100";
    }else{
    	document.getElementById("startingEng").value = "ENG 101";
    }
	
}


//the student is using ACT scores
if(document.getElementById("ACT").checked == true)	
{
	if(document.getElementById("ACTmath").value <= 18 || document.getElementById("PlacementA").value <=11)
    {
    	document.getElementById("startingMat").value = "DMA 092";
    }
    
    if(document.getElementById("ACTmath").value >=22 && document.getElementById("SATmath").value < 25 && document.getElementById("PlacementA").value >=11 && document.getElementById("PlacementB").value >=12)
    {
    	document.getElementById("startingMat").value = "MAT 181";
    }
    
    if(document.getElementById("ACTmath").value >=25 && document.getElementById("SATmath").value < 28 && document.getElementById("PlacementA").value >=11 && document.getElementById("PlacementB").value >=12)
    {
    	document.getElementById("startingMat").value = "MAT 191";
    }
    
    if(document.getElementById("ACTmath").value >=28 && document.getElementById("SATmath").value < 31 && document.getElementById("PlacementA").value >=11 && document.getElementById("PlacementB").value >=12)
    {
    	document.getElementById("startingMat").value = "MAT 199";	
    }
    
    if(document.getElementById("ACTmath").value >=31 && document.getElementById("PlacementA").value >=11 && document.getElementById("PlacementB").value >=12)
    {
    	document.getElementById("startingMat").value = "MAT 281";	
    }
    
    if(document.getElementById("ACTenglish").value < 19)
    {
    	document.getElementById("startingEng").value = "ENG 100";
    }else{
    	document.getElementById("startingEng").value = "ENG 101";
    }
		
	
}


 
}





function updateSchedule()
{
	//var text = document.getElementById("text");		//used in testing
	var majorElements = document.getElementsByName("majorReq[]");
	var genEdElements = document.getElementsByName("genEdReq[]");
	var electiveElements = document.getElementsByName("electiveReq[]");
	var additionalElements = document.getElementsByName("additionalReq[]");
	
	var matCourse = document.getElementById("startingMat").value;
	var engCourse = document.getElementById("startingEng").value;
	
	var testString = "";
	
	
	//
	//this will be a string that the schedule information is added to, and we will then add the string to the text area
	//we will build a string becuase if you try to add to the text area in seperate areas, you will just be writing over the previous data, so it must all go in at once
	//
	var scheduleText = "";
	var previousCourses = "";
	
	var newStudent = true;
	var checked = false;
	var matchFound = false;

	//text.style.display = "block";
	
	

	//re-initialize the data so on a second run we will still have accurate counts for the courses and an empty text area
	document.getElementById("scheduleTextArea").value = null;
	coursesScheduled = 0;
	coursesCompleted = 0;
	
	

	/*
	//add checker if it is the spring or fall semester
	//the student is new and hasnt taken any courses yet

	*/
	//
	// Generate The schedule for a student that is not a new student
	//
	
	
	
	document.getElementById("scheduleTextArea").value += "Schedule:\n\n";
	
	if(!uni100.checked){		//check if they have completed first year seminar. All students must complete it as soon as possible
		//coursesScheduled = coursesScheduled +1;		//first year seminar is only 1 day a week and is the easiest course someone could possibly take, so we will not count it towards courses scheduled to make sure it is fit in.
		document.getElementById("scheduleTextArea").value += uni100.value + "\n";
	}
	
	previousCourses = addCompletedCourses();		//will fill the coursesCompleted variable before we try to schedule any courses
													//this way we can know how many courses they have taken, and adjust the schedule accordingly.
	console.log("Courses Scheduled before CSC MJR: " + coursesScheduled);
	scheduleText = nextCourse_Major_CSC();		//get the next "major" / building block CSC course the user has to take
	document.getElementById("scheduleTextArea").value += scheduleText;
	
	console.log("Courses Scheduled before mat: " + coursesScheduled);
	scheduleText = nextCourse_MAT();			//get the next math course the user must take
	document.getElementById("scheduleTextArea").value += "\n" + scheduleText;
	
	console.log("Courses Scheduled before eng: " + coursesScheduled);
	scheduleText = nextCourse_ENG();			//get the next english course the user must take
	document.getElementById("scheduleTextArea").value += "\n" + scheduleText;
	
	console.log("Courses Scheduled before gen ed: " + coursesScheduled);
	scheduleText = nextCourse_gen_ed(coursesCompleted, coursesScheduled);	//get the next gen ed course(s) the user must take
	document.getElementById("scheduleTextArea").value += "\n" + scheduleText;
	
	console.log("Courses Scheduled before csc elec: " + coursesScheduled);
	scheduleText = nextCourse_CSC_Electives();	//get the next csc elective course the user must take
	document.getElementById("scheduleTextArea").value += "\n" + scheduleText;
	
	
	
	//warning for the user about taking more classes than is suggested
	if(coursesScheduled > 5){
		document.getElementById("scheduleTextArea").value += "\nIf you have more than 5 courses recommended aside from UNI 100, please see your advisor for the most appropriate option\nThere may be several options that can each be taken later and are not important to take now\n";
	}
	
	document.getElementById("scheduleTextArea").value += previousCourses;		//add the list of courses completed already to the text area
	
	//in for testing only.
	console.log("Courses Scheduled: " + coursesScheduled);
	console.log("Courses Completed: " + coursesCompleted);
	//console.log(csc120.value);
	//console.log(csc124.value);
	console.log(mat281.value);
	console.log(cet440.value);
	console.log(Spring.checked);
	
	
}


//
//	get the next gen ed course recommendation to the user based on how many classes they have taken so far and how many courses they have scheduled so far
//
function nextCourse_gen_ed(numOfCoursesComp, numOfCoursesScheduled){
	var courseFound = false;
	var nextCourseText = " ";		//the variable must be initialized with something in it, if there is nothing there it will return undefined even if we just use "". becuase of this there may be an extra space in the scedule text area, this has no impact on anything other than visual appeal
	
	//schedule public speaking. it is only offered in spring and is a graduation requirement, so we will priotitize this course
	if(semester == "Spring" && !cdc101.checked && coursesScheduled < 5){
	
		nextCourseText += " " + cdc101.value;
		coursesScheduled +=1;
	}
	
	
	//check for lab based science courses
	if(coursesScheduled <=4 && coursesCompleted >=6 && !lab1.checked){
		
		nextCourseText += " \n" + lab1.value;
		coursesScheduled +=1;
	}else if(coursesScheduled <=4 && coursesCompleted >=11 && !lab2.checked)
	{
		nextCourseText += " \n" + lab2.value;
		coursesScheduled +=1;
	}
	/*
	else if(coursesScheduled <=4 && coursesCompleted >=11 && !lab1LVL2.checked)
	{
		nextCourseText += " \n" + lab1LVL2.value;
		coursesScheduled +=1;
	}
	*/
	
	
	if(coursesScheduled <5 && !healthWellnessCourse.checked){
		nextCourseText += " \n" + healthWellnessCourse.value;
		coursesScheduled +=1;
	}
	if(coursesScheduled <5 && !humanitiesCourse.checked){
		nextCourseText += " \n" + humanitiesCourse.value;
		coursesScheduled +=1;
	}
	/*
	if(coursesScheduled <5 && !naturalSciencesCourse.checked){
		nextCourseText += " \n" + naturalSciencesCourse.value;
		coursesScheduled +=1;
	}
	*/
	if(coursesScheduled <5 && !socialScienceCourse.checked){
		nextCourseText += " \n" + socialScienceCourse.value;
		coursesScheduled +=1;
	}
	if(coursesScheduled <5 && !fineArtsCourse.checked){
		nextCourseText += " \n" + fineArtsCourse.value;
		coursesScheduled +=1;
	}
	
	if(coursesScheduled < 5){
		nextCourseText += "\nIf you have less than 5 courses scheduled, you may take a free elective of your choice. You must take more than 10 credits to be considered a full time student.\nBelow are some of our recommendations:\n";
	}
	
	
	
	//this is a CSC course, but it can be taken at about any time and it not crucial to any other csc courses
	if(!csc352.checked && eng101.checked && coursesScheduled <= 4){
			
		nextCourseText += " " + csc352.value;
		courseFound = true;
		coursesScheduled +=1;
	}
	
	if(coursesScheduled <= 4){
			
		nextCourseText += "\nYou have room for a free elective(s) or any Gen Ed Courses you have yet to complete. Ignore if there are still CSC electives you have not taken";
	}

	return nextCourseText;
}




//
//	Generate the next "major" csc course the student must take
//	These are courses that are foundational to the CSC major, such as Object Oriented Programming, Data Structures, Logic and Switch Theory, etc.
//
function nextCourse_Major_CSC(){
	
	var courseFound = false;
	var nextCourseText = "";		//holds the text value of the next course once it is determined
	
	
	if(!csc120.checked && !courseFound)				//add to schedule - CSC 120
	{
		
		if(semester == "Fall"){
			//schedule the next course
			nextCourseText = csc120.value;
			courseFound = true;
			coursesScheduled +=1;
		}else	//it is the spring semester and CSC 120 is not offered, warn the user and suggest they take a gen ed or elective course instead
		{
			nextCourseText = "The Next CSC course you should take is unavailable this semester, please try again next semester for " + csc120.value + " Take an elective or gen ed in place of this course. ";
			//nextCourseText = "The Next CSC course you should take is unavailable this semester, please try again next semester";
			courseFound = true;
		}
		
	}
	else if(!csc124.checked && !courseFound){		// add to schedule - CSC 124
		
		if(csc120.checked){
			
			if(semester == "Spring"){
				
				nextCourseText = csc124.value;
				courseFound = true;
				coursesScheduled +=1;
			}else{	//it is the spring semester and CSC 120 is not offered, warn the user and suggest they take a gen ed or elective course instead
			
				nextCourseText = "The Next CSC course you should take is unavailable this semester, please try again next semester for " + csc124.value + " Take an elective or gen ed in place of this course. ";
				courseFound = true;
			}			
		}
		
		courseFound = true;
	}
	else if(!csc265.checked && !courseFound){		// add to schedule - CSC 265
		
		if(csc124.checked){
			
			if(semester == "Fall"){
				
				nextCourseText = csc265.value;
				courseFound = true;
				coursesScheduled +=1;
			}else{
				
				nextCourseText = "The Next CSC course you should take is unavailable this semester, please try again next semester for " + csc265.value + " Take an elective or gen ed in place of this course. ";
				courseFound = true;
			}
			
			//schedule the next course
			nextCourseText = csc265.value;
		}
		
		courseFound = true;
	}
	else if(  (!csc328.checked ||  !csc323.checked)   && !courseFound){		// add to schedule - CSC 323 and possibly 328
		
		if(csc265.checked){
			
			if(semester == "Spring"){
				
				//schedule the next course
				nextCourseText += csc328.value + "\n\tData Structures and Assembly should be taken together if possible \n" + csc323.value;
				coursesScheduled = coursesScheduled + 2;
			}else{
				
				nextCourseText = "The Next CSC course you should take is unavailable this semester, please try again next semester for " + csc328.value + " " + csc323.value + " Take an elective or gen ed in place of this course. ";
				courseFound = true;
			}
		}
		
		
		courseFound = true;
	}
	else if( (!csc378.checked || !csc360.checked ) && !courseFound){		// add to schedule - CSC 378 and possibly 360
	
		if(semester == "Fall"){
			
			if(csc323.checked){
				//schedule the next course
				nextCourseText = csc378.value + "\n";
				coursesScheduled = coursesScheduled + 1;
			}
			if(csc328.checked){
				//schedule the next course
				nextCourseText += csc360.value + "\n";
				coursesScheduled = coursesScheduled + 1;
			}
	
		}else{
			
			nextCourseText = "The Next CSC course you should take is unavailable this semester, please try again next semester for " + csc378.value + " " + csc360.value + " Take an elective or gen ed in place of this course. ";
			courseFound = true;
		}
		
		
		
		if(!csc323.checked){
			
			nextCourseText += csc323.value + "\n";
			coursesScheduled = coursesScheduled + 1;
		}
		
		if(!csc328.checked){
			nextCourseText += csc328.value + "\n";
			coursesScheduled = coursesScheduled + 1;
		}
		
		
		courseFound = true;
	}
	else if( (!csc400.checked || !csc455.checked ) && !courseFound){		// add to schedule - CSC 400 and possibly 455
		
		
		if(semester == "Spring"){
			
			if(csc378.checked){
				//schedule the next course
				nextCourseText = csc400.value + "\n";
				coursesScheduled = coursesScheduled + 1;
				courseFound = true;
			}
			if(csc328.checked){
				//schedule the next course
				nextCourseText += csc455.value + "\n";
				coursesScheduled = coursesScheduled + 1;
				courseFound = true;
			}
		}else{
			
			nextCourseText = "The Next CSC course you should take is unavailable this semester, please try again next semester for " + csc400.value + " " + csc455.value + " Take an elective or gen ed in place of this course. ";
			courseFound = true;
		}
		
		courseFound = true;
	}
	else if( (!csc490.checked || !csc475.checked ) && !courseFound){		// add to schedule - CSC 490 and possibly 475
	
	
		if(semester == "Fall"){
			
			if(csc265.checked){
				//schedule the next course
				nextCourseText = csc490.value + "\n";
				coursesScheduled = coursesScheduled + 1;
			}
			if(csc216.checked){
				//schedule the next course
				nextCourseText += csc475.value + "\n";
				coursesScheduled = coursesScheduled + 1;
			}
		}else{
			
			nextCourseText = "The Next CSC course you should take is unavailable this semester, please try again next semester for " + csc490.value + " " + csc475.value + " Take an elective or gen ed in place of this course. ";
			courseFound = true;
		}
		
		
		/*
		if(!csc378.checked){
			
			nextCourseText += csc323.value + "\n";
			coursesScheduled = coursesScheduled + 1;
		}
		
		if(!csc360.checked){
			nextCourseText += csc328.value + "\n";
			coursesScheduled = coursesScheduled + 1;
		}
		
		if(!csc328.checked){
			nextCourseText += csc328.value + "\n";
			coursesScheduled = coursesScheduled + 1;
		}
		*/
		
		courseFound = true;
	}
	else if( (!csc492.checked || !csc460.checked ) && !courseFound){		// add to schedule - CSC 492 and possibly 460
		
		
		if(semester == "Spring"){
			
			if(csc490.checked){
				//schedule the next course
				nextCourseText = csc492.value + "\n";
				coursesScheduled = coursesScheduled + 1;
			}
			if(csc475.checked){
				//schedule the next course
				nextCourseText += csc460.value + "\n";
				coursesScheduled = coursesScheduled + 1;
			}
			
			courseFound = true;
		}else{
			
			nextCourseText = "The Next CSC course you should take is unavailable this semester, please try again next semester for " + csc492.value + " " + csc460.value + " Take an elective or gen ed in place of this course. ";
			courseFound = true;
		}
		
		
		/*	
		if(!csc378.checked){
			
			nextCourseText += csc323.value + "\n";
			coursesScheduled = coursesScheduled + 1;
		}
		
		if(!csc360.checked){
			nextCourseText += csc328.value + "\n";
			coursesScheduled = coursesScheduled + 1;
		}
		
		if(!csc328.checked){
			nextCourseText += csc328.value + "\n";
			coursesScheduled = coursesScheduled + 1;
		}
		*/
		
		courseFound = true;
	}
	
	
	
	//console.log(nextCourseText);		//used to monitor the results in testing, can be viewed with 'F12' in the browser's console window
	return nextCourseText;
}


//
//	get the next CSC electives the user must take. These 
//
function nextCourse_CSC_Electives(){
	var courseFound = false;
	var nextCourseText = "";
	var elecReq1 = false;		//tracks if the user has completed 1 of CSC 322, 420, 424, or 485
	var elecReq2 = false;		//tracks if the user has completed at least 2 of CSC 304, 306, 308 or an internship
	
	var elecCSC304 = false;
	var elecCSC306 = false;
	var elecCSC308 = false;
	var elecCSC216 = false;
	
	var optionalElecsTaken = 0;
	
	
	if(csc304.checked){
		elecCSC304 = true;
		optionalElecsTaken += 1;
	}
	if(csc306.checked){
		elecCSC306 = true;
		optionalElecsTaken += 1;
	}
	if(csc308.checked){
		elecCSC308 = true;
		optionalElecsTaken += 1;
	}
	
	
	//dont recommend a CSC elective unless they have cleared earlier gen ed courses and have taken up to CSC 265 - Object Oriented Programming
	
	if(coursesCompleted >= 10 && coursesScheduled <=4 && csc265.checked && optionalElecsTaken < 2){
		
		if(!csc304.checked || !csc306.checked || !csc308.checked){
			
			nextCourseText += "\nTake 1 of " + csc304.value + " or " + csc306.value + " or " + csc304.value;
			courseFound = true;
			coursesScheduled +=1;
			elecReq1 = true;
		}
	}
	
	
	if(!csc216.checked){
		if(coursesCompleted >= 15 && coursesScheduled <= 4){

			nextCourseText += " " + csc216.value;
			courseFound = true;
			coursesScheduled +=1;
			elecCSC216 = true;
		}
	}
	
	if(!cet350.checked && coursesCompleted >= 25 && csc265.checked && mat281.checked ** !elecCSC216){
		
		nextCourseText += " " + cet350.value;
		courseFound = true;
		coursesScheduled +=1;
	}
	
	
	if(coursesCompleted >= 25 && coursesScheduled <=4 && !cscElec.checked){
		
		if(csc328.checked){
			
			nextCourseText += "1 of " + cscElec.value;
			courseFound = true;
			coursesScheduled +=1;
		}
		
	}
	
	if(coursesCompleted >= 25 && optionalElecsTaken < 2){
		
		if(!csc304.checked || !csc306.checked || !csc308.checked){
			
			nextCourseText += "Take the other 1 of " + csc304.value + " or " + csc306.value + " or " + csc304.value + "that you have not completed yet ";
			courseFound = true;
			coursesScheduled +=1;
			elecReq2 = true;
		}
	}
	
	
	
	return nextCourseText;
}





//
//	Generate the next mat course the student must take
//	These will go up through all of the math courses required by the major.
//	"MAT Complete" Will be returned if all of the required courses have been completes
//
function nextCourse_MAT(){
	var nextCourseMAT = "";
	var matchFound = false;
	var extraMAT = false;		//tracks if they are taking an extra mat course. if true we will not recommend a third
	
	if(!dma092.checked && !matchFound){		//available in both spring and fall, so there is no need to check the current semester
		
		nextCourseMAT = dma092.value;
		coursesScheduled = coursesScheduled +1;
		matchFound = true;
	}
	else if(!mat181.checked && !matchFound){	//available in both spring and fall, so there is no need to check the current semester
		
		nextCourseMAT = mat181.value;
		matchFound = true;
		coursesScheduled = coursesScheduled +1;
	}
	else if(!mat191.checked && !matchFound){		//available in both spring and fall, so there is no need to check the current semester
		
		nextCourseMAT = mat191.value;
		matchFound = true;
		coursesScheduled = coursesScheduled +1;
	}
	else if(!mat199.checked && !matchFound){		//available in both spring and fall, so there is no need to check the current semester
		
		//check if they have taken discrete math yet
		if(Spring.checked){
				
				nextCourseMAT = " " + mat195.value;
				coursesScheduled = coursesScheduled +1;
				matchFound = true;
				extraMAT = true;
		}else{
			
			nextCourseMAT = mat199.value;
			matchFound = true;
			coursesScheduled = coursesScheduled +1;
		}
		
		if(!mat341.checked && !extraMAT){		//available in both spring and fall, so there is no need to check the current semester
			
			if(coursesScheduled <= 4){
				
				nextCourseMAT += " " + mat341.value;
				coursesScheduled = coursesScheduled +1;
			}
			extraMAT = true;
		}

	}
	else if(!mat281.checked && !matchFound){		//available in both spring and fall, so there is no need to check the current semester
		
		//check if they have taken discrete math yet
		if(!mat195.checked && Spring.checked){
			
			nextCourseMAT += mat281.value + " AND \n" + mat195.value;
			coursesScheduled = coursesScheduled +2;
			matchFound = true;
			extraMAT = true;

		}else{
				
				nextCourseMAT += " " + mat281.value;
				coursesScheduled = coursesScheduled +1;
		}

		
		if(!mat341.checked && !extraMAT && coursesCompleted >=10){		//available in both spring and fall, so there is no need to check the current semester
			
			if(coursesScheduled <= 4){
				
				nextCourseMAT += " AND \n" + mat341.value;
				coursesScheduled = coursesScheduled +1;
				extraMAT = true;
			}
		}
		
		
	}
	else if(!mat282.checked && !matchFound){		//available in both spring and fall, so there is no need to check the current semester
		
		//check if they have taken discrete math yet
		if(!mat195.checked && Spring.checked){
			
			nextCourseMAT += mat282.value + " AND \n" + mat195.value;
			coursesScheduled = coursesScheduled +2;
			matchFound = true;
			extraMAT = true;

		}else{
				
				nextCourseMAT += " " + mat282.value;
				coursesScheduled = coursesScheduled +1;
		}
		
		
		if(!mat341.checked && !extraMAT){
			
			if(coursesScheduled <= 4){
				
				nextCourseMAT += " AND " + mat341.value;
				coursesScheduled = coursesScheduled +1;
				extraMAT = true;
			}
		}
		
	}
	else if(!mat3rdLevel.checked && !matchFound){
		
		//check if they have taken discrete math yet
		if(!mat195.checked){
			
			if(Spring.checked){
				
				nextCourseMAT = " " + mat195.value;
				coursesScheduled = coursesScheduled +1;
				matchFound = true;
				extraMAT = true;
			}else{
				
				nextCourseMAT += "This MAT course is unavailable this semester, please try again next semester for " + mat195.value;
			}

		}else{
			
			nextCourseMAT = mat3rdLevel.value;
			matchFound = true;
			coursesScheduled = coursesScheduled +1;
		}
		
	}
	else{
		nextCourseMAT = "ALL MATH COURSES COMPLETE";
	}
	
	
	if(coursesCompleted >=17 && coursesScheduled <= 4 && !mat215.checked){		//mat 215 is available in both spring and fall, so we do not need to check what semester the user is scheduling for
		
		nextCourseMAT += " \n" + mat215.value + " Take if you have room instead of a gen ed or free elective\n";
		coursesScheduled = coursesScheduled+1;
	}
	
	
	return nextCourseMAT;
}




//
//	Generate the next english course the student must take
//	These will go up through all of the english courses required by the major.
//	"ENG Complete" Will be returned if all of the required courses have been completes
//
function nextCourse_ENG(){
	var nextCourseENG = "No required ENG courses available to be taken this semester.";
	var matchFound = false;
	
	if(!eng100.checked){
		
		nextCourseENG = eng100.value;
		matchFound = true;
		coursesScheduled = coursesScheduled +1;
	}
	
	if(Spring.checked && !matchFound){
			if(!eng101.checked && !matchFound){
				
				if(!eng100.checked){
		
					nextCourseENG = eng100.value;
					matchFound = true;
					coursesScheduled = coursesScheduled +1;
				}else{
					nextCourseENG = eng101.value;
					matchFound = true;
					coursesScheduled = coursesScheduled +1;
				}
				
			}
			else if(!eng217.checked && !matchFound){
		
				nextCourseENG = eng217.value;
				matchFound = true;
				coursesScheduled = coursesScheduled +1;
			}
			else if(eng217.checked && eng101.checked){
		
				nextCourseENG = "ALL ENGLISH COURSES COMPLETE";
				matchFound = true;
			}

	}
	
	if(eng100.checked && eng101.checked && eng217.checked){
		nextCourseENG = "ALL ENGLISH COURSES COMPLETE";
		matchFound = true;
	}
	
	
	return nextCourseENG;
}






//
//go through each of the checkboxes and track which ones are checked. if it is, add it to a string and that string will be returned and printed in the generted schedule text area
//
function addCompletedCourses(){
	
	var numOfCourses = 0;
	var compCourses = "\n\nPreviously Completed Courses: \n";
	
	
	//
	//go through a series of if statements and check each course to see if it is checked
	//if it is checked, the course has been taken and we will add that text to the generated schedule and increment the value for the number of courses taken
	//
	
	
	
	if(uni100.checked){
		compCourses = compCourses + "\t" + uni100.value + "\n";
		numOfCourses++;
	}
	if(cdc101.checked){
		compCourses = compCourses + "\t" + cdc101.value + "\n";
		numOfCourses++;
	}
	if(healthWellnessCourse.checked){
		compCourses = compCourses + "\t" + healthWellnessCourse.value + "\n";
		numOfCourses++;
	}
	if(humanitiesCourse.checked){
		compCourses = compCourses + "\t" + humanitiesCourse.value + "\n";
		numOfCourses++;
	}
	if(fineArtsCourse.checked){
		compCourses = compCourses + "\t" + fineArtsCourse.value + "\n";
		numOfCourses++;
	}
	/*
	if(naturalSciencesCourse.checked){
		compCourses = compCourses + "\t" + naturalSciencesCourse.value + "\n";
		numOfCourses++;
	}
	*/
	if(socialScienceCourse.checked){
		compCourses = compCourses + "\t" + socialScienceCourse.value + "\n";
		numOfCourses++;
	}

	if(eng100.checked){
		compCourses = compCourses + "\t" + eng100.value + "\n";
		numOfCourses++;
	}
	

	if(eng101.checked){
		compCourses = compCourses + "\t" + eng101.value + "\n";
		numOfCourses++;
	}
	
	if(eng217.checked){
		compCourses = compCourses + "\t" + eng217.value + "\n";
		numOfCourses++;
	}
	if(dma092.checked){
		compCourses = compCourses + "\t" + dma092.value + "\n";
		numOfCourses++;
	}
	if(mat181.checked){
		compCourses = compCourses + "\t" + mat181.value + "\n";
		numOfCourses++;
	}
	if(mat191.checked){
		compCourses = compCourses + "\t" + mat191.value + "\n";
		numOfCourses++;
	}
	if(mat195.checked){
		compCourses = compCourses + "\t" + mat195.value + "\n";
		numOfCourses++;
	}
	if(mat199.checked){
		compCourses = compCourses + "\t" + mat199.value + "\n";
		numOfCourses++;
	}
	
	if(mat215.checked){
		compCourses = compCourses + "\t" + mat215.value + "\n";
		numOfCourses++;
	}
	
	if(mat281.checked){
		compCourses = compCourses + "\t" + mat281.value + "\n";
		numOfCourses++;
	}
	if(mat282.checked){
		compCourses = compCourses + "\t" + mat282.value + "\n";
		numOfCourses++;
	}
	if(mat341.checked){
		compCourses = compCourses + "\n" + mat341.value + "\n";
		numOfCourses++;
	}
	if(mat3rdLevel.checked){
		compCourses = compCourses + "\t" + mat3rdLevel.value + "\n";
		numOfCourses++;
	}
	if(csc120.checked){
		compCourses = compCourses + "\t" + csc120.value + "\n";
		numOfCourses++;
	}
	if(csc124.checked){
		compCourses = compCourses + "\t" + csc124.value + "\n";
		numOfCourses++;
	}
	if(csc216.checked){
		compCourses = compCourses + "\t" + csc216.value + "\n";
		numOfCourses++;
	}
	if(csc265.checked){
		compCourses = compCourses + "\t" + csc265.value + "\n";
		numOfCourses++;
	}
	if(csc304.checked){
		compCourses = compCourses + "\t" + csc304.value + "\n";
		numOfCourses++;
	}
	if(csc306.checked){
		compCourses = compCourses + "\t" + csc306.value + "\n";
		numOfCourses++;
	}
	if(csc308.checked){
		compCourses = compCourses + "\t" + csc308.value + "\n";
		numOfCourses++;
	}
	if(csc323.checked){
		compCourses = compCourses + "\t" + csc323.value + "\n";
		numOfCourses++;
	}
	if(csc328.checked){
		compCourses = compCourses + "\t" + csc328.value + "\n";
		numOfCourses++;
	}
	if(csc352.checked){
		compCourses = compCourses + "\t" + csc352.value + "\n";
		numOfCourses++;
	}
	if(csc360.checked){
		compCourses = compCourses + "\t" + csc360.value + "\n";
		numOfCourses++;
	}
	if(csc378.checked){
		compCourses = compCourses + "\t" + csc378.value + "\n";
		numOfCourses++;
	}
	if(csc400.checked){
		compCourses = compCourses + "\t" + csc400.value + "\n";
		numOfCourses++;
	}
	
	
	
	if(csc419.checked){
		compCourses = compCourses + "\t" + csc419.value + "\n";
		numOfCourses++;
	}
	
	
	
	if(csc455.checked){
		compCourses = compCourses + "\t" + csc455.value + "\n";
		numOfCourses++;
	}
	if(csc460.checked){
		compCourses = compCourses + "\t" + csc460.value + "\n";
		numOfCourses++;
	}
	if(csc475.checked){
		compCourses = compCourses + "\t" + csc475.value + "\n";
		numOfCourses++;
	}
	if(csc490.checked){
		compCourses = compCourses + "\t" + csc490.value + "\n";
		numOfCourses++;
	}
	if(csc492.checked){
		compCourses = compCourses + "\t" + csc490.value + "\n";
		numOfCourses++;
	}
	
	
	
	
	
	
	if(cet350.checked){
		compCourses = compCourses + "\t" + cet350.value + "\n";
		numOfCourses++;
	}
	
	
	if(cscElec.checked){
		compCourses = compCourses + "\t" + cscElec.value + "\n";
		numOfCourses++;
	}
	
	/*
	if(lab1LVL1.checked){
		compCourses = compCourses + "\t" + lab1LVL1.value + "\n";
		numOfCourses++;
	}
	*/
	
	if(lab1.checked){
		compCourses = compCourses + "\t" + lab1.value + "\n";
		numOfCourses++;
	}
	if(lab2.checked){
		compCourses = compCourses + "\t" + lab2.value + "\n";
		numOfCourses++;
	}
	
	
	
	coursesCompleted = numOfCourses;
	console.log("Completed courses: " + coursesCompleted);
	
	return compCourses;
}




//
//	Downloads the contents of the schedule text area as a .txt file when the user clicks on the download button
//
function download(){
    var text = document.getElementById("scheduleTextArea").value;
    text = text.replace(/\n/g, "\r\n"); // To retain the Line breaks.
    var blob = new Blob([text], { type: "text/plain"});
    var anchor = document.createElement("a");
    anchor.download = "schedule_download.txt";
    anchor.href = window.URL.createObjectURL(blob);
    anchor.target ="_blank";
    anchor.style.display = "none"; // just to be safe andavoid errors
    document.body.appendChild(anchor);
    anchor.click();
    document.body.removeChild(anchor);
 }

 

</script>






</body>



</html>









