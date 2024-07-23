<?php
include('dbconn.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $packageName = $_POST['packageName'];
    $packagePrice = $_POST['packagePrice'];

    // Handle file upload
    $targetDir = "image/"; // Directory where you want to store the uploaded images
    $targetFile = $targetDir . basename($_FILES["packageImage"]["name"]); // Get the name of the uploaded file

    // Try to upload the file
    if (move_uploaded_file($_FILES["packageImage"]["tmp_name"], $targetFile)) {
        echo "The file " . htmlspecialchars(basename($_FILES["packageImage"]["name"])) . " has been uploaded.";


        // Check connection
        if ($dbconn->connect_error) {
            die("Connection failed: " . $dbconn->connect_error);
        }

        // Insert into database
        $sql = "INSERT INTO package (packageName, packagePrice, packageImage) VALUES (?, ?, ?)";
        $stmt = $dbconn->prepare($sql);
        if ($stmt === false) {
            die("Error preparing statement: " . $dbconn->error);
        }
        $stmt->bind_param("sds", $packageName, $packagePrice, $targetFile);
        if ($stmt->execute()) {
            header('Location: ViewPackageDetails.php');
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
        $dbconn->close();
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Your head content -->
</head>
<body>
    <header>
        <!-- Your header content -->
    </header>
    <main>
        <!-- Form for adding a new package -->
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="packageName">Package Name:</label>
            <input type="text" id="packageName" name="packageName" required><br><br>
            
            <label for="packagePrice">Package Price:</label>
            <input type="number" id="packagePrice" name="packagePrice" required><br><br>
            
            <label for="image">Package Image:</label>
            <input type="file" id="packageImage" name="packageImage" accept="image/*" required><br><br>
            
            <button type="submit">Add Package</button>
        </form>
    </main>
    <footer>
        <!-- Your footer content -->
    </footer>
</body>
</html>
