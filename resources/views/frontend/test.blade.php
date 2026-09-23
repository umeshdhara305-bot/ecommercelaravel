<!DOCTYPE html>
<html>
<head>
    <title>AJAX Example</title>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>

    <input type="text" id="name">

    <button id="sendBtn">
        Send
    </button>

    <div id="result"></div>

    <script>
        $('#sendBtn').click(function () {

            var name = $('#name').val();

            $.ajax({
                url: '/hello',
                type: 'POST',
                data: {
                    name: name,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    $('#result').html(response.message);
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });

        });
    </script>

</body>
</html>