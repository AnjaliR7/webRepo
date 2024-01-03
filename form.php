<DOCTYPE! html>
<html>
<head>
<style>
#regform{
background-color: white;
text-align: center;
width: 600;
height: 700;
margin:auto;
}
</style>
</head>
<body>
<div id="regform">
<h2> Muthoot Institute of Technology and Science</h2>
<h3> MCA Internal Exam Marks Entry Form</h3>

<form name="marksForm" action="form.php" method="post" onsubmit="return validate()">
<label for="name">Full Name:</label>
<input type="text" id="name" name="fname" > <br><br>
<label for="roll">Roll No :</label>
<input type="text" id="roll" name="rollno" >
<h4>Marks </h4>
<label for="ds">DS Marks :</label>
<input type="text" id="ds" name="marksDS" ><br><br>
<label for="ase">ASE Marks:</label>
<input type="text" id="ase" name="marksASE" ><br><br>
<label for="tot">Total Marks:</label>
<input type="text" id="tot" name="marksTot" ><br><br>
<input type="submit" name="submit" value="Submit"><br><br>
</form>

<script>
function validate()
{
var fname=document.forms["marksForm"]["fname"].value;
var rollno=document.forms["marksForm"]["rollno"].value;
if (fname==="")
{
     alert("Name is required");
     return false;
}
if (rollno==="" || isNaN(rollno))
{
    alert("enter a valid digit");
    return false;
}
return true;
}
</script>
<?php
// Connect to DB
$conn= mysqli_connect("localhost","root","","college");
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully<br>";

if (isset($_POST['submit']))
{
$fname = $_POST['fname'];
$rollno = $_POST['rollno'];
$marksDS = $_POST['marksDS'];
$marksASE = $_POST['marksASE'];
$marksTot = $_POST['marksTot'];
echo " The values are: ".'<br>';
echo "Name: ".$fname.'<br>';
echo "Roll No: ".$rollno.'<br>';
echo "DS Marks: ".$marksDS.'<br>';
echo "ASE Marks: ".$marksASE.'<br>';
echo "Total Marks: ".$marksTot.'<br>';

//Connecting to database and inserting the values
$sql="insert into marks values('$fname', '$rollno', $marksDS, $marksASE,$marksTot)";
if (mysqli_query($conn, $sql)) {
echo "<br>New record created successfully";
} else {
echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
mysqli_close($conn);
?>
</div>
</body>
</html>