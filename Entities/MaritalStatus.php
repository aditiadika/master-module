<?php

namespace Modules\Master\Entities;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Master\Observers\MaritalStatusObserver;

class MaritalStatus extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        if (!in_array(auth()->user()->id, config('laraboi.superUserId'))) {
            static::addGlobalScope('sameCompany', function (Builder $builder) {
                $builder->where('company_id', authCompany()->id);
            });
            MaritalStatus::observe(new MaritalStatusObserver);
        }
    }

    public function scopeActive()
    {
        return $this->whereActive(1);
    }
}
