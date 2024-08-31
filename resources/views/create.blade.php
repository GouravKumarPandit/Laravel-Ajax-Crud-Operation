@extends('layout')

@section('title', 'Add New Student')

@section('content')
<section class="p-3" style="min-height:calc(100vh - 112px)">
    <div class="message"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title m-0 float-left">Add New Student</h3>
                        <a href="/students" class="btn btn-success float-right">
                            <img src="{{asset("images/team.png")}}" width="25" height="25" alt="Students">&nbsp;&nbsp;All Students
                        </a>
                    </div>
                    <div class="card-body">
                        <input type="hidden" class="url" value="{{url('/students')}}" >
                        <form id="add_student" class="form-horizontal" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label for="" class="text-right" style="font-weight: bold;">First Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error("first_name") is-invalid @enderror" value="{{Request::old("first_name")}}" placeholder="First Name" name="first_name">
                                    <span class="text-danger">@error("first_name") {{$message}} @enderror</span>
                                </div>
                                <div class="col-md-4">
                                    <label for="" class="text-right" style="font-weight: bold;">Middle Name</label>
                                    <input type="text" class="form-control @error("middle_name") is-invalid @enderror" value="{{Request::old("middle_name")}}" placeholder="Middle Name" name="middle_name">
                                    <span class="text-danger">@error("middle_name") {{$message}} @enderror</span>
                                </div>
                                <div class="col-md-4">
                                    <label for="" class="text-right" style="font-weight: bold;">Last Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error("last_name") is-invalid @enderror" value="{{Request::old("last_name")}}" placeholder="Last Name" name="last_name">
                                    <span class="text-danger">@error("last_name") {{$message}} @enderror</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label for="" class="text-right mt-3" style="font-weight: bold;">Gender <span class="text-danger">*</span></label> <br>
                                    <input type="radio" name="student_gender" {{Request::old("student_gender") == "m" ? checked : ""}} value="m" class=""> Male
                                    <input type="radio" name="student_gender" {{Request::old("student_gender") == "f" ? checked : ""}} value="f" class=""> Female
                                    <br><span class="text-danger">@error("student_gender") {{$message}} @enderror</span>
                                </div>
                                <div class="col-md-4">
                                    <label for="" class="text-right" style="font-weight: bold;">Email <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error("email") is-invalid @enderror" value="{{Request::old("email")}}" placeholder="abc@gmail.com" name="email">
                                    <span class="text-danger">@error("email") {{$message}} @enderror</span>
                                </div>
                                <div class="col-md-4">
                                    <label for="Class" class="text-right" style="font-weight: bold;">Class <span class="text-danger">*</span></label>
                                    <select name="student_class" class="form-control @error("student_class") is-invalid @enderror" id="Class">
                                        <option value="" selected disabled selected >Select Class</option>
                                        @foreach($classes as $class_list)
                                            <option value="{{$class_list->id}}" @if(Request::old("student_class") == $class_list->id) selected @endif>{{$class_list->name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">@error("student_class") {{$message}} @enderror</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label for="" class="text-right" style="font-weight: bold;">Age <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control @error("student_age") is-invalid @enderror" value="{{Request::old("student_age")}}" placeholder="Age" name="student_age">
                                    <span class="text-danger">@error("student_age") {{$message}} @enderror</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 text-center">
                                    <input type="submit" class="btn btn-success" value="Submit">
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