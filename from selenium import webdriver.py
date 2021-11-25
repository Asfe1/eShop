from selenium import webdriver;

from selenium.webdriver.common.keys import Keys
import time
driver = webdriver.Chrome('E:/Study/12th Trimester/SE LAB/inclass 4 matrials/chromedriver_win32/chromedriver')

user_name = "jonaskahn1234@gmail.com"
password = "softwarelab"
driver.get("https://www.facebook.com")
element = driver.find_element_by_id("email")
element.send_keys(user_name)
element = driver.find_element_by_id("pass")
element.send_keys(password)
element.send_keys(Keys.RETURN)
time.sleep(10)
#print("done");

page_title = driver.title
assert page_title == "Gmail"