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
    //     return Type::listOf(GraphQL::type('movie'));
    }

    public function args()
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int(),
                'rules' => ['required']
            ],
        ];
    }

    public function resolve($root, $args)
    {
        return Movie::findOrFail($args['id']);
    }
}