//your javascript goes here
var currentTab = 0;
let today = new Date();
document.addEventListener("DOMContentLoaded", function (event) {
    showTab(currentTab);
});

function showTab(n) {

    if (n <= 2) {
        var x = document.getElementsByClassName("tab");
        x[n].style.display = "block";
        if (n == 0) {
            document.getElementById("prevBtn").style.display = "none";
        } else {
            document.getElementById("prevBtn").style.display = "inline";
        }
        if (n == (x.length - 1)) {
            document.getElementById("nextBtn").innerHTML = "Submit";
            var submit = document.getElementById("nextBtn");
            submit.className += " submit";
        } else {
            document.getElementById("nextBtn").innerHTML = `<i class="fas fa-arrow-right"></i>&nbsp;Next`;
        }
        fixStepIndicator(n)
    } else {
        addFamilyMember();
    }


}

function nextPrev(n) {
    // console.log(n);
    var x = document.getElementsByClassName("tab");
    var flag = validateForm(x, currentTab);
    if (n == 1 && flag != true) return false;
    x[currentTab].style.display = "none";
    // console.log(currentTab);
    currentTab = currentTab + n;
    // console.log(currentTab);
    // console.log(x.length);
    if (currentTab >= x.length) {

        // document.getElementById("regForm").submit();
        // return false;
        //alert("sdf");
        document.getElementById("nextprevious").style.display = "none";
        document.getElementById("all-steps").style.display = "none";
        document.getElementById("register").style.display = "none";
        document.getElementById("text-message").style.display = "block";




    }
    showTab(currentTab);
}

function validateForm(x, currentTab) {
    var x, y, i, valid = true;
    y = x[currentTab].getElementsByTagName("select");
    if (y.length != 0) {
        valid = validateSelect(x, currentTab);
    }
    y = x[currentTab].getElementsByTagName("input");
    for (i = 0; i < y.length; i++) {
        console.log(y[i].value);
        if (y[i].value == "") {
            y[i].className += " invalid";
            valid = false;
        } else {
            y[i].classList.remove("invalid");
            y[i].classList.add("valid");
        }
    }

    if (valid) {
        document.getElementsByClassName("step")[currentTab].className += " finish";
    }
    console.log(valid);
    return valid;
}

function fixStepIndicator(n) {
    var i, x = document.getElementsByClassName("step");
    for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
    }
    x[n].className += " active";
}

function validateSelect(x, currentTab) {
    y = x[currentTab].getElementsByTagName("select");
    console.log(y);
    var flag = true;
    for (i = 0; i < y.length; i++) {
        console.log(y[i].value);
        if (y[i].value == "") {
            y[i].className += " invalid";
            flag = false;
        } else {
            y[i].classList.remove("invalid");
            y[i].classList.add("valid");
        }
    }
    return flag;
}

const addFamilyMember = () => {
    var name = $('#txtName').val();
    var lastname = $('#txtlastname').val();
    var date_of_birth = $('#txtdate_of_birth').val();
    var gender = $('#sltGender').val();
    var civil_status = $('#sltCivilStatus').val();
    var city_of_birth = $('#txtCityOfBirth').val();
    var country_of_birth = $('#txtCountryOfBirth').val();
    var state_of_birth = $('#txtStateOfBirth').val();
    var street = $('#txtStreet').val();
    var num_ext = $('#txtNumExt').val();
    var num_int = $('#txtNumInt').val();
    var postal_code = $('#txtPostalCode').val();
    var colony = $('#txtColony').val();
    var city = $('#txtCity').val();
    var state = $('#txtState').val();
    var country = $('#txtCountry').val();
    var email = $('#txtEmail').val();
    var phone = $('#txtPhone').val();
    var mobile = $('#txtMobile').val();
    var schooling = $('#txtSchooling').val();
    var occupation = $('#txtOccupation').val();
    var religion = $('#txtReligion').val();
    var relationship = $('#txtRelation').val();
    var dateBirth = new Date(date_of_birth);
    var age = today.getFullYear() - dateBirth.getFullYear();
    var m = today.getMonth() - dateBirth.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < dateBirth.getDate())) {
        age--;
    }


    var data = {
        name: name,
        lastname: lastname,
        birth_date: date_of_birth,
        age: age,
        gender: gender,
        civil_status: civil_status,
        birth_date: {
            country: country_of_birth,
            state: state_of_birth,
            city: city_of_birth
        },
        address: {
            street: street,
            num_ext: num_ext,
            num_int: num_int,
            postal_code: postal_code,
            colony: colony,
            city: city,
            state: state,
            country: country
        },
        email: email,
        phone: {
            phone: phone,
            mobile: mobile
        },
        schooling: schooling,
        occupation: occupation,
        religion: religion,
        relationship: relationship,
        _token: $('meta[name="csrf-token"]').attr('content')
    }

    fetch('/family/add', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),
        }).then(response => response.json())
        .then(data => {
            if (data.result) {
                Swal.fire({
                    title: 'Success!',
                    text: 'Family member added successfully',
                    icon: 'success',
                    confirmButtonText: 'Ok'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.reload();
                    }
                })
            } else {
                Swal.fire({
                    title: 'Error!',
                    text: 'Something went wrong',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                })
            }
        }).catch((error) => {
            console.error('Error:', error);
        });
}

function showMember(id) {
    data = {
        id: id,
        _token: $('meta[name="csrf-token"]').attr('content')
    }
    fetch('/family/show', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),
        }).then(response => response.json())
        .then(data => {
            if (data.result) {
                $('#txtName').val(data.data.name);
                $('#txtlastname').val(data.data.lastname);
                $('#txtdate_of_birth').val(data.data.birth_date);
                $('#sltGender').val()
                $('#sltCivilStatus').val(data.data.civil_status);
                $('#txtCityOfBirth').val(data.data.birth_date.city);
                $('#txtCountryOfBirth').val(data.data.birth_date.country);
                $('#txtStateOfBirth').val(data.data.birth_date.state);
                $('#txtStreet').val(data.data.address.street);
                $('#txtNumExt').val(data.data.address.num_ext);
                $('#txtNumInt').val(data.data.address.num_int);
                $('#txtPostalCode').val(data.data.address.postal_code);
                $('#txtColony').val(data.data.address.colony);
                $('#txtCity').val(data.data.address.city);
                $('#txtState').val(data.data.address.state);
                $('#txtCountry').val(data.data.address.country);
                $('#txtEmail').val(data.data.email);
                $('#txtPhone').val(data.data.phone.phone);
                $('#txtMobile').val(data.data.phone.mobile);
                $('#txtSchooling').val(data.data.schooling);
                $('#txtOccupation').val(data.data.occupation);
                $('#txtReligion').val(data.data.religion);
                $('#txtRelation').val(data.data.relationship);
                $('#txtId').val(data.data.id);
                $('#btnAdd').hide();
                $('#btnUpdate').show();
            } else {
                Swal.fire({
                    title: 'Error!',
                    text: 'Something went wrong',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                })
            }
        }).catch((error) => {
            console.error('Error:', error);

        });
}
