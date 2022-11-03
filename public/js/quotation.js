(() => {
    'use strict'
    const forms = document.querySelectorAll('.needs-validation')
    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
                form.classList.add('was-validated');
            } else {
                event.preventDefault();
                form.classList.remove('was-validated');
                addQuotation();
            }

        }, false)
    });
})()

const addQuotation = () => {
    const txtSpecialty = document.getElementById('txtSpecialty').value;
    const txtDate = document.getElementById('txtDate').value;
    const txtFamilyMembers = document.getElementById('txtFamilyMembers').value;
    const floatingTextarea = document.getElementById('floatingTextarea').value;

    data = {
        specialy: txtSpecialty,
        date: txtDate,
        familyMembers: txtFamilyMembers,
        reason: floatingTextarea,
        _token: $('meta[name="csrf-token"]').attr('content')
    }

    fetch('/quotation/add', {
            method: 'POST',
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify(data)
        }).then((resp) => resp.json())
        .then((data) => {
            if (data.result != null) {
                Swal.fire({
                    icon: 'success',
                    title: data.title,
                    text: data.result
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = '/quotation';
                    }
                });
            } else if (data.error != null) {
                Swal.fire({
                    icon: 'error',
                    title: data.title,
                    text: data.text
                });
            }
        }).catch(
            error =>
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'An error occurred, please try again'
            })
        );
}
