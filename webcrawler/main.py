from thegioi import *
from fpt import *
from chotot import *



url = raw_input('enter url: ')

if 'thegioi' in url:
	if 'ok' == insert_database(url):
		print 'done'
	else:
		print 'error'
if 'fpt' in url:
	if 'ok' == insert_database_fpt(url):
		print 'done'
	else:
		print 'error'
if 'hoanghamobile' in url:
	if 'ok' == insert_database_chotot(url):
		print 'done'
	else:
		print 'error'

