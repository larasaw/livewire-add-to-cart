<?php

namespace App\Livewire;

use App\Models\User as ModelsUser;
use Livewire\Component;

class User extends Component
{
    public $name ;
    public $email;
    public $password;

    public function submitForm(){
        // dd($this->name, $this->email, $this->password);
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);
       ModelsUser::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password)
        ]);
        session()->flash('message', 'User Created Successfully.');
        $this->name = '';
        $this->email = '';
        $this->password = '';
    }

    public function deleteUser($id){
        $user = ModelsUser::find($id);
        $user->delete();
    }
    public function render()
    {
        $users=ModelsUser::all();

        return view('livewire.user', compact('users'));
    }
}
