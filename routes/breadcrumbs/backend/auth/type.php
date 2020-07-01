<?php

Breadcrumbs::for('admin.auth.type.index', function ($trail) {
    $trail->push('Food Type', route('admin.auth.type.index'));
});

Breadcrumbs::for('admin.auth.type.edit', function ($trail, $id) {
    $trail->parent('admin.auth.type.index');
    $trail->push('Edit', route('admin.auth.type.edit', $id));
});


Breadcrumbs::for('admin.auth.type.add', function ($trail) {
    $trail->parent('admin.auth.type.index');
    $trail->push('View', route('admin.auth.type.add'));
});
