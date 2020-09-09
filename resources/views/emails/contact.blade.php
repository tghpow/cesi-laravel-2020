<html>
<head>

</head>
<body>
<h1>Nouveau contact</h1>
<div>
    <ul>
        <li><b>Sujet</b>: {{ $contact->subject }}</li>
        <li><b>Email</b>: {{ $contact->email }}</li>
        <li><b>Genre</b>: {{ $contact->genre }}</li>
    </ul>
    <div>
        <b>Message:</b><br>
        <p>{{ $contact->message }}</p>
    </div>
</div>
</body>
</html>
