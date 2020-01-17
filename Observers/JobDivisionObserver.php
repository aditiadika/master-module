<?php

namespace Modules\Master\Observers;

use Modules\Master\Entities\EmployeeType;
use Modules\Master\Entities\JobDivision;
use Modules\Master\Entities\WorkingLocation;

class JobDivisionObserver
{
    public function creating(JobDivision $item)
    {
        $item->company_id = authCompany()->id;
    }

    public function updating(JobDivision $item)
    {
        $item->company_id = authCompany()->id;
    }
}
