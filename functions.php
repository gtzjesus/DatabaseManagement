<?php
	/*
	
	ACADEMICS
	
	*/
	function get_student($student_search){				
			//all variables are set to global to make them available thtough the code outside this function
			global $conn,$student_username,$student_class,$utep_id,$major,$major_gpa,$overall_gpa;			
			$sql1="select * from student where SUsername='"."$student_search"."';";
			$check_student=mysqli_query($conn, $sql1);
		if ($check_student ->num_rows > 0 ) {
			$student_info = mysqli_fetch_array($check_student);
			$student_username=$student_info[0];
			$student_class=$student_info[2];
			$utep_id=$student_info[1];
			$major = $student_info[5];
			$major_gpa =$student_info[3];
			$overall_gpa = $student_info[4];
		} 
		else{
			echo "STUDENT '".$student_search."' NOT FOUND. SQL Error: " . "<br>" . mysqli_error($conn);
		}	
	}
		
	
	function update_student($student_username,$class,$utep_id,$major,$major_gpa,$overall_gpa){			
			global $conn;			
			$sql_update="UPDATE student SET SClassification='".$class."',Major='".$major."',Major_GPA=".$major_gpa.",Overall_GPA=".$overall_gpa." where SUsername='"."$student_username"."';";
			if ($conn->query($sql_update) === TRUE) {
				echo "Record updated successfully";
			} else {
				echo "Error updating record: " . $conn->error;
			}	
	}
	
	/*
	
	AWARDS
	
	*/
	function update_award($award_info,$award_date,$award_id){			
			global $conn;			
			$sql_update="UPDATE awards SET Award_info='".$award_info."',Date_won='".$award_date."' where Awardid='"."$award_id"."';";
			if ($conn->query($sql_update) === TRUE) {
				echo "Record Award updated successfully";
			} else {
				echo "Error updating Award record: " . $conn->error;
			}
	}
	
	function delete_award($award_id){
			global $conn;
			$sql_delete="DELETE FROM awards WHERE Awardid=$award_id;";
			echo "$sql_delete";			
			if ($conn->query($sql_delete) === TRUE) {
				echo "Record Award deleted successfully";
			} else {
				echo "Error deleting Award record: " . $conn->error;
			}		
	}
	
	function add_award($student_username){
			global $conn;
			$sql_add="INSERT INTO awards(AWUsername,Award_info,Date_won) values('$student_username','','');";			
			if ($conn->query($sql_add) === TRUE) {
				echo "Record Award added successfully";
			} else {
				echo "Error adding Award record: " . $conn->error;
			}
	}
	
	/*
	
	FUNDING
	
	*/
	function update_funding($funding_info,$funding_type,$funding_id){			
			global $conn;			
			$sql_update="UPDATE funding SET Funding_info='".$funding_info."',Funding_type='".$funding_type."' where Fundingid='"."$funding_id"."';";
			if ($conn->query($sql_update) === TRUE) {
				echo "Record Funding updated successfully";
			} else {
				echo "Error Funding Award record: " . $conn->error;
			}
	}
	
	function delete_funding($funding_id){
			global $conn;
			$sql_delete="DELETE FROM funding WHERE Fundingid=$funding_id;";		
			if ($conn->query($sql_delete) === TRUE) {
				echo "Record Funding deleted successfully";
			} else {
				echo "Error Funding Award record: " . $conn->error;
			}		
	}
	
	function add_funding($student_username){
			global $conn;
			$sql_add="INSERT INTO Funding(FNUsername,Funding_info,Funding_type) values('$student_username','','');";			
			if ($conn->query($sql_add) === TRUE) {
				echo "Record Funding added successfully";
			} else {
				echo "Error Funding record: " . $conn->error;
			}
	}
	
		/*
	
	PAPERS
	
	*/
	function update_paper($paper_info,$paper_type,$paper_id){			
			global $conn;			
			$sql_update="UPDATE papers SET Paper_info='".$paper_info."',Paper_type='".$paper_type."' where Paperid='"."$paper_id"."';";
			
			echo "$sql_update";
			if ($conn->query($sql_update) === TRUE) {
				echo "Record Paper updated successfully";
			} else {
				echo "Error Paper Award record: " . $conn->error;
			}
	}
	
	function delete_paper($paper_id){
			global $conn;
			$sql_delete="DELETE FROM papers WHERE Paperid=$paper_id;";		
			if ($conn->query($sql_delete) === TRUE) {
				echo "Record Papers deleted successfully";
			} else {
				echo "Error Papers Award record: " . $conn->error;
			}		
	}
	
	function add_paper($student_username){
			global $conn;
			$sql_add="INSERT INTO Papers(PRUsername,Paper_info,Paper_type) values('$student_username','','');";			
			if ($conn->query($sql_add) === TRUE) {
				echo "Record Paper added successfully";
			} else {
				echo "Error Paper record: " . $conn->error;
			}
	}
	
	
	/*
	
	PRESENTATIONS
	
	*/
	function update_presentation($presentation_info,$presentation_type,$presentation_id){			
			global $conn;			
			$sql_update="UPDATE presentations SET presentation_info='".$presentation_info."',presentation_type='".$presentation_type."' where presentationid='"."$presentation_id"."';";
			
			echo "$sql_update";
			if ($conn->query($sql_update) === TRUE) {
				echo "Record presentation updated successfully";
			} else {
				echo "Error presentation Award record: " . $conn->error;
			}
	}
	
	function delete_presentation($presentation_id){
			global $conn;
			$sql_delete="DELETE FROM presentations WHERE presentationid=$presentation_id;";		
			if ($conn->query($sql_delete) === TRUE) {
				echo "Record presentations deleted successfully";
			} else {
				echo "Error presentations Award record: " . $conn->error;
			}		
	}
	
	function add_presentation($student_username){
			global $conn;
			$sql_add="INSERT INTO presentations(PNUsername,presentation_info,presentation_type) values('$student_username','','');";			
			if ($conn->query($sql_add) === TRUE) {
				echo "Record presentation added successfully";
			} else {
				echo "Error presentation record: " . $conn->error;
			}
	}
	
	
	/*
	
	WORK
	
	*/
	function update_work($job_info,$job_title,$job_status,$work_id){			
			global $conn;			
			$sql_update="UPDATE work SET job_title='".$job_title."',job_info='".$job_info."',job_status='".$job_status."' where workid='"."$work_id"."';";
			
			echo "$sql_update";
			if ($conn->query($sql_update) === TRUE) {
				echo "Record work updated successfully";
			} else {
				echo "Error work Award record: " . $conn->error;
			}
	}
	
	function delete_work($work_id){
			global $conn;
			$sql_delete="DELETE FROM work WHERE workid=$work_id;";		
			if ($conn->query($sql_delete) === TRUE) {
				echo "Record Job deleted successfully";
			} else {
				echo "Error Job Award record: " . $conn->error;
			}		
	}
	
	function add_work($student_username){
			global $conn;
			$sql_add="INSERT INTO work(WUsername,job_info,job_title,job_status) values('$student_username','','','');";			
			if ($conn->query($sql_add) === TRUE) {
				echo "Record Job added successfully";
			} else {
				echo "Error Job record: " . $conn->error;
			}
	}
	
	
	/*
	
	MILESTONES
	
	*/
	function update_milestone($milestone_info,$milestone_type,$milestone_status,$milestone_id){			
			global $conn;			
			$sql_update="UPDATE milestones SET milestone_type='".$milestone_type."',milestone_info='".$milestone_info."',milestone_status='".$milestone_status."' where milestoneid='"."$milestone_id"."';";
			
			echo "$sql_update";
			if ($conn->query($sql_update) === TRUE) {
				echo "Record milestone updated successfully";
			} else {
				echo "Error milestone Award record: " . $conn->error;
			}
	}
	
	function delete_milestone($milestone_id){
			global $conn;
			$sql_delete="DELETE FROM milestones WHERE milestoneid=$milestone_id;";		
			if ($conn->query($sql_delete) === TRUE) {
				echo "Record milestone deleted successfully";
			} else {
				echo "Error milestone Award record: " . $conn->error;
			}		
	}
	
	function add_milestone($student_username){
			global $conn;
			$sql_add="INSERT INTO milestones(MUsername,milestone_info,milestone_type,milestone_status) values('$student_username','','','');";			
			if ($conn->query($sql_add) === TRUE) {
				echo "Record milestone added successfully";
			} else {
				echo "Error milestone record: " . $conn->error;
			}
	}
	
	
	/*
	
	DELETE STUDENT
	
	*/
	
	function delete_student($student_username){
		
			
			global $conn;
			
			$sql_delete="DELETE FROM PAPERS where PRUsername='"."$student_username"."';";
			$sql_delete.="DELETE FROM AWARDS where AWUsername='"."$student_username"."';";
			$sql_delete.="DELETE FROM MILESTONES where MUsername='"."$student_username"."';";
			$sql_delete.="DELETE FROM PRESENTATIONS where PNUsername='"."$student_username"."';";
			$sql_delete.="DELETE FROM FUNDING where FNUsername='"."$student_username"."';";
			$sql_delete.="DELETE FROM WORK where WUsername='"."$student_username"."';";
			$sql_delete.="DELETE FROM Faculty_Student_Relation where FRUsername='"."$student_username"."';";
			$sql_delete.="DELETE FROM STUDENT where SUsername='"."$student_username"."';";
			$sql_delete.="DELETE FROM USER where UUsername='"."$student_username"."';";
			
			
			//echo "$sql_delete";
			
			
		  if (mysqli_multi_query($conn, $sql_delete)) {
				echo "RECORD SUCCESSFULLY DELETED";
			} else {
				echo "Error deleting record: " . $conn->error;
			}
	
	}


?>