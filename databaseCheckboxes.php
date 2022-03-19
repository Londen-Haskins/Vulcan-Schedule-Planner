
<?php

	include "dataConn.php";

	echo "<span> Select Gen Ed Courses: </span><br/>";
	
	//----------------------------------------UNI 100 First Year Seminar------------------------------------------------------------------------------------------------------------------------
	echo"<input type=\"checkbox\" name='genEdReq[]' value=\"UNI 100 First Year Seminar\" id=\"UNI100\"> First Year Seminar (UNI 100) <br/>";	//add the first year seminar checkbox
	
	
	//----------------------------------------ENG 101------------------------------------------------------------------------------------------------------------------------
	$sqlSearch = "SELECT * FROM `class_list` WHERE `Major` = \"ENG\" AND `Class Number` = \"101\"";		//search query for UNI 100 First Year Seminar
	$result = $mysqli->query($sqlSearch);

	//get data from the row and combine it into one variable
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$courseDetailsENG101 = $row["Major"]. " " . $row["Class Number"]. " " . $row["Class Name"];
		}
	}
	
	echo "<input type=\"checkbox\" name=\'genEdReq[]\' value=\"$courseDetailsENG101\" id = \"ENG101\" > English Comp I (ENG 101) <br/>";	//add the eng 101 checkbox
	//---------------------------------------END ENG 101-------------------------------------------------------------------------------------------------------------------------
	
	
	echo "<input type=\"checkbox\" name='genEdReq[]' value=\"CDC 101 Public Speaking\" id=\"CDC101\"> Public Speaking (CDC 101) <br/>";				//add the public speaking checkbox
	
	
	//-----------------------------------------MAT 281---------------------------------------------------------------------------------------------------------------
	$mat281sqlSearch = "SELECT * FROM `class_list` WHERE `Major` = \"MAT\" AND `Class Number` = \"281\"";		//search query for MAT 281 Calc 1
	$result = $mysqli->query($mat281sqlSearch);

	//get data from the row and combine it into one variable
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$courseDetailsMAT281 = $row["Major"]. " " . $row["Class Number"]. " " . $row["Class Name"];
		}
	}
	
	echo "<input type=\"checkbox\" name=\'genEdReq[]\' value=\"$courseDetailsMAT281\" id = \"MAT281\" onClick = \"auto_checker(this.id)\"> Calc I (MAT 281) <br/>";	//checkbox with the search query data as the value
	//---------------------------------------END MAT 281-------------------------------------------------------------------------------------------------------------------------
	
	
	echo "<input type=\"checkbox\" name='genEdReq[]' value=\"Health and Wellness Course REC 165, HSC 115, BIO 112 / 117\" id=\"REC000\"> Health and Wellness Course: (REC 165, HSC 115, BIO 112 / 117) <br/>";


	//----------------------------------------CSC 120--------------------------------------------------------------------------------------------------------------------------
	$csc120sqlSearch = "SELECT * FROM `class_list` WHERE `Major` = \"CSC\" AND `Class Number` = \"120\"";		//search query for CSC 120
	$result = $mysqli->query($csc120sqlSearch);

	//get data from the row and combine it into one variable
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$courseDetailsCSC120 = $row["Major"]. " " . $row["Class Number"]. " " . $row["Class Name"];
		}
	}
	
	echo "<input type=\"checkbox\" name=\'genEdReq[]\' value=\"$courseDetailsCSC120\" id = \"CSC120\" > Prob Solv/Prg Const (CSC 120) <br/>";
	//----------------------------------------END CSC 120-------------------------------------------------------------------------------------------------------------------------

	echo "<input type=\"checkbox\" name='genEdReq[]' value=\"HUM 000 Humanities Course\" id=\"HUM000\"> Humanities Course: Any History Course, PHI 100, PHI 100 <br/>";
	echo "<input type=\"checkbox\" name='genEdReq[]' value=\"ART 000 Fine Arts\" id=\"ART000\"> Fine Arts: MUS 100, THE 100, ART 100, ART 110 <br/> ";
	//echo "<input type=\"checkbox\" name='genEdReq[]' value=\"SCI 000  Natural Sciences Course\" id=\"SCI000\"> Natural Sciences Course <br/> ";
	echo "<input type=\"checkbox\" name='genEdReq[]' value=\"SOC 000 Social Science Course\" id=\"SOC000\"> Social Science Course: BUS 100, ANT 100, CMD 108, EAS 104, PSY 100, POS 100 <br/> <br/>";

	echo "<span> Degree Specific Gen Eds: </span><br/>";


	//----------------------------------------CSC 352 Query-------------------------------------------------------------------------------------------------------------------------
	$csc352sqlSearch = "SELECT * FROM `class_list` WHERE `Major` = \"CSC\" AND `Class Number` = \"352\"";		//search query for CSC 352
	$result = $mysqli->query($csc352sqlSearch);

	//get data from the row and combine it into one variable
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$courseDetailsCSC352 = $row["Major"]. " " . $row["Class Number"]. " " . $row["Class Name"];
		}
	}
	
	echo "<input type=\"checkbox\" name=\'genEdReq[]\' value=\"$courseDetailsCSC352\" id = \"CSC352\" onClick = \"auto_checker(this.id)\"> Global Eco & Soc Iss in Comput (CSC 352) <br/>";
	//----------------------------------------CSC 352 END-------------------------------------------------------------------------------------------------------------------------


	//----------------------------------------CSC 124 Query-------------------------------------------------------------------------------------------------------------------------
	$csc124sqlSearch = "SELECT * FROM `class_list` WHERE `Major` = \"CSC\" AND `Class Number` = \"124\"";		//search query for CSC 124
	$result = $mysqli->query($csc124sqlSearch);

	//get data from the row and combine it into one variable
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$courseDetailsCSC124 = $row["Major"]. " " . $row["Class Number"]. " " . $row["Class Name"];
		}
	}

	echo "<input type=\"checkbox\" name=\'genEdReq[]\' value=\"$courseDetailsCSC124\" id = \"CSC124\" onClick = \"auto_checker(this.id)\"> Comp Programming I (CSC 124) <br/>";		//add the csc 124 checkbox
	//----------------------------------------CSC 124 END-------------------------------------------------------------------------------------------------------------------------



	//----------------------------------------MAT 282 Query-------------------------------------------------------------------------------------------------------------------------
	$mat282sqlSearch = "SELECT * FROM `class_list` WHERE `Major` = \"MAT\" AND `Class Number` = \"282\"";		//search query for MAT 281 Calc 2
	$result = $mysqli->query($mat282sqlSearch);

	//get data from the row and combine it into one variable
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$courseDetailsMAT282 = $row["Major"]. " " . $row["Class Number"]. " " . $row["Class Name"];
		}
	}
	
	echo "<input type=\"checkbox\" name=\'genEdReq[]\' value=\"$courseDetailsMAT282\" id = \"MAT282\" onClick = \"auto_checker(this.id)\"> Calc II (MAT 282) <br/>";	//add the mat 282 checkbox
	//----------------------------------------MAT 282 END-------------------------------------------------------------------------------------------------------------------------


	//----------------------------------------ENG 217 Query------------------------------------------------------------------------------------------------------------------------
	$eng217sqlSearch = "SELECT * FROM `class_list` WHERE `Major` = \"ENG\" AND `Class Number` = \"217\"";		//search query for ENG 217 First Year Seminar
	$result = $mysqli->query($eng217sqlSearch);

	//get data from the row and combine it into one variable
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$courseDetailsENG217 = $row["Major"]. " " . $row["Class Number"]. " " . $row["Class Name"];
			//echo $courseDetailsENG217;
		}
	}
	
	echo "<input type=\"checkbox\" name=\'genEdReq[]\' value=\"$courseDetailsENG217\" id = \"ENG217\" onClick = \"auto_checker(this.id)\"> Scientific and Technical Writing (ENG 217) <br/> ";	//add the eng 217 checkbox
	//---------------------------------------END ENG 217-------------------------------------------------------------------------------------------------------------------------
	
	echo "</br></br></br></br>";	//add 4 blank spaces for formatting
	echo "<h4 style=\"text-align:left; border: 1px solid\">  Major in CSC Requirements: </h4>";

	echo "<span> Required Major Courses: </span><br/>";



	//----------------------------------------CSC 216 Query-------------------------------------------------------------------------------------------------------------------------
	$csc216sqlSearch = "SELECT * FROM `class_list` WHERE `Major` = \"CSC\" AND `Class Number` = \"216\"";		//search query for CSC 216
	$result = $mysqli->query($csc216sqlSearch);

	//get data from the row and combine it into one variable
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$courseDetailsCSC216 = $row["Major"]. " " . $row["Class Number"]. " " . $row["Class Name"];
		}
	}

	echo "<input type=\"checkbox\" name=\'majorReq[]\' value=\"$courseDetailsCSC216\" id = \"CSC216\" onClick = \"auto_checker(this.id)\"> Log & Switch Theory (CSC 216) <br/>";		//add the csc 216 checkbox
	//----------------------------------------CSC 216 END-------------------------------------------------------------------------------------------------------------------------


	//----------------------------------------CSC 265 Query-------------------------------------------------------------------------------------------------------------------------
	$csc265sqlSearch = "SELECT * FROM `class_list` WHERE `Major` = \"CSC\" AND `Class Number` = \"265\"";		//search query for CSC 265
	$result = $mysqli->query($csc265sqlSearch);

	//get data from the row and combine it into one variable
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$courseDetailsCSC265 = $row["Major"]. " " . $row["Class Number"]. " " . $row["Class Name"];
		}
	}

	echo "<input type=\"checkbox\" name=\'majorReq[]\' value=\"$courseDetailsCSC265\" id = \"CSC265\" onClick = \"auto_checker(this.id)\"> Object Oriented Programming (CSC 265) <br/>";		//add the csc 265 checkbox
	//----------------------------------------CSC 265 END-------------------------------------------------------------------------------------------------------------------------


	//----------------------------------------CSC 323 Query-------------------------------------------------------------------------------------------------------------------------
	$csc323sqlSearch = "SELECT * FROM `class_list` WHERE `Major` = \"CSC\" AND `Class Number` = \"323\"";		//search query for CSC 323
	$result = $mysqli->query($csc323sqlSearch);

	//get data from the row and combine it into one variable
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$courseDetailsCSC323 = $row["Major"]. " " . $row["Class Number"]. " " . $row["Class Name"];
		}
	}

	echo "<input type=\"checkbox\" name=\'majorReq[]\' value=\"$courseDetailsCSC323\" id = \"CSC323\" onClick = \"auto_checker(this.id)\"> Assembly Language Programming (CSC 323) <br/>";		//add the csc 323 checkbox
	//----------------------------------------CSC 323 END-------------------------------------------------------------------------------------------------------------------------


	//----------------------------------------CSC 328 Query-------------------------------------------------------------------------------------------------------------------------
	$csc328sqlSearch = "SELECT * FROM `class_list` WHERE `Major` = \"CSC\" AND `Class Number` = \"328\"";		//search query for CSC 328
	$result = $mysqli->query($csc328sqlSearch);

	//get data from the row and combine it into one variable
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$courseDetailsCSC328 = $row["Major"]. " " . $row["Class Number"]. " " . $row["Class Name"];
		}
	}

	echo "<input type=\"checkbox\" name=\'majorReq[]\' value=\"$courseDetailsCSC328\" id = \"CSC328\" onClick = \"auto_checker(this.id)\"> Data Structures (CSC 328) <br/>";		//add the csc 328 checkbox
	//----------------------------------------CSC 328 END-------------------------------------------------------------------------------------------------------------------------


	//----------------------------------------CSC 360 Query-------------------------------------------------------------------------------------------------------------------------
	$csc360sqlSearch = "SELECT * FROM `class_list` WHERE `Major` = \"CSC\" AND `Class Number` = \"360\"";		//search query for CSC 360
	$result = $mysqli->query($csc360sqlSearch);

	//get data from the row and combine it into one variable
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$courseDetailsCSC360 = $row["Major"]. " " . $row["Class Number"]. " " . $row["Class Name"];
		}
	}

	echo "<input type=\"checkbox\" name=\'majorReq[]\' value=\"$courseDetailsCSC360\" id = \"CSC360\" onClick = \"auto_checker(this.id)\"> Analysis of Algorithms (CSC 360) <br/>";		//add the csc 360 checkbox
	//----------------------------------------CSC 360 END-------------------------------------------------------------------------------------------------------------------------


	//----------------------------------------CSC 378 Query-------------------------------------------------------------------------------------------------------------------------
	$csc378sqlSearch = "SELECT * FROM `class_list` WHERE `Major` = \"CSC\" AND `Class Number` = \"378\"";		//search query for CSC 378
	$result = $mysqli->query($csc378sqlSearch);

	//get data from the row and combine it into one variable
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$courseDetailsCSC378 = $row["Major"]. " " . $row["Class Number"]. " " . $row["Class Name"];
		}
	}

	echo "<input type=\"checkbox\" name=\'majorReq[]\' value=\"$courseDetailsCSC378\" id = \"CSC378\" onClick = \"auto_checker(this.id)\"> Computer Architecture (CSC 378) <br/>";		//add the csc 378 checkbox
	//----------------------------------------CSC 378 END-------------------------------------------------------------------------------------------------------------------------


	//----------------------------------------CSC 400 Query-------------------------------------------------------------------------------------------------------------------------
	$csc400sqlSearch = "SELECT * FROM `class_list` WHERE `Major` = \"CSC\" AND `Class Number` = \"400\"";		//search query for CSC 400
	$result = $mysqli->query($csc400sqlSearch);

	//get data from the row and combine it into one variable
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$courseDetailsCSC400 = $row["Major"]. " " . $row["Class Number"]. " " . $row["Class Name"];
		}
	}

	echo "<input type=\"checkbox\" name=\'majorReq[]\' value=\"$courseDetailsCSC400\" id = \"CSC400\" onClick = \"auto_checker(this.id)\"> Operating Systems (CSC 400) <br/>";		//add the csc 400 checkbox
	//----------------------------------------CSC 400 END-------------------------------------------------------------------------------------------------------------------------


	//----------------------------------------CSC 455 Query-------------------------------------------------------------------------------------------------------------------------
	$csc455sqlSearch = "SELECT * FROM `class_list` WHERE `Major` = \"CSC\" AND `Class Number` = \"455\"";		//search query for CSC 455
	$result = $mysqli->query($csc455sqlSearch);

	//get data from the row and combine it into one variable
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$courseDetailsCSC455 = $row["Major"]. " " . $row["Class Number"]. " " . $row["Class Name"];
		}
	}

	echo "<input type=\"checkbox\" name=\'majorReq[]\' value=\"$courseDetailsCSC455\" id = \"CSC455\" onClick = \"auto_checker(this.id)\"> Structures of Programming Languages (CSC 455) <br/>";		//add the csc 455 checkbox
	//----------------------------------------CSC 455 END-------------------------------------------------------------------------------------------------------------------------


	//----------------------------------------CSC 460 Query-------------------------------------------------------------------------------------------------------------------------
	$csc460sqlSearch = "SELECT * FROM `class_list` WHERE `Major` = \"CSC\" AND `Class Number` = \"460\"";		//search query for CSC 460
	$result = $mysqli->query($csc460sqlSearch);

	//get data from the row and combine it into one variable
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$courseDetailsCSC460 = $row["Major"]. " " . $row["Class Number"]. " " . $row["Class Name"];
		}
	}

	echo "<input type=\"checkbox\" name=\'majorReq[]\' value=\"$courseDetailsCSC460\" id = \"CSC460\" onClick = \"auto_checker(this.id)\"> Language Translations (CSC 460) <br/>";		//add the csc 460 checkbox
	//----------------------------------------CSC 460 END-------------------------------------------------------------------------------------------------------------------------


	//----------------------------------------CSC 475 Query-------------------------------------------------------------------------------------------------------------------------
	$csc475sqlSearch = "SELECT * FROM `class_list` WHERE `Major` = \"CSC\" AND `Class Number` = \"475\"";		//search query for CSC 475
	$result = $mysqli->query($csc475sqlSearch);

	//get data from the row and combine it into one variable
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$courseDetailsCSC475 = $row["Major"]. " " . $row["Class Number"]. " " . $row["Class Name"];
		}
	}

	echo "<input type=\"checkbox\" name=\'majorReq[]\' value=\"$courseDetailsCSC475\" id = \"CSC475\" onClick = \"auto_checker(this.id)\"> Theory of Languages (CSC 475) <br/>";		//add the csc 475 checkbox
	//----------------------------------------CSC 475 END-------------------------------------------------------------------------------------------------------------------------

	
	//----------------------------------------CSC 490 Query-------------------------------------------------------------------------------------------------------------------------
	$csc490sqlSearch = "SELECT * FROM `class_list` WHERE `Major` = \"CSC\" AND `Class Number` = \"490\"";		//search query for CSC 490
	$result = $mysqli->query($csc490sqlSearch);

	//get data from the row and combine it into one variable
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$courseDetailsCSC490 = $row["Major"]. " " . $row["Class Number"]. " " . $row["Class Name"];
		}
	}

	echo "<input type=\"checkbox\" name=\'majorReq[]\' value=\"$courseDetailsCSC490\" id = \"CSC490\" onClick = \"auto_checker(this.id)\"> Senior Project I (CSC 490) <br/>";		//add the csc 490 checkbox
	//----------------------------------------CSC 490 END-------------------------------------------------------------------------------------------------------------------------


	//----------------------------------------CSC 492 Query-------------------------------------------------------------------------------------------------------------------------
	$csc492sqlSearch = "SELECT * FROM `class_list` WHERE `Major` = \"CSC\" AND `Class Number` = \"492\"";		//search query for CSC 492
	$result = $mysqli->query($csc492sqlSearch);

	//get data from the row and combine it into one variable
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$courseDetailsCSC492 = $row["Major"]. " " . $row["Class Number"]. " " . $row["Class Name"];
		}
	}

	echo "<input type=\"checkbox\" name=\'majorReq[]\' value=\"$courseDetailsCSC492\" id = \"CSC492\" onClick = \"auto_checker(this.id)\"> Senior Project II (CSC 492) <br/>";		//add the csc 492 checkbox
	//----------------------------------------CSC 492 END-------------------------------------------------------------------------------------------------------------------------
	
	
	//----------------------------------------CET 350 Query-------------------------------------------------------------------------------------------------------------------------
	$cet350sqlSearch = "SELECT * FROM `class_list` WHERE `Major` = \"CET\" AND `Class Number` = \"350\"";		//search query for CET 350
	$result = $mysqli->query($cet350sqlSearch);

	//get data from the row and combine it into one variable
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$courseDetailsCET350 = $row["Major"]. " " . $row["Class Number"]. " " . $row["Class Name"];
		}
	}

	echo "<input type=\"checkbox\" name=\'majorReq[]\' value=\"$courseDetailsCET350\" id = \"CET350\" onClick = \"auto_checker(this.id)\"> Technical Computing Using Java (CET 350) <br/>";		//add the CET 350 checkbox
	//----------------------------------------CET 350 END-------------------------------------------------------------------------------------------------------------------------
	

	echo "<br/>";
	echo "<span> Required Electives: ADD MORE	 </span><br/>";
	
	
	//----------------------------------------MAT 195 Query-------------------------------------------------------------------------------------------------------------------------
	$mat195sqlSearch = "SELECT * FROM `class_list` WHERE `Major` = \"MAT\" AND `Class Number` = \"195\"";		//search query for MAT 195
	$result = $mysqli->query($mat195sqlSearch);

	//get data from the row and combine it into one variable
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$courseDetailsMAT195 = $row["Major"]. " " . $row["Class Number"]. " " . $row["Class Name"];
		}
	}

	echo "<input type=\"checkbox\" name=\'electiveReq[]\' value=\"$courseDetailsMAT195\" id = \"MAT195\"> Discrete Mathematical Structures for Comp Sci (MAT 195) <br/>";		//add the MAT 195 checkbox
	//----------------------------------------MAT 195 END-------------------------------------------------------------------------------------------------------------------------


	//----------------------------------------MAT 341 Query-------------------------------------------------------------------------------------------------------------------------
	$mat341sqlSearch = "SELECT * FROM `class_list` WHERE `Major` = \"MAT\" AND `Class Number` = \"341\"";		//search query for MAT 341
	$result = $mysqli->query($mat341sqlSearch);

	//get data from the row and combine it into one variable
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$courseDetailsMAT341 = $row["Major"]. " " . $row["Class Number"]. " " . $row["Class Name"];
		}
	}

	echo "<input type=\"checkbox\" name=\'electiveReq[]\' value=\"$courseDetailsMAT341\" id = \"MAT341\"> Linear Algebra I (MAT 341) <br/>";		//add the MAT 341 checkbox
	//----------------------------------------MAT 341 END-------------------------------------------------------------------------------------------------------------------------


	
	//----------------------------------------MAT 215 Query-------------------------------------------------------------------------------------------------------------------------
	$mat215sqlSearch = "SELECT * FROM `class_list` WHERE `Major` = \"MAT\" AND `Class Number` = \"215\"";		//search query for MAT 215
	$result = $mysqli->query($mat215sqlSearch);

	//get data from the row and combine it into one variable
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$courseDetailsMAT215 = $row["Major"]. " " . $row["Class Number"]. " " . $row["Class Name"];
		}
	}

	echo "<input type=\"checkbox\" name=\'electiveReq[]\' value=\"$courseDetailsMAT215\" id = \"MAT215\"> Statistics (MAT 215) <br/>";		//add the MAT 215 checkbox
	//----------------------------------------MAT 215 END-------------------------------------------------------------------------------------------------------------------------
	
	
	//----------------------------------------CET 440 Query-------------------------------------------------------------------------------------------------------------------------
	$cet440sqlSearch = "SELECT * FROM `class_list` WHERE `Major` = \"CET\" AND `Class Number` = \"440\"";
	$result = $mysqli->query($cet440sqlSearch);

	//get data from the row and combine it into one variable
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$courseDetailsCET440 = $row["Major"]. " " . $row["Class Number"]. " " . $row["Class Name"];
		}
	}

	echo "<input type=\"checkbox\" name=\'electiveReq[]\' value=\"$courseDetailsCET440\" id = \"CET440\" onClick = \"auto_checker(this.id)\"> Computer Networking (CET 440) <br/>";		//add the CET 440 checkbox
	//----------------------------------------CET 440 END-------------------------------------------------------------------------------------------------------------------------
	
	
	echo "<input type=\"checkbox\" name='electiveReq[]' value=\"CSC ELE1 CSC 424 CSC 420 CSC 322\" id=\"CSCELE1\" onClick = \"auto_checker(this.id)\"> 1 of the following:<br/>";
	echo "CSC 322 Data Base Application Development <br/> CSC 420 Artificial Intelligence <br/> CSC 424 Numerical Analysis<br/> CSC 485 Special Topics in Computer Science<br/>";
	echo "<br/>";
	
	echo "<span> Any 2 CSC Electives: </span><br/>";
	
	
	
	
	//----------------------------------------CSC 304 Query-------------------------------------------------------------------------------------------------------------------------
	$csc304sqlSearch = "SELECT * FROM `class_list` WHERE `Major` = \"CSC\" AND `Class Number` = \"304\"";		//search query for CSC 304
	$result = $mysqli->query($csc304sqlSearch);

	//get data from the row and combine it into one variable
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$courseDetailsCSC304 = $row["Major"]. " " . $row["Class Number"]. " " . $row["Class Name"];
		}
	}

	echo "<input type=\"checkbox\" name=\'electiveReq[]\' value=\"$courseDetailsCSC304\" id = \"CSC304\" onClick = \"auto_checker(this.id)\"> COBOL (CSC 304) <br/>";		//add the CSC 304 checkbox
	//----------------------------------------CSC 304 END-------------------------------------------------------------------------------------------------------------------------
	

	//----------------------------------------CSC 306 Query-------------------------------------------------------------------------------------------------------------------------
	$csc306sqlSearch = "SELECT * FROM `class_list` WHERE `Major` = \"CSC\" AND `Class Number` = \"306\"";		//search query for CSC 306
	$result = $mysqli->query($csc306sqlSearch);

	//get data from the row and combine it into one variable
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$courseDetailsCSC306 = $row["Major"]. " " . $row["Class Number"]. " " . $row["Class Name"];
		}
	}

	echo "<input type=\"checkbox\" name=\'electiveReq[]\' value=\"$courseDetailsCSC306\" id = \"CSC306\" onClick = \"auto_checker(this.id)\"> FORTRAN (CSC 306) <br/>";		//add the CSC 306 checkbox
	//----------------------------------------CSC 306 END-------------------------------------------------------------------------------------------------------------------------


	//----------------------------------------CSC 308 Query-------------------------------------------------------------------------------------------------------------------------
	$csc308sqlSearch = "SELECT * FROM `class_list` WHERE `Major` = \"CSC\" AND `Class Number` = \"308\"";		//search query for CSC 308
	$result = $mysqli->query($csc308sqlSearch);

	//get data from the row and combine it into one variable
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$courseDetailsCSC308 = $row["Major"]. " " . $row["Class Number"]. " " . $row["Class Name"];
		}
	}

	echo "<input type=\"checkbox\" name=\'electiveReq[]\' value=\"$courseDetailsCSC308\" id = \"CSC308\" onClick = \"auto_checker(this.id)\"> Python (CSC 308) <br/>";		//add the CSC 308 checkbox
	//----------------------------------------CSC 308 END-------------------------------------------------------------------------------------------------------------------------


	//----------------------------------------CSC 419 Query-------------------------------------------------------------------------------------------------------------------------
	$csc419sqlSearch = "SELECT * FROM `class_list` WHERE `Major` = \"CSC\" AND `Class Number` = \"419\"";		//search query for CSC 419
	$result = $mysqli->query($csc419sqlSearch);

	//get data from the row and combine it into one variable
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$courseDetailsCSC419 = $row["Major"]. " " . $row["Class Number"]. " " . $row["Class Name"];
		}
	}

	echo "<input type=\"checkbox\" name=\'electiveReq[]\' value=\"$courseDetailsCSC419\" id = \"CSC419\" onClick = \"auto_checker(this.id)\"> Internship 3 Credits Max (CSC 419) <br/>";		//add the CSC 419 checkbox
	//----------------------------------------CSC 419 END-------------------------------------------------------------------------------------------------------------------------


	echo "<br/>";
	echo"<span> Related Electives:  </span><br/>";
	
	
	
	echo "<input type=\"checkbox\" name='electiveReq[]' value=\"CALC 3 or Linear Algebra 2\" id=\"MAT441 MAT381\" onClick = \"auto_checker(this.id)\"> Calculus III OR Linear Algebra II (MAT 381 OR MAT 441)<br/>"; 
	echo "<br/>";

	
	echo "<h4 style=\"text-align:left; border: 1px solid\"> Additional Requirements: </h4>";
	
	echo "<span> Additional Requirements </span><br/>";
	
	
	/*		currently commented out, it is somewhat redundant
	//----------------------------------------CSC 490 Query-------------------------------------------------------------------------------------------------------------------------
	$csc490sqlSearch = "SELECT * FROM `class_list` WHERE `Major` = \"CSC\" AND `Class Number` = \"490\"";		//search query for CSC 490
	$result = $mysqli->query($csc490sqlSearch);

	//get data from the row and combine it into one variable
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$courseDetailsCSC490 = $row["Major"]. " " . $row["Class Number"]. " " . $row["Class Name"];
		}
	}

	echo "<input type=\"checkbox\" name=\'additionalReq[]\' value=\"$courseDetailsCSC490\" id = \"CSC490\" onClick = \"auto_checker(this.id)\"> Senior Project I (CSC 490) <br/>";		//add the CSC 490 checkbox
	//----------------------------------------CSC 490 END-------------------------------------------------------------------------------------------------------------------------
	*/
	
	
	/*		currently commented out, it is somewhat redundant
	//----------------------------------------CSC 492 Query-------------------------------------------------------------------------------------------------------------------------
	$csc492sqlSearch = "SELECT * FROM `class_list` WHERE `Major` = \"CSC\" AND `Class Number` = \"492\"";		//search query for CSC 492
	$result = $mysqli->query($csc492sqlSearch);

	//get data from the row and combine it into one variable
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$courseDetailsCSC492 = $row["Major"]. " " . $row["Class Number"]. " " . $row["Class Name"];
		}
	}

	echo "<input type=\"checkbox\" name=\'additionalReq[]\' value=\"$courseDetailsCSC492\" id = \"CSC492\" onClick = \"auto_checker(this.id)\"> Senior Project I (CSC 492) <br/>";		//add the CSC 492 checkbox
	//----------------------------------------CSC 492 END-------------------------------------------------------------------------------------------------------------------------
	*/
	
	
	echo "<span> Lab Course: PHY, PHS, EET 110, CHE, BIO 117/130 - Science Electives (FIRST 2 LEVELS OF BIO, PHY, OR CHEM. 1 OF ANY OTHER LAB-BASED SCIENCE)</span><br/> ";
	
	echo "<input type=\"checkbox\" name='additionalReq[]' value=\"Lab 1\" id=\"LAB1\" > Lab Based Science 1 (Phy, Bio, Chem)<br/> ";
	//echo "<input type=\"checkbox\" name='additionalReq[]' value=\"Lab 1 LVL 2\" id=\"LAB1LVL2\" > Lab Based Science 1 Level 2 (Phy, Bio, Chem)<br/> ";
	echo "<input type=\"checkbox\" name='additionalReq[]' value=\"Lab 2\" id=\"LAB2\" > Lab Based Science 2 (Phy, Bio, Chem)<br/> ";
	echo "<br/>";
	echo "<br/>";
	

	echo "<span> Additional Electives: (Counted towards degree) </span><br/>";
	
	
	//----------------------------------------MAT 181 Query-------------------------------------------------------------------------------------------------------------------------
	$mat181sqlSearch = "SELECT * FROM `class_list` WHERE `Major` = \"MAT\" AND `Class Number` = \"181\"";		//search query for MAT 181
	$result = $mysqli->query($mat181sqlSearch);

	//get data from the row and combine it into one variable
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$courseDetailsMAT181 = $row["Major"]. " " . $row["Class Number"]. " " . $row["Class Name"];
		}
	}

	echo "<input type=\"checkbox\" name=\'genEdReq[]\' value=\"$courseDetailsMAT181\" id = \"MAT181\" onClick = \"auto_checker(this.id)\"> College Alg (MAT 181) <br/>";		//add the MAT 181 checkbox
	//----------------------------------------MAT 181 END-------------------------------------------------------------------------------------------------------------------------
	


	//----------------------------------------MAT 191 Query-------------------------------------------------------------------------------------------------------------------------
	$mat191sqlSearch = "SELECT * FROM `class_list` WHERE `Major` = \"MAT\" AND `Class Number` = \"191\"";		//search query for MAT 191
	$result = $mysqli->query($mat191sqlSearch);

	//get data from the row and combine it into one variable
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$courseDetailsMAT191 = $row["Major"]. " " . $row["Class Number"]. " " . $row["Class Name"];
		}
	}

	echo "<input type=\"checkbox\" name=\'genEdReq[]\' value=\"$courseDetailsMAT191\" id = \"MAT191\" onClick = \"auto_checker(this.id)\"> College Trig (MAT 191) <br/>";		//add the MAT 191 checkbox
	//----------------------------------------MAT 191 END-------------------------------------------------------------------------------------------------------------------------
	
	
	//----------------------------------------MAT 199 Query-------------------------------------------------------------------------------------------------------------------------
	$mat199sqlSearch = "SELECT * FROM `class_list` WHERE `Major` = \"MAT\" AND `Class Number` = \"199\"";		//search query for MAT 199
	$result = $mysqli->query($mat199sqlSearch);

	//get data from the row and combine it into one variable
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$courseDetailsMAT199 = $row["Major"]. " " . $row["Class Number"]. " " . $row["Class Name"];
		}
	}

	echo "<input type=\"checkbox\" name=\'genEdReq[]\' value=\"$courseDetailsMAT199\" id = \"MAT199\" onClick = \"auto_checker(this.id)\"> Precalculus (MAT 199) <br/>";		//add the MAT 199 checkbox
	//----------------------------------------MAT 199 END-------------------------------------------------------------------------------------------------------------------------
	
	echo "<br/> <br/>";
	
	echo "<span> Not Counted Towards Degree: </span><br/>";
	echo "<input type=\"checkbox\" name='genEdReq[]' value=\"DMA 092 Intro Alg\" id=\"DMA092\"> Intro Alg (DMA 092) <br/>";
	echo "<input type=\"checkbox\" name='genEdReq[]' value=\"ENG 100 Intro Eng\" id=\"ENG100\"> English Language Skills (ENG 100) <br/>";

	echo "<br/> <br/>";
	
	

?>



