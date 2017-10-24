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


@app.route("/users/<uid1>-<uid2>")
def find_msg_by_user(uid1 = None, uid2 = None):
    """
    A partir de 2 uid encontrar los mensajes entre ellos
    """
    try:   
        uid1 = int(uid1)
        uid2 = int(uid2)
        if uid1 == -1 or uid2 == -1:
            return 'Se debe especificar los dos artistas'
        else:
            print(uid1)
            print(uid2)
            msg_data = messages.find({'sender': uid1, 'receptant': uid2}, {'_id': 0})
            msg_data2 = messages.find({'sender': uid2, 'receptant': uid1}, {'_id': 0})
            user1_data = users.find({'id': uid1}, {'_id': 0})
            user2_data = users.find({'id': uid2}, {'_id': 0})
            result_msg = [res for res in msg_data]
            result_msg2 = [res for res in msg_data2]
            result_user1 = [res for res in user1_data]
            result_user2 = [res for res in user2_data]
            result = []
            print(result_msg)
            print(result_msg2)
            print(result_user1)
            print(result_user2)
            for user1 in result_user1:
                for user2 in result_user2:
                    for msg in result_msg:
                        if msg["sender"] == user1["id"]:
                            msg["sender"] == user1["name"]
                        elif msg["sender"] == user2["id"]:
                            msg["sender"] == user2["name"]
                        if msg["receptant"] == user1["id"]:
                            msg["receptant"] == user1["name"]
                        elif msg["receptant"] == user2["id"]:
                            msg["receptant"] == user2["name"]
                        result.append(msg)
                    for msg in result_msg2:
                        if msg["sender"] == user1["id"]:
                            msg["sender"] == user1["name"]
                        elif msg["sender"] == user2["id"]:
                            msg["sender"] == user2["name"]
                        if msg["receptant"] == user1["id"]:
                            msg["receptant"] == user1["name"]
                        elif msg["receptant"] == user2["id"]:
                            msg["receptant"] == user2["name"]
                        result.append(msg)
            return jsonify("msgs", result)

    except:
        return 'Error de sistema, apagando su computador'



if __name__ == '__main__':
    app.run(port=8080)