## Intro

This module related to companies and users, Pivot table to each users have many companies.
Impersonate to other company.

## Requirements

This module required some other packages :
- "yajra/laravel-datatables-oracle"

## How to use

Before you run users seed, please run this module seed to seeding permissions to access this module.

```bash
$ php artisan module:seed Master
```

Append this to user model. And then you can use like this $user->companies

```php
use Modules\ClientGroup\Entities\Company;

public function companies()
{
     return $this->belongsToMany(Company::class, 'user_companies');
}
```

Append menu

```php
// laraboi.partials.navbar

@can('view master')
<li class="nav-sub-item">
     <a href="{{ url('/master') }}" class="nav-sub-link">
          <i data-feather="file"></i> Master
     </a>
</li>
@endcan
```
master menu

```php
- Employee Type,
- Working Shift,
- Working Location,
- Job Division,
- Job Deparment,
- Job Level,
- Job Position,
- Golongan,
- Leave Type,
- Religion
```

## Author

- @dika.aditia | aditiaaadicka@gmail.com