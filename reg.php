
<?php
// Establish a connection to the database
$dbHost = 'localhost';
$dbName = 'employee';
$dbUser = 'root';
$dbPass = '@EWK0129#';

$db = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8", $dbUser, $dbPass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db = new PDO("mysql:host=localhost;dbname=employee", "root", "@EWK0129#");
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get form data from $_POST array
$firstName = $_POST['first_name'];
$lastName = $_POST['last_name'];
$firstEmail = $_POST['first_email'];
$secondEmail = $_POST['second_email'];
$city = $_POST['city'];
$state = $_POST['state'];
$zipFile = $_POST['zip_file'];
// $photo = $_FILES['photo']['name'];




// Prepare a SQL statement to insert the data into the database
$stmt = $db->prepare("INSERT INTO employee (first_name, last_name, first_email, second_email, city, state, zip_file) VALUES (:first_name, :last_name, :first_email, :second_email, :city, :state, :zip_file)");

// Bind values to the parameters in the SQL statement
$stmt->bindParam(':first_name', $firstName);
$stmt->bindParam(':last_name', $lastName);
$stmt->bindParam(':first_email', $firstEmail);
$stmt->bindParam(':second_email', $secondEmail);
$stmt->bindParam(':city', $city);
$stmt->bindParam(':state', $state);
$stmt->bindParam(':zip_file', $zipFile);
// $stmt->bindParam(':photo', $photo);

// Upload the zip file and photo to the server
// $zipFilePath = 'uploads/' . $zipFile;
// $photoFilePath = 'uploads/' . $photo;
// move_uploaded_file($_FILES['zip_file']['tmp_name'], $zipFilePath);
// move_uploaded_file($_FILES['photo']['tmp_name'], $photoFilePath);

// Execute the SQL statement
$stmt->execute();

// Redirect the user back to the form page
header('Location: index.html');
?>