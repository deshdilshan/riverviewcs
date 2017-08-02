<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ArticleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
     public function testsArticlesAreCreatedCorrectly()
    {
        
        $payload = [
            'title' => 'Lorem',
            'content' => 'Ipsum',
        ];

        $this->json('POST', '/api/articles', $payload)
            ->assertStatus(200)
            ->assertJson(['author_id' => 1, 'title' => 'Lorem', 'content' => 'Ipsum','url'  => '/article/1','created_at'=>'2017-08-02 08:22:19', 'updated_at' => '2017-08-02 08:22:19']);
    }

    public function testsArticlesAreUpdatedCorrectly()
    {
        
        $article = factory(Article::class)->create([
        	'id'=>1,
        	'author_id' => 1,
            'title' => 'First Article',
            'content' => 'First Body',
            'url'  => '/article/1',
            'created_at'=>'2017-08-02 08:22:19',
            'updated_at' => '2017-08-02 08:22:19'
        ]);

        $payload = [
        	'id'=>1,
        	'author_id' => 1,
            'title' => 'Lorem',
            'content' => 'Ipsum',
            'url'  => '/article/1',
            'created_at'=>'2017-08-02 08:22:19',
            'updated_at' => '2017-08-02 08:22:19'
        ];

        $response = $this->json('PUT', '/api/articles/' . $article->id, $payload)
            ->assertStatus(200)
            ->assertJson([ 
                'id' => 1,
                'author_id' => 1, 
                'title' => 'Lorem', 
                'content' => 'Ipsum',
                'url'  => '/article/1',
	            'created_at'=>'2017-08-02 08:22:19',
	            'updated_at' => '2017-08-02 08:22:19' 
            ]);
    }

    public function testsArtilcesAreDeletedCorrectly()
    {
        
        $article = factory(Article::class)->create([
            'id' => 1,
            'author_id' => 1, 
            'title' => 'Lorem', 
            'content' => 'Ipsum',
            'url'  => '/article/1',
            'created_at'=>'2017-08-02 08:22:19',
            'updated_at' => '2017-08-02 08:22:19' 
        ]);

        $this->json('DELETE', '/api/articles/' . $article->id, [], $headers)
            ->assertStatus(204);
    }

    public function testArticlesAreListedCorrectly()
    {
        factory(Article::class)->create([
            
            'author_id' => 1, 
            'title' => 'Lorem', 
            'content' => 'Ipsum',
            'url'  => '/article/1',
            'created_at'=>'2017-08-02 08:22:19',
            'updated_at' => '2017-08-02 08:22:19' 
        ]);

        factory(Article::class)->create([
            'author_id' => 1, 
            'title' => 'second Lorem', 
            'content' => 'second Ipsum',
            'url'  => '/article/1',
            'created_at'=>'2017-08-02 08:22:19',
            'updated_at' => '2017-08-02 08:22:19'
        ]);

        $response = $this->json('GET', '/api/articles', [], $headers)
            ->assertStatus(200)
            ->assertJson([
                [ 'author_id' => 1, 'title' => 'Lorem', 'content' => 'Ipsum','url'  => '/article/1','created_at'=>'2017-08-02 08:22:19', 'updated_at' => '2017-08-02 08:22:19' ],
                [ 'author_id' => 1, 'title' => 'second Lorem', 'content' => 'second Ipsum','url'  => '/article/1','created_at'=>'2017-08-02 08:22:19', 'updated_at' => '2017-08-02 08:22:19' ]
            ])
            ->assertJsonStructure([
                '*' => ['id','author_id', 'content', 'title','url', 'created_at', 'updated_at'],
            ]);
    }


}
