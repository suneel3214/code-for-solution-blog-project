@extends('layout')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
            <div class="col-md-8 mt-5">
                <h2 class="text-center">User All Information:</h2>
                 <div class="card" style="background-image: linear-gradient(to right,#ebecf1,#d3cdcb);">
                     <div class="card-body">
                        <table style="width:100%">
                                <tr>
                                    <th>Id:</th>
                                    <td>{{$newuser->id}}</td>
                                </tr>
                                <tr>
                                    <th>Name:</th>
                                    <td>{{$newuser->name}}</td>
                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    <td>{{$newuser->email}}</td>
                                </tr>
                                <tr>
                                    <th>Mobile:</th>
                                    <td>{{$newuser->mobile}}</td>
                                </tr>
                                {{-- @dd($news); --}}
                                <tr>
                                    <th>State:</th>
                                    <td>{{$newuser->states->name}}</td>
                                </tr>
                                <tr>
                                    <th>City:</th>
                                    <td>{{$newuser->city}}</td>
                                </tr>
                                <tr>
                                    <th>Address:</th>
                                    <td>{{$newuser->address}}</td>
                                </tr>
                                    <h6 style="font-weight: bold">Document File:</h6>
                                    @foreach($newuser->files as $images)
                                      <img src="/image/{{ $images->image }}" style="width: 100px; height:100px; border-radius:100%; padding:5px;">
                                    @endforeach
                                    <hr>

                                    <h6 style="font-weight: bold">Skills:</h6>
                                    @foreach($newuser->skills as $skl)
                                      {{ $skl->skill }}<br>
                                    @endforeach
                                    <hr>
                        </table>
                     </div>
                 </div>
                 <a href="{{url('dashboard')}}" style="width:15%;" class="btn btn-success mt-2">Back</a>
            </div>
        <div class="col-md-2"></div>
    </div>
</div>

@endsection
