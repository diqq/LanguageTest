<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function eptPayment()
    {
        $user = User::where('id', auth()->user()->id)->first();

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-SDflZoMjYH3x0jIsqvJQaw0A';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => 100000,
            ),
            'item_details' => array(
                [
                    "id" => "1",
                    "price" => 100000,
                    "quantity" => 1,
                    "name" => "EPT Examination",
                ],
            ),
            'customer_details' => array(
                'first_name' => $user->name,
                'email' => $user->email,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return view('user.payment.eptPayment', [
            'profile' => User::where('id', auth()->user()->id)->first(),
            'title' => 'Dashboard',
            'snap_token' => $snapToken,
        ]);
    }

    public function postEptPayment(Request $request)
    {
        $json = json_decode($request->get('json'));

        if($json->transaction_status == 'settlement'){
            $payment = new payment();
            $payment->user()->associate(auth()->user()->id);
            $payment->order_id = $json->order_id;
            $payment->for = 'ept';
            $payment->status_pay = $json->transaction_status;
            $payment->used = 'no';
            $payment->deleted = 'no';

            $payment->save();

            return redirect('/dashboard');
        }
        
        return redirect()->back();
    }

    public function toeicPayment()
    {
        $user = User::where('id', auth()->user()->id)->first();

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-SDflZoMjYH3x0jIsqvJQaw0A';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => 100000,
            ),
            'item_details' => array(
                [
                    "id" => "1",
                    "price" => 100000,
                    "quantity" => 1,
                    "name" => "TOEIC Examination",
                ],
            ),
            'customer_details' => array(
                'first_name' => $user->name,
                'email' => $user->email,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return view('user.payment.toeicPayment', [
            'profile' => User::where('id', auth()->user()->id)->first(),
            'title' => 'Dashboard',
            'snap_token' => $snapToken,
        ]);
    }

    public function postToeicPayment(Request $request)
    {
        $json = json_decode($request->get('json'));

        if($json->transaction_status == 'settlement'){
            $payment = new payment();
            $payment->user()->associate(auth()->user()->id);
            $payment->order_id = $json->order_id;
            $payment->for = 'toeic';
            $payment->status_pay = $json->transaction_status;
            $payment->used = 'no';
            $payment->deleted = 'no';

            $payment->save();

            return redirect('/dashboard');
        }
        
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(payment $payment)
    {
        //
    }
}
