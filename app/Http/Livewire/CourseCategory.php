<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Skill;
use Livewire\Component;
use Livewire\WithPagination;

class CourseCategory extends Component
{
    use WithPagination;

    public $courseCategories;
    public $categorySearch;
    public $categoryDropdownSort;
    public $skills;

    public function render()
    {
        $this->courseCategories = [];
        $this->skills = [];

        if ($this->categorySearch != null) {
            if ($this->categoryDropdownSort == 'Abjad Kategori') {
                $this->courseCategories = Skill::where('name', 'like', '%'.$this->categorySearch.'%')
                        ->orderBy('name', 'ASC')
                        ->get();
            } else {
                $courseOrdered = Course::groupBy('skill_id')
                    ->selectRaw('count(*) as total, skill_id')
                    ->orderBy('total', 'DESC')
                    ->pluck('skill_id')->toArray();

                if (count($courseOrdered) > 0) {
                    $ids = $courseOrdered;
                    $ids_ordered = implode(',', $ids);
                    $this->courseCategories = Skill::whereIn('id', $courseOrdered)
                        ->where('name', 'like', '%'.$this->categorySearch.'%')
                                                ->orderByRaw("FIELD(id, $ids_ordered)")
                                                ->get();
                }
            }
        } else {
            if ($this->categoryDropdownSort == 'Abjad Kategori') {
                $this->courseCategories = Skill::orderBy('name', 'ASC')
                        ->get();
            } else {
                $courseOrdered = Course::groupBy('skill_id')
                        ->selectRaw('count(*) as total, skill_id')
                        ->orderBy('total', 'DESC')
                        ->pluck('skill_id')->toArray();

                if (count($courseOrdered) > 0) {
                    $ids = $courseOrdered;
                    $ids_ordered = implode(',', $ids);
                    $this->courseCategories = Skill::whereIn('id', $courseOrdered)
                                                    ->orderByRaw("FIELD(id, $ids_ordered)")
                                                    ->get();
                }
            }
        }

        $skills = $this->skills;
        $courseCategories = $this->courseCategories;

        return view('livewire.course-category', compact('skills', 'courseCategories'));
    }

    public function mount()
    {
        $this->setCategoryDropdownSort('Abjad Kategori');
    }

    public function setCategoryDropdownSort($categoryDropdownSortNew)
    {
        $this->categoryDropdownSort = $categoryDropdownSortNew;
    }
}
