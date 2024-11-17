// Import the necessary modules
const express = require('express');
const app = express();
const PORT = 8000;

// Sample data - could be fetched from a database in a real application
const items = ["Apple", "Banana", "Cherry", "Date", "Elderberry", "Fig", "Grape", "Honeydew"];

// Define a route to serve all items for autocomplete
app.get('/all-items', (req, res) => {
  res.json(items); // Send the list of items as JSON
});

// Start the server
app.listen(PORT, () => {
  console.log(`Server is running at http://localhost:${PORT}`);
});
