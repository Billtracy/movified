<?php
namespace App\GraphQL\Queries;

use App\Votab;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class VotabsQuery extends Query
{
    protected $attributes = [
        'name' => 'votable',
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('Votables'));
    }

    public function resolve($root, $args)
    {
        return Votab::all();
    }
}