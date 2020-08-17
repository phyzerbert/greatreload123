@extends('layouts.front')

@section('content')
    <div class="main">
        <h1 class="title">Topup-123</h1>
        <h4 class="text-center text-white">Register</h4>
        <div class="form-register mt-5">
            <form action="" method="post" id="form_register">
                @csrf
                <div class="form-group floating-label">
                    <input type="text" name="name" class="form-control floating-input name" id="register_name" placeholder=" " required />
                    <label for="register_name">Your Name</label>
                </div>
                <div class="form-group floating-label">
                    <input type="text" name="phone_number" class="form-control floating-input phone_number" id="register_phone_number" placeholder=" " required />
                    <label for="register_phone_number">Phone Number</label>
                </div>
                <div class="form-group floating-label">
                    <input type="email" name="email" class="form-control floating-input email" id="register_email" placeholder=" " required />
                    <label for="register_email">Email</label>
                </div>
                <div class="form-group floating-label">
                    <input type="text" name="billing_address" class="form-control floating-input billing_address" id="register_billing_address" placeholder=" " required />
                    <label for="register_billing_address">Billing Address</label>
                </div>
                <div class="form-group row mx-0 bank-information">
                    <input type="text" name="bank_account" class="form-control col-12" placeholder="长号">
                    <div class="col-6">                        
                        <input type="text" name="effective_date" class="form-control effective_date" placeholder="有效日期">
                    </div>
                    <div class="col-6 px-0">
                        <input type="text" name="cvc" class="form-control cvc" placeholder="CVC">
                    </div>
                </div>
                <div class="text-center floating-label">
                    <button type="submit" id="btn_register" class="btn mx-auto mt-3">Register</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            let _token = "{{csrf_token()}}";
            $("#form_register").submit(function(e){
                e.preventDefault();
                $("#ajax-loading").fadeIn();
                $.ajax({
                    url: '/register/save',
                    method: 'POST',
                    data: $("#form_register").serialize(),
                    dataType: 'JSON',
                    success(response) {
                        console.log('success', response);
                    }
                })
            });
        });
    </script>
@endsection