var mainModal = null;
"use strict";
var KTUsersAddUser = (function () {
    const t = document.getElementById("kt_modal_add_user"),
        e = t.querySelector("#kt_modal_add_user_form"),
        n = new bootstrap.Modal(t);
        mainModal = n;
    return {
        init: function () {
            (() => {
                var o = FormValidation.formValidation(e, {
                    fields: {
                        
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        bootstrap: new FormValidation.plugins.Bootstrap5({
                            rowSelector: ".fv-row",
                            eleInvalidClass: "",
                            eleValidClass: "",
                        }),
                    },
                });
                const i = t.querySelector(
                    '[data-kt-users-modal-action="submit"]'
                );
                
                    t
                        .querySelector('[data-kt-users-modal-action="cancel"]')
                        .addEventListener("click", (t) => {
                            t.preventDefault(),
                            n.hide()
                        }),
                    t
                        .querySelector('[data-kt-users-modal-action="close"]')
                        .addEventListener("click", (t) => {
                            t.preventDefault(),
                            n.hide()
                        });
            })();
        },
    };
})();
KTUtil.onDOMContentLoaded(function () {
    KTUsersAddUser.init();
});
