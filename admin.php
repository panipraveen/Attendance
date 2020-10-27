<?php session_start(); 
require_once("master.php"); ?>
<div class="container" style='color:#01FF70'>
	<h3><b><U>Student Record Details</U></b></h3>
	<div class="row">
		<div class="col-md-10">
			<form action="admin.php" method="POST">
			<h4><b>Add Student Details:-</b></h4>
		</div>
	</div>
	<div class="row">
			<div class="col-md-6">Enter the Name of the Student&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="text" name="nm"/></div>
	</div><br>
	<div class="row">
		<div class="col-md-6">Enter the Class/Course of Student <input type="text" name="course"/></div>
	</div><br>
	<div class="row">
		<div class="col-md-6">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="submit" name="insert" value="Insert Details"></div>
	</div>
		</form>
</div><br>
<div class="container" style='color:#FFDC00'>
	<div class="row">
		<div class="col-md-10">
			<form action="admin.php" method="POST">
			<h4><b>Delete Student Details:-</b></h4>
		</div>
	</div>
	<div class="row">
			<div class="col-md-6">Enter the Name of the Student you want to Delete <input type="text" name="nom"/></div>
	</div><br>
	<div class="row">
			<div class="col-md-6">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="submit" name="delete" value="Delete Details"/></div>
	</div><br>
	</form>
</div><br><br>
<div class="container" style='color:#FFDC00'>
	<h3><b><U>Course and Department Details</U></b></h3>
	<div class="row">
		<div class="col-md-10">
			<form action="admin.php" method="POST">
			<h4><b>Add Course:-</b></h4>
		</div>
	</div>
	<div class="row">
			<div class="col-md-6">Enter the Course name&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="text" name="cour"/></div>
	</div><br>
	<div class="row">
			<div class="col-md-6">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="submit" name="ins_cour" value="Add course"/></div>
	</div><br>
	</form><br>
	
	
	<div class="row">
		<div class="col-md-10">
			<form action="admin.php" method="POST">
			<h4><b>Delete Course:-</b></h4>
		</div>
	</div>
	<div class="row">
			<div class="col-md-6">Enter the Course name&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="text" name="cour_del"/></div>
	</div><br>
	<div class="row">
			<div class="col-md-6">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="submit" name="del_cour" value="Delete course"/></div>
	</div><br>
	</form>
</div><br>


<div class="container" style='color:#01FF70'>
	<div class="row">
		<div class="col-md-10">
			<form action="admin.php" method="POST">
			<h4><b>Add Department:-</b></h4>
		</div>
	</div>
	<div class="row">
			<div class="col-md-6">Enter the Department name&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="text" name="dept_ins"/></div>
	</div><br>
	<div class="row">
			<div class="col-md-6">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="submit" name="ins_dept" value="Add Department"/></div>
	</div><br>
	</form><br>
	
	
	<div class="row">
		<div class="col-md-10">
			<form action="admin.php" method="POST">
			<h4><b>Delete Department:-</b></h4>
		</div>
	</div>
	<div class="row">
			<div class="col-md-6">Enter the Department name&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="text" name="dept_del"/></div>
	</div><br>
	<div class="row">
			<div class="col-md-6">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="submit" name="del_dept" value="Delete Department"/></div>
	</div><br>
	</form>
</div>
 <h3><a href="/Attendance/home.php">Click Me to Go to Home Page</a></h3>
<?php
		$username = "root";
		$password = "";
		$servername = "localhost";
		$con = new PDO("mysql:host=$servername;dbname=attendance",$username,$password);
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		if(isset($_POST['insert'])){
			$nm=$_POST['nm'];
			$course=$_POST['course'];
			$sql = ("INSERT INTO student_info(name,class) VALUES('$nm','$course')");
			if($con->exec($sql) == True){
				echo "<br><h4><div class='row'><div class='col-md-6'><label>Details Added</label></div></div><br></h4>";
			}
			else{
				echo "<br><h4><div class='row'><div class='col-md-6'><label>Details Not Added</label></div></div><br></h4>";
			}
			
		}
		if(isset($_POST['delete'])){
			$nm=$_POST['nom'];
			$sql = "DELETE FROM student_info WHERE name='$nm'";
			if ($con->query($sql) == TRUE) {
				echo "<br><h4><div class='row'><div class='col-md-6'><label>Details Deleted Sucessfully</label></div></div></h4>";
			} else {
				echo "<br><h4><div class='row'><div class='col-md-6'><label>Details Not Deleted</label></div></div></h4>";
			}
		}
		if(isset($_POST['ins_cour'])){
			$cour =$_POST['cour'];
			$sql = ("INSERT INTO lectures(lecture) VALUES('$cour')");
			if($con->exec($sql) == True){
				echo "<br><h4><div class='row'><div class='col-md-6'><label>Course Added</label></div></div><br></h4>";
			}
			else{
				echo "<br><h4><div class='row'><div class='col-md-6'><label>Course Not Added</label></div></div><br></h4>";
			}
		}
		if(isset($_POST['del_cour'])){
			$cour=$_POST['cour_del'];
			$sql = "DELETE FROM lectures WHERE lecture='$cour'";
			if ($con->query($sql) == TRUE) {
				echo "<br><h4><div class='row'><div class='col-md-6'><label>Course Deleted Sucessfully</label></div></div></h4>";
			} else {
				echo "<br><h4><div class='row'><div class='col-md-6'><label>Course Not Deleted</label></div></div></h4>";
			}
		}
		if(isset($_POST['ins_dept'])){
			$dept =$_POST['dept_ins'];
			$sql = ("INSERT INTO departments(department) VALUES('$dept')");
			if($con->exec($sql) == True){
				echo "<br><h4><div class='row'><div class='col-md-6'><label>Department Added</label></div></div><br></h4>";
			}
			else{
				echo "<br><h4><div class='row'><div class='col-md-6'><label>Department Not Added</label></div></div><br></h4>";
			}
		}
		if(isset($_POST['del_dept'])){
			$dept=$_POST['dept_del'];
			$sql = "DELETE FROM departments WHERE department='$dept'";
			if ($con->query($sql) == TRUE) {
				echo "<br><h4><div class='row'><div class='col-md-6'><label>Department Deleted Sucessfully</label></div></div></h4>";
			} else {
				echo "<br><h4><div class='row'><div class='col-md-6'><label>Department Not Deleted</label></div></div></h4>";
			}
		}
?>