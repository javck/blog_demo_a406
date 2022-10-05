<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class PostTest extends TestCase
{
    use WithoutMiddleware,RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        Category::factory(5)->create();
        Schema::disableForeignKeyConstraints(); //關閉外鍵偵測
    }
    
    //測試是否正確的建立5筆資料
    public function test_posts_count()
    {
        Post::factory()->count(5)->create(); //生成五筆假資料

        $posts = Post::get();

        $this->assertCount(5,$posts); //確認資料筆數
    }

    //測試 /posts 路徑能否正常訪問
    public function test_index_get()
    {
        Post::factory()->count(5)->create(); //生成五筆假資料
        $response = $this->get('/posts');

        $response->assertStatus(200); //確認狀態碼
    }

    //測試 /posts 路徑能否看到指定的標題
    public function test_index_see()
    {
        Post::factory()->count(2)->create(); //生成2筆假資料
        $response = $this->get('/posts');

        $post = Post::first();
        $response->assertSee($post->title);
    }

    //測試 /posts/{id} 路徑能否正常用get訪問
    public function test_show_get()
    {
        Post::factory()->count(5)->create(); //生成五筆假資料
        $post = Post::first();

        $response = $this->get("/posts/{$post->id}");
        $response->assertStatus(200);
    }

    //測試 /posts/store 路徑能否正常用來新增資料
    public function test_store_post()
    {
        $post = Post::factory()->make();
        $response = $this->post('/posts',['title'=>$post['title'],'content'=>$post['content'],'sort'=>$post['sort'],'content_small'=>$post['content_small'],'pic'=>$post['pic'],'status'=>$post['status'] ]);
        $response->assertStatus(201);
    }
}
