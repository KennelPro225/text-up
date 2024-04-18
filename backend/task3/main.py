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
    cursor.execute("""
            SELECT
                tags.libelle,
                COUNT(*) AS nombre_articles
            FROM
                tags
            INNER JOIN post_tag ON tags.id = post_tag.tag_id
            GROUP BY
                tags.libelle,
                EXTRACT(WEEK FROM tags.created_at)
            ORDER BY
                nombre_articles DESC;
          """)
    data = cursor.fetchall()
    stats= []
    if len(data)!=0:
      for d in data:
        stats.append({"tag":d[0], "nombre_articles":d[1]})
    return jsonify({
      "error":False,
      "data": stats if len(stats)!=0 else []
      })   

api.add_resource(Stats, '/api/v1/stats')

if __name__ == "__main__":
  app.run(debug=True)