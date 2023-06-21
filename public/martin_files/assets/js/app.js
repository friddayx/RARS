$(document).ready(function () {

    function modal(id, action) {
        $('#'+id).modal(action)
    }

    let _token = $('#_token').val()

    $('.reportAccident').click(function () {
        modal('reportAccident', 'show')
    })

    $('.addInstitution').click(function () {
        modal('addInstitution', 'show')
    })

    // add institution
    let add_institution = $('#add-new-institution')
    add_institution.submit(function (e) {
        e.preventDefault()
        $.ajax({
            url: add_institution.attr('action'),
            type: 'post',
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            data: new FormData(this),
            success: function (res) {
                if (res.status === 201){
                    modal('addInstitution', 'hide')
                    toastAlert('success', res.message)
                    refresh()
                }
            }
        })
    })

    let assign_institution = $('#institution-assigned')
    assign_institution.submit(function (e) {
        e.preventDefault()
        $.ajax({
            url: assign_institution.attr('action'),
            type: 'post',
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            data: new FormData(this),
            success: function (res) {
                if (res.status === 201){
                    toastAlert('success', res.message)
                    redirect('/admin/new-reports')
                }
            }
        })
    })

    let update_assigned = $('#update-assigned')
    update_assigned.submit(function (e) {
        e.preventDefault()
        $.ajax({
            url: update_assigned.attr('action'),
            type: 'post',
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            data: new FormData(this),
            success: function (res) {
                if (res.status === 201){
                    toastAlert('success', res.message)
                    redirect('/admin/pending-reports')
                }
            }
        })
    })

    let institution_update = $('#institution-update')
    institution_update.submit(function (e) {
        e.preventDefault()
        $.ajax({
            url: institution_update.attr('action'),
            type: 'post',
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            data: new FormData(this),
            success: function (res) {
                if (res.status === 201){
                    toastAlert('success', res.message)
                    redirect('/admin/institutions')
                }
            }
        })
    })

    let user_update = $('#user-update')
    user_update.submit(function (e) {
        e.preventDefault()
        $.ajax({
            url: user_update.attr('action'),
            type: 'post',
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            data: new FormData(this),
            success: function (res) {
                if (res.status === 201){
                    toastAlert('success', res.message)
                    redirect('/admin/all-users')
                }
            }
        })
    })

    let update_admin_profile = $('#update_admin_profile')
    update_admin_profile.submit(function (e) {
        e.preventDefault()
        $.ajax({
            url: update_admin_profile.attr('action'),
            type: 'post',
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            data: new FormData(this),
            success: function (res) {
                if (res.status === 201){
                    toastAlert('success', res.message)
                    redirect('/admin/my_profile')
                }
            }
        })
    })


    //register mentee
    let register_mentee = $('#register-user-form')
    register_mentee.submit(function (e) {
        e.preventDefault()
        $.ajax({
            url: register_mentee.attr('action'),
            type: 'post',
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            data: new FormData(this),
            success: function (res) {
                if (res.status === 201){
                    modal('registerUser', 'hide')
                    toastAlert('success', res.message)
                    refresh()
                }
            }
        })
    })

    //register mentor
    let register_mentor = $('#register_mentor_form')
    register_mentor.submit(function (e) {
        e.preventDefault()
        $.ajax({
            url: register_mentor.attr('action'),
            type: 'post',
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            data: new FormData(this),
            success: function (res) {
                if (res.status === 201){
                    modal('modals-slide-in', 'hide')
                    toastAlert('success', res.message)
                    refresh()
                }
            }
        })
    })

    //send single mail
    let send_single_mail = $('#singlemail-form')
    send_single_mail.submit(function (e) {
        e.preventDefault()
        $.ajax({
            url: send_single_mail.attr('action'),
            type: 'post',
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            data: new FormData(this),
            success: function (res) {
                if (res.status === 201){
                    modal('singlemail', 'hide')
                    toastAlert('success', res.message)
                    refresh()
                }
            }
        })
    })

    //send bulk mail
    let send_bulk_mail = $('#bulkmail-form')
    send_bulk_mail.submit(function (e) {
        e.preventDefault()
        $.ajax({
            url: send_bulk_mail.attr('action'),
            type: 'post',
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            data: new FormData(this),
            success: function (res) {
                if (res.status === 201){
                    modal('bulkmail', 'hide')
                    toastAlert('success', res.message)
                    refresh()
                }
            }
        })
    })

    //create mentor mentee pair
    let mentor_mentee_pair = $('#mentor_mentee_pair_form')
    mentor_mentee_pair.submit(function (e) {
        e.preventDefault()
        $.ajax({
            url: mentor_mentee_pair.attr('action'),
            type: 'post',
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            data: new FormData(this),
            success: function (res) {
                if (res.status === 201){
                    modal('mentor_mentee_pair_form', 'hide')
                    toastAlert('success', res.message)
                    refresh()
                }
            }
        })
    })

    /*------------------------------------------
    --------------------------------------------
    Faculty Dropdown Change Event
    --------------------------------------------
    --------------------------------------------*/
    $('#selectedFaculty').on('change', function () {
        var idFaculty = this.value;
        $("#department").html('');
        $.ajax({
            url: ('api/fetch-departments'),
            type: "POST",
            data: {
                faculty_id: idFaculty,
                _token: _token
            },
            dataType: 'json',
            success: function (result) {
                $('#department').html('<option value="">-- Choose Department --</option>');
                $.each(result.departments, function (key, value) {
                    $("#department").append('<option value="' + value
                        .id + '">' + value.department_name + '</option>');
                });
            }
        });
    });

})


function back(location) {
    setTimeout(() => {
        window.location.href = location
    }, 3000)
}

// delete
function deleteAlert(id, url) {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger mr-2'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: url,
                type: 'delete',
                dataType: 'json',
                data: {id: id, _token: _token},
                success: function (res) {
                    if (res.status === 200) {
                        swalWithBootstrapButtons.fire(
                            'Deleted!',
                            res.message,
                            'success'
                        )
                        refresh()
                    }
                }
            })
        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
                'Cancelled',
                'Your record is safe :)',
                'error'
            )
        }
    })
}

function toastAlert(status, message) {
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: message,
        showConfirmButton: false,
        timer: 1500
    })
}

function donatusFire(message){
    Swal.fire({
        position: 'top-end',
        type: 'success',
        title: 'Application created successfully!',
        showConfirmButton: false,
        timer: 3000,
        confirmButtonClass: 'btn btn-primary',
        buttonsStyling: false,
    })
}

function refresh() {
    setTimeout(() => location.reload(), 3000)
}

function redirect(location) {
    setTimeout(() => window.location.href = location, 3000)
}
