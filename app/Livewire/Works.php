<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Project;
use Livewire\Component;

class Works extends Component
{
    public $categories;
    public int $filter = 0;
    public $projects;

    public function mount()
    {
        $this->categories = Category::all();
        $this->projects = Project::all();
    }

    public function updatedFilter($value)
    {
        $this->filter = $value;

        if ($value == 0) {
            $this->projects = Project::all();
        } else {
            $this->projects = Project::where('category_id', $value)->get();
        }
    }

    public function render()
    {
        return view('livewire.works');
    }
}
