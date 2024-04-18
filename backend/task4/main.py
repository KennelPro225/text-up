import mysql.connector
from lxml import etree

# Connexion à la base de données
cnx = mysql.connector.connect(user='root', password='root',
                              host='localhost',
                              database='text_up')

cursor = cnx.cursor()

# Création de l'élément racine XML
root = etree.Element("database")

# Liste des tables à exporter
tables = ['activite_logs', 'categories', 'post_tag', 'tags', 'users']

for table in tables:
    # Création d'un élément XML pour la table
    table_element = etree.SubElement(root, table)

    # Récupération des données de la table
    query = f"SELECT * FROM {table}"
    cursor.execute(query)

    # Pour chaque ligne de la table
    for row in cursor:
        # Création d'un élément XML pour la ligne
        row_element = etree.SubElement(table_element, "row")

        # Pour chaque colonne de la ligne
        for i, column in enumerate(cursor.column_names):
            # Création d'un élément XML pour la colonne
            column_element = etree.SubElement(row_element, column)
            column_element.text = str(row[i])

# Fermeture de la connexion à la base de données
cursor.close()
cnx.close()

# Écriture du fichier XML
tree = etree.ElementTree(root)
tree.write('output.xml', pretty_print=True)