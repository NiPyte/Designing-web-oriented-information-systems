<?php

class Model {
    private $pdo;

    public function __construct() {
        // Connect to database
        $this->pdo = new PDO("mysql:host=localhost;dbname=library_mvc;charset=utf8", "root", "");
    }

    // Search for books by title or author surname
    public function findBooks($search = '') {
        if (empty($search)) {
            $sql = "SELECT books.*, author.surname, author.name FROM books 
                    JOIN author ON books.author_id = author.id";
            return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $sql = "SELECT books.*, author.surname, author.name FROM books 
                    JOIN author ON books.author_id = author.id 
                    WHERE books.title LIKE :s OR author.surname LIKE :s";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['s' => "%$search%"]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
}
?>