const express = require('express');
const mysql = require('mysql2');

const app = express();
const PORT = 3001;

const cors = require('cors');
const corsOptions = {
  origin: 'http://localhost:3000',
  optionSuccessStatus: 200
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
  db.query(`SELECT posts.id ,posts.titre ,posts.texte ,posts.created_at ,users.nom as author_name ,users.prenoms as author_surname, tags.libelle FROM posts 
            INNER JOIN users ON posts.author_id = users.id 
            INNER JOIN post_tag ON posts.id = post_tag.post_id  
            INNER JOIN tags ON tags.id = post_tag.tag_id
  `, (err, results) => {
    if (err) throw err;
    res.send(results);
  });
});

// Update a post
app.put('/api/v1/articles/modifier/:id', (req, res) => {
  const { id } = req.params;
  const { titre, texte } = req.body;
  db.query('UPDATE posts SET titre = ?, texte = ? WHERE id = ?', [titre, texte, id], (err) => {
    if (err) throw res.json({
      error: true,
      message: 'la mise à jour a échoué',
      data: [],
    });

    res.json({
      error: false,
      message: 'poste mis à jour avec succès',
      data: [],
    });
  });
});