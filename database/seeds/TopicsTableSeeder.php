<?php

use Illuminate\Database\Seeder;
use App\Topic;

class TopicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $topic1 = [
            'title' => 'What Instagram Ads Will Look Like',
            'user_id' => 1,
            'category_id' => 1,
            'description' => 'Duis aute irure dolor in reprehenderit in voluptate 
                          velit esse cillum dolore eu fugiat nulla pariatur. 
                          Excepteur sint occaecat cupidatat non proident, sunt in 
                          culpa qui officia deserunt mollit anim id est laborum.'
        ];

        $topic2 = [
            'title' => '10 Kids Unaware of Their Halloween Costume',
            'user_id' => 1,
            'category_id' => 2,
            'description' => 'Duis aute irure dolor in reprehenderit in voluptate 
                          velit esse cillum dolore eu fugiat nulla pariatur. 
                          Excepteur sint occaecat cupidatat non proident, sunt in 
                          culpa qui officia deserunt mollit anim id est laborum.'
        ];

        $topic3 = [
            'title' => 'The Future of Magazines Is on Tablets',
            'user_id' => 2,
            'category_id' => 2,
            'description' => 'Duis aute irure dolor in reprehenderit in voluptate 
                          velit esse cillum dolore eu fugiat nulla pariatur. 
                          Excepteur sint occaecat cupidatat non proident, sunt in 
                          culpa qui officia deserunt mollit anim id est laborum.'
        ];

        $topic4 = [
            'title' => 'Pinterest Now Worth $3.8 Billion',
            'user_id' => 2,
            'category_id' => 1,
            'description' => 'Duis aute irure dolor in reprehenderit in voluptate 
                          velit esse cillum dolore eu fugiat nulla pariatur. 
                          Excepteur sint occaecat cupidatat non proident, sunt in 
                          culpa qui officia deserunt mollit anim id est laborum.'
        ];

        $topic5 = [
            'title' => 'The Future of Magazines Is on Tablets',
            'user_id' => 1,
            'category_id' => 4,
            'description' => 'Duis aute irure dolor in reprehenderit in voluptate 
                          velit esse cillum dolore eu fugiat nulla pariatur. 
                          Excepteur sint occaecat cupidatat non proident, sunt in 
                          culpa qui officia deserunt mollit anim id est laborum.'
        ];

        Topic::create($topic1);
        Topic::create($topic2);
        Topic::create($topic3);
        Topic::create($topic4);
        Topic::create($topic5);
    }
}
