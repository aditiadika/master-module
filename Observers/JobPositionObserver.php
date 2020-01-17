<?php

namespace Modules\Master\Observers;

use Modules\Master\Entities\EmployeeType;
use Modules\Master\Entities\JobPosition;
use Modules\Master\Entities\WorkingLocation;

class JobPositionObserver
{
    public function creating(JobPosition $item)
    {
        $item->company_id = authCompany()->id;
    }

    public function updating(JobPosition $item)
    {
        $item->company_id = authCompany()->id;
    }
}
