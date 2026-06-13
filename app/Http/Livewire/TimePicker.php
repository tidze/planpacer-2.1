<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TimePicker extends Component
{
    public $selectedHour = '09';
    public $selectedMinute = '00';
    public $selectedPeriod = 'AM';

    public function updatedSelectedHour()
    {
        $this->dispatch('time-updated', time: $this->getTime());
    }

    public function updatedSelectedMinute()
    {
        $this->dispatch('time-updated', time: $this->getTime());
    }

    public function updatedSelectedPeriod()
    {
        $this->dispatch('time-updated', time: $this->getTime());
    }

    public function getTime()
    {
        return sprintf('%02d:%02d %s',
            $this->selectedHour,
            $this->selectedMinute,
            $this->selectedPeriod
        );
    }

    public function render()
    {
        return view('livewire.time-picker', [
            'hours' => range(1, 12),
            'minutes' => ['00', '15', '30', '45'],
        ]);
    }
}
