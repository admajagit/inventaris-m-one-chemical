<?php
namespace App\Http\Controllers;

use App\Http\CategoryController;
use App\Models\Item;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return view('items.index', compact('items'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('items.create', compact('categories'));
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'image'           => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'name'            => 'required|min:5',
            'description'     => 'required',
            'quantity'        => 'required|numeric',
            'price'           => 'required|numeric',
            'category_name'   => 'required',
        ]);

        // Simpan gambar di direktori storage/app/public/item
        $image = $request->file('image');
        $imagePath = $image->store('public/item');

        // Buat entri di database
        Item::create([
            'image_url'       => basename($imagePath),
            'name'            => $request->name,
            'description'     => $request->description,
            'quantity'        => $request->quantity,
            'price'           => $request->price,
            'category_name'   => $request->category_name
        ]);

        return redirect()->route('items.index')->with('success', 'Item berhasil ditambahkan');
    }

    public function show(string $id)
    {
        $item = Item::findOrFail($id);
        return view('items.show', compact('item'));
    }

    public function edit(string $id)
    {
        $item = Item::findOrFail($id);
        $categories = Category::all();
        return view('items.edit', compact('item', 'categories'));
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        // Validasi input
        $this->validate($request, [
            'image'            => 'image|mimes:jpeg,png,jpg|max:2048',
            'name'             => 'required|min:5',
            'description'      => 'required',
            'quantity'         => 'required|numeric',
            'price'            => 'required|numeric',
            'category_name'    => 'required',
        ]);

        // Temukan item yang sesuai dengan ID yang diberikan
        $item = Item::findOrFail($id);

        // Jika ada file gambar yang diunggah, simpan gambar baru dan hapus gambar lama (jika ada)
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->hashName();

            // Simpan gambar baru ke penyimpanan yang ditentukan
            $image->storeAs('public/item', $imageName);

            // Hapus gambar lama jika ada
            if ($item->image_url) {
                Storage::delete('public/item/' . $item->image_url);
            }
        } else {
            // Jika tidak ada gambar yang diunggah, gunakan gambar yang sudah ada
            $imageName = $item->image_url;
        }

        // Update informasi item
        $item->update([
            'image_url'       => $imageName,
            'name'            => $request->name,
            'description'     => $request->description,
            'quantity'        => $request->quantity,
            'price'           => $request->price,
            'category_name'   => $request->category_name,
        ]);

        return redirect()->route('items.index')->with('success', 'Item berhasil diperbarui');
    }

    public function destroy(string $id): RedirectResponse
    {
        $item = Item::findOrFail($id);

        if (Storage::exists('public/item/' . $item->image_url)) {
            Storage::delete('public/item/' . $item->image_url);
        }

        $item->delete();
        return redirect()->route('items.index')->with('success', 'Item berhasil dihapus');
    }
}
