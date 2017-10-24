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


@app.route("/user/<uid>")
def find_users(uid=None):
    """
        Muestra la informacion del artista y los mensajes emitidos por el
    [users, [{
      "age": int, 
      "description": str, 
      "id": int, 
      "msg": [
        {
          "message": str, 
          "receptant": str
        }
      ], 
      "name": str
    }]]
    """
    try:
        uid = int(uid)
        all_user_data = users.find({}, {'_id': 0})
        if uid == -1:
            user_data = all_user_data
        else:
            user_data = users.find({'id': uid}, {'_id': 0})
        msg_data = messages.find({'sender': uid}, {'_id': 0})
        all_user_result = [u for u in all_user_data]
        user_result = [u for u in user_data]
        msg_result = [m for m in msg_data]
        for usr in user_result:
            usr['msg'] = list()
            for msg in msg_result:
                if usr['id'] == msg['sender']:
                    nombre = ''
                    for usr2 in all_user_result:
                        if usr2['id'] == msg['receptant']:
                            nombre = usr2['name']
                    usr['msg'].append({
                        'message': msg['message'],
                        'receptant': nombre
                    })

        return jsonify('users', user_result)
    except Exception as err:
        return 'Ocurrio un error: {}'.format(err)


@app.route("/messages/<mid>")
def find_msg(mid=None):
    pass


@app.route("/msg/")
def find_msg_by_user():
    pass


if __name__ == '__main__':
    app.run(port=8080)
