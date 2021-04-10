<?php

namespace App\Http\Controllers\Search;

use App\Http\Controllers\Controller;
use App\Models\Search;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\View;

class SearchController extends Controller
{
    /**
     * @return View
     * @throws AuthorizationException
     */
    public function list(): View
    {
        $this->authorize('viewAny', Search::class);

        $searches = Search::all();

        return view('search.list', ['searches' => $searches]);
    }

    /**
     * @param Search $search
     * @return View
     */
    public function show(Search $search): View
    {
        return view('search.show', ['search' => $search]);
    }
}
