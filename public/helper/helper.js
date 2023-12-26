$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});



function updateRow(id, url) {
    if (confirm('Bạn có muốn thực hiện hành động này?')) {
        $.ajax({
            type: 'POST',
            datatype: 'JSON',
            data: { id },
            url: url,
            success: function (result) {
                alert('Thành công');
                location.reload();
            },
            error: function (result) {
                console.log(result)
                alert(result);
            },
        })
    }
}


function removeRow(id, url) {
    if (confirm('Xóa mà không thể khôi phục. Bạn có chắc ?')) {
        $.ajax({
            type: 'DELETE',
            datatype: 'JSON',
            data: { id },
            url: url,
            success: function (result) {
                if (result.error === false) {
                    alert(result.message);
                    location.reload();
                } else {
                    console.log(result)
                    alert('Xóa lỗi vui lòng thử lại');
                }
            },
            error: function (result) {
                console.log(result)
                alert(result);
            },
        })
    }
}

function createItem(id, url) {
    var quantity = $("#quantity_" + id).val();

    if (confirm('Thêm sản phẩm vào giỏ hàng ?')) {
        $.ajax({
            type: 'POST',
            datatype: 'JSON',
            data: { id, quantity },
            url: url,
            success: function (result) {
                if (result.error === false) {

                } else {

                    //  updateModalContent()
                    $('#myCart').modal('show');
                    console.log(result);
                }
            },
            error: function (result) {
                console.log(result)
                alert(result);
            },
        })

    }
}


function updateModalContent() {
    $.ajax({
        type: 'GET',
        url: 'carts',
        datatype: 'JSON',
        success: function (data) {
            // Cập nhật nội dung của Modal dựa trên dữ liệu mới
            $('#myCart .modal-content').html(data);
            console.log(data);
        },
        error: function (error) {
            console.log(error);
        }
    });
}



$(document).ready(function () {
    $(".add-to-cart-btn").on("click", function () {
        var productId = $(this).data("id");

        // Gửi yêu cầu Ajax để thêm sản phẩm vào giỏ hàng
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            data: {
                id: productId
            },
            url: '/add-cart', // Đổi đường dẫn này thành API endpoint của bạn
            success: function (result) {
                if (result.success) {
                    // Cập nhật số lượng sản phẩm trong giỏ hàng
                    var currentCount = parseInt($("#cart-item-count").text());
                    $("#cart-item-count").text(currentCount + 1);
                } else {
                    console.log(result.message);
                }
            },
            error: function (error) {
                console.log(error);
            }
        });
    });
});



function updateStatus(element) {
    var customerId = $(element).closest('.order-form').data('id');
    var status = $("input[name='status']:checked", $(element).closest('.order-form')).val();

    $.ajax({
        type: 'POST',
        url: '/admin/cart/edit/' + customerId,
        data: {
            status: status
        },
        success: function (data) {
            window.location.reload();
            console.log('Update thành công:', data);
        },
        error: function (error) {
            console.log('Lỗi khi cập nhật trạng thái:', error);
        }
    });
}



function search(selectedValue) {
    console.log(selectedValue);
    $.ajax({
        type: 'GET',
        url: '/sanpham/{slug}', // Cần thay đổi đúng đường dẫn của bạn
        data: {
            sort_by: selectedValue
        },
        success: function (data) {
            // window.location.reload();
            console.log('Update thành công:', data);
        },
        error: function (error) {
            console.log('Lỗi khi cập nhật trạng thái:', error);
        }
    });
}





























$(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });

    $('#reservationdate1').datetimepicker({
        format: 'L'
    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
        timePicker: true,
        timePickerIncrement: 30,
        locale: {
            format: 'MM/DD/YYYY hh:mm A'
        }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
        {
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            startDate: moment().subtract(29, 'days'),
            endDate: moment()
        },
        function (start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
        }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
        format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function (event) {
        $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })

    $("input[data-bootstrap-switch]").each(function () {
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

})
// BS-Stepper Init
document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
})

// DropzoneJS Demo Code Start
Dropzone.autoDiscover = false

// Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
var previewNode = document.querySelector("#template")
previewNode.id = ""
var previewTemplate = previewNode.parentNode.innerHTML
previewNode.parentNode.removeChild(previewNode)

var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
})

myDropzone.on("addedfile", function (file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function () { myDropzone.enqueueFile(file) }
})

// Update the total progress bar
myDropzone.on("totaluploadprogress", function (progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
})

myDropzone.on("sending", function (file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1"
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
})

// Hide the total progress bar when nothing's uploading anymore
myDropzone.on("queuecomplete", function (progress) {
    document.querySelector("#total-progress").style.opacity = "0"
})

// Setup the buttons for all transfers
// The "add files" button doesn't need to be setup because the config
// `clickable` has already been specified.
document.querySelector("#actions .start").onclick = function () {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
}
document.querySelector("#actions .cancel").onclick = function () {
    myDropzone.removeAllFiles(true)
}
// DropzoneJS Demo Code End