<?php

namespace Modules\Master\Observers;

use Modules\Master\Entities\EmployeeType;
use Modules\Master\Entities\JobLevel;
use Modules\Master\Entities\WorkingLocation;

class JobLevelObserver
{
    public function creating(JobLevel $item)
    {
        $item->company_id = authCompany()->id;
    }

    public function updating(JobLevel $item)
    {
        $item->company_id = authCompany()->id;
    }
}
