// Import required modules
const express = require('express');
const bodyParser = require('body-parser');
const cors = require('cors');

// Create the Express app
const app = express();

// Middleware
app.use(bodyParser.json());
app.use(cors());

// Sample data for notices (Replace this with real data from your database)
const noticesData = [
    {
        id: 1,
        title: 'Welcome to College!',
        content: 'We are excited to welcome all the new students...',
        date: '2023-07-20',
    },
    {
        id: 2,
        title: 'Orientation Day',
        content: 'The orientation day for freshers will be held on...',
        date: '2023-07-22',
    },
    // Add more notices here...
];

// Endpoint to get notices
app.get('/notices', (req, res) => {
    // In a real application, you would fetch data from your database here
    // For this example, we'll just return the sample data
    res.json(noticesData);
});

// Start the server
const port = 9000; // You can use any port number you prefer
app.listen(port, () => {
    console.log(`Server is running on http://localhost:${port}`);
});
