<!-- resources/views/emails/rejected.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Book Borrow Request Rejected</title>
</head>
<body>
    <h1>Hi {{ $user->name }},</h1>
    <p>We regret to inform you that your request to borrow the book <strong>{{ $book->title }}</strong> has been rejected.</p>
</body>
</html>
