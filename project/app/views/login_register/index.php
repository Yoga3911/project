<div class='row align-items-center sign-in'>
    <div class='login-txt col-md-7'>
        <!--COL 1 (SIGN IN FORM)-->
        <center>
            <img width='400px' src="<?= BASEURL; ?>images/sign_in_to_arjuna.png" class="" alt="login">
            <!--text : Sign in to Arjuna-->
        </center>
        <center>
            <img width='100px' src="<?= BASEURL; ?>images/fb_google.png" class="" alt="login">
            <!--logo fb & google-->
        </center>
        <p class='login-message my-3'>Or use your email account :</p>
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
            </symbol>
            <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
            </symbol>
            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
            </symbol>
        </svg>
        <?php if (isset($_COOKIE['isEmail'])) : ?>
            <div class="col-md-8">
                <?php Flasher::flashAuth() ?>
            </div>
        <?php elseif (isset($_COOKIE['isPassword'])) : ?>
            <div class="col-md-8">
                <?php Flasher::flashAuth() ?>
            </div>
        <?php elseif (isset($_COOKIE['ubahPassword'])) : ?>
            <div class="col-md-8">
                <?php Flasher::flashForgot() ?>
            </div>
        <?php endif ?>
        <form action="<?= BASEURL; ?>auth/login" method="POST" class="cont" style="width: 68%;">
            <div class="email mb-3">
                <!--EMAIL-->
                <!-- <center> -->
                <label for="email_l" class="form-label"></label>
                <input name="email_l" required name="email_l" type="email" class="form-control" placeholder="Email" id="email_l" aria-describedby="emailHelp">
                <!-- </center> -->
            </div>

            <div class="password mb-3">
                <!--PASSWORD-->
                <label for="password_l" class="form-label"></label>
                <input name="password_l" required name="password_l" type="password" class="form-control" placeholder="Password" id="password_l">
            </div>
            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck" name="check" value="true">
                    <label class="form-check-label" for="gridCheck">
                        Remember me
                    </label>
                </div>
            </div>
            <center>
                <a class='forgot' data-bs-toggle="modal" data-bs-target="#formModalPassword"> Forgot your password?</a>
                <div class="about-border"></div>
                <!--divider (line pemisah)-->
                <button name="signin" type="submit" class="submit-button">SIGN IN</button>
            </center>
        </form>
    </div>
    <!--END OF COL 1-->

    <div class='sign-in-pic col-md-5 side-content'>
        <!--COL 2 (HELLO BATIK LOVERS)-->
        <img src="<?= BASEURL; ?>images/batik2.png" class='img-fluid' alt='sign-in'>
        <h2 class="paraf">HELLO, BATIK LOVERS!</h2>
        <p class="paraf2">Don't have an account?</p>
        <p class="paraf3">Sign Up Free!</p>
        <button class="submit-button-side" id="btn">SIGN UP</button>
    </div>

</div>
<!--END OF ROW-->
<div class='row align-items-center sign-up'>

    <div class='sign-in-pic col-md-5 side-content2'>
        <!--COL 2 (WELCOME BACK!)-->
        <img src="<?= BASEURL; ?>images/batik2.png" class='img-fluid' alt='sign-in'>
        <h2 class="paraf_2">WELCOME BACK!</h2>
        <p class="paraf2_2">To keep connected with us please</p>
        <p class="paraf3_2">login with your personal info</p>
        <button class="submit-button-side" id="btn_2">SIGN IN</button>
    </div>
    <!--END OF COL 2-->

    <div class='login-txt col-md-7'>
        <!--COL 1 (SIGN IN FORM)-->
        <center>
            <img width='320px' src="<?= BASEURL; ?>images/create_account.png" class="" alt="login">
            <!--text : Sign in to Arjuna-->
        </center>
        <center>
            <img width='90px' src="<?= BASEURL; ?>images/fb_google.png" class="" alt="login">
            <!--logo fb & google-->
        </center>
        <p class='login-message my-3'>Or use your email account for your registration:</p>

        <form action="<?= BASEURL; ?>auth/register" method="POST">
            <div class="username mb-3">
                <!--USERNAME-->
                <center>
                    <label for="username_r" class="form-label"></label>
                    <input required name="username_r" type="text" class="form-control" placeholder="Username" id="username_r" aria-describedby="emailHelp">
                </center>
            </div>

            <div class="email mb-3">
                <!--EMAIL-->
                <center>
                    <label for="email_r" class="form-label"></label>
                    <input required name="email_r" type="email" class="form-control" placeholder="Email" id="email_r" aria-describedby="emailHelp">
                </center>
            </div>

            <div class="password mb-3">
                <!--PASSWORD-->
                <center>
                    <label for="password_r" class="form-label"></label>
                    <input required name="password_r" type="password" class="form-control" placeholder="Password" id="password_r">
                    <div class="level mt-3">
                        <span id="StrengthDisp" class="badge displayBadge">Weak</span>
                    </div>
                </center>
            </div>

            <div class="password mb-3">
                <!--CONFIRM PASSWORD-->
                <center>
                    <label for="password2_r" class="form-label"></label>
                    <input required name="password2_r" type="password" class="form-control" placeholder="Confirm password" id="password2_r">
                </center>
            </div>

            <center>
                <div class="about-border"></div>
                <!--divider (line pemisah)-->
                <button name="signup" type="submit" class="submit-button">SIGN UP</button>
            </center>
        </form>
    </div>
    <!--END OF COL 1-->
</div>
<!--END OF ROW-->

<!-- Modal -->
<div class="modal fade" id="formModalPassword" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Buat Password Baru</h5>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= BASEURL; ?>auth/cekData">
                    <div class="row">
                        <div class="col">
                            <label for="username_c" class="form-label">Username</label>
                            <input name="username_c" type="text" class="form-control" id="username_c" required>
                        </div>
                        <div class="col">
                            <label for="email_c" class="form-label">Email</label>
                            <input name="email_c" type="text" class="form-control" id="email_c" required>
                        </div>
                    </div>
                    <div class="col">
                        <label for="password_c" class="form-label">Password baru</label>
                        <input name="password_c" type="password" class="form-control" id="password_c" required>
                        <label for="password2_c" class="form-label">Konfirmasi password</label>
                        <input name="password2_c" type="password" class="form-control" id="password2_c" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary" id="btnUbah" name="ubahPassword" data-id="<?= $produk['id'] ?>">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>