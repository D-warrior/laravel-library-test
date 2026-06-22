<!-- resources/views/emails/request.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Book Borrow Request Pending</title>
</head>
<body>
    <h1>Hi {{ $user->name }},</h1>
    <p>We have received your request to borrow the book <strong>{{ $book->title }}</strong> for <strong>{{ $nbreJour }}</strong> days.</p>
    <p>Your request is currently pending approval. You will be notified once it is approved.</p>
</body>
</html>
