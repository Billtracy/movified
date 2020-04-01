<?php
namespace App\GraphQL\Types;

use App\Votables;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class VotablesType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Votable',
        'description' => 'to check voted',
        'model' => Votables::class
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'Id',
            ],
            'check_vote' => [
                'type' => Type::getNullableType(Type::string()),
                'description' => 'Check votes',
            ],
        ];
    }
}