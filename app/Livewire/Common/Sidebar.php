<?php

namespace App\Livewire\Common;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Sidebar extends Component
{
    public function render()
    {
        return view('livewire.common.sidebar');
    }

    public function logout()
    {
        Auth::logout();

        // Optionally invalidate session and regenerate token
        session()->invalidate();
        session()->regenerateToken();

        return redirect('/'); // or route('login')
    }
}
