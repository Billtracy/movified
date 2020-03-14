<?php
namespace App\GraphQL\Types;

use App\ShowingDate;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class ShowingDateType extends GraphQLType
{
    protected $attributes = [
        'name' => 'ShowingDate',
        'description' => 'Details about the movie night',
        'model' => ShowingDate::class
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'Id of the date',
            ],
            'next_movie_night' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The next movie night',
            ]
            ];
    }
}