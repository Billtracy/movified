<?php

namespace App\GraphQL\Queries;

use App\ShowingDate;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class ShowingDateQuery extends Query
{
    protected $attributes = [
        'name' => 'showingdate',
    ];

    public function type(): Type
    {
        return GraphQL::type('ShowingDate');
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
        return ShowingDate::findOrFail($args['id']);
    }
}