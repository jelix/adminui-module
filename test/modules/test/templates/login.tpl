<p class="login-box-msg">Sign in to start your session</p>

<form action="{jurl 'test~default:logincheck'}" method="post">
    <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="login - any string for test">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password - any string for test">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    </div>
    <div class="row">
        <div class="col-xs-8">
            <div class="checkbox form-group">
                <label>
                    <input type="checkbox"> Remember Me
                </label>
            </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
    </div>
</form>

<a href="#">I forgot my password</a><br>
<a href="#" class="text-center">Register a new membership</a>
