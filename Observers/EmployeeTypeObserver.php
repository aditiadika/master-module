<?php

namespace Modules\Master\Observers;

use Modules\Master\Entities\EmployeeType;
use Modules\Master\Entities\WorkingLocation;

class EmployeeTypeObserver
{
    public function creating(EmployeeType $item)
    {
        $item->company_id = authCompany()->id;
    }

    public function updating(EmployeeType $item)
    {
        $item->company_id = authCompany()->id;
    }
}
