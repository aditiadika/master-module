<?php

namespace Modules\Master\Observers;

use Modules\Master\Entities\EmployeeType;
use Modules\Master\Entities\Religion;
use Modules\Master\Entities\WorkingLocation;

class ReligionObserver
{
    public function creating(Religion $item)
    {
        $item->company_id = authCompany()->id;
    }

    public function updating(Religion $item)
    {
        $item->company_id = authCompany()->id;
    }
}
