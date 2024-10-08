<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PATH_VIEW = 'Admins.customers.';
    public function index()
    {
        $customers = Customer::latest('id')->paginate(10);
        return view(self::PATH_VIEW . __FUNCTION__, compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(self::PATH_VIEW . __FUNCTION__);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        try {
            if($request->hasFile('avatar')){
                $request['avatar'] = Storage::put('customers',$request->file('avatar'));                
            }
            Customer::create($request->all());
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        return view(self::PATH_VIEW . __FUNCTION__, compact('customer'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return view(self::PATH_VIEW . __FUNCTION__, compact('customer'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
    public function forceDestroy(Customer $customer)
    {
        //
    }
}
