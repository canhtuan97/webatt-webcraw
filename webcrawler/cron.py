from crontab import CronTab
 
my_cron = CronTab(user='duy')
job = my_cron.new(command='python /Users/duy/Desktop/duypv/fpt.py')
job.hour.also.on(12)
 
my_cron.write()
print job.is_valid()  
