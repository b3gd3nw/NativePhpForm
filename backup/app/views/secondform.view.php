<form class="form" id="second-form" method="post"></form>
    <div class="form_card">
        <div class="row">
            <div class="col-sm-12 form_item">
                <label for="company">Company</label>
                <input type="text" name="company">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 form_item">
                <label for="position">Position</label>
                <input type="text" name="position">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 form_item">
                <label for="about">About Me</label>
                <input type="textarea" name="about">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 form_item">
                <label for="photo">Photo</label>
                <input type="file" name="photo">
            </div>
        </div>
    </div>
    <button id="second_btn" class="next action-button">Next</button>
</form>
<!--<script>-->
<!--$('#fisrst-form').validate({-->
<!--    submitHandler: function (form) {-->
<!--    $.ajax({-->
<!--        url: '/second',-->
<!--        type: 'post',-->
<!--        dataType: 'text',-->
<!--        data: new FormData(form),-->
<!--        enctype: 'multipart/form-data',-->
<!--        cache: false,-->
<!--        contentType: false,-->
<!--        processData: false,-->
<!--        success: function (data) {-->
<!--//        $('#filling-form').html(data)-->
<!--        }-->
<!--      })-->
<!--    }-->
<!--  })-->
<!--</script>-->