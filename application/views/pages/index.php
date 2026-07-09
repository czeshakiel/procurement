<!doctype html>
<html class="no-js" lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title>PMMS | Engineering Department</title>
    <link rel="icon" href="<?=base_url('design/project.png');?>" type="image/x-icon"> <!-- Favicon-->
    <!-- project css file  -->
    <link rel="stylesheet" href="<?=base_url('design/assets/css/my-task.style.min.css'); ?>">
</head>

<body style="background: url(<?=base_url('design/projectmonitoring.png');?>) no-repeat; background-size: cover;">

<div id="mytask-layout" class="theme-indigo" style="opacity: 0.9;">

    <!-- main body area -->
    <div class="main p-2 py-3 p-xl-5 ">
        
        <!-- Body: Body -->
        <div class="body d-flex p-0 p-xl-5">
            <div class="container-xxl">

                <div class="row g-0">
                    <div class="col-lg-4 d-none d-lg-flex justify-content-center align-items-center rounded-lg auth-h100">
                        <div style="max-width: 25rem;">
                            <div class="text-center mb-5">
                                 
                            </div>                            
                        </div>
                    </div>
                    <div class="col-lg-4 d-flex justify-content-center align-items-center border-0 rounded-lg auth-h100">
                        <div class="w-100 p-3 p-md-5 card border-0 bg-dark text-light" style="max-width: 32rem;">
                            <!-- Form -->
                            <form class="row g-1 p-3 p-md-4" action="<?=base_url('authenticate'); ?>" method="post">
                                <div class="col-12 text-center mb-1">                                    
                                    <img src="<?=base_url('design/projectmanagement.png');?>" alt="Project Logo" class="img-fluid" style="max-height: 150px;">
                                </div>
                                <div class="col-12 text-center mb-1">
                                    
                                    <span class="dividers text-muted mt-4">Sign in</span>
                                </div>
                                <div class="col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Username</label>
                                        <input type="text" class="form-control form-control-lg" name="username">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-2">
                                        <div class="form-label">
                                            <span class="d-flex justify-content-between align-items-center">
                                                Password                                                
                                            </span>
                                        </div>
                                        <input type="password" class="form-control form-control-lg" name="password" id="pwd">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" onclick="pwd.type =  checked ? 'text' : 'password'">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Show Password
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 text-center mt-4">
                                    <button type="submit" class="btn btn-lg btn-block btn-light lift text-uppercase" atl="signin">SIGN IN</button>
                                </div>                                
                            </form>
                            <!-- End Form -->
                        </div>
                    </div>
                    <div class="col-lg-4 d-none d-lg-flex justify-content-center align-items-center rounded-lg auth-h100">
                        <div style="max-width: 25rem;">
                            <div class="text-center mb-5">
                                 
                            </div>                            
                        </div>
                    </div>
                </div> <!-- End Row -->
            </div>
        </div>
    </div>
</div>

<!-- Jquery Core Js -->
<script src="<?=base_url('design/assets/bundles/libscripts.bundle.js'); ?>"></script>

</body>
</html>