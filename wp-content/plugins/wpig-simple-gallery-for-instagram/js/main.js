var $ = jQuery;
var next_url;
function enableFields(elem) {
    elem.siblings().prop('disabled', !elem.is(':checked'));
}
function popupModal(msg){
    $("#my-content-id").html("<p>" + msg + "</p>");
    $("#modal-link").click();
}
$(document).ready(function () {
    $("#load-img").on("click", function () {
        $.ajax({
            type: "POST",
            url: ajaxurl,
            data: {
                action: "image_load",
                next_url : next_url
            },
            success: function (data) {
                list = JSON.parse(data);
                items = list.items;
                if(list.next_url == "finished") {
                    $("#load-img").prop("disabled", true).val("End of images");
                } else {
                    next_url = list.next_url;
                }
                $.each(items, function (index, item) {
                    $(".gallery-items").append(
                            '<li class="gallery-item attachment">' +
                            '<input type="checkbox" name="item_checked[]" class="gallery-cb" onchange="enableFields($(this));"/>' +
                            '<img src="' + item.thumbnail + '" />' +
                            '<input type="hidden" name="item_postid[]" disabled value="' + item.id + '" />' +
                            '<input type="hidden" name="item_thumbnail[]" disabled value="' + item.thumbnail + '" />' +
                            '<input type="hidden" name="item_url[]" disabled value="' + item.url + '" />' +
                            '<input type="hidden" name="item_caption[]" disabled value="' + item.caption + '" />' +
                            '</li>'
                            )
                });
            }
        });
    });
    $("#gallery-form").on("submit", function () {
        var form = $(this);
        var o = {};
        var a = form.serializeArray();

        $.each(a, function () {
            if (o[this.name] !== undefined) {
                if (!o[this.name].push) {
                    o[this.name] = [o[this.name]];
                }
                o[this.name].push(this.value || '');
            } else {
                o[this.name] = this.value || '';
            }
        });
        
        $.ajax({
            type: "POST",
            url: ajaxurl,
            data: {
                action: "gallery_save",
                str_val: JSON.stringify(o)
            },
            success: function (data) {
                if(data == "OK") {
                    popupModal("Gallery Saved");
                } else {
                    popupModal("Error Occurred or No Image Selected");
                }
            }
        });
        
        return false;
    });
    
});
