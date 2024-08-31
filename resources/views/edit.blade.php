@extends('layout')

@section('title', 'Edit Student')

@section('content')
<section class="p-3" style="min-height:calc(100vh - 112px)">
    <div class="message"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title m-0 float-left">Edit Student</h3>
                        <a href="/students" class="btn btn-success float-right">
                            <img src="{{asset("images/team.png")}}" width="25" height="25" alt="Students">&nbsp;&nbsp;All Students
                        </a>
                    </div>
                    <div class="card-body">
                        <input type="hidden" class="url" value="{{url('/students/'.$student->id)}}" >
                        <input type="hidden" class="rdt-url" value="{{url('/students')}}" >
                        <form id="update_student" class="form-horizontal" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label for="" class="text-right" style="font-weight: bold;">First Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error("first_name") is-invalid @enderror" value="@if(Request::old("first_name")){{Request::old("first_name")}}@else{{$student->first_name}}@endif" placeholder="First Name" name="first_name">
                                    <span class="text-danger">@error("first_name") {{$message}} @enderror</span>
                                </div>
                                <div class="col-md-4">
                                    <label for="" class="text-right" style="font-weight: bold;">Middle Name</label>
                                    <input type="text" class="form-control @error("middle_name") is-invalid @enderror" value="@if(Request::old("middle_name")){{Request::old("middle_name")}}@else{{$student->middle_name}}@endif" placeholder="Middle Name" name="middle_name">
                                    <span class="text-danger">@error("middle_name") {{$message}} @enderror</span>
                                </div>
                                <div class="col-md-4">
                                    <label for="" class="text-right" style="font-weight: bold;">Last Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error("last_name") is-invalid @enderror" value="@if(Request::old("last_name")){{Request::old("last_name")}}@else{{$student->last_name}}@endif" placeholder="Last Name" name="last_name">
                                    <span class="text-danger">@error("last_name") {{$message}} @enderror</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label for="" class="text-right mt-3" style="font-weight: bold;">Gender <span class="text-danger">*</span></label> <br>
                                    <input type="radio" name="student_gender" @if(Request::old("student_gender") == "m") checked @elseif($student->student_gender == "m") checked @endif value="m" class=""> Male
                                    <input type="radio" name="student_gender" @if(Request::old("student_gender") == "f") checked @elseif($student->student_gender == "f") checked @endif value="f" class=""> Female
                                    <br><span class="text-danger">@error("student_gender") {{$message}} @enderror</span>
                                </div>
                                <div class="col-md-4">
                                    <label for="" class="text-right" style="font-weight: bold;">Email <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error("email") is-invalid @enderror" value="@if(Request::old("email")){{Request::old("email")}}@else{{$student->email}}@endif" placeholder="abc@gmail.com" name="email">
                                    <span class="text-danger">@error("email") {{$message}} @enderror</span>
                                </div>
                                <div class="col-md-4">
                                    <label for="Class" class="text-right" style="font-weight: bold;">Class <span class="text-danger">*</span></label>
                                    <select name="student_class" class="form-control @error("student_class") is-invalid @enderror" id="Class">
                                        <option value="" selected disabled selected >Select Class</option>
                                        @foreach($classes as $class_list)
                                            <option value="{{$class_list->id}}" @if(Request::old("student_class") == $class_list->id) selected @elseif($student->student_class == $class_list->id) selected @endif>{{$class_list->name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">@error("student_class") {{$message}} @enderror</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label for="" class="text-right" style="font-weight: bold;">Age <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control @error("student_age") is-invalid @enderror" value="@if(Request::old("student_age")){{Request::old("student_age")}}@else{{$student->student_age}}@endif" placeholder="Age" name="student_age">
                                    <span class="text-danger">@error("student_age") {{$message}} @enderror</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 text-center">
                                    <input type="submit" class="btn btn-success" value="Update">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection