<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Timeline;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $account = Account::where('status', true)->get();
        return view('accounts.index', compact('account'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('accounts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'zipcode' => 'required',
            'city' => 'required',
            'region' => 'required',
        ]);

        $account = new Account;

        $input = $request->input();

        $account->fill($input)->save();

        $timeline = new Timeline;
        $timeline->account_id = $account->id;
        $timeline->action = 'CREATE';

        $timeline->save();

        return redirect('accounts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $account = Account::findOrFail($id);

        return view('accounts.edit', compact('account'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'zipcode' => 'required',
            'city' => 'required',
            'region' => 'required',
        ]);

        $account = Account::findOrFail($id);
        $input = $request->input();

        $account->fill($input)->save();

        $timeline = new Timeline;
        $timeline->account_id = $account->id;
        $timeline->action = 'UPDATE';

        $timeline->save();

        return redirect('accounts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateStatus($id)
    {
        $account = Account::findOrFail($id);
        $account->status = false;
        $account->save();

        $timeline = new Timeline;
        $timeline->account_id = $account->id;
        $timeline->action = 'DELETE';

        $timeline->save();

        return redirect('accounts');
    }
}
