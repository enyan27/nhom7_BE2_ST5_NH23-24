<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Đăng nhập hệ thống </title>
  <link rel="stylesheet" href="/admin/assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="/admin/assets/css/style.css"/>

</head>
<body>
    <section class="login-section">
        <form action="login" method="POST">
            @csrf
            <div class="account-login">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <div class="account-login-header">
                    <h2 class="text-center">Login</h2>
                </div>
                @include('admin.component.alert')
                <div class="account-login-inner">
                    <input class="account-login-input" name="email" placeholder="Email Addres" type="email">
                    <input class="account-login-input" name="password" placeholder="Password" type="password">
                    
                </div>
                <button class="account-login-btn btn" type="submit">Login</button>
            </div>
        </form>            
    </section>
    <script src="/admin/assets/js/bootstrap.min.js"></script>
</body>
</html>