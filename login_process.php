<?php
session_start();

try {
    $conn = new PDO('mysql:host=localhost;port=3307;dbname=queensgate-airlines', 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $exception) {
    echo "Oh no, there was a problem" . $exception->getMessage();
}

if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];


    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindValue(':email', $email);
    $stmt->execute();

    if ($row = $stmt->fetch()) {

        if (password_verify($password, $row['password'])) {
            $_SESSION["user"] = $email;
            header("Location: index.php");
            exit();
        }
    }
    echo "<p>That's the wrong username/password</p>";
}


$conn = NULL;
?>
