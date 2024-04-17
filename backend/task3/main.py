from flask import Flask, jsonify
from flask_restful import Resource, Api
import mysql.connector
from json import dumps

app = Flask(__name__)
api = Api(app)

try:
  mydb = mysql.connector.connect(
    user="root",
    password="root",
    database="text_up"
  )
except Exception as exception:
  print("une erreur as survenue")

class Stats(Resource):
  def get(self):
    cursor = mydb.cursor()
    cursor.execute("""SELECT
            produits.nom,
            COUNT(*) AS nb_commandes_produit
            FROM commandes
            INNER JOIN produits
            ON commandes.id_produit = produits.id
            GROUP BY EXTRACT(WEEK FROM commandes.created_at), produits.nom
            ORDER BY nb_commandes_produit DESC
          """)
    data = cursor.fetchall()
    stats= []
    if len(data)!=0:
      for d in data:
        stats.append({"article":d[0], "nombre_article_vendu":d[1]})
    return jsonify({
      "error":False,
      "data": stats if len(stats)!=0 else []
      })   

api.add_resource(Stats, '/api/v1/stats')

if __name__ == "__main__":
  app.run(debug=True)