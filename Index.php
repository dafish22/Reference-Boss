<!DOCTYPE html>
<html lang="en">
    
<head>
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap-theme.min.css">
</head>
<body>
    <div class="container" style="max-width: 50%;">
        <div class="text-center mt-5 mb-4">
            <h2>Search Bar Test</h2>
        </div>
        <input type="text" class="form-control" id="liveSearch" autocomplete="off" placeholder="Search...">
    </div>

    <div id="searchResult"></div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="text/javascript">
        window.addEventListener("load", (e) => {

            const livesearch = document.querySelector("#liveSearch");
            livesearch.addEventListener("click", (ec) => {
                let aj = new XMLHttpRequest();
                

            }); 

        });




        $(document).ready(function() {


            


            $("#liveSearch").keyup(function() {
                var input = $(this).val();

                if (input != "") {
                    $.ajax({
                        url: "liveSearch.php",
                        method: "POST",
                        data: { input: input },
                        success: function(data) {
                            $("#searchResult").html(data);
                        }
                    });
                } else {
                    $("#searchResult").css("display","none");
                }
            });
        });
    </script>
</body>
</html>
