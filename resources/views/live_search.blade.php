<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>BTVN7</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container" style="margin-top: 50px;">
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <h3 class="text-center text-primary">Search</h3>
                    <div class="form-group">
                        <h4>Type by ID, Name and City</h4>
                        <input type="text" name="search" id="search" placeholder="Enter your text name" class="form-control" onfocus="this.value='' ">
                    </div>
                    <div id="search_list"></div>
                </div>
                <div class="col-lg-3"></div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                // Tải dữ liệu ban đầu khi trang được tải
                $.ajax({
                    url: "load_initial_data",
                    type: "GET",
                    success:function(data) {
                        $('#search_list').html(data);
                    }
                });

                // Xử lý sự kiện khi người dùng nhập vào ô tìm kiếm
                $('#search').on('keyup', function() {
                    var query = $(this).val();

                    // Gửi request Ajax để tìm kiếm
                    $.ajax({
                        url: "search",
                        type: "GET",
                        data: {'search':query},
                        success:function(data) {
                            $('#search_list').html(data);
                        }
                    })
                });
            });
        </script>
    </body>
</html>