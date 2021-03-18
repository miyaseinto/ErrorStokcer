<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TweetControllerTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this
            ->actingAs(User::find(1))
            ->get('/top');

        $response->assertStatus(200)
            ->assertViewIs('tweets.index')
            ->assertSee('投稿一覧'); //ログインしておりかつtweets.indexに【200】のレスポンスを返しその中に投稿一覧の文字があるかのテスト
    }
}
