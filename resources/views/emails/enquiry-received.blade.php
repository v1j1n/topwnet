<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Enquiry Received</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background-color: #092D3C;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 5px 5px 0 0;
        }
        .content {
            background-color: #f9f9f9;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 0 0 5px 5px;
        }
        .field {
            margin-bottom: 15px;
            padding: 10px;
            background-color: white;
            border-left: 3px solid #092D3C;
        }
        .label {
            font-weight: bold;
            color: #092D3C;
            display: block;
            margin-bottom: 5px;
        }
        .value {
            color: #555;
        }
        .footer {
            margin-top: 20px;
            text-align: center;
            color: #777;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>New Enquiry Received!</h1>
    </div>
    <div class="content">
        <p>You have received a new enquiry from your website.</p>

        <div class="field">
            <span class="label">Name:</span>
            <span class="value">{{ $enquiry->name }}</span>
        </div>

        <div class="field">
            <span class="label">Email:</span>
            <span class="value">{{ $enquiry->email }}</span>
        </div>

        <div class="field">
            <span class="label">Phone:</span>
            <span class="value">{{ $enquiry->phone }}</span>
        </div>

        <div class="field">
            <span class="label">Service Interested In:</span>
            <span class="value">{{ $enquiry->service_name }}</span>
        </div>

        <div class="field">
            <span class="label">Message:</span>
            <div class="value">{{ $enquiry->message }}</div>
        </div>

        <p style="margin-top: 20px; padding: 10px; background-color: #fff3cd; border-left: 3px solid #ffc107;">
            <strong>⚠️ Action Required:</strong> Please respond to this enquiry as soon as possible.
        </p>
    </div>
    <div class="footer">
        <p>This email was sent from Top World Networks website enquiry form.</p>
        <p>Submitted on: {{ $enquiry->created_at->format('F d, Y \a\t h:i A') }}</p>
    </div>
</body>
</html>

