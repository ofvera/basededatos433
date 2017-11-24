from flask import Flask, jsonify
import pymongo

app = Flask(__name__)

client = pymongo.MongoClient()
db = client.test
users = db.users
messages = db.messages


@app.route('/')
def hello():
    return 'Hello world!'


@app.route('/users/<uid>')
def find_users(uid=None):
    uid = int(uid)
    results = None
    if uid == -1:
        results = users.find({}, {'_id': 0})
        # se pone _id: 0 porque _id no es serializable
    else:
        results = users.find({'uid': uid}, {'_id': 0})
    return jsonify('users', [res for res in results])


@app.route('/tweets/<mid>')
def find_tweets(mid=None):
    mid = int(mid)
    results = None
    if mid == -1:
        results = tweets.find({}, {'_id': 0})
    else:
        results = tweets.find({'mid': mid}, {'_id': 0})
    return jsonify('tweets', [res for res in results])


@app.route('/msg/<uid>')
def find_tweets_by_user(uid=None):
    """
    Para cada tweet retorna el nombre de usuario en vez del uid
    """
    uid = int(uid)
    results_tweets = tweets.find({'uid': uid}, {'_id': 0})
    results_users = users.find({'uid': uid}, {'_id': 0})
    results = [res for res in results_tweets]
    nombre_personas = [res for res in results_users]
    for tweet in results:
        for personas in nombre_personas:
            if tweet['uid'] == personas['uid']:
                tweet['name'] = personas['name'] + ' ' + personas['last_name']
            del tweet['uid']
            del tweet['mid']
    return jsonify({'tweets': results})

if __name__ == '__main__':
    app.run(port=8080)
