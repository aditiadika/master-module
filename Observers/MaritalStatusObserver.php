<?php

namespace Modules\Master\Observers;

use Modules\Master\Entities\MaritalStatus;

class MaritalStatusObserver
{
    public function creating(MaritalStatus $item)
    {
        $item->company_id = authCompany()->id;
    }

    public function updating(MaritalStatus $item)
    {
        $item->company_id = authCompany()->id;
    }
}
