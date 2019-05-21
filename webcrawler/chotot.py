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
	soup = BeautifulSoup(data, 'html5lib')
	return soup


def web_product(url):

	soup = request(url)
	for i in soup.find_all('h4'):
		if '-' in i.text:
			arr_product.append(unicodedata.normalize('NFKD', i.text).encode('ascii','ignore'))
	return arr_product

def web_price(url):

	soup = request(url)
	for i in soup.find_all(class_='product-price'):
		arr_price.append(i.text[:-2])
	return arr_price


def web_link(url):

	soup = request(url)
	for i in soup.find_all('a'):

		if 'Samsung' in i.text and i.text !=None: #arr_link Apple, SamSung, Nokia, Apple iPad
			arr_link.append('https://hoanghamobile.com' +str(i['href']))
	return arr_link

def web_image(url):

	soup = request(url)
	for i in soup.find_all('img'):
		if 'quality' in  i['src']:
			arr_image.append(i['src']) 
	return arr_image




def create_value(url):

	arr_product = web_product(url)
	arr_price = web_price(url)
	arr_link = web_link(url)
	arr_image = web_image(url)
	print len(arr_product)
	print len(arr_price)
	print len(arr_link)
	print len(arr_image)

	for i in range(0,len(arr_price)):		
		val.append((arr_product[i],arr_price[i].replace('.',''),arr_image[i], arr_link[i], 'No comment', 'hoanghamobile.com'))
	return val

def insert_database_chotot(url):
	mydb = mysql.connector.connect(
	  host="localhost",
	  user="root",
	  passwd="duyvidai123",
	  database="duypv"
	)

	val = create_value(url)

	mycursor = mydb.cursor()
	# mycursor.execute("CREATE TABLE thegioi (name VARCHAR(255), price int(255), image VARCHAR(255), link VARCHAR(255), comment VARCHAR(255), website VARCHAR(255))")

	query = "INSERT INTO thegioi (name, price, image, link,comment, website) VALUES (%s, %s, %s, %s, %s, %s)"
	for values in val:
		mycursor.execute(query, values)
		mydb.commit()
	return 'ok'



print web_link('https://hoanghamobile.com/samsung-c1049.html')






