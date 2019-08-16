<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert(
            [
                [
                    'title' => 'VueJs',
                    'image' => 'devicon-vuejs-plain',
                    'slug' => 'vuejs'
                ],
                [
                    'title' => 'HTML',
                    'image' => 'devicon-html5-plain',
                    'slug' => 'html'
                ],
                [
                    'title' => 'CSS',
                    'image' => 'devicon-css3-plain',
                    'slug' => 'css'
                ],
                [
                    'title' => 'React',
                    'image' => 'devicon-react-original',
                    'slug' => 'react'
                ],
                [
                    'title' => 'Angular',
                    'image' => 'devicon-angularjs-plain',
                    'slug' => 'angular'
                ],
                [
                    'title' => 'JavaScript',
                    'image' => 'devicon-javascript-plain',
                    'slug' => 'javascript'
                ],
                [
                    'title' => 'Pyton',
                    'image' => 'devicon-python-plain',
                    'slug' => 'pyton'
                ],
                [
                    'title' => 'Ruby',
                    'image' => 'devicon-ruby-plain',
                    'slug' => 'ruby'
                ],
                [
                    'title' => 'PHP',
                    'image' => 'devicon-php-plain',
                    'slug' => 'php'
                ],
                [
                    'title' => 'NodeJs',
                    'image' => 'devicon-nodejs-plain',
                    'slug' => 'nodejs'
                ],
                [
                    'title' => 'Laravel',
                    'image' => 'devicon-laravel-plain',
                    'slug' => 'laravel'
                ],
                [
                    'title' => 'Rails',
                    'image' => 'devicon-rails-plain',
                    'slug' => 'rails'
                ],
                [
                    'title' => 'Django',
                    'image' => 'devicon-django-plain',
                    'slug' => 'django'
                ],
                [
                    'title' => 'MySql',
                    'image' => 'devicon-mysql-plain',
                    'slug' => 'mysql'
                ],
                [
                    'title' => 'Postgres',
                    'image' => 'devicon-postgresql-plain',
                    'slug' => 'postgres'
                ],
                [
                    'title' => 'MongoDb',
                    'image' => 'devicon-mongodb-plain',
                    'slug' => 'mongodb'
                ],
                [
                    'title' => 'Webpack',
                    'image' => 'devicon-webpack-plain',
                    'slug' => 'webpack'
                ],
                [
                    'title' => 'Gulp',
                    'image' => 'devicon-gulp-plain',
                    'slug' => 'gulp'
                ]
            ]
        );
    }
}
