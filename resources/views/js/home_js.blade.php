<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
    }); 

    function get_one_user(user_id) {

        let formData = new FormData();
        formData.append("user_id", user_id);
        var ajaxOptions = {
            url: 'get_one_user',
            type: 'POST',
            cache: false,
            processData: false,
            dataType: 'json',
            contentType: false,
            data: formData
        };
        var req = $.ajax(ajaxOptions);
        req.done(function(resp) {
            console.log(resp)
            $("#edit_user_id").val(resp['id']);
            $("#edit_nname").val(resp['name']);
            $("#edit_sname").val(resp['second_name']);
            $("#edit_tname").val(resp['third_name']);
            $("#edit_lname").val(resp['last_name']);
            $("#edit_birthday").val(resp['birthday']);
            $("#edit_email").val(resp['email']);
            $("#edit_nationalNumber").val(resp['national_number']);
            $("#edit_phone_number").val(resp['phone']);
            $("#edit_address").val(resp['address']);


        });
        req.fail(function(e) {
            if (e.status == 422) {                var errors = e.responseJSON.errors;                displayAjaxErr(errors);            }
            if (e.status == 500) {                displayAjaxErr([e.status + ' ' + e.statusText + ' Please Check for Duplicate entry or Contact School Administrator/IT Personnel'])            }
            if (e.status == 404) {                displayAjaxErr([e.status + ' ' + e.statusText + ' - Requested Resource or Record Not Found'])            }
            return e.status;
        });    
    }

    function confirm_delete_user(user_id, myObj) {
        
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'confirmbtn',
                cancelButton: 'cancelbtn'
            },
            buttonsStyling: false
        })
        Swal.fire({
            title: "Are you sure?",
            text: "Are you sure you want to permanently delete this user?",
            icon: "error",
            showCancelButton: true,
            focusConfirm: false,
            confirmButtonColor: '#E23E31',
            confirmButtonText: "Delete",
        }).then((result) => {
            if (result.isConfirmed) {

                let formData = new FormData();
                formData.append("user_id", user_id);
                var ajaxOptions = {
                    url: 'delete_one_user',
                    type: 'POST',
                    cache: false,
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    data: formData
                };
                var req = $.ajax(ajaxOptions);
                req.done(function(resp) {
                    console.log(resp)

                    Swal.fire({
                        icon: "success",
                        title: "The user deleted successfully",
                        text: "The user deleted successfully!",
                        showConfirmButton: false,
                        timer: 3000,
                    })
                    myObj.parentNode.parentNode.parentNode.remove();
                });
                req.fail(function(e) {
                    if (e.status == 422) {                var errors = e.responseJSON.errors;                displayAjaxErr(errors);            }
                    if (e.status == 500) {                displayAjaxErr([e.status + ' ' + e.statusText + ' Please Check for Duplicate entry or Contact School Administrator/IT Personnel'])            }
                    if (e.status == 404) {                displayAjaxErr([e.status + ' ' + e.statusText + ' - Requested Resource or Record Not Found'])            }
                    return e.status;
                });    
            }
        })
    }

    function onChangePermission(user_id) {
        console.log('user_id = ' +  user_id);
        let formData = new FormData();
        formData.append("user_id", user_id);
        var ajaxOptions = {
            url: 'change_permission',
            type: 'POST',
            cache: false,
            processData: false,
            dataType: 'json',
            contentType: false,
            data: formData
        };
        var req = $.ajax(ajaxOptions);
        req.done(function(resp) {
            console.log(resp)
            if (resp) {
                Swal.fire({
                    icon: "success",
                    title: "Permission approved.",
                    text: "This user's permission is approved successfully.",
                    showConfirmButton: false,
                    timer: 2000,
                });
            } else {
                
                Swal.fire({
                    icon: "error",
                    title: "Permission disapproved.",
                    text: "This user's permission is disapproved successfully.",
                    showConfirmButton: false,
                    timer: 2000,
                });
            }
            
        });
        req.fail(function(e) {
            if (e.status == 422) {                var errors = e.responseJSON.errors;                displayAjaxErr(errors);            }
            if (e.status == 500) {                displayAjaxErr([e.status + ' ' + e.statusText + ' Please Check for Duplicate entry or Contact School Administrator/IT Personnel'])            }
            if (e.status == 404) {                displayAjaxErr([e.status + ' ' + e.statusText + ' - Requested Resource or Record Not Found'])            }
            return e.status;
        }); 
    }

</script>