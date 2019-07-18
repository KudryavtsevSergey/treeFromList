# treeFromList
PHP tree from list

```php
$array = [
    [
        'id' => 1,
        'parent' => null,
    ],
    [
        'id' => 2,
        'parent' => null,
    ],
    [
        'id' => 3,
        'parent' => 1,
    ],
    [
        'id' => 4,
        'parent' => 1,
    ],
    [
        'id' => 5,
        'parent' => 3,
    ],
    [
        'id' => 6,
        'parent' => null,
    ],
];

$array = treeFromList($array, function ($item, $parentId) {
    return $item['parent'] == $parentId;
});

echo "<pre>" . print_r($array, 1) . "</pre>";
```
