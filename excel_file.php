<?php
	$username = "root";
		$password = "";
		$servername = "localhost";
		try{
			//fetching from db_attendance
			$conn = new PDO("mysql:host=$servername;dbname=attendance",$username,$password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			//fething name and class from student table to add in the file
			$stmt_0 = $conn->prepare("SELECT id,name,class FROM student_info");
			$stmt_0->execute();
			$result_0 = $stmt_0->fetchAll();
			
			//fetching count of students in student table for while conditional statement and also want to add in excel
			$stmt_0_0 = $conn->prepare("SELECT count(*) FROM student_info");
			$stmt_0_0->execute();
			$result_0_0 = $stmt_0_0->fetchAll();
 
			//iterating the number of times as per the name of each class
			$iter=0;
			//$next_iter = $iter + 1;
			header("Content-type: application/vnd.ms-excel");
			header("Content-Disposition: attachment; filename=Attendance Report.xls");
			echo '<table style="width:30%" border="2">
				  <tr>
					<th>ID</th>
					<th>Name</th>
					<th>Department</th> 
					<th>Present Precentage</th>
				  </tr>';
			while($result_0[$iter]['name'] != $result_0_0[0][0]){
				$ans = $result_0[$iter]['id'];
				$ans1 = $result_0[$iter]['name'];
				$ans2 = $result_0[$iter]['class'];
				$stmt = $conn->prepare("SELECT SUM(lecture_count) AS Total_lecture FROM attendance_info WHERE student_id='".$result_0[$iter]['id']."' AND department='".$result_0[$iter]['class']."'");
				$stmt->execute();
				$result = $stmt->fetchAll();
				//print_r("<br>".$result[0]['Total_lecture']."\t");
				
				$stmt1 = $conn->prepare("SELECT SUM(lecture_count) AS Total_lecture_sit FROM attendance_info WHERE student_id='".$result_0[$iter]['id']."' AND department='".$result_0[$iter]['class']."' AND p_or_a='Present'");
				$stmt1->execute();
				$result1 = $stmt1->fetchAll();
				//print_r($result1[0]['Total_lecture_sit']."\t");
				
				if($result[0]['Total_lecture'] != 0.0){
					$abc = ($result1[0]['Total_lecture_sit'] / $result[0]['Total_lecture'])*100;
					$xyz = sprintf('%0.2f', $abc);
					//echo round_to_2dp($abc)."<br>"; round_to_2dp fuction doesn't work
				}
				else{
					$xyz = "Not Attended";
				}
				
				
				echo"
				  <tr>
					<td>$ans</td>
					<td>$ans1</td>
					<td>$ans2</td>
					";
					if($xyz >=35.00){
						echo "<td style=color:'green'>$xyz %</td>";
					}
					else{
						echo "<td style=color:'red'>$xyz %</td>";
					}
				  echo "</tr>";
				
				
				$iter = $iter + 1;
				if($iter == $result_0_0[0][0]){
					break;	
				}
			}
			echo "</table>";
			
			
			
			/*x$stmt = $conn->prepare("SELECT SUM(lecture_count) AS Total_lecture FROM attendance_info WHERE department='tybsc(cs)'");
			$stmt1 = $conn->prepare("SELECT SUM(lecture_count) AS Total_lecture_sit FROM attendance_info WHERE department='tybsc(cs)' AND p_or_a='Present'");
			$stmt->execute();
			$stmt1->execute();
			$result = $stmt->fetchAll();
			$result1 = $stmt1->fetchAll();
			print_r("<br>".$result[0]['Total_lecture']);
			print_r($result1[0]['Total_lecture_sit']);
			$abc = ($result1[0]['Total_lecture_sit'] / $result[0]['Total_lecture'])*100;
			echo "<br>".$abc;*/
			
			
		}
		catch(PDOException $eee){
			echo $eee->getMessage();
		}
	
?>
