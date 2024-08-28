<!DOCTYPE html>
<html>

<head>
    <title>New Project Assigned</title>
</head>

<body>
    <h1>Hello {{ $managerName }},</h1>
    <p>A new project has been assigned to you.</p>
    <p><strong>Project Name:</strong> {{ $projectName }}</p>
    <p><strong>Client Name:</strong> {{ $clientName }}</p>
    <p><strong>Techonology:</strong> {{ $techonology }}</p>
    <p><strong>End Date:</strong> {{ $endDate }}</p>
    <p><strong>Assigned By:</strong> {{ $superAdminName }}</p>
    <p>Please log in to your account to see more details.</p>
</body>

</html>
