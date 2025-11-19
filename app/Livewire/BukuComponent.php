<?php

namespace App\Livewire;

use App\Models\Buku;
use App\Models\Kategori;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class BukuComponent extends Component
{
    use WithPagination, WithoutUrlPagination;
    protected $paginationTheme = 'bootstrap';
    public $kategori, $judul, $penulis, $penerbit, $isbn, $tahun, $jumlah, $cari, $id;
    public function render()
    {
        if ($this->cari != ""){
            $data['buku'] = Buku::where('judul', 'like', '%'.$this->cari.'%')
              ->orWhere('penulis', 'like', '%'.$this->cari.'%')
              ->orWhere('penerbit', 'like', '%'.$this->cari.'%')
              ->paginate(10);
        } else {
            $data['buku'] = Buku::paginate(10);
        }
        $data['category'] = Kategori::all();
        $layout['title'] = "Kelola Buku";
        return view('livewire.buku-component', $data)->layoutData($layout);
    }
    public function store(){
        $this->validate([
            'judul'=>'required',
            'kategori'=>'required',
            'penulis'=>'required',
            'penerbit'=>'required',
            'tahun'=>'required|numeric',
            'isbn'=>'required',
            'jumlah'=>'required|numeric',
        ],[
            'judul.required'=>'Judul buku wajib diisi!',
            'kategori.required'=>'Kategori wajib diisi!',
            'penulis.required'=>'Penulis wajib diisi!',
            'penerbit.required'=>'Penerbit wajib diisi!',
            'tahun.required'=>'Tahun terbit wajib diisi!',
            'tahun.numeric'=>'Tahun terbit harus berupa angka!',
            'isbn.required'=>'ISBN wajib diisi!',
            'jumlah.required'=>'Jumlah buku wajib diisi!',
            'jumlah.numeric'=>'Jumlah buku harus berupa angka!',
        ]);
        Buku::create([
            'judul'=>$this->judul,
            'kategori_id'=>$this->kategori,
            'penulis'=>$this->penulis,
            'penerbit'=>$this->penerbit,
            'tahun'=>$this->tahun,
            'isbn'=>$this->isbn,
            'jumlah'=>$this->jumlah
        ]);
        session()->flash('success','Buku berhasil ditambahkan!');
        return redirect()->route('buku');
        $this->reset();
        
    }public function edit($id){
        $buku=Buku::find($id);
        $this->id=$buku->id;
        $this->judul=$buku->judul;
        $this->kategori=$buku->kategori_id;
        $this->penulis=$buku->penulis;
        $this->penerbit=$buku->penerbit;
        $this->tahun=$buku->tahun;
        $this->isbn=$buku->isbn;
        $this->jumlah=$buku->jumlah;
    }
    public function update(){
        $buku=Buku::find($this->id);
        $buku->update([
            'judul'=>$this->judul,
            'kategori_id'=>$this->kategori,
            'penulis'=>$this->penulis,
            'penerbit'=>$this->penerbit,
            'tahun'=>$this->tahun,
            'isbn'=>$this->isbn,
            'jumlah'=>$this->jumlah
        ]);
        session()->flash('success','Buku berhasil diupdate!');
        return redirect()->route('buku');
        $this->reset();
    }
    public function confirm($id){
        $this->id=$id;
    }
    public function destroy(){
        $buku=Buku::find($this->id);
        $buku->delete();
        session()->flash('success','Buku berhasil dihapus!');
        return redirect()->route('buku');
        $this->reset();
    }
}