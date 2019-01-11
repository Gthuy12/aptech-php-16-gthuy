<?php
echo "<a href=\"./\">BACK</a>";
/* 2. --- FORM VALIDATION ---
 *
 * Validation is not easy, think about what kind of the data you wanna get, that's a good way to secure your website.
 *
 */



/*
 * EXERCISE 1 : Validations rules the form :
 * Name : Required + Must only contain letters.
 * Email : Required + Must contain a valid Email Address (with @ and .).
 * Gender : Required + Must select one.
 *
 */

/*
 * SUGGESTION : DO IT OUTSIDE the <?php ?>
 * Below the echo
 *
 */


?>
<?php
 $name = $email = $gender = "";
$nameErr = $emailErr = $genderErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
if (validateInput($_POST["name"])) {
$name = validateInput($_POST["name"]);
if (!preg_match("/^[a-zA-z ]*$/", $name)) {
$nameErr = "Only letters and white space allowed";
}
} else {
$nameErr = "Name field is required";
}

if (validateInput($_POST["email"])) {
$email = validateInput($_POST["email"]);
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
$emailErr = "Invalid email format";
}
} else {
$emailErr = "Email field is required";
}

if (validateInput($_POST["gender"])) {
$gender = validateInput($_POST["gender"]);
} else {
$genderErr = "Gender field is required";
}

}

function validateInput($data)
{
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
} 
?>
 <!DOCTYPE html>
<html>
<head>
</head>
<body>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
Name : <input type="text" name="name" value="<?php if ($nameErr || $emailErr || $genderErr) {
              echo $name; } ?>" required>
<span style="color:red;"><?php echo $nameErr; ?></span>
<br>
Email : <input type="email" name="email" value="<?php if ($nameErr || $emailErr || $genderErr) {
                                                  echo $email;
                                                } ?>" required>
<span style="color:red;"><?php echo $emailErr; ?></span>
<br>
Gender : <input type="radio" name="gender" value="female" <?php if ($gender === "female" || empty($gender) || (!$nameErr && !$emailErr && !$genderErr)) {
                                                            echo "checked";
                                                          } ?>>Female
<input type="radio" name="gender" value="male" <?php if ($gender === "male" && ($nameErr || $emailErr || $genderErr)) {
                                                echo "checked";
                                              } ?>>Male
<span style="color:red;"><?php if ($nameErr || $emailErr || $genderErr) {
                          echo $genderErr;
                        } ?></span>
<br>
<button type="submit">Submit</button>
</form>
</body>
</html> 
<?php
//  if (!$nameErr && !$emailErr && !$genderErr) {
// echo "Your name is : $name<br>";
// echo "Your email is : $email<br>";
// echo "Your gender is : $gender";
// $name = $email = $gender = '';
//}
?>

<?php
$servername = "localhost";
$username = "gthuy";
$password = "gthuy";
$dbname = "gthuy";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO users ( name, email)
VALUES ('$name', '$email')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>