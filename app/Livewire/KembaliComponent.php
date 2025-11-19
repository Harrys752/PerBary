<?php

namespace App\Livewire;

use App\Models\Pinjam;
use DateTime;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

class KembaliComponent extends Component
{
    use WithPagination, WithoutUrlPagination;
    protected $paginationTheme = 'bootstrap';
    public $judul, $member, $tglkembali, $selisih, $status, $lama;
    public function render()
    {
        $layout['title'] = "Kelola Pengembalian Buku";
        $data['pinjam'] = Pinjam::where('status', 'pinjam')->paginate(10);
        return view('livewire.kembali-component', $data)->layoutData($layout);
    }
    public function pilih($id){
        $pinjam = Pinjam::find($id);
        $this->judul=$pinjam->buku->judul;
        $this->member=$pinjam->user->nama;
        $this->tglkembali=$pinjam->tgl_kembali;

        $kembali= new DateTime($this->tglkembali);
        $today= new DateTime();
        $selisih = $today->diff($kembali);
        // $this->status = $selisih->invert;
        if ($selisih->invert == 1){
            $this->status = true;
        } else {
            $this->status = false;
        }
        
    }
}
