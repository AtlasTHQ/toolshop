<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
    <ul id="login-dp" class="dropdown-menu">
        <li>
            <div class="row">
                <div class="col-md-12">
                    <form class="form" role="form" method="post" action="login.php" accept-charset="UTF-8" id="login-nav">
                        <div class="form-group">
                            <label class="sr-only" for="username">Username</label>
                            <input type="username" name="log_username" class="form-control" id="log_username" placeholder="Username" required>
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="password">Password</label>
                            <input type="password" name="log_password" class="form-control" id="log_password" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <button name="loginUser" type="submit" class="btn btn-primary btn-block">Log in</button>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> keep me logged-in
                            </label>
                        </div>
                    </form>
                </div>
                <div class="bottom text-center">
                    New here ? <a data-toggle="modal" data-target="#myModal"><b>Join Us</b></a>
                </div>
            </div>
        </li>
    </ul>
</li>