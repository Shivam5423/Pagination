<?php
$limit =10;
$con = mysqli_connect('localhost','root','','pagination');
$page = $_GET['page'];
$offset = ($page-1)*$limit;
$sql1 = "SELECT * FROM records LIMIT {$offset}, {$limit}";
$result1 = mysqli_query($con,$sql1);
echo "<table border = 1>";
while ($row = mysqli_fetch_assoc($result1)) {
	echo "<tr>";
	echo "<td>{$row['id']}</td>";
	echo "<td>{$row['name']}</td>";
	echo "<td>{$row['address']}</td>";
	echo "<td>{$row['salary']}</td>";
	echo "</tr>";
}
echo "</table>";
$sql = "SELECT * FROM records";
$result = mysqli_query($con, $sql) or die("connection Error");
if(mysqli_num_rows($result)>0){
	$total_records = mysqli_num_rows($result);
	$total_pages = ceil($total_records/$limit);
	for($i = 1;$i<=$total_pages;$i++){
		echo "<td><a href = index1.php?page=$i>$i</a></td>";
	}
}