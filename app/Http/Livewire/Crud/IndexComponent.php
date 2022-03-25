<?php

namespace App\Http\Livewire\Crud;

use Livewire\Component;
use App\Models\Student;
use App\Http\Livewire\Crud\EditStudentComponent;

use Symfony\Contracts\Service\Attribute\Required;

class IndexComponent extends Component
{

    public $search, $delete, $image, $confirmdel;
    public $sure = null;

    protected $queryString = [
        'search' 
    ];



    //
    



    //
  




    protected $listeners = ['deleteconfirmed' => 'deleteaccount'];


    // function confirmDelete(id) {
    //     const result = confirm('Yakin mau hapus? ID:' + id)

        
    //     if (result) {
    //         Livewire.emit('deleteconfirmed', id)

    //         console.log(confirmDelete);
    //     }
    // }





    

    public function deleteaccount($id)
    {   
        
        $student = Student::where('id', $id)->first();
        $student->delete();
        session()->flash('message', 'Student has been deleted successfully');
        
    }





    public $studentconfirmed = null;

    public function confirm($studentconfrim)
    {
        $this->studentconfirmed = $studentconfrim;

        $this->dispatchBrowserEvent('showconfirm');
    }
  





    public function mount($id)
    {
        $this->id = $id;
    }
    

    public function render()
    {

       
        
                return view('livewire.crud.index-component', [ 
                    'students' => Student::when($this->search, function($query, $search) {
                        return $query->where('name', 'LIKE', "%$search%")
                                    ->orWhere('email', 'LIKE', "%$search%")
                                    ->orWhere('phone', 'LIKE', "%$search%")
                                    ;
                    })->get()

        ]);
    
        return view('livewire.crud.index-component');

    }




 
        

     

    public function editstudent(){

        dd('cek');
        return view('livewire.crud.index-component', [
            'editstudents'=> Student::find($this->id),
        ]);

        

    }

    //this down here was ori

    // return view('livewire.crud.index-component', [ 
    //     'students' => Student::all(),
    // ]);


    ///this is border for original


    // public function editstudent(){

    //     dd('cek');
    //     return view('livewire.crud.index-component', [
    //         'editstudents'=> Student::find($this->id),
    //     ]);

        

    // }

/// bentuk ori dari tag delete

    // <a href="javascript:void(0)" wire:click="delete({{ $student->id }})" class="btn btn-sm btn-danger"  style="padding: 1px 8px;">Delete</a>



    ///



}

