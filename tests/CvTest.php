<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Contracts\Auth\Authenticatable;

class CvTest extends TestCase
{
    use WithoutMiddleware;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testVisitor()
    {
        $visitor = App\User::visitor()->first();
        $user = App\User::findorFail(1);
        $response = $this->actingAs($visitor)->call('GET', 'CV/' . $user->CV->id . '/edit');
        $this->assertEquals(403, $response->status());
    }

    public function testEdit()
    {
        $user = App\User::find(1);// admin always has ID = 1
        $response = $this->actingAs($user)->call('GET', 'CV/' . $user->CV->id . '/edit');
        $this->assertResponseOk();

        $user = App\User::applicant()->first();
        $response = $this->actingAs($user)->call('GET', 'CV/' . $user->CV->id . '/edit');
        $this->assertResponseOk();

    }
}
