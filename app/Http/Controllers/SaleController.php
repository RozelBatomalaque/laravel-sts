<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\User;
use App\Models\Item;
use Illuminate\Support\Facades\Validator;

class SaleController extends Controller
{
    public function getSales()
    {
        $sales = Sale::with(['user', 'item'])->get();
        return response()->json(['sales' => $sales]);
    }

    public function addSale(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => ['required', 'exists:users,id'],
            'item_id' => ['required', 'exists:items,id'],
            'quantity_sold' => ['required', 'integer', 'min:1'],
            'total_price' => ['required', 'numeric', 'min:0'],
            'sale_date' => ['nullable', 'date'],
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $sale = Sale::create([
            'user_id' => $request->user_id,
            'item_id' => $request->item_id,
            'quantity_sold' => $request->quantity_sold,
            'total_price' => $request->total_price,
            'sale_date' => $request->sale_date ?? now(),
        ]);

        return response()->json([
            'message' => 'Sale successfully recorded!',
            'sale' => $sale->load(['user', 'item'])
        ], 201);
    }

    public function editSale(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => ['sometimes', 'exists:users,id'],
            'item_id' => ['sometimes', 'exists:items,id'],
            'quantity_sold' => ['sometimes', 'integer', 'min:1'],
            'total_price' => ['sometimes', 'numeric', 'min:0'],
            'sale_date' => ['nullable', 'date'],
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $sale = Sale::find($id);

        if (!$sale) {
            return response()->json(['message' => 'Sale not found!'], 404);
        }

        $sale->update($request->all());

        return response()->json([
            'message' => 'Sale successfully updated!',
            'sale' => $sale->fresh(['user', 'item'])
        ]);
    }

    public function deleteSale($id)
    {
        $sale = Sale::find($id);

        if (!$sale) {
            return response()->json(['message' => 'Sale not found!'], 404);
        }

        $sale->delete();

        return response()->json(['message' => 'Sale successfully deleted!']);
    }
}