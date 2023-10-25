<?php

namespace App\Http\Controllers;


class DataTableController extends Controller
{
    public function index(): array
    {
        $types = auth()->user()->type()->get();
        $types->makeHidden(['created_at', 'updated_at']);
        $columns = ["id", "name"];
        return ['dataset' => $types, 'columns' => $columns];

    }

    public function fetchAfterDeletedType(): array
    {
        $types = auth()->user()->type()->get();
        $types->makeHidden(['created_at', 'updated_at']);
        return ['dataset' => $types];
    }
}
