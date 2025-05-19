<!DOCTYPE html>
<html>

<head>
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class=" container" ">
        <div class=" row justify-content-center mt-5">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-transparent mb-0">
                    <h5 class="text-center">Login <span class="font-weight-bold text-primary">DULU</span></h5>
                </div>
                <div class="card-body">
                    @if(session('error'))
                    <div class="alert alert-danger">
                        <b>Opps!</b> {{session('error')}}
                    </div>
                    @endif
                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" id="username" name="username" class="form-control" placeholder="Username">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="mb-3 form-check">
                            <label class="text-decoration-none">
                                <a href="{{ url('/') }}" style="text-decoration: none; color: #00698f; font-size: 16px; font-weight: bold;">
                                  <i class="fas fa-arrow-left" style="color: #00698f; font-size: 18px;"></i> Kembali
                                </a>
                              </label>
                        </div>
                        <div style="text-align: center;">
                            <button type="submit" class="btn btn-primary">Login</button>
                            <button type="reset" class="btn btn-primary">Cancel</button>
                        </div>
                    </form>
                    @if ($errors->any())
                    <div>
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    </div>
</body>
</html>