<!-- resources/views/emails/approved.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Book Borrow Request Approved</title>
</head>
<body>
    <h1>Hi {{ $user->name }},</h1>
    <p>Congratulations, your request to borrow the book <strong>{{ $book->title }}</strong> has been approved.</p>
    <p>Your expected return date is <strong>{{ $returnDate }}</strong>.</p>
</body>
</html>
