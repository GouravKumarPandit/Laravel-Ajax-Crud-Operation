@extends('layout')

@section('title', 'Students List')

@section('content')
<section class="p-3" style="min-height:calc(100vh - 112px)">
    <div class="message"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title m-0 float-left">Students List <img src="{{asset("images/team.png")}}" width="25" height="25" alt="Students"></h3>
                        <a href="students/create" class="btn btn-info float-right"><i class="bi bi-plus-circle"></i> Add New</a>
                    </div>
                    <div class="card-body">
                    @if(Session::has('status'))
                        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('status') }}</p>
                    @endif
                    <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center"># ID</th>
                                    <th class="text-center">Student Name</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Class</th>
                                    <th class="text-center">Age</th>
                                    <th class="text-center">Gender</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($students as $student)
                                <tr>
                                    <td class="text-center">{{$student->id}}</td>
                                    <td class="text-start">
                                        @if($student->student_gender == 'm')
                                            <img src="{{asset('images/ceo.png')}}" style="width: 25px; height: 25px;" alt="Boy Image">
                                        @else
                                            <img src="{{asset('images/woman.png')}}" style="width: 25px; height: 25px;" alt="Girl Image">
                                        @endif
                                        <b>{{$student->first_name}} {{$student->last_name}}</b>
                                    </td>
                                    <td class="text-start">@if($student->email){{$student->email}}@else -- @endif</td>
                                    <td class="text-start">
                                        <img src="{{asset('images/online-learning.png')}}" style="width: 25px; height: 25px;" alt="Course Image">
                                        {{$student->class_name}}
                                    </td>
                                    <td class="text-center">{{$student->student_age}}</td>
                                    <td class="text-start">
                                        @if($student->student_gender == 'm')
                                            <i class="bi bi-gender-male"></i> {{ 'Male' }}
                                        @else
                                            <i class="bi bi-gender-female"></i> {{ 'Female' }}
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{url('students/'.$student->id.'/edit')}}" class="btn btn-sm btn-outline-warning"><i class="bi bi-pencil-square"></i> Edit</a>
                                        <a href="javascript:void(0)" class="delete-student btn btn-sm btn-danger" data-id="{{$student->id}}"><i class="bi bi-trash"></i> Delete</a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7">No Student Found!</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        {{ $students->links('pagination::bootstrap-4'); }}
                        <p style="font-weight: bold; margin: 0px; padding: 0px; float: right;">Total Students: {{ $students->total(); }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection