<?php

namespace App\GraphQL\Queries;

use App\Movies;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;

class MoviesQuery extends Query
{
    protected $attributes = [
        'name' => 'movies',
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('Movie'));
    }

    public function resolve($root, $args)
    {
        return Movie::all();
    }
}