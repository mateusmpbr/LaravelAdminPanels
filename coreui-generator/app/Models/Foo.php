<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Foo
 * @package App\Models
 * @version August 22, 2020, 2:01 am UTC
 *
 * @property string $data
 * @property boolean $confirmed
 * @property string $name
 * @property string $date
 * @property string|\Carbon\Carbon $date_time
 */
class Foo extends Model
{
    use SoftDeletes;

    public $table = 'foos';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'data',
        'confirmed',
        'name',
        'date',
        'date_time'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'data' => 'string',
        'confirmed' => 'boolean',
        'name' => 'string',
        'date' => 'date',
        'date_time' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable',
        'data' => 'required|string|max:65535',
        'confirmed' => 'required|boolean',
        'name' => 'required|string|max:100',
        'date' => 'required',
        'date_time' => 'required'
    ];

    
}
