<?php

namespace App\Http\Controllers\digilearn\Admin;

use App\User;
use App\Models\Classroom;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClassroomRequest;

class ClassroomController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $user = auth()->user();
            //$classrooms = Classroom::orderby('created_at','desc')->latest('id');
            $classrooms = $user->classrooms;

            return Datatables::of($classrooms)
            ->editColumn('created_at',function(Classroom $classroom){
                return $classroom->created_at->diffForHumans();
            })
            ->addColumn('status',function(Classroom $classroom){
                if($classroom->status == true){
                    return '<div class="badge badge-success">Active</div>';
                }else{
                    return '<div class="badge badge-warning">InActive</div>';
                }
            })
            ->addColumn('teacher',function(Classroom $classroom){
                return '<a href="" class="btn btn-default btn-xs mg-r-10 dt-action-btn">'.$classroom->teacher->firstname . ',' . $classroom->teacher->lastname.'</a>';
            })
            ->addColumn('students',function(Classroom $classroom){
                return $classroom->students->count();
            })
            ->addColumn('action',function($data){
                        $link = '<div class="d-flex">'.
                                    '<a href="'.route('classroom.show',$data->id).'" class="btn btn-default btn-xs mg-r-10 dt-action-btn">View</a>'.
                                    '<a href="'.route('classroom.edit',$data->id).'" class="btn btn-default edit btn-xs mg-r-10 dt-action-btn">Edit</a>'.
                                    '<a href="javascript:void(0);" id="'.$data->id.'" class="btn btn-default edit btn-xs mg-r-10 dt-action-btn btn-del delete">Delete</a>'.
                                '</div>';
                        return $link;
                    })
            ->rawColumns(['action','status','teacher'])
            ->make(true);


        }


        return view('digilearn.pages.classroom.classroom');

    }

    public function create()
    {
        $students = User::orderby('created_at','desc')->where('type','student')->get();
        return view('digilearn.pages.classroom.classroom_add',compact('students'));
    }

    public function store(ClassroomRequest $request)
    {
        $validate = $request->validate([
            'name' => 'required'
        ]);

        $classroom = New Classroom;
        $classroom->user_id = auth()->user()->id;
        $classroom->classroom_code = $this->generateClassroomCode(10);
        $classroom->name = $request->name;
        $classroom->description = $request->description;
        $classroom->status = $request->status;
        $classroom->save();

        if($request->students)
        {
            if($classroom){
                $classroom->students()->sync($request->students);
            }
        }

        return redirect()->route('classroom.index')
        ->with([
            'message'    =>'Classroom Added Successfully',
            'alert-type' => 'success',
        ]);

    }

    public function show($id)
    {
        $classroom = Classroom::findOrFail($id);

        return response()->json($classroom);
    }

    public function edit($id)
    {
        $classroom = Classroom::findOrFail($id);
        $students = User::orderby('created_at','desc')->where('type','student')->get();
        //return response()->json($classroom);
        return view('digilearn.pages.classroom.classroom_edit',compact('classroom','students'));
    }

    public function update(ClassroomRequest $request, $id)
    {

        $validate = $request->validate([
            'name' => 'required'
        ]);

        $classroom = Classroom::findOrFail($id);
        $classroom->user_id = auth()->user()->id;
        $classroom->classroom_code = $this->generateClassroomCode(10);
        $classroom->name = $request->name;
        $classroom->description = $request->description;
        $classroom->status = $request->status;
        $classroom->save();

        if($request->students)
        {
            if($classroom){
                $classroom->students()->sync($request->students);
            }
        }

        return redirect()->route('classroom.index')
        ->with([
            'message'    =>'Classroom Updated Successfully',
            'alert-type' => 'success',
        ]);


    }

    public function destroy($id)
    {
        Classroom::destroy($id);

        return response()->json(null, 204);
    }

    function generateClassroomCode($length = 6) {
        $chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $ret = '';
        for($i = 0; $i < $length; ++$i) {
          $random = str_shuffle($chars);
          $ret .= $random[0];
        }
        return $ret;
    }

}
