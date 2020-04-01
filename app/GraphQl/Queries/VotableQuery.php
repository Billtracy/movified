<?php

namespace App\GraphQL\Queries;

use App\Votable;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class VotableQuery extends Query
{
    protected $attributes = [
        'name' => 'votable',
    ];

    public function type(): Type
    {
        return GraphQL::type('Votables');
    }

    public function args():array
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
        return Votable::findOrFail($args['id']);
    }
}