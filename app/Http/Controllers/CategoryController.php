<?php

namespace App\Http\Controllers;


use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('kategory.index', compact('categories'));
    }

    public function create()
    {
        return view('kategory.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required|min:3',
        ]);

        Category::create([
            'name' => $request->name,
        ]);

        return redirect()->route('categories.index')->with('success', 'Category berhasil ditambahkan');
    }

    public function show(string $id)
    {
        $category = Category::findOrFail($id);
        return view('kategory.show', compact('category'));
    }

    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view('kategory.edit', compact('category'));
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required|min:3',
        ]);

        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request->name,
        ]);

        return redirect()->route('kategory.index')->with('success', 'Category berhasil diperbarui');
    }

    public function destroy(string $id): RedirectResponse
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category berhasil dihapus');
    }
}
