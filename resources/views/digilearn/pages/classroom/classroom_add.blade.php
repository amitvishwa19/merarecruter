
@extends('digilearn.layout.admin')

@section('title','Add Classroom')


@section('style')
    <link href="{{asset('public/admin/lib/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection


@section('content')

<div class="content-body " id="contentbody">

  <div class="card">

    <div class="d-sm-flex align-items-right justify-content-between mg-b-5 mg-lg-b-5 mg-xl-b-5">
      <div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-style1 mg-b-10">
            <li class="breadcrumb-item"><a href="{{route('app.admin.home')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('classroom.index')}}">Classrooms</a></li>
            <li class="breadcrumb-item active" aria-current="page">Classroom</li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="">
      <h4>Add New Classroom</h4>

      <div class="mg-t-50">
        <form method="post" action="{{route('classroom.store')}}">
          @csrf

            <div class="form-group">
                <label class="d-block"><b>Classroom Name</b></label>
                <input type="text" class="form-control @error('name') is-invalid @enderror"  name="name" value="{{old('name')}}">
                @error('name')
                    <span class="" role="alert">
                        <strong><i>{{ $message }}</i></strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label class="d-block"><b>Classroom Description</b></label>
                <textarea class="form-control" name="description" id="" cols="30" rows="5">{{old('description')}}</textarea>
            </div>

            <!--Students-->
            <div class="form-group">
                <label for="formGroupExampleInput2" class="d-block" style="font-weight:600"><b>Classroom Students</b></label>
                <div data-label="Example" class="">
                    <select class="form-control select2" multiple="multiple" name="students[]" multiple="">
                    <option label="Select Student(s)"></option>
                    @foreach($students as $student)
                        <option value="{{$student->id}}">{{$student->firstname}},{{$student->lastname}}</option>
                    @endforeach
                    </select>
                </div><!-- df-example -->
            </div>

            <div class="form-group">
                <label class="d-block"><b>Classroom Status</b></label>
                <select name="status" class="form-control col-3">
                    <option value="1">Enabled</option>
                    <option value="0" selected>Disabled</option>
                </select>
            </div>




            <button class="btn btn-primary btn-xs" id="btnpublish">Save</button>
            <a href="{{route('classroom.index')}}" class="btn btn-dark btn-xs">Cancel</a>


        </form>
      </div>

    </div>

  </div>

</div>

@endsection


@section('modal')



@endsection


@section('javascript')
    <script src="{{asset('public/admin/lib/select2/js/select2.min.js')}}"></script>

  	<script>
          $(function(){
            'use strict'

            $('.select2').select2({
                placeholder: 'Choose one',
                searchInputPlaceholder: 'Search options'
            });

        });
  	</script>

@endsection
