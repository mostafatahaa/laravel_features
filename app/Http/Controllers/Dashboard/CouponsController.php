<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Coupons\CreateCouponRequest;
use App\Models\Coupons;
use Illuminate\Http\Request;

class CouponsController extends Controller
{
    public function index()
    {
        $coupons = Coupons::all();
        return view('dashboard.coupons.index'); // add ur coupons index view here
    }

    public function store(CreateCouponRequest $request)
    {
        $data = $request->validated();
        $coupon = Coupons::create($data);


        if (isset($data['users'])) {
            $coupon->users()->sync($data['users']);
        }

        if (isset($data['companies'])) {
            $coupon->companies()->sync($data['companies']);
        }

        return redirect()->route('dashboard.coupons.index');

    }

    public function create()
    {
        return view('dashboard.coupons.create');
    }

    public function update()
    {

    }
}
