<?php

namespace Modules\Master\Observers;

use Modules\Master\Entities\EmployeeType;
use Modules\Master\Entities\JobDepartment;
use Modules\Master\Entities\WorkingLocation;

class JobDepartmentObserver
{
    public function creating(JobDepartment $item)
    {
        $item->company_id = authCompany()->id;
    }

    public function updating(JobDepartment $item)
    {
        $item->company_id = authCompany()->id;
    }
}
