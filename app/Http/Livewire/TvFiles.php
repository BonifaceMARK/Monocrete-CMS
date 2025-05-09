<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\SignageTv;

class TvFiles extends Component
{
    public $tv;
    public $tvData;
    public $files;

    public function mount($tv)
    {
        $this->tv = $tv;
        $this->tvData = SignageTv::where('tv', $tv)->firstOrFail();
        $this->files = $this->tvData->signages ?? collect();
    }

    public function render()
    {
        return view('livewire.tv-files');
    }
}
