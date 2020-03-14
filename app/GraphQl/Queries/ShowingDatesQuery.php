<?php
namespace App\GraphQL\Queries;

use App\ShowingDate;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class ShowingDatesQuery extends Query
{
    protected $attributes = [
        'name' => 'showingdate',
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('ShowingDate'));
    }

    public function resolve($root, $args)
    {
        return ShowingDate::all();
    }
}