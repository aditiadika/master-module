<?php

namespace Modules\Master\Observers;

use Modules\Master\Entities\EmployeeType;
use Modules\Master\Entities\WorkingLocation;
use Modules\Master\Entities\WorkingShift;

class WorkingShiftObserver
{
    public function creating(WorkingShift $item)
    {
        $item->company_id = authCompany()->id;
    }

    public function updating(WorkingShift $item)
    {
        $item->company_id = authCompany()->id;
    }
}
