import $ from 'jquery';
import Swiper from 'swiper';

const validateEmail = (email) => {
    return email.match(
        /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
    );
};

$(document).ready(function () {
    $('.book-appointment-form').submit(function (e) {
        e.preventDefault();

        const currentForm = this;
        $(currentForm).find('.form-item-wrap').removeClass('no-valid');
        $(currentForm).parent().find('.error-msg').remove();
        $(currentForm).parent().find('.success-msg').remove();

        const errors = [];
        const button = $(currentForm).find('button');

        // Form fields
        const nameField = $(currentForm).find('input[name=full-name]');
        const emailField = $(currentForm).find('input[name=email]');
        const departmentField = $(currentForm).find('select[name=department]');
        const timeField = $(currentForm).find('select[name=time]');

        // Values
        const nameValue = $(nameField).val().trim();
        const emailValue = $(emailField).val().trim();
        const departmentValue = $(departmentField).val().trim();
        const timeValue = $(timeField).val().trim();
        const messageValue = $(currentForm).find('textarea[name=message]').val();

        if (!nameValue) {
            errors.push({
                selector: nameField,
                msg: 'This field is required.'
            });
        }

        if (!validateEmail(emailValue)) {
            errors.push({
                selector: emailField,
                msg: 'This should be valid email.'
            });
        }

        if (!departmentValue) {
            errors.push({
                selector: departmentField,
                msg: 'This field is required.'
            });
        }

        if (!timeValue) {
            errors.push({
                selector: timeField,
                msg: 'This field is required.'
            });
        }

        if (!errors.length) {
            $.ajax({
                url: ajax.url,
                type: 'POST',
                dataType: 'json',
                data: {
                    action: 'appointment_form',
                    _nonce: ajax.nonce,
                    name: nameValue,
                    email: emailValue,
                    department: departmentValue,
                    time: timeValue,
                    message: messageValue,
                },
                beforeSend: function (xhr) {
                    $(button).prop('disabled', true);
                    $(button).addClass('loading');
                },
                success: function (res) {
                    if(res.status === 'ok'){
                        currentForm.reset();
                        $(currentForm).after(`<div class="success-msg form-msg">Thank you for submit.</div>`);
                    }else{
                        $(currentForm).after(`<div class="error-msg form-msg">${res.msg}</div>`);
                    }
                },
                complete: function () {
                    $(button).removeClass('loading');
                    $(button).prop('disabled', false);
                }
            });
        } else {
            errors.forEach(err => {
                $(err.selector).closest('.form-item-wrap').addClass('no-valid');
                $(err.selector).closest('.form-item-wrap').append(`<span class="error-msg">${err.msg}</span>`);
            });
        }
    });

    const swiper = new Swiper(".swiper", {
        slidesPerView: 3,
        spaceBetween: 30,
        grabCursor: true,
        enabled: true,
        loop: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        breakpoints: {
            320: {
                slidesPerView: 1,
                spaceBetween: 0,
            },
            525: {
                slidesPerView: 2,
                spaceBetween: 30,
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 30,
            }
        }
    });
});
