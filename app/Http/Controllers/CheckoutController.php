<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Services\CartService;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use App\Events\OrderCreated;

class CheckoutController extends Controller
{
    public function index(CartService $cart)
    {
        return view('checkout.index', [
            'cart' => $cart->getCart(),
        ]);
    }

    public function store(Request $request, CartService $cart): RedirectResponse
    {
        $validated = $request->validate([
            'full_name' => 'required|string',
            'phone_number' => 'required|string',
            'email' => 'required|email',
            'shipping_address' => 'required',
            'coupon_code' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        $order = $cart->getCart()->order()->save(
            Order::factory()->make($validated)
        );
        Log::info('Order created successfully', ['order_id' => $order->id]);

        // Bắn sự kiện OrderCreated
        event(new OrderCreated($order));

        return redirect(URL::signedRoute('orders.complete', [ 'order' => $order->id ]));
    }

    public function show(Request $request, Order $order)
    {
        if (! $request->hasValidSignature()) {
            abort(401);
        }

        return view('checkout.show', compact('order'));
    }
}



