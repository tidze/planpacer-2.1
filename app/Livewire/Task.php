<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\Task as TaskModel;
use App\Models\Category as CategoryModel;
use DateTimeZone;
use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\On;
use DateInterval;

class Task extends Component
{
    // I don't remember why I put this here
    protected $layout = null;

    /* Task Form */
    public $startingTimepoint_unix;
    public $endingTimepoint_unix;
    public $taskCategory;
    public $taskDescription;
    public $taskDone;

    /* Local */
    // 2023-04-19 ▼
    public $startingDatepoint;
    public $endingDatepoint;

    // 00:00 ▼
    public $startingTimepoint;
    public $endingTimepoint;

    // The id for the task, user about to edit
    public $targetTaskIdEdit;

    // since we're calling editTask from tasks-table component's controller we need to register our function controller
    protected $listeners = ['editTask'];

    // The timezone already being set after the livewire component has landed via $wire.set();
    public string $timezone = 'UTC';

    public DateTime $dateTime;

    public function mount()
    {
        // dd($this->timezone);
        $this->dateTime = new DateTime();
        $this->dateTime->setTimezone(new DateTimeZone($this->timezone));

        // I don't want seconds involved, so I pass the seconds = 0
        $this->dateTime->setTime($this->dateTime->format('H'), $this->dateTime->format('i'), 0);

        $this->startingTimepoint_unix = $this->dateTime->format('U');
        $this->startingTimepoint = $this->dateTime->format('H:i');;
        $this->startingDatepoint = $this->dateTime->format('Y-m-d');

        $this->endingTimepoint_unix = $this->dateTime->format('U');
        $this->endingTimepoint = $this->dateTime->format('H:i');;
        $this->endingDatepoint = $this->dateTime->format('Y-m-d');

        // $this->taskCategory = '';
        // $this->taskDescription = '';

        // I already put the database column "taskDone" default, to true. But I leave it just incase
        $this->taskDone = true;
    }

    public function render()
    {
        $result = $this->sortCategoriesByCategory();
        $sortedCategoriesByCategory = $result[0];
        $categories = $result[1];
        $sortedCategoriesByCategory_ENCODED = json_encode($sortedCategoriesByCategory);
        $sortedCategoriesByCategory_ArrayKeys = array_keys($sortedCategoriesByCategory);
        // dd('$sortedCategoriesByCategory_ENCODED',$sortedCategoriesByCategory_ENCODED,'$sortedCategoriesByCategory',$sortedCategoriesByCategory,'$sortedCategoriesByCategory_ArrayKeys',$sortedCategoriesByCategory_ArrayKeys,'$result',$result ,'$categories',$categories);
        return view('livewire.task-new-design', [
            'sortedCategoriesByCategory' => $sortedCategoriesByCategory,
            'sortedCategoriesByCategory_ENCODED' => $sortedCategoriesByCategory_ENCODED,
            'sortedCategoriesByCategory_ArrayKeys' => $sortedCategoriesByCategory_ArrayKeys,
            'categories' => $categories,
        ]);
    }

    // This function is for when, livewire components get updated
    public function updated($property, $value)
    {
        switch ($property) {
            case 'timezone':
                $this->dateTime->setTimezone(new DateTimeZone($this->timezone));
                // Format them again, after the new timezone got set
                $this->startingTimepoint = $this->dateTime->format('H:i');
                $this->startingDatepoint = $this->dateTime->format('Y-m-d');
                $this->endingTimepoint = $this->dateTime->format('H:i');;
                $this->endingDatepoint = $this->dateTime->format('Y-m-d');
                break;

            // Add more properties if you want :)
        }
    }

    // incoming request from tasks-table anchor tag
    public function editTask($id)
    {
        $this->targetTaskIdEdit = $id;

        $task = DB::table('tasks')->select('tasks.*', 'categories.category', 'categories.description', 'categories.color')
            ->join('categories', 'tasks.category_id', '=', 'categories.id')
            ->where('tasks.user_id', Auth::user()->id)
            ->where('tasks.id', $id)
            ->first();

        $this->taskCategory = $task->category;
        $this->taskDescription = $task->description;
        $this->taskDone = $task->done;

        $this->startingTimepoint_unix = $task->starting_time;
        $this->endingTimepoint_unix = $task->ending_time;

        $dateTime = new DateTime();
        $dateTime->setTimezone(new DateTimeZone($this->timezone));
        $dateTime->setTimestamp($task->starting_time);
        $this->startingDatepoint = $dateTime->format("Y-m-d");
        $this->startingTimepoint =  $dateTime->format("H:i");

        $dateTime->setTimestamp($task->ending_time);
        $this->endingDatepoint = $dateTime->format("Y-m-d");
        $this->endingTimepoint =  $dateTime->format("H:i");

        $this->dispatch('$refresh')->to('custom-chart');
    }

    public function update()
    {
        $validatedData = Validator::make(
            [
                'targetTaskIdEdit' => $this->targetTaskIdEdit,
                'startingTimepoint_unix' => $this->startingTimepoint_unix,
                'endingTimepoint_unix' => $this->endingTimepoint_unix,
                'taskCategory' => $this->taskCategory,
                'taskDescription' => $this->taskDescription,
            ],
            [
                'targetTaskIdEdit' => ['required'],
                'startingTimepoint_unix' => ['required'],
                'endingTimepoint_unix' => ['required'],
                'taskCategory' => ['required'],
                'taskDescription' => ['required'],
            ]
        );

        // dd($validatedData);
        if ($validatedData->fails()) {
            session()->flash('update_validator_fail', 'Please provide requested inputs for update');
        } else {
            // session()->flash('store_validator_success', 'store_validator_success');
        }
        $validatedData->validate();

        $category = $this->checkForExistingCategory(Auth::user()->id, trim($this->taskCategory), trim($this->taskDescription));
        if (is_null($category)) {
            // if the category not exists, add the category to the categories table and then update the task
            $this->insertIntoCategories(Auth::user()->id, trim($this->taskCategory), trim($this->taskDescription));
            $this->updateIntoTasks(trim($this->targetTaskIdEdit), trim($this->taskCategory), trim($this->taskDescription));
        } else {
            // if the category exists, just retrive the id from categories table and update it with category_id
            $this->updateIntoTasks(trim($this->targetTaskIdEdit), trim($this->taskCategory), trim($this->taskDescription));
        }
        $this->dispatch('getTask')->to('custom-chart');
        $this->resetErrorBag();
        $this->resetValidation();

        $this->taskCategory = '';
        $this->taskDescription = '';
        $this->startingTimepoint_unix = '';
        $this->endingTimepoint_unix = '';
        $this->startingTimepoint = '00:00';
        $this->endingTimepoint = '00:00';
        $this->targetTaskIdEdit = '';
    }

    public function deleteTask($id)
    {
        TaskModel::findOrFail($id)->delete();
    }

    public function store()
    {
        $validatedData  = Validator::make(
            [
                'startingTimepoint_unix' => $this->startingTimepoint_unix,
                'endingTimepoint_unix' => $this->endingTimepoint_unix,
                'taskCategory' => $this->taskCategory,
                'taskDescription' => $this->taskDescription,
            ],
            [
                'startingTimepoint_unix' => ['required'],
                'endingTimepoint_unix' => ['required'],
                'taskCategory' => ['required'],
                'taskDescription' => ['required'],
            ]
        );

        // dd($validatedData);
        if ($validatedData->fails()) {
            session()->flash('store_validator_fail', 'Please provide requested inputs for store');
        } else {
            // session()->flash('store_validator_success', 'store_validator_success');
        }
        $validatedData->validate();

        $category = $this->checkForExistingCategory(Auth::user()->id, trim($this->taskCategory), trim($this->taskDescription));
        if (is_null($category)) {
            // if the category does not exist, add the category to the categories table and then add the task
            $this->insertIntoCategories(Auth::user()->id, trim($this->taskCategory), trim($this->taskDescription));
            $this->insertIntoTasks(Auth::user()->id, trim($this->taskCategory), trim($this->taskDescription));
        } else {
            // if the category exists, just retrive the id from categories table and insert it as category_id
            $this->insertIntoTasks(Auth::user()->id, trim($this->taskCategory), trim($this->taskDescription));
        }
        $this->dispatch('$refresh')->to('tasks-table');
        $this->dispatch('sendBackId', $this->targetTaskIdEdit)->to('tasks-table');
        $this->dispatch('$refresh')->to('category-color');
        $this->dispatch('getTask')->to('custom-chart');

        $this->resetErrorBag();

        $this->taskCategory = '';
        $this->taskDescription = '';
        // $this->startingTimepoint_unix = '';
        // $this->endingTimepoint_unix = '';
        // $this->startingTimepoint = '00:00';
        // $this->endingTimepoint = '00:00';
        $this->targetTaskIdEdit = '';
    }

    public function checkForExistingCategory($user_id, $category, $description)
    {
        return CategoryModel::where('user_id', $user_id)->where('category', $category)->where('description', $description)->first();
    }

    public function insertIntoCategories($user_id, $category, $description)
    {
        $categoryModel = new CategoryModel;
        $categoryModel->user_id = $user_id;
        $categoryModel->category = $category;
        $categoryModel->description = $description;
        $categoryModel->save();
    }

    public function insertIntoTasks($user_id, $category, $description)
    {
        $taskModel = new TaskModel;
        $retrievedCategory = $this->checkForExistingCategory(Auth::user()->id, $category, $description);
        $taskModel->user_id = $user_id;
        $taskModel->category_id = $retrievedCategory->id;
        $taskModel->done = $this->taskDone;
        // The UnixEpoch in js is in miliseconds, while php is in seconds.
        $taskModel->starting_time = substr($this->startingTimepoint_unix, 0, 10);
        $taskModel->ending_time = substr($this->endingTimepoint_unix, 0, 10);
        $taskModel->save();
        if ($taskModel) {
            session()->flash('successfull_message', 'Task Added Successfully');
        } else {
            session()->flash('unsuccessfull_message', 'Adding Task Was Unsuccessfull');
        }
    }

    public function updateIntoTasks($taskId, $category, $description)
    {
        $retrievedCategory = $this->checkForExistingCategory(Auth::user()->id, $category, $description);
        $update = DB::table('tasks')->where('id', $taskId)
            ->update([
                'done' => $this->taskDone,
                'category_id' => $retrievedCategory->id,
                'starting_time' => substr($this->startingTimepoint_unix, 0, 10),
                'ending_time' => substr($this->endingTimepoint_unix, 0, 10),
            ]);
        if ($update) {
            session()->flash('successfull_message', 'Task Updated Successfully');
        } else {
            session()->flash('unsuccessfull_message', 'Updating Task Was Unsuccessfull');
        }
        $this->dispatch('tasks-table', '$refresh');
    }

    /*
    * Retrives 'categories' and 'distinct categories',
    * And Sorts them by distinct categories.
    */
    public function sortCategoriesByCategory()
    {
        // Optimized!  GG TOPOL
        $distinctCategory = DB::table('tasks')
            ->join('categories', 'tasks.category_id', '=', 'categories.id')
            ->select('categories.category', DB::raw('COUNT(*) as count'))
            ->where('tasks.user_id', Auth::user()->id)
            ->groupBy('categories.category')
            ->orderByDesc('count')
            ->get()->toArray();
        $distinctCategory = json_decode(json_encode($distinctCategory), true);
        $categories = DB::table('tasks')
            ->join('categories', 'tasks.category_id', '=', 'categories.id')
            ->select('categories.category', 'categories.description', 'categories.color', DB::raw('COUNT(*) as count'))
            ->where('tasks.user_id', Auth::user()->id)
            ->groupBy('categories.category', 'categories.description', 'categories.color')
            ->orderByDesc('count')
            ->get()->toArray();
        // dd('$distinctCategory',array_column($distinctCategory,'category'),'$categories',$categories);
        $distinctCategory = array_column($distinctCategory, 'category');
        // If either of '' or '' is empty/null (like for example when for the first time user signs up) ignore the whole operation
        $sortedCategoriesByCategory = [];
        if (isset($categories) && !empty($categories) && isset($distinctCategory) && !empty($distinctCategory)) {
            $categories = json_decode(json_encode($categories), true);
            $categories_copy = $categories;
            $distinctCategoryLength = count($distinctCategory);
            for ($i = 0; $i < $distinctCategoryLength; $i++) {
                // Because the array is getting unset items, the length changing so we need to assign new value to $categoriesLength everytime right before the iteration starts.
                $categoriesLength = count($categories_copy);
                for ($j = 0; $j < $categoriesLength; $j++) {
                    if ($categories_copy[$j]['category'] === $distinctCategory[$i]) {
                        $sortedCategoriesByCategory[$distinctCategory[$i]][] = $categories_copy[$j];
                        // $sortedCategoriesByCategory[$i][$distinctCategory[$i]][] = $categories_copy[$j];
                        unset($categories_copy[$j]);
                    }
                }
                $categories_copy = array_values($categories_copy);
            }
            // dd($distinctCategory, $sortedCategoriesByCategory, $categories);
        }
        return array($sortedCategoriesByCategory, $categories);
    }

    public function prevPeriod()
    {
        // dd('prevPeriod');
        $date = new DateTime();
        $date->setTimezone(new DateTimeZone($this->timezone));
        $date->setTimestamp(substr($this->startingTimepoint_unix, 0, 10));
        $date->sub(new DateInterval('P1D'));
        $this->startingTimepoint_unix = $date->format('U');
        $this->startingTimepoint = $date->format('H:i');
        $this->startingDatepoint = $date->format('Y-m-d');

        $date->setTimestamp(substr($this->endingTimepoint_unix, 0, 10));
        $date->sub(new DateInterval('P1D'));
        $this->endingTimepoint_unix = $date->format('U');
        $this->endingTimepoint = $date->format('H:i');
        $this->endingDatepoint = $date->format('Y-m-d');
    }

    public function nextPeriod()
    {
        // dd('nextPeriod');
        $date = new DateTime();
        $date->setTimezone(new DateTimeZone($this->timezone));
        $date->setTimestamp(substr($this->startingTimepoint_unix, 0, 10));
        $date->add(new DateInterval('P1D'));
        $this->startingTimepoint_unix = $date->format('U');
        $this->startingTimepoint = $date->format('H:i');
        $this->startingDatepoint = $date->format('Y-m-d');

        $date->setTimestamp(substr($this->endingTimepoint_unix, 0, 10));
        $date->add(new DateInterval('P1D'));
        $this->endingTimepoint_unix = $date->format('U');
        $this->endingTimepoint = $date->format('H:i');
        $this->endingDatepoint = $date->format('Y-m-d');
    }
}
