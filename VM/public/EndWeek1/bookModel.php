<?php

class BookDAO
{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getBookTitles()
    {
        $preparedStatement = $this->db->prepare("SELECT id, title FROM books");
        $preparedStatement->execute();
        $result = $preparedStatement->fetchAll();
        return array_map(function ($row) {
            $book = [];
            $book['id'] = $row['id'];
            $book['title'] = $row['title'];
            return $book;

        }, $result);
    }

    public function getBookDetail($id)
    {
        $preparedStatement = $this->db->prepare("SELECT * FROM books WHERE id = ?");
        $preparedStatement->execute(array($id));
        $data = $preparedStatement->fetchAll();
        $result = array_map(function ($row) {
            $book = [];
            $book['id'] = $row['id'];
            $book['title'] = $row['title'];
            $book['description'] = $row['description'];
            $book['price'] = $row['price'];
            return $book;

        }, $data);
        return $result[0];

    }

    public function editBookDetail($id, $newTitle, $newDescription, $newPrice)
    {
        $bookDetails = $this->getBookDetail($id);
        if ($newTitle) $bookDetails['title'] = $newTitle;
        if ($newDescription) $bookDetails['description'] = $newDescription;
        if ($newPrice) $bookDetails['price'] = $newPrice;

        $preparedStatement = $this->db->prepare("UPDATE books SET title = ?, description = ?, price = ? WHERE id = ?");
        $preparedStatement->execute(array($bookDetails['title'], $bookDetails['description'], $bookDetails['price'], $id));

        return 'Update Complete';
    }

    public function searchBooks($searchTerm)
    {
        $preparedStatement = $this->db->prepare("SELECT id, title FROM books WHERE title LIKE ?");
        $preparedStatement->execute(array("%$searchTerm%"));
        $result = $preparedStatement->fetchAll();

        return array_map(function ($row) {
            $book = [];
            $book['id'] = $row['id'];
            $book['title'] = $row['title'];
            return $book;

        }, $result);

    }
}
