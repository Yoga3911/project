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

        <form action="<?= BASEURL; ?>auth/login" method="POST">
            <div class="email mb-3">
                <!--EMAIL-->
                <center>
                    <label for="email_l" class="form-label"></label>
                    <input name="email_l" required name="email_l" type="email" class="form-control" placeholder="Email" id="email_l" aria-describedby="emailHelp">
                </center>
            </div>

            <div class="password mb-3">
                <!--PASSWORD-->
                <center>
                    <label for="password_l" class="form-label"></label>
                    <input name="password_l" required name="password_l" type="password" class="form-control" placeholder="Password" id="password_l">
                </center>
            </div>

            <center>
                <p class='forgot'> Forgot your password?</p>
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

        <form>
            <div class="username mb-3">
                <!--USERNAME-->
                <center>
                    <label for="username_r" class="form-label"></label>
                    <input name="username_r" type="email" class="form-control" placeholder="Username" id="username_r" aria-describedby="emailHelp">
                </center>
            </div>

            <div class="email mb-3">
                <!--EMAIL-->
                <center>
                    <label for="email_r" class="form-label"></label>
                    <input name="email_r" type="email" class="form-control" placeholder="Email" id="email_r" aria-describedby="emailHelp">
                </center>
            </div>

            <div class="password mb-3">
                <!--PASSWORD-->
                <center>
                    <label for="password_r" class="form-label"></label>
                    <input name="password_r" type="password" class="form-control" placeholder="Password" id="password_r">
                </center>
            </div>

            <div class="password mb-3">
                <!--CONFIRM PASSWORD-->
                <center>
                    <label for="password2_r" class="form-label"></label>
                    <input name="password2_r" type="password" class="form-control" placeholder="Confirm password" id="password2_r">
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