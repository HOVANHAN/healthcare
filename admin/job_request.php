<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Xác Nhận Xin Việc</title>
</head>

<body>
    <?php include '../include/header.php'; ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left:-30px;">
                    <?php include 'sidenav.php'; ?>
                </div>
                <div class="col-md-10">
                    <h5 class="text-center my">Đơn Xin Việc</h5>
                    <div id="show">

                    </div>

                </div>

            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            function show() {
                $.ajax({
                    url: "show_job_request.php",
                    method: "POST",
                    success: function(data) {
                        $("#show").html(data);
                    }
                });
            }

            // Gọi hàm show() khi trang vừa được tải
            show();

            $(document).on('click', '.approve', function() {

                var id = $(this).attr("id");


                $.ajax({
                    url: "job_approve.php",
                    method: "POST",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        show();
                    }
                })
            })

            $(document).on('click', '.reject', function() {

                var id = $(this).attr("id");


                $.ajax({
                    url: "job_reject.php",
                    method: "POST",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        show();
                    }
                })
            })

        });
    </script>



</body>

</html>