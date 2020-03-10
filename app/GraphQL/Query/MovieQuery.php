<?php

namespace App\GraphQL\Queries;

use App\Movie;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;

class MovieQuery extends Query
{
    protected $attributes = [
        'name' => 'movie',
    ];

    public function type()
    {
        return GraphQL::type('Movie');
    }

    public function args()
    {
        return [
            'title' => [
                'name' => 'title',
                'type' => Type::string(),
                'rules' => ['required']
            ],
        ];
    }

    public function resolve($root, $args)
    {
        return Movie::findOrFail($args['title']);
    }
}