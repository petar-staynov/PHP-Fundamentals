<?php /** @var $data \Data\BookViewData[] */ ?>

<table border="1">
    <thead>
    <th>ISBN</th>
    <th>Title</th>
    <th>Author</th>
    <th>Language</th>
    <th>Genre</th>
    <th>Release Date</th>
    <th>Comment</th>
    <th>Image</th>
    <th>Actions</th>
    </thead>
    <tbody>
        <?php foreach ($data as $book): ?>
            <tr>
                <td><?=$book->getIsbn(); ?></td>
                <td><?=$book->getTitle(); ?></td>
                <td><?=$book->getAuthor(); ?></td>
                <td><?=$book->getLanguage(); ?></td>
                <td><?=$book->getGenreid(); ?></td>
                <td><?=$book->getReleaseDate(); ?></td>
                <td><?=$book->getComment(); ?></td>
                <td><img src="<?=$book->getImageUrl(); ?>"></td>
                <td>
                    <a href="edit.php?id=<?=$book->getId();?>">Edit</a>
                    <a href="delete.php?id=<?=$book->getId();?>">Del</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
