<?php
/** @var $data \Data\IndexViewData */
/** @var $book \Data\BookViewData */
?>
    <form method="post" enctype="multipart/form-data">
        <input type="hidden" value="<?= $book->getId()?>" name="id">
        ISBN: <input type="text" name="isbn"
                     value="<?= $book->getIsbn(); ?>" readonly> <br>
        Author: <input type="text" name="author"
                       value="<?= $book->getAuthor(); ?>"> <br>
        Title: <input type="text" name="title"
                      value="<?=$book->getTitle();?>"> <br>
        Language: <input type="text" name="language"
                         value="<?=$book->getLanguage();?>"> <br>
        Released On: <input type="date" name="release_date"
                            value="<?=$book->getReleaseDate();?>"> <br>
        Genre:
        <select name="genre_id">
            <?php foreach ($data->getGenres() as $genre): ?>
                <option value="<?= $genre->getId(); ?>">
                    <?= $genre->getName(); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br>
        Comment: <br>
        <textarea name="comment"><?=$book->getComment();?></textarea> <br>
        Image: <input type="file" name="image"> <br>
        <input type="submit" name="edit" value="Submit">
    </form>
<?php if ($data->getErrors()): ?>
    <h2><?= $data->getErrors(); ?></h2>
<?php endif; ?>


<?php