<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class create_content extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('side_project.index');
    }

    public function index_content()
    {
        $result_out = array();
        $results = Item::where('users_id', '=', Auth::user()->id)->Join('sort', 'items.sort_id', '=', 'sort.sort_id')->orderby('deadline','desc')->get();
        $today = date('Y-m-d');
        foreach ($results as $Field) {
            $day = (strtotime($Field['deadline']) - strtotime($today)) / (60 * 60 * 24);
            switch ($day) {
                case $day > 0:
                    array_push($result_out, array("id" => $Field['id'], "sort" => $Field['sort'], "title" => $Field['title'], "content" => $Field['content'], "deadline" => $day, "set_day" => $Field['set_day']));
                    break;
                default:
                    break;
            }
        }
        return json_encode($result_out);
    }

    public function create_content()
    {
        return view('side_project.create_content');
    }

    public function create_content_post(Request $request)
    {
        $result_out = array();
        $check = 0;
        $title = $request->all('title')['title'];
        $sort = (int)$request->all('sort')['sort'];
        $content = $request->all('content')['content'];
        $deadline = $request->all('deadline')['deadline'];

        if (!isset($title) || !isset($sort) || !isset($content) || !isset($deadline)) {
            $check = 1;
        }
        switch ($check) {
            case 0:
                Item::create(['users_id' => Auth::user()->id, 'sort_id' => $sort, 'title' => $title, 'content' => $content, 'deadline' => $deadline]);
                array_push($result_out, array("result" => "新增成功"));
                return json_encode($result_out);
                break;
            case 1:
                array_push($result_out, array("result" => "有欄位為空"));
                return json_encode($result_out);
                break;
        }
    }

    public function set_day(Request $request)
    {
        $result_out = array();
        $id = $request->all('id')['id'];
        $set_day = $request->all('day')['day'];
        Item::where('id', '=', $id)->update(['set_day' => $set_day]);
        array_push($result_out, array("result" => "更改成功"));
        return json_encode($result_out);
    }



}
