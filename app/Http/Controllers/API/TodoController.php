<?php

namespace App\Http\Controllers\API;

use App\Models\Todo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Database\Query\Builder;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Todo::query()
            ->when(request('with'), function (Builder $query, $with) {
                $query->with(explode(',', $with));
            })
            ->when(request('search'), function (Builder $query, $search) {
                return $query->where('id', 'like', '%' . $search);
            });

        return $query->simplePaginate();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|unique:categories|max:255',
            'todo' => 'required|max:255',
            'user_id' => 'required|exists:users',
        ]);

        return Todo::create($validated);
    }

    /**
     * Display the specified resource.
     */
    public function show(Todo $todo)
    {
        $todo->loadMissing(explode(',', request('with', '')));

        return $todo;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Todo $todo)
    {
        $validated = $request->validate([
            'id' => 'nullable|unique:categories|max:255',
            'todo' => 'nullable|max:255',
            'user_id' => 'nullable|exists:categories,id',
        ]);

        $todo->update($validated);

        return $todo;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();

        return $todo;
    }
}
