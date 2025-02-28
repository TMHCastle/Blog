<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // 使用工厂生成 50 条假数据并插入数据库
        User::factory(50)->create(); 
        
        $user = User::find(1);
        if ($user) {  // 确保用户存在
            $user->name = "TMHC";
            $user->email = "719281404@qq.com";
            $user->password = bcrypt('lixh020711');
            $user->save();
        }
    }
}
