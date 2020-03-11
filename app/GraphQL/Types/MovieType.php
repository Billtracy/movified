<?php

namespace App\GraphQL\Types;

use App\Movie;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class MovieType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Movie',
        'description' => 'Details about a movie',
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
            'image' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The cover photo of the movie',
            ],
            'trailer_url' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The trailer of the movie',
            ],
            'showing_date' => [
                'type' => Type::nonNull(Type::date()),
                'description' => 'The showing date of the movie',
            ],
            'voted' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The vote count of the movie',
            ]
        ];
    }
}