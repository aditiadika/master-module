<?php

namespace Modules\Master\Observers;

use Modules\Master\Entities\WorkingLocation;

class WorkingLocationObserver
{
    public function creating(WorkingLocation $item)
    {
        $item->company_id = authCompany()->id;
    }

    public function updating(WorkingLocation $item)
    {
        $item->company_id = authCompany()->id;
    }
}
