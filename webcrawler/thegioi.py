import requests
from bs4 import BeautifulSoup
import mysql.connector
import unicodedata



arr_product = []
arr_price = []
arr_link = []
arr_image = []
val = []
comment = []


def request(url):

	req = requests.get(url)
	data = req.text
	soup = BeautifulSoup(data, 'lxml')
	return soup


def web_product(url):

	soup = request(url)
	for i in soup.find_all('h3'):	
		arr_product.append((i.text))
	return arr_product


def web_price(url):

	soup = request(url)
	tem = []
	for i in soup.find_all(class_='price'):
		tem.append((i.text))
	tem = tem[:8]

	for i in tem:
		if '\n' in i:
			i = i.split('\n')
			arr_price.append(i[1][:-1])
		else:

			arr_price.append((i[:-1]))
	return arr_price


def web_image(url):

	soup = request(url)
	for i in soup.find_all(class_='lazy'):
		arr_image.append(i['data-original'])
	return arr_image


def web_link(url):

	soup = request(url)
	for i in soup.find_all('a'):
		if i['href'] and '/dtdd/' in i['href']:
			arr_link.append('https://www.thegioididong.com'+i['href'])
	return arr_link


def web_comment(url):

	soup = request(url)
	for i in soup.find_all('span'):
		if 'gi' in i.text and i.text[0].isdigit():
			comment.append(i.text[:-8]+'comment')
	return comment


def create_value(url):

	arr_product = web_product(url)
	arr_price = web_price(url)
	arr_link = web_link(url)
	arr_image = web_image(url)
	comment = web_comment(url)

	for i in range(0,len(arr_price)):		
		val.append((arr_product[i],arr_price[i].replace('.',''),arr_image[i], arr_link[i], comment[i], 'www.thegioididong.com'))
	return val

def insert_database(url):
	mydb = mysql.connector.connect(
	  host="localhost",
	  user="root",
	  passwd="duyvidai123",
	  database="duypv"
	)

	val = create_value(url)

	mycursor = mydb.cursor()
	mycursor.execute("CREATE TABLE thegioi (name VARCHAR(255), price int(255), image VARCHAR(255), link VARCHAR(255), comment VARCHAR(255), website VARCHAR(255))")

	query = "INSERT INTO thegioi (name, price, image, link,comment, website) VALUES (%s, %s, %s, %s, %s, %s)"
	for values in val:
		mycursor.execute(query, values)
		mydb.commit()
	return 'ok'

print create_value('https://www.thegioididong.com/may-tinh-bang-samsung')




#https://www.thegioididong.com/dtdd-nokia
#https://www.thegioididong.com/dtdd-oppo
#https://www.thegioididong.com/dtdd-apple-iphone
#https://www.thegioididong.com/dtdd-samsung







