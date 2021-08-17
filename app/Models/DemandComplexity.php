<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DemandComplexity extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'demand_complexity';

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
    protected $fillable = [
                  'name',
                  'description',
                  'grade'
              ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];
    



}
