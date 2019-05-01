<?php

function showBookList($books)
{
    echo '<ul>';
    array_map(function ($book) {
        echo '<li>';
        echo '<form method="GET" action=' . htmlspecialchars($_SERVER["PHP_SELF"]) . '>';
        echo '<input type="submit" name="bookId" value="' . $book["id"] . '">' . $book["title"];
        echo '</input>';
        echo '</form>';
        echo '</li>';
    }, $books);
    echo '</ul>';
}

function showBookDetails($bookDetails)
{
    echo '<p>' . $bookDetails['id'] . '</p>';
    echo '<p>' . $bookDetails['title'] . '</p>';
    echo '<p>' . $bookDetails['description'] . '</p>';
    echo '<p>' . $bookDetails['price'] . '</p>';

    echo '<form method="POST" action=' . htmlspecialchars($_SERVER["PHP_SELF"]) . '>';
    echo '<input type="hidden" name="id" value="' . $bookDetails["id"] . '"/>';
    echo 'New Title: <input type="text" name="newTitle" placeholder="' . substr($bookDetails["title"], 0, 10) . '..."/>';
    echo 'New Description: <input type="textarea" name="newDescription" placeholder="' . substr($bookDetails["description"], 0, 20) . '..."/>';
    echo 'New Price: <input type="number" name="newPrice" placeholder="' . $bookDetails["price"] . '"/>';
    echo '<input type="submit" name="editBook" value="Click to Submit Revisions" />';
    echo '</form>';

}
