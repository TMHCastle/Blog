<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Blog;
use App\Models\Comment;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // 调用 UserTableSeeder 填充用户表数据
        $this->call(UserTableSeeder::class);

        // 调用 BlogTableSeeder 填充博客表数据
        $this->call(BlogTableSeeder::class);

        // 调用 CommentTableSeeder 填充评论表数据
        // 注意：评论表依赖于用户和博客表，所以它应该最后调用
        $this->call(CommentTableSeeder::class);
    }
}
