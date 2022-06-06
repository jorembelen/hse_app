

<script src="/admin/plugins/file-upload/file-upload-with-preview.min.js"></script>
<script src="/admin/plugins/flatpickr/flatpickr.js"></script>
<script>
    var f2 = flatpickr(document.getElementById('dateTimeFlatpickr'), {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
    });
</script>

<script>
    var secondUpload = new FileUploadWithPreview('myImage')
</script>

<script>
    (function(){
    $('.from-prevent-multiple-submits').on('submit', function(){
        $('.from-prevent-multiple-submits').attr('disabled','true');
    })
    })();
</script>
