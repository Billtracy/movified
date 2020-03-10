<?php

namespace App\GraphQL\Types;

use App\Movie;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class MovieType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Movie',
        'description' => 'Details about movies',
        'model' => Movie::class
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'Id of the movie',
            ],
            'title' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The title of the movie',
            ],
            'short_description' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Short description of the movie',
            ],
            'trailer_url' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The trailer_url of the movie',
            ],
            'voted' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'counts the number of votes for a movie',
            ],
            'image' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The image cover of tne movie',
            ],
            'showing_date' => [
                'type' => Type::nonNull(Type::date()),
                'description' => 'The date the movie is showing',
            ]
        ];
    }
}