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


// <?php

// namespace App\Http\Livewire;

// use Livewire\Component;
// use Livewire\Attributes\On;
// use App\Models\SignageTv;

// class TvFiles extends Component
// {
//     public $tv;
//     public $tvData;
//     public $files;

//     public function mount($tv)
//     {
//         $this->tv = $tv;
//         $this->tvData = SignageTv::where('tv', $tv)->firstOrFail();
//         $this->files = $this->tvData->signages ?? collect();
//     }

//     #[On('fileUploaded')]
//     public function refreshFiles()
//     {
//         $this->tvData = SignageTv::where('tv', $this->tv)->firstOrFail();
//         $this->files = $this->tvData->signages ?? collect();
//     }

//     public function render()
//     {
//         return view('livewire.tv-files');
//     }
// }
