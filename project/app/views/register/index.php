<div class='row align-items-center'>

    <div class='sign-in-pic col-md-5'>
        <!--COL 2 (WELCOME BACK!)-->
        <img src="<?= BASEURL; ?>images/batik2.png" class='img-fluid' alt='sign-in'>
        <h2 class="paraf">WELCOME BACK!</h2>
        <p class="paraf2">To keep connected with us please</p>
        <p class="paraf3">login with your personal info</p>
        <a href="<?= BASEURL; ?>login"><button type="submit" class="submit-button-side btn">SIGN IN</button></a>
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
                    <label for="exampleInputEmail1" class="form-label"></label>
                    <input type="email" class="form-control" placeholder="Username" id="input-email" aria-describedby="emailHelp">
                </center>
            </div>

            <div class="email mb-3">
                <!--EMAIL-->
                <center>
                    <label for="exampleInputEmail1" class="form-label"></label>
                    <input type="email" class="form-control" placeholder="Email" id="input-email" aria-describedby="emailHelp">
                </center>
            </div>

            <div class="password mb-3">
                <!--PASSWORD-->
                <center>
                    <label for="exampleInputPassword1" class="form-label"></label>
                    <input type="password" class="form-control" placeholder="Password" id="input-pass">
                </center>
            </div>

            <div class="password mb-3">
                <!--CONFIRM PASSWORD-->
                <center>
                    <label for="exampleInputPassword1" class="form-label"></label>
                    <input type="password" class="form-control" placeholder="Confirm password" id="input-pass">
                </center>
            </div>

            <center>
                <div class="about-border"></div>
                <!--divider (line pemisah)-->
                <button type="submit" class="submit-button">SIGN UP</button>
            </center>
        </form>
    </div>
    <!--END OF COL 1-->

</div>
<!--END OF ROW-->