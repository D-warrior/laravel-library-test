<!-- resources/views/emails/returned.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Book Returned</title>
</head>
<body>
    <h1>Hi {{ $user->name }},</h1>
    <p>Thank you for returning the book <strong>{{ $book->title }}</strong>. We hope you enjoyed reading it.</p>
</body>
</html>
