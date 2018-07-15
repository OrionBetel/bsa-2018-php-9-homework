<?php

namespace App\Http\Controllers;

use App\Currency;
use App\Http\Requests\CurrencyRequest;
use Gate;

class CurrenciesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function showAll()
    {
        $currencies = Currency::all();
        
        return view('currencies', ['currencies' => $currencies]);
    }

    public function showParticular($id)
    {
        $currency = Currency::find($id);
        
        return view('currency', ['currencies' => [$currency]]);
    }

    public function showAddForm()
    {
        if (Gate::denies('create', Currency::class)) {
            return redirect('/');
        }
        
        return view('addCurrency');
    }

    public function add(CurrencyRequest $request)
    {
        if (Gate::denies('create', Currency::class)) {
            return redirect('/');
        }
        
        $validData = $request->validated();
        
        $currency = new Currency;

        $currency->title      = $validData['title'];
        $currency->short_name = $validData['short_name'];
        $currency->logo_url   = $validData['logo_url'];
        $currency->price      = $validData['price'];

        $currency->save();

        return redirect()->route('currencies');
    }
    
    public function showEditForm($id)
    {   
        $currency = Currency::find($id);

        if (Gate::denies('update', $currency)) {
            return redirect('/');
        }
        
        return view('editCurrency', ['currency' => $currency]);
    }
    
    public function edit(CurrencyRequest $request, $id)
    {
        $currency = Currency::find($id);
        
        if (Gate::denies('update', $currency)) {
            return redirect('/');
        }
        
        $newData = $request->validated();

        foreach ($newData as $key => $value) {
            $currency->{$key} = $value;
        }

        $currency->save();

        return redirect()->route('particular-currency', ['id' => $id]); 
    }

    public function delete($id)
    {
        $currency = Currency::find($id);

        if (Gate::denies('delete', $currency)) {
            return redirect('/');
        }
        
        $currency->delete();

        return redirect()->route('currencies');
    }
}
