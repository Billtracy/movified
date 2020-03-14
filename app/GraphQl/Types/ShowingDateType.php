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

   public function field(): object
        {
            return ['next_movie_night'=>(Type::string)];
        }
    }