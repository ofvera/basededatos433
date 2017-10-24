from flask import Flask, jsonify
from pymongo import MongoClient

app = Flask(__name__)

client = MongoClient()
db = client.data  # mi base de datos se llama data
messages = db.messages  # dentro de test, una coleccion es users
users = db.users  # dentro de test, otra coleccion es tweets


@app.route("/")
def hello():
    return "Hello World!"


@app.route("/users/<uid>")
def find_users(uid=None):
    """
      Muestra la informacion del artista y los mensajes emitidos por el
      """
    try:
        uid = int(uid)
        if uid == -1:
            user_data = users.find({}, {'_id': 0})
        else:
            user_data = users.find({'id': uid}, {'_id': 0})
            msg_data = messages.find({'sender': uid}, {'_id': 0})
        # return jsonify(blabla, blabla)
    except Exception as err:
        return 'Ocurrio un error: {}'.format(err)


@app.route("/messages/<mid>")
def find_msg(mid=None):
    pass


@app.route("/msg")
def find_msg_by_user():
    pass


if __name__ == '__main__':
    app.run(port=8080)
