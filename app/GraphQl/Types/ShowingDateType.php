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
            'year' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The year',
            ],
            'month' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The month',
            ],
            'date' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The date',
            ],
            'hour' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The hour',
            ],
            'minutes' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'the minutes',
            ],
            'seconds' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The seconds',
            ]
            ];
    }
}