/**
 * @desc Ajax login check
 */
$("#btn-login").click(function () {
    var username = $("#username").val().trim();
    var password = $("#password").val().trim();

    if (username != "" && password != "") {
        $.ajax({
            url: 'a-checkUser.php',
            type: 'post',
            data: {
                username: username,
                password: password
            },
            success: function (response) {
                var msg = "";
                if (response == 1) {
                    window.location = "login.php";
                } else {
                    msg = "Invalid username and password!";
                }
                $("#message").html(msg);
            }
        });
    } else {
        $("#message").html('Please complete your username and password!');
    }

});

/**
 * @desc Ajax login check
 */
$("#btn-signup").click(function () {
    var username = $("#username").val().trim(),
        password = $("#password").val().trim(),
        repassword = $("#re-password").val().trim(),
        name = $("#name").val().trim(),
        email = $("#email").val().trim(),
        tel = $("#tel").val().trim(),
        dateofbirth = $("#dateofbirth").val().trim(),
        isVNPhoneMobile = /^(0|\+84)(\s|\.)?((3[2-9])|(5[689])|(7[06-9])|(8[1-689])|(9[0-46-9]))(\d)(\s|\.)?(\d{3})(\s|\.)?(\d{3})$/;

    if (username != "" && password != "" && name != "" && email != "") {
        if (!username.match('^[a-z0-9_-]{8,16}$')) {
            $("#message").html('Username is invalid.');
        } else if (!password.match("^(?=.*[A-Za-z])(?=.*\\d)[A-Za-z\\d]{8,}$")) {
            $("#message").html('Password is invalid.');
        } else if (!name.match('^([a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{2,}\\s[a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{1,}\'?-?[a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{2,}\\s?([a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{1,})?)')) {
            $("#message").html('Full name is invalid');
        } else if (!email.match('^[\\w-\\.]+@([\\w-]+\\.)+[\\w-]{2,4}$')) {
            $("#message").html('Email is invalid.');
        } else if (!isVNPhoneMobile.test(tel)) {
            $("#message").html('Phone number incorrect.');
        } else if (!dateofbirth) {
            $("#message").html('Please choose date of birth.');
        } else if ((Date.now() - new Date(dateofbirth).getTime()) < 15) {
            $("#message").html('Age must be greater than 15.');
        } else if (password != repassword) {
            $("#message").html('Password confirm incorrect.');
        } else {
            $.ajax({
                url: 'a-signupUser.php',
                type: 'post',
                data: {
                    username: username,
                    password: password,
                    name: name,
                    email: email,
                    tel: tel,
                    dateofbirth: dateofbirth,
                },
                beforeSend: function () {
                    $('.loading-box').addClass('loading')
                },
                success: function (response) {
                    var msg = "";
                    if (response == 1) {
                        msg = "Sign up successfully!";
                        $('input').val('')
                    } else if (response == 2) {
                        msg = "Username has be used!";
                    } else {
                        msg = "Sign up failed!";
                    }
                    setTimeout(function () {
                        $('.loading-box').removeClass('loading')
                        $("#message").html(msg);
                    }, 100)
                }
            });
        }
    } else {
        $("#message").html('Please complete fill fields!');
    }
});

/**
 * @desc Ajax Add Class
 */
$("#btn-add-class").click(function () {
    var file_data = $('#image').prop('files')[0],
        type = '',
        match = ["image/gif", "image/png", "image/jpg", "image/jpeg",],
        name = $("#name").val().trim(),
        subject = $("#subject").val().trim(),
        room = $("#room").val().trim();

    if ($('#image').get(0).files.length !== 0) {
        type = file_data.type;
    }

    if (!type && !name && !subject && !room) {
        $("#message").html('Please fill full!');
    } else if (type == match[0] || type == match[1] || type == match[2] || type == match[3]) {
        var form_data = new FormData();
        form_data.append('file', file_data);
        form_data.append('name', name);
        form_data.append('subject', subject);
        form_data.append('room', room);

        $.ajax({
            url: 'a-addClass.php',
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            beforeSend: function () {
                $('.loading-box').addClass('loading')
            },
            success: function (response) {
                var msg = "";
                if (response == 1) {
                    msg = "Create class successfully!";
                    $('input').val('')
                    loadClass()
                } else {
                    msg = "Create class up failed!";
                }
                setTimeout(function () {
                    $('.loading-box').removeClass('loading')
                    $("#message").html(msg);
                }, 100)
            }
        });
    } else {
        $("#message").html('Only accept the image format (gif,jpg,jpeg,png)');
        $('#image').val('');
    }
    return false;
});


/** @desc Ajax delete class */
$(document).on('click', '.btn-class-delete', function () {
    if (confirm("Please confirm delete class!")) {
        $.ajax({
            url: 'a-deleteClass.php',
            type: 'post',
            data: {
                'class_id': $(this).attr('data-id')
            },
            beforeSend: function () {
                $('.loading-box').addClass('loading')
            },
            success: function (response) {
                loadClass()
                setTimeout(function () {
                    $('.loading-box').removeClass('loading')
                }, 100)
            }
        });
    }
})

/** @desc Cancel edit */
$('#btn-cancel-edit-class').click(function () {
    $('.section-class .form-class').toggleClass('editing')
    $('input').val('')
})

/** @desc Cancel edit */
$(document).on('click', '.btn-reply', function () {
    $(this).toggleClass('expended')
})

$(document).on('click', '.btn-class-edit', function () {
    if (confirm("Please confirm edit class!")) {
        $.ajax({
            url: 'a-loadClassEdit.php',
            type: 'post',
            data: {
                'class_id': $(this).attr('data-id')
            },
            beforeSend: function () {
                $('.loading-box').addClass('loading')
            },
            success: function (response) {
                const ob = JSON.parse(response);
                $('#class_id').val(ob['id'])
                $('#name').val(ob['name'])
                $('#subject').val(ob['subject'])
                $('#room').val(ob['room'])
                $('.section-class .form-class').toggleClass('editing')
                setTimeout(function () {
                    $('.loading-box').removeClass('loading')
                }, 100)
            }
        });
    }
})

$(document).on('click', '#btn-edit-class', function () {
    if (confirm("Please confirm edit class!")) {
        $.ajax({
            url: 'a-editClass.php',
            type: 'post',
            data: {
                'id': $('#class_id').val(),
                'name': $('#name').val(),
                'subject': $('#subject').val(),
                'room': $('#room').val(),
            },
            beforeSend: function () {
                $('.loading-box').addClass('loading')
            },
            success: function (response) {
                setTimeout(function () {
                    $('.loading-box').removeClass('loading')
                    if (response == 1) {
                        alert('Edit success!')
                        loadClass()
                        $('input').val('')
                        $('.section-class .form-class').removeClass('editing')
                    } else {
                        alert('Edit failed!')
                    }
                }, 100)
            }
        });
    }
})


$(document).on('click', '.btn-user-delete', function () {
    if (confirm("Please confirm delete user!")) {
        $.ajax({
            url: 'a-deleteUser.php',
            type: 'post',
            data: {
                'id': $(this).attr('data-id')
            },
            beforeSend: function () {
                $('.loading-box').addClass('loading')
            },
            success: function (response) {
                loadUser()
                setTimeout(function () {
                    $('.loading-box').removeClass('loading')
                }, 100)
            }
        });
    }
})


$(document).on('click', '.btn-user-role', function () {
    if (confirm("Please confirm change role user!")) {
        $.ajax({
            url: 'a-changeRoleUser.php',
            type: 'post',
            data: {
                'id': $(this).attr('data-id'),
                'role': $(this).parent('td').parent('tr').find('select.role-value').val(),
            },
            beforeSend: function () {
                $('.loading-box').addClass('loading')
            },
            success: function (response) {
                if (response == 1) {
                    loadUser()
                    setTimeout(function () {
                        $('.loading-box').removeClass('loading')
                        alert('Change role successfully!')
                    }, 100)
                } else {
                    setTimeout(function () {
                        $('.loading-box').removeClass('loading')
                        alert('Change role successfully! Please unsure have admin role.')
                    }, 100)
                }
            }
        });
    }
})

$(document).on('click', '#btn-join-class', function () {
    let id = $('#id-join-class').val()
    $.ajax({
        url: 'a-joinClass.php',
        type: 'post',
        data: {
            'id': id
        },
        beforeSend: function () {
            $('.loading-box').addClass('loading')
        },
        success: function (response) {
            if (response) {
                setTimeout(function () {
                    $('.loading-box').removeClass('loading')
                    $('.section-intro').html(response)
                    $('.section-intro').addClass('loaded')
                }, 100)
            } else {
                setTimeout(function () {
                    $('.loading-box').removeClass('loading')
                    alert("Id invalid, please fill another class's id!")
                }, 100)
            }
        }
    });
})

$(document).on('click', '.btn-redirect-class', function () {
    let id = $(this).attr('data-id')
    $.ajax({
        url: 'a-viewClass.php',
        type: 'post',
        data: {
            'id': id
        },
        beforeSend: function () {
            $('.loading-box').addClass('loading')
        },
        success: function (response) {
            if (response) {
                setTimeout(function () {
                    $('.loading-box').removeClass('loading')
                    window.location = "index.php";
                }, 100)
            } else {
                setTimeout(function () {
                    $('.loading-box').removeClass('loading')
                    alert("Id invalid, please fill another class's id!")
                }, 100)
            }
        }
    });
})

$(document).on('click', '.btn-remove-student', function () {
    let idUser = $(this).attr('data-id')
    let idClass = $(this).attr('data-class')
    $.ajax({
        url: 'a-removeStudentClass.php',
        type: 'post',
        data: {
            'idUser': idUser,
            'idClass': idClass,
        },
        beforeSend: function () {
            $('.loading-box').addClass('loading')
        },
        success: function (response) {
            if (response) {
                setTimeout(function () {
                    $('.loading-box').removeClass('loading')
                    window.location = "index.php";
                }, 100)
            } else {
                setTimeout(function () {
                    $('.loading-box').removeClass('loading')
                    alert("Id invalid, please fill another class's id!")
                }, 100)
            }
        }
    });
})

$(document).on('click', '#btn-create-comment', function () {
    let id = $(this).attr('data-id')
    let parent = $(this).attr('data-parent')
    let content = $('#txt-content-comment').val()
    $.ajax({
        url: 'a-addCommentClass.php',
        type: 'post',
        data: {
            'id': id,
            'parent': parent,
            'content': content,
        },
        beforeSend: function () {
            $('.loading-box').addClass('loading')
        },
        success: function (response) {
            console.log(response)
            if (response) {
                setTimeout(function () {
                    $('.loading-box').removeClass('loading')
                    window.location = "index.php";
                }, 100)
            } else {
                setTimeout(function () {
                    $('.loading-box').removeClass('loading')
                    alert("Content or ID invalid, please fill refresh and retry!")
                }, 100)
            }
        }
    });
})

$(document).on('click', '.btn-create-comment-reply', function () {
    let id = $(this).attr('data-id')
    let parent = $(this).attr('data-parent')
    let content = $(this).parent('.editor-box').find('.txt-content-comment-reply').val()
    $.ajax({
        url: 'a-addCommentClass.php',
        type: 'post',
        data: {
            'id': id,
            'parent': parent,
            'content': content,
        },
        beforeSend: function () {
            $('.loading-box').addClass('loading')
        },
        success: function (response) {
            console.log(response)
            if (response) {
                setTimeout(function () {
                    $('.loading-box').removeClass('loading')
                    window.location = "index.php";
                }, 100)
            } else {
                setTimeout(function () {
                    $('.loading-box').removeClass('loading')
                    alert("Content or ID invalid, please fill refresh and retry!")
                }, 100)
            }
        }
    });
})

function loadClass() {
    $.ajax({
        url: 'a-loadClass.php',
        type: 'post',
        beforeSend: function () {
            $('.loading-box').addClass('loading')
        },
        success: function (response) {
            $('.table-class form').html(response)
            setTimeout(function () {
                $('.loading-box').removeClass('loading')
            }, 100)
        }
    });
}

function loadUser() {
    $.ajax({
        url: 'a-loadUser.php',
        type: 'post',
        beforeSend: function () {
            $('.loading-box').addClass('loading')
        },
        success: function (response) {
            $('.table-user form').html(response)
            setTimeout(function () {
                $('.loading-box').removeClass('loading')
            }, 100)
        }
    });
}