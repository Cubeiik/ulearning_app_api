<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lesson;

class LessonController extends Controller
{
    //
    public function lessonList(Request $request){
        try{
            $courseId = $request->id;
            $result = Lesson::where('course_id', '=', $courseId)->select(
                 'id',
                 'name',
                 'thumbnail',
                 'description',
                 'video'
            )->get();

            return response()->json([
                'code'=>200,
                'msg'=>'success',
                'data'=>$result,
            ], 200);
        }catch(\Exception $e){
            return response()->json([
                'code'=>200,
                'msg'=>$e->getMessage(),
                'data'=>'',
            ], 500);
        }

    }

    public function lessonDetail(Request $request){
        try{
            $lessonId = $request->id;
            $result = Lesson::where('id', '=', $lessonId)->select(
                 'id',
                 'video'
            )->first();

            return response()->json([
                'code'=>200,
                'msg'=>'success',
                'data'=>$result,
            ], 200);
        }catch(\Exception $e){
            return response()->json([
                'code'=>200,
                'msg'=>$e->getMessage(),
                'data'=>'',
            ], 500);
        }

    }
}
