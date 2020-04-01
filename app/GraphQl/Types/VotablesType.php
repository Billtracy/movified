<?php
namespace App\GraphQL\Types;

use App\Votable;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class VotablesType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Votab',
        'description' => 'to check voted',
        'model' => Votable::class
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'Id',
            ],
            'check_votes' => [
                'type' => Type::getNullableType(Type::string()),
                'description' => 'Check votes',
            ],
        ];
    }
}