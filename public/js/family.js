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
    var zip_code = $('#txtPostalCode').val();
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
        id_user: user.id,
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
            zip_code: zip_code,
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

function editMember(_id) {
    var member = arrayMembers.find(x => x._id == _id);
    console.log(member);
    $('#txtIdEdit').val(member._id);

    $('#txtNameEdit').val(member.name);
    $('#txtLastNameEdit').val(member.lastname);
    $('#txtCivilStatusEdit').val(member.civil_status);
    $('#txtAgeEdit').val(member.age);
    $('#txtStreetEdit').val(member.address.street);
    $('#txtNumberEdit').val(member.address.num_ext);
    // $('#txtNumIntEdit').val(member.address.num_int);
    $('#txtColonyEdit').val(member.address.colony);
    $('#txtCityEdit').val(member.address.city);
    $('#txtStateEdit').val(member.address.state);
    $('#txtCountryEdit').val(member.address.country);
    $('#txtZipCodeEdit').val(member.address.zip_code);
    $('#txtEmailEdit').val(member.email);
    $('#txtPhoneEdit').val(member.phone.phone);
    $('#txtMobileEdit').val(member.phone.mobile);
    $('#txtSchoolingEdit').val(member.schooling);
    $('#txtOccupationEdit').val(member.occupation);
    $('#txtReligionEdit').val(member.religion);
    $('#txtRelationshipEdit').val(member.relationship);
    $('#modalEditMember').modal('show');

}

function updateMember() {

    var id = $('#txtIdEdit').val();
    var name = $('#txtNameEdit').val();
    var lastname = $('#txtLastNameEdit').val();
    var civil_status = $('#txtCivilStatusEdit').val();
    var age = $('#txtAgeEdit').val();
    var street = $('#txtStreetEdit').val();
    var num_ext = $('#txtNumberEdit').val();
    // var num_int = $('#txtNumIntEdit').val();
    var colony = $('#txtColonyEdit').val();
    var city = $('#txtCityEdit').val();
    var state = $('#txtStateEdit').val();
    var country = $('#txtCountryEdit').val();
    var zip_code = $('#txtZipCodeEdit').val();
    var email = $('#txtEmailEdit').val();
    var phone = $('#txtPhoneEdit').val();
    var mobile = $('#txtMobileEdit').val();
    var schooling = $('#txtSchoolingEdit').val();
    var occupation = $('#txtOccupationEdit').val();
    var religion = $('#txtReligionEdit').val();
    var relationship = $('#txtRelationshipEdit').val();

    var data = {
        user_id: user.id,
        id: id,
        name: name,
        lastname: lastname,
        civil_status: civil_status,
        age: age,
        address: {
            street: street,
            num_ext: num_ext,
            num_int: "N/A",
            colony: colony,
            city: city,
            state: state,
            country: country,
            zip_code: zip_code
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

    fetch('/family/update', {
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
                    text: 'Family member updated successfully',
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
            console.error(error);
            // console.error('Error:', error);
        });

}

function deleteMember(_id) {
    var data = {
        id: _id,
        _token: $('meta[name="csrf-token"]').attr('content')
    }
    fetch('/family/delete', {
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
                    text: 'Family member deleted successfully',
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
