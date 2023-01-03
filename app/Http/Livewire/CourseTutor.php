<?php

namespace App\Http\Livewire;

use App\Models\Skill;
use App\Models\Course;
use App\Models\User;
use App\Models\Tutor;
use Livewire\Component;

class CourseTutor extends Component
{
    public $courseTutors;
    public $courseCategory;
    public $tutorSearch;

    public $skill_id;
    public $tutorDropdownSort;

    public function render()
    {
        $this->courseTutors = [];
        if ($this->tutorSearch != null) {
            if ($this->tutorDropdownSort == 'Abjad Nama') {
                $array_userId = User::where('name', 'like', '%'.$this->tutorSearch.'%')
                                ->where('user_type', 'Tutor')
                                ->orderBy('name', 'ASC')
                                ->pluck('id')->toArray();

                if (count($array_userId) > 0) {
                    $ids = $array_userId;
                    $ids_ordered = implode(',', $ids);

                    $array_tutorId = Tutor::whereIn('user_id', $array_userId)
                                    ->orderByRaw("FIELD(user_id, $ids_ordered)")
                                    ->pluck('id')->toArray();

                    if (count($array_tutorId) > 0) {
                        $ids = $array_tutorId;
                        $ids_ordered = implode(',', $ids);
                        $this->courseTutors = Course::whereIn('tutor_id', $array_tutorId)
                                                ->where('skill_id', $this->skill_id)
                                                ->orderByRaw("FIELD(tutor_id, $ids_ordered)")
                                                ->get();
                    }
                }
            } else {
                $array_userId = User::where('name', 'like', '%'.$this->tutorSearch.'%')
                ->where('user_type', 'Tutor')
                ->orderBy('name', 'ASC')
                ->pluck('id')->toArray();

                if (count($array_userId) > 0) {
                    $ids = $array_userId;
                    $ids_ordered = implode(',', $ids);

                    $array_tutorId = Tutor::whereIn('user_id', $array_userId)
                    ->orderByRaw("FIELD(user_id, $ids_ordered)")
                    ->pluck('id')->toArray();

                    if (count($array_tutorId) > 0) {
                        $ids = $array_tutorId;
                        $ids_ordered = implode(',', $ids);
                        $this->courseTutors = Course::whereIn('tutor_id', $array_tutorId)
                                ->where('skill_id', $this->skill_id)
                                ->orderBy('hourly_price', 'ASC')
                                ->get();
                    }
                }
            }

            $this->courseCategory = Skill::find($this->skill_id);
        } else {
            if ($this->tutorDropdownSort == 'Abjad Nama') {
                $array_userId = User::where('user_type', 'Tutor')->orderBy('name', 'ASC')->pluck('id')->toArray();

                if (count($array_userId) > 0) {
                    $ids = $array_userId;
                    $ids_ordered = implode(',', $ids);

                    $array_tutorId = Tutor::whereIn('user_id', $array_userId)
                                    ->orderByRaw("FIELD(user_id, $ids_ordered)")
                                    ->pluck('id')->toArray();

                    if (count($array_tutorId) > 0) {
                        $ids = $array_tutorId;
                        $ids_ordered = implode(',', $ids);
                        $this->courseTutors = Course::whereIn('tutor_id', $array_tutorId)
                                                ->where('skill_id', $this->skill_id)
                                                ->orderByRaw("FIELD(tutor_id, $ids_ordered)")
                                                ->get();
                    }
                }
            } else {
                $this->courseTutors = Course::where('skill_id', $this->skill_id)
                        ->orderBy('hourly_price', 'ASC')
                        ->get();
            }
            
            $this->courseCategory = Skill::find($this->skill_id);
        }
        $courseTutors = $this->courseTutors;
        return view('livewire.course-tutor', compact('courseTutors'));
    }

    public function mount($skill_id)
    {

        if (auth()->user()->phone_number == null || auth()->user()->address == null) {
            return redirect()->route('user-approve');
        }

        if (auth()->user()->user_type == 'Pengurus Panti') {
            if (auth()->user()->orphanage->name == null || auth()->user()->orphanage->description == null) {
                return redirect()->route('user-approve');
            }
        } elseif (auth()->user()->user_type == 'Tutor') {
            if (auth()->user()->tutor->bank_account == null || auth()->user()->tutor->description == null || count(auth()->user()->tutor->tutorDayTimeRanges)==0) {
                return redirect()->route('user-approve');
            }
        }

        $this->skill_id = $skill_id;
        $this->setTutorDropwdownSort('Abjad Nama');
    }

    public function setTutorDropwdownSort($tutorDropdownSortNew)
    {
        $this->tutorDropdownSort = $tutorDropdownSortNew;
    }
}
