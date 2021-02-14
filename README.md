# Bokalsyo
Hinabang alang sa mga nanginahanglan.

==================

## Install (Laravel)
Install via composer
```bash
composer require bokalsyo/tabang
```

### UUID
**Migration**
```php
$table->customUuid();
```

**Model**
```php
use Bokalsyo\Tabang\Hinabang\HasUuid;
use Illuminate\Database\Eloquent\Model;

YourModel extends Model
{
    use HasUuid;
}
```

### Slug
**Migration**
```php
$table->slug();
```

**Model**
```php
use Bokalsyo\Tabang\Hinabang\HasSlug;
use Illuminate\Database\Eloquent\Model;

YourModel extends Model
{
    use HasSlug;
}
```

**Sluggable Field**
By default, it uses the field `name` as the basis of slug value by using `Str::slug()` helper method. If you want to override the default field, you can do it by adding this to your model.
```php
protected function sluggableField()
{
    return 'name';
}
```

You can also choose which concatenator to use for `Str::slug()`
```php
protected function slugConcatenator()
{
    return '-';
}
```

### Creator
**Migration**
```php
$table->creator();
```

**Model**
```php
use Bokalsyo\Tabang\Hinabang\HasCreator;
use Illuminate\Database\Eloquent\Model;

YourModel extends Model
{
    use HasCreator;
}
```

**Custom Field Name**
```php
$table->creator();
$table->creator('creator_id', 'users', 'id'); // default parameters
```
is the same as
```php
$table->unsignedBigInteger('creator_id');
$table->foreign('creator_id')
    ->references('id')
    ->on('users');
```

If you want to change the attribute being used eg (`Admin::class` model and `admins` table) you can do something like this.
```php
$table->creator('admin_id', 'admins', 'id');

// then add this in your Model
protected function creatorAttribute()
{
    return 'admin_id'; // default is creator_id
}

// and for eloquent relationship
protected function creatorClass()
{
    return Admin::class; // default is User::class
}
```