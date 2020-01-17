<?php

namespace Modules\Master\Observers;

use Modules\Master\Entities\EmployeeType;
use Modules\Master\Entities\LeaveType;
use Modules\Master\Entities\WorkingLocation;

class LeaveTypeObserver
{
    public function creating(LeaveType $item)
    {
        $item->company_id = authCompany()->id;
    }

    public function updating(LeaveType $item)
    {
        $item->company_id = authCompany()->id;
    }
}
