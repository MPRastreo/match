const updateField = () =>
{
    const name = document.getElementById('txtName');
    const last_name = document.getElementById('txtLastName');
    const age = document.getElementById('txtAge');
    const age_birth = document.getElementById('txtAgeBirth');
    const gender = document.getElementById('txtGender');
    const email = document.getElementById('txtEmail');
    const phone = document.getElementById('txtPhone');
    const marital_st = document.getElementById('txtMaritalStatus');
    const birth_place = document.getElementById('txtBirthplace');
    const address = document.getElementById('txtAddress');
    const schooling = document.getElementById('txtSchooling');
    const occupation = document.getElementById('txtOccupation');
    const religion = document.getElementById('txtReligion');

    let data =
    {
        name: name.value,
        last_name: last_name.value,
        age: age.value,
        age_birth: age_birth.value,
        gender: gender.value,
        email: email.value,
        phone: phone.value,
        marital_st: marital_st.value,
        birth_place: birth_place.value,
        address: address.value,
        schooling: schooling.value,
        occupation: occupation.value,
        religion: religion.value
    }

    fetch('/personal/changefield',
    {
        method: 'POST',
        headers:
        {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
        },
        body: JSON.stringify(data)
    }).then((resp) => resp.json())
    .then((data) =>
    {
        if (data.result != null)
        {
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: data.result
            }).then((result) =>
            {
                if(result.isConfirmed)
                {
                    window.location = '/personal';
                }
            });
        }
        else if(data.error != null)
        {
            Swal.fire({
                icon: 'error',
                title: 'Error!',
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
    fetch('/users/show/' + id,
    {
        headers:
        {
            "Content-Type": "application/json",
        }
    }).then((resp) => resp.json())
    .then((data) =>
    {
        if(data.personal_data == null)
        {
            Swal.fire({
                icon: 'warning',
                title: 'Attention!',
                text: 'There is no records'
            })
        }
        else if (data._id != null)
        {
            fillPersonalData(data.personal_data);
        }
        else if(data.error != null)
        {
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'An error occurred, please try again'
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

const fillPersonalData = (personal_data) =>
{
    const { name, last_name, age, age_birth, gender, email, phone, marital_st, birth_place, address, schooling, occupation, religion } = personal_data;
    document.getElementById('txtName').value = name;
    document.getElementById('txtLastName').value = last_name;
    document.getElementById('txtAge').value = age;
    document.getElementById('txtAgeBirth').value = age_birth;
    document.getElementById('txtGender').value = gender;
    document.getElementById('txtEmail').value = email;
    document.getElementById('txtPhone').value = phone;
    document.getElementById('txtMaritalStatus').value = marital_st;
    document.getElementById('txtBirthplace').value = birth_place;
    document.getElementById('txtAddress').value = address;
    document.getElementById('txtSchooling').value = schooling;
    document.getElementById('txtOccupation').value = occupation;
    document.getElementById('txtReligion').value = religion;
}
