<p class="login-box-msg"></p>
<form action="{jurl 'test~default:recoverpassword'}" method="post">
    <div class="input-group mb-3">
        <input type="email" class="form-control" placeholder="Email">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-envelope"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Request new password</button>
        </div>

    </div>
</form>
<p class="mt-3 mb-1">
    <a href="{jurl 'test~default:login'}">Login</a>
</p>