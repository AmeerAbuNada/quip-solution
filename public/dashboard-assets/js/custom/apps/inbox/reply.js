"use strict";
var replyEditor = null;
var KTAppInboxReply = (function () {
    const e = (e) => {
                
        },
        t = (e) => {
            
            
        },
        a = (e) => {
            var t,
                a = new Tagify(e, {
                    tagTextProp: "name",
                    enforceWhitelist: !0,
                    skipInvalid: !0,
                    dropdown: {
                        closeOnSelect: !1,
                        enabled: 0,
                        classname: "users-list",
                        searchKeys: ["name", "email"],
                    },
                    templates: {
                        tag: function (e) {
                            return `\n                <tag title="${
                                e.title || e.email
                            }"\n                        contenteditable='false'\n                        spellcheck='false'\n                        tabIndex="-1"\n                        class="${
                                this.settings.classNames.tag
                            } ${
                                e.class ? e.class : ""
                            }"\n                        ${this.getAttributes(
                                e
                            )}>\n                    <x title='' class='tagify__tag__removeBtn' role='button' aria-label='remove tag'></x>\n                    <div class="d-flex align-items-center">\n                        <div class='tagify__tag__avatar-wrap ps-0'>\n                            <img onerror="this.style.visibility='hidden'" class="rounded-circle w-25px me-2" src="${hostUrl}media/${
                                e.avatar
                            }">\n                        </div>\n                        <span class='tagify__tag-text'>${
                                e.name
                            }</span>\n                    </div>\n                </tag>\n            `;
                        },
                        dropdownItem: function (e) {
                            return `\n                <div ${this.getAttributes(
                                e
                            )}\n                    class='tagify__dropdown__item d-flex align-items-center ${
                                e.class ? e.class : ""
                            }'\n                    tabindex="0"\n                    role="option">\n\n                    ${
                                e.avatar
                                    ? `\n                            <div class='tagify__dropdown__item__avatar-wrap me-2'>\n                                <img onerror="this.style.visibility='hidden'"  class="rounded-circle w-50px me-2" src="${hostUrl}media/${e.avatar}">\n                            </div>`
                                    : ""
                            }\n\n                    <div class="d-flex flex-column">\n                        <strong>${
                                e.name
                            }</strong>\n                        <span>${
                                e.email
                            }</span>\n                    </div>\n                </div>\n            `;
                        },
                    },
                });
            a.on("dropdown:show dropdown:updated", function (e) {
                var n = e.detail.tagify.DOM.dropdown.content;
                a.suggestedListItems.length > 1 &&
                    ((t = a.parseTemplate("dropdownItem", [
                        {
                            class: "addAll",
                            name: "Add all",
                            email:
                                a.settings.whitelist.reduce(function (e, t) {
                                    return a.isTagDuplicate(t.value)
                                        ? e
                                        : e + 1;
                                }, 0) + " Members",
                        },
                    ])),
                    n.insertBefore(t, n.firstChild));
            }),
                a.on("dropdown:select", function (e) {
                    e.detail.elm == t && a.dropdown.selectAll.call(a);
                });
        },
        n = (e) => {
            replyEditor = new Quill("#kt_inbox_form_editor", {
                modules: {
                    toolbar: [
                        [{ header: [1, 2, !1] }],
                        ["bold", "italic", "underline"],
                        ["image", "code-block"],
                    ],
                },
                placeholder: "",
                theme: "snow",
            });
            const t = e.querySelector(".ql-toolbar");
            if (t) {
                const e = [
                    "px-5",
                    "border-top-0",
                    "border-start-0",
                    "border-end-0",
                ];
                t.classList.add(...e);
            }
        };        
    return {
        init: function () {
            document
                .querySelectorAll('[data-kt-inbox-message="message_wrapper"]')
                .forEach((e) => {
                    const t = e.querySelector(
                            '[data-kt-inbox-message="header"]'
                        ),
                        a = e.querySelector(
                            '[data-kt-inbox-message="preview"]'
                        ),
                        n = e.querySelector(
                            '[data-kt-inbox-message="details"]'
                        ),
                        
                        r = new bootstrap.Collapse(o, { toggle: !1 });
                    t.addEventListener("click", (e) => {
                        e.target.closest('[data-kt-menu-trigger="click"]') ||
                            e.target.closest(".btn") ||
                            (a.classList.toggle("d-none"),
                            n.classList.toggle("d-none"),
                            r.toggle());
                    });
                }),
                (() => {
                    const r = document.querySelector("#kt_inbox_reply_form"),
                        l = r.querySelectorAll('[data-kt-inbox-form="tagify"]');
                    e(r),
                        t(r),
                        l.forEach((e) => {
                            a(e);
                        }),
                        n(r);
                })();
        },
    };
})();
KTUtil.onDOMContentLoaded(function () {
    KTAppInboxReply.init();
});
