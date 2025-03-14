<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <title>Document</title>
</head>
<body>
    <div class="container" style="margin-top: 30px;">
        <h3 align="center" syle="margin-bottm: 20px;">Test</h3>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Author</th>
                    <th scope="col">Title</th>
                    <th scope="col">Publisher</th>
                    <th scope="col">Publication Date</th>
                    <th scope="col">PoP</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
        <form method="POST" id="api_form">
            <div class="form-group">
                <input type="text" name="author" class="form-control" id="author" placeholder="Author">
            </div>
            <div class="form-group">
                <input type="text" name="title" class="form-control" id="title" placeholder="Title">
            </div>
            <div class="form-group">
                <input type="text" name="publisher" class="form-control" id="publisher" placeholder="Publisher">
            </div>
            <div class="form-group">
                <input type="text" name="publication_date" class="form-control" id="publication_date" placeholder="Publication Date">
            </div>
            <div class="form-group">
                <input type="text" name="place_of_publication" class="form-control" id="place_of_publication" placeholder="PoP">
            </div>
            <input type="hidden" name="action" id="action" value="addNew"/>
            <input type="submit" id="submit" name="submit" class="btn btn-primary" value="Add"/>
        </form>
    </div>
    <script>
        $(document).ready(function(){
            outputData();

            function ouptutData(){
                $.ajax({
                    url: "output.php",
                    success:function(data){
                        $('tbody').html(data);
                    }
                });
            }

            $('#api_form').on('submit', function(event){
                event.preventDefault();
                if($('#author').val() == ''){
                    alert('Author field is required!')
                }else if($('#title').val() == ''){
                    alert('Title field is required!')
                }else if($('#publisher').val() == ''){
                    alert('Publisher field is required!')
                }else if($('#place_of_publication').val() == ''){
                    alert('Place of Publication field is required!')
                }else if($('#publication_date').val() == ''){
                    alert('Publication Date field is required!')
                }else{
                    var formData = $(this).serialize();
                    $.ajax({
                        url: "controller.php",
                        method: "POST",
                        data: formData,
                        success:function(data){
                            outputData();
                            $('#api_form')[0].reset();
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>