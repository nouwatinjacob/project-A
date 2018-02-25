<?php

use Illuminate\Database\Seeder;
use App\Reply;

class RepliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reply1 = [
            'user_id' => 1,
            'topic_id' => 2,
            'content' => 'Duis aute irure dolor in reprehenderit in voluptate 
                          velit esse cillum dolore eu fugiat nulla pariatur. 
                          Excepteur sint occaecat cupidatat non proident, sunt in 
                          culpa qui officia deserunt mollit anim id est laborum.'
        ];

        $reply2 = [
            'user_id' => 2,
            'topic_id' => 5,
            'content' => 'Duis aute irure dolor in reprehenderit in voluptate 
                          velit esse cillum dolore eu fugiat nulla pariatur. 
                          Excepteur sint occaecat cupidatat non proident, sunt in 
                          culpa qui officia deserunt mollit anim id est laborum.'
        ];

        $reply3 = [
            'user_id' => 1,
            'topic_id' => 6,
            'content' => 'Duis aute irure dolor in reprehenderit in voluptate 
                          velit esse cillum dolore eu fugiat nulla pariatur. 
                          Excepteur sint occaecat cupidatat non proident, sunt in 
                          culpa qui officia deserunt mollit anim id est laborum.'
        ];

        $reply4 = [
            'user_id' => 2,
            'topic_id' => 1,
            'content' => 'Duis aute irure dolor in reprehenderit in voluptate 
                          velit esse cillum dolore eu fugiat nulla pariatur. 
                          Excepteur sint occaecat cupidatat non proident, sunt in 
                          culpa qui officia deserunt mollit anim id est laborum.'
        ];

        $reply5 = [
            'user_id' => 1,
            'topic_id' => 2,
            'content' => 'Duis aute irure dolor in reprehenderit in voluptate 
                          velit esse cillum dolore eu fugiat nulla pariatur. 
                          Excepteur sint occaecat cupidatat non proident, sunt in 
                          culpa qui officia deserunt mollit anim id est laborum.'
        ];

        Reply::create($reply1);
        Reply::create($reply2);
        Reply::create($reply3);
        Reply::create($reply4);
        Reply::create($reply5);
    }
}
