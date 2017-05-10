<?php

namespace Services;

use Data\Genre;
use Data\IndexViewData;

interface BookServiceInterface
{
    /**
     * @return Genre[]\Generator
     * @param $isbn
     * @param $author
     * @param $title
     * @param $genreId
     * @param $language
     * @param $releaseDate
     * @return mixed
     */
    public function addBook($isbn, $author, $title, $genreId, $language, $comment = null, $releaseDate, $imageUrl = null);

    public function editBook($id, $author, $title, $genreId, $language, $comment, $releaseDate);

    public function deleteBook($id);

    /**
     * @return IndexViewData
     */
    public function getIndexViewData();

    /**
     * @return BookViewData
     */
    public function findAllBooks();

}