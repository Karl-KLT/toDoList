<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\repositories\TaskRepository;
use Throwable;

class TaskController extends Controller
{
    protected $TaskRepository;
    public function __construct(TaskRepository $TaskRepository)
    {
        $this->TaskRepository = $TaskRepository;
    }


    public function add()
    {

        if($this->TaskRepository->storeOrUpdate(Request()->all())){
            return Response()->json(["status"=>200,'message'=>"task has been created"]);
        }

    }

    public function get()
    {
        return $this->TaskRepository->getAllTasks()->isEmpty() ? null : $this->TaskRepository->getAllTasks();
    }

    public function delete()
    {
        return $this->TaskRepository->deleteTask(Request()->task_id);
    }
}
