(() =>
{
    'use strict'
    const forms = document.querySelectorAll('.validation-add-user')
    Array.from(forms).forEach(form =>
    {
      form.addEventListener('submit', event =>
      {
        if (!form.checkValidity())
        {
            event.preventDefault();
            event.stopPropagation();
            form.classList.add('was-validated');
        }
        else
        {
            event.preventDefault();
            form.classList.remove('was-validated');
            addUser();
        }

      }, false)
    });

    'use strict'
    const formsEdit = document.querySelectorAll('.validation-edit-user')
    Array.from(formsEdit).forEach(form =>
    {
      form.addEventListener('submit', event =>
      {
        if (!form.checkValidity())
        {
            event.preventDefault();
            event.stopPropagation();
            form.classList.add('was-validated');
        }
        else
        {
            event.preventDefault();
            form.classList.remove('was-validated');
            editUser();
        }

      }, false)
    })
})()

const addUser = () =>
{
    const inputName = document.getElementById('inputName').value;
    const selectRole = document.getElementById('selectRole').value;
    const inputUsername = document.getElementById('inputUsername').value;
    const inputPassword = document.getElementById('inputPassword').value;

    data =
    {
        name: inputName,
        username: inputUsername,
        password: inputPassword,
        role: selectRole,
        _token:  $('meta[name="csrf-token"]').attr('content')
    }

    fetch('/users/add',
    {
        method: 'POST',
        headers:
        {
            "Content-Type": "application/json",
        },
        body: JSON.stringify(data)
    }).then((resp) => resp.json())
    .then((data) =>
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
                    window.location = '/users';
                }
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
    );
}

const getInfoByID = (id) =>
{
    const inputName = document.getElementById('inputNameEdit');
    const selectRole = document.getElementById('selectRoleEdit');
    const inputUsername = document.getElementById('inputUsernameEdit');
    const inputPassword = document.getElementById('inputPasswordEdit');
    const inputID = document.getElementById('inputID');

    fetch('/users/show/' + id,
    {
        headers:
        {
            "Content-Type": "application/json",
        }
    }).then((resp) => resp.json())
    .then((data) =>
    {
        if (data._id != null)
        {
            $('#modalEdit').modal('show');
            inputName.value = data.name;
            selectRole.value = data.role;
            inputUsername.value = data.username;
            inputPassword.value = data.password;
            inputPassword.style.display = 'none';
            inputID.value = data._id;
            inputID.style.display = 'none';
        }
        else if(data.error != null)
        {
            Swal.fire({
                icon: 'error',
                title: data.title,
                text: data.text
            })
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

const editUser = () =>
{
    const inputName = document.getElementById('inputNameEdit').value;
    const selectRole = document.getElementById('selectRoleEdit').value;
    const inputUsername = document.getElementById('inputUsernameEdit').value;
    const inputPassword = document.getElementById('inputPasswordEdit').value;
    const inputID = document.getElementById('inputID').value;

    data =
    {
        name: inputName,
        username: inputUsername,
        password: inputPassword,
        role: selectRole,
        _token:  $('meta[name="csrf-token"]').attr('content')
    }

    fetch('/users/edit/' + inputID,
    {
        method: 'POST',
        headers:
        {
            "Content-Type": "application/json",
        },
        body: JSON.stringify(data)
    }).then((resp) => resp.json())
    .then((data) =>
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
                    window.location = '/users';
                }
            });
        }
        else if(data.error != null)
        {
            Swal.fire({
                icon: 'error',
                title: data.title,
                text: data.title
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


const deleteUser = (id) =>
{
    Swal.fire({
        icon: 'warning',
        title: '¿Are you sure?',
        text: 'This action can not be undone',
        showCancelButton: true,
        confirmButtonText: 'Yes',
        cancelButtonText: 'Cancel'
    }).then((result) =>
    {
        if (result.isConfirmed)
        {
            data =
            {
                id: id,
                _token: $('meta[name="csrf-token"]').attr('content')
            }

            fetch('/users/delete/' + id,
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
                            window.location = '/users';
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
