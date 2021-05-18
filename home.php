<?php session_start(); 
  require_once("config.php");
  include("functions.php");
?>
<html>
<head>
<!-- Nav Integration -->

<header>
    <a href="http://cssrvlab01.utep.edu/Classes/cs4342/Team2_pm/" class="site-logo" aria-label="homepage">Grad Track</a>    
        <li class="nav__list-item">
          <a
            class="nav__link nav__link--btn nav__link--btn--highlight"
            href="logout.php"
            >Logout</a
          >
        </li>
      </ul>
    </nav>
  </header>

  <!-- Nav Integration -->
 <?php
	
	$user=$_SESSION['student_user'];
	
	
	//check if user is admin,faculty, or student
	echo "<div class = 'welcome-div-user'>
			<p>Logged in as: $user</p>
		  </div>";
	if($user=="admin"){
		echo "<div class = 'welcome-div'>
				<p>Welcome Admin</p>
			  </div>";	
	}
	else{
			
		$sql1="select * from student where SUsername='"."$user"."';";
		$sql2="select * from faculty where FUsername='"."$user"."';";
		
		$check_student=mysqli_query($conn, $sql1);
		$check_faculty=mysqli_query($conn, $sql2);
		
		if ($check_student ->num_rows > 0 ) {
			echo "<div class = 'welcome-div'>
					<p>Welcome Student</p>
			  	  </div>";
			get_student($user);
			$student_search=$user;
			echo "<br>Student: $user, Classification: $class";
			//disable inputs if user is a student
			$disable_academics="disabled";

		} 
		else if($check_faculty ->num_rows > 0) {
			echo "<div class = 'welcome-div'>
					<p>Welcome Professor</p>
			  	  </div>";
			$class = mysqli_fetch_array($check_faculty)[1];
			echo "<div class = 'welcome-div-classification'>
					 <br> Classification: $class
				  </div";
			$disable="disabled";
		}
		else{
			echo "Error: " . "<br>" . mysqli_error($conn);
		}
	
		
	}
	
	//display Search bar if user is admin or faculty
		if($user=="admin" || $class=="Advisor" || $class=="Faculty"){
			echo "<div class='search-bar'>";
			echo "	<form action='home.php' method='post'> ";
			echo "		<input class='text-box' type='text' name='search_student' placeholder='Search by username'> ";
			echo "		<input class='submit-button' type='submit'>";
			echo "	</form>";
			echo "</div>";
		}
		
		//if admin/faculty search for student then run function to look for student record
		if (isset($_POST['search_student'])) {			
			$student_search=$_POST['search_student'];
			get_student($student_search);	
		}
		
		
		// update student record if they hit the update button
		if (isset($_POST['update_academics'])) {
			$student_username=$_POST['Student_username'];
			$student_class=$_POST['student_class'];
			$utep_id=$_POST['Student_utepid'];
			$major=$_POST['Student_major'];
			$major_gpa=$_POST['Student_mgpa'];
			$overall_gpa=$_POST['Student_ogpa'];			
			update_student($student_username,$class,$utep_id,$major,$major_gpa,$overall_gpa);
		}
		
		
		//Awards section
		// update awards record
		if (isset($_POST['update_awards'])) {
			$award_id=$_POST['update_awards'];
			$award_info=$_POST['awards_info'.$award_id];
			$award_date=$_POST['awards_date'.$award_id];			
			update_award($award_info,$award_date,$award_id);

		}
		
		// delete awards record
		if (isset($_POST['delete_awards'])) {
			$award_id=$_POST['delete_awards'];			
			delete_award($award_id);
		}
		
		//add_awards
		if (isset($_POST['add_awards'])) {
			$student_username=$_POST['add_awards'];
			add_award($student_username);		
			$student_search=$student_username;
			get_student($student_username);
		}
		
		
		//Funding
		// update funding record
		if (isset($_POST['update_funding'])) {
			$funding_id=$_POST['update_funding'];
			$funding_info=$_POST['funding_info'.$funding_id];
			$funding_type=$_POST['funding_type'.$funding_id];			
			update_funding($funding_info,$funding_type,$funding_id);

		}
		
		// delete funding record
		if (isset($_POST['delete_funding'])) {
			$funding_id=$_POST['delete_funding'];			
			delete_funding($funding_id);
		}
		
		//add funding
		if (isset($_POST['add_funding'])) {
			$student_username=$_POST['add_funding'];
			add_funding($student_username);		
			$student_search=$student_username;
			get_student($student_username);
		}
		
		
		
		//delete student record. All records in all tables will be deleted for this student
		if (isset($_POST['delete_student'])) {		
			$student_username=$_POST['Student_username'];
			delete_student($student_username);

			
		}
		
		//Papers
		// update paper record
		if (isset($_POST['update_paper'])) {
			$paper_id=$_POST['update_paper'];
			$paper_info=$_POST['paper_info'.$paper_id];
			$paper_type=$_POST['paper_type'.$paper_id];			
			update_paper($paper_info,$paper_type,$paper_id);

		}
		
		// delete paper record
		if (isset($_POST['delete_paper'])) {
			$paper_id=$_POST['delete_paper'];			
			delete_paper($paper_id);
		}
		
		//add paper
		if (isset($_POST['add_paper'])) {
			$student_username=$_POST['add_paper'];
			add_paper($student_username);		
			$student_search=$student_username;
			get_student($student_username);
		}
		
		
		//Presentations
		// update presentation record
		if (isset($_POST['update_presentation'])) {
			$presentation_id=$_POST['update_presentation'];
			$presentation_info=$_POST['presentation_info'.$presentation_id];
			$presentation_type=$_POST['presentation_type'.$presentation_id];			
			update_presentation($presentation_info,$presentation_type,$presentation_id);

		}
		
		// delete presentation record
		if (isset($_POST['delete_presentation'])) {
			$presentation_id=$_POST['delete_presentation'];			
			delete_presentation($presentation_id);
		}
		
		//add presentation
		if (isset($_POST['add_presentation'])) {
			$student_username=$_POST['add_presentation'];
			add_presentation($student_username);		
			$student_search=$student_username;
			get_student($student_username);
		}
		
		
		//Work
		// update work record
		if (isset($_POST['update_work'])) {
			$work_id=$_POST['update_work'];
			$job_info=$_POST['job_info'.$work_id];
			$job_title=$_POST['job_title'.$work_id];
			$job_status=$_POST['job_status'.$work_id];			
			update_work($job_info,$job_title,$job_status,$work_id);

		}
		
		// delete work record
		if (isset($_POST['delete_work'])) {
			$work_id=$_POST['delete_work'];			
			delete_work($work_id);
		}
		
		//add work
		if (isset($_POST['add_work'])) {
			$student_username=$_POST['add_work'];
			add_work($student_username);		
			$student_search=$student_username;
			get_student($student_username);
		}
		
		
		//Milestones
		// update milestone record
		if (isset($_POST['update_milestone'])) {
			$milestone_id=$_POST['update_milestone'];
			$milestone_info=$_POST['milestone_info'.$milestone_id];
			$milestone_type=$_POST['milestone_type'.$milestone_id];
			$milestone_status=$_POST['milestone_status'.$milestone_id];			
			update_milestone($milestone_info,$milestone_type,$milestone_status,$milestone_id);

		}
		
		// delete milestone record
		if (isset($_POST['delete_milestone'])) {
			$milestone_id=$_POST['delete_milestone'];			
			delete_milestone($milestone_id);
		}
		
		//add milestone
		if (isset($_POST['add_milestone'])) {
			$student_username=$_POST['add_milestone'];
			add_milestone($student_username);		
			$student_search=$student_username;
			get_student($student_username);
		}
		
		
		//delete student record. All records in all tables will be deleted for this student
		if (isset($_POST['delete_student'])) {		
			$student_username=$_POST['Student_username'];
			delete_student($student_username);

			
		}

		//mysqli_close($conn);
	
  	?>

	<!-- 
  	Academic Section for Student Information
 	-->
	
	<h2>Academic</h2>
	<div>
	<form action="home.php" method="post">
	<p>Username:</p> <input type="text" name="Student_username" value="<?php if($user=="admin" || $class=="Faculty" || $class=="Advisor"){echo "$student_username";} else {echo "$user";}?>" <?php echo"$disable_academics";?> >
	<p>UTEP ID:</p> <input type="text" name="Student_utepid" value="<?php echo "$utep_id"; ?>" <?php echo"$disable_academics";?> >
	<p>Classification</p><input type="text" name="student_class" value="<?php echo "$student_class"; ?>" <?php echo"$disable_academics";?> >
	<p>Major:</p> <input type="text" name="Student_major"value="<?php echo "$major"; ?>" <?php echo"$disable_academics";?> >
	<p>Major GPA:</p> <input type="text" name="Student_mgpa" value="<?php echo "$major_gpa"; ?>" <?php echo"$disable_academics";?> >
	<p>Overall GPA:</p> <input type="text" name="Student_ogpa" value="<?php echo "$overall_gpa"; ?>" <?php echo"$disable_academics";?> >
	<!--Only display the update and delete buttons if the user is an admin or faculty -->
	<?php 
		if ($user=="admin"|| $class=="Faculty" || $class=="Advisor"){
			echo "<br><button name='update_academics' type='submit' value='Update' >Update</button>";
			echo "<br><button name='delete_student' type='submit' value='Delete' >DELETE STUDENT</button>";			
		}
	?>
	</form>
	</div>
	
	<!-- 
  	Awards Section for Student Information
 	-->
	
	<h2>Awards</h2>
	<div>	
	<?php 
		
		$sql1="select * from awards where AWUsername='"."$student_search"."';";
		$check_student=mysqli_query($conn, $sql1);
			
		if ($check_student ->num_rows > 0 ) {
		echo "<form  action ='home.php' method ='post'>";
		echo "<table border='1'>";
		echo "<tr><th>Award Info</th><th>Date Won</th></tr>";
			
			while($award_info_get = mysqli_fetch_array($check_student)){
				$award_id=$award_info_get[0];
				$award_info=$award_info_get[2];
				$award_date=$award_info_get[3];
				
				//create a table row for each record found, add the record id to each input name to be able to tell them apart when running updates
				echo "<tr style='vertical-align:middle'>";
				echo "<td><input type='text' name='awards_info".$award_id."' size='50' value='".$award_info."' $disable ></td>";
				echo "<td><input type='text' name='awards_date".$award_id."'  value='".$award_date."' $disable ></td>";
				if($user=="admin"|| $class="PHD" || $class=="Master"){
					echo "<td><br><button name='update_awards' type='submit' value='".$award_id."' $disable >Update</button></td>";
					echo "<td><br><button name='delete_awards' type='submit' value='".$award_id."' $disable >Delete</button></td>";
				}
				echo "</tr>";
			}
		echo "</table>";
		if($user=="admin"|| $class="PHD" || $class=="Master"){
			echo "<br><button name='add_awards' type='submit' value='".$student_username."' $disable >Add Award</button>";
		}
		echo "</form>";
		} 
		else{
			echo "Awards for '".$student_search."' NOT FOUND. SQL Error: " . "<br>" . mysqli_error($conn);
		}
				
	
	?>   
	</div>

	<!-- 
  	Funding Section for Student Information
 	-->
	
	<h2>Funding</h2>
	<div>	
	<?php 
		
		$sql1="select * from funding where FNUsername='"."$student_search"."';";
		$check_student=mysqli_query($conn, $sql1);
			
		if ($check_student ->num_rows > 0 ) {
		echo "<form  action ='home.php' method ='post'>";
		echo "<table border='1'>";
		echo "<tr><th>Funding Info</th><th>Funding Type</th></tr>";
			
			while($funding_info_get = mysqli_fetch_array($check_student)){
				$funding_id=$funding_info_get[0];
				$funding_info=$funding_info_get[2];
				$funding_type=$funding_info_get[3];
				
				//create a table row for each record found, add the record id to each input name to be able to tell them apart when running updates
				echo "<tr style='vertical-align:middle'>";
				echo "<td><input type='text' name='funding_info".$funding_id."' size='50' value='".$funding_info."' $disable ></td>";
				echo "<td><input type='text' name='funding_type".$funding_id."'  value='".$funding_type."' $disable ></td>";
				if($user=="admin"|| $class="PHD" || $class=="Master"){
					echo "<td><br><button name='update_funding' type='submit' value='".$funding_id."' $disable >Update</button></td>";
					echo "<td><br><button name='delete_funding' type='submit' value='".$funding_id."' $disable >Delete</button></td>";
				}
				echo "</tr>";
			}
		echo "</table>";
		if($user=="admin"|| $class="PHD" || $class=="Master"){
			echo "<br><button name='add_funding' type='submit' value='".$student_username."' $disable >Add Funding</button>";
		}
		echo "</form>";
		} 
		else{
			echo "Funding Info for '".$student_search."' NOT FOUND. SQL Error: " . "<br>" . mysqli_error($conn);
		}
				
	
	?>   
	</div>
	
	<!-- 
  	Papers Section for Student Information
 	-->

	<h2>Papers</h2>
	<div>	
	<?php 
		
		$sql1="select * from papers where PRUsername='"."$student_search"."';";
		$check_student=mysqli_query($conn, $sql1);
			
		if ($check_student ->num_rows > 0 ) {
		echo "<form  action ='home.php' method ='post'>";
		echo "<table border='1'>";
		echo "<tr><th>Paper Info</th><th>Paper type</th></tr>";
			
			while($paper_info_get = mysqli_fetch_array($check_student)){
				$paper_id=$paper_info_get[0];
				$paper_info=$paper_info_get[2];
				$paper_type=$paper_info_get[3];
				
				//create a table row for each record found, add the record id to each input name to be able to tell them apart when running updates
				echo "<tr style='vertical-align:middle'>";
				echo "<td><input type='text' name='paper_info".$paper_id."' size='50' value='".$paper_info."' $disable ></td>";
				echo "<td><input type='text' name='paper_type".$paper_id."'  value='".$paper_type."' $disable ></td>";
				if($user=="admin"|| $class="PHD" || $class=="Master"){
					echo "<td><br><button name='update_paper' type='submit' value='".$paper_id."' $disable >Update</button></td>";
					echo "<td><br><button name='delete_paper' type='submit' value='".$paper_id."' $disable >Delete</button></td>";
				}
				echo "</tr>";
			}
		echo "</table>";
		if($user=="admin"|| $class="PHD" || $class=="Master"){
			echo "<br><button name='add_paper' type='submit' value='".$student_username."' $disable >Add Paper</button>";
		}
		echo "</form>";
		} 
		else{
			echo "Paper Info for '".$student_search."' NOT FOUND. SQL Error: " . "<br>" . mysqli_error($conn);
		}
				
	
	?>   
	</div>

	<!-- 
  	Presentations Section for Student Information
 	-->
	
	<h2>Presentations</h2>
	<div>	
	<?php 
		
		$sql1="select * from presentations where PNUsername='"."$student_search"."';";
		$check_student=mysqli_query($conn, $sql1);
			
		if ($check_student ->num_rows > 0 ) {
		echo "<form  action ='home.php' method ='post'>";
		echo "<table border='1'>";
		echo "<tr><th>Presentation Info</th><th>Presentation type</th></tr>";
			
			while($presentation_info_get = mysqli_fetch_array($check_student)){
				$presentation_id=$presentation_info_get[0];
				$presentation_info=$presentation_info_get[2];
				$presentation_type=$presentation_info_get[3];
				
				//create a table row for each record found, add the record id to each input name to be able to tell them apart when running updates
				echo "<tr style='vertical-align:middle'>";
				echo "<td><input type='text' name='presentation_info".$presentation_id."' size='50' value='".$presentation_info."' $disable ></td>";
				echo "<td><input type='text' name='presentation_type".$presentation_id."'  value='".$presentation_type."' $disable ></td>";
				if($user=="admin"|| $class="PHD" || $class=="Master"){
					echo "<td><br><button name='update_presentation' type='submit' value='".$presentation_id."' $disable >Update</button></td>";
					echo "<td><br><button name='delete_presentation' type='submit' value='".$presentation_id."' $disable >Delete</button></td>";
				}
				echo "</tr>";
			}
		echo "</table>";
		if($user=="admin"|| $class="PHD" || $class=="Master"){
			echo "<br><button name='add_presentation' type='submit' value='".$student_username."' $disable >Add Presentation</button>";
		}
		echo "</form>";
		} 
		else{
			echo "Presentation Info for '".$student_search."' NOT FOUND. SQL Error: " . "<br>" . mysqli_error($conn);
		}
				
	
	?>  
	
	</div>

	<!-- 
  	Work Section for Student Information
 	-->
	
	<h2>Work</h2>
	<div>	
	<?php 
		
		$sql1="select * from work where WUsername='"."$student_search"."';";
		$check_student=mysqli_query($conn, $sql1);
			
		if ($check_student ->num_rows > 0 ) {
		echo "<form  action ='home.php' method ='post'>";
		echo "<table border='1'>";
		echo "<tr><th>Job Title</th><th>Job Info</th><th>Job Status</th></tr>";
			
			while($job_info_get = mysqli_fetch_array($check_student)){
				$work_id=$job_info_get[0];
				$job_title=$job_info_get[2];
				$job_info=$job_info_get[3];
				$job_status=$job_info_get[4];
				
				//create a table row for each record found, add the record id to each input name to be able to tell them apart when running updates
				echo "<tr style='vertical-align:middle'>";
				echo "<td><input type='text' name='job_title".$work_id."'  value='".$job_title."' $disable ></td>";
				echo "<td><input type='text' name='job_info".$work_id."' size='50' value='".$job_info."' $disable ></td>";				
				echo "<td><input type='text' name='job_status".$work_id."'  value='".$job_status."' $disable ></td>";
				if($user=="admin"|| $class="PHD" || $class=="Master"){
					echo "<td><br><button name='update_work' type='submit' value='".$work_id."' $disable >Update</button></td>";
					echo "<td><br><button name='delete_work' type='submit' value='".$work_id."' $disable >Delete</button></td>";
				}
				echo "</tr>";
			}
		echo "</table>";
		if($user=="admin"|| $class="PHD" || $class=="Master"){
			echo "<br><button name='add_work' type='submit' value='".$student_username."' $disable >Add Job</button>";
		}
		echo "</form>";
		} 
		else{
			echo "Job Info for '".$student_search."' NOT FOUND. SQL Error: " . "<br>" . mysqli_error($conn);
		}
				
	
	?>  
	
	</div>
	
	<?php
		//Do not display milestones section if the student is a Master student
		if($student_class!="Master"){
		echo "<h2>Milestones</h2>";
		echo "<div>";
	   		$sql1="select * from milestones where MUsername='"."$student_search"."';";
		$check_student=mysqli_query($conn, $sql1);
			
		if ($check_student ->num_rows > 0 ) {
		echo "<form  action ='home.php' method ='post'>";
		echo "<table border='1'>";
		echo "<tr><th>Milestone Type</th><th>Milestone Info</th><th>Milestone Status</th></tr>";
			
			while($milestone_info_get = mysqli_fetch_array($check_student)){
				$milestone_id=$milestone_info_get[0];
				$milestone_info=$milestone_info_get[2];
				$milestone_type=$milestone_info_get[3];				
				$milestone_status=$milestone_info_get[4];
				
				//create a table row for each record found, add the record id to each input name to be able to tell them apart when running updates
				echo "<tr style='vertical-align:middle'>";
				echo "<td><input type='text' name='milestone_type".$milestone_id."'  value='".$milestone_type."' $disable ></td>";
				echo "<td><input type='text' name='milestone_info".$milestone_id."' size='50' value='".$milestone_info."' $disable ></td>";				
				echo "<td><input type='text' name='milestone_status".$milestone_id."'  value='".$milestone_status."' $disable ></td>";
				if($user=="admin"|| $class="PHD" || $class=="Master"){
					echo "<td><br><button name='update_milestone' type='submit' value='".$milestone_id."' $disable >Update</button></td>";
					echo "<td><br><button name='delete_milestone' type='submit' value='".$milestone_id."' $disable >Delete</button></td>";
				}
				echo "</tr>";
			}
		echo "</table>";
		if($user=="admin"|| $class="PHD" || $class=="Master"){
			echo "<br><button name='add_milestone' type='submit' value='".$student_username."' $disable >Add Milestone</button>";
		}
		echo "</form>";
		} 
		else{
			echo "milestone Info for '".$student_search."' NOT FOUND. SQL Error: " . "<br>" . mysqli_error($conn);
		}
		echo "</div>";
	}
	?>


	
</body>
</html>

<!-- 
  CSS Section for Login Page
 -->

 <style>
  body {
    margin: 0;
    background: #05366B;
    color: #fff;
  }

  a {
    list-style: none;
    text-decoration: none;
    color: inherit;
  }

  /* Top Navigation */
  
  .site-logo {
      font-weight: 900;
      font-size: 1rem;
      color: #fff;
      text-decoration: none;
    }
  
    header {
      --text: #333;
      --text-inverse: #333;
      --background: transparent;
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      z-index: 999;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 2em 5.5em;
      transition: background 250ms ease-in;
      background: var(--background);
      color: var(--text);
    }
  
    .nav__list {
      list-style: none;
      margin: 0;
      padding: 0;
      display: flex;
    }
  
    .nav__link {
      --spacing: 2em;
      text-decoration: none;
      color: inherit;
      display: inline-block;
      padding: calc(var(--spacing) / 5) var(--spacing);
      position: relative;
      text-transform: uppercase;
      letter-spacing: 2px;
      font-size: 0.9rem;
    }
  
    .nav__link:after {
      content: "";
      position: absolute;
      bottom: 0;
      left: var(--spacing);
      right: var(--spacing);
      height: 2px;
      background: currentColor;
      -webkit-transform: scaleX(0);
      transform: scaleX(0);
      transition: -webkit-transform 150ms ease-in-out;
      transition: transform 150ms ease-in-out;
      transition: transform 150ms ease-in-out, -webkit-transform 150ms ease-in-out;
    }
  
    .nav__link:hover::after {
      -webkit-transform: scaleX(1);
      transform: scaleX(1);
    }
  
    .nav__link--btn {
      border: 1.5px solid currentColor;
      border-radius: 2em;
      margin-left: 1em;
      transition: background 250ms ease-in-out;
      letter-spacing: 1px;
      padding: 0.75em 1.5em;
    }
  
    .nav__link--btn:hover {
      background: var(--text);
      color: var(--text-inverse);
      color: #fff;
      border-color: var(--text);
    }
  
    .nav__link--btn::after {
      display: none;
    }
  
    .nav__link--btn--highlight {
      background: #FB9A49;
      border-color: #FB9A49;
      color: #fff;
    }
  
    .nav__link--btn--highlight:hover {
      background: var(--text);
      border-color: var(--text);
    }
  
    .nav-scrolled {
      --text: #333;
      --text-inverse: #f4f4f4;
      --background: #f4f4f4;
      box-shadow: 0 3px 20px rgba(0, 0, 0, 0.2);
    }
  
    /* End of Navigation */

  /*
  Welcome Center Messages Styles
  */

  .welcome-div {
	position: absolute;
    top: 12%;
    left: 50%;
    transform: translate(-50%, -12%);
    padding: 0vh;
	font-size: 20px;
  }

  .welcome-div-user {
	position: absolute;
    top: 15%;
    left: 50%;
    transform: translate(-50%, -15%);
    padding: 0vh;
	font-size: 15px;
  }

  .welcome-div-classification {
	position: absolute;
    top: 20%;
    left: 50%;
    transform: translate(-50%, -20%);
    padding: 0vh;
	font-size: 15px;
	text-align: center;
  }

  /*
  Welcome Center Messages Styles
  */

  /*
  Search Bar Styles
  */

  .search-bar {
	position: absolute;
    top: 12%;
    left: 85%;
    /* bring your own prefixes */
    transform: translate(-85%, -12%);
    padding: 0vh;
	font-size: 15px;
  }

  .text-box {
	border: none;
    background: inherit;
    border-bottom: 1px solid #ddd;
    outline: none;
    height: 30px;
    font-size: 15px;
    width: 100%;
    margin-top: 2vh;
    color: #fff;
  }

  .submit-button {
    background-color: #D4DCE2;
    border: none;
    color: #3e3e3e;
    padding: 0.40rem;
    font-size: 15px;
    letter-spacing: 1px;
    font-weight: 200;
    text-align: center;
    display: table;
	float: right;
    margin-top: 1.5vh;
    text-decoration: none;
    border-radius: 0vh;
  }

   /*
  Search Bar Styles
  */

  </style>