<section class="track-area login-page-bg">
    <div class="container">
        <div class="row justify-content-center py-5">
            <div class="col-xl-5 col-lg-5">
                <div class="card bg-body-tertiary border-0 auth-card">
                    <div class="card-header bg-body-tertiary border-0 p-5 pb-0">
                        <div class="d-flex flex-column align-items-center gap-3">
                            <div>
                                <p class="fs-5 mb-1 text-center mt-50">SE CONNECTER A MON COMPTE</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-5 pt-3 mt-50 mb-80">
                        <form method="POST" action="{{route('customer.login')}}" accept-charset="UTF-8"
                            id="botble-ecommerce-forms-fronts-auth-login-form" class="js-base-form dirty-check"
                            icon="ti ti-lock" heading="Login to your account"
                            description="Your personal data will be used to support your experience throughout this website, to manage access to your account."
                            novalidate="novalidate">
                            {{ csrf_field() }}

                            <div class="mb-3 mt-30 position-relative">
                                <div class="position-relative">
                                    <div class="login-input-container">
                                        <input type="email" name="email" class="login-input-field" required>
                                        <label for="email" class="login-input-label">adresse mail</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-50 mt-30 position-relative">
                                <div class="position-relative">
                                    <div class="login-input-container">
                                        <input type="password" name="password" class="login-input-field" required>
                                        <label for="email" class="login-input-label">mot de passe</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-30 mt-1">
                                <div class="col text-center">
                                    <a href="{{route('customer.password.reset')}}" class="fs-6">
                                        mot de passe oublié?
                                    </a>
                                </div>
                            </div>
                            <div class="text-center">
                                <button class="btn-login" type="submit">SE CONNECTER</button>
                            </div>
                            <hr style="width: 60%; margin: 20px auto;">
                            <div class="text-center">
                                <a href="{{route('customer.register')}}" class="btn-login">CREER MON COMPTE</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
