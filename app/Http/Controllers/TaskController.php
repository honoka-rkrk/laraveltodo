<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(int $id){
        //全てのフォルダを取得する
        $folders=Folder::all();

        //選ばれたフォルダを取得する
        return view('tasks/index',[
            'folders'=>$folders,
            'current_folder_id'=>$id,
        ]);
    }
}
