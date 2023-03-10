@extends('layouts.app')

@section('content')
    

<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col">
            <div class="jumbotron">
                <h1 class="display-4">Student Data</h1>
                <a class="btn btn-success" href="{{route('student.index')}}">All Students</a>
                <a class="btn btn-warning" href="{{route('student.create')}}">Add Students</a>
                @if (Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('success')}}
                </div>
                @elseif($errors->all())
                <div class="alert alert-danger" role="alert">
                    <ul class="text-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
        </div>
    </div>
    <hr>
    <div>
    <form method="POST" method="{{route('student.update', $student->id)}}"  enctype="multipart/form-data" >
        @csrf
        @method("PUT")
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5 ">
                <div class="image-upload">
                    <img  class="rounded-circle mt-5" width="150px" alt="Profile Image" src="{{$student->image}}">

                    <input disabled id="image-input"  type="file" name="image">
                </div>
                
                <span class="font-weight-bold">{{$student->firstName.' '.$student->lastName}}</span>
                <span class="text-black-50">{{$student->email}}</span>
                
                <span> </span>
            </div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-left">id:{{$student->id}}</h4>
                    <h4 class="text-right">???????????? ???????????? </h4> 
                   
                </div>
                <div class='border p-2'>
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">?????????? ??????????</label><input disabled type="text" name="firstName" class="form-control border-light" placeholder="?????????? ??????????" value={{$student->firstName}}></div>
                        <div class="col-md-6"><label class="labels">?????????? ????????????</label><input disabled required type="text" name="lastName" class="form-control border-light" value={{$student->lastName}} placeholder="?????????? ????????????"></div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">?????? ????????</label><input disabled required type="text"  name="fatherName" class="form-control border-light" placeholder="?????? ????????" value={{$student->fatherName}}></div>
                        <div class="col-md-6"><label class="labels">?????? ????????</label><input disabled required type="text" name="motherName" class="form-control border-light" placeholder="?????? ????????" value={{$student->motherName}}></div>
                        
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">?????????? ??????????????</label><input disabled required type="date" name="birthDay" class="form-control border-light" placeholder="?????????? ??????????????" value={{$student->birthDay}}></div>
                        <div class="col-md-6"><label class="labels">??????????????</label><input disabled required type="text" name="city" class="form-control border-light" placeholder="??????????????" value={{$student->city}}></div>

                    </div>    

                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="labels" for="form3Example1m1" >?????? ????????????</label>
                                <input disabled required type="number" id="form3Example1m1" name="room" value={{$student->room}} class="form-control border-light" />
                                
                         </div>
                         <div class="col-md-6">
                            <label class="labels" for="form3Example1n1">?????? ????????????</label>

                             <input disabled required type="tel" name="phoneNumber" id="form3Example1n1" placeholder="?????? ????????????" value={{$student->phoneNumber}} class="form-control border-light" />
                         </div>
                     </div>

                     <div class='row m-2'>
                        <input type="email" hidden placeholder="email address" disabled name='email' class="form-control hd" value="{{$student->email}}" />
                        
                    </div>
                    
                    <div class="row mt-2 d-md-flex justify-content-start align-items-center mb-2 py-2 bg">
                        <div class="col-md-2 mb-0 me-4"><label class="labels fs-6">??????????:</label></div>
                        
                        <div class="col-md-2">
                            <input disabled required class="form-check-input" type="radio" name="gender" id="femaleGender" value="????????" />
                            <label class="form-check-label" for="femaleGender">????????</label>
                        </div>

                        <div class="col-md-2">
                            <input disabled class="form-check-input" type="radio" name="gender" id="maleGender" value="??????" />
                            <label class="form-check-label" for="maleGender">??????</label>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-4 mb-4">
                            <label class="labels">????????????</label>        
                            <select disabled id='college' class="select btn btn-primary" name="college" required onchange="test_college('college','college')" >                                    
                                <option class="college" value="">????????????</option>
                                <option class="college" value="en">??????????????</option>
                                <option class="college" value="mng">?????????????? ??????????????????</option>
                                <option class="college" value="ed">??????????????</option>
                                <option class="college" value="law">?????????????? ????????????????</option>
                                <option class="college" value="hlth ">???????????? ????????????</option>
                            </select>

                        </div>
                                
                        <div class="col-md-4 mb-4">
                            <label class="labels">??????????</label>
                            <select disabled class="select btn btn-secondary" id='section'   name='section' required>
                                <option class='dropdown-item section' value="">??????????</option>
                                <option class='dropdown-item en'  hidden value="??????????????????????">??????????????????????</option>
                                <option class='dropdown-item en' hidden value="??????????????">??????????????</option>
                                <option class='dropdown-item en' hidden value="??????????????????????????">??????????????????????????</option>
                                <option class='dropdown-item mng' hidden value="??????????????">??????????????</option>
                                <option class='dropdown-item mng' hidden value="????????????????">????????????????</option>
                                <option class='dropdown-item ed' hidden value="????????-????">???????? ????</option>
                                <option class='dropdown-item ed' hidden value="??????????????-????????????">?????????????? ????????????</option>
                                <option class='dropdown-item law' hidden value="??????????????">??????????????</option>
                                <option class='dropdown-item law' hidden value="??????????????">??????????????</option>
                                <option class='dropdown-item hlth' hidden value="??????????????">??????????????</option>
                                <option class='dropdown-item hlth' hidden value="??????????????">??????????????</option>
                                <option class='dropdown-item hlth' hidden value="????????????-??????????????????">???????????? ??????????????????</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-4">
                            <label class="labels">?????????? ????????????????</label>
                            <select disabled class="select btn btn-warning" required id='level' name='level'>
                                <option value="">?????????? ????????????????</option>
                                <option value="????????????">????????????</option>
                                <option value="??????????????">??????????????</option>
                                <option value="??????????????">??????????????</option>
                                <option value="??????????????">??????????????</option>
                            </select>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center pt-3 pb-3 border mt-4">
                        <input type="reset" hidden class="btn btn-warning btn-lg ms-2 hd" />
                        <input type="submit" hidden class="btn btn-success btn-lg ms-2 hd" />
                        <button type="button" id="update" onclick="updateStudent()" class="btn btn-success ms-2" >?????????? ????????????</button>
                        <form action=""></form>
                        <form action="{{route('student.destroy',$student->id)}}" id="df" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button id="delete"  title="delete" class="btn btn-danger ms-2">?????? ???????????? </button>
                        </form>
                    </div>
                </div>
            </div>
            </div>
            <div class="col-md-4">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center experience"><span>Edit Experience</span><span class="border px-3 p-1 add-experience"><i class="fa fa-plus"></i>&nbsp;Experience</span></div><br>
                    <div class="col-md-12"><label class="labels">Experience in Designing</label><input type="text" class="form-control border-light" placeholder="experience" value=""></div> <br>
                    <div class="col-md-12"><label class="labels">Additional Details</label><input type="text" class="form-control border-light" placeholder="additional details" value=""></div>
                </div>
            </div>
        </div>
    </fieldset>
</div>
</div>

</form>
</div>
<script>
    
    let gender = document.querySelector('input[value={{$student->gender}}]');
    gender.setAttribute("checked","");

    document.querySelector('option[value={{$student->college}}]').setAttribute("selected","");
    document.querySelector('option[value={{$student->section}}]').setAttribute("selected","");
    document.querySelector('option[value={{$student->level}}]').setAttribute("selected","");
   
    
</script>
@endsection