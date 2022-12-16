<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Wishlist;
use Livewire\Component;

class WishlistShow extends Component
{
    public function removeWishlistItem(int $wishlistId)
    {
        $wishlist = Wishlist::where('user_id', auth()->user()->id)->where('id', $wishlistId)->delete();
        session()->flash('message', 'Wishlist item removed successfully');
        $this->emit('wishlistAddedUpdated');
        $this->dispatchBrowserEvent('message', [
            'text' => 'Wishlist item removed successfully',
            'type' => 'success',
            'status' => 200,
        ]);
    }

    public function render()
    {
        $wishlist = Wishlist::where('user_id', auth()->user()->id)->get();
        return view('livewire.frontend.wishlist-show', [
            'wishlist' => $wishlist,
        ]);
    }
}
