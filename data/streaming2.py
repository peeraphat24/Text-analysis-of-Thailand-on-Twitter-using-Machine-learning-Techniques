from TwitterAPI import TwitterAPI
import csv
import datetime
import codecs

api_key = 'I5gf0T8YkfHIRUutDErRDLtFi'
api_secret = 'DeM1Rp6KsrOYPALcInD5WPTWS7UmI6CPUPdDJXsGgNbjE6pE2A'
access_token = '892969681212002308-0clEM1ooK8MnHcNzf9gcS6QhO5YC2eR'
access_secret = 'aKBr9SCQz7qbK4HfQdJHyymKwgdkUwcF6cg4Kq8MRF31e'
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