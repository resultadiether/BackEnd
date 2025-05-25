import './bootstrap';
// server.js or app.js

const express = require('express');
const cors = require('cors');
const app = express();

// --- 1. Use cors middleware BEFORE routes ---
app.use(cors({
  origin: 'https://your-https://front-end-nvxe-git-main-diether-resultas-projects.vercel.app/.vercel.app', // Replace with your actual frontend URL
  credentials: true
}));

// --- 2. Parse incoming JSON ---
app.use(express.json());

// --- 3. Your routes (e.g., login/register) ---
app.post('/api/login', (req, res) => {
  const { email, password } = req.body;
  // your login logic here
  res.json({ message: 'Login successful' });
});

// --- 4. Start the server ---
const PORT = process.env.PORT || 3000;
app.listen(PORT, () => {
  console.log(`Server is running on port ${PORT}`);
});
