<?php

namespace App\Http\Livewire\Frontend\Cart;

use App\Models\Cart;
use Livewire\Component;

class CartShow extends Component
{
    public $cart, $totalPrice = 0;

    public function decrementQuantity(int $cartId)
    {
        $cartData = Cart::where('id', $cartId)->where('user_id', auth()->user()->id)->first();
        if ($cartData) {
            if ($cartData->quantity > 1) {
                $cartData->decrement('quantity');
                session()->flash('message', 'Quantity Updated!');
            } else {
                session()->flash('message', 'Only ' . $cartData->product->quantity . ' Quantity Available');
            }
        } else {
            session()->flash('message', 'Something went Wrong!');
        }
    }

    public function incrementQuantity(int $cartId)
    {
        $cartData = Cart::where('id', $cartId)->where('user_id', auth()->user()->id)->first();
        if ($cartData) {
            if ($cartData->product->quantity > $cartData->quantity) {
                $cartData->increment('quantity');
                session()->flash('message', 'Quantity Updated!');
            } else {
                session()->flash('message', 'Only ' . $cartData->product->quantity . ' Quantity Available');
            }
        } else {
            session()->flash('message', 'Something went Wrong!');
        }
    }

    public function remoteCartItem(int $cartId)
    {
        $cartRemoveData = Cart::where('user_id', auth()->user()->id)->where('id', $cartId)->first();
        if ($cartRemoveData) {
            $cartRemoveData->delete();
            $this->emit('CartAddedUpdated');
            session()->flash('message', 'Product added to cart');
        } else {
            session()->flash('message', 'Something went Wrong');
        }
    }

    public function render()
    {
        $this->cart = Cart::where('user_id', auth()->user()->id)->get();
        return view('livewire.frontend.cart.cart-show', [
            'cart' => $this->cart
        ]);
    }
}