import requests

files = {'file': ("/filepath/to/hidxfile.hidx", open("/filepath/to/hidxfile.hidx", 'rb'))}
headers = {'user-agent': 'your user-agent value'}
response = requests.post("https://iotcube.net/api/wf1", files=files, headers=headers)

print (response.text)
