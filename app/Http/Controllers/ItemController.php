<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ItemController extends Controller
{
    public function getItems()
    {
        $items = Item::with('category', 'itemStatus')->get();

        return response()->json(['items' => $items]);
    }

    public function addItem(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'quantity' => ['required', 'integer', 'min:0'],
            'category' => ['required', 'string'],
            'item_status' => ['required', 'string'],
        ]);

        $item = Item::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'category' => $request->category,
            'item_status' => $request->item_status,
        ]);

        return response()->json(['message' => 'Item successfully created!', 'item' => $item]);
    }

    public function editItem(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'quantity' => ['required', 'integer', 'min:0'],
            'category' => ['required', 'string'],
            'item_status' => ['required', 'string'],
        ]);

        $item = Item::find($id);

        if (!$item) {
            return response()->json(['message' => 'Item not found!'], 404);
        }

        $item->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'category' => $request->category_id,
            'item_status' => $request->item_status_id,
        ]);

        return response()->json(['message' => 'Item successfully updated!', 'item' => $item]);
    }

    public function deleteItem($id)
    {
        $item = Item::find($id);

        if (!$item) {
            return response()->json(['message' => 'Item not found!'], 404);
        }

        $item->delete();

        return response()->json(['message' => 'Item successfully deleted!']);
    }
}