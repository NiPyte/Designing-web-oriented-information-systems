<html>
<head><title>Library Search</title></head>
<body>
<h2>Search Books</h2>
<form action="index.php" method="GET">
    <input type="text" name="search" placeholder="Author or Title...">
    <input type="submit" value="Search">
</form>

<table border="1">
    <tr>
        <th>Title</th>
        <th>Description</th>
        <th>Year</th>
        <th>Author</th>
    </tr>
    <?php foreach ($books as $book): ?>
        <tr>
            <td><?= htmlspecialchars($book['title']) ?></td>
            <td><?= htmlspecialchars($book['description']) ?></td>
            <td><?= htmlspecialchars($book['year']) ?></td>
            <td><?= htmlspecialchars($book['name'] . " " . $book['surname']) ?></td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>