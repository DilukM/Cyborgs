const fs = require('fs');
const mysql = require('mysql');

// Read the JSON key file
const keyFile = fs.readFileSync('key.json');
const key = JSON.parse(keyFile);

// Set up the database configuration
const config = {
  user: key.client_email,
  password: key.private_key,
  database: 'TestDB',
  host: 'root',
  port: 3306, // or your database port
  ssl: {
    ca: key.private_key,
  },
};

// Create a new MySQL connection
const connection = mysql.createConnection(config);

// Connect to the database
connection.connect(err => {
  if (err) {
    console.error('Connection error:', err.stack);
  } else {
    console.log('Connected to database');
  }
});

// Query the database
connection.query('SELECT * FROM users', (err, results, fields) => {
  if (err) {
    console.error('Query error:', err.stack);
  } else {
    console.log(results);
  }
});

// Close the database connection
connection.end();
