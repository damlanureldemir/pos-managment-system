<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Kapella Bootstrap Admin Dashboard Template</title>
    <!-- base:css -->
    <link rel="stylesheet" href="{{asset('template/')}}/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{asset('template/')}}/vendors/base/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('template/')}}/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{asset('template/')}}/images/favicon.png" />
</head>

<body>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth lock-full-bg">
            <div class="row w-100">
                <div class="col-lg-4 mx-auto">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            {{$errors->first()}}
                        </div>
                    @endif
                    <div class="auth-form-transparent text-left p-5 text-center">
                        <img src="{{asset('template/')}}/images/faces/face13.jpg" class="lock-profile-img" alt="img">
                        <form method="post" action="{{route('admin.login.post')}}" class="pt-5">
                            @csrf
                            <div class="form-group">
                                <label for="">Email to unlock</label>
                                <input type="email" name="email" class="form-control text-center"  placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="">Password to unlock</label>
                                <input type="password" name="password" class="form-control text-center"  placeholder="Password">
                            </div>
                            <div class="mt-5">
                                <button type="submit" class="btn btn-block btn-success btn-lg font-weight-medium">Unlock</button>
                            </div>
                            <div class="mt-3 text-center">
                                <a href="#" class="auth-link text-white">Sign in using a different account</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- base:js -->
<script src="{{asset('template/')}}/vendors/base/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- inject:js -->
<script src="{{asset('template/')}}/js/template.js"></script>
<!-- endinject -->
</body>

</html>
