<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;


class UserComponent extends Component
{
    use WithPagination, WithoutUrlPagination;
    protected $paginationTheme = 'bootstrap';
    public $nama, $email, $password, $id;
    public function render()
    {
        $layout['title'] = "Kelola User";
        $data['user']=User::paginate(10);
        return view('livewire.user-component', $data)->layoutData($layout);
    }
    public function store(){
        $this->validate([
            'nama'=>'required',
            'email'=>'required|email|email',
            'password'=>'required',

        ],[
            'nama.required'=>'Nama wajib diisi!',
            'email.required'=>'Email wajib diisi!',
            'email.email'=>'Email tidak valid!',
            'password.required'=>'Password wajib diisi!',
        ]);
        User::create([
            'nama'=>$this->nama,
            'email'=>$this->email,
            'password'=>$this->password,
            'jenis'=>'admin'
        ]);
        session()->flash('success','User berhasil ditambahkan!');
        $this->reset();
    }
    public function edit($id){
        $user=User::find($id);
        $this->nama=$user->nama;
        $this->email=$user->email;
        $this->id=$user->id;
        // $this->password=$user->password
    }
    public function update(){
        $user=User::find($this->id);
        if($this->password == ""){
            $user->update([
                'nama'=>$this->nama,
                'email'=>$this->email,
            ]);
        } else {
            $user->update([
                'nama'=>$this->nama,
                'email'=>$this->email,
                'password'=>$this->password,
            ]);
        }
        session()->flash('success','User berhasil diubah!');
        $this->reset();
    }
}
