<?php

namespace App\Models\Entity;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cat';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'order_srot', 'parent_id'];

    
}
