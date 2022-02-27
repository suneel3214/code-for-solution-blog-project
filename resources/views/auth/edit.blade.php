@extends('layout')

@section('content')
<style>
    .error{
    color: #FF0000;
    }
 </style>
<div class="container">
    <div class="row">
        <div class="col-md-8 mt-5">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">User Registration Form</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="myform"  method="POST" action="/update-user/{{$user->id}}" enctype="multipart/form-data">
                 @csrf
                 @method('put')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Name</label>
                            {{-- @dd($user); --}}
                            <input type="hidden" name="id"  value="{{$user->id}}">
                            <input type="text" name="name" value="{{$user->name}}" class="form-control" id="examplename" placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" name="email" value="{{$user->email}}" class="form-control"  placeholder="Enter email">
                             <small class="text-danger">@error('email'){{$message}}@enderror</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mobile</label>
                            <input type="text" name="mobile" value="{{$user->mobile}}" class="form-control" id="examplemobile" placeholder="Mobile">
                        </div>
                        <div>
                            <label for="">State</label>
                            <select name="state_id" id="state-dropdown" class="form-control">
                                <option value="">Select Your state</option>
                                @foreach ($states as $state)
                                  <option value="{{$state->id}}" {{ $user->state_id == $state->id  ? 'selected' : '' }}>{{$state->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="city">City</label>
                            <select name="city" id="city-dropdown" class="form-control">
                                <option value="">Select Your state</option>

                                @foreach ($cities as $city)
                                <option value="{{$city->name}}" {{ $user->city == $city->name  ? 'selected' : '' }}>{{$city->name}}</option>
                              @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Skills</label>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                          {{-- <td><input type="text" name="skill[]" class="form-control" value="" placeholder=" Enter Skills">
                                        </td> --}}

                                        <td><h5 style="font-family: 'Gideon Roman', cursive;">Multiple Skills Add .</h5></td>
                                        <td><button type="button" class="btn btn-success addRow"><i class="fa-solid fa-plus"></i></button></td>
                                    </tr>
                                    @if(isset($user->skills) !='')
                                    @foreach($user->skills as $skl)
                                    <tr id="skill_id_{{$skl->id}}">
                                          <td><input type="text" name="skill[]" class="form-control" value=" {{ $skl->skill }} " placeholder=" Enter Skills" disabled>
                                        </td>
                                        <td><button type="button" data-id="{{ $skl->id }}" class="btn btn-danger remove deleteRecord"><i class="fa-solid fa-trash"></i></button></td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="form-group">
                            <label for="">Documemnt File</label>
                            <input type="file" name="images[]" class="form-control" multiple id="documents">
                        </div>

                        <div class="form-group">
                            <label for="">Address</label>
                            <textarea name="address" class="form-control"  id="exampleaddress"  rows="5">{{$user->address}}</textarea>
                        </div>
                        <button type="submit" value="submit" name="submit" class="btn btn-success">Update</button>
                        <a href="{{url('dashboard')}}" style="width:15%;" class="btn btn-warning">Back</a>
                    </div>
                <!-- /.card-body -->
                </form>
           </div>
           <!-- /.card -->
        </div><!--col-md-8 end-->
        <div class="col-md-4 mt-5">
            <div class="card card-primary">
                <div class="card-header">
                    <h6 class="card-title">All Document Files</h6>
                </div>
                <div class="card-body">
                     @if(count($user->files)>0)
                        @foreach($user->files as $images)
                        <form method="post" action="/delete-image/{{$images->id}}">
                            <button type="submit" class="btn btn-danger" style="float: right; margin-top:40px"><i class="fa-solid fa-trash"></i></button>
                            @csrf
                            @method('delete')
                        </form>
                            <img src="/image/{{ $images->image }}" class="delete-image" data-id="{{$images->id}}" style="width: 100px; height:100px; border-radius:100%; padding:5px;">
                        @endforeach
                    @endif
                </div> <!--card body end-->
            </div> <!--card end -->
            <h4 style="font-family: 'Shizuru', cursive;" class="mt-4">Where does it come from?</h4>
            <p style="text-align: justify;font-family: 'Gideon Roman', cursive;">
                Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in
                a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard
                McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the
                more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites
                of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from
                sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by
                Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the
                Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in
                section 1.10.32
                Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by
                Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the
                Renaissance.
            </p>
        </div>
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
            skill: {
              required: true,
            },
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
                            '<td><input type="text" name="skill[]"  class="form-control"  placeholder=" Enter Skills"></td>'+
                            '<td><button type="button" class="btn btn-danger remove "><i class="fa-solid fa-trash"></i></button></td>'+
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
                console.log(result);
            $('#city-dropdown').html('<option value="">Select City</option>');
            $.each(result.cities,function(key,value){
                // if(value.id){
                  $("#city-dropdown").append('<option value="'+value.name+'">'+value.name+'</option>');
                // }
            });
            }
            });
            });
            });
        </script>

    {{--  delete ajax --}}

        {{-- <script>
        $(document).on('click' , '.delete' , function(){
            var id = $(this).attr("id");
            if(confirm("Are you sure data delete"))

        {
            $.ajax({
                url:"{{route('skills.delete_data')}}",
                method:"POST",
                data:{id:id, _token:_token},
                success:function(data)

                {
                    $('#message').html(data);
                    fetch_data();
                }
            })
        }

        });

        </script> --}}

        <script>

$(".remove").click(function(){
    var id = $(this).data("id");
    var url= "{{url('user-edit/skill')}}"+'/'+id;

    var token = $("meta[name='csrf-token']").attr("content");
    // var url= "http://127.0.0.1:8000/user-edit/skill/"+id;

    // alert(url)

    $.ajax(
    {
        url: url,
        type: 'DELETE',
        data: {
            "id": id,
            "_token": token,
        },
        success: function (data){
            console.log("it Works");
            $(this).closest('tr').remove();
        }
    });

});
        </script>
@endsection

