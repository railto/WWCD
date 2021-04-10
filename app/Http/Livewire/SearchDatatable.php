<?php

namespace App\Http\Livewire;

use App\Models\Search;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class SearchDatatable extends LivewireDatatable
{
    public $model = Search::class;

    public function columns(): array
    {
        return [
            Column::name('location')->label('Location')->linkTo(Search::class, 3)->callback(['location', 'id'], function ($location, $id) {
                return view('datatables::link', [
                    'href' => route('searches.show', $id),
                    'slot' => $location
                ]);
            }),
            DateColumn::name('start')->format('d/m/Y H:i')->label('Start')->defaultSort('desc'),
            DateColumn::name('end')->format('d/m/Y H:i')->label('End'),
        ];
    }
}
