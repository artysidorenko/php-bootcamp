<?php
include 'bookModel.php';
include 'bookDisplay.php';

$dbErr = "";
$host = "localhost";
$dbname = "bookstore";
$user = "root";
$pass = "root";

$books = $bookDetails = $editDetails = "";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['queryString']) && isset($_GET['submitSearch'])) {
        try {
            # MySQL with PDO_MYSQL
            $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
            $bookDAO = new BookDAO($DBH);
            $books = $bookDAO->searchBooks($_GET['queryString']);
        } catch (PDOException $e) {
            $dbErr = $e->getMessage();
        }
    }

    if (isset($_GET['listAll'])) {
        try {
            # MySQL with PDO_MYSQL
            $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
            $bookDAO = new BookDAO($DBH);
            $books = $bookDAO->getBookTitles();
        } catch (PDOException $e) {
            $dbErr = $e->getMessage();
        }
    }
    if (isset($_GET['bookId'])) {
        try {
            # MySQL with PDO_MYSQL
            $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
            $bookDAO = new BookDAO($DBH);
            $bookDetails = $bookDAO->getBookDetail($_GET['bookId']);
        } catch (PDOException $e) {
            $dbErr = $e->getMessage();
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "posted\n";
    if (isset($_POST['newTitle']) || isset($_POST['newDescription']) || isset($_POST['newPrice'])) {
        echo $_POST['newTitle'];
        try {
            # MySQL with PDO_MYSQL
            $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
            echo "\n PDO initialized";
            $bookDAO = new BookDAO($DBH);
            echo "\n bookDAO initialized";
            $editDetails = $bookDAO->editBookDetail($_POST['id'], $_POST['newTitle'], $_POST['newDescription'], $_POST['newPrice']);
        } catch (PDOException $e) {
            $dbErr = $e->getMessage();
        }
    }
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">
  </head>
  <body>
    <h1>Bookstore Catalogue</h1>
    <form method="GET" action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>">
      <input type="text" name="queryString" placeholder="Search for book title" />
      <input type="submit" name="submitSearch"/>
    </form>
    <form method="GET" action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>">
      <input type="submit" name="listAll" value="Click To List All Books" />
    </form>
    <br>

    <?php
if ($dbErr) {
    echo '<div>' . $dbErr . '/<div>';
}
if ($books) {
    showBookList($books);
}
if ($bookDetails) {
    showBookDetails($bookDetails);
}
if ($editDetails) {
    echo $editDetails;
}
?>

  </body>
</html>