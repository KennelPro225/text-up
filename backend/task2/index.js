const express = require('express');
const mysql = require('mysql2');

const app = express();
const PORT = 3001;

const cors = require('cors');
const corsOptions ={
    origin:'http://localhost:3000',
    optionSuccessStatus:200
}
app.use(cors(corsOptions));

app.use(express.json());

const db = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: 'root',
  database: 'text_up',
});

db.connect((err) => {
  if (err) {
    console.error('Error connecting to MySQL:', err);
    return;
  }
  console.log('Connected to MySQL database');
});

app.listen(PORT, () => {
  console.log(`Server is running on http://localhost:${PORT}`);
});

// Get all posts
app.get('/api/v1/articles/all', (req, res) => {
    db.query('SELECT posts.id, posts.title, posts.texte, posts.created_at, users.nom as author_name FROM posts INNER JOIN users ON posts.author_id = users.id', (err, results) => {
      if (err) throw err;
      res.send(results);
    });
  });
  
  // Update a post
  app.put('/api/v1/articles/modifier/:id', (req, res) => {
    const { id } = req.params;
    const { title, texte } = req.body;
    db.query('UPDATE posts SET title = ?, texte = ? WHERE id = ?', [title, texte, id], (err) => {
      if (err) throw res.json({ 
        error: true,
        message: 'la mise à jour a échoué',
        data: [],
      });
      
      res.json({ 
        error: false,
        message: 'Article mis à jour avec succès',
        data: [],
      });
    });
  });