from TwitterAPI import TwitterAPI
import csv
import datetime
import codecs

api_key = ''
api_secret = ''
access_token = ''
access_secret = ''
TRACK_TERM = 'thailand'

api = TwitterAPI(api_key,
                  api_secret,
                  access_token,
                  access_secret)


r = api.request('statuses/filter', {'track': TRACK_TERM})
for item in r:
    mydate = datetime.datetime.now()
    y = mydate.strftime("%B")
    if y != 'August':
        break
    if item['lang'] == 'en':
        x =item['text']
        x = x.replace("\n","")
        x = x.replace(","," ")+"\n"
        print(x.encode('ascii','ignore'))
        with codecs.open('t666.csv', 'a',encoding='utf-8') as f:
          f.write(x)
f.close