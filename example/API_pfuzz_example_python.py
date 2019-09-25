import requests

files = {'file': ("/filepath/to/bundle.zip", open("/filepath/to/bundle.zip", 'rb'))}
headers = {'user-agent': 'your user-agent value'}
response = requests.post("https://iotcube.net/api/bf2", files=files, headers=headers)

print (response.text)
