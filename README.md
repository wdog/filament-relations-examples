# RELATION 1-1

## Business Rules:

-   The **User** have one **Profile**.
-   The **Profile** is owned by one **User**.

## Methods

### User

```php
public function profile() {
    return $this->hasOne(Profile::class);
}
```

### Profile

```php
public function user() {
    return $this->belongsTo(User::class);
}
```

### Create relation

```php
# add a car to user
$profile = new Profile;
$user = User::find(1);
$user->profile()->save($profile);

# assign a user to the profile
$profile = new Profile;
$profile->user()->associate(User::find(1));
# or 
$profile->user()->associate(1);
```
