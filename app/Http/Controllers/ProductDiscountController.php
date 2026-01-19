<?php

namespace App\Http\Controllers;

use App\Models\currency;
use Illuminate\Http\Request;

class ProductDiscountController extends Controller
{
    public function index()
    {

    }

    public function create()
    {
        $currency=currency::all();
        $pid=$_GET['product_id'];
        return view('profile.admin.AddDiscount',compact('currency','pid'));
    }

    public function store(Request $request)
    {
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
