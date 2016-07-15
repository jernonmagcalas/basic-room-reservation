<?php

namespace Eden\Facebook\Fql;

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.1 on 2013-09-28 at 11:07:07.
 */
class SelectTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Select
     */
    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {

    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {

    }

    /**
     * @covers Eden\Facebook\Fql\Select::select
     */
    public function testSelect()
    {
        $query = new Select('backdated_time');

        $this->assertEquals('SELECT backdated_time FROM', $query);
    }

    /**
     * @covers Eden\Facebook\Fql\Select::from
     */
    public function testFrom()
    {
        $query = new Select('backdated_time');
        $query = $query->from('album');

        $this->assertEquals('SELECT backdated_time FROM album', $query);
    }

    /**
     * @covers Eden\Facebook\Fql\Select::where
     */
    public function testWhere()
    {
        $query = new Select('backdated_time');
        $query = $query->from('album')
                ->where(array('id = me'));

        $this->assertEquals('SELECT backdated_time FROM album WHERE id = me'
                , $query);
    }

    /**
     * @covers Eden\Facebook\Fql\Select::sortBy
     */
    public function testSortBy()
    {
        $query = new Select('backdated_time');
        $query = $query->from('album')
                ->where(array('id = me'))
                ->sortBy('sortAsc', 'ASC')
                ->sortBy('sortDesc', 'DESC');

        $this->assertEquals('SELECT backdated_time FROM album WHERE id = me '
                . 'ORDER BY sortAsc ASC, sortDesc DESC', $query);
    }

    /**
     * @covers Eden\Facebook\Fql\Select::limit
     */
    public function testLimit()
    {
        $query = new Select('backdated_time');
        $query = $query->from('album')
                ->where(array('id = me'))
                ->sortBy('sortAsc', 'ASC')
                ->sortBy('sortDesc', 'DESC')
                ->limit(1, 5);

        $this->assertEquals('SELECT backdated_time FROM album WHERE id = me '
                . 'ORDER BY sortAsc ASC, sortDesc DESC LIMIT 1,5', $query);
    }

    /**
     * @covers Eden\Facebook\Fql\Select::getQuery
     */
    public function testGetQuery()
    {
        $query = new Select('backdated_time');
        $query = $query->from('album')
                ->where(array('id = me'))
                ->sortBy('sortAsc', 'ASC')
                ->sortBy('sortDesc', 'DESC')
                ->limit(1, 5)
                ->getQuery();

        $this->assertEquals('SELECT backdated_time FROM album WHERE id = me '
                . 'ORDER BY sortAsc ASC, sortDesc DESC LIMIT 1,5', $query);
    }

    /**
     * @covers Eden\Facebook\Fql\Select::__toString
     */
    public function test__toString()
    {
        $query = new Select('backdated_time');
        $query = $query->from('album')
                ->where(array('id = me'))
                ->sortBy('sortAsc', 'ASC')
                ->sortBy('sortDesc', 'DESC')
                ->limit(1, 5)
                ->__toString();

        $this->assertEquals('SELECT backdated_time FROM album WHERE id = me '
                . 'ORDER BY sortAsc ASC, sortDesc DESC LIMIT 1,5', $query);
    }

}