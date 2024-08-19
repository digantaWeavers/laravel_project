<!DOCTYPE html>
<html>

<head>
    <title>New Project Assigned</title>
</head>

<body>
    <h1>Hello {{ $manager->name }},</h1>
    <p>A new project has been assigned to you.</p>
    <p><strong>Project Name:</strong> {{ $projectName }}</p>
    <p><strong>Client Name:</strong> {{ $clientName }}</p>
    <p><strong>End Date:</strong> {{ $endDate }}</p>
    <p>Please log in to your account to see more details.</p>
</body>

</html>
