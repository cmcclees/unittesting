<?php
/**
 * Created by PhpStorm.
 * User: cmcclees
 * Date: 3/4/14
 * Time: 5:25 PM
 */
require_once __DIR__ . '/../classes/BookSearch.php';

class searchTest extends PHPUnit_Framework_TestCase {

protected $books;


    public function setup() {
        $this->books = [
            [ 'title' => 'Introduction to HTML and CSS', 'pages' => 432 ],
            [ 'title' => 'Learning JavaScript Design Patterns', 'pages' => 32 ],
            [ 'title' => 'Object Oriented JavaScript', 'pages' => 42 ],
            [ 'title' => 'JavaScript Web Applications', 'pages' => 99 ],
            [ 'title' => 'PHP Object Oriented Solutions', 'pages' => 80 ],
            [ 'title' => 'PHP Design Patterns', 'pages' => 300 ],
            [ 'title' => 'Head First Java', 'pages' => 200 ]
        ];
    }

public function test_result_contains_books() {
    //arrange
    $search = new BookSearch($this->books);

    //act
    $results = $search->find('javascript');

    //assert
    //3 books returned,
    //compare the specific titles that should be returned
    $expected = [
        [ 'title' => 'Learning JavaScript Design Patterns', 'pages' => 32 ],
        [ 'title' => 'Object Oriented JavaScript', 'pages' => 42 ],
        [ 'title' => 'JavaScript Web Applications', 'pages' => 99 ]
    ];

    $this->assertEquals(3, count($results));
    $this->assertEquals($expected, $results);


}

    public function test_case_exact_insensitive_search() {
        //arrange
        $search = new BookSearch($this->books);

        //act
        $results = $search->find('javascript web applications', true);

        //assert
        //found 1 title
        //title = Javascript Web Applications
        $this->assertEquals(1, count($results));
        $this->assertEquals('JavaScript Web Applications', $results[0]['title']);
    }

    public function test_book_not_found() {
        //arrange
        $search = new BookSearch($this->books);

        //act
        $results = $search->find('The Definitive Guide to Symfony', true);

        //assert
        $this->assertEquals(0, count($results));

    }

} 