<?php

namespace App\Livewire;

use Livewire\Component;
use DateTime;
use DateTimeZone;

class Entry extends Component
{
    // Unused variables
    // public string $done;
    // public string $user_id;
    // public string $categoryid;
    // public string $height;
    // public string $position;
    // public string $top;

    public int $e_starting_time;
    public int $e_ending_time;

    public string $id;
    public string $e_category;
    public string $e_description;
    public string $e_color;
    public string $e_duration;
    // Asia/Tehran ▼
    public string $e_timezone;
    // 00:00 ▼
    public string $e_startingHourpoint;
    public string $e_endingHourpoint;

    public function edit()
    {
        // Handle edit logic (open modal, emit event, etc.)
    }

    public function delete()
    {
        // Handle delete logic (confirmation, remove from DB, etc.)
    }

    public function mount($starting_time, $ending_time, $description, $category, $color, $_timezone)
    {
        $this->e_starting_time = $starting_time;
        $this->e_ending_time = $ending_time;
        $this->e_description = $description;
        $this->e_category = $category;
        $this->e_color = $color;
        $this->e_timezone = $_timezone;

        $e_startingdate = new DateTime();
        $e_startingdate->setTimezone(new DateTimeZone($this->e_timezone));
        // The variable starting_time, contains a Unix timestamp(e.g. 1783263000)
        $e_startingdate->setTimestamp($this->e_starting_time);
        $this->e_startingHourpoint = $e_startingdate->format('H:i');

        $e_endingdate = new DateTime();
        $e_endingdate->setTimezone(new DateTimeZone($this->e_timezone));
        // The variable ending_time, contains a Unix timestamp(e.g. 1783263000)
        $e_endingdate->setTimestamp($this->e_ending_time);
        $this->e_endingHourpoint = $e_endingdate->format('H:i');

        // Calculates the difference for "unix time points" (seconds) and gives the results in minutes
        // abs(1783263000 - 1783263600) => 600 | 600sec / 60sec => 10 min
        $this->e_duration = abs($ending_time - $starting_time) / 60;;
    }

    public function render()
    {
        return view('livewire.entry');
    }
}
