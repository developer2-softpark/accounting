<?php

namespace App\Http\Controllers\Backend\Payment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Backend\Payment\Account;
use App\Model\Backend\Payment\Bank;
use App\Model\Backend\Payment\PaymentMethod;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("backend.account.account.view", [
            "accounts" => Account::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.payment_modal.add_payment", [
            "paymentMethods" => PaymentMethod::all(),
            "banks" => Bank::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $account = new Account();
        $account->business_location_id = 1;
        $account->business_type_id = 1;
        $account->branch_id = 1;
        $account->payment_method_id = $request->payment_method_id;
        $account->bank_id = $request->bank_id;
        $account->account_name = $request->account_name;
        $account->account_no = $request->account_no;
        $account->opening_amount = $request->opening_amount;
        $account->contract_person = $request->contract_person;
        $account->contract_phone = $request->contract_phone;
        $account->address = $request->address;
        $account->card_no = $request->card_no;
        $account->card_holder = $request->card_holder_name;
        $account->card_type = $request->card_type;
        $account->card_expire_date = $request->expire_month . " " . $request->expire_year;
        $account->security_code = $request->card_security_code;
        if (!empty($request->cheque_no)) {
            $account->account_no = $request->cheque_no;
        }

        $account->transection_no = $request->transaction_no;

        if (!empty($request->card_transaction_no)) {
            $account->transection_no = $request->card_transaction_no;
        }
        $account->is_verified = 1;
        $account->is_active = 1;
        $account->status = 1;
        $account->created_by = auth()->user()->id;
        if ($account->save()) {
            $notification = array(
                'message' => 'Successfully Account added!',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Someting Went Wrong!',
                'alert-type' => 'error'
            );
        }
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Backend\Payment\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        $account->payment_method = $account->paymentMethod;
        $account->bank = $account->bank;
        return $account;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Backend\Payment\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        return view("backend.account.account.edit", [
            "paymentMethods" => PaymentMethod::all(),
            "banks" => Bank::all(),
            "account" => $account,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Backend\Payment\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Account $account)
    {
        $account->business_location_id = 1;
        $account->business_type_id = 1;
        $account->branch_id = 1;
        $account->payment_method_id = $request->payment_method_id;
        $account->bank_id = $request->bank_id;
        $account->account_name = $request->account_name;
        $account->account_no = $request->account_no;
        $account->opening_amount = $request->opening_amount;
        $account->contract_person = $request->contract_person;
        $account->contract_phone = $request->contract_phone;
        $account->address = $request->address;
        $account->card_no = $request->card_no;
        $account->card_holder = $request->card_holder_name;
        $account->card_type = $request->card_type;
        $account->card_expire_date = $request->expire_month . " " . $request->expire_year;
        $account->security_code = $request->card_security_code;
        if (!empty($request->cheque_no)) {
            $account->account_no = $request->cheque_no;
        }

        $account->transection_no = $request->transaction_no;

        if (!empty($request->card_transaction_no)) {
            $account->transection_no = $request->card_transaction_no;
        }
        $account->is_verified = 1;
        $account->is_active = 1;
        $account->status = 1;
        $account->created_by = auth()->user()->id;
        if ($account->save()) {
            $notification = array(
                'message' => 'Successfully Account updated!',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Someting Went Wrong!',
                'alert-type' => 'error'
            );
        }
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Backend\Payment\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        if ($account->delete()) {
            $notification = array(
                'message' => 'Successfully Account deleted!',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Someting Went Wrong!',
                'alert-type' => 'error'
            );
        }
        return redirect()->back()->with($notification);
    }
}
