<?php

/*
 * DesignPatternPHP
 */

namespace DesignPatterns\Tests\Adapter;

use DesignPatterns\Adapter\ElecBookAdapter;
use DesignPatterns\Adapter\Kindle;
use DesignPatterns\Adapter\PaperBookInterface;
use DesignPatterns\Adapter\Book;

/**
 * AdapterTest shows the use of an adapted e-book that behave like a book
 * You don't have to change the code of your client
 */
class AdapterTest extends \PHPUnit_Framework_TestCase
{

    public function getBook()
    {
        return array(
            array(new Book()),
            // we build a "wrapped" electronic book in the adapter
            array(new ElecBookAdapter(new Kindle()))
        );
    }

    /**
     * This client only knows paper book but surprise, surprise, the second book
     * is in fact an electronic book.
     * 
     * @dataProvider getBook
     */
    public function test_I_am_an_old_Client(PaperBookInterface $book)
    {
        $book->open();
        $book->turnPage();
    }

}