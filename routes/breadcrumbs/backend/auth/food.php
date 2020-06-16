<?php

Breadcrumbs::for('admin.auth.food.index', function ($trail) {
    $trail->push('Food', route('admin.auth.food.index'));
});

Breadcrumbs::for('admin.auth.food.edit', function ($trail, $id) {
    $trail->parent('admin.auth.food.index');
    $trail->push('Edit', route('admin.auth.food.edit', $id));
});

Breadcrumbs::for('admin.auth.food.view', function ($trail, $id) {
    $trail->parent('admin.auth.food.index');
    $trail->push('View', route('admin.auth.food.view', $id));
});

Breadcrumbs::for('admin.auth.food.add', function ($trail) {
    $trail->parent('admin.auth.food.index');
    $trail->push('View', route('admin.auth.food.add'));
});
