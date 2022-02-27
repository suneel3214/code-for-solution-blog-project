@extends('layout')

@section('content')
<style>
    .error{
    color: #FF0000;
    }
 </style>
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 mt-5">
                {{-- @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                 @endif --}}
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">User Registration Form</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="myform"  method="POST" action="{{route('user_register_create')}}" enctype="multipart/form-data">
                 @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" id="examplename" placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" name="email" class="form-control"  placeholder="Enter email">
                             <small class="text-danger">@error('email'){{$message}}@enderror</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mobile</label>
                            <input type="text" name="mobile" class="form-control" id="examplemobile" placeholder="Mobile">
                        </div>
                        <div>
                            <label for="">State</label>
                            <select name="state_id" id="state-dropdown" class="form-control">
                                <option value="">Select Your state</option>
                                @foreach ($states as $state)
                                  <option value="{{$state->id}}">{{$state->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="city">City</label>
                            <select name="city" id="city-dropdown" class="form-control">
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Skills</label>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td><input type="text" name="skill[]" class="form-control"  placeholder=" Enter Skills"></td>
                                        <td><button type="button" class="btn btn-success addRow"><i class="fa-solid fa-plus"></i></button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="form-group">
                            <label for="">Documemnt File</label>
                            <input type="file" name="images[]" class="form-control" multiple id="documents">
                        </div>
                        <div class="form-group">
                            <label for="">Address</label>
                            <textarea name="address" class="form-control" id="exampleaddress"  rows="5"></textarea>
                        </div>

                    </div>
                <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
           </div>
           <!-- /.card -->
        </div><!--col-md-8 end-->
        <div class="col-md-2"></div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
{{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> --}}
{{-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> --}}
<script>
    jQuery
        ( ".myform" ).validate({
          rules: {
            name: {
              required: true,
            },
            email: {
              required: true,
              email: true
            },
            password: {
              required: true,
              maxlength:12,
              minlength:8
            },
            address: {
              required: true,
            },
            // skill: {
            //   required: true,
            // },
            images: {
              required: true,
            },
            mobile: {
              required: true,
              number: true,
              maxlength: 10
            }
          }
        });
    </script>


        <script type="text/javascript">
            $(".addRow").on('click', function(){
                addRow();
            });

            function addRow(){
                var tr = '<tr>'+
                            '<td><input type="text" name="skill[]" class="form-control"  placeholder=" Enter Skills"></td>'+
                            '<td><button type="button" class="btn btn-danger remove"><i class="fa-solid fa-trash"></i></button></td>'+
                        '</tr>';
                        $('tbody').append(tr);

            };

            $('tbody').on('click' , '.remove' , function(){
                $(this).parent().parent().remove();
            })
        </script>
        <script>
           $(document).ready(function() {
            $('#state-dropdown').on('change', function() {
            var state_id = this.value;
            $("#city-dropdown").html('');
            $.ajax({
            url:"{{url('get-cities-by-state')}}",
            type: "POST",
            data: {
            state_id: state_id,
            _token: '{{csrf_token()}}'
            },
            dataType : 'json',
            success: function(result){
            $('#city-dropdown').html('<option value="">Select City</option>');
            $.each(result.cities,function(key,value){
            $("#city-dropdown").append('<option value="'+value.name+'">'+value.name+'</option>');
            });
            }
            });
            });
            });
        </script>

@endsection
