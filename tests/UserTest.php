<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    use DatabaseTransactions;

    public function testUpdateController()
    {
        $user = App\User::find(1);// admin always has ID = 1
        $response = $this->actingAs($user)
            ->call('GET', 'User/' . $user->CV->id . '/update');
        $this->assertResponseOk();
    }

    public function testProfileForm()
    {
        $user = App\User::find(1);// admin always has ID = 1
        $name = str_random(10);
        $response = $this->actingAs($user)
            ->visit('User/' . $user->CV->id . '/edit')
            ->type($name, 'name')
            ->press('submit')->see('error');

        //$this->seeInDatabase('users', ['name' => $name]);

    }
}

