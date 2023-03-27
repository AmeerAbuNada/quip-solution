"use strict";
var KTAccountSettingsSigninMethods = {
    init: function () {
        var t, e;
        !(function () {
            var t = document.getElementById("kt_signin_email"),
                e = document.getElementById("kt_signin_email_edit"),
                n = document.getElementById("kt_signin_password"),
                o = document.getElementById("kt_signin_password_edit"),
                i = document.getElementById("kt_signin_email_button"),
                s = document.getElementById("kt_signin_cancel"),
                r = document.getElementById("kt_signin_password_button"),
                a = document.getElementById("kt_password_cancel");
            i.querySelector("button").addEventListener("click", function () {
                l();
            }),
                s.addEventListener("click", function () {
                    l();
                }),
                r
                    .querySelector("button")
                    .addEventListener("click", function () {
                        d();
                    }),
                a.addEventListener("click", function () {
                    d();
                });
            var l = function () {
                    t.classList.toggle("d-none"),
                        i.classList.toggle("d-none"),
                        e.classList.toggle("d-none");
                },
                d = function () {
                    n.classList.toggle("d-none"),
                        r.classList.toggle("d-none"),
                        o.classList.toggle("d-none");
                };
        })(),
            (e = document.getElementById("kt_signin_change_email")),
            (t = FormValidation.formValidation(e, {
                fields: {
                    emailaddress: {
                        validators: {
                            notEmpty: { message: "Email is required" },
                            emailAddress: {
                                message:
                                    "The value is not a valid email address",
                            },
                        },
                    },
                    confirmemailpassword: {
                        validators: {
                            notEmpty: { message: "Password is required" },
                        },
                    },
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: ".fv-row",
                    }),
                },
            })),
            e
                ,
            (function (t) {
                var e,
                    n = document.getElementById("kt_signin_change_password");
                (e = FormValidation.formValidation(n, {
                    fields: {
                        currentpassword: {
                            validators: {
                                notEmpty: {
                                    message: "Current Password is required",
                                },
                            },
                        },
                        newpassword: {
                            validators: {
                                notEmpty: {
                                    message: "New Password is required",
                                },
                            },
                        },
                        confirmpassword: {
                            validators: {
                                notEmpty: {
                                    message: "Confirm Password is required",
                                },
                                identical: {
                                    compare: function () {
                                        return n.querySelector(
                                            '[name="newpassword"]'
                                        ).value;
                                    },
                                    message:
                                        "The password and its confirm are not the same",
                                },
                            },
                        },
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        bootstrap: new FormValidation.plugins.Bootstrap5({
                            rowSelector: ".fv-row",
                        }),
                    },
                })),
                    n
                        .querySelector("#kt_password_submit")
                        .addEventListener("click", function (t) {
                            
                        });
            })();
    },
};
KTUtil.onDOMContentLoaded(function () {
    KTAccountSettingsSigninMethods.init();
});
