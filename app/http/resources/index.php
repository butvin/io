<!DOCTYPE html>
<html>
<head>
    <title>{{ title }}</title>
</head>
<body>
<ul id="navigation">
    {% for item in navigation %}
    <li><a href="{{ item.href }}">{{ item.caption }}</a></li>
    {% endfor %}
</ul>

<h1>Front</h1>
{{ name }}

</body>
</html>