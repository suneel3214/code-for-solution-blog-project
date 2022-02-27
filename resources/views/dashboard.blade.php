@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
                 <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
   <div class="content-header" style="background-image: linear-gradient(to right,#ebecf1,#d3cdcb);">
     <div class="container-fluid">
        <h1 class="m-0" style="color: #7a7575; text-align: center;">Admin Panel</h1>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4"></div>
            <div class="col-md-4">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                 @endif
            </div>
        </div>
       <div class="row mb-2">
         <div class="col-sm-6">
         </div><!-- /.col -->
       </div><!-- /.row -->
     </div><!-- /.container-fluid -->
   </div><!-- content-header end -->
   <!-- apna code karna hai -->
   <!-- /.card -->
           <div class="container-fluid" style="background-image: linear-gradient(to right,#ebecf1,#d3cdcb);">
           <div class="card">
             <div class="card-header" style="background-image: linear-gradient(to right,#ebecf1,#d3cdcb);border-top: 1px solid #fff;border-bottom: 1px solid #fff;">
               <h3 class="card-title">Display User</h3>
               <a href="{{url('user_register')}}" class="btn btn-warning" style="float: right;">Add User</a>
             </div>
             <!-- /.card-header -->
             <div class="card-body" style="background-image: linear-gradient(to right,#ebecf1,#d3cdcb);">
               <table id="example1" class="table table-bordered table-striped">
                 <thead>
                    <tr>
                    <th>S.No.</th>
                    <th>NAME</th>
                    <th>EMAIL</th>
                    <th>MOBILE</th>
                    <th>CITY</th>
                    <th>ACTION</th>
                    </tr>
                 </thead>
                 <tbody>
                     {{-- @dd($data); --}}
                     @if ($data)
                        @foreach ($data as $item)
                            <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->mobile}}</td>
                            <td>{{$item->city}}</td>
                            <td>
                                <form action="{{ route('user-delete',$item->id) }}" method="POST">
                                    <a href="{{route('view-all-information' , $item->id)}}" class="btn btn-success" >View All Information</a>
                                    <a href="{{route('user-edit',$item->id)}}" class="btn btn-warning">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
                 <tfoot>
                    <tr>
                    <th>S.No.</th>
                    <th>NAME</th>
                    <th>EMAIL</th>
                    <th>MOBILE</th>
                    <th>CITY</th>
                    <th>ACTION</th>
                    </tr>
                 </tfoot>
               </table>
             </div>
             <!-- /.card-body -->
           </div>
         </div>
           <!-- /.card -->
<!-- Modal start add employee -->

<!-- Modal end add employee -->
   <!-- apna code end -->
</div><!-- content-wrapper end -->
            </div>
        </div>
    </div>
</div>
@endsection
