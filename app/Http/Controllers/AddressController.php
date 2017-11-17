<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Regency;
use App\Address;

class AddressController extends Controller
{
    public function regencies(Request $request)
    {
        $this->validate($request, [
            'province_id' => 'required|exists:provinces,id'
        ]);

        return Regency::where('province_id', $request->get('province_id'))
            ->get();
    }

    public function index(Request $request){
        $addresses = auth()->user()->addresses()->with('regency','regency.province')->get();

        return view('addresses.index')->with(compact('addresses'));
    }

    public function create()
    {
        return view('addresses.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'detail' => 'required|string|max:255',
            'province_id' => 'required|integer',
            'regency_id' => 'required|integer',
            'phone' => 'required|string|max:12'
        ]);

        Address::create([
            'user_id' => auth()->user()->id,
            'name' => $request->name,
            'detail' => $request->detail,
            'regency_id' => $request->regency_id,
            'phone' => $request->phone
        ]);
        \Flash::success($request->get('name') . ' berhasil disimpan');
        return redirect()->route('address.index');
    }

    public function edit($id)
    {
        $address = Address::findOrFail($id);
        return view('addresses.edit')->with(compact('address'));
    }

    public function update(Request $request,$id)
    {
        $address = Address::findOrFail($id);
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'detail' => 'required|string|max:255',
            'province_id' => 'required|integer',
            'regency_id' => 'required|integer',
            'phone' => 'required|string|max:12'
        ]);

        $address->update([
            'user_id' => auth()->user()->id,
            'name' => $request->name,
            'detail' => $request->detail,
            'regency_id' => $request->regency_id,
            'phone' => $request->phone
        ]);
        \Flash::success($request->get('name') . ' berhasil dirubah');
        return redirect()->route('address.index');
    }

    public function destroy($id)
    {
        Address::find($id)->delete();
        \Flash::success('Alamat berhasil dihapus.');
        return redirect()->route('address.index');
    }
}
