<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class CustomerController extends Controller
{
    public function index(): View
    {
        $customers = Customer::all();

        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return view('customers.create');
    }

    public function store(Request $request): \Illuminate\Contracts\Foundation\Application|\Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
    {
        $request->validate([
            'name'=>'required',
            'surname'=>'required',
        ]);
        $stock = new Customer([
            'name' => $request->get('name'),
            'surname' => $request->get('surname'),
            'phone' => $request->get('phone'),
        ]);
        $stock->save();
        return redirect('/customers')->with('success', 'Customer saved.');
    }

    public function show($id)
    {
        //
    }

    public function edit($id): View
    {
        $customer = Customer::find($id);
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, $id): \Illuminate\Contracts\Foundation\Application|\Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
    {
        $request->validate([
            'name'=>'required',
            'surname'=>'required',
        ]);
        $customer = Customer::find($id);
        $customer->name =  $request->get('name');
        $customer->surname = $request->get('surname');
        $customer->phone = $request->get('phone');
        $customer->save();

        return redirect('/customers')->with('success', 'Customer updated.');
    }

    public function destroy($id): \Illuminate\Contracts\Foundation\Application|\Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
    {
        $stock = Customer::find($id);
        $stock->delete();

        return redirect('/customers')->with('success', 'Customer removed.');
    }
}
