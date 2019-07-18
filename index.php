<?php

/**
 * @param array $items
 * @param callable $callback
 * @param string $parentFieldName
 * @param string $childrenFieldName
 * @param null $parentId
 * @return array
 */
function treeFromList(array $items, callable $callback, string $parentFieldName = 'id', string $childrenFieldName = 'children', $parentId = null)
{
    $currentLevelItems = array_filter($items, function ($item) use ($parentId, $callback) {
        return $callback($item, $parentId);
    });

    array_walk($currentLevelItems, function (&$currentLevelItem) use ($items, $currentLevelItems, $callback, $parentFieldName, $childrenFieldName) {
        $children = treeFromList(array_diff_key($items, $currentLevelItems), $callback, $parentFieldName, $childrenFieldName, $currentLevelItem[$parentFieldName]);
        if (!empty($children)) {
            $currentLevelItem[$childrenFieldName] = $children;
        }
    });

    return $currentLevelItems;
}