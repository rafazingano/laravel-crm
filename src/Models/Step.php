<?php

namespace ConfrariaWeb\Crm\Models;

use Illuminate\Database\Eloquent\Model;
use ConfrariaWeb\Historic\Traits\HistoricTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Step extends Model
{
    use HistoricTrait;
    use SoftDeletes;

    protected $table = 'crm_steps';

    protected $fillable = [
        'name', 'slug', 'order'
    ];

    public function users()
    {
        return $this->belongsToMany('App\User', 'crm_step_user');
    }

}
