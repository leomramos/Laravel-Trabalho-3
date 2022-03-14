<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'year',
        'description',
        'price',
        'image'
    ];

    public $rules = [
        'name' => 'required|min:3|max:50',
        'year' => 'numeric|required|min:1960|max:2023',
        'description' => 'max:255',
        'price' => 'numeric|required',
    ];

    public $messages = [
        'name.required' => 'The field "name" is required',
        'name.min' => 'The name must have more than 3 characters',
        'name.max' => 'The name must have less than 50 characters',
        'year.numeric' => 'The year must be a number',
        'year.required' => 'The field "year" is required',
        'year.min' => 'The year must be bigger than 1960',
        'year.max' => 'The year must be smaller than 2023',
        'description' => 'The description must have less than 255 characters',
        'price.numeric' => 'The price must be a number',
        'price.required' => 'The field "price" is required',
    ];
}
