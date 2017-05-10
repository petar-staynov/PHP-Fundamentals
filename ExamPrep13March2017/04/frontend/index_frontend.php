<?php /** @var $data \Data\IndexViewData */ ?>

    <form method="post" enctype="multipart/form-data">
        ISBN: <input type="text" name="isbn"> <br>
        Author: <input type="text" name="author"> <br>
        Title: <input type="text" name="title"> <br>
        Language: <input type="text" name="language"> <br>
        Released On: <input type="date" name="release_date"> <br>
        Genre:
        <select name="genre_id">
            <?php foreach ($data->getGenres() as $genre): ?>
                <option value="<?= $genre->getId(); ?>">
                    <?= $genre->getName(); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br>
        Comment: <br><textarea name="comment"></textarea> <br>
        Image: <input type="file" name="image"> <br>
        <input type="submit" name="add" value="Submit">
    </form>
<form action="books.php">
    <input type="submit" value="Show Books">

</form>
<?php if ($data->getErrors()): ?>
    <h2><?= $data->getErrors(); ?></h2>
<?php endif; ?>