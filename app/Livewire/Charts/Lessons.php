<?php

namespace App\Livewire\Charts;

use App\Models\Lesson;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Lessons extends Component
{
    public $labels = [];
    public $data = [];

    public function mount()
    {
        $lessons = Lesson::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(*) as total')
        )
            ->where('user_id', auth()->id())
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $this->labels = $lessons->pluck('month')->map(function ($month) {
            return \Carbon\Carbon::create()->month($month)->format('F');
        });

        $this->data = $lessons->pluck('total');
    }
    public function render()
    {
        return view('livewire.charts.lessons');
    }
}
