<?php

namespace App\Http\Livewire;

use App\Models\Competition;
use App\Models\CompetitionRecommendation as ModelsCompetitionRecommendation;
use Livewire\Component;
use Livewire\WithPagination;

class CompetitionRecommendation extends Component
{
    public $competitionRecommendation;

    use WithPagination;

    public function render()
    {

        return view(
            'livewire.competition-recommendation',
            [
                'competition_recommendations' => ModelsCompetitionRecommendation::paginate(16),
                'competitions' => Competition::paginate(16),
            ]
        );
    }



    public function mount()
    {
        //  $this->competitionRecommendation = ModelsCompetitionRecommendation::where('orphanage_id', auth()->user()->orphanage->id)->get();
    }

}
