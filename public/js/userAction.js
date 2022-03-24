async function postData(url = "", data = {}) {
    // Default options are marked with *
    const response = await fetch(url, {
        method: "POST", // *GET, POST, PUT, DELETE, etc.
        mode: "cors", // no-cors, *cors, same-origin
        cache: "no-cache", // *default, no-cache, reload, force-cache, only-if-cached
        credentials: "same-origin", // include, *same-origin, omit
        headers: {
            // 'Content-Type': 'application/json'
            "Content-Type": "application/x-www-form-urlencoded",
        },
        redirect: "follow", // manual, *follow, error
        referrerPolicy: "no-referrer", // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
        body: JSON.stringify(data), // body data type must match "Content-Type" header
    });
    return response.json(); // parses JSON response into native JavaScript objects
}

async function deleteUser(url = "") {
    const response = await fetch(url, {
        method: "DELETE",
        mode: "cors",
        cache: "no-cache",
        credentials: "same-origin",
        headers: {
            "Content-Type": "application/json",
        },
        redirect: "follow",
        referrerPolicy: "no-referrer",
    });
    return response.json();
}

function confirmPopup() {
    Swal.fire({
        title: "title",
        showDenyButton: false,
        showCancelButton: true,
        confirmButtonText: "Save",
        denyButtonText: `Don't save`,
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire("Saved!", "", "success");
        } else if (result.isDenied) {
            Swal.fire("Changes are not saved", "", "info");
        }
    });
}

window.onload = function () {
    editBtns = document.querySelectorAll(".action-edit");
    deleteBtns = document.querySelectorAll(".action-delete");

    editBtns.forEach((editBtn) => {
        editBtn.addEventListener("click", function (e) {
            e.preventDefault();
            console.log(this.getAttribute("data-id"));
        });
    });

    deleteBtns.forEach((deleteBtn) => {
        deleteBtn.addEventListener("click", function (e) {
            e.preventDefault();
            userId = this.getAttribute("data-id");
            rowElement = this.closest("tr");
            userData = rowElement.children;
            Swal.fire({
                icon: "warning",
                title: `Delete user: ${userId}`,
                showDenyButton: false,
                showCancelButton: true,
                confirmButtonText: "Delete",
                confirmButtonColor: '#d33',
                timer: 5000,
                timerProgressBar: true,
                denyButtonText: ``,
                html: `<table class="mx-auto" style="text-align:left">
                        <tr><td class="pe-2"><strong>Full Name:</strong></td><td>${userData[1].innerHTML}</td></tr>
                        <tr><td class="pe-2"><strong>Email Address:</strong></td><td>${userData[2].innerHTML}</td></tr>
                        <tr><td class="pe-2"><strong>Created Date:</strong></td><td>${userData[3].innerHTML}</tr></td></table>`,
            }).then((result) => {
                if (result.isConfirmed) {
                    deleteUser(`api/users/${userId}`).then((data) => {
                        if (data.success){
                            rowElement.remove();
                            Swal.fire(`Delete Success`, "", "success");
                        }
                    });
                }
            });
        });
    });
};

//   postData('https://example.com/answer', { answer: 42 })
//   .then(data => {
//     console.log(data); // JSON data parsed by `data.json()` call
//   });
