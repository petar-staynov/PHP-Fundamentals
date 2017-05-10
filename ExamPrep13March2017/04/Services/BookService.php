<?php


namespace Services;


use Adapter\DatabaseInterface;
use Data\BookViewData;
use Data\Genre;
use Data\IndexViewData;

class BookService implements BookServiceInterface
{
    /**
     * @var DatabaseInterface
     */
    private $db;

    /**
     * BookService constructor.
     * @param DatabaseInterface $db
     */
    public function __construct($db)
    {
        $this->db = $db;
    }


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
    public function addBook($isbn, $author, $title, $genreId, $language, $comment = null, $releaseDate, $imageUrl = null)
    {
        if (empty($isbn)){
            throw new \Exception('ISBN cannot be empty');
        }
        if (empty($author)){
            throw new \Exception('Author cannot be empty');
        }
        if (empty($title)){
            throw new \Exception('Title cannot be empty');
        }
        if (empty($language)) {
            throw new \Exception('Language cannot be empty');
        }
        if (empty($releaseDate)){
            throw new \Exception('Date cannot be empty');
        }
        if (empty($genreId)){
            throw new \Exception('Genre cannot be empty');
        }

        try{
            $datetime = new \DateTime($releaseDate);
        } catch (\Exception $exception) {
            throw new \Exception('Invalid date');

        }
        $datetime = new \DateTime($releaseDate);


//        if ($this->genreExists($genreId)) {
//            throw new \Exception('Genre doesn\'t exist');
//        }

        $query = "INSERT INTO books
        SET isbn = ?,
        title = ?,
        genre_id = ?,
        author = ?,
        relase_date = ?,
        comment = ?,
        language = ?,
        image_url = ?";

        $stmt = $this->db->prepare($query);
        $stmt->execute([$isbn, $title, $genreId, $author, $releaseDate, $comment, $language, $imageUrl]);


    }

    /**
     * @return IndexViewData
     */
    public function getIndexViewData()
    {
        $query = "SELECT id, name FROM genres";
        $stmt = $this->db->prepare($query);
        $stmt->execute([]);

        $viewData = new IndexViewData();
        $viewData->setGenres(
            function() use ($stmt){
                while ($genre = $stmt->fetchObject(Genre::class)){
                    yield $genre;
                }
            }
        );
        return $viewData;
    }

    public function editBook($id, $title, $genre, $author, $release_date, $comment, $language)
    {
        $query = "
        UPDATE 
        books
        SET
        title = ?,
        genre_id = ?,
        author = ?,
        relase_date = ?,
        comment = ?,
        language = ?
        WHERE
        books.id = ?
        ";

        $stmt = $this->db->prepare($query);
        $stmt->execute([
            $title,
            $genre,
            $author,
            $release_date,
            $comment,
            $language,
            $id
        ]);
    }

    public function deleteBook($id)
    {
        $query = "
        DELETE 
        FROM 
        books 
        WHERE 
        books.id = ?
        ";
        $stmt = $this->db->prepare($query);
        $stmt->execute([
            $id
        ]);
    }

    private function genreExists($id)
    {
        $query = "SELECT id FROM genres WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$id]);

        $row = $stmt->fetchRow();
        return !!$row;
    }

    /**
     * @return BookViewData[]|\Generator
     */
    public function findAllBooks()
    {
        $query = "
        SELECT 
        books.id,
        isbn,
        title,
        genre_id,
        author,
        YEAR(relase_date) AS release_date,
        comment,
        language,
        image_url AS image_url
        FROM books 
        INNER JOIN
        genres
        ON 
        books.genre_id = genres.id
        ORDER BY books.relase_date DESC ";

        $stmt = $this->db->prepare($query);
        $stmt->execute();

        while ($book = $stmt->fetchObject(BookViewData::class)){
            yield $book;
        }
    }

    /**
     * @param $id
     */
    public function findBook($id){
        $query = "
        SELECT 
        books.id,
        isbn,
        title,
        genre_id,
        author,
        YEAR(relase_date) AS release_date,
        comment,
        language,
        image_url AS image_url
        FROM 
        books 
        INNER JOIN
        genres
        ON 
        books.genre_id = genres.id
        WHERE 
        books.id = ?";

        $stmt = $this->db->prepare($query);
        $stmt->execute([$id]);

        $book = $stmt->fetchObject(BookViewData::class);
        return $book;
    }
}