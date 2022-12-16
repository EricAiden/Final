<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Cart;
use App\Models\Wishlist;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class View extends Component
{

    public $category, $product, $productColorSelectedQuantity, $quantityCount = 1, $productColorId;

    public function colorSelected($productColorId)
    {
        $this->productColorId = $productColorId;
        $productColor = $this->product->productColors()->where('id', $productColorId)->first();
        $this->productColorSelectedQuantity = $productColor->quantity;

        if ($this->productColorSelectedQuantity == 0) {
            $this->productColorSelectedQuantity = 'outOfStock';
        }
    }

    public function decreasementQuantity()
    {
        $this->quantityCount = $this->quantityCount - 1;

        if ($this->quantityCount == 0) {
            $this->quantityCount = 1;
        }
    }

    public function increasementQuantity()
    {
        $this->quantityCount = $this->quantityCount + 1;

        if ($this->quantityCount == 0) {
            $this->quantityCount = 1;
        }
    }

    public function addToCart(int $productId)
    {
        if (Auth::check()) {
            if ($this->product->where('id', $productId)->where('status', '0')->exists()) {
                if ($this->product->productColors()->count() >= 1) {
                    if ($this->productColorSelectedQuantity != null) {
                        if (Cart::where('user_id', auth()->user()->id)
                            ->where('product_id', $productId)
                            ->where('product_color_id', $this->productColorId)
                            ->exists()
                        ) {
                            session()->flash('message', 'Product already added');
                            $this->dispatchBrowserEvent('message', [
                                'text' => 'Product already added',
                                'type' => 'warning',
                                'status' => 200,
                            ]);
                        } else {
                            $productColor = $this->product->productColors()->where('id', $this->productColorId)->first();
                            if ($productColor->quantity > 0) {
                                if ($this->product->quantity >= $this->quantityCount) {
                                    // insert product to cart with color selected
                                    Cart::create([
                                        'user_id' => auth()->user()->id,
                                        'product_id' => $productId,
                                        'product_color_id' => $this->productColorId,
                                        'quantity' => $this->quantityCount,
                                    ]);
                                    $this->emit('CartAddedUpdated');
                                    session()->flash('message', 'Product added to cart');
                                    $this->dispatchBrowserEvent('message', [
                                        'text' => 'Product added to cart',
                                        'type' => 'warning',
                                        'status' => 200,
                                    ]);
                                } else {
                                    session()->flash('message', 'Available ' . $this->product->quantity . ' left');
                                    $this->dispatchBrowserEvent('message', [
                                        'text' => 'Available ' . $this->product->quantity . ' left',
                                        'type' => 'warning',
                                        'status' => 404,
                                    ]);
                                }
                            } else {
                                session()->flash('message', 'Out of stock');
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Out of stock',
                                    'type' => 'warning',
                                    'status' => 404,
                                ]);
                            }
                        }
                    } else {
                        session()->flash('message', 'Select product color');
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Select product color',
                            'type' => 'info',
                            'status' => 404,
                        ]);
                    }
                } else {
                    if (Cart::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists()) {
                        session()->flash('message', 'Product already added');
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Product already added',
                            'type' => 'warning',
                            'status' => 200,
                        ]);
                    } else {

                        if ($this->product->quantity > 0) {
                            if ($this->product->quantity >= $this->quantityCount) {
                                // insert product to cart
                                Cart::create([
                                    'user_id' => auth()->user()->id,
                                    'product_id' => $productId,
                                    'quantity' => $this->quantityCount,
                                ]);
                                $this->emit('CartAddedUpdated');
                                session()->flash('message', 'Product added to cart');
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Product added to cart',
                                    'type' => 'warning',
                                    'status' => 200,
                                ]);
                            } else {
                                session()->flash('message', 'Available ' . $this->product->quantity . ' left');
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Available ' . $this->product->quantity . ' left',
                                    'type' => 'warning',
                                    'status' => 404,
                                ]);
                            }
                        } else {
                            session()->flash('message', 'Out of stock');
                            $this->dispatchBrowserEvent('message', [
                                'text' => 'Out of stock',
                                'type' => 'warning',
                                'status' => 404,
                            ]);
                        }
                    }
                }
            } else {
                session()->flash('message', 'Product does not exists');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Product does not exists',
                    'type' => 'warning',
                    'status' => 404,
                ]);
            }
        } else {
            session()->flash('message', 'Please login to add to cart');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Please login to add to cart',
                'type' => 'info',
                'status' => 401,
            ]);
        }
    }

    public function addToWishList($productId)
    {
        if (Auth::check()) {
            if (Wishlist::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists()) {
                session()->flash('message', 'Already added to wishlist');
                return false;
            } else {
                $this->emit('wishlistAddedUpdated');
                Wishlist::create(
                    [
                        'user_id' => auth()->user()->id,
                        'product_id' => $productId,
                    ]
                );
                session()->flash('message', 'Wishlist added successfully');
            }
        } else {
            session()->flash('message', 'Please Login to continue');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Please login to add to wishlist',
                'type' => 'info',
                'status' => 401,
            ]);
            return false;
        }
    }


    public function mount($category, $product)
    {
        $this->category = $category;
        $this->product = $product;
    }

    public function render()
    {
        return view('livewire.frontend.product.view', [
            'category' => $this->category,
            'product' => $this->product,
        ]);
    }
}
