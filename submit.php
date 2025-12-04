<?php 
error_reporting(E_ALL); 
ini_set('display_errors', 1); 

$name = $_POST['name']; 
$email = $_POST['email']; 
$website = $_POST['website']; 
$comment = $_POST['comment']; 
$gender = $_POST['gender']; 

// Database connection 
$servername = "db"; 
$username = "root"; 
$password = "rootpass"; 
$dbname = "studentapp"; 

// Create connection 
$conn = mysqli_connect($servername, $username, $password, $dbname); 

// Check connection 
if (!$conn) { 
    die("Connection failed: " . mysqli_connect_error()); 
} 

// Insert query 
$sql = "INSERT INTO users (name, email, website, comment, gender) 
        VALUES ('$name', '$email', '$website', '$comment', '$gender')"; 
?> 

<!DOCTYPE html>
<html>
<head>
<title>Form Submission Result</title>

<style>
    body {
        font-family: Arial, sans-serif;
        background: #f4f6f9;
        padding: 40px;
        margin: 0;
        display: flex;
        justify-content: center;
    }
    .card {
        background: #fff;
        padding: 30px;
        border-radius: 12px;
        width: 600px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.12);
        animation: fadeIn 0.6s ease-in-out;
    }
    h2 {
        color: #2ecc71;
        text-align: center;
    }
    h3 {
        color: #333;
    }
    ul {
        list-style: none;
        padding: 0;
    }
    ul li {
        padding: 10px 0;
        border-bottom: 1px solid #eee;
        font-size: 16px;
    }
    ul li strong {
        color: #34495e;
    }
    .error {
        color: #e74c3c !important;
        text-align: center;
    }
    .btn {
        display: block;
        margin: 25px auto 0;
        width: 200px;
        text-align: center;
        padding: 12px;
        background: #3498db;
        color: white;
        border-radius: 6px;
        text-decoration: none;
        transition: 0.3s;
        font-size: 16px;
    }
    .btn:hover {
        background: #2980b9;
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

</head>
<body>

<div class="card">
<?php 
if (mysqli_query($conn, $sql)) { 
    echo "<h2>✅ New record created successfully!</h2>"; 
    echo "<h3>Submitted Information:</h3>"; 
    echo "<ul>"; 
    echo "<li><strong>Name:</strong> " . htmlspecialchars($name) . "</li>"; 
    echo "<li><strong>Email:</strong> " . htmlspecialchars($email) . "</li>"; 
    echo "<li><strong>Website:</strong> " . htmlspecialchars($website) . "</li>"; 
    echo "<li><strong>Comment:</strong> " . htmlspecialchars($comment) . "</li>"; 
    echo "<li><strong>Gender:</strong> " . htmlspecialchars($gender) . "</li>"; 
    echo "</ul>"; 
} else { 
    echo "<h2 class='error'>❌ Error submitting form</h2>";
    echo "<p class='error'>" . mysqli_error($conn) . "</p>"; 
} 

mysqli_close($conn); 
?> 

<a class="btn" href="index.html">⬅ Go Back</a>

</div>

</body>
</html>
