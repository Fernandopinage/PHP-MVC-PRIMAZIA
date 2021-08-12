<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Example</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

    <script src="http://code.jquery.com/jquery-1.11.3.min.js" charset="utf-8"></script>
    <script src="rater.js" charset="utf-8"></script>
    <script>
        $(document).ready(function() {
            var options = {
                max_value: 6,
                step_size: 0.5,
                url: 'http://localhost/test.php',
                initial_value: 0,
                update_input_field_name: $("#input2"),
            }
            $(".rate").rate();

            $(".rate2").rate(options);

            $(".rate2").on("change", function(ev, data) {
                console.log(data.from, data.to);
            });



            setTimeout(function() {

                $("#rate6").rate({
                    selected_symbol_type: 'fontawesome_star',
                    max_value: 5,
                    step_size: 0.25,
                });
            }, 2000);


        });
    </script>

    <style>
        body {
            font-size: 35px;
            font-family: sans-serif;
        }
        
        .rate-base-layer {
            color: #001457;
        }
        
        .rate-hover-layer {
            color: #ff7123;
        }
        
        
        
        #rate5 .rate-base-layer span,
        #rate7 .rate-base-layer span {
            opacity: 0.5;
        }
        
        hr {
            border: 1px solid #ccc;
        }
        
        p {
            font-size: 15px;
        }
    </style>
</head>

<body>


    <div id="rate4"></div>
    <div id="rate6"></div>

</body>

</html>