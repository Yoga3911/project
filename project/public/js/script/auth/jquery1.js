$(document).ready(function () {

    $('body').css('opacity', 1)
    $('.sign-up').hide();
    $('#btn_2').click(function () {
        $('.sign-up').hide();
        $('.sign-in').show();
        $('.side-content2').css('opacity', 0)
        $('.side-content').css('opacity', 1)
    })

    $('#btn').click(function () {
        $('.sign-in').hide();
        $('.sign-up').show();
        $('.side-content2').css('opacity', 1)
        $('.side-content').css('opacity', 0)
    })

    // Ini untuk modal ganti password
    // $('#btnLanjut').click(function () {
    //     $('.passwordBaru').css('display', 'block');
    //     $('.lanjut').hide();
    //     const id = $(this).data('id');

    //     $.ajax({
    //         url: 'http://localhost/mvc/project/public/auth/getUbah',
    //         data: { id: id },
    //         method: 'post',
    //         dataType: 'json',
    //         success: function (data) {
    //             console.log(data.username);
    //         }
    //     })
    // })
    // timeout before a callback is called

    let timeout;

    // traversing the DOM and getting the input and span using their IDs

    let password = document.getElementById('password_r')
    let strengthBadge = document.getElementById('StrengthDisp')

    // The strong and weak password Regex pattern checker

    let strongPassword = new RegExp('(?=.*[A-Z])(?=.*[0-9])(?=.{10,})')
    let strongPassword2 = new RegExp('(?=.*[a-z])(?=.*[0-9])(?=.{10,})')
    let mediumPassword = new RegExp('(?=.*[a-z])(?=.*[0-9])(?=.{6,})')
    let mediumPassword2 = new RegExp('(?=.*[A-Z])(?=.*[0-9])(?=.{6,})')
    function StrengthChecker(PasswordParameter) {
        // $('.displayBadge').css('display', 'block');
        // We then change the badge's color and text based on the password strength

        if (strongPassword.test(PasswordParameter) || strongPassword2.test(PasswordParameter)) {
            strengthBadge.style.backgroundColor = "green"
            strengthBadge.textContent = 'Strong'
        } else if (mediumPassword.test(PasswordParameter) || mediumPassword2.test(PasswordParameter)) {
            strengthBadge.style.backgroundColor = 'blue'
            strengthBadge.textContent = 'Medium'
        } else {
            strengthBadge.style.backgroundColor = 'red'
            strengthBadge.textContent = 'Weak'
        }
    }

    // Adding an input event listener when a user types to the  password input 

    password.addEventListener("input", () => {

        //The badge is hidden by default, so we show it

        strengthBadge.style.display = 'block'
        clearTimeout(timeout);

        //We then call the StrengChecker function as a callback then pass the typed password to it

        timeout = setTimeout(() => StrengthChecker(password.value), 100);

        //Incase a user clears the text, the badge is hidden again

        if (password.value.length !== 0) {
            strengthBadge.style.display != 'block'
        } else {
            strengthBadge.style.display = 'none'
        }
    });
})