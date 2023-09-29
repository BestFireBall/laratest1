<?php

namespace App\Http\Controllers;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Mail\OrderNew;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($filter = '')
    {
        if ($filter == 'active') $orders = Order::where('status', 'Active')->get();
        elseif ($filter == 'resolved') $orders = Order::where('status', 'Resolved')->get();
        elseif ($filter == 'choose_date') $orders = Order::whereBetween('created_at', [$_GET['choose_date'].' 00:00:00', $_GET['choose_date'].' 23:59:59'])->get();
        else $orders = Order::all();
        return view('orders.list')->with('orders', $orders);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $order = new Order();
        $order->user_id = auth()->user()->id;
        $order->name = $request->name;
        $order->email = $request->email;
        $order->message = $request->message;
        $order->save();        
        return redirect()->route('dashboard')->with('success','Order successfully stored');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $order = Order::where('id', $id)->first();
        return view('orders.edit')->with('order', $order);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    { var_dump(config('mail.from.address'), config('mail.from.name'));
        $order = Order::where('id', $request->id)->first();
        $order->comment = $request->comment;
        $order->status = $request->status;        
        $order->save();
        try {
            Mail::to($order->email)->send(new OrderNew($order));
        } catch (Exception $e) {
            echo 'Exception: ',  $e->getMessage(), "\n";
        }
        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {     
        Order::destroy($id);      
        return $this->index();
    }
}
