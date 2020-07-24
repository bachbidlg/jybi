function readImage(input, preview, maxWidth = null) {
    var img_preview,
        image_default = $(input).attr('data-default') || null;
    if (image_default === null) preview.hide();
    if (preview.is('img')) {
        img_preview = preview;
    } else {
        if (preview.children('img').length <= 0) preview.append('<img/>');
        img_preview = preview.children('img');
    }
    img_preview.attr({
        'src': image_default,
        'style': (maxWidth === null ? '' : 'max-width: ' + maxWidth + 'px')
    });
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            img_preview.attr('src', e.target.result);
            preview.show();
        }
        reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
}

$(function () {
    "use strict";

    var btn_del = '.btn-del';

    function setPopovers() {
        $(btn_del).each(function () {
            popoverBtnDel($(this));
        });
    }

    function popoverBtnDel(el) {
        var url = el.attr('data-url') || null;
        if (url === null) {
            console.log('Empty url!');
            return false;
        }
        var title = el.attr('title') || null,
            data_title = el.attr('data-title') || "Bạn thực sự muốn xóa?",
            btn_success_class = el.attr('btn-success-class') || null,
            btn_cancel_class = el.attr('btn-cancel-class') || null,
            btn_cancel = $('<button class="btn btn-warning mr-5' + (btn_cancel_class !== null ? ' ' + btn_cancel_class : '') + '">Cancel</button>'),
            btn_success = $('<a href="' + url + '" class="btn btn-success' + (btn_success_class !== null ? ' ' + btn_success_class : '') + '">Yes</a>'),
            content = $('<div></div>').append(btn_cancel, btn_success);
        btn_cancel.on('click', function () {
            el.popover('hide');
        });
        el.on('show.bs.popover', function () {
            $('body').find(btn_del).not(el).each(function () {
                $(this).popover('hide');
            });
        }).removeAttr('title').popover({
            html: true,
            title: data_title,
            content: content,
            template: '<div class="popover popover-" role="tooltip">' +
                '<div class="arrow"></div>' +
                '<div class="alert alert-warning alert-dismissible fade show mb-0 p-1" role="alert">' +
                '<h5 class="alert-heading popover-header text-red"></h5>' +
                '<div class="popover-body text-center pb-0"></div>' +
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                '<span aria-hidden="true">×</span>' +
                '</button>' +
                '</div>' +
                '</div>'
        }).attr('title', title);
    }

    function changeCheckBox(el) {
        var url = el.attr('data-url') || null,
            is_checked = el.is(':checked'),
            checked = el.attr('data-checked') || null,
            unchecked = el.attr('data-unchecked') || null,
            val = is_checked ? checked : unchecked,
            id = el.attr('data-id') || null,
            field = el.attr('data-field') || null;
        if (url !== null && id !== null) {
            $.get(url, {
                id: id,
                val: val,
                field: field
            }, res => {
                var msg = res.msg,
                    cls = res.code === 200 ? 'success' : 'warning';
                if (res.code !== 200) {
                    el.prop('checked', !is_checked);
                }
                if (typeof $.toast === "function") {
                    $.toast({
                        heading: 'Thông báo',
                        text: msg,
                        position: 'top-right',
                        class: 'jq-toast-' + cls,
                        hideAfter: 3500,
                        stack: 6,
                        showHideTransition: 'fade'
                    });
                } else alert(msg);
            }, 'json').fail(f => {
                if (typeof $.toast === "function") {
                    $.toast({
                        heading: 'Thông báo',
                        text: 'Có lỗi xảy ra',
                        position: 'top-right',
                        class: 'jq-toast-danger',
                        hideAfter: 3500,
                        stack: 6,
                        showHideTransition: 'fade'
                    });
                } else alert('Có lỗi xảy ra');
                el.prop('checked', !is_checked);
            });
        }
    }

    $('body').on('load-body', function () {
        setPopovers();
    }).trigger('load-body');
    $('body').on('afterValidate', '.form-language', function (event, messages, errorAttributes) {
        if ([undefined, false].includes(window['submit_form'])) return false;
        window['submit_form'] = false;
        var check_tab_active_error = $('#tab-language-content .tab-content .tab-pane.active .form-group.has-error').length > 0;
        if (!check_tab_active_error && Object.keys(errorAttributes).length > 0) {
            var tab_title = $('#' + errorAttributes[0].id).closest('.tab-pane').attr('aria-labelledby');
            $('#tab-language .nav-item .nav-link#' + tab_title).trigger('click');
        }
    });
    $('body').on('change', '.ipt-checkbox', function (e) {
        e.preventDefault();
        var el = $(this);
        if (el.is(':checkbox')) changeCheckBox(el);
        return false;
    })
});