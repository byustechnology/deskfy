<?php

// Dashboard
Breadcrumbs::for('deskfy', function ($t) {
    $t->push('Dashboard', url(config('deskfy.path')));
});

// Empresa
Breadcrumbs::for('deskfy-empresa', function ($t) {
    $t->parent('deskfy');
    $t->push('Minha empresa', url(config('deskfy.path') . '/empresa'));
});
Breadcrumbs::for('deskfy-empresa-create', function ($t) {
    $t->parent('deskfy-empresa');
    $t->push('Adicionar', url(config('deskfy.path') . '/empresa/create'));
});
Breadcrumbs::for('deskfy-empresa-show', function ($t, $empresa) {
    $t->parent('deskfy-empresa');
    $t->push($empresa->titulo, url($empresa->path()));
});
Breadcrumbs::for('deskfy-empresa-edit', function ($t, $empresa) {
    $t->parent('deskfy-empresa-show', $empresa);
    $t->push('Editar', url($empresa->path() . '/edit'));
});

// Entidade
Breadcrumbs::for('deskfy-entidade', function ($t) {
    $t->parent('deskfy');
    $t->push('Entidades', url(config('deskfy.path') . '/entidade'));
});
Breadcrumbs::for('deskfy-entidade-create', function ($t) {
    $t->parent('deskfy-entidade');
    $t->push('Adicionar', url(config('deskfy.path') . '/entidade/create'));
});
Breadcrumbs::for('deskfy-entidade-show', function ($t, $entidade) {
    $t->parent('deskfy-entidade');
    $t->push($entidade->titulo, url($entidade->path()));
});
Breadcrumbs::for('deskfy-entidade-edit', function ($t, $entidade) {
    $t->parent('deskfy-entidade-show', $entidade);
    $t->push('Editar', url($entidade->path() . '/edit'));
});

// Cobrança
Breadcrumbs::for('deskfy-cobranca', function ($t) {
    $t->parent('deskfy');
    $t->push('Cobranças', url(config('deskfy.path') . '/cobranca'));
});
Breadcrumbs::for('deskfy-cobranca-create', function ($t) {
    $t->parent('deskfy-cobranca');
    $t->push('Adicionar', url(config('deskfy.path') . '/cobranca/create'));
});
Breadcrumbs::for('deskfy-cobranca-show', function ($t, $cobranca) {
    $t->parent('deskfy-cobranca');
    $t->push($cobranca->titulo, url($cobranca->path()));
});
Breadcrumbs::for('deskfy-cobranca-edit', function ($t, $cobranca) {
    $t->parent('deskfy-cobranca-show', $cobranca);
    $t->push('Editar', url($cobranca->path() . '/edit'));
});

// Remessas
Breadcrumbs::for('deskfy-remessa', function ($t) {
    $t->parent('deskfy');
    $t->push('Remessas', url(config('deskfy.path') . '/remessa'));
});
Breadcrumbs::for('deskfy-remessa-create', function ($t) {
    $t->parent('deskfy-remessa');
    $t->push('Adicionar', url(config('deskfy.path') . '/remessa/create'));
});
Breadcrumbs::for('deskfy-remessa-show', function ($t, $remessa) {
    $t->parent('deskfy-remessa');
    $t->push($remessa->titulo, url($remessa->path()));
});
Breadcrumbs::for('deskfy-remessa-edit', function ($t, $remessa) {
    $t->parent('deskfy-remessa-show', $remessa);
    $t->push('Editar', url($remessa->path() . '/edit'));
});