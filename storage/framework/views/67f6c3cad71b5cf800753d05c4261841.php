<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Distributor Inquiry</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                line-height: 1.6;
                color: #333;
                margin: 0;
                padding: 0;
            }
            .email-container {
                max-width: 600px;
                margin: 20px auto;
                padding: 20px;
                border: 1px solid #ddd;
                border-radius: 8px;
                background-color: #f9f9f9;
            }
            h2 {
                color: #0056b3;
            }
            table {
                width: 100%;
                border-collapse: collapse;
                margin: 20px 0;
            }
            table th, table td {
                padding: 10px;
                text-align: left;
                border: 1px solid #ddd;
            }
            table th {
                background-color: #f1f1f1;
            }
        </style>
    </head>
    <body>
        <div class="email-container">
            <h2>Distributor Inquiry</h2>
            <p>You have received a new inquiry. Here are the details:</p>
            <table>
                <tr>
                    <th>Name</th>
                    <td><?php echo e($data['name']); ?></td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td><?php echo e($data['phone']); ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?php echo e($data['email']); ?></td>
                </tr>
                <tr>
                    <th>Message</th>
                    <td><?php echo e($data['message']); ?></td>
                </tr>
            </table>
            <p>Thank you!</p>
        </div>
    </body>
</html>
<?php /**PATH /var/www/vhosts/tapariatools.com/tapariatools.tapariatools.com/resources/views/frontend/distributor-email.blade.php ENDPATH**/ ?>