<?php

namespace App\Http\Livewire;

use App\Models\CourseBooking as ModelsCourseBooking;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CourseBooking extends Component
{
    public $courseBooking;
    public $activeTab;

    public function render()
    {
        return view('livewire.course-booking')->with('courseBooking', $this->courseBooking);
    }

    public function mount()
    {
        $this->setTab('pending');
    }

    public function setTab($tab)
    {
        $a = '';
        $this->activeTab = $tab;
        if (Auth::user()->tutor) {
            if (Auth::user()->tutor->courses) {
                $a = ModelsCourseBooking::whereIn('course_id', Auth::user()->tutor->courses->pluck('id'))->get();
            }
        } else {
            $a = ModelsCourseBooking::whereIn('course_id', Auth::user()->orphanage->courseBookings->pluck('id'))->get();
        }
        if ($this->activeTab != 'canceled') {
            $this->courseBooking = $a->where('status', $this->activeTab);
        } else {
            $this->courseBooking = $a->where('status', 'canceled')->merge($a->where('status', 'complete'));
        }
    }

    public function accept($id)
    {
        $courseBooking = ModelsCourseBooking::find($id);
        $courseBooking->status = 'ongoing';
        $courseBooking->save();
        $this->setTab($this->activeTab);
    }

    public function decline($id)
    {
        $courseBooking = ModelsCourseBooking::find($id);
        $courseBooking->status = 'canceled';
        $courseBooking->save();
        $this->setTab($this->activeTab);
    }

    public function complete($id)
    {
        $courseBooking = ModelsCourseBooking::find($id);
        $courseBooking->status = 'complete';
        $courseBooking->save();
        $this->setTab($this->activeTab);
    }
}
