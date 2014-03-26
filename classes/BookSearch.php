<?php
/**
 * Created by PhpStorm.
 * User: cmcclees
 * Date: 3/4/14
 * Time: 5:46 PM
 */

class BookSearch {
protected $books;

    public function __construct($books) {
    $this->books = $books;
    }

    public function find($string) {
        $results = [];

        foreach($this->books as $k =>$book) {
            //var_dump($book['title']);

            if(stristr($book['title'], $string) == TRUE) {
                $results[] = $book;
            }

        }
        return $results;
    }

}