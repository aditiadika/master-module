<?php

namespace Modules\Master\Observers;

use Modules\Master\Entities\EmployeeType;
use Modules\Master\Entities\Golongan;
use Modules\Master\Entities\WorkingLocation;

class GolonganObserver
{
    public function creating(Golongan $item)
    {
        $item->company_id = authCompany()->id;
    }

    public function updating(Golongan $item)
    {
        $item->company_id = authCompany()->id;
    }
}
