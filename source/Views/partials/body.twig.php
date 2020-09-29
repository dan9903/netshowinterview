<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{BASE}}vendor/bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" href="{{BASE}}css/styles.css" />
    <title>
        {% block title %}{% endblock %}
    </title>
</head>

<body>
    {% include 'partials/header.twig.php' %}

    {% block body %}{% endblock %}
</body>
<script src="{{BASE}}vendor/romulobrasil/puremask.min.js"></script>
<script type="text/javascript">
    PureMask.format(".phone", true);
</script>
</html>