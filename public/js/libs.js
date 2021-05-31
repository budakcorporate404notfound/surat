moment.locale("id");

$("body").on("keydown", "input, select", function (e) {
    if (e.which === 13) {
        var self = $(this),
            form = self.parents("form:eq(0)"),
            focusable,
            next;
        focusable = form.find("input").filter(":visible");
        next = focusable.eq(focusable.index(this) + 1);
        if (next.length) {
            next.focus();
        }
        return false;
    }
});

function handleFormSubmit(form, url, constraints, callback) {
    var values = validate.collectFormValues(form);
    var errors = validate(values, constraints);
    showErrors(form, errors || {});

    if (!errors) {
        console.log("no error : ", form);
        showSuccess(form, url);
    }

    if (typeof callback === "function") {
        callback();
    }
}

function showErrors(form, errors) {
    console.log("showErrors : ", errors);
    _.each(
        form.querySelectorAll('input:not([type="hidden"]), select[name]'),
        function (input) {
            showErrorsForInput(input, errors && errors[input.name]);
        }
    );
}

function showErrorsForInput(input, errors) {
    if (input !== undefined && input !== null) {
        var formGroup = closestParent(input.parentNode, "form-group");
        if (formGroup !== undefined && formGroup !== null) {
            messages = formGroup.querySelector(".messages");
            resetFormGroup(formGroup);
            if (errors) {
                formGroup.classList.add("has-error");
                _.each(errors, function (error) {
                    addError(messages, error);
                });
            } else {
                formGroup.classList.add("has-success");
            }
        }
    }
}

function closestParent(child, className) {
    if (!child || child == document) {
        return null;
    }
    if (child.classList.contains(className)) {
        return child;
    } else {
        return closestParent(child.parentNode, className);
    }
}

function resetFormGroup(formGroup) {
    formGroup.classList.remove("has-error");
    formGroup.classList.remove("has-success");
    _.each(formGroup.querySelectorAll(".help-block.error"), function (el) {
        el.parentNode.removeChild(el);
    });
}

function addError(messages, error) {
    var block = document.createElement("p");
    block.classList.add("help-block");
    block.classList.add("error");
    block.innerHTML = error;
    messages.appendChild(block);
}

function showSuccess(form, url) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('input[name="_token"]', form).val(),
        },
    });

    $("#submit").html("Please Wait...");
    $("#submit").attr("disabled", true);
    console.log("masuk di showSuccess", form);
    $.ajax({
        url: url,
        type: "POST",
        data: $(form).serialize(),
        success: function (data) {
            $("#submit").html("Submit");
            $("#submit").attr("disabled", false);
            $(document).Toasts("create", {
                autohide: true,
                delay: 5000,
                title: "Toast Title",
                subtitle: "Error",
                body: data.message,
                // image: '{{ url('adminlte/img/user3-128x128.jpg') }}'
            });
        },
        error: function (jqXhr, json, errorThrown) {
            var errors = jqXhr.responseJSON;
            var errorsHtml = "";

            $.each(errors["errors"], function (index, value) {
                errorsHtml +=
                    '<ul class="list-group"><li class="list-group-item alert alert-danger">' +
                    value +
                    "</li></ul>";
                showErrorsForInput($("#" + index), value);
            });

            $(document).Toasts("create", {
                autohide: false,
                delay: 2000,
                title: "Toast Title",
                subtitle: "Error",
                body: errorsHtml,
                // image: '{{ url('adminlte/img/user3-128x128.jpg') }}'
            });

            $("#submit").html("Submit");
            $("#submit").attr("disabled", false);
        },
    });
}

var surat_masuk_id;
var surat_keluar_id;

// Table
var surat_masuk_table;
var surat_keluar_table;
var surat_keluar_konsep_table;
var surat_disposisi_surat_table;
var surat_diskusi_surat_table;
var surat_disposisi_pimpinan_table;
var surat_tembusan_surat_table;
var surat_dokumen_surat_table;
var surat_dokumen_surat_table_reload;
var surat_file_tanggapan_table;
var surat_file_tanggapan_table_reload;
var surat_file_surat_keluar_table;
var surat_file_surat_keluar_table_reload;

// Data list
var surat_jenis_surat_masuks;
var jenis_surat_masuks;
var sifat_keamanan_surats;
var sifat_penyelesaian_surats;
var jenis_files;
var arahan_surats;
var status_disposisis;
var jenis_disposisis;
var jenis_dokumens;
var units;

var surat_disposisi_surat_data;
var surat_diskusi_surat_data;
var surat_disposisi_pimpinan_data;
var surat_tembusan_surat_data;
var surat_dokumen_surat_data;
var surat_file_tanggapan_data;

var status;

var getFileExt = function (fileName) {
    fileName = fileName.toLowerCase();
    return fileName.split(".").pop();
};

var reset_form_data = function (form_id) {
    $(form_id).trigger("reset");
    $(":text", form_id).val("");
    $(":checkbox, :radio", form_id).each(function () {
        $(this).removeAttr("checked");
        // $('input[type="radio"]').attr('checked', '');
        $('input[type="radio"]', form_id).prop("checked", false);
    });
};

var load_disposisi_surat_steps_diagram = function (data) {
    var start = data.created_at;
    var diff = [];
    // $.each(data.disposisi_surat, function (idx, disposisi_surat) {
    Object.values(data.disposisi_surat).forEach(function (
        disposisi_surat,
        idx
    ) {
        // console.dir(disposisi_surat);
        // disposisi_surat.created_at
        start_end = ""; // start + ' s.d. '+ disposisi_surat.created_at + '<br>';
        start = moment(start);
        end = moment(disposisi_surat.created_at);
        days = moment.duration(end.diff(start)).days();
        hours = moment.duration(end.diff(start)).hours();
        minutes = moment.duration(end.diff(start)).minutes();
        diff.push(
            start_end +
                (days ? days + " hari" : "") +
                " " +
                (hours ? hours + " jam" : "") +
                " " +
                (minutes ? minutes + " menit" : "")
        );
        // console.dir(diff);
        start = disposisi_surat.created_at;

        // last step add diff from now()
        // console.log('length', data.disposisi_surat.length);
        if (idx == data.disposisi_surat.length - 1) {
            start = moment(start);
            // console.log('start', start);
            end = moment(moment.now());
            // console.log('now', moment.now());
            days = moment.duration(end.diff(start)).days();
            hours = moment.duration(end.diff(start)).hours();
            minutes = moment.duration(end.diff(start)).minutes();
            diff.push(
                start_end +
                    (days ? days + " hari" : "") +
                    " " +
                    (hours ? hours + " jam" : "") +
                    " " +
                    (minutes ? minutes + " menit" : "")
            );
        }
    });

    // step_item = step_item + '<li class="step-item"><a href="#!" class="">TU</a><br><span class="font-weight-lighter process-time">13 jam</span></li>';
    var step_diagram_unit = ["TU", "Karo", "Kabag", "Kasubag", "Pelaksana"];
    var step_diagram_html = "";

    step_diagram_unit.forEach(function (val, idx) {
        time_diff = diff[idx] !== undefined ? diff[idx] : "";
        let class_string =
            idx < diff.length ? "font-weight-lighter process-time" : "";
        let last_step = idx == diff.length - 1 ? " active" : "";
        step_diagram_html = `${step_diagram_html}<li class="step-item${last_step}"><a href="#!" class="">${val}</a><br><span class="${class_string}">${time_diff}</span></li>`;
    });

    $("#surat-disposisi-surat-step-diagram").html(step_diagram_html);
};

toastr.options = {
    closeButton: true,
    debug: false,
    newestOnTop: false,
    progressBar: true,
    positionClass: "toast-top-center",
    preventDuplicates: false,
    showDuration: "300",
    hideDuration: "1000",
    timeOut: "10000",
    extendedTimeOut: "1000",
    showEasing: "swing",
    hideEasing: "linear",
    showMethod: "fadeIn",
    hideMethod: "fadeOut",
};

$(document).on({
    ajaxStart: function () {
        $("body").addClass("loading");
    },
    ajaxStop: function (data) {
        $("body").removeClass("loading");
    },
    ajaxError: function(event, xhr, ajaxOptions, thrownError) {
        msg = JSON.parse(xhr.responseText);
        if (msg.message == "Unauthenticated.") {
            location.reload();
        }
    }
});
// $(document).ajaxError(function myErrorHandler(event, xhr, ajaxOptions, thrownError) {
//     alert("There was an ajax error!");
//   });
// $.ajaxSetup({

//     beforeSend: function (xhr) {
//         // xhr.setRequestHeader('Authorization', 'Authorization token');
//     },
//     complete: function (xhr, status) {
//         // console.log(status);
//     },
//     error: function (xhr, status, error) {
//         console.log('status:', status, ', error: ', error);
//     },
// });
// (function(open) {
//     XMLHttpRequest.prototype.open = function(method, url, async, user, pass) {
//         console.dir(this.status);
//         switch(this.status) {
//             case 500: console.log(this.response);
//         }
//         open.call(this, method, url, async, user, pass);
//     };
// })(XMLHttpRequest.prototype.open);
