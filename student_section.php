<?php
require("first.php");
include("db.php")
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title>Document</title>
  <style>
    .content {
      max-width: 1130px;
      margin-left: 300px;
      padding: 20px;
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      margin-top: 20px;
    }
  </style>
</head>

<body>
  <div class="content">

    <!-- Title and Add Student Button -->
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h3>Students Listing</h3>
      <a href="add_student.php" class="btn btn-primary">ADD STUDENT</a>
    </div>


    <form action="student_section.php" method="post">

      <div class="form-group">
        <label for="student_register_number">Register Number:</label>
          <input type="number" name="s_register_number" placeholder="Register Number" class="form-control">
      </div>

      
      <div class="form-group">
        <label for="student_name">Student Name:</label>
          <input type="text" name="s_name" placeholder="Enter Student Name" class="form-control">
      </div>  
      

      <div class="form-group">
        <label for="gender">Gender:</label><br>
        <select id="gender" name="gender" class="form-control">
        <option value="">Select Gender</option>
          <option value="male">Male</option>
          <option value="female">Female</option>
        </select>
      </div>
      

      <div class="form-group">
        <label for="student_phoneno">Phone Number:</label>
        <input type="tel" name="s_phoneno" placeholder="Enter Phone Number" class="form-control">
      </div>  
      
      <input type="submit" name="submit"  class="btn btn-primary" value="Show Records">
      
    </form>

<?php
if (isset($_POST["submit"]))
{

  $registerno = $_POST['s_register_number'];
  $name = $_POST['s_name'];
  $gender = $_POST['gender'];
  $phoneno = $_POST['s_phoneno'];

  $check_query = "SELECT * FROM students WHERE  id='$registerno' OR s_name='$name' OR gender='$gender' OR s_phoneno='$phoneno' ";
  $result = mysqli_query($connect, $check_query);

  // Check if any students found
  if (mysqli_num_rows($result) > 0)
  {

    // Output student names
    echo "<div class='mt-10'>";
    echo "<table class='table'>";
    echo "<thead class='thead-dark'>";
    echo "<tr><th>Registration Number</th><th>Name</th><th>Father Name</th><th>Surname</th><th>Address</th><th>Gender</th><th>Email</th><th>Phone Number</th><th>BirthDate</th></tr>";
    echo "</thead>";
    echo "<tbody>";

    while ($row = mysqli_fetch_assoc($result))
    {
      echo "<tr>";
      echo "<td>" . $row['id'] . "</td>";
      echo "<td>" . $row['s_name'] . "</td>";
      echo "<td>" . $row['sfather_name'] . "</td>";
      echo "<td>" . $row['s_surname'] . "</td>";
      echo "<td>" . $row['s_address'] . "</td>";
      echo "<td>" . $row['gender'] . "</td>";
      echo "<td>" . $row['s_email'] . "</td>";
      echo "<td>" . $row['s_phoneno'] . "</td>";
      echo "<td>" . $row['s_birth_date'] . "</td>";
      echo "</tr>";
    }
    echo "<tbody>";
    echo "</table>";
    echo "</div>";
  }
  else
  {
    echo "No students found matching the criteria.";
  }
}

?>
</div>
</body>
</html>
