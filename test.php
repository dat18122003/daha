<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <button id="clickme">Click me</button>
    <?php
        echo 1234;
     ?>
    <script>

    

        document.querySelector('#clickme').addEventListener('click', function() {
            console.log(123)
                
        })
        
    </script>
</body>
</html>