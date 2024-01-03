<html>
<head>
<style>
#regform{
border:13px outset #513B1C;
background-color:#AF9B60;
text-align: center;
width: 600;
height: 700;
margin:auto;
}
table,tr,td,th
{
border:1px solid black;
}
</style>
</head>
<body>
<div id="regform">
<h2> BOOK DETAILS</h2>

<form name="books" action="book.php" method="post">
<label for="Book_id">Book Id:</label>
<input type="text" id="Book_id" name="Book_id" > <br><br>
<label for="title">Title :</label>
<input type="text" id="title" name="Title" ><br><br>
<label for="author">Author :</label>
<input type="text" id="author" name="Author" ><br><br>
<label for="edition">Edition:</label>
<input type="text" id="edition" name="Edition" ><br><br>
<label for="publisher">Publisher:</label>
<input type="text" id="publisher" name="Publisher" ><br><br>
<input type="submit" name="submit" value="Submit"><br><br>

<h3>Search Book</h3>
<form name="books" action="book.php" method="post">
<label for="boook_id">Book id :</label>
<input type="text" name="Book_d" id="boook_id">
<input type="submit" name="search" value="Search"><br><br>
</form>

<?php
// Connect to DB
$conn= mysqli_connect("localhost","root","","books");
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully<br>";

if (isset($_POST['submit']))
{
$Book_id= $_POST['Book_id'];
$Title = $_POST['Title'];
$Author = $_POST['Author'];
$Edition = $_POST['Edition'];
$Publisher = $_POST['Publisher'];
echo " The values are: ".'<br>';
echo "Book Id: ".$Book_id.'<br>';
echo "Title: ".$Title.'<br>';
echo "Author: ".$Author.'<br>';
echo "Edition: ".$Edition.'<br>';
echo "Publisher: ".$Publisher.'<br>';

//Connecting to database and inserting the values
$sql="insert into bookdetails(Book_id,Title,Author,Edition,Publisher)values('$Book_id', '$Title','$Author', '$Edition','$Publisher')";
if (mysqli_query($conn, $sql)) {
echo "<br>New record created successfully";
} else {
echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}

//Connecting to database and Searching for tuples of given roll no
if(isset($_POST['search']))
{
$Book_id = $_POST['Book_d'];
$sql="select * from bookdetails where Book_id='$Book_id'";
$res= mysqli_query($conn, $sql);
$totRows = mysqli_num_rows($res);

if($totRows==0)
{ echo "No records found!"; }
echo "<center><table><tr>";
echo "<th>Book Id</th><th>Title</th>";
echo "</tr><tr>";
while($row = mysqli_fetch_assoc($res))
{
echo "<td>".$row["Book_id"]."</td>";
echo "<td>".$row["Title"]."</td>";
echo "</tr>";
}
echo "</table></center>";
}
mysqli_close($conn);
?>
</div>
</body>
</html>
