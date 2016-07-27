<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RecordTest extends TestCase
{
    use DatabaseTransactions;

    public function testCreate()
    {
        $str = ['Year' => '2012', 'Month' => '2', 'Content' => '33333ddsdfdfthis', 'data-react' => '1.0'];
        $response = $this->call('PUT', '/Record/create', $str);
        //$this->seeInDatabase('records', ['Content' => '33333ddsdfdfthis']);
    }
}
