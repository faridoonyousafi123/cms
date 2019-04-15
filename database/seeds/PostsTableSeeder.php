<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Category;
use App\Tag;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category_1 = Category::create([
            'name' => 'News'
        ]);
        $category_2 = Category::create([
            'name' => 'Design'
        ]);
        $category_3 = Category::create([
            'name' => 'Updates'
        ]);
        $category_4 = Category::create([
            'name' => 'Marketing'
        ]);
        $post_1 = Post::create([
            'title' => 'We relocated our office to a new designed garage',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry',
            'category_id' => $category_1->id,
            'image' => 'posts/1.jpg'
        ]);

        $post_2 = Post::create([
            'title' => 'Top 5 brilliant content marketing strategies',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry',
            'category_id' => $category_2->id,
            'image' => 'posts/2.jpg'
        ]);

        $post_3 = Post::create([
            'title' => 'Best practices for minimalist design with example',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry',
            'category_id' => $category_3->id,
            'image' => 'posts/3.jpg'
        ]);

        $post_4 = Post::create([
            'title' => 'Congratulate and thank to Maryam for joining our team',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry',
            'category_id' => $category_4->id,
            'image' => 'posts/4.jpg'
        ]);

        $tag_1 = Tag::create([
            'title' => 'Record'
        ]);

        $tag_2 = Tag::create([
            'title' => 'Progress'
        ]);

        $tag_3 = Tag::create([
            'title' => 'Customers'
        ]);

        $tag_4 = Tag::create([
            'title' => 'Offer'
        ]);

        $post_1->tags()->attach([$tag_1->id, $tag_4->id]);
        $post_2->tags()->attach([$tag_2->id, $tag_2->id]);
        $post_3->tags()->attach([$tag_1->id, $tag_3->id]);
        $post_4->tags()->attach([$tag_3->id, $tag_4->id]);
    }
}
