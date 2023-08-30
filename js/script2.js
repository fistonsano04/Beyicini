$(function() {
        // Create New Row
        $('#add_member').click(function() {
            if ($('tr[data-id=""]').length > 0) {
                $('tr[data-id=""]').find('[name="name"]').focus()
                return false;
            }
            var tr = $('<tr>')
            $('input[name="id"]').val('')
            tr.addClass('py-1 px-2');
            tr.attr('data-id', '');
            tr.append('<td contenteditable name="name"></td>')
            tr.append('<td contenteditable name="email"></td>')
            tr.append('<td contenteditable name="contact"></td>')
            tr.append('<td contenteditable name="address"></td>')
            tr.append('<td class="text-center"><button class="btn btn-sm btn-primary btn-flat rounded-0 px-2 py-0">Save</button><button class="btn btn-sm btn-dark btn-flat rounded-0 px-2 py-0" onclick="cancel_button($(this))" type="button">Cancel</button></td>')
            $('#form-tbl').append(tr)
            tr.find('[name="name"]').focus()
        })

        // Edit Row
        $('.edit_data').click(function() {
            var id = $(this).closest('tr').attr('data-id')
            $('input[name="id"]').val(id)
            var count_column = $(this).closest('tr').find('td').length
            $(this).closest('tr').find('td').each(function() {
                if ($(this).index() != (count_column - 1))
                    $(this).attr('contenteditable', true)
            })
            $(this).closest('tr').find('[name="name"]').focus()
            $(this).closest('tr').find('.editable').show('fast')
            $(this).closest('tr').find('.noneditable').hide('fast')
        })

        // Delete Row
        $('.delete_data').click(function() {
            var id = $(this).closest('tr').attr('data-id')
            var name = $(this).closest('tr').find("[name='name']").text()
            var _conf = confirm("Are you sure to delete \"" + name + "\" from the list?")
            if (_conf == true) {
                $.ajax({
                    url: 'api.php?action=delete',
                    method: 'POST',
                    data: { id: id },
                    dataType: 'json',
                    error: err => {
                        alert("An error occured while saving the data")
                        console.log(err)
                    },
                    success: function(resp) {
                        if (resp.status == 'success') {
                            alert(name + ' is successfully deleted from the list.')
                            location.reload()
                        } else {
                            alert(resp.msg)
                            console.log(err)
                        }
                    }
                })
            }
        })

        $('#form-data').submit(function(e) {
            e.preventDefault();
            var id = $('input[name="id"]').val()
            var data = {};
            // check fields promise
            var check_fields = new Promise(function(resolve, reject) {
                    data['id'] = id;
                    $('td[contenteditable]').each(function() {
                        data[$(this).attr('name')] = $(this).text()
                        if (data[$(this).attr('name')] == '') {
                            alert("All fields are required.");
                            resolve(false);
                            return false;
                        }
                    })
                    resolve(true);
                })
                // continue only if all fields are filled
            check_fields.then(function(resp) {
                if (!resp)
                    return false;
                // validate email
                if (!IsEmail(data['email'])) {
                    alert("Invalid Email.");
                    $('[name="email"][contenteditable]').addClass('bg-danger text-light bg-opacity-50').focus();
                    return false;
                } else {
                    $('[name="email"][contenteditable]').removeClass('bg-danger text-light bg-opacity-50')
                }

                // validate contact #
                if (!isContact(data['contact'])) {
                    alert("Invalid Contact Number.");
                    $('[name="contact"][contenteditable]').addClass('bg-danger text-light bg-opacity-50').focus();
                    return false;
                } else {
                    $('[name="contact"][contenteditable]').removeClass('bg-danger text-light bg-opacity-50')
                }
                $.ajax({
                    url: "./api.php?action=save",
                    method: 'POST',
                    data: data,
                    dataType: 'json',
                    error: err => {
                        alert('An error occured while saving the data');
                        console.log(err)
                    },
                    success: function(resp) {
                        if (!!resp.status && resp.status == 'success') {
                            alert(resp.msg);
                            location.reload()
                        } else {
                            alert(resp.msg);
                        }
                    }
                })
            })


        })
    })
    //Email Validation Function
window.IsEmail = function(email) {
        var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (!regex.test(email)) {
            return false;
        } else {
            return true;
        }
    }
    //Contact Number Validation Function
window.isContact = function(contact) {
    return ($.isNumeric(contact) && contact.length == 11 && contact.substr(0, 2) == '09');
}

// removing table row when cancel button triggered clicked
window.cancel_button = function(_this) {
    if (_this.closest('tr').attr('data-id') == '') {
        _this.closest('tr').remove()
    } else {
        $('input[name="id"]').val('')
        _this.closest('tr').find('td').each(function() {
            $(this).removeAttr('contenteditable')
        })
        _this.closest('tr').find('.editable').hide('fast')
        _this.closest('tr').find('.noneditable').show('fast')
    }
}