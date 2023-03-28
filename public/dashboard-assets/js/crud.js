function post(url, data, buttonId, redirectTo, formId) {
    if (buttonId != undefined)
        document.getElementById(buttonId).disabled = true;
    axios
        .post(url, data)
        .then((response) => {
            if (formId != undefined) {
                document.getElementById(formId).reset();
            }
            Toast.fire({
                icon: "success",
                title: response.data.message,
            });
            if (redirectTo != undefined) {
                setTimeout(() => {
                    window.location.href = redirectTo;
                }, 700);
            } else {
                if (buttonId != undefined)
                    document.getElementById(buttonId).disabled = false;
            }
        })
        .catch((error) => {
            Toast.fire({
                icon: "error",
                title: error.response.data.message,
            });
            if (buttonId != undefined)
                document.getElementById(buttonId).disabled = false;
        });
}

function put(url, data, buttonId, redirectTo, formId) {
    if (buttonId != undefined)
        document.getElementById(buttonId).disabled = true;
    axios
        .put(url, data)
        .then((response) => {
            if (formId != undefined) {
                document.getElementById(formId).reset();
            }
            Toast.fire({
                icon: "success",
                title: response.data.message,
            });
            if (redirectTo != undefined) {
                setTimeout(() => {
                    window.location.href = redirectTo;
                }, 700);
            } else {
                if (buttonId != undefined)
                    document.getElementById(buttonId).disabled = false;
            }
        })
        .catch((error) => {
            Toast.fire({
                icon: "error",
                title: error.response.data.message,
            });
            if (buttonId != undefined)
                document.getElementById(buttonId).disabled = false;
        });
}

const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
        confirmButton: "btn btn-success",
        cancelButton: "btn btn-danger",
    },
    buttonsStyling: false,
});

function deleteItem(url, ref, locale) {
    if (locale == "en") {
        swalWithBootstrapButtons
            .fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                reverseButtons: true,
            })
            .then((result) => {
                if (result.isConfirmed) {
                    performDelete(url, ref, locale);
                }
            });
    } else {
        swalWithBootstrapButtons
            .fire({
                title: "هل أنت متأكد من الحذف؟",
                text: "لا يمكن الترجاع عن عمليات الحذف!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "حذف",
                cancelButtonText: "إلغاء",
                reverseButtons: true,
            })
            .then((result) => {
                if (result.isConfirmed) {
                    performDelete(url, ref, locale);
                }
            });
    }
}

function performDelete(url, ref, locale) {
    axios
        .delete(url)
        .then((response) => {
            ref.closest("tr").remove();
            if(locale == 'en') {
                swalWithBootstrapButtons.fire(
                    "Deleted!",
                    response.data.message,
                    "success"
                );
            } else {
                swalWithBootstrapButtons.fire(
                    "تم الحذف",
                    response.data.message,
                    "success"
                );
            }
        })
        .catch((error) => {
            swalWithBootstrapButtons.fire(
                "حذف خلل",
                error.response.data.message,
                "error"
            );
        });
}
