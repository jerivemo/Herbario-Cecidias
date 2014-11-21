<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login - Admin Herbario Cecidias </title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>/tools/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>/tools/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url(); ?>/tools/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Administration Herbario Cecidias</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" id="login" action="<?php echo base_url();?>index.php/login" method="post" accept-charset="utf-8">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" required placeholder="User Name" name="userName" type="text" autofocus value="<?php  if (isset($error)){ echo $error['user'];}else {echo "";}?>">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" required placeholder="Password" name="password" type="password" value="<?php  if (isset($error)){ echo $error['password'];}else {echo "";}?>">
                                </div>
                                <?php
                                    if (isset($error)){
                                        if ($error['error']==true){
                                        echo '<div class="form-group"><div class="alert alert-danger alert-dismissible" style="padding: 6px;margin-bottom: 0px;" role="alert"><strong>Error!</strong> '.$error['msgError'].'.</div></div>';
                                        }
                                    }
                                ?>
                                <button type="submit" class="btn btn-lg btn-success btn-block" id="btnLogin">
                            Sign in</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery Version 1.11.0 -->
    <script src="<?php echo base_url(); ?>/tools/js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>/tools/js/bootstrap.min.js"></script>

</body>

</html>
