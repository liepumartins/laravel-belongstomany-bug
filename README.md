## BelongsToMany returning all records

Illustrate a specific case that triggers a bug where belongsToMany returns more (all) records instead of those actually related 

Mitigation: use `load('relation')` or `loadMissing('relation')` upon accessing the relation.


## Trying out

`php artisan migrate`

`php artisan db:seed`

Navigate to page and login using credentials `nonexisting@something.unreal` and `password`

/force-eager shows correct

/dashboard shows bug
