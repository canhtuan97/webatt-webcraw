import requests
from bs4 import BeautifulSoup
import mysql.connector

arr_product = []
arr_price = []
arr_link = []
arr_image = []
comment = []
val= []


def web_product(url):
    req = requests.get(url)
    data = req.text
    soup = BeautifulSoup(data, 'lxml')
    for i in soup.find_all(class_='fs-lpil-name'):
    	
    	arr_product.append((i.text))
    return arr_product


def web_price(url):
	req = requests.get(url)
	data = req.text
	soup = BeautifulSoup(data, 'lxml')
	for i in soup.find_all(class_='fs-lpil-price'):
		m = i.text.split('\n')
		arr_price.append(str(m[1][:-2]))
	return arr_price


def web_link(url):
  req = requests.get(url)
  data = req.text
  soup = BeautifulSoup(data,'lxml')
  for i in soup.find_all(class_='fs-lpil-img'):
    arr_link.append('https://fptshop.com.vn' +i['href'])
  return arr_link


def web_image(url):
  req = requests.get(url)
  data = req.text
  soup = BeautifulSoup(data,'lxml')
  for i in soup.find_all(class_='lazy'):
    arr_image.append('https:/'+i['data-original'].split(')')[2])
  return arr_image

def web_comment(url):
  req = requests.get(url)
  data = req.text
  soup = BeautifulSoup(data, 'lxml')
  for i in soup.find_all('p'):
    if '(' in i.text and i.text[2].isdigit():
      comment.append(str(i.text[1:-9]+'comment'))
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

def insert_database_fpt(url):
  mydb = mysql.connector.connect(
    host="localhost",
    user="root",
    passwd="duyvidai123",
    database="duypv"
  )

  val = create_value(url)
  # print val

  mycursor = mydb.cursor()
  # mycursor.execute("CREATE TABLE thegioi (name VARCHAR(255), price int(255), image VARCHAR(255), link VARCHAR(255), comment VARCHAR(255), website VARCHAR(255))")

  query = "INSERT INTO data (name, price, image, link,comment, website) VALUES (%s, %s, %s, %s, %s, %s)"
  for values in val:
    mycursor.execute(query, values)
    mydb.commit()
  return 'ok'



print web_price('https://fptshop.com.vn/dien-thoai/samsung')





