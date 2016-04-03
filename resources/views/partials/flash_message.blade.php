@section('script')
      @if(Session::has('flash_message'))

        <script>        
            swal({
                title: "{{ session('flash_message.title') }}",   
                text: "{{ session('flash_message.message') }}",   
                timer: 5000,   
                showConfirmButton: false,
                type: "{{ session('flash_message.type') }}",
                allowOutsideClick: true,
                showConfirmButton: true
            });
        </script>

    @endif
@stop