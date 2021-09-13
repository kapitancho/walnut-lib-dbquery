# Database Query basics
A simple abstraction over queries and execution

## Using queries:

### Fixed Query
```php
$query = new FixedQuery("SELECT * FROM users WHERE is_active = 1");
$result = $query->execute($queryExecutor);
$result->all(); //all active users
```

### Prepared Query
```php
$query = new PreparedQuery("SELECT * FROM users WHERE id = :id", ['id']);
$result = $query->execute($queryExecutor, ['id' => 5]);
$result->first(); //user with id 5 (or null if it does not exist)
```

### Placeholder Query
```php
$query = new Placeholder("SELECT * FROM users WHERE name LIKE **__name__**", ['name']);
$result = $query->execute($queryExecutor, null, ['name' => '%john%']);
$result->all(); //all user with name including "john"
```

## Using result bags:

### List Result Bag
```php
$bag = new ListResultBag([
    1 => ['id' => 1, 'name' => 'Name 1'],
    2 => ['id' => 2, 'name' => 'Name 2'],
    3 => ['id' => 3, 'name' => 'Name 3'],
]);
$bag->all(); //3 items
$bag->withKey(1); //['id' => 1, 'name' => 'Name 1']
$bag->withKey(5); //null
$bag->collect('name'); //['Name 1', 'Name 2', 'Name 3']
```

### Tree Data Result Bag
```php
$bag = new TreeDataResultBag([
    1 => [
        ['id' => 1, 'name' => 'Name 1'],
        ['id' => 2, 'name' => 'Name 2']
    ],
    3 => [
        ['id' => 3, 'name' => 'Name 3']
    ]
]);
$bag->all(); //array(2 items, 1 item)
$bag->withKey(1); //array(2 items)
$bag->withKey(5); //array(0 items)
$bag->collect('name'); //['Name 1', 'Name 2', 'Name 3']
```