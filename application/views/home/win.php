<html>
<head><title>Detect Browser Exit</title>
<script type="text/javascript">

        $(function () {
            $(window).bind("beforeunload", function () {
                return fnLogOut();

            })
        });

        function fnLogOut() { alert('browser closing'); }

    </script>
</head>
<body>
Detect Browser Exit
</body>
</html>