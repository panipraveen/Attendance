<?php session_start(); 
require_once("master.php"); ?>

<style>
.teac{
	width:500px;
	background: #ffff80;
	color: blue;
}
.space{
	padding: 0px 0px 0px 350px;
}
</style>
	<form action= "home.php" method="post">
		<div class="container">
			<div class="row">
				<div class="col-md-10 space">
					<select class="form-control teac" name="drop">
					  <option value="cho_ose">Click to select the Class</option>
					  <?php
						$con_dept = new PDO("mysql:host=$servername;dbname=attendance",$username,$password);
						$con_dept->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$stmt_dept = $con_dept->prepare("SELECT department FROM departments");
						$stmt_dept->execute();
						$result_dept = $stmt_dept->fetchAll();
						for($i=0;$i<count($result_dept);$i++): ?>	
								<option value="<?php echo $result_dept[$i]['department']; ?>"><?php echo $result_dept[$i]['department']; ?></option>
						<?php 
						endfor;
						?>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="col-md-10 space">
					<select class="form-control teac" name="subject">
					  <option value="cho_ose">Click to select the Subject</option>
					  <?php
						$con_lec = new PDO("mysql:host=$servername;dbname=attendance",$username,$password);
						$con_lec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$stmt_lec = $con_lec->prepare("SELECT lecture FROM lectures");
						$stmt_lec->execute();
						$result_lec = $stmt_lec->fetchAll();
						for($j=0;$j<count($result_lec);$j++): ?>	
								<option value="<?php echo $result_lec[$j]['lecture']; ?>"><?php echo $result_lec[$j]['lecture']; ?></option>
						<?php 
						endfor;
						?>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="col-md-10 space">
					<select class="form-control teac" name="lecture">
					  <option value="cho_ose">Click to select how many Lecture</option>
					  <option value="1">1</option>
					  <option value="2">2</option>
					  <option value="3">3</option>
					  <option value="4">4</option>
					  <option value="5">5</option>
					  <option value="6">6</option>
					  <option value="7">7</option>
					  <option value="8">8</option>
					  <option value="9">9</option>
					  <option value="10">10</option>
					  <option value="11">11</option>
					  <option value="12">12</option>
					  <option value="13">13</option>
					  <option value="14">14</option>
					  <option value="15">15</option>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="col-md-7 space"><input type="submit" value="submit" name="submit" class="form-control btn-info"></div>
			</div>
		</form><br>
		<form action="excel_file.php" method="POST">
			<div class="row">
				<div class="col-md-7 space"><button type="submit" name="report" class="form-control btn-info">Generate Report</button></div>
			</div>
		</form>
		<form action="admin.php" method="POST">
			<div class="row">
				<div class="col-md-7 space"><button type="submit" name="Admin" class="form-control btn-info">Go to Admin Page</button></div>
			</div>
		</form>			
		</div>
</body>
</html>
<?php
	if(isset($_POST['submit'])){
		$abc=$_POST['drop'];
		$pqr=$_POST['subject'];
		$xyz=$_POST['lecture'];
		if(($abc != 'cho_ose') && ($pqr !='cho_ose') && ($xyz !='cho_ose')){
			$servername = "localhost";
			$username = "root";
			$password = "";
				try {
					//insert into lecture_info table
					$conn = new PDO("mysql:host=$servername;dbname=attendance",$username,$password);
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql = ("INSERT INTO lecture_info(department,subject,lecture_count) VALUES('$abc','$pqr',$xyz)");
					$conn->exec($sql);
					//retrieving last record id from lecture_info table
					$last_id = $conn->lastInsertId();
					//echo "Last inserted ID is: " . $last_id;
					$_SESSION["last_id"] = "$last_id";
					
					//retrieving id and name and class from student_info table
					$stmt = $conn->prepare("SELECT id, name FROM student_info WHERE class='$abc'");
					$stmt->execute();
					$result = $stmt->fetchAll();
					echo "<br>";
					for($i=0;$i<count($result);$i++){
						print_r($result[$i][0]);
						print_r($result[$i][1]);echo "<br>";
					}
					
					//inserting the values into attendance_info table
					for($j=0;$j<count($result);$j++){
						$j_res1=$result[$j][0];
						$j_res2=$result[$j][1];
						$sql1= ("INSERT INTO attendance_info(lecture_id,student_id,name,department,subject,lecture_count,p_or_a) VALUES('$last_id','$j_res1','$j_res2','$abc','$pqr','$xyz','Absent')");
						$conn->exec($sql1);
					}
				}
				catch(PDOException $e)
					{
					echo "Connection failed: " . $e->getMessage();
					}
				header("Location: /Attendance/live.php");
		}
		else{
			echo "<div class='col-md-10 space'><label>Please fill the fields</label></div>";
		}
	}
?>
<?php
	if(isset($_POST['report'])){
		require 'excel_file.php';
	}
?>