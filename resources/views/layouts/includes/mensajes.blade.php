@if(Session::has('message') && count($errors) > 0)
    <div class="row errorow">
        <div class="col-md-12">
            <div class='row alert alert-danger'>
                <ul>
                    <li>{{Session::get('message')}}</li>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@elseif(count($errors) > 0)
    <script>
        swal(
            'OPS!',
            '<ul>' +
                @foreach($errors->all() as $error)
                    '<li>{{$error}}</li>'+
                @endforeach
            '</ul>',
            'error'
        )
    </script>
@elseif(Session::has('message'))
    <script>
        swal(
            '{{Session::get('titulo')}}',
            '{{Session::get('message')}}',
            '{{Session::get('class')}}'
        )
    </script>
@endif