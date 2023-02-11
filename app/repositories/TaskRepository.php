<?php

namespace App\repositories;

use App\Models\Task;
use Illuminate\Http\Request;
use Throwable;

class TaskRepository
{

    public function storeOrUpdate($data)
    {
        try{
            $Task = new Task;
            $Task->fill($data);
            return $Task->save();
        }catch(Throwable $e){
            return false;
        }
    }

    public function getAllTasks()
    {

        $Task = Task::all();
        return collect($Task)->map(function($data){
            return collect($data)->merge(['created_at'=>diffForHumans($data->created_at)]);
        });
    }

    public function deleteTask($task_id)
    {
        try{
            return Task::find($task_id)->delete();
        }catch(Throwable $e){
            return false;
        }
    }
}
