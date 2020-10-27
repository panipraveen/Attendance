<?php session_start(); 
require_once("master.php"); ?>
<style>
.box {
  background-color: white;
  width: 1200px;
  height: 400px;
  border: 2px solid green;
  padding: 50px;
  margin: 5px;
}
.space{
	padding: 0px 0px 0px 70px;
}

</style>
<!--<?php 
	/*if(isset($_POST['submit'])){
		$servername = "localhost";
		$username = "root";
		$password = "";
		$k=0;
		try {
			$conn = new PDO("mysql:host=$servername;dbname=attendance",$username,$password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$stmt = $conn->prepare("SELECT name FROM student_info WHERE class='Tybsc(cs)' ORDER BY id DESC");
			$stmt->execute();
			$result = $stmt->fetchAll();
			if(count($result)!=null){
				for($i=0;$i<=count($result);$i++){
					echo "<table><tr><td>";
					print_r($result[$k]['name']);
					echo "</td></tr></table>";
					$k+=1;
					if($k==count($result)){
						break;
					}
				}
			}
		}
		catch(PDOException $e)
			{
			echo "Connection failed: " . $e->getMessage();
			}
			$conn=null;
}*/
?>-->
<?php
	if(isset($_POST['submit'])){
		$username = "root";
		$password = "";
		$servername = "localhost";
		$abcde = $_POST['submit'];
		$last_id = $_SESSION["last_id"];
		try{
			//fetching from db_attendance
			$conn = new PDO("mysql:host=$servername;dbname=attendance",$username,$password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$stmt = $conn->prepare("SELECT p_or_a FROM attendance_info WHERE lecture_id='$last_id' AND student_id='$abcde'");
			$stmt->execute();
			$result = $stmt->fetchAll();
			
			//UPDATING the db_attendance 
			if($result[0]['p_or_a'] == 'Present'){
				$connec = new PDO("mysql:host=$servername;dbname=attendance",$username,$password);
				$connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt_update = $conn->prepare("UPDATE attendance_info SET p_or_a='Absent' WHERE lecture_id='$last_id' AND student_id='$abcde'");
				$stmt_update->execute();
				$result_02 = $stmt_update->fetchAll();
			}
			if($result[0]['p_or_a'] == 'Absent'){
				$connec = new PDO("mysql:host=$servername;dbname=attendance",$username,$password);
				$connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt_update = $conn->prepare("UPDATE attendance_info SET p_or_a='Present' WHERE lecture_id='$last_id' AND student_id='$abcde'");
				$stmt_update->execute();
				$result_02 = $stmt_update->fetchAll();
			}
			header("refresh: 1;");
		}
		catch(PDOException $eee){
			echo "";
		}	
	}
?>
<body>
	<div class="container">
		<div class="box">
		<div class="table-responsive">
			<form action="live.php" method="POST">
			<table id="student_info" class="table table-striped table-bordered" align="center" style="width: 1000px;">
				<thead>
					<tr> 
						<td align="center" style="width:700px; color: blue; font-size: 35px"><b>Name<b></td>
						<td align="center" style="color:blue; font-size: 35px"><b>Present/Absent Status<b></td>
					</tr>
				</thead>
				<?php
					$last_id = $_SESSION["last_id"];
					$servername = "localhost";
					$username = "root";
					$password = "";
					$k=0;
					static $val = "Present";
					try {
						$conn = new PDO("mysql:host=$servername;dbname=attendance",$username,$password);
						$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$stmt = $conn->prepare("SELECT name,student_id,p_or_a FROM attendance_info WHERE lecture_id='$last_id'");
						$stmt->execute();
						$result = $stmt->fetchAll();
					}
					catch(PDOException $e)
						{
						echo "Connection failed: " . $e->getMessage();
						}
					while(count($result)!=null){		
						echo'
						<tr>
							<td align="center" style="font-size:20px">'.$result[$k]['name'].'</td>
							<td align="center" style="font-size:20px"><button type="submit" value="'.$result[$k]['student_id'].'" class="form-control btn btn-success" name="submit" id="thebutton">
							'.$result[$k]['p_or_a'].'</button></td>
						</tr>
						';
						$k=$k+1;
						if($k==count($result)){
						break;
						}
					}
					//$conn=null;
?>
			</table>
			</form>
		</div>
		<form action="finish.php" method="POST">
			<input type="submit" name="next" value="Submit" class="form-control btn btn-primary" style="padding: 10px;">
		</form>
	</div>
	</div>
</body>
</html>

<!--<
	if(isset($_POST['submit'])){
		$username = "root";
		$password = "";
		$abcde = $_POST['submit'];
		$last_id = $_SESSION["last_id"];
		try{
			//fetching from db_attendance
			$conn = new PDO("mysql:host=$servername;dbname=attendance",$username,$password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$stmt = $conn->prepare("SELECT p_or_a FROM attendance_info WHERE lecture_id='$last_id' AND student_id='$abcde'");
			$stmt->execute();
			$result = $stmt->fetchAll();
			
			//UPDATING the db_attendance 
			if($result[0]['p_or_a'] == 'Present'){
				$connec = new PDO("mysql:host=$servername;dbname=attendance",$username,$password);
				$connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt_update = $conn->prepare("UPDATE attendance_info SET p_or_a='Absent' WHERE lecture_id='$last_id' AND student_id='$abcde'");
				$stmt_update->execute();
				$result_02 = $stmt_update->fetchAll();
			}
			if($result[0]['p_or_a'] == 'Absent'){
				$connec = new PDO("mysql:host=$servername;dbname=attendance",$username,$password);
				$connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt_update = $conn->prepare("UPDATE attendance_info SET p_or_a='Present' WHERE lecture_id='$last_id' AND student_id='$abcde'");
				$stmt_update->execute();
				$result_02 = $stmt_update->fetchAll();
			}
			header("refresh: 1;");
		}
		catch(PDOException $eee){
			echo $eee->getMessage();
		}	
	}
?>-->

