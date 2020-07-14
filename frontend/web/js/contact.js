$('body').on('beforeSubmit', '#form-contact', function(e) {
    e.preventDefault();
    let form = $(this),
        formData = new FormData(form[0]),
        url = $(this).attr('action');

    $.ajax({
        type: 'POST',
        url: url,
        dataType: 'json',
        data: formData,
        cache: false,
        contentType: false,
        processData: false
    }).done(function (data) {
        alert(data.msg);
        if (data.code === 200) {
            form[0].reset();
        }
    }).fail(function () {
        alert('fail');
    });
    return false;
});