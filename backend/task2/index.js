const express = require("express");
const mysql = require('mysql2/promise');

const app = express();
const port = 3000;

app.use(express.json());
app.use(
    express.urlencoded({
        extended: true,
    })
);

const config = {
    db: {
        /* don't expose password or any sensitive info, done only for demo */
        host: "db4free.net",
        user: "restapitest123",
        password: "restapitest123",
        database: "restapitest123",
        connectTimeout: 60000
    },
};
module.exports = config;

async function query(sql, params) {
    const connection = await mysql.createConnection(config.db);
    const [results, ] = await connection.execute(sql, params);
  
    return results;
}

module.exports = {
    query
}

app.get('/', (req, res) => {
    // try {
    //     res.json(await programmingLanguages.getMultiple(req.query.page));
    //   } catch (err) {
    //     console.error(`Error while getting programming languages `, err.message);
    //     next(err);
    //   }
    
})

app.listen(port, () => {
    console.log(`Example app listening at http://localhost:${port}`);
});
