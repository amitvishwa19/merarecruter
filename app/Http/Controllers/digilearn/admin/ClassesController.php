<?php

namespace App\Http\Controllers\digilearn\Admin;

use App\Http\Requests\ClassesRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\Classes;

class ClassesController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $classes = Classes::orderby('created_at','desc')->get();

            return Datatables::of($classes)
            ->editColumn('created_at',function(Classes $classes){
                return $classes->created_at->diffForHumans();
            })
            ->addColumn('status',function(Classes $classes){

                if($classes->status == true){
                    return '<div class="badge badge-success">Enabled</div>';
                }else{
                    return '<div class="badge badge-warning">Disabled</div>';
                }

            })
            ->addColumn('action',function($data){
                        $link = '<div class="d-flex">'.
                                    '<a href="'.route('classes.show',$data->id).'" class="btn btn-default btn-xs mg-r-10 dt-action-btn">View</a>'.
                                    '<a href="'.route('classes.edit',$data->id).'" class="btn btn-default edit btn-xs mg-r-10 dt-action-btn">Edit</a>'.
                                    '<a href="javascript:void(0);" id="'.$data->id.'" class="btn btn-default edit btn-xs mg-r-10 dt-action-btn btn-del delete">Delete</a>'.
                                '</div>';
                        return $link;
                    })
            ->rawColumns(['action','status'])
            ->make(true);


        }


        return view('digilearn.pages.classes.classes');

    }

    public function create()
    {
        return view('digilearn.pages.classes.classes_add');
    }

    public function store(ClassesRequest $request)
    {
        $validate = $request->validate([
            'name' => 'required'
        ]);

        $classes = New Classes;
        $classes->name = $request->name;
        $classes->description = $request->description;
        $classes->save();

        if($classes){
            //$classes->user()->sync( auth()->user()->id);
        }

        return redirect()->route('classes.index')
        ->with([
            'message'    =>'Classes Added Successfully',
            'alert-type' => 'success',
        ]);

    }

    public function show($id)
    {
        $classes = Classes::findOrFail($id);

        return response()->json($classes);
    }

    public function edit($id)
    {
        $classes = Classes::findOrFail($id);

        //return response()->json($classes);

        return view('digilearn.pages.classes.classes_edit',compact('classes'));
    }

    public function update(ClassesRequest $request, $id)
    {
        $validate = $request->validate([
            'name' => 'required'
        ]);

        $classes = Classes::findOrFail($id);
        $classes->user_id = auth()->user()->id;
        $classes->name = $request->name;
        $classes->description = $request->description;
        $classes->status = $request->status;
        $classes->save();

        return redirect()->route('classes.index')
        ->with([
            'message'    =>'Classes Updated Successfully',
            'alert-type' => 'success',
        ]);


    }

    public function destroy($id)
    {
        Classes::destroy($id);

        return response()->json(null, 204);
    }
}
