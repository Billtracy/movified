<?php
namespace App\GraphQL\Types;

use App\Votab;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class VotabsType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Votab',
        'description' => 'to check voted',
        'model' => Votab::class
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