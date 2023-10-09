<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    //return all the course list
    public function courseList(){

        // select the fields
        try{
        $result = Course::select('name', 'thumbnail', 'lesson_num', 'price', 'id')->get();

        return response()->json([
            'code' => 200,
            'msg' => 'My course list is here',
            'data' => $result
        ], 200);
        }catch(\Exception $throw){
            return response()->json([
                'code'=>500,
                'msg'=>'The field does not exist or you have a syntax error',
                'data'=>$throw->getMessage(),
            ], 500);
        }
    }
}
