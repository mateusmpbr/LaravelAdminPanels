<?php

namespace App\Repositories;

use App\Models\Foo;
use App\Repositories\BaseRepository;

/**
 * Class FooRepository
 * @package App\Repositories
 * @version August 22, 2020, 2:01 am UTC
*/

class FooRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'data',
        'confirmed',
        'name',
        'date',
        'date_time'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Foo::class;
    }
}
