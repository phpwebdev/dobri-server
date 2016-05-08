<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Sofa\Eloquence\Eloquence;
use Kyslik\ColumnSortable\Sortable;

class User extends Authenticatable
{
    use Eloquence,Sortable;   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','enabled',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    protected $searchable = [
        'columns' => [
            'name' => 10,
            'email' => 10
        ]
    ];
    protected $sortable = [
        'id',
        'name',
        'email',
        'enabled'
    ];

}
