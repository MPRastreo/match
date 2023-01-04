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

    'use strict'
    const formsAssign = document.querySelectorAll('.needs-validation-assign')
    Array.from(formsAssign).forEach(form => {
        form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
                form.classList.add('was-validated');
            } else {
                event.preventDefault();
                form.classList.remove('was-validated');
                assignQuotation();
            }

        }, false)
    });
})()

$(document).ready(function () {
    $("#txtSpecialty").on('click', function () {

        if ($('#txtSpecialty').val() == "Another") {

            $("#txtSpecify").show();
            $("#txtSpecifyLabel").show();

            document.getElementById('txtSpecify').required = true;

            return false;
        }

        $("#txtSpecify").hide();
        $("#txtSpecifyLabel").hide();

        document.getElementById('txtSpecify').required = false;

        return false;
    });
});

const addQuotation = () => {
    const txtSpecialty = document.getElementById('txtSpecialty').value;
    const txtDate = document.getElementById('txtDate').value;
    const txtFamilyMembers = document.getElementById('txtFamilyMembers').value;
    const floatingTextarea = document.getElementById('floatingTextarea').value;
    const txtFamilyFrom = document.getElementById('txtFamilyFrom').value;

    let specialy = "";

    if (txtSpecialty == "Another") {

        specialy = document.getElementById('txtSpecify').value;
    }else{

        specialy = txtSpecialty;
    }

    data = {
        specialy: specialy,
        date: txtDate,
        familyMembers: txtFamilyMembers,
        familyFrom: txtFamilyFrom,
        reason: floatingTextarea,
        status: "Requested",
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

const deleteAppointment = (id) =>
{

    Swal.fire({
        icon: 'warning',
        title: '¿Are you sure?',
        text: 'This action can not be undone',
        showCancelButton: true,
        confirmButtonText: 'Yes',
        cancelButtonText: 'Cancel'
    })
    .then((result) =>
    {
        if (result.isConfirmed)
        {
            data =
            {
                id: id,
                _token: $('meta[name="csrf-token"]').attr('content')
            }

            fetch('/quotation/delete/' + id,
            {
                headers:
                {
                    "Content-Type": "application/json",
                }
            }).then((resp) => resp.json())
            .then(function (data)
            {
                if (data.result != null)
                {
                    Swal.fire({
                    icon: 'success',
                    title: data.title,
                    text: data.result
                    }).then((result) =>
                    {
                        if(result.isConfirmed)
                        {
                            window.location = '/quotation';
                        }
                    });
                }
                if (data.warning != null)
                {
                    Swal.fire({
                        icon: 'warning',
                        title: data.title,
                        text: data.warning
                    });
                }
                else if(data.error != null)
                {
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
            )
        }
    });
}

const openModalAssign = (id) => {

    $("#assignQuotation").modal("show");

    $('#txtId').val(id);
}

const assignQuotation = () => {

    const txtName = document.getElementById('txtName').value;
    const txtMail = document.getElementById('txtMail').value;
    const txtPhone = document.getElementById('txtPhone').value;
    const txtClinicName = document.getElementById('txtClinicName').value;
    const txtAddress = document.getElementById('txtAddress').value;
    const txtId = document.getElementById('txtId').value;

    data = {
        name: txtName,
        mail: txtMail,
        phone: txtPhone,
        clinicName: txtClinicName,
        address: txtAddress,
        _id: txtId,
        _token: $('meta[name="csrf-token"]').attr('content')
    }

    fetch('/quotation/assign', {
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

const seeDetails = (id) => {

    var quotation = arrayQuotations.find(x => x._id == id);

    $('#txtDoctorSee').val(quotation.infoQuotation.name);
    $('#txtMailSee').val(quotation.infoQuotation.mail);
    $('#txtPhoneSee').val(quotation.infoQuotation.phone);
    $('#txtClinicNameSee').val(quotation.infoQuotation.clinicName);
    $('#txtAddressSee').val(quotation.infoQuotation.address);

    $('#seeQuotation').modal('show');
}

const generateToken = _id =>
{
    const data =
    {
        _id: _id,
    };

    fetch('/generatetoken',
    {
        method: 'POST',
        headers:
        {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
        },
        body: JSON.stringify(data)
    }).then(resp => resp.json())
    .then(({token, text, error}) =>
    {
        if (token != null)
        {
            copyText(token, text);
        }
        else if (error != null)
        {
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
            title: '¡Error!',
            text: 'An error occurred, please try again'
        })
    );
}

const copyText = (token, text) =>
{
    const Toast = Swal.mixin
    ({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: toast =>
        {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    navigator.clipboard.writeText(token).then(
    () =>
    {
        Toast.fire
        ({
            icon: 'success',
            title: text
        })
    },
    () => {}
  );
}
