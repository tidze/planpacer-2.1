<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class CategoryColor extends Component
{
    use WithPagination;

    public $user_id;

    public $editingCategoryId = null;
    public $categoryId = null;
    public $category = null;
    public $categoryColor = null; // #ffffff
    public $categoryDescription = null;

    protected $listeners = ['$refresh'];

    public function render()
    {
        $allCategories = DB::table('categories')
                    ->select('categories.*')
                    ->where('categories.user_id', Auth::user()->id)
                    ->orderBy('categories.category', 'asc')
                    ->get();

        $distinctCategories = DB::table('categories')
                    ->select('categories.category','categories.id')
                    ->where('categories.user_id', Auth::user()->id)
                    ->distinct()
                    ->orderBy('categories.category', 'asc')
                    ->get();
        // dd($distinctCategories,$allCategories);
        return view('livewire.category-color', [
            'allCategories' => $allCategories,
            'distinctCategories' => $distinctCategories,
        ]);
    }

    public function edit($id)
    {
        $categories = DB::table('categories')->where('user_id', Auth::user()->id)->where('id', $id)->get()->first();
        // dd($categories);
        // Assign the values from db into sync variables with livewire form
        $this->user_id = $categories->user_id;
        $this->editingCategoryId = $categories->id;
        $this->categoryId = $categories->id;
        $this->category = $categories->category;
        $this->categoryColor = $categories->color;
        $this->categoryDescription = $categories->description;
    }

    public function resetEditValues()
    {
        $this->reset(['editingCategoryId', 'categoryId', 'category', 'categoryColor', 'categoryDescription']);
    }

    public function storeOrUpdate()
    {
        // dd('storeOrUpdate');
        $update = DB::table('categories')
            ->where('user_id', Auth::user()->id)
            ->where('id', $this->categoryId)
            ->update([
                'category' => trim($this->category),
                'description' => trim($this->categoryDescription),
                'color' => $this->categoryColor,
            ]);

        // Refresh the `tasks-table.blade.php`

        if($update){
            session()->flash('successfull_message', 'Category Updated Successfully');
        }else{
            session()->flash('unsuccessfull_message', 'Update Was Unsuccessfull');
        }
        // Clear the livewire variables

        $this->resetEditValues();
        // Send a message that the record has been updated.
    }
}
