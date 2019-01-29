<div class="auth-modal__tabs">
    <a class="auth-modal__tabs-link active js-tab-sign-in" href="#">Sign In</a>
    <a class="auth-modal__tabs-link js-tab-sign-up" href="#">Sign Up</a>
</div>
<div class="auth-modal__content">
    <div class="js-auth-sign-in">
        <div class="modal-form">
            <form class="js-auth-login" action="{{ route('ajax.login') }}" method="post" data-type="json">
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email" autofocus>
                    <span class="invalid-feedback js-email-error"></span>
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <span class="invalid-feedback js-password-error"></span>
                </div>
                <button type="submit" class="button button_blue">Log In</button>
                <div class="modal-form__links">
                    <a class="modal-form__forgot-password" href="#">Forgot password</a>
                </div>
            </form>
        </div>
        <div class="auth-social">
            <div class="auth-social__title">Or Log In with social</div>
            <div class="auth-social__links">
                <a class="auth-social__link" href="#">
                    @svg('facebook', 'auth-social__facebook')
                </a>
                <a class="auth-social__link" href="#">
                    @svg('linkedin', 'auth-social__linkedin')
                </a>
                <a class="auth-social__link" href="#">
                    @svg('googleplus', 'auth-social__googleplus')
                </a>
                <a class="auth-social__link" href="#">
                    @svg('twitter', 'auth-social__twitter')
                </a>
            </div>
            <div class="auth-social__text">Supported browsers</div>
        </div>
    </div>
    <div class="js-auth-sign-up hidden">
        <div class="modal-form">
            <form>
                <div class="form-group">
                    <input type="text" class="form-control" name="name" required placeholder="Name">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="Email">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password_confirmation" required placeholder="Password confirmation">
                </div>
                <button type="submit" class="button button_blue">Sign up</button>
                <div class="modal-form__links">
                    <a class="modal-form__forgot-password" href="#">Forgot password</a>
                </div>
            </form>
        </div>
    </div>
</div>