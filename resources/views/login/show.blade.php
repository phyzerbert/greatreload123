@extends('layouts.front')

@section('content')
    <div class="main">
        <h1 class="title">Topup123</h1>
        <div class="form-login mt-5">            
            <form action="" method="post" id="form_login">
                @csrf
                <div class="form-group">
                    <input type="text" name="email" class="form-control email" placeholder="Email address or Mobile No" required />
                </div>
                <div class="form-group mt-4">
                    <input type="password" name="password" class="form-control password" placeholder="Password" required />
                </div>
                <div><a href="javascript:;" class="text-dark">Forgot Password?</a></div>
                <button type="submit" id="btn_login" class="btn btn-light btn-block mt-4">Login</button>
                <div class="text-center mt-3">
                    <a href="/show_register" class="btn btn-primary btn-register">Register</a>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            let _token = "{{csrf_token()}}";
            $("#form_login").submit(function(e){
                e.preventDefault();
                $("#ajax-loading").fadeIn();
                let email = $("#form_login .email").val();
                let password = $("#form_login .password").val();
                $.ajax({
                    url: '/login/save',
                    method: 'POST',
                    data: {_token: _token, email: email, password: password},
                    dataType: 'JSON',
                    success(response) {
                        console.log('success', response);
                    }
                })
            });
        });
    </script>
@endsection