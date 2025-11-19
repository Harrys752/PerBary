<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Buku;
use App\Models\Pinjam;
use App\Models\Pengembalian;
use Livewire\Component;

class HomeComponent extends Component
{
    public function render()
    {
        $x['title']="Home-Perbary";
        $data['member'] = User::where('jenis', 'member')->count();
        $data['buku'] = Buku::count();
        $data['pinjam'] = Pinjam::where('status', 'pinjam')->count();
        $data['kembali'] = Pengembalian::count();
        return view('livewire.home-component', $data)->layoutData($x);
    }
}
