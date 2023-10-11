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

    //return all the course detail
    public function courseDetail(Request $request){
        //course id
        $id = $request->id;
        // select the fields
        try{
        $result = Course::where('id', '=', $id)->select('id','name','user_token','description','price','lesson_num','video_len','thumbnail', 'downloadable_res')->first(); //nie może być get(), bo get is collection of items/czyli w liście. Gdy tak zrobimy możemy mieć liste, zamiast map

        return response()->json([
            'code' => 200,
            'msg' => 'My course detail is here',
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
