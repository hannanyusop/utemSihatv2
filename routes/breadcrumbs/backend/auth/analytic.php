<?php

Breadcrumbs::for('admin.auth.analytic.index', function ($trail) {
    $trail->push('All', route('admin.auth.analytic.index'));
});
Breadcrumbs::for('admin.auth.analytic.states', function ($trail) {
    $trail->push('Statistics By State', route('admin.auth.analytic.states'));
});

