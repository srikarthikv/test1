import requests

url = 'https://example.com'  # Replace with the desired URL

response = requests.get(url)

if response.status_code == 200:
    html_content = response.text
    print(html_content)
else:
    print(f'Request failed with status code: {response.status_code}')
