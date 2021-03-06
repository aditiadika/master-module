<?php

namespace Modules\Master\Entities;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Master\Observers\EmployeeTypeObserver;

class EmployeeType extends Model
{
    use softDeletes;

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        if(!in_array(auth()->user()->id, config('laraboi.superUserId'))) {
            static::addGlobalScope('sameCompany', function(Builder $builder) {
                $builder->where('company_id', authCompany()->id);
            });
            EmployeeType::observe(new EmployeeTypeObserver());
        }
    }
}
