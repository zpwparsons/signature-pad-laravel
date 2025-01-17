<?php

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithFileUploads;

class Form extends Component
{
    use WithFileUploads;

    #[Validate('string')]
    public string $first_name = '';

    #[Validate('string')]
    public string $last_name = '';

    #[Validate('image|max:1024')]
    public TemporaryUploadedFile|null $signature = null;

    public function save()
    {
        dd($this->first_name, $this->last_name, $this->signature);
    }

    public function render(): View
    {
        return view('livewire.form');
    }
}
