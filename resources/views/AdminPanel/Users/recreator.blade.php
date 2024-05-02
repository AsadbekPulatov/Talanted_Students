<!doctype html>
<html>
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Register</title>
    <link rel="icon" href="{{asset('logo.png')}}">
    <link href="{{asset('AdminPanel/UserStyle/bootstrap.min.css')}}" rel='stylesheet'>
    <link href="{{asset('AdminPanel/UserStyle/all.css')}}" rel='stylesheet'>
    <script type='text/javascript' src="{{asset('AdminPanel/UserStyle/jquery.min.js')}}"></script>
    <style>::-webkit-scrollbar {
            width: 8px;
        }
        /* Track */
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #888;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        } body {
              margin: 0;
              padding: 0;
              font-family: sans-serif;
              background: linear-gradient(to right, #b92b27, #1565c0)
          }

        .card{
            margin-bottom:20px;
            border:none;
        }

        .box {
            width: 500px;
            padding: 40px;
            position: absolute;
            top: 50%;
            left: 50%;
            background: #191919;
        ;
            text-align: center;
            transition: 0.25s;
            margin-top: 100px
        }

        .box input[type="text"],
        .box input[type="password"] {
            border: 0;
            background: none;
            display: block;
            margin: 20px auto;
            text-align: center;
            border: 2px solid #3498db;
            padding: 10px 10px;
            width: 250px;
            outline: none;
            color: white;
            border-radius: 24px;
            transition: 0.25s
        }

        .box h1 {
            color: white;
            text-transform: uppercase;
            font-weight: 500
        }

        .box input[type="text"]:focus,
        .box input[type="password"]:focus {
            width: 300px;
            border-color: #2ecc71
        }
        select
        {
            border: 0;
            background: none;
            display: block;
            margin: 20px auto;
            text-align: center;
            border: 2px solid #3498db;
            padding: 10px 10px;
            width: 250px;
            outline: none;
            color: white;
            border-radius: 24px;
            transition: 0.25s
        }
        select:focus{
            width: 300px;
            border-color: #2ecc71
        }
        option
        {
            border: 0;
            background: none;
            display: block;
            margin: 20px auto;
            text-align: center;
            border: 2px solid #3498db;
            padding: 10px 10px;
            width: 250px;
            outline: none;
            color: white;
            border-radius: 24px;
            transition: 0.25s
        }
        option:focus{
            width: 300px;
            border-color: #2ecc71
        }
        .box input[type="submit"] {
            border: 0;
            background: none;
            display: block;
            margin: 20px auto;
            text-align: center;
            border: 2px solid #2ecc71;
            padding: 14px 40px;
            outline: none;
            color: white;
            border-radius: 24px;
            transition: 0.25s;
            cursor: pointer
        }

        .box input[type="submit"]:hover {
            background: #2ecc71
        }

        .forgot {
            text-decoration: underline
        }

        ul.social-network {
            list-style: none;
            display: inline;
            margin-left: 0 !important;
            padding: 0
        }

        ul.social-network li {
            display: inline;
            margin: 0 5px
        }

        .social-network a.icoFacebook:hover {
            background-color: #3B5998
        }

        .social-network a.icoTwitter:hover {
            background-color: #33ccff
        }

        .social-network a.icoGoogle:hover {
            background-color: #BD3518
        }

        .social-network a.icoFacebook:hover i,
        .social-network a.icoTwitter:hover i,
        .social-network a.icoGoogle:hover i {
            color: #fff
        }

        a.socialIcon:hover,
        .socialHoverClass {
            color: #44BCDD
        }

        .social-circle li a {
            display: inline-block;
            position: relative;
            margin: 0 auto 0 auto;
            border-radius: 50%;
            text-align: center;
            width: 50px;
            height: 50px;
            font-size: 20px
        }

        .social-circle li i {
            margin: 0;
            line-height: 50px;
            text-align: center
        }

        .social-circle li a:hover i,
        .triggeredHover {
            transform: rotate(360deg);
            transition: all 0.2s
        }

        .social-circle i {
            color: #fff;
            transition: all 0.8s;
            transition: all 0.8s
        }</style>
</head>
<body className='snippet-body'>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <form method="POST" action="{{ route('recreator.store') }}" class="box">
                    @csrf
                    <h1>Register</h1>
                    <p class="text-muted"> Please enter your data!</p>

                    <input type="text" class="block mt-1 w-full" name="first_name" value="<?php if(e(isset($data))){ echo e($data->first_name); } ?>" placeholder="First Name" required autofocus />

                    <input type="text" class="block mt-1 w-full" name="last_name" value="<?php if(e(isset($data))){ echo e($data->last_name); } ?>" placeholder="Last Name" required />

                    <input type="text" class="block mt-1 w-full" name="user" value="<?php if(e(isset($data))){ echo e($data->user); } ?>" placeholder="User Name" required />

                    <select type="text" class="block mt-1 w-full" name="gender" placeholder="Gender" required />
                        <option style="color:black;">Male</option>
                        <option style="color:black;">Female</option>
                    </select>

                    <input type="text" name="email" value="<?php if(e(isset($data))){ echo e($data->email); } ?>" placeholder="Email" required />

                    <input type="password" name="password" value="<?php if(e(isset($data))){ echo e($data->password); } ?>" placeholder="password" required autocomplete="new-password" />

                    <input type="password" name="password_confirmation" value="<?php if(e(isset($data))){ echo e($data->password_confirmation); } ?>" placeholder="Confirim Password" required />

                    <select type="text" class="block mt-1 w-full" name="position" placeholder="Position" required />
                    @if(isset($data->position))
                        @if($data->position=="Admin")
                            <option style="color:black;">Admin</option>
                            <option style="color:black;">Creator</option>
                        @else
                            <option style="color:black;">Creator</option>
                            <option style="color:black;">Admin</option>
                        @endif
                    @else
                        <option style="color:black;">Admin</option>
                        <option style="color:black;">Creator</option>
                    @endif
                    </select>

                        <input type="password" name="recreatorpassword" placeholder="Recreator Password" required>

                    <input type="submit" name="Register" value="Register">
                    <br>
                    @if(isset($mes))
                        <label style="color: red" autofocus>
                            {{$mes}}
                        </label>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>
<script type='text/javascript' src="{{asset('AdminPanel/UserStyle/bootstrap.bundle.min.js')}}"></script>
<script type='text/javascript' src='#'></script>
<script type='text/javascript' src='#'></script>
<script type='text/javascript' src='#'></script>
<script type='text/javascript'>#</script>
<script type='text/javascript'>var myLink = document.querySelector('a[href="#"]');
    myLink.addEventListener('click', function(e) {
        e.preventDefault();
    });</script>

</body>
</html>
