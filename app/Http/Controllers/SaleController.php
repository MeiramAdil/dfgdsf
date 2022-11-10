<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\SaleDetails;
use Carbon\Carbon;

class SaleController extends Controller
{
    public function show()
    {
        return Sale::With('saleDetails')->get();
    }

    public function create(Request $request)
    {
        $sale = Sale::create(
            [
                'sum' => 0,
                'name' => $request->name,
                'sale_date' => date('d-m-y H:i:s')
            ]
        );
        $sum = 0;
        foreach ($request->details as $detail) {
            $saleDetails = SaleDetails::create([
                'sale_id' => $sale->id,
                'product_id' => $detail['product_id'],
                'price' => $detail['price']
            ]);
            $sum += ($detail['price']);
        }
        $sale->update([
            'sum' => $sum
        ]);
        return $sale;
    }

    public function delete($id)
    {
        try {
            $sale = Sale::findOrFail($id);
        } catch (\Exception $e) {
            throw new NotFoundException;
        }
        $sale = $sale->delete();
        $sale_details = SaleDetails::where('sale_id', '=', $id)->delete();
    }


    public function updateSaleDetails($id, Request $request)
    {
        try {
            $saleDetails = SaleDetails::findOrFail($id);
            $sale = Sale::findOrFail($saleDetails->sale_id);
        } catch (\Exception $e) {
            throw new NotFoundException;
        }
        $sum = ($sale->sum - $saleDetails->price)+$request->price;
        $sale->update([
            'sum' => $sum
        ]);
        $saleDetails->update(
            [
                'product_id' => $request->product_id,
                'price' => $request->price
            ]
        );
        $saleDetails->save();
    }
}
