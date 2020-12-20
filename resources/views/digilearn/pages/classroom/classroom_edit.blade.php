
@extends('digilearn.layout.admin')

@section('title','Edit Classroom')


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
          <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
      </nav>
    </div>
  </div>

  <div class="">
    <h4>Edit Classroom ({{$classroom->name}})</h4>

    <div class="mg-t-50">
      <form method="post" action="{{route('classroom.update',$classroom->id)}}">
        @csrf
        {{method_field('PUT')}}

        <div class="form-group">
            <label class="d-block"><b>Classroom Name</b></label>
            <input type="text" class="form-control @error('name') is-invalid @enderror"  name="name" value="{{$classroom->name}}{{old('name')}}">
            @error('name')
                <span class="" role="alert">
                    <strong><i>{{ $message }}</i></strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label class="d-block"><b>Classroom Description</b></label>
            <textarea class="form-control" name="description" id="" cols="30" rows="5">{{$classroom->description}}{{old('description')}}</textarea>
        </div>

        <!--questions-->
        <div class="form-group">
            <label for="formGroupExampleInput2" class="d-block" style="font-weight:600"><b>Classroom Students</b></label>
            <div data-label="Example" class="">
                <select class="form-control select2" multiple="multiple" name="students[]" multiple="">
                <option label="Choose Teacher(s)"></option>
                @foreach($students as $student)
                    <option value="{{$student->id}}"
                        @foreach($classroom->students as $cs)
                            @if($cs->id == $student->id)
                                selected
                            @endif
                        @endforeach
                    >{{$student->firstname}},{{$student->lastname}}</option>
                @endforeach
                </select>
            </div><!-- df-example -->
        </div>

        <div class=" form-group">
            <label class="d-block"><b>Classroom Status</b></label>
            <select name="status" id="" class="form-control col-3 @error('name') is-invalid @enderror">
                <option value='1' {{$classroom->status == 'enabled' ? 'selected' : null}}>Enabled</option>
                <option value='0' {{$classroom->status == 'disabled' ? 'selected' : null}}>Disabled</option>
            </select>
        </div>


        <button class="btn btn-primary btn-xs" id="btnpublish">Update</button>
        <a href="{{route('classroom.index')}}" class="btn btn-dark btn-xs">Cancel</a>


      </form>
    </div>


  </div><!-- row -->

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
