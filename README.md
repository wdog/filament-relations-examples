# RELATION MANY TO MaNY

## BUSINESS LOGIC

-   a `Driver` can drive many cars
-   a `Car` can be driven by many drivers

```php
$driver->cars()->attach([$car1->id,$car2->id,]);
```

    Or use the sync() function to prevent duplicated relations.

```php
$driver->cars()->sync([$car1->id,$car2->id,]);
```

    Create relation between Car and Driver.

```php
$car->drivers()->attach([$driver1->id,$driver2->id,]);
```

    Or use the sync() function to prevent duplicated relations.

```php
$car->drivers()->sync([$driver1->id,$driver2->id,]);
```

## relations

```php
public function cars() {
    return $this->belongsToMany(Car::class)->withTimestamps();
}
```

```php
public function drivers() {
    return $this->belongsToMany(Driver::class)->withTimestamps();
}
```
