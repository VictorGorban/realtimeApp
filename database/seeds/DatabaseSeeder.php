<?php

use App\Model\Category;
use App\Model\Like;
use App\Model\Question;
use App\Model\Reply;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 10)->create();
        echo "Users faking finished \n";
        factory(Category::class, 5)->create();
        echo "Categories faking finished \n";

        factory(Question::class, 50)->create();
        echo "Questions faking finished \n";

        $replies = factory(Reply::class, 50)->create();
        echo "Replies faking finished \n";

        // for each reply make rand 1..10 likes and save it (create = make+save)
        $replies->each(function (Reply $reply) {
            $like_count = rand(1,10);
            return $reply->likes()->saveMany(
                factory(Like::class, $like_count)->make()
            );
        });

        // make 500 likes
//        factory(Like::class, 500)->create();
        echo "Likes faking finished \n";

    }
}
