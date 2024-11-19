<?php

namespace App\Http\Controllers;

use App\DataTables\CouponDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateCouponRequest;
use App\Http\Requests\UpdateCouponRequest;
use App\Models\Coupon;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CouponController extends AppBaseController
{
    /**
     * Display a listing of the Coupon.
     *
     * @param CouponDataTable $couponDataTable
     * @return Response
     */
    public function index(CouponDataTable $couponDataTable)
    {
        return $couponDataTable->render('coupons.index');
    }

    /**
     * Show the form for creating a new Coupon.
     *
     * @return Response
     */
    public function create()
    {
        return view('coupons.create');
    }

    /**
     * Store a newly created Coupon in storage.
     *
     * @param CreateCouponRequest $request
     *
     * @return Response
     */
    public function store(CreateCouponRequest $request)
    {
        $input = $request->all();

        /** @var Coupon $coupon */
        $coupon = Coupon::create($input);

        Flash::success('Coupon saved successfully.');

        return redirect(route('coupons.index'));
    }

    /**
     * Display the specified Coupon.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Coupon $coupon */
        $coupon = Coupon::find($id);

        if (empty($coupon)) {
            Flash::error('Coupon not found');

            return redirect(route('coupons.index'));
        }

        return view('coupons.show')->with('coupon', $coupon);
    }

    /**
     * Show the form for editing the specified Coupon.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Coupon $coupon */
        $coupon = Coupon::find($id);

        if (empty($coupon)) {
            Flash::error('Coupon not found');

            return redirect(route('coupons.index'));
        }

        return view('coupons.edit')->with('coupon', $coupon);
    }

    /**
     * Update the specified Coupon in storage.
     *
     * @param  int              $id
     * @param UpdateCouponRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCouponRequest $request)
    {
        /** @var Coupon $coupon */
        $coupon = Coupon::find($id);

        if (empty($coupon)) {
            Flash::error('Coupon not found');

            return redirect(route('coupons.index'));
        }

        $coupon->fill($request->all());
        $coupon->save();

        Flash::success('Coupon updated successfully.');

        return redirect(route('coupons.index'));
    }

    /**
     * Remove the specified Coupon from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Coupon $coupon */
        $coupon = Coupon::find($id);

        if (empty($coupon)) {
            Flash::error('Coupon not found');

            return redirect(route('coupons.index'));
        }

        $coupon->delete();

        Flash::success('Coupon deleted successfully.');

        return redirect(route('coupons.index'));
    }
    public function couponsCheck(Request $request){
        $data = $request->all();
        //dd($data);
        $coupon = Coupon::where('coupon_code', $data['coupons_id'])
            ->whereDate('expire_date', '>=', Carbon::today())
            ->first();
        if ($coupon instanceof Coupon) {
            return response()->json([
                'status' => true,
                'data' => $coupon,
            ]);    
        }else{
            return response()->json([
                'status' => false,
                'data' => null,
            ]);
        }
    }
}
